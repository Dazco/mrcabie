<?php

namespace App\Http\Controllers\Admin;

use App\Slideshow;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class AdminSlideshowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //
        $media = Slideshow::all();
        return view('admin.slideshow.index',compact('media'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.slideshow.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $request->all();
        $request->validate([
            'photo' => 'required|image',
        ]);
        if($request->hasFile('photo') && $request->file('photo')->isValid()){
            $file = $request->file('photo');

            $media = Slideshow::create([]);
            $path = $file->storePublicly('public/uploads/images/slideshow');
            $media->photo()->create(['path'=>$path]);
        }
        Session::flash('alert-success',"The image has been added to the slideshow");
        return redirect('admin/slideshow');
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
        //
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
        //
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

    public function multiDestroy(Request $request){
        if(!array_key_exists("delete-me", $request->all())){
            Session::flash("alert-danger", "Please Select 1 or more images from the list you want to delete");
            return redirect()->back();
        }
        foreach ($request->all()['delete-me'] as $mediaId){
            $media = Slideshow::findOrfail($mediaId);
            if($media->photo) {
                if (Storage::exists($media->photo->path)) Storage::delete($media->photo->path);
            }
            $media->photo? $media->photo->delete():'' ;
            $media->delete();
        }
        Session::flash('alert-danger',"Slideshow Image(s) has(ve) been deleted");
        return redirect('admin/slideshow');
    }
}
