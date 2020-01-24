<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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
    $this->validate($request, [
        'email' => ['required', 'string', 'email', 'max:50'],
        'password' => ['required', 'string', 'max:50'] ,
    ]);

    $remember_me = $request->has('remember') ? true : false; 

    if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember_me)) {
        $user = Auth::user();
        Log::info("Login succeeded");
       return redirect()->intended('users');
    }
    else{
        Log::info("Login failed");
        return redirect()->intended('login')
           ->with('loginError', 'Email or password is incorrect!');
    }
   }

} 








