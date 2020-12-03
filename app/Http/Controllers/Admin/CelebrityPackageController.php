<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Celebrity;
use App\Models\CelebrityPackage;
use App\Models\Package;

class CelebrityPackageController extends Controller
{

    public function __construct () 
    {
        $this->middleware('auth');
        $this->title = 'Celebrity Package';
        $this->route = 'admin.celebritypackages.';
        $this->view  = 'backend.celebritypackage.';
        $this->file_path = storage_path('app/public/videos');
        $this->file_path_view = \Request::root().'/storage/videos/';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Celebrity $celebrity)
    {
        //
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
        $data['celebrities'] = Celebrity::latest()->get();
        $data['packages'] = Package::latest()->get();
        
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
        $input = $request->only(['celebrity_id','package_id','duration','per_minute_fee','extra_per_minute_fee']);
        $celebritypackage = CelebrityPackage::create($input);  

        alert()->success('Data has been saved successfully!');
        return redirect()->back();          
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['title']     = $this->title;
        $data['route']     = $this->route;

        $data['celebrity'] = Celebrity::findOrFail($id);
        $data['celebrity_packages'] = $data['celebrity']->celebritypackages;

        foreach($data['celebrity_packages'] as $key=>$data['celebrity_package']){
            $data['package'] = $data['celebrity_package']->package;
        }
        
        return view($this->view.'show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['title'] = $this->title;
        $data['route'] = $this->route;
        $data['celebrities'] = Celebrity::latest()->get();
        $data['packages'] = Package::latest()->get();
        $data['celebrity_package'] = CelebrityPackage::findOrFail($id);
        
        return view($this->view.'edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $celebrity_package = CelebrityPackage::findOrFail($id);
        $input = $request->only(['celebrity_id','package_id','duration','per_minute_fee','extra_per_minute_fee']); 
        $celebrity_package->update($input);

        alert()->success('Data has been updated successfully!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CelebrityPackage::findOrFail($id)->delete();

        alert()->success('Data has been deleted successfully!');
        return redirect()->back();
    }
}
