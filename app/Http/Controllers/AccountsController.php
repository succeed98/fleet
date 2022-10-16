<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Truck;
use App\Models\Company;
use App\Models\Fueling;

class AccountsController extends Controller
{

    public function index()
    {
    	$entries = Fueling::with('truck', 'company')->paginate(5);

        return view('accounts.index', compact('entries'));
    }

    public function create()
    {
    	$trucks = Truck::all();
    	$companies = Company::all();

    	return view('accounts.create', compact('trucks', 'companies'));
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
            'truck_id'    => 'required',
            'company_id'  => 'required',
            'fuel'  	  => 'required',
            'cost'  	  => 'required'
        ]);

        $entry = Fueling::create([
            'truck_id'      =>  $request->input('truck_id'),
            'company_id'	=>  $request->input('company_id'),    
            'fuel'			=>  $request->input('fuel'),
            'cost'   		=>  $request->input('cost'),
            'note'   		=>  $request->input('note')
        ]);

        return redirect()->back()->with('success', 'New Entry Successfully Recorded');
    }

    public function destroy($id)
    {
    	Fueling::destroy($id);

    	return redirect()->back()->with('warning', 'Entry Deleted !');
    }

}
