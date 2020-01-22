<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
// use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Log;

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
    protected $redirectTo = '/users';
    // protected $redirectTo = RouteServiceProvider::USER;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
  
        if (Auth::attempt($request->validate([
            'email' => 'required','max:50',
            'password' => 'required','max:50',])
        )){
            Log::info("Login succeeded");
  
             return redirect()->intended('users');
        }
    //   if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
    //     // Authentication passed...
    //     Log::info("Login succeeded");
  
    //     return redirect()->intended('users');
    //   }
      Log::info("Login failed");
      return redirect()->intended('login')
        ->with('loginError', 'Email or password is incorrect!');
  
    }

} 
