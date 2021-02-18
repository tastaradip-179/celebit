<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Carbon\Carbon;

class CelebrityLoginController extends Controller
{

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

    protected function guard()
	{
	    return Auth::guard('celebrity');
	}

    public function showLoginForm()
    {
        // if(Auth::guard('celebrity')->check()){
        //     return view('backend.auth.celebrity-login');
        // }
        // else{
            return view('backend.auth.celebrity-login');
        //}
    }


    public function login(Request $request)
    {
     	$this->validate($request, [
		    'email'   => 'required|email',
		    'password' => 'required'
		   ]);
        
	  	if( Auth::guard('celebrity')->attempt( ['email' => $request->email, 'password' => $request->password] )){
            $celebrity = Auth::guard('celebrity')->user();
       		return redirect()->intended(route('backend.celebrities.show', $celebrity));
        }
        return redirect()->back()->withErrors([
            'msg'   =>  'Please check your credentials'
        ]);
    }

	public function logout(Request $request)
    {
        Auth::guard('celebrity')->logout();
        return redirect()->route('backend.celebrity.login');
    }

    
}
