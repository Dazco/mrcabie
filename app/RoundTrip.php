<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoundTrip extends Model
{
    //
    protected $fillable = ['trip_category_id', 'base_distance', 'base_amount', 'extra_amount'];

    public $distance, $days;

    public function category(){
        return $this->belongsTo("App\TripCategory", "trip_category_id");
    }
    
    public function setDistance($dist){
        $this->distance = ceil(2 * $dist);
    }

    public function getAmountAttribute(){
        $factor =  intdiv($this->distance, $this->base_distance);

        $amount = ($this->distance * $this->extra_amount) + (($this->days - $factor) * $this->base_amount);

        return $amount;
    }

}
