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



    


}
