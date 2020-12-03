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
    	$data['celebrity_packages'] = $data['celebrity']->celebritypackages;

        foreach($data['celebrity_packages'] as $key=>$data['celebrity_package']){
            $data['package'] = $data['celebrity_package']->package;
        }
        
    	return view ('web.profile', $data);
    }


}
