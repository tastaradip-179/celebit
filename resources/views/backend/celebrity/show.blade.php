@extends('backend.common.master')
@section('page-css')
<!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START --> 
<link href="{{asset('backend/assets/plugins/uikit/css/uikit.min.css')}}" rel="stylesheet" type="text/css" media="screen"/>
<link href="{{asset('backend/assets/plugins/uikit/css/components/nestable.min.css')}}" rel="stylesheet" type="text/css" media="screen"/>        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 

@endsection
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
        <div class="col-lg-12">
            <section class="box nobox">
                <div class="content-body">
                    <div class="row">
                        <div class="col-md-3 col-sm-4 col-xs-12">
                            <div class="uprofile-image">
                                <img src="{{$file_path.$celebrity->profileImage()}}" class="img-fluid">
                            </div>
                            <div class="uprofile-name">
                                <h3>
                                    <a href="#">{{$celebrity->name}}</a>
                                    <!-- Available statuses: online, idle, busy, away and offline -->
                                    <span class="uprofile-status online"></span>
                                </h3>
                                <p class="uprofile-title">{{$celebrity->designation}}</p>
                                <p class="uprofile-title">Category: {{$celebrity->category}}</p>
                            </div>
                            <div class="uprofile-info">
                                <ul class="list-unstyled">
                                    <li><a href=""><i class='fa fa-plus-square-o'></i> New Requests</a></li>
                                    <li><a href="{{route('backend.celebrities.requests', [$celebrity->username])}}"><i class='fa fa-address-book-o'></i> All Requests</a></li>
                                    <li><a href=""><i class='fa fa-video-camera'></i> My Videos</a></li>
                                </ul>
                            </div> 
                            <div class="uprofile-buttons">
                                <a class="btn btn-md btn-primary">Send Message</a>
                            </div>
                            <div class=" uprofile-social">
                                <a href="#" class="btn btn-primary btn-md facebook"><i class="fa fa-facebook icon-xs"></i></a>
                                <a href="#" class="btn btn-primary btn-md twitter"><i class="fa fa-twitter icon-xs"></i></a>
                                <a href="#" class="btn btn-primary btn-md google-plus"><i class="fa fa-google-plus icon-xs"></i></a>
                                <a href="#" class="btn btn-primary btn-md dribbble"><i class="fa fa-dribbble icon-xs"></i></a>
                            </div>
                        </div>
                        <div class="col-md-9 col-sm-8 col-xs-12">
                            <div class="uprofile-content">
                                <div class="">
                                    <h3>About:</h3>
                                    <p>{!! $celebrity->about !!}</p>
                                        <div class="clearfix"></div>
                                        <h3>Package list <a href="{{route('backend.admin.celebrity.package',['celebrity' => $celebrity->username])}}" class="pull-right btn btn-info"> Add Package </a></h3>
                                        <hr>
                                        <div class="wid-notification">

                                            @if(!empty($celebrity->celebrity_packages))
                                                <ul id="celebritySerial" class="list-unstyled notification-widget uk-nestable" data-uk-nestable="{maxDepth:1}">
                                                    @foreach($celebrity->celebrity_packages as $celebrity_package)
                                                    <li data-item="{{$celebrity_package->id}}">
                                                        <div class="uk-nestable-item">
                                                            <div class="uk-nestable-handle"></div>
                                                            <div data-nestable-action="toggle"></div>
                                                            <div class="">
                                                                
                                                                <div class="user-img">
                                                                    <img src="https://via.placeholder.com/100" alt="user-image" class="img-circle img-inline">
                                                                </div>
                                                                <div>
                                                                    <span class="name">
                                                                        <strong><a href="{{route('backend.admin.celebrity.package',['celebrity' => $celebrity->username])}}">{{$celebrity_package->packageType->name}}</a></strong>
                                                                        <span class="pull-right">
                                                                            <a title="Edit" href="{{ route('backend.admin.celebritypackages.edit', [$celebrity_package->id]) }}">
                                                                                <i class='fa fa-pencil icon-xs icon-rounded icon-primary'></i>
                                                                            </a>
                                                                            <a onclick="alertFunction('Delete', {{$celebrity_package->id}});" title="Delete"  href="javascript:void(0)"> 
                                                                                <i class='fa fa-trash-o icon-xs  icon-rounded icon-danger'></i>
                                                                            </a>
                                                                            <form id="Delete{{$celebrity_package->id}}" action="{{ route('backend.admin.celebritypackages.destroy', [$celebrity_package->id]) }}" method="POST" style="display: none;">
                                                                                {{ csrf_field() }}
                                                                                @method('DELETE')
                                                                            </form>
                                                                        </span>
                                                                    </span>
                                                                    <span class="desc">
                                                                        Offer Time: {{$celebrity_package->duration}} | Price (in BDT): {{$celebrity_package->total}} | Extra Per Min Price (in BDT): {{$celebrity_package->extra_per_minute_fee}}
                                                                    </span>
                                                                    <span class="desc">
                                                                        <b>Tag:</b> {!! $celebrity_package->AllTags() !!}
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </div>
                                    <hr>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>
</section>
@endsection

@section('page-js')
<!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START --> 
<script src="{{asset('backend/assets/plugins/uikit/js/uikit.min.js')}}" type="text/javascript"></script>
<script src="{{asset('backend/assets/plugins/uikit/js/components/nestable.min.js')}}" type="text/javascript"></script>
<!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 
<script type="text/javascript">
    $("#celebritySerial").on('stop.uk.nestable', function(ev) {
        var serialized = $(this).data('nestable').serialize();
        //     str = '';
        $.ajax({
            url: '{{route('backend.admin.data.serialize')}}',
            method: 'get',
            data: {data: serialized, sort: 'celebrity-package'},
            success:function(response){
                if (response == 'success') {
                    toastr["warning"]("Change successfully save!");
                }
                console.log(response);
            }
        })
    });
</script>
@endsection