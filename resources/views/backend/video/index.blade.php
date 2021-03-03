@extends('backend.common.master')

@section('content')

<section id="main-content" class=" ">
    <section class="wrapper main-wrapper" style=''>

        <div class='col-xl-12 col-lg-12 col-md-12 col-12'>
            <div class="page-title">

                <div class="float-left">
                    <h1 class="title">{{$title}}</h1>
                </div>
                {!! backurl() !!}
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row margin-0 videos">
            @if(!empty($celebrity->videos))
            @foreach($celebrity->videos as $key=>$video)
            <div class="col-xl-3">
                <video width="100%" height="290" controls>
                        <source src="{{$file_path_view.$video->video_url}}" type="video/mp4">
                </video>
                <a title="Make featured" href="{{ route($route.'make.featured', [$video->id]) }}"> 
                    <i class='fa fa-share icon-xs  icon-rounded icon-info'></i>
                </a>
                <a onclick="alertFunction('Delete', {{$video->id}});" title="Delete"  href="javascript:void(0)"> 
                    <i class='fa fa-trash-o icon-xs  icon-rounded icon-danger'></i>
                </a>
                <form id="Delete{{$video->id}}" action="{{ route($route.'destroy', [$video->id]) }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                    @method('DELETE')
                </form>
            </div>
            @endforeach
            @endif
        </div>

    </section>
</section>

@endsection