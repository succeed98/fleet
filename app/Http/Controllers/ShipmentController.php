<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Site;
use App\Models\User;
use App\Models\Alert;
use App\Models\Truck;
use App\Models\Driver;
use App\Models\Company;
use App\Models\Shipment;
use App\Models\Settings;

use Carbon\Carbon;

class ShipmentController extends Controller
{

    public function index()
    {
        return view('shipment', [
            'drivers'     =>  Driver::all(),
            'companies'   =>  Company::all(),
            'sites'        =>  Site::all(),
        ]);
    }

    public function store(Request $request)
    {

        if( $request->ajax() ) {

            $truck = Truck::where('barcode', $request->truck)->first();

            if( $truck->shipments->first() ) {
                $arrived_at = Carbon::parse($truck->shipments->first()->arrived_at)->timestamp;
            } else {
                $arrived_at = strtotime('-45 mins');
            }

            if( $arrived_at <= strtotime('-45 mins') ) {

                // safe, insert new shipment
                
                $s_details = [];

                $status = 'success';

                parse_str($request->shipment, $s_details);

                $uid = uniqid(true);

                $site = Site::find($s_details['site_id']);

                if( isset($s_details['weighed']) && $s_details['weighed'] == 'weighed' ) {
                    $_weighed = 1;
                    $_cost_transporter = (FLOAT)(($s_details['weight'] - $truck->weight) * $truck->rate); // rate per tonne
                    $_cost_quary = (FLOAT)(($s_details['weight'] - $truck->weight) * $site->rate); // rate per tonne
                } else {
                    $_weighed = 0;
                    $_material = isset($s_details['material_type']) ? $s_details['material_type'] : '';

                    $_cost_transporter = $this->_estimateShipmentCost_transporter($truck, $_material);
                    $_cost_quary = $this->_estimateShipmentCost_quary($site, $truck, $_material);
                }

                $shipment = $truck->shipments()->create([
                    'uid'           =>  $s_details['bill-no'] !== '' ? $s_details['bill-no'] : $uid,
                    'driver_id'     =>  $s_details['driver_id'],
                    'company_id'    =>  $s_details['company_id'],
                    'site_id'       =>  $site->id,
                    'weighed'       =>  $_weighed,
                    'weight_unit'   =>  $s_details['weight_unit'],
                    'weight'        =>  $s_details['weight'],
                    'cost'          =>  $_cost_transporter,
                    'quary_cost'    =>  $_cost_quary,
                    'description'   =>  $s_details['note'],
                    'status'        =>  'complete',
                    'processed'     =>  1,
                    'departed_at'   =>  Carbon::now()->toDateTimeString(),
                    'arrived_at'    =>  Carbon::now()->toDateTimeString(),

                    'created_by'    =>  \Auth::user()->id,
                    'closed_by'     =>  \Auth::user()->id,
                ]);

            } else {

                // duplicate record in less than 45 minutes
                // create new shipment fraud alert
                $alert = $truck->alerts()->create([
                    'type'      =>  'shipment',
                    'user_id'   =>  \Auth::user()->id,
                ]);

                $status = 'error';
                $shipment = null;

            }

            return response()->json([
                'status'    =>  $status,
                'data'      =>  [
                    'shipment'   =>  $shipment
                ]
            ]);

        }
    	
    }

    private function _estimateShipmentCost_transporter($truck, $_material)
    {
        $_cost = 0;

        // cost = net weight * rate
        // net weight = gross - empty
        // gross weight = max weight + tonnage allowance
        $allowance = Settings::where('name', 'allowance - ' . $_material)->first()->value;
        $max_weight = Settings::where('name', 'max_weight - ' . $truck->type)->first()->value;

        $_gross = $max_weight + $allowance;

        $_net = $_gross - $truck->weight;

        $_cost = $_net * $truck->rate;

        return (FLOAT) $_cost;
    }

    private function _estimateShipmentCost_quary($site, $truck, $_material)
    {
        $_cost = 0;

        $allowance = Settings::where('name', 'allowance - ' . $_material)->first()->value;
        $max_weight = Settings::where('name', 'max_weight - ' . $truck->type)->first()->value;

        $_gross = $max_weight + $allowance;

        $_net = $_gross - $truck->weight;

        $_cost = $_net * $site->rate;

        return (FLOAT) $_cost;
    }

    public function shipments_by_user()
    {
        $shipments = \Auth::user()->shipments()->with('truck', 'site')->paginate(5);

        return view('user.shipments', compact('shipments'));
    }

    public function print_by_uid($uid)
    {
        $shipment = Shipment::where('uid', $uid)->firstorFail();

        return view('shipments.print', compact('shipment'));
    }
}
