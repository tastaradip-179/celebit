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

        <div class="row margin-0">
            <div class="col-xl-12">
                <section class="box ">
                    <header class="panel_header">
                        <h2 class="title float-left">All the Requests</h2>
                        <div class="actions panel_actions float-right">
                            <i class="box_toggle fa fa-chevron-down"></i>
                            <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                            <i class="box_close fa fa-times"></i>
                        </div>
                    </header>
                    <div class="content-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>SN</th>
                                    <th>Customer</th>
                                    <th>Package</th>
                                    <th>Status</th>
                                    <th>Sent</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            @if(!empty($books))
                           @foreach($books as $key=>$book)
                            <tbody>
                                @if(!empty($book))
                                <tr>
                                    <td>{{$book->id}}</td>
                                    <td>{{$book->customer->fullname}}</td>
                                    <td>{{$book->celebrity_package->packageType->name}}</td>
                                    <td><a href="#" class="badge 
                                        @if($book->status=='0') badge-warning"> Pending 
                                        @elseif($book->status=='1') badge-info"> Accepted 
                                        @elseif($book->status=='2') badge-danger"> Rejected 
                                        @elseif($book->status=='3') badge-primary"> Completed  
                                        @endif</a>
                                    </td>
                                    <td>{{$book->created_at}}</td>
                                    <td>
                                        @if($book->status=='1')
                                        <a href="{{route('backend.celebrities.videos.create', [$book->id])}}" title="Video"><i class="fa fa-video-camera icon-primary icon-square icon-square-o"></i></a>
                                        @endif
                                        <a href="{{route('backend.celebrities.requests.show', [$book->id])}}" title="Request details">
                                            <i class="fa fa-eye icon-info icon-square icon-square-o"></i>
                                        </a>
                                        <a onclick="alertFunction('Delete', {{$book->id}});" title="Delete" href="javascript:void(0)"> 
                                            <i class="fa fa-trash icon-danger icon-square icon-square-o"></i>
                                        </a>
                                        <form id="Delete{{$book->id}}" action="{{ route('backend.celebrities.requests.delete', [$book->id]) }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </td>
                                </tr> 
                                @endif
                            </tbody>
                            @endforeach
                            @endif
                        </table>
                    </div>
                </section>
            </div>
        </div>


    </section>
</section>



@endsection