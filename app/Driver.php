<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Driver extends Authenticatable
{
    //
    use Notifiable;
    protected $guard = 'driver';
    protected $fillable = ['name', 'email', 'password', 'address', 'phone', 'is_approved', 'is_active'];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getStatusAttribute(){
        $status = "";
        if ($this->is_approved) $status .= "Approved, ";
        else $status .= "Un-Approved, ";

        if ($this->is_active) $status .= "Active";
        else $status .= "In-Active";

        return $status;
    }

    public function car(){
        return $this->hasOne("App\Car", "driver_id");
    }

    public function bids(){
        return $this->hasMany("App\Bid", "driver_id");
    }


    public function getTotalRidesAttribute(){
        return $this->bids()->where("status", "ENDED")->count();
    }

    public function getTotalEarningsAttribute(){
        return array_reduce($this->bids()->where("status", "ENDED")->with("ride")->get()->all(), function($acc, $bid){
            return $acc + $bid->ride->total_amount;
        }, 0);
    }

    public function getPendingBidsAttribute(){
        return $this->bids()->where("status", "PENDING")->whereHas("ride", function($q){
            $q->where("payment_status", "SUCCESS")->where("ride_status", "BOOKED");
        })->count();
    }

    public function getApprovedBidsAttribute(){
        return $this->bids()->where("status", "APPROVED")->whereHas("ride", function($q){
            $q->where("payment_status", "SUCCESS")->where("ride_status", "APPROVED");
        })->count();
    }

    public static function total_drivers(){
        return Driver::where("is_approved", true)->where("is_active", true)->count();
    }
}
