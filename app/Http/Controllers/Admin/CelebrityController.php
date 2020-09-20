<?php

namespace App\Http\Controllers\Admin;

use App\Models\Celebrity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CelebrityController extends Controller
{

    public function __construct () 
    {
        
        $this->title = 'Add celebrity';
        $this->route = 'admin.celebrities.';
        $this->view  = 'backend.celebrity.';
        $this->file_path = 'celebrity';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view($this->view.'index');
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
            $this->validate($request,[
                'name' => 'required | string',
                'email' => 'required | email |unique:celebrities,email',
                'designation' => 'required | string',
                'password' => 'required | confirmed',
                'file' => 'required',
            ]);
        }
        alert()->info('Info Message', 'Optional Title');
        dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Celebrity  $celebrity
     * @return \Illuminate\Http\Response
     */
    public function show(Celebrity $celebrity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Celebrity  $celebrity
     * @return \Illuminate\Http\Response
     */
    public function edit(Celebrity $celebrity)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Celebrity  $celebrity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Celebrity $celebrity)
    {
        //
    }
}
