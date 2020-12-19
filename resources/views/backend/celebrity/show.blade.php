@extends('backend.common.master')

@section('content')
<section id="main-content" class=" ">
    <section class="wrapper main-wrapper" style=''>
        <div class='col-xl-12 col-lg-12 col-md-12 col-12'>
            <div class="page-title">
                <div class="float-left">
                    <h1 class="title">{{$title}}</h1>
                </div>
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
                            </div>
                            {{-- <div class="uprofile-info">
                                <ul class="list-unstyled">
                                    <li><i class='fa fa-home'></i> New York, USA</li>
                                    <li><i class='fa fa-user'></i> 340 Contacts</li>
                                </ul>
                            </div> --}}
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
                                    <h4>About:</h4>
                                    <p>{!! $celebrity->about !!}</p>
                                    @if(!empty($celebrity->celebritypackages))
                                    @foreach($celebrity->celebritypackages as $package)
                                        <div class="clearfix"></div>
                                        <hr>
                                        <h4>Education:</h4>
                                        <ul>
                                            <li>B.Com from Ski University</li>
                                            <li>In hac habitasse platea dictumst.</li>
                                            <li>In hac habitasse platea dictumst.</li>
                                            <li>Vivamus elementum semper nisi.</li>
                                            <li>Praesent ac sem eget est egestas volutpat.</li>
                                        </ul>
                                        <div class="clearfix"></div>
                                    @endforeach
                                    @endif
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