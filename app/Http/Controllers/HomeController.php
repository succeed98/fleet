<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DNS1D;
use DNS2D;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('trucks.print');
        return view('home');
    }

}
