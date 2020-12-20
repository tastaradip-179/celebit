<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Spatie\Tags\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function __construct () 
    {
        $this->middleware('auth');
        $this->title = 'Tag';
        $this->route = 'admin.tags.';
        $this->view  = 'backend.tags.';
    }

    public function index()
    {
        $data['title']     = $this->title;
        $data['route']     = $this->route;
        $data['tags'] = Tag::latest()->get();
        return view($this->view.'index', $data);
    }
}
