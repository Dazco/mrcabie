<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    //
    /*Homepage Section*/
    public function index(){
        return view("frontend.index");
    }
    /*About Section*/
    public function about(){
        return view("frontend.about");
    }
    /*Services Section*/
    public function services(){
        return view("frontend.services");
    }
    /*Gallery Section*/
    public function gallery(){
        return view("frontend.gallery");
    }
    /*Contact Section*/
    public function contact(){
        return view("frontend.contact");
    }
    /*Car_Select section*/
    public function select(){
        return view("frontend.select");
    }
    /*Pay_Now section*/
    public function paynow(){
        return view("frontend.paynow");
    }
}
