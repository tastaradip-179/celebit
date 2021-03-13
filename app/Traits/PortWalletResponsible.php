<?php

namespace App\Traits;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;
use GuzzleHttp\Client as GuzzleClient;

trait PortWalletResponsible
{
    //create invoice
    protected function createInvoice(array $data)
    {
        $config = config('portwallet');
        $client = new GuzzleClient();

        $response = $client->request('POST', 'http://api.portwallet.com/api/v1/', [
            'form_params' => [
                'app_key'		=> $config['app_key'],
                'timestamp'		=> $config['time'],
                'token' 		=> md5($config['app_secret_key'].$config['time']),
                'call' 			=> 'gen_invoice',
                'amount' 		=> $data['amount'],
                'currency' 		=> $config['currency'],
                'product_name' 	=> $data['product_name'],
                'product_description' => $data['product_des'],
                'name' 			=> $data['buyer_name'],
                'email' 		=> $data['buyer_email'],
                'phone' 		=> $data['buyer_phone'],
                'address' 		=> $data['buyer_address'],
                'city' 			=> $data['buyer_city'],
                'state' 		=> $data['buyer_state'],
                'zipcode' 		=> $data['buyer_zipcode'],
                'country' 		=> 'BD',
                'orderId' 		=> $data['order_id'], //it should be invoice id or order id
                'invoiceId'     => $data['invoice_id'], //it should be invoice id or order id
                'identity'      => $data['identity'],
                'redirect_url' 	=> $config['redirect_url']
            ]
        ]);
//        dd($response->getStatusCode());
        if($response->getStatusCode() == 200)
        {

            $body = $response->getBody();
//            dd($body);
            $obj  = json_decode($body);
//            dd('https://payment.portwallet.com/payment/?invoice='.$obj->data->invoice_id);
            $redirect = 'https://payment.portwallet.com/payment/?invoice='.$obj->data->invoice_id;
            return redirect()->away($redirect);

        }
        return redirect()->back();
    }



}