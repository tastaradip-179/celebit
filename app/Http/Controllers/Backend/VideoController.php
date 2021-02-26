<?php

namespace App\Http\Controllers\Backend;

use App\Models\Video;
use App\Models\Book;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VideoController extends Controller
{

	public function __construct () 
    {
        $this->title = 'Video';
        $this->route = 'backend.celebrities.videos.';
        $this->view  = 'backend.video.';
        $this->file_path = storage_path('app/public/videos');
        $this->file_path_view = \Request::root().'/storage/videos/';
    }

    public function index($id){
        $data['title'] = 'Make A Video';
        $data['route'] = $this->route;

        $data['book'] = Book::findOrFail($id);
        $data['wishto'] = $data['book']->wishto;  	
    	return view($this->view.'index', $data);
    }

    public function store(Request $request){
        return $request->all();
    }

}
