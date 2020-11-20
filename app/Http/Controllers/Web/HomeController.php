<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Celebrity;

class HomeController extends Controller
{
    public function index (){
    	$data['celebrities'] = Celebrity::latest()->get();
    	return view ('web.home', $data);
    }



    public function show ($id){
    	$data['celebrity'] = Celebrity::findOrFail($id);
    	$data['image'] = $data['celebrity']->images[0] ;
    	$data['started_from'] = $data['celebrity']->celebritypackages[0]->per_minute_fee;
    	return view ('web.profile', $data);
    }


}
