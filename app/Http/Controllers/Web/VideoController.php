<?php

namespace App\Http\Controllers\Web;

use App\Models\Video;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{

	public function __construct () 
    {
        $this->route = 'web.videos.';
        $this->file_path = storage_path('app/public/videos');
        $this->file_stored = '/public/videos/';
        $this->file_path_view = \Request::root().'/storage/videos/';
    }

    public function download($id){
    	$video = Video::findOrFail($id);

    	if(Storage::exists($this->file_stored.$video->video_url)){
    		return Storage::download($this->file_stored.$video->video_url);
    	}
    	
    	return false;
    }


}