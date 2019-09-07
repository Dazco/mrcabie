<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Client;
use App\Driver;
use App\Notifications\RideBooked;
use App\ReadBefore;
use App\Ride;
use App\RoundTrip;
use App\Trip;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class RideController extends Controller
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

    /*Car_Select section*/
    public function select(Request $request){
        $request->validate([
            'trip' => 'required',
            'pickup_city' => 'bail|required|string',
            'drop_city' => 'bail|required|string',
            'pickup_date' => 'bail|required|date',
            'pickup_time' => 'bail|required|date_format:H:i',
            'return_date' => 'bail|required_if:trip,round|date|after:pickup_date',
            'return_time' => 'bail|required_if:trip,round|date_format:H:i'
        ]);
        $start    = new Carbon();
        $end  = new Carbon($request->pickup_date.' '.$request->pickup_time);

        if($start->diffInHours($end) <6 ){
            Session::flash("alert-danger", "To book a cab in less than 6 hours from now, please call us directly");
            return redirect()->back();
        }

        $trip = Trip::with("prices.category")->where("source", $request->pickup_city)->where("destination", $request->drop_city)->first();
        if($trip){
            $distance = (float)explode(" ", $trip->distance)[0];
            if($request->trip === "oneway"){
                $prices = $trip->prices;
            }elseif ($request->trip === "round"){
                $prices = RoundTrip::with("category")->get();
                $start  = new Carbon($request->pickup_date);
                $end  = new Carbon($request->return_date);
                foreach ($prices as $price){
                    $price->setDistance($distance);
                    $price->days = $start->diffInDays($end) + 1;
                }
            }
        }else{
            Session::flash("alert-danger", "Sorry We do not cover that trip, please call us directly for a personal booking");
            return redirect()->back();
        }

        $data = $request->all();
        $data["distance"] = $distance;
        return view("frontend.select", compact("data", "prices"));
    }

    /*Pay_Now section*/
    public function paynow(Request $request){
        $content = ReadBefore::first();
        $request->validate([
            'trip' => 'required',
            'pickup_city' => 'bail|required|string',
            'drop_city' => 'bail|required|string',
            'pickup_date' => 'bail|required|date',
            'pickup_time' => 'bail|required|date_format:H:i',
            'return_date' => 'bail|required_if:trip,round|date|after:pickup_date',
            'return_time' => 'bail|required_if:trip,round|date_format:H:i'
        ]);

        $trip = Trip::with(["prices" => function ($query){
            global $request;
            $query->where("trip_category_id", $request->category_id);
        }])->where("source", $request->pickup_city)->where("destination", $request->drop_city)->firstOrFail();
        if($request->trip === "oneway"){
            // do nothing for now
        }elseif ($request->trip === "round"){
            $price = RoundTrip::with("category")->where("trip_category_id", $request->category_id)->firstOrFail();
            $start  = new Carbon($request->pickup_date);
            $end  = new Carbon($request->return_date);
            $price->setDistance((float)explode(" ", $trip->distance)[0]);
            $price->days = $start->diffInDays($end) + 1;
            $trip = (object) [
                'source' => $request->pickup_city,
                'destination' => $request->drop_city,
                'prices' => [$price]
            ];
        }
        $trip->prices[0]->part_amount = ceil($trip->prices[0]->amount * 0.3);
        $data = $request->all();
        return view("frontend.paynow", compact("trip", "data", "content"));
    }

    /*Redirect To Payment Gateway*/
    public function redirectToPaymentGateway(Request $request){
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required',
            'pickup_address' => 'required',
            'drop_address' => 'required'
        ]);

        if(Str::startsWith($request->phone, "0")){
            $request->phone = Str::replaceFirst("0", "+91", $request->phone);
        }else{
            $request->phone = Str::start($request->phone,"+91");
        }


        $trip = Trip::with(["prices" => function ($query){
            global $request;
            $query->where("trip_category_id", $request->category_id);
        }])->where("source", $request->pickup_city)->where("destination", $request->drop_city)->firstOrFail();
        if($request->trip === "oneway"){
            $amount = $trip->prices[0]->amount;
            // do nothing for now
        }elseif ($request->trip === "round"){
            $price = RoundTrip::with("category")->where("trip_category_id", $request->category_id)->firstOrFail();
            $start  = new Carbon($request->pickup_date);
            $end  = new Carbon($request->return_date);
            $price->setDistance((float)explode(" ", $trip->distance)[0]);
            $price->days = $start->diffInDays($end) + 1;
            $amount = $price->amount;
        }

        $client = Client::updateOrCreate(['phone'=>$request->phone], [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone
        ]);
        $ride = $client->rides()->create([
            'ride_type' => $request->trip,
            'ride_category_id' => $request->category_id,
            'payment_type' => $request->payment,
            'amount_paid' => 0,
            'amount_owed' => $amount,
            'payment_status'=>'PENDING',
            'pickup_address' => $request->pickup_address,
            'pickup_city' => $request->pickup_city,
            'pickup_date' => $request->pickup_date,
            'pickup_time' => $request->pickup_time,
            'drop_address' => $request->drop_address,
            'drop_city' => $request->drop_city,
            'return_date' => $request->trip==="round"?$request->return_date:null,
            'return_time' => $request->trip==="round"?$request->return_time:null,
            'requests' => $request->requests?$request->requests:null,
        ]);

        if($request->payment == "part"){
            $amount = ceil($amount * 0.3);
        }
        // Generate Signature
        $secretKey = "ea90ad6f6e1c58a13f7b9c7e2f64dbc359e74267";
        $data = array(
            "appId" => "68544b8e9892704cd24832604586",
            "orderId" => $ride->id,
            "orderAmount" => $amount,
            "orderCurrency" => "INR",
            "orderNote" => "test",
            "customerName" => $client->name,
            "customerPhone" => $client->phone,
            "customerEmail" => $client->email,
            "returnUrl" => route("return"),
            "notifyUrl" => route("notify"),
        );
        // get secret key from your config
        ksort($data);
        $signatureData = "";
        foreach ($data as $key => $value){
            $signatureData .= $key.$value;
        }
        $signature = hash_hmac('sha256', $signatureData, $secretKey,true);
        $signature = base64_encode($signature);
        $data["signature"] = $signature;

        return view("frontend.redirect", compact("data"));
    }
    public function return(Request $request){
        $secretKey = "ea90ad6f6e1c58a13f7b9c7e2f64dbc359e74267";
        $orderId = $request->orderId;
        $orderAmount = $request->orderAmount;
        $referenceId = $request->referenceId;
        $txStatus = $request->txStatus;
        $paymentMode = $request->paymentMode;
        $txMsg = $request->txMsg;
        $txTime = $request->txTime;
        $signature = $request->signature;
        $data = $orderId.$orderAmount.$referenceId.$txStatus.$paymentMode.$txMsg.$txTime;
        $hash_hmac = hash_hmac('sha256', $data, $secretKey, true) ;
        $computedSignature = base64_encode($hash_hmac);
        if ($signature == $computedSignature) {
            $ride = Ride::findOrFail($request->orderId);
            if($request->txStatus === "SUCCESS" && $request->referenceId !== $ride->ref){
                $ride->amount_paid = $request->orderAmount;
                $ride->amount_owed -= $ride->amount_paid;
                $ride->payment_status = $request->txStatus;
                $ride->ref = $request->referenceId;
                $ride->save();
                //Notify
                $is_success = true;

                $ride->client->notify(new RideBooked($ride));
                Notification::send(Admin::all(), new RideBooked($ride));
                Notification::send(Driver::where("is_approved", true)->where("is_active",true)->get()->all(), new RideBooked($ride));
                return view("frontend.notify", compact("is_success"));
            }else{
                //notify
                $ride->payment_status = $request->txStatus;
                $ride->save();
                $is_success = false;
                $message = $request->txMsg;
                return view("frontend.notify", compact("is_success", "message"));
            }
        } else {
            return redirect()->back();
        }
    }
    public function notify(Request $request){
        $secretKey = "ea90ad6f6e1c58a13f7b9c7e2f64dbc359e74267";
        $orderId = $request->orderId;
        $orderAmount = $request->orderAmount;
        $referenceId = $request->referenceId;
        $txStatus = $request->txStatus;
        $paymentMode = $request->paymentMode;
        $txMsg = $request->txMsg;
        $txTime = $request->txTime;
        $signature = $request->signature;
        $data = $orderId.$orderAmount.$referenceId.$txStatus.$paymentMode.$txMsg.$txTime;
        $hash_hmac = hash_hmac('sha256', $data, $secretKey, true) ;
        $computedSignature = base64_encode($hash_hmac);
        if ($signature == $computedSignature) {
            $ride = Ride::findOrFail($request->orderId);
            if($request->txStatus != $ride->payment_status ){
                if($request->txStatus === "SUCCESS"){
                    $ride->amount_paid = $request->orderAmount;
                    $ride->amount_owed -= $ride->amount_paid;
                    $ride->payment_status = $request->payment_status;
                    $ride->ref = $request->referenceId;
                    $ride->save();
                    //Notify
                }else{
                    $ride->payment_status = $request->txStatus;
                    $ride->save();
                    //notify
                }
            }
        } else {
            return redirect()->back();
        }
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
