<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    //
    protected $fillable = ['driver_id', 'category_id', 'model', 'plate_number'];

    public function category(){
        return $this->belongsTo("App\TripCategory", "category_id");
    }
}
