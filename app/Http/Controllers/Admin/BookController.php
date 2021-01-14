<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Wishto;

class BookController extends Controller
{
    public function __construct () 
    {
        $this->title = 'Request';
        $this->route = 'admin.books.';
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

    public function show(Book $book){
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['file_path_view'] = $this->file_path_view;
        $data['book'] = $book;
        $data['celebrity'] = $book->celebrity_package->celebrity;
        $data['customer'] = $book->customer;
        $data['celebrity_package'] = $book->celebrity_package;
        return view ($this->view.'show',$data);
    }


}
