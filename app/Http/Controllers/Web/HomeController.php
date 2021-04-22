<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Celebrity;
use App\Models\Category;
use App\Models\Slider;

class HomeController extends Controller
{

    public function __construct () 
    {
        $this->route = 'web..';
        $this->view  = 'web.';
        $this->image_path_view = \Request::root().'/storage/celebrities/';
        $this->video_path_view = \Request::root().'/storage/videos/';
        $this->slider_path_view = \Request::root().'/storage/sliders/';
    }

    public function index (){
        $data['image_path_view'] = $this->image_path_view;
        $data['video_path_view'] = $this->video_path_view;
        $data['slider_path_view'] = $this->slider_path_view;

    	$data['celebrities'] = Celebrity::latest()->get();
        $data['categories'] = Category::all();
        $data['sliders'] = Slider::latest()->get();
        $data['celebrity_img_sliders'] = Slider::where('type','celebrity')->latest()->get();
        $data['news_sliders'] = Slider::where('type','news')->latest()->get();
    	return view ($this->view.'home', $data);
    }

    public function search (){
        $data['image_path_view'] = $this->image_path_view;
        $data['video_path_view'] = $this->video_path_view;

        $data['celebrities'] = Celebrity::latest()->get();
        return view ($this->view.'search', $data);
    }

    public function search_live(Request $request){
        if($request->ajax()) {
            $data = Celebrity::where('name', 'LIKE', $request->celebrity.'%')
                ->get();
           
            $output = '';
           
            if (count($data)>0) {
                $output = '<div class="row">';
                 foreach($data as $celebrity){
                     $output .= '<div class="col-lg-3 col-md-4 col-sm-6 col-6 full_wdth">
                        <div class="mg-inf">
                            <div class="img-sr">
                                 <a href=\''.route('celebrities.show',[$celebrity->username]).'\' title="" class="celeb-anchor">
                                     <img class="celeb-img" id="celeb-img" src=\''. \Request::root().'/storage/celebrities/'.$celebrity->profileImage() .'\' alt="Thumbnail">';
                                     if(!empty($celebrity->profileVideo())){
                                     $output .= '<video controls data-play="hover" muted="muted" class="celeb-video" id="celeb-video" style="display: none;">
                                     <source src=\''. \Request::root().'/storage/videos/'.$celebrity->profileVideo() .'\' type="video/mp4">
                                     </video>';
                                     }
                                 $output .= '</a>                                   
                            </div>
                            <div class="info-short">
                                <h3><a href=\''.route('celebrities.show',[$celebrity->username]).'\' title="">'.$celebrity->name.'</a></h3>
                                <h5>'.$celebrity->designation.'</h5>
                                </div>
                                <div class="price">
                                    <span>৳'.$celebrity->minPackagePrice().'-৳'.$celebrity->maxPackagePrice().'</span>
                                </div>
                            </div>
                       </div>';
                 }
                 $output .= '</div>';
            }
            else {
             
                $output .= '<li class="list-group-item">'.'No results'.'</li>';
            }
           
            return $output;
        }
    }

	public function test (){
    	return view ('web.test');
    }
    public function test2 (){
        return view ('web.test2');
    }



}
