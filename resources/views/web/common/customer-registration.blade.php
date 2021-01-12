<!-- Modal: elegantRegistrationModalForm -->
<div class="modal fade" id="elegantRegistrationModalForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-registration" role="document">
    <!--Content-->
    <div class="modal-content form-elegant">
      <!--Header-->
      <div class="modal-header text-center">
        <h3 class="modal-title w-100 dark-grey-text font-weight-bold mtb-20" id="myModalLabel"><strong>Sign up</strong></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="row">
      	<div class="col-md-3">
      		<div class="image-holder">
      			<img style="border-radius: 10px; transform: translateX(-90px);" src="{{asset('web/images/resources/girl-with-laptop.jpg')}}" />
      		</div>
      	</div>
      	<div class="col-md-9">
      		<form action="{{route('customer.store')}}" method="post" enctype="multipart/form-data">
					{{csrf_field()}}
	      			<!--Body-->
			    <div class="modal-body mx-4">
			        <!--Body-->
			        <div class="row">
			        	<div class="col-md-6">
			        		<div class="md-form">
				        		<input type="text" id="form-name" name="fullname" class="form-control validate">	
				          		<label data-error="wrong" data-success="right" for="form-name">Your Name</label>	
				        	</div>	
			        	</div>
			        	<div class="col-md-6">
			        		<div class="md-form">
					            <input type="email" id="form-email" name="email" class="form-control validate">
				          		<label data-error="wrong" data-success="right" for="form-email">Your Email</label>
					      	</div>
			        	</div>
			        </div>
			        <div class="row">
			          <div class="col-md-6">
			          	<div class="md-form">
			          		<input type="password" id="form-password" name="password" class="form-control validate">
			            	<label data-error="wrong" data-success="right" for="form-password">Your password</label>
			          	</div>	
			          </div>	
			          <div class="col-md-6">
			          	<div class="md-form">
			          		<input type="text" id="form-mobile" name="mobile" class="form-control validate">
			          		<label data-error="wrong" data-success="right" for="form-mobile">Your Mobile No. (opt)</label>
			          	</div>
			          </div>		          
			        </div>
			        <div class="row mb-5">
			          <div class="col-md-6">
			          	<div class="md-form">
			          		<div class="chekbox-lg">
								<ul>
									<li>
										<label>
											<input type="radio" name="gender" value="Male">
											<b class="checkmark"> </b>
											<span>Male</span>
										</label>		
									</li>
									<li>
										<label>
											<input type="radio" name="gender" value="Female">
											<b class="checkmark"> </b>
											<span>Female</span>
										</label>		
									</li>
								</ul>
							</div>
			          	</div>	
			          </div>
			          <div class="col-md-6">
			          		<div class="md-form flatpickr">
			        			<input type="number" id="form-dob" name="dob" class="flatpickr-input form-control validate" data-input>
			          			<label data-error="wrong" data-success="right" for="form-dob">Select your DOB...</label>
			        		</div>
			          </div>		   
			        </div>
			        
			        <div class="text-center mb-3">
			          <button type="submit" class="btn btn-default-block btn-block btn-rounded z-depth-1a">Sign up</button>
			        </div>
			        <p class="font-small dark-grey-text text-right d-flex justify-content-center mb-3 pt-2"> or Sign up
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
			        	<a href="#elegantLoginModalForm" data-toggle="modal" data-target="#elegantLoginModalForm" class="black-text ml-1" data-dismiss="modal">Sign In</a>
			        </p>
			    </div>
	  		</form>
      	</div>
      </div>
      
    </div>
    <!--/.Content-->
  </div>
</div>
<!-- Modal: elegantRegistrationModalForm -->