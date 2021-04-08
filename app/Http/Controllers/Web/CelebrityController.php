<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Celebrity;

class CelebrityController extends Controller
{

    public function __construct () 
    {
        $this->title = 'Celebrity';
        $this->route = 'web.celebrities.';
        $this->view  = 'web.celebrity.';
        $this->file_path_view = \Request::root().'/storage/celebrities/';
        $this->video_path_view = \Request::root().'/storage/videos/';
    }

	public function index(){
		//
	}

    public function show (Celebrity $celebrity){
        $data['title']     = $this->title;
        $data['route']     = $this->route;
        $data['file_path_view'] = $this->file_path_view;
        $data['video_path_view'] = $this->video_path_view;

        $data['celebrity'] = $celebrity;
        $data['celebrity_packages'] = $celebrity->celebrity_packages;
        $data['latest_reviews'] = $celebrity->reviews->take(3);
        $data['more_reviews'] = $celebrity->reviews->skip(3);
        
        return view ($this->view.'index', $data);
    }

}
