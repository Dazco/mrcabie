<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TripCategory extends Model
{
    //
    protected $fillable = ['name','car','seats','bags','waiting','extra_dist'];

    public function photo(){
        return $this->morphOne('App\Photo','photoable');
    }

    public function getImageAttribute(){
        return $this->photo? asset(str_replace('public', 'storage', $this->photo->path)):'https://via.placeholder.com/500x250';
    }
}
