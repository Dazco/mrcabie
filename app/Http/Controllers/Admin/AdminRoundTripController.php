<?php

namespace App\Http\Controllers\Admin;

use App\RoundTrip;
use App\TripCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class AdminRoundTripController extends Controller
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
        return view("admin.round_trips.index", compact("categories"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
        /*$request->validate([
        ]);*/
        $categories = TripCategory::all();
        $data = $request->all();
        foreach($categories as $category){
            if(
                !array_key_exists("dist_category_".(string)$category->id, $data) ||
                !array_key_exists("base_category_".(string)$category->id, $data) ||
                !array_key_exists("extra_category_".(string)$category->id, $data)
            ) continue;
            RoundTrip::where("trip_category_id", $category->id)->updateOrCreate([
                'trip_category_id' => $category->id
            ],[
                'trip_category_id' => $category->id,
                'base_distance' => $data["dist_category_".(string)$category->id],
                'base_amount' => $data["base_category_".(string)$category->id],
                'extra_amount' => $data["extra_category_".(string)$category->id],
            ]);
            Session::flash("alert-success", "The Round Trip settings have been saved");
        }
        return redirect("admin/round_trips");
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
}
