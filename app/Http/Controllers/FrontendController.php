<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Media;
use App\Slideshow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FrontendController extends Controller
{
    //
    /*Homepage Section*/
    public function index(){
        $banner = Banner::first();
        return view("frontend.index", compact("banner"));
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

    /*Oneway Cabs Section*/
    public function oneway_cabs(){
        $media = Slideshow::latest()->get();
        return view("frontend.oneway_cabs", compact('media'));
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
    public function contact_post(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required'
        ]);

        Mail::raw($request->message, function ($message) use($request){
            $message->subject($request->subject)->from($request->email)->to("info@mrcabie.com");
        });
        return "Your Message has been sent successfully";
    }

    public function cancellation(){
        return view("frontend.cancellation");
    }
}
