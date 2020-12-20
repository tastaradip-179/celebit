@extends('backend.common.master')
@section('page-css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')

<section id="main-content" class=" ">
    <section class="wrapper main-wrapper" style=''>

        <div class='col-xl-12 col-lg-12 col-md-12 col-12'>
            <div class="page-title">

                <div class="float-left">
                    <h1 class="title">{{$title}} List</h1>
                </div>
                <a href="{{route('admin.celebrities.show',$celebrity->username)}}" class="btn btn-info float-right">Go to profile</a>
                {!! backurl() !!}
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
                                            <label class="form-label" for="package_id">Package Type</label> <a href="{{route('admin.packages.index')}}" class="float-right">Create package </a>
                                              <div class="controls">
                                                    <select class="form-control" name="package_id">
                                                          <option value="">Select</option>
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
                                            <label class="form-label" for="per_minute_fee">Offered Fee (in TK)</label>
                                            <span class="desc">e.g. "100"</span>
                                            <div class="controls">
                                                <input type="number" class="form-control" id="per_minute_fee" name="total" >
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="extra_per_minute_fee">Extra Per Minute Fee (in TK)</label>
                                            <span class="desc">e.g. "120"</span>
                                            <div class="controls">
                                                <input type="number" class="form-control" id="extra_per_minute_fee" name="extra_per_minute_fee" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="tags">Select Tags</label>
                                              <div class="controls">
                                                    <select class="form-control select2" name="tags[]" multiple="multiple">
                                                          <option value=""></option>
                                                          @foreach($tags as $tag)
                                                            <option>{{$tag->name}}</option>
                                                          @endforeach
                                                    </select>
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

@section('page-js')

<!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START --> 
<script src="{{asset('backend/assets/plugins/jquery-validation/js/jquery.validate.min.js')}}" type="text/javascript"></script> 
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.select2').select2({
            placeholder: "Select tags or type and enter",
            tags: true,
            tokenSeparators: [',', ' ']
        });

        $('#form').validate({
            rules: {
                package_id: {
                    number: true,
                    required: true
                },
                duration: {
                    number: true,
                    required: true
                },
                total: {
                    number: true,
                    required: true
                },
                extra_per_minute_fee: {
                    required: true,
                    number: true
                },
                tags: {
                    required: true,
                }

            }
        });
    });
</script>
@endsection