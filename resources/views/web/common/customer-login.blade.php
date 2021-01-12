<!-- Modal: elegantLoginModalForm -->
<div class="modal fade" id="elegantLoginModalForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <!--Content-->
    <div class="modal-content form-elegant">
      <!--Header-->
      <div class="modal-header text-center">
        <h3 class="modal-title w-100 dark-grey-text font-weight-bold mtb-20" id="myModalLabel"><strong>Sign in</strong></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('customer.login.submit')}}" method="post">
					{{csrf_field()}}
	      <!--Body-->
	      <div class="modal-body mx-4">
	        <!--Body-->
	        <div class="md-form mb-5">
	          <input type="email" id="Form-email1" name="email" class="form-control validate">
	          <label data-error="wrong" data-success="right" for="Form-email1">Your email</label>
	        </div>

	        <div class="md-form pb-3">
	          <input type="password" id="Form-pass1" name="password" class="form-control validate">
	          <label data-error="wrong" data-success="right" for="Form-pass1">Your password</label>
	          <p class="font-small d-flex justify-content-end black-text">Forgot <a href="#" class="black-text ml-1">
	              Password?</a></p>
	        </div>

	        <div class="text-center mb-3">
	          <button type="submit" class="btn btn-default-block btn-block btn-rounded z-depth-1a">Sign in</button>
	        </div>
	        <p class="font-small dark-grey-text text-right d-flex justify-content-center mb-3 pt-2"> or Sign in
	          with:</p>

	        <div class="row my-3 d-flex justify-content-center">
	          <!--Facebook-->
	          <button type="button" class="btn btn-white btn-rounded z-depth-1a"><i class="icon-facebook-official"></i></button>
	          <!--Twitter-->
	          <button type="button" class="btn btn-white btn-rounded z-depth-1a"><i class="icon-twitter"></i></button>
	          <!--Google +-->
	          <button type="button" class="btn btn-white btn-rounded z-depth-1a"><i class="icon-instagram"></i></button>
	        </div>
	      </div>
	      <!--Footer-->
	      <div class="modal-footer mx-5 pt-3 mb-1">
	        <p class="font-small grey-text d-flex justify-content-end">Not a member? 
	        	<a href="#elegantRegistrationModalForm" data-toggle="modal" data-target="#elegantRegistrationModalForm" class="black-text ml-1" data-dismiss="modal">Sign Up</a>
	        </p>
	      </div>
	  </form>
    </div>
    <!--/.Content-->
  </div>
</div>
<!-- Modal: elegantLoginModalForm -->