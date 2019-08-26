<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ride extends Model
{
    //
    protected $fillable = [
        'ref',
        'ride_type',
        'ride_status',
        'ride_category_id',
        'payment_type',
        'amount_paid',
        'amount_owed',
        'payment_status',
        'pickup_address',
        'pickup_city',
        'pickup_date',
        'pickup_time',
        'drop_address',
        'drop_city',
        'return_date',
        'return_time',
        'requests',
        'client_id',
    ];

    public function client(){
        return $this->belongsTo("App\Client", "client_id");
    }
    public function getTotalAmountAttribute(){
        return $this->amount_paid + $this->amount_owed;
    }
    public function category(){
        return $this->belongsTo("App\TripCategory", "ride_category_id");
    }

    public function bids(){
        return $this->hasMany("App\Bid", "ride_id");
    }

    public static function total_rides(){
        return Ride::where("payment_status", "SUCCESS")->where("ride_status", "ENDED")->count();
    }
    public static function total_earned(){
        return array_reduce(Ride::where("payment_status", "SUCCESS")->where("ride_status", "ENDED")->get()->all(), function ($acc, $ride){
            return $acc + $ride->total_amount;
        }, 0);
    }
}
