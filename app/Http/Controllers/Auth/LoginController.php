<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware("guest:admin")->except("logout");
        $this->middleware("guest:driver")->except("logout");
    }

    public function showAdminLoginForm()
    {
        return view('admin.auth.login');
    }

    public function adminLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->intended('/admin/dashboard');
        }
        return $this->sendFailedLoginResponse($request);
    }

    public function showDriverLoginForm()
    {
        return view('driver.auth.login');
    }

    public function driverLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('driver')->attempt(['email' => $request->email, 'password' => $request->password, 'is_approved'=>1,'is_active'=>1], $request->get('remember'))) {
            return redirect()->intended('/driver/dashboard');
        }
        return $this->sendFailedLoginResponse($request);
    }

    public function logout(Request $request)
    {
        $guard = '';
        if(Auth::guard('admin')->check()){
            $guard = 'admin';
        }elseif(Auth::guard('driver')->check()){
            $guard = 'driver';
        }
        $this->guard()->logout();

        $request->session()->invalidate();

        if($guard === 'admin'){
            return redirect('/login/admin');
        }elseif($guard === 'driver'){
            return redirect('/login/driver');
        }
    }
}
