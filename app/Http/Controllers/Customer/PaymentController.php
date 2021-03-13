<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;
use GuzzleHttp\Client as GuzzleClient;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function paymentVerification(Request $request){

        $config = config('portwallet');
        $client = new GuzzleClient();
        $response = $client->request('POST', 'http://api.portwallet.com/api/v1/', [
            'form_params' => [
                'app_key'       => $config['app_key'],
                'timestamp'     => $config['time'],
                'token'         => md5($config['app_secret_key'].$config['time']),
                'call'          => 'ipn_validate',
                'amount'        => $request['amount'],
                'invoice'       => $request['invoice']
            ]
        ]);

        if($response->getStatusCode() == 200){
            $body = $response->getBody();
            $obj  = json_decode($body);

             Payment::create([
                 'book_id' => '1',
                 'invoice_id' => $obj->data->invoice_id,
                 'status' => $obj->data->status ,
                 'transaction_info' => json_encode($obj->data)
                 ]);
        }
    }


    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
