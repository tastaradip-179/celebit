@extends('web.common.master')

@section('page-css')
<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/5.4.5/css/swiper.min.css" integrity="sha512-uCQmAoax6aJTxC03VlH0uCEtE0iLi83TW1Qh6VezEZ5Y17rTrIE+8irz4H4ehM7Fbfbm8rb30OkxVkuwhXxrRg==" crossorigin="anonymous" />
<link rel="stylesheet" href="{{asset('web/css/slider.css')}}">
<style>
    button { border: 0; padding: 1rem 2rem; background-color: #222; color: #fff; cursor: pointer; }
</style>
@endsection

@section('content')

<div class="multi-px-slider loading">

    <div class="swiper-container lg-slider">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="mps-slide">
                    <div class="mps-img img-lg"><img data-src="https://source.unsplash.com/TWCSYLJMoVc/1280x960" alt="" class="swiper-lazy object-fit"></div>
                    <div class="swiper-lazy-preloader"></div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="mps-slide">
                    <div class="mps-img img-lg"><img data-src="https://source.unsplash.com/yHaburAEFo4/1280x960" alt="" class="swiper-lazy object-fit"></div>
                    <div class="swiper-lazy-preloader"></div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="mps-slide">
                    <div class="mps-img img-lg"><img data-src="https://source.unsplash.com/ihzhMA2-l4Q/1280x960" alt="" class="swiper-lazy object-fit"></div>
                    <div class="swiper-lazy-preloader"></div>
                </div>
            </div>
        </div>
        <div class="pattern-2" data-swiper-parallax="-50%"></div>
    </div>

    <div class="swiper-container sm-slider">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="mps-slide">
                    <div class="mps-img img-sm"><img data-src="https://source.unsplash.com/Dz5j0QKVUGY/1280x960" alt="" class="swiper-lazy object-fit"></div>
                    <div class="swiper-lazy-preloader"></div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="mps-slide">
                    <div class="mps-img img-sm"><img data-src="https://source.unsplash.com/HGa7kULkQWY/1280x960" alt="" class="swiper-lazy object-fit"></div>
                    <div class="swiper-lazy-preloader"></div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="mps-slide">
                    <div class="mps-img img-sm"><img data-src="https://source.unsplash.com/RRSXLJPbqEQ/1280x960" alt="" class="swiper-lazy object-fit"></div>
                    <div class="swiper-lazy-preloader"></div>
                </div>
            </div>
        </div>
    </div>

    <button type="button" class="mps-arrow mps-prev" aria-label="Previous">Previous</button>
    <button type="button" class="mps-arrow mps-next" aria-label="Next">Next</button>

    <div class="curtain"></div>

</div>

@include('web.common.includes.script')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
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

</body>
</html>
