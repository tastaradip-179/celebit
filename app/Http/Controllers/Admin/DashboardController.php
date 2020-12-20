<?php

namespace App\Http\Controllers\Admin;

use App\Models\Celebrity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{

    public function index(){
    	return view ('backend.dashboard');
    }


    public function serialize(Request $request)
    {
    	$arr = [];
    	if ($request->ajax()) {
    		if (!empty($data = $request->data)) {
    			foreach ($data as $key => $value) {
    				$arr[] = (int) $value['item'];
    			}
    			Celebrity::setNewOrder($arr);

	    		return response()->json('success');
    		}
    	}
    }
}
