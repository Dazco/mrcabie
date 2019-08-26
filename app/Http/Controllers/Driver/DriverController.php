<?php

namespace App\Http\Controllers\Driver;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DriverController extends Controller
{
    //
    public function dashboard(){
        $driver = Auth::guard("driver")->user();
        return view("driver.dashboard", compact("driver"));
    }
}
