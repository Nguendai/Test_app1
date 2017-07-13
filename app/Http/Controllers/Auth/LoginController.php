<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    // public function login(Request $request){

    //     $this->validateLogin($request);

    //     $email=$request->email;
    //     $password= $request->password;  

    //     if (Auth::attempt(['email' => $email, 'password' => $password])) {
    //         if(Auth::user()->level==1){
    //             return redirect()->route('home');
    //         }else{
    //             dd(2);
    //         }
    //     }else{
    //         return redirect()->route('login');
    //     }
    // }
    // protected function validateLogin(Request $request)
    // {
    //     $this->validate($request, [
    //         $this->username() => 'required|string',
    //         'password' => 'required|string',
    //     ]);
    // }
}
