<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Alert;

class AdminController extends Controller
{

    public function alerts()
    {
        return view('admin.alert', [
            'alerts'  =>  Alert::with('user', 'truck')->get()
        ]);
    }

}
