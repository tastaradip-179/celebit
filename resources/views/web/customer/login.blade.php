@extends('web.common.master')

@section('content')

	<section class="banner-section p120">
		<div class="container">
			<div class="banner-text">
				<h2>Sign In</h2>
				<p>Please Sign In to have access to all videos and many more.</p>
			</div><!--banner-text end-->
		</div>
	</section><!--banner-section end-->

	<section class="form_popup">
		
		<div class="signup_form" id="signup_form">
		 	<div class="hd-lg">
		 		<img src="images/logo.png" alt="">
		 		<span>Signin your Oren account</span>
		 	</div><!--hd-lg end-->
			<div class="user-account-pr">
				<form action="{{route('customer.login.submit')}}" method="post">
					{{csrf_field()}}
					<div class="input-sec">
						<input type="email" name="email" placeholder="Email address" required="required">
					</div>
					<div class="input-sec">
						<input type="password" name="password" placeholder="Password" required="required">
					</div>
					<div class="input-sec mb-0">
						<button type="submit">Sign In</button>
					</div><!--input-sec end-->
				</form>
				<div class="form-text">
					<p>By sIgning up you agree to Oren’s <a href="#" title="">Terms of Service</a> and <a href="#" title="">Privacy Policy</a> </p>
				</div>
			</div><!--user-account end--->
			<div class="fr-ps">
				<h1>Don't have an account?<a href="login.html" title="" class="show_signup">&nbsp;Register here.</a></h1>
			</div><!--fr-ps end-->
		</div><!--login end--->

	</section><!--form_popup end-->


@endsection