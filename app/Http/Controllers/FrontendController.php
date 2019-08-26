<?php

namespace App\Http\Controllers;

use App\Media;
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
        $media = Media::latest()->take(6)->get();
        return view("frontend.about", compact("media"));
    }

    /*Services Section*/
    public function services(){
        return view("frontend.services");
    }

    /*Gallery Section*/
    public function gallery(){
        $media = Media::all();
        return view("frontend.gallery", compact("media"));
    }

    /*Contact Section*/
    public function contact(){
        return view("frontend.contact");
    }
}
