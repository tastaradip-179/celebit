<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Celebrity;

class HomeController extends Controller
{

    public function __construct () 
    {
        $this->route = 'web..';
        $this->view  = 'web.';
        $this->image_path_view = \Request::root().'/storage/celebrities/';
        $this->video_path_view = \Request::root().'/storage/videos/';
    }

    public function index (){
        $data['image_path_view'] = $this->image_path_view;
        $data['video_path_view'] = $this->video_path_view;

    	$data['celebrities'] = Celebrity::latest()->get();
    	return view ($this->view.'home', $data);
    }

	public function test (){
    	return view ('web.test');
    }
    public function bkash (){
    	return view ('web.bkash');
    }

    


}
