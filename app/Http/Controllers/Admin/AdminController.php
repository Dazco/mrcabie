<?php

namespace App\Http\Controllers\Admin;

use App\Banner;
use App\ReadBefore;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    //

    /*Dashboard*/
    public function dashboard(){
        return view("admin.dashboard");
    }

    /*Banner */
    public function banner_get(){
        $banner = Banner::first();
        return view("admin/banner", compact("banner"));
    }

    public function banner_post(Request $request, $id=null){
        $update = false;
        $request->validate([
            'small_heading'=>'required',
            'big_heading'=>'required',
            'is_clear'=>'required',
            'photo'=>'image',
        ]);

        $data = $request->all();

        $data['is_clear'] = (bool) $data['is_clear'];
        if($id == null){
            $banner = Banner::create($data);
        }else{
            $banner = Banner::updateOrCreate(['id'=>$id],$data);
            $update = true;
        }

        if($request->hasFile('photo') && $request->file('photo')->isValid()){
            $file = $request->file('photo');
            $path = $file->storePublicly('public/uploads/images/banner');

            if($update){
                if($banner->photo) {
                    if (Storage::exists($banner->photo->path)) Storage::delete($banner->photo->path);
                }
                $banner->photo? $banner->photo->delete():'' ;
            }
            $banner->photo()->create(['path'=>$path]);
        }

        Session::flash("alert-success", "Your Banner has successfully been updated");
        return redirect()->back();
    }
    /*End of Banner*/
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
