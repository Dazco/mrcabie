<?php

namespace App\Http\Controllers\Driver;

use App\Admin;
use App\Bid;
use App\Notifications\BidWithdrawn;
use App\Notifications\NewBid;
use App\Notifications\RideEnded;
use App\Notifications\RideStarted;
use App\Ride;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Session;

class DriverRideController extends Controller
{
    //
    public function index(){
        $driver = Auth::guard("driver")->user();
        $rides = Ride::where("payment_status", "SUCCESS")->where("ride_status", "BOOKED")->whereDoesntHave("bids", function(Builder $q) use ($driver){
            $q->where("driver_id", $driver->id);
        })->with("client")->paginate(15);
        $page = "NEW";
        return view("driver.rides.index", compact("rides", "page"));
    }

    public function pending(){
        $driver = Auth::guard("driver")->user();
        $rides = Ride::where("payment_status", "SUCCESS")->where("ride_status", "BOOKED")->whereHas("bids", function(Builder $q) use ($driver){
            $q->where("driver_id", $driver->id)->where("status", "PENDING");
        })->with("client")->paginate(15);
        $page = "PENDING";
        return view("driver.rides.index", compact("rides", "page"));
    }

    public function approved(){
        $driver = Auth::guard("driver")->user();
        $rides = Ride::where("payment_status", "SUCCESS")->where("ride_status", "APPROVED")->whereHas("bids", function(Builder $q) use ($driver){
            $q->where("driver_id", $driver->id)->where("status", "APPROVED");
        })->with("client")->latest()->paginate(15);
        $page = "APPROVED";
        return view("driver.rides.index", compact("rides", "page"));
    }

    public function started(){
        $driver = Auth::guard("driver")->user();
        $rides = Ride::where("payment_status", "SUCCESS")->where("ride_status", "STARTED")->whereHas("bids", function(Builder $q) use ($driver){
            $q->where("driver_id", $driver->id)->where("status", "STARTED");
        })->with("client")->latest()->paginate(15);
        $page = "STARTED";
        return view("driver.rides.index", compact("rides", "page"));
    }

    public function ended(){
        $driver = Auth::guard("driver")->user();
        $rides = Ride::where("payment_status", "SUCCESS")->where("ride_status", "ENDED")->whereHas("bids", function(Builder $q) use ($driver){
            $q->where("driver_id", $driver->id)->where("status", "ENDED");
        })->with("client")->latest()->paginate(15);
        $page = "ENDED";
        return view("driver.rides.index", compact("rides", "page"));
    }

    public function search(Request $request){
        $request->validate([
            'ride_number' => 'required'
        ]);
        $rides = Ride::where('id', $request->ride_number)->where("payment_status", "SUCCESS")->paginate();
        $page = "SEARCH";
        return view("driver.rides.index", compact("rides", "page"));
    }

    public function history(){
        $driver = Auth::guard("driver")->user();
        $rides = Ride::where("payment_status", "SUCCESS")->where("ride_status", "ENDED")->whereHas("bids", function(Builder $q) use ($driver){
            $q->where("driver_id", $driver->id)->where("status", "ENDED");
        })->with("client")->orderBy("updated_at", "DESC")->paginate(15);
        return view("driver.rides.history", compact("rides", "driver"));
    }

    public function show($id){
        $driver = Auth::guard("driver")->user();
        $ride = Ride::with("client")->with("category")->findorFail($id);
        $bid =  Bid::where("driver_id", $driver->id)->where("ride_id",$ride->id)->first();
        return view("driver.rides.show", compact("ride", "bid"));
    }

    public function apply($id){
        $driver = Auth::guard("driver")->user();
        $bid = $driver->bids()->updateOrCreate(['driver_id'=>$driver->id, 'ride_id'=>$id],['ride_id'=>$id]);
        Session::flash("alert-success", "Your bid has been submitted successfully. Await approval from administration");
        Notification::send(Admin::all(), new NewBid($bid));
        return redirect()->back();
    }

    public function withdraw($id){
        $driver = Auth::guard("driver")->user();
        $bid = $driver->bids()->findOrfail($id);
        if($bid->status == "APPROVED"){
            Ride::findOrFail($bid->ride->id)->update(["ride_status", "BOOKED"]);
        }
        if($bid->status == "PENDING" || $bid->status == "APPROVED"){
            Notification::send(Admin::all(), new BidWithdrawn($bid));
            $bid->delete();
            Session::flash("alert-failure", "Your bid for this ride has been withdrawn.");
        }else{
            Session::flash("alert-failure", "You can no longer withdraw your bid for this ride.");
        }
        return redirect()->back();
    }

    public function start($id){
        //
        $bid = Bid::findOrFail($id);
        $ride = Ride::findOrFail($bid->ride->id);
        $bid->update(["status"=>"STARTED"]);
        $ride->update(["ride_status"=>"STARTED"]);
        Session::flash("alert-success", "You have started this ride. Drive Safely!.");

        $ride->client->notify(new RideStarted($bid));
        return redirect()->back();
    }

    public function end($id){
        $bid = Bid::findOrFail($id);
        $ride = Ride::findOrFail($bid->ride->id);
        $bid->update(["status"=>"ENDED"]);
        $ride->update(["ride_status"=>"ENDED"]);
        Session::flash("alert-success", "You have ended this ride.");
        $ride->client->notify(new RideEnded($bid));
        $bid->driver->notify(new RideEnded($bid));
        Notification::send(Admin::all(), new RideEnded($bid));
        return redirect()->back();
    }
}
