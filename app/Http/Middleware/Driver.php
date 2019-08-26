<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Driver
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if( Auth::guard('driver')->check()){
            $driver = Auth::guard('driver')->user();
            if($driver->is_approved && $driver->is_active) return $next($request);
        }
        return redirect("login/driver");
    }
}
