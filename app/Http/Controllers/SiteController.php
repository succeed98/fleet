<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Site;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('sites.index', [
            'sites'  =>  Site::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sites.create');
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
            'name'    => 'required|string|max:255',
            'rate'    => 'required',
        ]);

        $site = Site::create([
            'name'      =>  $request->input('name'),
            'type'      =>  $request->input('type'),    
            'telephone' =>  $request->input('telephone'),
            'address'   =>  $request->input('address'),
            'email'     =>  $request->input('email'),
            'rate'      =>  $request->input('rate'),
        ]);

        return redirect()->back()->with('success', 'New Site Successfully Added');
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
        $site = Site::find($id);
        return view('sites.edit', compact('site'));
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
        $site = Site::find($id);

        $site->type = $request->input('type');
        $site->name = $request->input('name');
        $site->telephone = $request->input('telephone');
        $site->address = $request->input('address');
        $site->email = $request->input('email');
        $site->rate = $request->input('rate');

        $site->save();

        return redirect()->back()->with('info', 'Site Details Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
