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
                    <h1 class="title">Add {{$title}}</h1>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row margin-0 mb-5">
            <div class="col-lg-12 col-md-12 col-12">

            	<form id="form" method="post" action="{{route($route.'store')}}" style="width: 100%;" enctype="multipart/form-data">
                      {{csrf_field()}}
                        <div class="row margin-0">
                              <div class="col-lg-6 col-md-6 col-6">


                                    <div class="form-group">
                                        <label class="form-label">Celebrity</label>
                                          <div class="controls">
                                                <select class="form-control select2" name="celebrity_id">
                                                      <option value="">Select</option>
                                                      @foreach($celebrities as $celebrity)
                                                        <option value="{{$celebrity->id}}">{{$celebrity->name}}</option>
                                                      @endforeach
                                                </select>
                                          </div>
                                    </div>


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
                                        <label class="form-label" for="per_minute_fee">Fee (in TK)</label>
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

                                    <div class="form-group float-right ">
		                                <button type="submit" class="btn btn-success">Create</button>
		                                <button type="button" class="btn">Cancel</button>
		                  	        </div>
                                    
                              </div>
                        </div>

            	</form>
            </div>
        </div>

    </section>
</section>


@endsection


@section('page-js')

<!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START --> 
<script src="{{asset('backend/assets/plugins/jquery-validation/js/jquery.validate.min.js')}}" type="text/javascript"></script> 
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

@endsection
