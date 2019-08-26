<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Client extends Model
{
    //
    use Notifiable;
    protected $fillable = ['name', 'email', 'phone'];

    public function rides(){
        return $this->hasMany("App\Ride", "client_id");
    }

    public static function total_clients(){
        return Client::count();
    }

    public function routeNotificationForNexmo($notification)
    {
        return $this->phone;
    }
}
