<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = "/backend/dashboard";

    /**
     * Create a new controller instance.
     *
     * @return void
     */


    public function showLoginForm()
    {
        if(Auth::check()){
            return redirect()->route('admin.backend.dashboard');
        }
        else{
            return view('backend.auth.login');
        }
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request)
    {
        if( Auth::attempt(['email'=>$request->email, 'password'=>$request->password])){ 
            return redirect(route('admin.backend.dashboard'));
        }
        return redirect()->back()->withErrors([
            'msg'   =>  'Please check your credentials'
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function __construct()
    {
         $this->middleware('guest')->except('logout');
         $this->redirectTo = route('admin.backend.dashboard');
    }

 
}
