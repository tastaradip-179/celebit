<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Carbon\Carbon;

class CustomerLoginController extends Controller
{

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/customer/signin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    protected function guard()
	{
	    return Auth::guard('customer');
	}

    public function showLoginForm()
    {
        if(Auth::guard('customer')->check()){
            return redirect()->route('customer.profile');
        }
        else{
            return view('web.customer.login');
        }
    }


    public function login(Request $request)
    {
     	$this->validate($request, [
		    'email'   => 'required|email',
		    'password' => 'required|min:5'
		   ]);
	  	if( Auth::guard('customer')->attempt( ['email' => $request->email, 'password' => $request->password] )){
            $customer = Auth::guard('customer')->user();
            return redirect()->back()->getTargetUrl();
       		//return redirect()->intended(route('customer.profile', $customer));
        }
        return redirect()->back()->withErrors([
            'msg'   =>  'Please check your credentials'
        ]);
    }

	public function logout(Request $request)
    {
        Auth::guard('customer')->logout();
        return redirect()->route('web.home');
    }

    
}
