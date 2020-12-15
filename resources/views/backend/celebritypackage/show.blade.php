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
            <div class="col-xl-7">
                <section class="box ">
                    <header class="panel_header">
                        <h2 class="title float-left">All the Packages </h2>
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
                            @foreach($celebrity_packages as $key=>$celebrity_package)
                            <tbody>
                                @if(!empty($celebrity_packages))
                                <tr>
                                    <td>{{$celebrity_packages[$key]->package->name}}</td>
                                    <td>{{$celebrity_packages[$key]->duration}}</td>
                                    <td>{{$celebrity_packages[$key]->per_minute_fee}}</td>
                                    <td>{{$celebrity_packages[$key]->extra_per_minute_fee}}</td>
                                    <td>
                                    <form id="delete-celebritypackage" action="{{ route($route.'destroy', [$celebrity_packages[$key]->id]) }}" method="POST" style="display: inline;">
                                            {{ csrf_field() }}
                                            @method('DELETE')
                                            <button class="btn btn-danger">Delete</button>
                                    </form>
                                    <a class="btn btn-defualt" href="{{ route($route.'edit', [$celebrity_packages[$key]->id]) }}">Edit</a>
                                    </td>
                                </tr> 
                                @endif 
                            </tbody>
                            @endforeach 
                        </table>
                    </div>
                </section>
            </div>
            <div class="col-xl-5">
                <section class="box ">
                    <header class="panel_header">
                        <h2 class="title float-left">Create {{$celebrity->name}}'s Package </h2>
                        <div class="actions panel_actions float-right">
                            <i class="box_toggle fa fa-chevron-down"></i>
                            <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                            <i class="box_close fa fa-times"></i>
                        </div>
                    </header>
                    <div class="content-body">
                        <form id="form" method="post" action="{{route($route.'store')}}" style="width: 100%;" enctype="multipart/form-data">
                          {{csrf_field()}}
                            <div class="row margin-0">
                                  <div class="col-lg-12 col-md-12 col-12">
                                        
                                        <input type="hidden" name="celebrity_id" value="{{$celebrity->id}}" />

                                        <div class="form-group">
                                            <label class="form-label" for="package_id">Package Type</label>
                                              <div class="controls">
                                                    <select class="form-control select2" name="package_id">
                                                          <option value=""></option>
                                                          @foreach($packages as $key=>$package)
                                                            <option value="{{$package->id}}">{{$package->name}}</option>
                                                          @endforeach
                                                    </select>
                                              </div>
                                        </div>
                                      
                                        <div class="form-group">
                                            <label class="form-label" for="duration">Offered Duration (in min)</label>
                                            <span class="desc">e.g. "3"</span>
                                            <div class="controls">
                                                <input type="number" class="form-control" id="duration" name="duration" >
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="per_minute_fee">Per Minute Fee (in TK)</label>
                                            <span class="desc">e.g. "100"</span>
                                            <div class="controls">
                                                <input type="number" class="form-control" id="per_minute_fee" name="per_minute_fee" >
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="extra_per_minute_fee">Extra Per Minute Fee (in TK)</label>
                                            <span class="desc">e.g. "120"</span>
                                            <div class="controls">
                                                <input type="number" class="form-control" id="extra_per_minute_fee" name="extra_per_minute_fee" >
                                            </div>
                                        </div>

                                        <div class="form-group float-right ">
                                            <button type="submit" class="btn btn-success">Create</button>
                                            <button type="button" class="btn">Cancel</button>
                                        </div>                                    
                                  </div>
                            </div>
                        </form>
                    </div>
                </section>
            </div>
        </div>


    </section>
</section>


@endsection