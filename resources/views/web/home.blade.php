@extends('web.common.master')

@section('page-css')
<link rel="stylesheet" href="{{asset('web/plugins/slider/swiper.min.css')}}" integrity="sha512-uCQmAoax6aJTxC03VlH0uCEtE0iLi83TW1Qh6VezEZ5Y17rTrIE+8irz4H4ehM7Fbfbm8rb30OkxVkuwhXxrRg==" crossorigin="anonymous" />
<link rel="stylesheet" href="{{asset('web/plugins/slider/slider.css')}}">
  
@endsection

@section('content')

	<div class="multi-px-slider loading">

	    <div class="swiper-container lg-slider">
	        <div class="swiper-wrapper">
	        	@foreach($news_sliders as $key=>$slider)
	            <div class="swiper-slide">
	                <div class="mps-slide">
	                    <div class="mps-img img-lg"><img data-src="{{$slider_path_view.$slider->getImage()}}" alt="" class="swiper-lazy object-fit"></div>
                        <a href="" type="button" class="btn btn-default slider-btn">{{$slider->title}}</a>
                        <p class="slider-capt">{{$slider->caption}}</p>
	                    <div class="swiper-lazy-preloader"></div>
	                </div>
	            </div>

	            @endforeach

	        </div>

	        <div class="pattern-2" data-swiper-parallax="-50%"></div>
	    </div>

	    <div class="swiper-container sm-slider">
	        <div class="swiper-wrapper">
	        	@foreach($celebrity_img_sliders as $key=>$slider)
	            <div class="swiper-slide">
	                <div class="mps-slide">
	                    <div class="mps-img img-sm"><img data-src="{{$slider_path_view.$slider->getImage()}}" alt="" class="swiper-lazy object-fit"></div>
                        <a href="" type="button" class="btn btn-default slider-btn">{{$slider->title}}</a>
                        <p class="slider-capt">{{$slider->caption}}</p>
	                    <div class="swiper-lazy-preloader"></div>
	                </div>
	            </div>
	            @endforeach
	        </div>
	    </div>

	    <button type="button" class="btn mps-arrow mps-prev" aria-label="Previous">&#8592;</button>
	    <button type="button" class="btn mps-arrow mps-next" aria-label="Next">&#8594;</button>

	    <div class="curtain"></div>

	</div>

	


	<section class="more_items_sec" id="more_items_sec">
  		<div class="container">
	  		<div class="amz_products_content">
	  			<div class="amazon">
					<div class="brws-head">
						<h3>All the celebrities </h3>
						<div class="amz-lg">
							<a href="#" title>View all</a>
						</div><!--amz-lg end-->
						<div class="clearfix"></div>
					</div><!--abt-amz end-->
					<div class="amz-img-inf">
						<div class="row">
							@foreach($celebrities as $celebrity)
							<div class="col-lg-3 col-md-4 col-sm-6 col-6 full_wdth">
								<div class="mg-inf">
									<div class="img-sr">
                                        <a href="{{route('celebrities.show',[$celebrity->username])}}" title="" class="celeb-anchor">
                                        	<img class="celeb-img" id="celeb-img" src="{{$image_path_view.$celebrity->profileImage()}}" alt="Thumbnail">
                                        	@if(!empty($celebrity->profileVideo()))
                                        	<video controls data-play="hover" muted="muted" class="celeb-video" id="celeb-video" style="display: none;">
	 										 <source src="{{$video_path_view.$celebrity->profileVideo()}}" type="video/mp4">
                                            </video>
                                            @endif
                                        </a>                                      
									</div>
									<div class="info-short">
										<h3><a href="{{route('celebrities.show',[$celebrity->username])}}" title="">{{$celebrity->name}}</a></h3>
										<h5>{{$celebrity->designation}}</h5>
									</div>
									<div class="price">
										<span>৳{{$celebrity->minPackagePrice()}}-৳{{$celebrity->maxPackagePrice()}}</span>
									</div>
								</div><!--mg-inf end-->
							</div>
							@endforeach
						</div>
					</div><!--amz-img-in-->
				</div><!--amazon end-->
	  		</div><!--amz_products_content end-->
  		</div>
	</section><!--more_items_sec end-->



    <section class="banner-section" id="banner-section">
        <div class="container">
            <div class="banner-text">
                <h2>We make your special day unforgettable</h2>
                @if(Auth::guard('customer')->check())
                    @php($logged_customer = Auth::guard('customer')->user())
                    <a href="{{route('web.customer.show', $logged_customer->username)}}" title="">Let's start</a>
                @else
                    <a href="#" type="button" data-toggle="modal" data-target="#elegantLoginModalForm" title="">Let's start</a>
                @endif
            </div><!--banner-text end-->
            <h3 class="headline">Video of the Day by <a href="#" title="">newfox media</a></h3>
        </div>
    </section><!--banner-section end-->


    
@endsection

@section('page-js')
<script src="{{asset('web/plugins/slider/swiper.min.js')}}" integrity="sha512-VHsNaV1C4XbgKSc2O0rZDmkUOhMKPg/rIi8abX9qTaVDzVJnrDGHFnLnCnuPmZ3cNi1nQJm+fzJtBbZU9yRCww==" crossorigin="anonymous"></script>
<script type="text/javascript" src="{{asset('web/plugins/slider/slider.js')}}"></script>
@endsection


