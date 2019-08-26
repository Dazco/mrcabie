<?php

namespace App\Http\Controllers\Admin;

use App\Driver;
use App\Ride;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class AdminDriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $drivers = Driver::where('is_approved', true)->where('is_active', true)->get();
        return view("admin.drivers.index", compact('drivers'));
    }

    public function unapproved(){
        $drivers = Driver::where('is_approved', false)->get();
        return view("admin.drivers.index", compact('drivers'));
    }
    public function in_active(){
        $drivers = Driver::where('is_active', false)->get();
        return view("admin.drivers.index", compact('drivers'));
    }

    public function history($id){
        $driver = Driver::findOrFail($id);
        $rides = Ride::where("payment_status", "SUCCESS")->where("ride_status", "ENDED")->whereHas("bids", function(Builder $q) use ($driver){
            $q->where("driver_id", $driver->id)->where("status", "ENDED");
        })->with("client")->orderBy("updated_at", "DESC")->paginate(15);
        return view("admin.drivers.history", compact("rides", "driver"));
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
        $driver = Driver::findOrFail($id);
        return view("admin.drivers.show", compact("driver"));
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
        $driver = tap(Driver::findOrFail($id))->update($request->all());
        Session::flash("alert-succes", "$driver->name has been updated");
        return redirect()->back();
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
