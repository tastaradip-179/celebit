<?php

namespace App\Http\Controllers\Customer;

use Auth;
use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\CelebrityPackage;
use App\Models\Wishto;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function __construct () 
    {
        
        $this->title = 'Request';
        $this->route = 'books.';
        $this->view  = 'web.book.';
    }


    public function index()
    {
        return view ($this->view.'index');
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
        $data['celebrity_package'] = CelebrityPackage::findOrFail($id);

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
        dd($request->all());
        $input = $request->only(['celebrity_package_id', 'customer_id', 'from', 'subject', 'message', 'upload_time']);   
        $input2 = $request->only(['fullname', 'pronoun']);  
        $book = Book::create($input);   
        $input2 = $input2 + ['book_id' => $book->id] ;
        $wishto =  Wishto::create($input2);
        return redirect()->back();
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
