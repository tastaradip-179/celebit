@extends('backend.common.master')
@section('page-css')
<!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START --> 
<link href="{{asset('backend/assets/plugins/uikit/css/uikit.min.css')}}" rel="stylesheet" type="text/css" media="screen"/>
<link href="{{asset('backend/assets/plugins/uikit/css/components/nestable.min.css')}}" rel="stylesheet" type="text/css" media="screen"/>        
<!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 

@endsection
@section('content')
<section id="main-content" class=" ">
    <section class="wrapper main-wrapper" style=''>

        <div class='col-xl-12 col-lg-12 col-md-12 col-12'>
            <div class="page-title">

                <div class="float-left">
                    <h1 class="title">{{$title}} List</h1>
                </div>
                {!! backurl() !!}
            </div>
            <a href="{{route($route.'create')}}" class="btn btn-success"> Add Slider</a>
            
        </div>
        <div class="clearfix"></div>

        <div class="row margin-0">
            <div class="col-xl-12">
                <section class="box ">
                    <header class="panel_header bg-primary">
                    
                        <h2 class="title float-left text-white">
                            All {{$title}}s 
                        </h2>
                    </header>
                    <div class="content-body">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-12">
                                <div id="celebritySerial" class="row uk-nestable" data-uk-nestable="{maxDepth:1}">
                                    @foreach($sliders as $slider)
                                    <li class="col-xl-6 col-md-12 col-lg-6 col-lg-12 " data-item="{{$slider->id}}">
                                        <div class="uk-nestable-item" >
                                            <div class="team-member col">
                                                <div class="row margin-0">


                                                    <div class="uk-nestable-handle"></div>
                                                    <div data-nestable-action="toggle"></div>
                                                    <div class="team-img col-xl-4 col-lg-4 col-md-4 col-4">
                                                        <a href="{{route($route.'show', $slider->id)}}">
                                                            <div class="thumb">
                                                                <img class="img-fluid" src="{{ $file_path_view.$slider->getImage() }}" alt="Thumbnail">
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="team-info col-xl-8 col-lg-8 col-md-8 col-8 ">
                                                        <h4 class="font-weight-bold"><a href="{{route($route.'show', $slider->id)}}"></a></h4>
                                                        <span class='team-member-edit'>
                                                            <a title="Edit" href="{{ route($route.'edit', [$slider->id]) }}">
                                                                <i class='fa fa-pencil icon-xs icon-rounded icon-primary'></i>
                                                            </a>
                                                            <a onclick="alertFunction('Delete', {{$slider->id}});" title="Delete"  href="javascript:void(0)"> 
                                                                <i class='fa fa-trash-o icon-xs  icon-rounded icon-danger'></i>
                                                            </a>
                                                            <form id="Delete{{$slider->id}}" action="{{ route($route.'destroy', [$slider->id]) }}" method="POST" style="display: none;">
                                                                {{ csrf_field() }}
                                                                @method('DELETE')
                                                            </form>
                                                        </span>
                                                        <span>{{$slider->title}} ({{$slider->type}})</span><br>
                                                        <span>{{$slider->caption}}</span><br>
                                                        <span>@if($slider->status=='1') Active @else Inactive @endif</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                    </div>
                </section>
            </div>
        </div>
    </section>
</section>
@endsection

@section('page-js')
<!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START --> 
<script src="{{asset('backend/assets/plugins/uikit/js/uikit.min.js')}}" type="text/javascript"></script>
<script src="{{asset('backend/assets/plugins/uikit/js/components/nestable.min.js')}}" type="text/javascript"></script>
<!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 
@endsection