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
                                <div class="package-desc">
                                    <h3>Package Details</h3>
                                    <h6>Package Name: <span>{{$celebrity_package->packageType->name}}</span></h6>
                                    <h6>Duration: <span>{{$celebrity_package->duration}}min</span></h6>
                                    <h6>Total: <span>{{$celebrity_package->total}}taka</span></h6>
                                </div>
                                <hr/>
                                <div class="request-desc">
                                    <h3>{{$title}} Details</h3>
                                    @if(!empty($wishto))
                                    <h6>For: {{$book->wishto->fullname}} ({{$book->wishto->pronoun}})</h6>
                                    <h6>From: {{$book->from}}</h6>
                                    @else
                                    <h6>For: {{$customer->fullname}} (ownself)</h6>
                                    @endif
                                    <h6>Occasion: {{$book->subject}}</h6>
                                    <h6>Message: {{$book->message}}</h6>
                                    <h6>Upload deadline: {{$book->upload_time}}</h6>     
                                </div>
                                <hr/>
                                <div class="status">
                                    <h3>Status</h3>
                                    <ul  class="list-group list-group-horizontal">
                                        <li class="list-group-item list-group-item-borderless">
                                            <form id="getAccepted{{$book->id}}" action="{{route('backend.celebrities.requests.accept',[$book->id])}}" method="POST">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="status" value="1" />
                                            <button type="submit" class="btn btn-info"> Accept</button>
                                        </form>
                                        </li>
                                        <li class="list-group-item list-group-item-borderless">
                                            <form id="getRejected{{$book->id}}" action="{{route('backend.celebrities.requests.reject',[$book->id])}}" method="POST">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="status" value="2" />
                                            <button type="submit" class="btn btn-danger"> Reject</button>
                                        </form>
                                        </li>
                                    </ul>
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