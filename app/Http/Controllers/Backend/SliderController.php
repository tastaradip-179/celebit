<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as InterventionImage;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct () 
    {
        $this->title = 'Slider';
        $this->route = 'backend.admin.sliders.';
        $this->view  = 'backend.slider.';
        $this->file_stored = '/public/sliders/';
        $this->file_path = storage_path('app/public/sliders');
        $this->file_path_view = \Request::root().'/storage/sliders/';
    }

    public function index()
    {
        $data['title']     = $this->title;
        $data['route']     = $this->route;
        $data['file_path_view'] = $this->file_path_view;
        $data['sliders']   = Slider::latest()->get();

        return view($this->view.'index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title']     = $this->title;
        $data['route']     = $this->route;
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
          $request->validate([
                'title' => 'required | string',
                'type'  => 'required',
                'file'  => 'required',
            ]);
            $input = $request->only(['title','type','caption','status']);
            //dd($input);

            $slider = Slider::create($input);
            
            if ($request->hasFile('file')) {

                $uploadedFile = $request->file('file');
                $realPath = $request->file('file')->getRealPath();
                $filename = $slider->title.'_'.time().'.'.$request->file('file')->extension();
                
                if (!is_dir($this->file_path)) {
                    mkdir($this->file_path, 0777);
                }

                InterventionImage::cache(function($image) use ($filename, &$realPath) {
                    // $image->make($realPath)->resize(560, 720)->save($this->file_path.'/'.$filename);
                     $image->make($realPath)->save($this->file_path.'/'.$filename);
                });

                $imageUpload = new Image([
                    'url' => $filename,
                    'type' => 2
                ]);

                $slider->images()->save($imageUpload);
                
            }

            toastr()->success('Data has been saved successfully!');
            return redirect()->route($this->route.'index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['slider'] = $slider;

        return view($this->view.'.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        $request->validate([
            'title' => 'required | string',
            'type'  => 'required',
            'file'  => 'required',
         ]);

        $input = $request->only(['title','type','caption','status']); 

        $slider->update($input);

          if ($request->hasFile('file')) {
                $uploadedFile = $request->file('file');
                $realPath = $request->file('file')->getRealPath();
                $filename = $slider->title.'_'.time().'.'.$request->file('file')->extension();
      
                if (!is_dir($this->file_path)) {
                    mkdir($this->file_path, 0777);
                }

                InterventionImage::cache(function($image) use ($filename, &$realPath) {
                   //$image->make($realPath)->resize(560,720)->save($this->file_path.'/'.$filename);
                    $image->make($realPath)->save($this->file_path.'/'.$filename);
                });

               
                $slider_image = $slider->images[0] ;
                $old_image = $slider->images[0]->url;
                
                if(!empty($old_image) && file_exists($old_image)) {
                    unlink($this->file_path.'/'.$old_image);
                }

                if(Storage::exists($this->file_stored.$old_image)){
                    Storage::delete($this->file_stored.$old_image) ;
                }
                
                
                $slider_image->update([
                    'url' => $filename,
                ]);

                $slider->images()->save($slider_image);
                
            }


        toastr()->success('Data has been updated successfully!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        $slider_image = $slider->images[0]->url ;

        if(Storage::exists($this->file_stored.$slider_image)){
            Storage::delete($this->file_stored.$slider_image) ;
        }
        $slider->delete();

        toastr()->success('Data has been deleted successfully!');
        return redirect()->back();
    }
}
