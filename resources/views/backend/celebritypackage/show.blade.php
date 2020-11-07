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
            <div class="col-xl-8">
                <section class="box ">
                    <header class="panel_header">
                        <h2 class="title float-left">Package </h2>
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
                                    <th style="width:20%">Name</th>
                                    <th style="width:20%">Offered Duration</th>
                                    <th style="width:20%">Per Min Fee</th>
                                    <th style="width:20%">Extra Per Min Free</th>
                                    <th style="width:20%">Action</th>
                                </tr>
                            </thead>
                            @foreach($packages as $key=>$package)
                            <tbody>
                                @if(!empty($packages))
                                <tr>
                                    <td>{{$package_name->name}}</td>
                                    <td>{{$packages[$key]->duration}}</td>
                                    <td>{{$packages[$key]->per_minute_fee}}</td>
                                    <td>{{$packages[$key]->extra_per_minute_fee}}</td>
                                    <td>
                                    <form id="delete-celebritypackage" action="{{ route($route.'destroy', [$packages[$key]->id]) }}" method="POST" style="display: inline;">
                                            {{ csrf_field() }}
                                            @method('DELETE')
                                            <button class="btn btn-danger">Delete</button>
                                    </form>
                                    <a class="btn btn-defualt" href="{{ route($route.'edit', [$packages[$key]->id]) }}">Edit</a>
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