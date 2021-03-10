<?php

namespace App\Http\Controllers\Backend;

use App\Models\Video;
use App\Models\Book;
use App\Models\Celebrity;
use Auth;
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
        $this->file_stored = '/public/videos/';
        $this->file_path_view = \Request::root().'/storage/videos/';
    }


    public function index(Celebrity $celebrity){
        $data['title'] = 'My Videos';
        $data['route'] = $this->route;
        $data['file_path_view'] = $this->file_path_view;
        $data['celebrity'] = $celebrity;

        return view($this->view.'index', $data);
    }

    public function create($id){
        $data['title'] = 'Make A Video';
        $data['route'] = $this->route;
        $data['file_path_view'] = $this->file_path_view;

        if(Auth::guard('celebrity')->check()){
            $data['celebrity'] = Auth::guard('celebrity');
        }
        $data['book'] = Book::findOrFail($id);
        $data['wishto'] = $data['book']->wishto;  	
    	return view($this->view.'create', $data);
    }

    public function store(Request $request){

        $book = Book::findOrFail($request->book_id);
        if(Auth::check()){
            $celebrity = Auth::guard('celebrity')->user();
        }
        
        if($request->hasFile('file')){
            $request->validate([
                'file' => 'required',
            ]);
            $uploadedFile = $request->file('file');
            $filename = 'req-'.$book->id.$celebrity->username.'_'.time().'.'.$uploadedFile->extension();
                
                if (!is_dir($this->file_path)) {
                    mkdir($this->file_path, 0777);
                }

                $uploadedFile->storeAs($this->file_stored, $filename);
                

                $videoUpload = new Video([
                    'book_id' => $request->book_id,
                    'video_url' => $filename,
                    'status' => 1
                ]);

                $celebrity->videos()->save($videoUpload);
                toastr()->success('Data has been saved successfully!');
                return redirect()->back();
        }

        abort(404);
    }

    public function destroy($id){
        Video::find($id)->delete();

        toastr()->success('Data has been deleted successfully!');
        return redirect()->back();
    }

    public function featured($id){
        $video = Video::findOrFail($id);
        $video->update([
            'status'=>2,
        ]);
        toastr()->success('Data has been saved successfully!');
        return redirect()->back();
    }

}
