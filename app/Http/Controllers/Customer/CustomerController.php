<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $data['title'] = 'Customer';
        $data['customers'] = Customer::latest()->get();
        $data['route'] = 'admin.customers.';
        return view ('backend.customer.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('web.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
        return redirect()->route('customer.profile', $customer) ;   
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        $data['customer'] = $customer; 
        return view('web.customer.profile', $data) ;  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */



    public function edit(Customer $customer)
    {
        $data['customer'] = $customer;
        return view ('web.customer.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();

        alert()->success('Data has been deleted successfully!');
        return redirect()->back();
    }
}
