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

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


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
        Mail::to($data['customer']->email)->send(new SendBookingRequest($data));
        return redirect()->back()->with('message', 'Your request has been sent successfully.')
        ->with('message-type', 'success');;
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
