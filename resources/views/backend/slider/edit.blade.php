@extends('backend.common.master')

@section('page-css')
<link rel="stylesheet" type="text/css" href="{{asset('backend/assets/css/dropify.min.css')}}">
@endsection

@section('content')

<section id="main-content" class=" ">
    <section class="wrapper main-wrapper" style=''>

        <div class='col-xl-12 col-lg-12 col-md-12 col-12'>
            <div class="page-title">

                <div class="float-left">
                    <h1 class="title">Edit {{$slider->title}}</h1>
                </div>
                {!! backurl() !!}
            </div>
            
        </div>
        <div class="clearfix"></div>

        <div class="row margin-0 mb-5">
            <div class="col-lg-12 col-md-12 col-12">

            	<form id="form" method="post" action="{{route($route.'update', [$slider->id])}}" style="width: 100%;" enctype="multipart/form-data">
                      {{ method_field('PUT') }}
                      {{csrf_field()}}
                        <div class="row margin-0">
                              <div class="col-lg-6 col-md-6 col-6">
                                     <div class="form-group">
                                          <label class="form-label" for="title">Title *</label>
                                          <span class="desc">e.g. "Sakib Al Hasan"</span>
                                          <div class="controls">
                                                <input type="text" class="form-control" id="title" name="title" value="{{$slider->title ? $slider->title:''}}" required="required">
                                          </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="type">Select Type</label>
                                          <div class="controls">
                                                <select class="form-control" name="type" id="type">
                                                      <option value="celebrity" @if($slider->type=="celebrity") selected="selected" @endif>Celebrity</option>
                                                      <option value="news" @if($slider->type=="news") selected="selected" @endif>News</option>
                                                </select>
                                          </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="caption">Caption</label>
                                        <div class="controls">
                                          <textarea class="form-control" rows="4" name="caption">{{$slider->caption ? $slider->caption:''}}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                      <label class="form-label">Status</label>
                                      <div class="controls">
                                        <select class="form-control" name="status">
                                          <option value="1" @if($slider->status == 1) selected="selected" @endif>Active</option>
                                          <option value="0" @if($slider->status == 0) selected="selected" @endif>Inactive</option>
                                        </select>
                                      </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="file">Image *</label>
                                        <span class="desc">e.g. "slider.jpg"</span>
                                        <div class="controls">
                                            <input type="file" class="dropify" name="file" data-max-file-size="3M" data-height="120" data-allowed-file-extensions="jpg png jpeg" data-default-file="{{ asset( '/storage/sliders/'.$slider->images[0]->url) }}" required="required" />
                                        </div>
                                    </div>

                              </div>
                        </div>

                  	    <div class="col-lg-12 col-md-12 col-12">
                                <button type="submit" class="btn btn-success">Create</button>
                                <button type="button" class="btn">Cancel</button>
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
<script src="{{asset('backend/assets/js/dropify.min.js')}}" type="text/javascript"></script> 

<script type="text/javascript">
      $(document).ready(function() {
          $('.dropify').dropify();
      });   
</script>
@endsection