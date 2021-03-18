@extends('web.common.master')

@section('page-css')
<link rel="stylesheet" href="{{asset('web/plugins/videoPopup/css/jquery.popVideo.css')}}">

@endsection

@section('content')

<section class="celebrity-profile" id="celebrity-profile">
	<div class="container">
		<div class="celebrity-profile-container">
			<div class="row">
				<div class="col-md-5">
					<div class="img">
						<img src="{{ $file_path_view.$celebrity->profileImage() }}" alt="dp" class="img-fluid" />
					</div>
				</div>
				<div class="col-md-7">
					<div class="about">
						<h3>{{$celebrity->name}}</h3>
						<h5>{{$celebrity->designation}}</h5>
						<p>{{$celebrity->about}}</p>
						{!! $celebrity->AllTags() !!}
					</div>
					<div class="other-buttons">
						<div class="row">
							<div class="col-12 col-lg-4 col-md-6 col-sm-12 buttons">
								<a href="#request-process" class="btn btn-white btn-block waves-effect waves-light scollable">Request Process</a>
							</div>
							<div class="col-12 col-lg-4 col-md-6 col-sm-12 buttons">
								<a href="#reviews" class="btn btn-white btn-block waves-effect waves-light">Reviews</a>
							</div>
							<div class="col-12 col-lg-4 col-md-6 col-sm-12 buttons">
								<a href="#vds-main" class="btn btn-white btn-block waves-effect waves-light">Videos</a>
							</div>
						</div>
					</div>	
					<div class="services">
						<h6>Request for?</h6>
						<div class="row">
							@foreach($celebrity_packages as $key=>$celebrity_package)
							@if(!empty($celebrity_packages))
							<div class="col-12 col-lg-4 col-md-6 col-sm-12 service-btn">
								@if(Auth::guard('customer')->check())
				                <a href="{{route('web.books.create',['id'=>$celebrity_packages[$key]->id])}}">
				                @else
				                <a href="#" type="button" data-toggle="modal" data-target="#elegantLoginModalForm" title="">
				                @endif	
				                	<span class="service-name">{{$celebrity_packages[$key]->packageType->name}}</span>
				                	<span class="service-price">৳{{$celebrity_packages[$key]->total}}</span>
				                	<span class="service-time">{{$celebrity_packages[$key]->duration}}min</span>
				                </a>
				            </div>
				            @endif
				            @endforeach
			            </div>    
					</div>	
								
				</div>
			</div>
			<div class="clearfix"></div>
		</div>		
	</div>
</section>

@include('web.common.how-it-works')

<section class="reviews" id="reviews">
	<div class="container">
		<div class="row">
	        <div class="col-12 col-md-12">
	           <div class="section-title-left">
	              <h5>Reviews of {{$celebrity->name}}</h5>
	            </div>
	            <div class="section-title-right">
	              <h6><a>See all 29 reviews</a></h6>
	            </div>
	        </div>
	    </div>
	    <div class="row">
	    	<div class="col-12 col-md-12">
	    		<div class="review-box"><p>Love you P! Thank you for the encouragement, I am definitely grateful for so much! I have people who care for me including a wonderful husband! I will absolutely take your advice and show love and help to ones in nee</p></div>
	    		<div class="review-box"><p>Love you P! Thank you for the encouragement, I am definitely grateful for so much! I have people who care for me including a wonderful husband! I will absolutely take your advice and show love and help to ones in nee</p></div>
	    	</div>
	    </div>
	</div>
</section>

<section class="vds-main" id="vds-main">
	<div class="vidz-row">
		<div class="container">
			<div class="vidz_list m-0">
				<div class="row">
					@if(!empty($celebrity->videos))
					@foreach($celebrity->videos as $key=>$video)
					<div class="col-lg-3 col-md-6 col-sm-6 col-6 full_wdth">
						<a href="javascript:void(0)">
							<div class="videoo">
								<video src="{{$video_path_view.$video->video_url}}" webkit-playsinline playsinline data-video="{{$video_path_view.$video->video_url}}"
								       loop muted id="video" class="video">    
								</video>
								<div class="play"></div>
								<div class="pause" style="display:none"></div>
							</div><!--videoo end-->
						</a>
						 <input type="text" id="copy_{{ $video->id }}" value="{{ $video->video_url }}">
                         <button value="copy" onclick="copyToClipboard('copy_{{ $video->id }}')">Copy!</button>
						<a href="{{route('web.videos.download',[$video->id])}}">Download</a>
					</div>
					@endforeach
					@endif
				</div>
			</div>
		</div>
	</div>
</section>


@endsection

@section('page-js')
<script type="text/javascript" src="{{asset('web/plugins/videoPopup/js/jquery.popVideo.js')}}"></script>
<script type="text/javascript">
	$(document).ready(function(index){
		$( ".video" ).each(function() {
		    $(this).click(function () {
		        $(this).popVideo({
		            playOnOpen: true,
		            title: '{{$celebrity->name}}', 
		          	closeOnEnd: true,
		            pauseOnClose: true,
		        }).open();
		        $('.content').show();
		    });

	    	$(this).parent().click(function () {
			  if($(this).children("#video").get(0).paused)
			  	{        
			  		$(this).children("#video").get(0).play();   
			  		$(this).children(".play").fadeOut();
			  		$(this).children(".pause").fadeIn();
			    }
			    else
			    {       
			    	$(this).children("#video").get(0).pause();
			  		$(this).children(".play").fadeIn();
			  		$(this).children(".pause").fadeOut();
			    }
			});
	   });
	});
    
</script>
<script type="text/javascript">
	$(document).ready(function(){
	  // Add smooth scrolling to all links
	  $("a.scrollable").on('click', function(event) {

	    // Make sure this.hash has a value before overriding default behavior
	    if (this.hash !== "") {
	      // Prevent default anchor click behavior
	      event.preventDefault();

	      // Store hash
	      var hash = this.hash;

	      // Using jQuery's animate() method to add smooth page scroll
	      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
	      $('html, body').animate({
	        scrollTop: $(hash).offset().top
	      }, 800, function(){
	   
	        // Add hash (#) to URL when done scrolling (default click behavior)
	        window.location.hash = hash;
	      });
	    } // End if
	  });
	});
</script>
 <script type="text/javascript">
      function copyToClipboard(id) {
        document.getElementById(id).select();
        document.execCommand('copy');
    }
    </script
@endsection