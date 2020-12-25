<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Carbon\Carbon;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;

class CustomerRegisterController extends Controller
{

    use RegistersUsers;

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

    protected function registered(Request $request, $user)
    {
        return Auth::loginUsingId($user->id);
    }

    public function create(Request $request)
    {   
        $request->validate([
                'fullname' => 'required | string | min:4',
                'email' => 'required | email | unique:customers,email',
                'gender' => 'required',
                'password' => 'required | min:6',
                'dob' => 'required',
            ]);
        $input = $request->only(['fullname','email','gender','mobile','dob']);
        if ($request->has('password')) {
                $input = $input + ['password' => Hash::make($request->password)];
            }

        $customer = Customer::create($input);  
        $this->guard()->login($customer);
        return redirect()->route('customer.profile', $customer) ;   
        
        
    }

    

    
}
