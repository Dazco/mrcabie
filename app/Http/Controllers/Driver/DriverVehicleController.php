<?php

namespace App\Http\Controllers\Driver;

use App\TripCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class DriverVehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $request->validate([
            'model'=> ['required', 'string', 'max:255'],
            'plate_number' => ['required', 'string', 'max:255'],
            'category_id' => ['required']
        ]);
        $driver = Auth::guard("driver")->user();
        if($driver->car()->updateOrCreate(['driver_id'=>$driver->id], $request->all())){
            Session::flash("alert-success", "Your Vehicle has been updated successfully");
        }else{
            Session::flash("alert-failure", "Your Vehicle couldn't be uploaded at the time, please try again later");
        }
        return redirect()->back();
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

    public function manage()
    {
        //
        $car = Auth::guard("driver")->user()->car()->with("category")->first();
        $categories = TripCategory::all();
        return view("driver.vehicle.show", compact("car", "categories"));
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
