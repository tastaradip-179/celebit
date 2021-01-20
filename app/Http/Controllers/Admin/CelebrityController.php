<?php

namespace App\Http\Controllers\Admin;

use Spatie\Tags\Tag;
use App\Models\Image;
use App\Models\Celebrity;
use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image as InterventionImage;

class CelebrityController extends Controller
{

    public function __construct () 
    {
        $this->title = 'Celebrity';
        $this->route = 'backend.admin.celebrities.';
        $this->view  = 'backend.celebrity.';
        $this->file_path = storage_path('app/public/celebrities');
        $this->file_path_view = \Request::root().'/storage/celebrities/';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title']     = $this->title;
        $data['route']     = $this->route;
        $data['file_path'] = $this->file_path_view;

        $data['celebrities'] = Celebrity::ordered()->paginate(15);
        
        return view($this->view.'index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['tags'] = Tag::withType('celebrities')->latest()->get();
        
        
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
        if ($request->has('create_type') && $request->create_type == 'celebrity_info') {
           $request->validate([
                'name' => 'required | string',
                'email' => 'email | unique:celebrities,email',
                'designation' => 'required | string',
                'gender' => 'required',
                'password' => 'required | confirmed | min:6',
                // 'file' => 'required',
                // 'tags' => 'required',
            ]);
            $input = $request->only(['name','email','designation','gender','mobile','social_link','about']);
            if ($request->has('password')) {
                $input = $input + ['password' => Hash::make($request->password)];
            }
            //dd($input);

            $celebrity = Celebrity::create($input);
            
            if ($request->hasFile('file')) {

                $uploadedFile = $request->file('file');
                $realPath = $request->file('file')->getRealPath();
                $filename = $celebrity->username.'_'.time().'.'.$request->file('file')->extension();
                
                if (!is_dir($this->file_path)) {
                    mkdir($this->file_path, 0777);
                }

                InterventionImage::cache(function($image) use ($filename, &$realPath) {
                    $image->make($realPath)->resize(560, 720)->save($this->file_path.'/'.$filename);
                    // $image->make($realPath)->save($this->file_path.'/'.$filename);
                });

                $imageUpload = new Image([
                    'url' => $filename,
                    'type' => 1
                ]);

                $celebrity->images()->save($imageUpload);
                
            }

            $celebrity->syncTagsWithType($request->tags, 'celebrities');
            toastr()->success('Data has been saved successfully!');
            return redirect()->route($this->route.'index');
        }
        abort(404);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Celebrity  $celebrity
     * @return \Illuminate\Http\Response
     */
    public function show(Celebrity $celebrity)
    {
        $data['title'] = $celebrity->name.'\'s'. ' profile';
        $data['route'] = $this->route;
        $data['file_path'] = $this->file_path_view;

        $data['celebrity'] = $celebrity;
        // dd($data['celebrity']->)
        return view($this->view.'show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Celebrity  $celebrity
     * @return \Illuminate\Http\Response
     */
    public function edit(Celebrity $celebrity)
    {
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['celebrity'] = $celebrity;

        $data['tags'] = Tag::withType('celebrities')->latest()->get();

        return view($this->view.'.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Celebrity  $celebrity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Celebrity $celebrity)
    {    
        $request->validate([
            'name' => 'required | string',
            'email' => 'nullable | email |unique:celebrities,email,'.$celebrity->id,
            'designation' => 'required | string',
            'gender' => 'required',
            'password' => 'nullable | confirmed',
            'tags' => 'required',
         ]);

        $input = $request->only(['name','email','designation','gender','mobile','social_link','about', 'status']); 
        if ($request->has('password')) {
                $input = $input + ['password' => Hash::make($request->password)];
        }
        $celebrity->update($input);

          if ($request->hasFile('file')) {
                $uploadedFile = $request->file('file');
                $realPath = $request->file('file')->getRealPath();
                $filename = $celebrity->username.'_'.time().'.'.$request->file('file')->extension();
      
                if (!is_dir($this->file_path)) {
                    mkdir($this->file_path, 0777);
                }

                InterventionImage::cache(function($image) use ($filename, &$realPath) {
                   $image->make($realPath)->resize(560,720)->save($this->file_path.'/'.$filename);
                });

               
                $celebrity_image = $celebrity->images[0] ;
                $old_image = $celebrity->images[0]->url;
                 
                unlink($this->file_path.'/'.$old_image);
                
                $celebrity_image->update([
                    'url' => $filename,
                ]);

                $celebrity->images()->save($celebrity_image);
                
            }

        $celebrity->syncTagsWithType($request->tags, 'celebrities');

        toastr()->success('Data has been updated successfully!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Celebrity  $celebrity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Celebrity $celebrity)
    {
        $celebrity->delete();

        toastr()->success('Data has been deleted successfully!');
        return redirect()->back();
    }

    public function books(Celebrity $celebrity)
    {
        $data['title'] = 'Requests to '.$celebrity->name;
        $data['route']     = $this->route;
        $data['celebrity'] = $celebrity;
        $data['celebrity_packages'] = $celebrity->celebrity_packages;
        foreach($data['celebrity_packages']  as $celebrity_package){
            $data['books'] = $celebrity_package->books;
        }
        return view($this->view.'all-requests', $data);
    }


}
