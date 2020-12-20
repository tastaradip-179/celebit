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
                    <header class="panel_header bg-primary">
                        <h2 class="title float-left text-white">All the Packages </h2>
                    </header>
                    <div class="content-body p-0">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Duration <br> (in min)</th>
                                    <th>Total ৳</th>
                                    <th>Extra Per Min Free</th>
                                    <th>Tag</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($celebrity->celebritypackages))
                                @foreach($celebrity->packageWithPaginate() as $package)
                                <tr>
                                    <td>{{$package->packageType->name}}</td>
                                    <td>{{$package->duration}}</td>
                                    <td>{{$package->total}}</td>
                                    <td>{{$package->extra_per_minute_fee}}</td>
                                    <td>{!! $package->AllTags() !!}</td>
                                    <td>
                                        <a title="Edit" href="{{ route($route.'edit', [$package->id]) }}">
                                            <i class='fa fa-pencil icon-xs icon-rounded icon-primary'></i>
                                        </a>
                                        <a onclick="alertFunction('Delete', {{$package->id}});" title="Delete"  href="javascript:void(0)"> 
                                            <i class='fa fa-trash-o icon-xs  icon-rounded icon-danger'></i>
                                        </a>
                                        <form id="Delete{{$package->id}}" action="{{ route($route.'destroy', [$package->id]) }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                            @method('DELETE')
                                        </form>
                                    
                                    </td>
                                </tr> 
                                @endforeach 
                                @endif 
                            </tbody>
                        </table>
                    </div>
                </section>
            </div>
            <div class="col-xl-5">
                <section class="box ">
                    <header class="panel_header bg-info">
                        <h2 class="title float-left text-white">Create {{$celebrity->name}}'s Package </h2>
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
                                                <input type="number" class="form-control" id="duration" name="duration" value="{{old('duration')}}">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="per_minute_fee">Offered Fee (in TK)</label>
                                            <span class="desc">e.g. "100"</span>
                                            <div class="controls">
                                                <input type="number" class="form-control" id="per_minute_fee" name="total" value="{{old('total')}}">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="extra_per_minute_fee">Extra Per Minute Fee (in TK)</label>
                                            <span class="desc">e.g. "120"</span>
                                            <div class="controls">
                                                <input type="number" class="form-control" id="extra_per_minute_fee" name="extra_per_minute_fee" value="{{old('extra_per_minute_fee')}}">
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
                }

            }
        });
    });
</script>
@endsection