<?php

namespace App\Http\Controllers\Admin;

use App\Trip;
use App\TripCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Session;

class AdminTripController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $trips = Trip::orderBy("source")->get()->all();
        return view("admin.trips.index", compact("trips"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = TripCategory::all();
        return view("admin.trips.create", compact("categories"));
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
            'source' => 'required',
            'destination' => 'required',
        ]);
        $data = [
            'source' => $request->source,
            'destination' => $request->destination,
        ];
        $categories = TripCategory::all();
        if($trip = Trip::firstOrCreate($data)){
            $data = $request->all();
            foreach($categories as $category){
                if(!array_key_exists("category_".(string)$category->id, $data)) continue;
                $trip->prices()->updateOrCreate(['trip_category_id' => $category->id],[
                    'trip_category_id' => $category->id,
                    'amount' => $data["category_".(string)$category->id]
                ]);
            }
            Session::flash("alert-success", "The trip '$trip->source' to '$trip->destination' has been added");
        }else{
            Session::flash("alert-failure", "Something went wrong, please try again later");
        }
        return redirect("admin/trips");
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
        $categories = TripCategory::all();
        $trip = Trip::findOrFail($id);
        return view("admin.trips.show", compact('trip','categories'));
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
        $request->validate([
            'source' => 'required',
            'destination' => 'required',
        ]);
        $data = [
            'source' => $request->source,
            'destination' => $request->destination,
        ];
        $categories = TripCategory::all();
        if($trip = tap(Trip::findOrFail($id))->update($data)){
            $data = $request->all();
            foreach($categories as $category){
                if(!array_key_exists("category_".(string)$category->id, $data)) continue;
                $trip->prices()->where("trip_category_id", $category->id)->updateOrCreate([
                    'trip_category_id' => $category->id,
                    ],
                    [
                    'trip_category_id' => $category->id,
                    'amount' => $data["category_".(string)$category->id
                    ]]);
            }
            Session::flash("alert-success", "The trip '$trip->source' to '$trip->destination' has been updated");
        }else{
            Session::flash("alert-failure", "Something went wrong, please try again later");
        }
        return redirect("admin/trips");
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
        if($trip = tap(Trip::findOrFail($id))->delete()){
            Session::flash('alert-success',"The Trip '$trip->source' to '$trip->destination' has been deleted");
        }else{
            Session::flash('alert-failure',"Sorry Something went wrong, please try again later.");
        }
        return redirect("admin/trips");
    }
}
