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
                                    <th>Name</th>
                                    <th>Email Id</th>
                                    <th>Mobile No.</th>
                                    <th>Gender</th>
                                    <th>Designation</th>
                                    <th>DOB</th>
                                    <th>Address</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            @foreach($customers as $key=>$customer)
                            <tbody>
                                @if(!empty($customers))
                                <tr>
                                    <td>{{$customer->fullname}}&nbsp; ({{$customer->username}})</td>
                                    <td>{{$customer->email}}</td>
                                    <td>{{$customer->mobile}}</td>
                                    <td>{{$customer->gender}}</td>
                                    <td>{{$customer->designation}}</td>
                                    <td>{{$customer->dob}}</td>
                                    <td>{{$customer->address}}</td>
                                    <td>
                                        <a onclick="alertFunction('Delete', {{$customer->id}});" title="Delete" href="javascript:void(0)"> 
                                            <i class="fa fa-trash icon-danger icon-square icon-square-o"></i>
                                        </a>
                                        <form id="Delete{{$customer->id}}" action="{{ route($route.'destroy', [$customer->username]) }}" method="POST" style="display: none;">
                                          {{ csrf_field() }}
                                          @method('DELETE')
                                        </form>
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