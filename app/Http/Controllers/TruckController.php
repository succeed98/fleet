<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Truck;

class TruckController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('trucks.index', [
            'trucks'  =>  Truck::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('trucks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'make'    => 'required|string|max:255',
            'model'   => 'required|string|max:255',
            'color'   => 'required|string|max:255',
            'year'    => 'required|string|min:4|max:4',
            'rate'    => 'required',
            'type'    => 'required|string',
            'weight'  => 'required',
            // 'reg_no'  => 'string|max:255',
        ]);

        $truck = Truck::create([
            'make'    =>  $request->input('make'),
            'model'   =>  $request->input('model'),
            'color'   =>  $request->input('color'),
            'year'    =>  $request->input('year'),
            'reg_no'  =>  $request->input('reg_no'),
            'rate'    =>  $request->input('rate'),
            'type'    =>  $request->input('type'),
            'weight'  =>  $request->input('weight')
        ]);

        // generating truck no
        $part_1 = strtoupper(substr($request->input('make'), 0, 3)); // TOY
        $part_2 = strtoupper(substr($request->input('model'), 0, 1)); // C
        $part_3 = strtoupper(substr($request->input('color'), 0, 1)); // R
        $part_4 = strtoupper(substr($request->input('year'), 2, 2)); // 13

        $truck->truck_no = $part_1 . $part_2 . $part_3 . $part_4 . '/' . str_pad($truck->id, 3, '0', STR_PAD_LEFT);

        // set barcode
        $truck->barcode = $truck->id . rand(10000000, 99999);

        $truck->save();

        return redirect()->back()->with('success', 'New Truck Successfully Added');
    }

    public function print_barcodes(Request $request)
    {

        $_trucks = $request->input('trucks');

        if( is_array($_trucks) ) {

            $trucks = Truck::find($_trucks);

            return view('trucks.print', [
                'trucks'    =>  $trucks
            ]);
        }

        return redirect()->back()->with('warning', 'No Truck(s) Selected For Printing!');

    }

    public function destroy_batch(Request $request)
    {

        $_trucks = $request->input('trucks');

        if( is_array($_trucks) ) {

            $trucks = Truck::destroy($_trucks);

            return redirect()->back()->with('success', 'Specified Truck(s) Successfully Deleted!');

        }

        return redirect()->back()->with('warning', 'No Truck(s) Selected For Deleting!');

    }

    public function truck_by_barcode(Request $request)
    {
        
        if( $request->ajax() ) {

            $truck = Truck::where('barcode', $request->truck)->first();

            return response()->json([
                'truck'   =>  $truck
            ]);
        } else {
            abort(404);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $truck = Truck::find($id);
        return view('trucks.edit', compact('truck'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $truck = Truck::find($id);

        $truck->make = $request->input('make');
        $truck->model = $request->input('model');
        $truck->year = $request->input('year');
        $truck->color = $request->input('color');
        $truck->type = $request->input('type');
        $truck->rate = $request->input('rate');
        $truck->reg_no = $request->input('reg_no');
        $truck->weight = $request->input('weight');

        $truck->save();

        return redirect()->back()->with('info', 'Truck Details Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd('destroy');
    }
}
