@extends('web.common.master')

@section('content')

	<section class="banner-section p120">
		<div class="container">
			<div class="banner-text">
				<h2>Edit</h2>
				<p>Edit Your Profile</p>
			</div><!--banner-text end-->
		</div>
	</section><!--banner-section end-->

	<section class="form_popup">
		
		<div class="signup_form" id="signup_form">
		 	<div class="hd-lg">
		 		<img src="images/logo.png" alt="">
		 		<span>Edit Your Profile</span>
		 	</div><!--hd-lg end-->
			<div class="user-account-pr">
				<form action="" method="post">
					{{csrf_field()}}
					<div class="input-sec mgb25">
						<input type="text" name="fullname" placeholder="Full Name" required="required">
						<label>Letters A-Z or a-z , Numbers 0-9 and Underscores _</label>
					</div>
					<div class="input-sec">
						<input type="text" name="username" placeholder="Username">
					</div>
					<div class="input-sec">
						<input type="email" name="email" placeholder="Email address" required="required">
					</div>
					<div class="input-sec">
						<input type="Password" name="password" placeholder="Password" required="required">
					</div>
					<div class="input-sec">
						<input type="password" name="confirm-password" placeholder="Re-enter password" required="required">
					</div>
					<div class="input-sec flatpickr">
						<input type="number" name="dob" class="flatpickr-input" placeholder="Select your DOB..." data-input required="required">
					</div>
					<div class="input-sec">
						<input type="text" name="mobile" placeholder="Mobile No.">
					</div>
					<div class="input-sec">
						<input type="text" name="designation" placeholder="Designation" required="required">
					</div>
					<div class="input-sec">
						<input type="text" name="address" placeholder="Address">
					</div>
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
					<div class="input-sec mb-0">
						<button type="submit">Save</button>
					</div><!--input-sec end-->
				</form>
				<div class="form-text">
					<p>By sIgning up you agree to Oren???s <a href="#" title="">Terms of Service</a> and <a href="#" title="">Privacy Policy</a> </p>
				</div>
			</div><!--user-account end--->
			<div class="fr-ps">
				<h1>Already have an account?<a href="login.html" title="" class="show_signup">&nbsp;Login here.</a></h1>
			</div><!--fr-ps end-->
		</div><!--login end--->

	</section><!--form_popup end-->


@endsection