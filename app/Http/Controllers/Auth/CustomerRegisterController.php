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
use Illuminate\Support\Facades\Mail;
use App\Mail\RegistrationSuccess;

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

        $data['customer'] = Customer::create($input);  
        $this->guard()->login($data['customer']);

        $data['subject'] = 'Successful Registration';
        Mail::to($data['customer']->email)->send(new RegistrationSuccess($data));
        return redirect()->route('web.customer.show', $data) ;   
        
        
    }

    

    
}
