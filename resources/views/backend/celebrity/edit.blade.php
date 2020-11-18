@extends('backend.common.master')

@section('page-css')
<link rel="stylesheet" type="text/css" href="{{asset('backend/assets/css/dropify.min.css')}}">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

@endsection

@section('content')


<section id="main-content" class=" ">
    <section class="wrapper main-wrapper" style=''>

        <div class='col-xl-12 col-lg-12 col-md-12 col-12'>
            <div class="page-title">

                <div class="float-left">
                    <h1 class="title">Edit {{$celebrity->name}}</h1>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row margin-0 mb-5">
            <div class="col-lg-12 col-md-12 col-12">
            	<form id="form" method="post" action="{{ route($route.'update',[$celebrity->username]) }}" style="width: 100%;" enctype="multipart/form-data"> 
                      {{ method_field('PUT') }}
                      {{csrf_field()}}
                         <div class="row margin-0">
                              <div class="col-lg-6 col-md-6 col-6">

                                    <div class="form-group">
                                          <label class="form-label" for="name">Name *</label>
                                          <span class="desc">e.g. "Sakib Al Hasan"</span>
                                          <div class="controls">
                                                <input type="text" class="form-control" id="name" name="name" value="{{ $celebrity->name ? $celebrity->name:'' }}" required="required">
                                          </div>
                                    </div>

                                    <div class="form-group">
                                          <label class="form-label" for="email">Email</label>
                                          <span class="desc">e.g. "some@example.com"</span>
                                          <div class="controls">
                                                <input type="text" class="form-control" id="email" name="email" value="{{ $celebrity->email ? $celebrity->email:'' }}" >
                                          </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="mobile">Mobile Number</label>
                                        <span class="desc">e.g. "017123456789"</span>
                                        <div class="controls">
                                            <input type="text" class="form-control" id="mobile" name="mobile" value="{{ $celebrity->mobile ? $celebrity->mobile:'' }}" required="required">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="form-label" for="password">Password </label>
                                        <span class="desc">e.g. "TempPassword"</span>
                                        <div class="controls">
                                            <input type="password" class="form-control" id="password" name="password" value="{{ $celebrity->password ? $celebrity->password:'' }}"  >
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="password_confirmed">Confirm Password </label>
                                        <span class="desc">e.g. "TempPassword"</span>
                                        <div class="controls">
                                            <input type="password" class="form-control" id="password_confirmed" name="password_confirmation" value="{{ $celebrity->password ? $celebrity->password:'' }}" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="designation">Designation *</label>
                                        <span class="desc">e.g. singer, actor</span>
                                        <div class="controls">
                                            <input type="text" class="form-control" id="designation" name="designation" value="{{ $celebrity->designation ? $celebrity->designation:'' }}" required="required">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="file">Avatar *</label>
                                        <span class="desc">e.g. "character.jpg"</span>
                                        <div class="controls">  
                                            <input type="file" class="dropify" name="file" data-max-file-size="3M" data-height="120" data-allowed-file-extensions="jpg png jpeg" data-default-file="{{ asset( '/storage/celebrities/'.$celebrity->images[0]->url) }}"/>
                                        </div>
                                    </div>

                              </div>
                              <div class="col-lg-6 col-md-6 col-6">
                                    <div class="form-group">
                                          <label class="form-label" for="gender">Gender *</label>
                                          <span class="desc">e.g. "Male"</span>
                                          <div class="controls">
                                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                  @php
                                                    $gender = $celebrity->gender ? $celebrity->gender:'';
                                                  @endphp
                                                      <label class="btn btn-secondary">
                                                            <input type="radio" name="gender" id="gender1" value="male" autocomplete="off" @if($gender == 'male') checked="" @endif> Male
                                                      </label>
                                                      <label class="btn btn-secondary active">
                                                            <input type="radio" name="gender" id="gender2" value="female" autocomplete="off" @if($gender == 'female') checked="" @endif> Female
                                                      </label>
                                                      <label class="btn btn-secondary">
                                                            <input type="radio" name="gender" id="gender3" value="others" autocomplete="off" @if($gender == 'others') checked="" @endif> Others
                                                      </label>
                                                </div>
                                          </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="about">About</label>
                                        <div class="controls">
                                          <textarea name="about" class="form-control" rows="4" style="margin-bottom: 30px">{{$celebrity->about ? $celebrity->about:''}}</textarea>
                                        </div>
                                    </div>
                                    
                                    @php
                                      $social_links = $celebrity->social_link;
                                    @endphp
                                    @foreach($social_links as $key=>$social_link)
                                      @if($key== '\'facebook\'')
                                      <div class="form-group">
                                          <label class="form-label" for="social_link">Facebook</label> 
                                          <span class="desc">e.g. "https://www.facebook.com/abcd"</span>
                                          <div class="controls">
                                              <input type="text" class="form-control" id="social_link" name="social_link['facebook']" value="{{$social_link ? $social_link:''}}">
                                          </div>
                                      </div>
                                      @elseif($key=='\'twitter\'')
                                      <div class="form-group">
                                          <label class="form-label" for="social_link_twitter">Twitter</label>
                                          <span class="desc">e.g. "https://www.twitter.com/abcd"</span>
                                          <div class="controls">
                                              <input type="text" class="form-control" id="social_link_twitter" name="social_link['twitter']" value="{{$social_link ? $social_link:''}}">
                                          </div>
                                      </div>
                                      @elseif($key=='\'instagram\'')
                                      <div class="form-group">
                                          <label class="form-label" for="social_link_insta">Instagram</label>
                                          <span class="desc">e.g. "https://www.instagram.com/abcd"</span>
                                          <div class="controls">
                                              <input type="text" class="form-control" id="social_link_insta" name="social_link['instagram']" value="{{$social_link ? $social_link:''}}">
                                          </div>
                                      </div>
                                      @endif
                                    @endforeach
                                    <div class="form-group">
                                        <label class="form-label">Select Tags</label>
                                          <div class="controls">
                                            @if( !empty($tags) ) 
                                                <select class="form-control select2" name="tags[]" multiple="multiple">
                                                      <option value=""></option>
                                                      @foreach($tags as $key=>$tag) 
                                                        <option value="{{$tag->name}}"
                                                           @foreach($celebrity->tags as $key2=>$tg )
                                                               @if(!empty($celebrity->tags[$key2]->id) && ($celebrity->tags[$key2]->id) == $tag->id) selected=="selected" @endif
                                                           @endforeach  
                                                              
                                                            >
                                                            {{$tag->name}} 
                                                        </option>
                                                       @endforeach                                                       
                                                  </select>
                                            @endif 
                                          </div>
                                    </div>
                              </div>
                        </div>

                        <input type="hidden" name="create_type" value="celebrity_info"> 
                  	    <div class="col-lg-12 col-md-12 col-12">
                  	        <div class="float-right ">
                                <button type="submit" class="btn btn-success">Update</button>
                                <a type="button" href="{{url('/admin/celebrities')}}" class="btn">Cancel</a>
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
<script src="{{asset('backend/assets/js/dropify.min.js')}}" type="text/javascript"></script> 
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 
<script type="text/javascript">
      $('#form').validate({
          rules: {
              name: {
                  required: true
              },
              designation: {
                  required: true
              },
              mobile: {
                  number: true,
              },
              gender: {
                  required: true
              },
          }
      });
</script>
<script type="text/javascript">
      $(document).ready(function() {
          $('.dropify').dropify();

          $('.select2').select2({
            placeholder: "Select tags or type and enter",
            tags: true,
            tokenSeparators: [',', ' ']
          });
      });
</script>
@endsection