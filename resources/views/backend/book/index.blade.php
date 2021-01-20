@extends('backend.common.master')

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
        </div>
        <div class="clearfix"></div>

        <div class="row margin-0">
            <div class="col-xl-10">
                <section class="box ">
                    <header class="panel_header">
                        <h2 class="title float-left">All the {{$title}}s </h2>
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
                                    <th>Celebrity</th>
                                    <th>Customer</th>
                                    <th>Package</th>
                                    <th>Status</th>
                                    <th>Sent</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            @foreach($books as $key=>$book)
                            <tbody>
                                @if(!empty($book))
                                <tr>
                                    <td>{{$book->id}}</td>
                                    <td>{{$book->celebrity_package->celebrity->name}}</td>
                                    <td>{{$book->customer->fullname}}</td>
                                    <td>{{$book->celebrity_package->packageType->name}}</td>
                                    <td></td>
                                    <td>{{$book->created_at}}</td>
                                    <td>
                                        <a href="{{route($route.('show'),[$book->id])}}" title="request details">
                                            <i class="fa fa-eye icon-primary icon-square icon-square-o"></i>
                                        </a>
                                    </td>
                                </tr> 
                                @endif
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                </section>
            </div>
        </div>


    </section>
</section>



@endsection