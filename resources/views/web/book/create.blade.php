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
				<form action="{{route('books.store')}}" method="post">
					{{csrf_field()}}
					<div class="chekbox-lg" >
						<ul>
							<li>
								<label>
									<input type="radio" name="pronounRadios" onchange="handleChange1();" value="myself"/> 
									<b class="checkmark"> </b>
									<span>Myself</span>
								</label>		
							</li>
							<li>
								<label>
									<input type="radio" name="pronounRadios" onchange="handleChange2();" value="other" /> 
									<b class="checkmark"> </b>
									<span>Someone else</span>
								</label>		
							</li>
							<li>
								<label>
									<input type="radio" name="pronounRadios" onchange="handleChange3();" value="brand" /> 
									<b class="checkmark"> </b>
									<span>A brand or business</span>
								</label>		
							</li>
						</ul>
					</div>
					 <div class="myself-inputs" id="myself-inputs" style="display: none"> 
						<div class="input-sec">
							<input type="text" name="pronoun" placeholder="myself"  />
						</div>
					 </div> 
					<div class="other-inputs" id="other-inputs" style="display: none">
						@if(Auth::guard('customer')->check())
							@php($logged_name= Auth::guard('customer')->user()->name)
						@endif
						<div class="input-sec">
							<input type="text" name="from" placeholder="from" value="{{$logged_name}}" />
						</div>
						<div class="input-sec">
							<input type="text" name="fullname" placeholder="Full Name or Group Name"  />
						</div>
						<!-- <select class="input-sec" name="pronoun" id="pronoun-other">
							<option value="him">him</option>
							<option value="her">her</option>
							<option value="them">them</option>
						</select> -->
					</div>
					
					<input type="hidden" name="celebrity_package_id" value="{{$celebrity_package->id}}" />
					@if(Auth::guard('customer')->check())
						@php($logged_id= Auth::guard('customer')->user()->id)
						<input type="hidden" name="customer_id" value="{{$logged_id}}" />
					@endif


					<div class="input-sec">
						<div class="chekbox-lg" >
							<label>Select an occasion</label>	
							<ul>
								<li>
									<label>
										<input type="radio" name="subject" value="birthday"/> 
										<b class="checkmark"> </b>
										<span>Birthday</span>
									</label>		
								</li>
								<li>
									<label>
										<input type="radio" name="subject" value="wedding anniversary" /> 
										<b class="checkmark"> </b>
										<span>Wedding Anniversary</span>
									</label>		
								</li>
								<li>
									<label>
										<input type="radio" name="subject" value="new year" /> 
										<b class="checkmark"> </b>
										<span>New Year</span>
									</label>		
								</li>
							</ul>
						</div>
					</div>
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

@include('web.common.how-it-works')

@endsection


