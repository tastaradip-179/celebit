@extends('backend.common.master')

@section('content')

<section id="main-content" class=" ">
    <section class="wrapper main-wrapper" style=''>

        <div class='col-xl-12 col-lg-12 col-md-12 col-12'>
            <div class="page-title">

                <div class="float-left">
                    <h1 class="title">{{$title}} Details</h1>
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
                        	<h4 class="label">{{$title}} to</h4>
                            <div class="uprofile-image">
                                <img src="{{$file_path_view.$celebrity->profileImage()}}" class="img-fluid" alt="celebrity">
                            </div>
                            <div class="uprofile-name">
                                <h3>
                                    <a href="#">{{$celebrity->name}}</a>
                                    <!-- Available statuses: online, idle, busy, away and offline -->
                                    <span class="uprofile-status online"></span>
                                </h3>
                                <p class="uprofile-title">{{$celebrity->designation}}</p>
                            </div>
                            <h4 class="label">from</h4>
                            <div class="uprofile-image">
                                <img src="" class="img-fluid" alt="customer">
                            </div>
                            <div class="uprofile-name">
                                <h3>
                                    <a href="#">{{$customer->fullname}}</a>
                                    <!-- Available statuses: online, idle, busy, away and offline -->
                                    <span class="uprofile-status online"></span>
                                </h3>
                            </div>
                        </div>
                        <div class="col-md-9 col-sm-8 col-xs-12">
                            <div class="uprofile-content">
                            	<h4 class="label">{{$title}} is for <strong>{{$book->wishto->fullname}}</strong></h4>
                                <div class="">
                                	<label>Occasion:</label>
                                	<h6>{{$book->subject}}</h6>
                                    <label>Message:</label>
                                	<h6>{{$book->message}}</h6>
                                	<label>Upload deadline:</label>
                                	<h6>{{$book->upload_time}}</h6>
                                	<label>From:</label>
                                	<h6>{{$book->from}}</h6>
                                    <label>Package Details:</label>
                                	<h6>Package Name: {{$celebrity_package->packageType->name}}</h6>
                                	<h6>Duration: {{$celebrity_package->duration}}min</h6>
                                	<h6>total: {{$celebrity_package->total}}taka</h6>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        </section>
</section>

@endsection