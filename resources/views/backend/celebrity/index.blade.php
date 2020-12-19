@extends('backend.common.master')

@section('content')
<section id="main-content" class=" ">
    <section class="wrapper main-wrapper" style=''>

        <div class='col-xl-12 col-lg-12 col-md-12 col-12'>
            <div class="page-title">

                <div class="float-left">
                    <h1 class="title">{{$title}} List</h1>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row margin-0">
            <div class="col-xl-12">
                <section class="box ">
                    <div class="content-body">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-12">
                                <div class="row">
                                    @foreach($celebrities as $celebrity)
                                    <div class="col-xl-6 col-md-12 col-lg-6 col-lg-12">
                                        <div class="team-member col">
                                            <div class="row margin-0">
                                                <div class="team-img col-xl-4 col-lg-4 col-md-4 col-4">
                                                    <div class="thumb">
                                                        <img class="img-fluid" src="{{ $file_path.$celebrity->profileImage() }}" alt="Thumbnail">
                                                    </div>
                                                </div>
                                                <div class="team-info col-xl-8 col-lg-8 col-md-8 col-8 ">
                                                    <h4 class="font-weight-bold"><a href="{{route($route.'show', $celebrity->username)}}">{{$celebrity->name}}</a></h4>
                                                    <span class='team-member-edit'>
                                                        <a class="text-danger" title="View" href="{{ route('admin.celebritypackages.show',[$celebrity->id]) }}">
                                                            <i class='fa fa-info-circle icon-xs icon-rounded icon-info'></i>
                                                        </a>
                                                        <a title="Edit" href="{{ route($route.'edit', [$celebrity->username]) }}">
                                                            <i class='fa fa-pencil icon-xs icon-rounded icon-primary'></i>
                                                        </a>
                                                        <a onclick="alertFunction('Delete', {{$celebrity->id}});" title="Delete"  href="javascript:void(0)"> 
                                                            <i class='fa fa-trash-o icon-xs  icon-rounded icon-danger'></i>
                                                        </a>
                                                    </span>
                                                    <span>{{$celebrity->designation}}<br>
                                                    <small>Phone:</small> {{$celebrity->mobile}}<br>
                                                    <small>Email:</small> {{$celebrity->email}}</span><br>
                                                    {!! $celebrity->AllTags() !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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