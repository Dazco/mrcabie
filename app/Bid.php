<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    //
    protected $fillable = ['driver_id', 'ride_id', 'status'];

    public function driver(){
        return $this->belongsTo("App\Driver", "driver_id");
    }

    public function ride(){
        return $this->belongsTo("App\Ride", "ride_id");
    }
}
