<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    //
    protected $fillable = ['small_heading', 'big_heading', 'paragraph', 'is_clear'];

    public function photo(){
        return $this->morphOne('App\Photo','photoable');
    }

    public function getImageAttribute(){
        return $this->photo? asset(str_replace('public', 'storage', $this->photo->path)):'https://via.placeholder.com/500x250';
    }
}
