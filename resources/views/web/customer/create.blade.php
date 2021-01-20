@extends('web.common.master')

@section('content')

	<section class="banner-section p120">
		<div class="container">
			<div class="banner-text">
				<h2>Register</h2>
				<p>Please Register to have access to all videos and many more.</p>
			</div><!--banner-text end-->
		</div>
	</section><!--banner-section end-->

	<section class="form_popup">
		
		<div class="signup_form" id="signup_form">
		 	<div class="hd-lg">
		 		<img src="images/logo.png" alt="">
		 		<span>Register your Oren account</span>
		 	</div><!--hd-lg end-->
			<div class="user-account-pr" id="signup">
				<form action="" method="post" enctype="multipart/form-data">
					{{csrf_field()}}
					<div class="row">
						<div class="input-sec col-md-6">
							<input type="text" name="fullname" placeholder="Full Name" required="required">						
						</div>
						<div class="input-sec col-md-6">
							<input type="text" name="username" placeholder="Username">
						</div>
					</div>
					<div class="row">
						<div class="input-sec col-md-12">
							<input type="email" name="email" placeholder="Email address" required="required">
						</div>
					</div>
					<div class="row">
						<div class="input-sec col-md-6">
							<input type="password" name="password" placeholder="Password" required="required">
						</div>
						<div class="input-sec col-md-6">
							<input type="password" name="confirm-password" placeholder="Re-enter password" required="required">
						</div>
					</div>					
					<div class="row">
						<div class="input-sec col-md-6">
							<input type="text" name="mobile" placeholder="Mobile No.">
						</div>
						<div class="input-sec col-md-6">
							<input type="text" name="designation" placeholder="Designation" required="required">
						</div>
					</div>
					<div class="row">
						<div class="input-sec flatpickr col-md-12">
							<input type="number" name="dob" class="flatpickr-input" placeholder="Select your DOB..." data-input required="required">
						</div>
					</div>
					<div class="row">
						<div class="input-sec col-md-12">
							<input type="text" name="address" placeholder="Address">
						</div>
					</div>
					<div class="row">
						<div class="chekbox-lg col-md-12">
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
					<div class="row">
						<div class="input-sec col-md-12">
							<input type="file" name="image" id="image">
						</div>
					</div>
					<div class="row">
						<div class="input-sec mb-0 col-md-12">
							<button type="submit">Signup</button>
						</div><!--input-sec end-->
					</div>
				</form>
				<div class="form-text">
					<p>By sIgning up you agree to Oren’s <a href="#" title="">Terms of Service</a> and <a href="#" title="">Privacy Policy</a> </p>
				</div>
			</div><!--user-account end--->
			<div class="fr-ps">
				<h1>Already have an account?<a href="{{route('customer.login')}}" title="" class="show_signup">&nbsp;Login here.</a></h1>
			</div><!--fr-ps end-->
		</div><!--login end--->

	</section><!--form_popup end-->


@endsection