@extends('web.common.master')
@section('page-css')
<link rel="stylesheet" href="{{asset('web/plugins//videoPopup/css/jquery.popVideo.css')}}">
@endsection
@section('content')

    

<video src="https://www.w3schools.com/html/movie.mp4" webkit-playsinline playsinline data-video="https://www.w3schools.com/html/movie.mp4"
       loop muted autoplay id="video" class="video" style="width: 300px">
</video>









@endsection


@section('page-js')
<script src="{{asset('web/plugins/videoPopup/js/jquery.popVideo.js')}}"></script>
<script>
    $('#video').click(function () {
        $('#video').popVideo({
            playOnOpen: true,
            title: "jQueryScript.net Demo Page",
          closeOnEnd: true,
            pauseOnClose: true,
        }).open();
        $('.content').show();
    });
</script>

@endsection

