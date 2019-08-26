<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoundTrip extends Model
{
    //
    protected $fillable = ['trip_category_id', 'base_distance', 'base_amount', 'extra_amount'];

    public $distance;

    public function category(){
        return $this->belongsTo("App\TripCategory", "trip_category_id");
    }
    
    public function setDistance($dist){
        $this->distance = 2 * $dist;
    }

    public function getAmountAttribute(){
        if($this->distance < $this->base_distance){
            $amount = $this->distance * $this->extra_amount;
        }elseif($this->distance > $this->base_distance){
            $extra_distance = $this->distance - $this->base_distance;
            $amount = $this->base_amount + ($extra_distance * $this->extra_amount);
        }else{
            $amount = $this->base_amount;
        }
        return ceil($amount);
    }

}
