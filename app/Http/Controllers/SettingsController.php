<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SettingsController extends Controller
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $settings = [];

        foreach (Settings::all() as $value) {
            $settings[$value->name] = $value['value'];
        }

        return view('settings/create', [
            'settings'    =>  $settings
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $measures = [
            'max_weight'    =>  ['3 Axel', '4 Axel'],
            'allowance'     =>  ['Boulders', '0.500'],
        ];

        // i.e.
        // max_weight[3 Axel]
        // allowance[Boulders]

        foreach ($measures as $measure => $metrics) {
            foreach ($metrics as $metric) {
                Settings::updateOrCreate([
                    'name'  =>  $measure . ' - ' . $metric
                ], [
                    'value' =>  $request->input($measure)[$metric]
                ]);
            }
        }

        return redirect()->back()->with('success', 'Settings Updated');

    }

    
}
