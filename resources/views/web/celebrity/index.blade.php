@extends('web.common.master')

@section('page-css')
<link rel="stylesheet" href="{{asset('web/plugins/videoPopup/css/jquery.popVideo.css')}}">

@endsection

@section('content')

<section class="celebrity-profile" id="celebrity-profile">
	<div class="container">
		@if(Session::has('message'))
		    <div class="alert alert-{{ Session::get('message-type') }} alert-dismissable">
		        <button aria-hidden="true" data-dismiss="alert" class="close" type="button" style="line-height: 0.5">×</button>
		        <i class="glyphicon glyphicon-{{ Session::get('message-type') == 'success' ? 'ok' : 'remove'}}"></i> {{ Session::get('message') }}
		    </div>
		@endif
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
		@if(count($celebrity->reviews))
		<div class="row">
	        <div class="col-12 col-md-12">
	           <div class="section-title-left">
	              <h5>Reviews of {{$celebrity->name}}</h5>
	            </div>
	            <div class="section-title-right">
	              <h6><a>See all {{$celebrity->reviews->count()}} reviews</a></h6>
	            </div>
	        </div>
	    </div>
	    <div class="row">
	    	<div class="col-12 col-md-12">
	    		@foreach($latest_reviews as $key=>$review)
	    		@php($customer = \App\Models\Customer::findOrFail($review->customer_id))
	    		<div class="review-box">
	    			<p>{{$review->body}} - {{$customer->fullname}}</p>
	    		</div>
	    		@endforeach
	    		@foreach($more_reviews as $key=>$review)
	    		@php($customer = \App\Models\Customer::findOrFail($review->customer_id))
	    		<div class="review-box">
	    			<p>{{$review->body}} - {{$customer->fullname}}</p>
	    		</div>
	    		@endforeach
	    	</div>
	    </div>
	    @endif
	    @if(Auth::guard('customer')->check())
	    @php($loggedin_customer = Auth::guard('customer')->user())
	    <div class="row mt-20">
	        <div class="col-12 col-md-12">
	           <div class="section-title-left">
	              <h5>Write a Review</h5>
	            </div>
	        </div>
	    </div>
	    <div class="row">
	    	<div class="col-12 col-md-12">
		    	<form action="{{route('web.customer.reviews.store')}}" method="post" class="review-form">
		    		{{csrf_field()}}
		    			<input type="hidden" name="celebrity" value="{{$celebrity->id}}">
		    			<input type="hidden" name="customer_id" value="{{$loggedin_customer->id}}">
						<div class="form-group">
							<textarea rows="5" name="body" placeholder="Your review"></textarea>
						</div>
						<button class="btn btn-default">Submit</button>
				</form>
			</div>
		</div>
		@endif
	</div>
</section>

<section class="vds-main mt-10" id="vds-main">
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
								       loop muted id="video" class="video" >   {{$video->id}} 
								</video>
								<div class="play"></div>
								<div class="pause" style="display:none"></div>
							</div><!--videoo end-->
						</a>
						 
                         <!-- <button value="copy" onclick="copyToClipboard('copy_{{ $video_path_view.$video->video_url }}')">Copy!</button> -->
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
	$(document).ready(function(){

		$( ".video" ).each(function(index) {
			var video_id = $(this).text();
			var video_src = $(this).attr('src');
		    $(this).click(function () {
		    	
		    	
		        $(this).popVideo({
		            playOnOpen: true,
		            title: '{{$celebrity->name}}', 
		            rt: "{{url("/videos/download")}}" + "/" + video_id,
		            oc: "copy_"+"http://127.0.0.1:8000/storage/videos/req-2v_1615564591.m4v",
		            id: '{{$celebrity->id}}',
		            act: "{{route('web.customer.reviews.store')}}",
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
 </script>
@endsection