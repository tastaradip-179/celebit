@extends('backend.common.master')

@section('page-css')
<link rel="stylesheet" type="text/css" href="{{asset('backend/assets/css/dropify.min.css')}}">
<link href="{{asset('backend/assets/plugins/select2/select2.css')}}" rel="stylesheet" type="text/css" media="screen"/>
@endsection

@section('content')

<section id="main-content" class=" ">
    <section class="wrapper main-wrapper" style=''>

        <div class='col-xl-12 col-lg-12 col-md-12 col-12'>
            <div class="page-title">

                <div class="float-left">
                    <h1 class="title">{{$title}}</h1>
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
                                          <label class="form-label" for="name">Name *</label>
                                          <span class="desc">e.g. "Sakib Al Hasan"</span>
                                          <div class="controls">
                                                <input type="text" class="form-control" id="name" name="name" >
                                          </div>
                                    </div>

                                    <div class="form-group">
                                          <label class="form-label" for="email">Email *</label>
                                          <span class="desc">e.g. "some@example.com"</span>
                                          <div class="controls">
                                                <input type="text" class="form-control" id="email" name="email" >
                                          </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="mobile">Mobile Number</label>
                                        <span class="desc">e.g. "017123456789"</span>
                                        <div class="controls">
                                            <input type="text" class="form-control" id="mobile" name="mobile" >
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="form-label" for="password">Password *</label>
                                        <span class="desc">e.g. "TempPassword"</span>
                                        <div class="controls">
                                            <input type="password" class="form-control" id="password" name="password" >
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="password_confirmed">Confirm Password *</label>
                                        <span class="desc">e.g. "TempPassword"</span>
                                        <div class="controls">
                                            <input type="password" class="form-control" id="password_confirmed" name="password_confirmation" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="file">Avatar</label>
                                        <span class="desc">e.g. "character.jpg"</span>
                                        <div class="controls">
                                            <input type="file" class="dropify" name="file" data-max-file-size="3M" data-height="120" data-allowed-file-extensions="jpg png jpeg"/>
                                        </div>
                                    </div>

                              </div>
                              <div class="col-lg-6 col-md-6 col-6">
                                    <div class="form-group">
                                          <label class="form-label" for="gender">Gender *</label>
                                          <span class="desc">e.g. "Male"</span>
                                          <div class="controls">
                                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                      <label class="btn btn-secondary">
                                                            <input type="radio" name="gender" id="gender1" value="male" autocomplete="off" checked=""> Male
                                                      </label>
                                                      <label class="btn btn-secondary active">
                                                            <input type="radio" name="gender" id="gender2" value="female" autocomplete="off"> Female
                                                      </label>
                                                      <label class="btn btn-secondary">
                                                            <input type="radio" name="gender" id="gender3" value="others" autocomplete="off"> Others
                                                      </label>
                                                </div>
                                          </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="designation">Designation</label>
                                        <span class="desc">e.g. singer, actor</span>
                                        <div class="controls">
                                            <input type="text" class="form-control" id="designation" name="designation">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="social_link">Facebook</label>
                                        <span class="desc">e.g. "https://www.facebook.com/abcd"</span>
                                        <div class="controls">
                                            <input type="text" class="form-control" id="social_link" name="social_link['facebook']">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="social_link_twitter">Twitter</label>
                                        <span class="desc">e.g. "https://www.twitter.com/abcd"</span>
                                        <div class="controls">
                                            <input type="text" class="form-control" id="social_link_twitter" name="social_link['twitter']">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="social_link_insta">Instagram</label>
                                        <span class="desc">e.g. "https://www.instagram.com/abcd"</span>
                                        <div class="controls">
                                            <input type="text" class="form-control" id="social_link_insta" name="social_link['instagram']">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Select Tags</label>
                                          <div class="controls">
                                                <select class="select2"  multiple>
                                                      <option></option>
                                                      <option>Alabama</option>
                                                      <option>Alaska</option>
                                                      <option>Arizona</option>
                                                      <option>Arkansas</option>
                                                      <option selected>California</option>
                                                </select>
                                          </div>
                                    </div>
                              </div>
                        </div>

                        <input type="hidden" name="create_type" value="celebrity_info">
                  	    <div class="col-lg-12 col-md-12 col-12">
                  	        <div class="float-right ">
                                <button type="submit" class="btn btn-success">Create</button>
                                <button type="button" class="btn">Cancel</button>
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
<script src="{{asset('backend/assets/plugins/select2/select2.min.js')}}" type="text/javascript"></script>
<!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 
<script type="text/javascript">
      $('#form').validate({
          rules: {
              name: {
                  required: true
              },
              email: {
                  required: true,
                  email: true
              },
              mobile: {
                  number: true,
                  required: true,
              },
              file: {
                  required: true,
              },
              password: {
                  required: true,
              },
              password_confirmed: {
                  required: true,
                  equalTo: "#password"
              },

          }
      });
</script>
<script type="text/javascript">
      $(document).ready(function() {
          $('.dropify').dropify();
          $('.select2').select2();
      });
      
</script>
@endsection