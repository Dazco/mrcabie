<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    //
    protected $fillable = ['source', 'destination'];

    public function prices(){
        return $this->hasMany("App\Price");
    }
}
