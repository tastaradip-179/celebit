<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Celebrity;

class CelebrityController extends Controller
{

	public function index(){
		return view ('web.celebrity.index');
	}

    public function show (Celebrity $celebrity){
    	$data['celebrity'] = $celebrity;
    	$data['image'] = $data['celebrity']->images[0] ;
    	$data['celebrity_packages'] = $data['celebrity']->celebritypackages;

        foreach($data['celebrity_packages'] as $key=>$data['celebrity_package']){
            $data['package'] = $data['celebrity_package']->package;
        }
        
    	return view ('web.celebrity.index', $data);
    }

}
