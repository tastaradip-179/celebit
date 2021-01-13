@extends('web.common.master')





<style>

    

.video2 {
  width: 1200px;
}

.overlayImage {
  position: absolute;
}





	.starprise_video_columns_5 .starprise_video {
    width: 20%;
}
.starprise_video {
    width: 100%;
    min-height: 204px;
    position: relative;
    display: flex;
    padding: 0;
    overflow: visible;
    margin-bottom: 0;
}
.starprise_video_inner {
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    align-content: flex-end;
    align-items: flex-end;
    position: relative;
    flex-wrap: wrap;
    width: 100%;
    min-height: 280px;
    border-radius: 25px;
    padding: 1.5rem;
    margin: 1.1rem;
    background-color: #ececec;
    overflow: hidden;
    transition: box-shadow .3s;
}
.starprise_video_inner {
    display: -ms-flexbox;
    display: flex;
    width: 100%;
    -ms-flex-direction: column;
    flex-direction: column;
    position: relative;
}
.starprise_video .starprise_video_image {
    position: absolute;
    bottom: 0;
    right: 0;
    margin: 0;
    transition: all .3s ease-out;
    width: 100%;
    height: 100%;
}
.starprise_video .starprise_video_image a {
    position: absolute;
    bottom: 0;
    right: 0;
    margin: 0;
    width: 100%;
    height: 100%;
}
.starprise_video_image a, .starprise_video_image img {
    display: block;
}
.starprise_videos_list .starprise_video .starprise_video_image img {
    width: auto;
    max-width: none;
    height: 100%;
    opacity: 0.9;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}
.starprise_video .starprise_video_image img {
    position: absolute;
    width: 100%;
    max-width: 100%;
    height: auto;
    opacity: 1;
    top: 50%;
    left: 0;
    transform: translate(0%, -50%);
}
.starprise_video_image a, .starprise_video_image img {
    display: block;
}
.starprise_video .starprise_video_image a {
    position: absolute;
    bottom: 0;
    right: 0;
    margin: 0;
    width: 100%;
    height: 100%;
}
.starprise_video_image a, .starprise_video_image img {
    display: block;
}
.starprise_video .starprise_video_image video {
    position: absolute;
    width: 100%;
    height: auto;
    top: 50%;
    left: 0;
    transform: translate(0%, -50%);
}
</style>


@section('content')

 	<div class="starprise_video_inner"> 			
 		<div class="starprise_video_image" data-video-src="https://starprise-public.s3.eu-north-1.amazonaws.com/talent/khaled-rico/khaled-rico.mp4"> 		
 			<a href="https://starprise.co/talent/khaled-rico/"> 			
 				<img src="https://starprise-public.s3.eu-north-1.amazonaws.com/talent/khaled-rico/khaled-rico.jpg" class="external-img app-post-image">		
 			</a>
			<a href=" https://starprise.co/talent/khaled-rico/ " class="video-wrapper-anchor">
				<video playsinline="" loop="" autoplay="" muted="" style="display: none;" id="list_video_starprise_video_3140">
					<source src="https://starprise-public.s3.eu-north-1.amazonaws.com/talent/khaled-rico/khaled-rico.mp4" type="video/mp4">
				</video>
 			</a>
			<div class="video-controls" style="display: none;">
				<i class="fas fa-volume-mute"></i>
				<i class="fas fa-volume-up"></i>
			</div> 	
		</div> 
		<h3 class="starprise_video_title" style="visibility: visible;"> 		
			<a itemprop="url" href="https://starprise.co/talent/khaled-rico/"> 			
				<span class="f-name">Khaled</span> 			
				<span class="s-name">Rico</span> 		
			</a>     	 
		</h3> 	
		<div class="starprise_video_excerpt" style="visibility: visible;"> 		
			<p>Actor &amp; Singer</p> 	
		</div> 	
		<div class="downloadFooter" style="display: none;"> 		
			<div class="starprise_video_buy_button"> 		
				<a href="https://starprise.co/talent/khaled-rico/" class="button">Request video</a> 
			</div> 	
		</div> 	 		
 	</div> 
<!-- .... -->
<img src="http://placehold.it/300x150" id="theImage">

<p><a href="#" class="yourClass" data-img="http://placehold.it/300x150/f00">Red</a></p>
    <p><a href="#" class="yourClass" data-img="http://placehold.it/300x150/00f">Blue</a></p>



<!-- ....... -->
<div id="mainimage">img/image1.png</div>

<p><a href="#" id="pet1">Dog</a></p>
<p><a href="#" id="pet2">Cat</a></p>





<!-- ....... -->
<div class="amazon">
    <div class="brws-head">
        <h3>Top rated celebrity </h3>
        <div class="amz-lg">
            <a href="#" title>View all</a>
        </div><!--amz-lg end-->
        <div class="clearfix"></div>
    </div><!--abt-amz end-->
    <div class="amz-img-inf">
        <div class="row">
            <div class="col-lg-2 col-md-4 col-sm-6 col-6 full_wdth">
                <div class="mg-inf">
                    <div class="img-sr">
                        <a href="{{URL::to('/profile')}}" title="" class="imgh">
                            <img src="{{asset('web/images/resources/pro1.png')}}" alt="" class="celeb-img">
                            <video class="vdo" controls data-play="hover" muted="muted" style="display: none;">
                             <source src="https://www.w3schools.com/html/movie.mp4" type="video/mp4">
                            </video>
                        </a>
                    </div>
                    <div class="info-sr">
                        <h3><a href="{{URL::to('/profile')}}" title="">HEMOON Men</a></h3>
                        <span>started at ৳3200</span>
                    </div>
                </div><!--mg-inf end-->
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6 col-6 full_wdth">
                                <div class="mg-inf">
                                    <div class="img-sr">
                                        <a href="{{URL::to('/profile')}}" title="" class="imgh">
                                            <img src="{{asset('web/images/resources/pro4.png')}}" alt="" class="celeb-img">
                                            <video class="vdo" controls data-play="hover" muted="muted" style="display: none;">
                                                 <source src="https://www.w3schools.com/html/movie.mp4" type="video/mp4">
                                            </video>
                                        </a>
                                    </div>
                                    <div class="info-sr">
                                        <h3> <a href="{{URL::to('/profile')}}" title="">Men's Big-Tall</a></h3>
                                        <span class="pr-d">started at ৳3900</span>
                                    </div>
                                </div><!--mg-inf end-->
                            </div>
                            <div class="col-lg-2 col-md-4 col-sm-6 col-6 full_wdth">
                                <div class="mg-inf">
                                    <div class="img-sr">
                                        <a href="{{URL::to('/profile')}}" title="" class="imgh">
                                            <img src="{{asset('web/images/resources/pro5.png')}}" alt="" class="celeb-img">
                                            <video class="vdo" controls data-play="hover" muted="muted" style="display: none;">
                             <source src="https://www.w3schools.com/html/movie.mp4" type="video/mp4">
                            </video>
                                        </a>
                                    </div>
                                    <div class="info-sr">
                                        <h3> <a href="{{URL::to('/profile')}}" title="">Dickies </a></h3>
                                        <span class="pr-d">started at ৳1700</span>
                                    </div>
                                </div><!--mg-inf end-->
                            </div>
        </div>
    </div>
</div>


<!-- <img src="http://s.codeproject.com/App_Themes/CodeProject/Img/logo250x135.gif" alt="rajkumar" class="imgh"></img> -->










@endsection


@section('page-js')
<script>
    $(document).ready(function () {
    $('.imgh')
        .mouseover(function () {
         $(this).find(".vdo").show();   
        $(this).find(".celeb-img").hide();   
    })
        .mouseout(function () {
            $(this).find(".vdo").hide();   
        $(this).find(".celeb-img").show();  
    });
});
</script>

<script>
    $(document).ready(function() {
        var $mainImage = $('#mainimage'),
        originalImageSrc = $mainImage.text(); // originalImageSrc = $mainImage.attr('src');
    
    $('a')
        .on('mouseover', function() {
            var newImageSrc = 'img/' + $(this).attr('id') + '.jpg';
            $mainImage.text(newImageSrc); // $mainImage.attr('src', newImageSrc);
        })
        .on('mouseout', function() {
            $mainImage.text(originalImageSrc); // $mainImage.attr('src', originalImageSrc);
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('.yourClass').hover(function() {
            var newImg = $(this).data('img');
            $('#theImage').attr('src',newImg)
        }, 
        function() {
            $('#theImage').attr('src','http://placehold.it/300x150')
        });
    });
</script>

<script>
$(document).ready(function() {
  $('.video2').each(function(i, obj) {
    $(this).on("mouseover", hoverVideo);
    $(this).on("mouseout", hideVideo);
  });
});

function hoverVideo() {
  $(this).find(".overlayImage").hide();
  $(this).find(".thevideo")[0].play();
}

function hideVideo(video) {
  $(this).find(".thevideo")[0].currentTime = 0;
  $(this).find(".thevideo")[0].pause();
  $(this).find(".overlayImage").show();
}
</script>
 <script>
 	function() {
  var video_id = '';
  var $image_element = jQuery(this).find('.starprise_video_image');

  if ($image_element.data('video-src') !== undefined) {
    video_id = 'list_video_' + jQuery(this).parents('.starprise_video').attr('id');

    // if there's a video playing, stop it
    if (videos_playing.length != 0) {
      stop_playing_video(videos_playing, video_id);
    }

    jQuery(this).find('.starprise_video_title, .starprise_video_excerpt').css('visibility', 'visible');
    jQuery(this).parents('.starprise_video').find('.downloadFooter').hide();
  }
}
 </script>	

  <script>
 	function(a) {
  return void 0 === n || a && n.event.triggered === a.type ? void 0 : n.event.dispatch.apply(k.elem, arguments)
}
 </script>	



@endsection