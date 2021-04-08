@extends('web.common.master')

@section('page-css')
<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/5.4.5/css/swiper.min.css" integrity="sha512-uCQmAoax6aJTxC03VlH0uCEtE0iLi83TW1Qh6VezEZ5Y17rTrIE+8irz4H4ehM7Fbfbm8rb30OkxVkuwhXxrRg==" crossorigin="anonymous" />
<link rel="stylesheet" href="{{asset('web/css/slider.css')}}">
@endsection

@section('content')

	<div class="multi-px-slider loading">

	    <div class="swiper-container lg-slider">
	        <div class="swiper-wrapper">
	        	@foreach($news_sliders as $key=>$slider)
	            <div class="swiper-slide">
	                <div class="mps-slide">
	                    <div class="mps-img img-lg"><img data-src="{{$slider_path_view.$slider->getImage()}}" alt="" class="swiper-lazy object-fit"></div>
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
@endsection

@section('page-js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/5.4.5/js/swiper.min.js" integrity="sha512-VHsNaV1C4XbgKSc2O0rZDmkUOhMKPg/rIi8abX9qTaVDzVJnrDGHFnLnCnuPmZ3cNi1nQJm+fzJtBbZU9yRCww==" crossorigin="anonymous"></script>

<script>
    // Params
    const mpSlider = document.querySelector('.multi-px-slider');
    let interleaveOffset = 0.5;

    // init small slider
    const smallSlider = new Swiper('.sm-slider', {
        touchRatio: 0, // disable swipe
        loop: true,
        slidesPerView: 'auto',
        preloadImages: false,
        lazy: {
            loadPrevNext: true,
            loadPrevNextAmount: 2,
        },
        watchSlidesProgress: true,
        watchSlidesVisibility: true,
        on: {
            init: function(){
                let swiper = this;
            },
            lazyImageReady: function(){
                let swiper = this;

                setTimeout(function() {
                    swiper.update();
                }, 500);
            },
            progress: function(){
                let swiper = this;
                for (let i = 0; i < swiper.slides.length; i++) {
                    let slideProgress = swiper.slides[i].progress,
                        innerOffset = swiper.width * interleaveOffset,
                        innerTranslate = slideProgress * innerOffset;
                    swiper.slides[i].querySelector(".img-sm").style.transform = "translateX(" + innerTranslate + "px)";
                }
            },
            touchStart: function() {
                let swiper = this;
                for (let i = 0; i < swiper.slides.length; i++) {
                    swiper.slides[i].style.transition = "";
                }
            },
            setTransition: function(speed) {
                let swiper = this;
                for (let i = 0; i < swiper.slides.length; i++) {
                    swiper.slides[i].style.transition = speed + "ms";
                    swiper.slides[i].querySelector(".img-sm").style.transition = speed + "ms";
                }
            }
        }
    });


    // init large slider
    const largeSlider = new Swiper('.lg-slider', {
        parallax: true,
        loop: true,
        speed: 2000,
        slidesPerView: 'auto',
        preloadImages: false,
        lazy: {
            loadPrevNext: true,
            loadPrevNextAmount: 2,
        },
        watchSlidesProgress: true,
        watchSlidesVisibility: true,
        touchEventsTarget: 'wrapper',
        controller: {
            control: smallSlider
        },
        on: {
            init: function(){
                let swiper = this;
            },
            lazyImageReady: function(){
                let swiper = this;

                setTimeout(function() {
                    swiper.update();
                    mpSlider.classList.remove('loading');
                }, 500);
            },
            progress: function(){
                let swiper = this;
                for (let i = 0; i < swiper.slides.length; i++) {
                    let slideProgress = swiper.slides[i].progress,
                        innerOffset = swiper.width * interleaveOffset,
                        innerTranslate = slideProgress * innerOffset;
                    swiper.slides[i].querySelector(".img-lg").style.transform = "translateX(" + innerTranslate + "px)";
                }
            },
            touchStart: function() {
                let swiper = this;
                for (let i = 0; i < swiper.slides.length; i++) {
                    swiper.slides[i].style.transition = "";
                }
            },
            setTransition: function(speed) {
                let swiper = this;
                for (let i = 0; i < swiper.slides.length; i++) {
                    swiper.slides[i].style.transition = speed + "ms";
                    swiper.slides[i].querySelector(".img-lg").style.transition = speed + "ms";
                }
            }
        }
    });


    // Set up animations
    let slideDelay = 2000;
    let $mpsArrow = $('.mps-arrow');

    function runAnimation() {
        mpSlider.classList.add('is-animating');
    }

    function endAnimation() {
        mpSlider.classList.remove('is-animating');
    }


    // custom arrows
    $mpsArrow.each((i, el) => {
        const _this = $(el);

       _this.on('click', function() {

            // disable arrows
            $mpsArrow.prop('disabled', true);
            // run animation
            runAnimation();

            // go to prev/next slide
            if (_this.hasClass('mps-prev')) {
                setTimeout(() => {
                    largeSlider.slidePrev();
                }, slideDelay)
            } else if (_this.hasClass('mps-next')) {
                setTimeout(() => {
                    largeSlider.slideNext();
                }, slideDelay)
            }

            // detect animation end
            const curtain = document.querySelector('.curtain');
            curtain.addEventListener('animationend', () => {
                // re-enable arrows
                $mpsArrow.prop('disabled', false);
                // end animation
                endAnimation();
            });

       })

    })


   // TO DO: check if slider is in viewport?
   let mpsInViewport = true;

   if (mpsInViewport) {
        $(document).off('keyup').on('keyup', function(e) {
            if (e.keyCode == '37') {
                $('.mps-prev').trigger('click');
            } else if (e.keyCode == '39') {
                $('.mps-next').trigger('click');
            }
       });
   }

</script>

@endsection


