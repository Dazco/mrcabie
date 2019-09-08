<?php

namespace App\Http\Controllers\Admin;

use App\Bid;
use App\Driver;
use App\Notifications\BidApproved;
use App\Ride;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class AdminRideController extends Controller
{
    //
    public function index(){
        $rides = Ride::where("payment_status", "SUCCESS")->where("ride_status", "BOOKED")->with("bids")->with("client")->paginate(15);
        $page = "BOOKED";
        return view("admin.rides.index", compact("rides", "page"));
    }

    public function approved(){
        $rides = Ride::where("payment_status", "SUCCESS")->where("ride_status", "APPROVED")->with("bids")->with("client")->latest()->paginate(15);
        $page = "APPROVED";
        return view("admin.rides.index", compact("rides", "page"));
    }

    public function started(){
        $rides = Ride::where("payment_status", "SUCCESS")->where("ride_status", "STARTED")->with("bids")->with("client")->latest()->paginate(15);
        $page = "STARTED";
        return view("admin.rides.index", compact("rides", "page"));
    }

    public function ended(){
        $rides = Ride::where("payment_status", "SUCCESS")->where("ride_status", "ENDED")->with("bids")->with("client")->latest()->paginate(15);
        $page = "ENDED";
        return view("admin.rides.index", compact("rides", "page"));
    }

    public function search(Request $request){
        $request->validate([
            'ride_number' => 'required'
        ]);
        $rides = Ride::where('id', $request->ride_number)->where("payment_status", "SUCCESS")->paginate();
        $page = "SEARCH";
        return view("admin.rides.index", compact("rides", "page"));
    }

    public function show($id){
        $ride = Ride::with("client")->with("category")->with("bids.driver.car.category")->findorFail($id);

        $bid = $ride->bids()->where("status","!=", "PENDING")->first();

        $drivers = Driver::where('is_approved', true)->where('is_active', true)->get();

        return view("admin.rides.show", compact("ride", "bid", "drivers"));
    }

    public function edit($id){
        $ride = Ride::findOrFail($id);
        return view("admin.rides.edit", compact("ride"));
    }

    public function update($id, Request $request){
        $request->validate([
            'pickup_address' => 'required|string',
            'pickup_date' => 'required|date',
            'pickup_time' => 'required',
            'drop_address' => 'required|string',
            'return_date' => 'date',
        ]);
        $ride = Ride::findOrFail($id);
        $ride->update($request->all());
        Session::flash("alert-success", "The Ride has been successfully updated");
        return redirect()->back();
    }

    public function assign($driver_id, $ride_id){
        $driver = Driver::findOrFail($driver_id);

        if(!$driver->car){
            Session::flash("alert-danger", "This driver doesn't have a vehicle. Please tell him to register one before assigning him");
            return redirect()->back();
        }
        $ride = Ride::findOrFail($ride_id);
        if($ride->ride_status == "APPROVED"){
            Session::flash("alert-danger", "This Ride already has a driver, please change the previous driver before selecting a new one.");
            return redirect()->back();
        }
        $bid = $driver->bids()->updateOrCreate(['driver_id'=>$driver->id, 'ride_id'=>$ride_id],['ride_id'=>$ride_id]);
        $this->select($bid->id);
    }

    public function select($id){
        //
        $bid = Bid::findOrFail($id);
        $ride = Ride::findOrFail($bid->ride->id);
        $bid->update(["status"=>"APPROVED"]);
        $ride->update(["ride_status"=>"APPROVED"]);
        $driver = $bid->driver;
        Session::flash("alert-success", "The Bid from $driver->name has been accepted");
        $driver->notify(new BidApproved($bid));
        return redirect()->back();
    }
    public function change($id){
        $bid = Bid::findOrFail($id);
        $ride = Ride::findOrFail($bid->ride->id);
        $bid->update(["status"=>"PENDING"]);
        $ride->update(["ride_status"=>"BOOKED"]);
        $driver = $bid->driver;
        Session::flash("alert-failure", "The previously accepted Bid from $driver->name has been rejected");
        return redirect()->back();
    }

    public function destroy($id){
        $ride = tap(Ride::findOrFail($id))->update(["ride_status"=>"CANCELED"]);
        $bids = $ride->bids()->get();
        if(count($bids)>0){
            foreach($bids as $bid){
                $bid->delete();
            }
        }
        Session::flash("alert-danger", "Ride #$ride->id has been canceled");
        return redirect("admin/rides");
    }
}
