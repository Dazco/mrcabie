<?php

namespace App\Http\Controllers\Admin;

use App\ReadBefore;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    //

    /*Dashboard*/
    public function dashboard(){
        return view("admin.dashboard");
    }
    /*Read Before You Look Settings*/
    public function read_before_you_book_get(){
        $content = ReadBefore::first();
        return view("admin/read_before_you_book", compact("content"));
    }
    public function read_before_you_book_post(Request $request ,$id){
        //
        $request->validate([
            'content'=>'required'
        ]);
        if($id == "null"){
            ReadBefore::create(['content'=>$request->all()['content']]);
        }else{
            ReadBefore::updateOrCreate(['id'=>$id],['content'=>$request->all()['content']]);
        }
        Session::flash("alert-success", "Your Content has successfully been updated");
        return redirect()->back();
    }
}
