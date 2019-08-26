<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    //
    protected $fillable = ["amount", "trip_id", "trip_category_id"];

    public function category(){
        return $this->belongsTo("App\TripCategory", "trip_category_id");
    }
}
