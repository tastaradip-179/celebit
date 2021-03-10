<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Spatie\Tags\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function __construct () 
    {
        $this->title = 'Tag';
        $this->route = 'backend.admin.tags.';
        $this->view  = 'backend.tags.';
    }

    public function index()
    {
        $data['title']     = $this->title;
        $data['route']     = $this->route;
        $data['tags'] = Tag::latest()->get();
        $data['tagtypes'] = Tag::distinct()->pluck('type'); 

        return view($this->view.'index', $data);
    }

    public function create()
    {
        //
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
                'name' => 'required | string | unique:tags,name->en',
            ]);
        $input = $request->only(['name','type']);
        $tag = Tag::create($input);  

        toastr()->success('Data has been saved successfully!');
        return redirect()->back();    
    }


    public function show(Package $package)
    {
        //
    }

  
    public function edit(Package $package)
    {
        //
    }
 
    public function update(Request $request, Tag $tag)
    {
        $request->validate([
                'name' => 'required | string | unique:tags,name',
            ]);
        $input = $request->only(['name','type']); 
        $tag->update($input);

        toastr()->success('Data has been updated successfully!');
        return redirect()->back();
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();

        toastr()->success('Data has been deleted successfully!');
        return redirect()->back();
    }


}
