<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Wishto;

class BookController extends Controller
{
    public function __construct () 
    {
        $this->title = 'Request';
        $this->route = 'backend.admin.requests.';
        $this->view  = 'backend.book.';
        $this->file_path = storage_path('app/public/celebrities');
        $this->file_path_view = \Request::root().'/storage/celebrities/';
    }

    public function index()
    {
    	$data['title'] = $this->title;
    	$data['route'] = $this->route;
        $data['file_path_view'] = $this->file_path_view;
    	$data['books'] = Book::latest()->get();
    	return view ($this->view.'index',$data);
    }

    public function show(Book $request){
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['file_path_view'] = $this->file_path_view;
        $data['book'] = $request;
        $data['celebrity'] = $request->celebrity_package->celebrity;
        $data['customer'] = $request->customer;
        $data['celebrity_package'] = $request->celebrity_package;
        $data['wishto'] = $request->wishto;
        return view ($this->view.'show',$data);
    }

    public function destroy(Book $request)
    {
        $request->delete();

        toastr()->success('Data has been deleted successfully!');
        return redirect()->back();
    }

    public function getAccepted($id, Request $request){
        $book = Book::findOrFail($id);
        $input = $request->only(['status']); 
        $book->update($input);

        toastr()->success('Data has been accepted successfully!');
        return redirect()->back();
    }

    public function getRejected($id, Request $request){
        $book = Book::findOrFail($id);
        $input = $request->only(['status']); 
        $book->update($input);

        toastr()->success('Data has been rejected successfully!');
        return redirect()->back();
    }


}
