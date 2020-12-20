<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Spatie\Tags\Tag;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function __construct () 
    {
        $this->title = 'Tag';
        $this->route = 'admin.tags.';
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
        $input = $request->only(['name','slug','type']);
        $tag = Tag::create($input);  

        toastr()->success('Data has been saved successfully!');
        return redirect()->back();    
    }

}
