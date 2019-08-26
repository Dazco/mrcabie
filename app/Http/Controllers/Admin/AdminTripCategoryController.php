<?php

namespace App\Http\Controllers\Admin;

use App\TripCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class AdminTripCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = TripCategory::all();
        return view("admin.trip_categories.index", compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("admin.trip_categories.create");
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
        $request->validate([
            'name' => ['required','unique:trip_categories,name'],
            'photo' => 'required|image',
            'car' => 'required',
            'seats' => 'required',
            'bags' => 'required',
            'waiting' => 'required',
            'extra_dist' => 'required'
        ],[
            'extra_dist.required' => 'The Extra KM Charge field is required'
        ]);

        if($request->hasFile('photo') && $request->file('photo')->isValid()){
            $file = $request->file('photo');
            if($category = TripCategory::create($request->all())){
                $path = $file->storePublicly('public/uploads/images/categories');
                $category->photo()->create(['path'=>$path]);
                Session::flash('alert-success',"The Category '$category->name' has been added");
            }else{
                Session::flash('alert-failure',"Sorry Something went wrong, please try again later.");
            }
        }else{
            dd($request->photo);
            Session::flash('alert-failure',"Sorry Something went wrong, please try again later.");
        }
        return redirect("admin/categories");
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
        $category = TripCategory::findOrFail($id);
        return view("admin.trip_categories.edit", compact("category"));
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
        $request->validate([
            'name' => ['required',Rule::unique('trip_categories')->ignore($id)],
            'photo' => 'image',
            'car' => 'required',
            'seats' => 'required',
            'bags' => 'required',
            'waiting' => 'required',
            'extra_dist' => 'required'
        ],[
            'extra_dist.required' => 'The Extra KM Charge field is required'
        ]);

        $category = TripCategory::findOrFail($id);

        if($request->hasFile('photo') && $request->file('photo')->isValid()){
            $file = $request->file('photo');
            $path = $file->storePublicly('public/uploads/images/categories');
            if($category->photo) {
                if (Storage::exists($category->photo->path)) Storage::delete($category->photo->path);
            }
            $category->photo()->update(['path'=>$path]);
        }

        if(tap($category)->update($request->all())){
            Session::flash('alert-success',"The Category '$category->name' has been updated");
        }else{
            Session::flash('alert-failure',"Sorry Something went wrong, please try again later.");
        }

        return redirect("admin/categories");
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
        $category = TripCategory::findOrFail($id);
        if($category->photo) {
            if (Storage::exists($category->photo->path)) Storage::delete($category->photo->path);
            $category->photo()->first()->delete();
        }
        if(tap($category)->delete()){
            Session::flash('alert-success',"The Category '$category->name' has been deleted");
        }else{
            Session::flash('alert-failure',"Sorry Something went wrong, please try again later.");
        }
        return redirect("admin/categories");
    }
}
