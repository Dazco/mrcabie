<?php

namespace App\Http\Controllers\Admin;

use App\Bid;
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

        return view("admin.rides.show", compact("ride", "bid"));
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
}
