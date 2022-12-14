<?php

namespace App\Http\Controllers\Customer;

use Auth;
use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\CelebrityPackage;
use App\Models\Customer;
use App\Models\Wishto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendBookingRequest;
use App\Traits\PortWalletResponsible;
use GuzzleHttp\Client as GuzzleClient;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use PortwalletResponsible;

    public function __construct () 
    {        
        $this->title = 'Request for';
        $this->route = 'web.books.';
        $this->view  = 'web.book.';
        $this->file_path_view = \Request::root().'/storage/celebrities/';
    }


    public function index()
    {
        // $data['title'] = $this->title;
        // $data['route'] = $this->route;
        // return view ($this->view.'index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['file_path_view'] = $this->file_path_view;
        $data['celebrity_package'] = CelebrityPackage::findOrFail($id);
        $data['celebrity'] = $data['celebrity_package']->celebrity;
        return view($this->view.'create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->only(['celebrity_package_id', 'customer_id', 'from', 'subject', 'message', 'upload_time', 'status', 'publish']);   
        $book = Book::create($input); 
        if ($request->has('name') && $request['name']!=null) {  
            $input2 = $request->only(['name', 'pronoun']);      
            $input2 = $input2 + ['book_id' => $book->id] ;
            $wishto =  Wishto::create($input2);
        }
        $data['customer'] = Customer::findOrFail($request->customer_id);
        $data['subject'] = 'Booking Request';

        $celebrity_package = CelebrityPackage::findOrFail($request->celebrity_package_id);

        $config = config('portwallet');
        $client = new GuzzleClient();

       
        $data['amount']         = $celebrity_package->total;
        $data['product_name']   = $celebrity_package->celebrity->name;
        $data['product_des']    = $celebrity_package->packageType->name;
        $data['buyer_name']     = $data['customer']->fullname;
        $data['buyer_email']    = $data['customer']->email;
        $data['buyer_phone']    = '1';
        $data['buyer_address']  = '1';
        $data['buyer_city']     = '1';
        $data['buyer_state']    = '1';
        $data['buyer_zipcode']  = '1234';
        $data['order_id']       = $book->id;
        $data['invoice_id']     = $book->id;
        $data['identity']       = 'package';
         

        $obj = $this->createInvoice($data);
        if ($obj->status == 200) {
            dd($obj->status);
            $redirect =  $config['payment_url']."?invoice=".$obj->data->invoice_id;
            return redirect()->away($redirect);
        }

        Mail::to($data['customer']->email)->send(new SendBookingRequest($data));
        return redirect()->back()->with('message', 'Your request has been sent successfully.')
        ->with('message-type', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
