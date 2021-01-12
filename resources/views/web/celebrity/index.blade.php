@extends('web.common.master')
<style>

</style>
@section('content')

<section class="celebrity-profile">
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
								<a href="request-process" class="btn btn-white btn-block waves-effect waves-light">Videos</a>
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
				                <a href="{{route('request.create',['id'=>$celebrity_packages[$key]->id])}}">
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

		<section class="vds-main">
			<div class="vidz-row">
				<div class="container">
					<div class="vidz_list m-0">
						<div class="row">
							<div class="col-lg-3 col-md-6 col-sm-6 col-6 full_wdth">
								<div class="videoo">
									<div class="vid_thumbainl">
										<a href="http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4" title="">
											<img src="{{asset('web/images/resources/vide1.png')}}" alt="">
											<span class="vid-time">10:21</span>
											<span class="watch_later">
												<i class="icon-watch_later_fill"></i>
											</span>
										</a>	
									</div><!--vid_thumbnail end-->
									<div class="video_info">
										<h3><a href="single_video_page.html" title="">Kingdom Come: Deliverance Funny Moments and Fails</a></h3>
										<h4><a href="Single_Channel_Home.html" title="">newfox media</a> <span class="verify_ic"><i class="icon-tick"></i></span></h4>
										<span>686K views .<small class="posted_dt">1 week ago</small></span>
									</div>
								</div><!--videoo end-->
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

@endsection

@section('page-js')
<script>
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
@endsection