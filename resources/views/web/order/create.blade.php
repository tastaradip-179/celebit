@extends('web.common.master')

@section('content')
	<section class="banner-section p120">
		<div class="container">
			<div class="banner-text">
				<h2>Order</h2>
				<p>Please Order and Pay</p>
			</div><!--banner-text end-->
		</div>
	</section><!--banner-section end-->


	<section class="form_popup">
		
		<div class="order_form" id="order_form">
		 	<div class="hd-lg">
		 		<img src="images/logo.png" alt="">
		 		<span>Order</span>
		 	</div><!--hd-lg end-->
			<div class="user-account-pr">
				<form action="{{route('orders.store')}}" method="post">
					{{csrf_field()}}
					<div class="chekbox-lg" id="checkbox-lg">
						<ul>
							<li>
								<label>
									<input type="radio" name="gender" value="myself">
									<b class="checkmark"> </b>
									<span>Myself</span>
								</label>		
							</li>
							<li>
								<label>
									<input type="radio" name="gender" value="other">
									<b class="checkmark"> </b>
									<span>Someone else</span>
								</label>		
							</li>
						</ul>
					</div>
					<input type="hidden" name="celebrity_package_id" value="{{$celebrity_package->id}}" />
					@if(Auth::guard('customer')->check())
						@php($logged_id= Auth::guard('customer')->user()->id)
						<input type="hidden" name="customer_id" value="{{$logged_id}}" />
					@endif
					<div class="input-sec">
						<input type="text" name="subject" placeholder="Subject" required="required">
					<div class="input-sec">
						<textarea id="upload_time" rows="4" name="message" style="width: 100%" placeholder="Message"></textarea>
					</div>
					
					<div class="input-sec flatpickr">
						<input type="number" name="upload_time" class="flatpickr-input" placeholder="When it will be uploaded" data-input required="required">
					</div>
					<div class="input-sec mb-0">
						<button type="submit">Submit</button>
					</div><!--input-sec end-->
				</form>
				<div class="form-text">
					<p>By sIgning up you agree to Oren’s <a href="#" title="">Terms of Service</a> and <a href="#" title="">Privacy Policy</a> </p>
				</div>
			</div><!--user-account end--->
		</div><!--login end--->

	</section><!--form_popup end-->


@endsection


