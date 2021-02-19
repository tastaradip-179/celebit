@extends('web.common.master')

@section('content')
<section class="request">
	<div class="container">
		<div class="request-container">
			<div class="header">
				<img src="{{ $file_path_view.$celebrity->profileImage() }}" alt="dp" class="img-mini" />
				<h4>New Request for <strong>{{$celebrity->name}}</strong></h4>
			</div>
			<form action="{{route('books.store')}}" method="post">
				{{csrf_field()}}
				<div class="row ">
					<div class="col-md-6 booking-form">
						@if(Auth::guard('customer')->check())
							@php
								$logged_id = Auth::guard('customer')->user()->id;
								$logged_name = Auth::guard('customer')->user()->fullname;
								$logged_email = Auth::guard('customer')->user()->email;
							@endphp
						@endif
						<input type="hidden" name="customer_id" value="{{$logged_id}}" />
						<input type="hidden" name="status" value="0" />
						<input type="hidden" name="celebrity_package_id" value="{{$celebrity_package->id}}" />
						<div class="radio-inputs-inline form-group">
							<label class="label"><h4>Who is this for?</h4></label>
							  <label class="pronounRadios" for="pronounRadiosOther">
							    <input type="radio" class="option-input radio form-control" name="pronounRadios" value="other" checked="checked" />
							    Someone else
							  </label>	
							  <label class="pronounRadios" for="pronounRadiosMy">
							    <input type="radio" class="option-input radio form-control" name="pronounRadios" value="myself" />
							    Myself
							  </label>
						</div>
						<div class="myself-inputs pt-32" id="myself-inputs" style="display: none"> 
							<label class="label" for="myself">To</label>
							<input type="text" class="form-control" name="fullname" id="for-myself" value="{{$logged_name ? $logged_name:''}}" disabled=""/>
						</div> 
						<div class="other-inputs pt-32" id="other-inputs">
							<div class="form-group">
								<label class="label" for="from">From</label>
								<input type="text" class="form-control" name="from" value="{{$logged_name ? $logged_name:''}}" />
							</div>
							<div class="form-group">
								<label class="label" for="to">To</label>
								<input type="text" class="form-control" name="name" id="for-other" placeholder="Full Name or Group Name"/>
							</div>
							<div class="form-group">
								<label class="label" for="pronoun-other">Pronoun</label>
								<select class="pronoun-other form-control" name="pronoun" id="pronoun-other">
									<option value="him">him</option>
									<option value="her">her</option>
									<option value="them">them</option>
								</select> 
							</div>
						</div>
					</div>
					<div class="col-md-6 booking-form">	
						<div class="form-group">
							<label class="label"><h4>Select an occasion</h4></label>
							<div class="radio-inputs-inline form-group occasion">
								<input type="radio" name="subject" class="input-hidden form-control" id="birthday" value="Birthday" />
								<label for="birthday">
							  		<img src="{{asset('web/images/icon/cake2.png')}}"  alt="birthday" /> <h6>Birthday</h6>
								</label>
								<input type="radio" name="subject" class="input-hidden form-control" id="wedding" value="Wedding"/>
								<label for="wedding">
							  		<img src="{{asset('web/images/icon/wedding-rings.png')}}"  alt="wedding" /> <h6>Wedding</h6>
								</label> 
								<input type="radio" name="subject" class="input-hidden form-control" id="anniversary" value="Anniversary"/>
								<label for="anniversary">
							  		<img src="{{asset('web/images/icon/celebration.png')}}"  alt="anniversary" /> <h6>Anniversary</h6>
								</label>
								<input type="radio" name="subject" class="input-hidden form-control" id="newyear" value="Newyear"/>
								<label for="newyear">
							  		<img src="{{asset('web/images/icon/calendar3.png')}}"  alt="newyear" /> <h6>New Year</h6>
								</label> 
							</div>
						</div>
						<div class="form-group">
							<label class="label" for="message">Instructions</label>
							<textarea rows="7" name="message" style="width: 100%" placeholder="Message"></textarea>
						</div>
						<div class="form-group flatpickr">
							<label class="label" for="upload_time">When it will be uploaded</label>
							<input type="number" name="upload_time" class="flatpickr-input" placeholder="When it will be uploaded" data-input required="required">
						</div>
						<div class="form-group">
							<label class="label" for="email">My Email</label>
							<input type="email" class="form-control" name="email" value="{{$logged_email ? $logged_email:''}}" />
						</div>
						<div class="form-group">
						  <label class="label" for="public">
						    <input type="checkbox" class="option-input checkbox" />
						    Publish on Website
						  </label>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4"></div>
					<div class="col-md-4">
						<button class="btn btn-submit-form" type="submit">Submit</button>
					</div>
					<div class="col-md-4"></div>
				</div>
			</form>
		</div>
	</div>
</section>
@endsection

@section('page-js')
<script type="text/javascript">
	$(document).ready(function () {
	    $(function() {
		    $('input:radio[name="pronounRadios"]').change(function() {
		        if ($(this).val() == 'myself') {
		            document.getElementById("myself-inputs").style.display = "block"; 
		            document.getElementById("other-inputs").style.display = "none"; 
		            $('#for-myself').attr('disabled',false);
        			$("#for-myself").focus();
		        } else if ($(this).val() == 'other') {
		        	document.getElementById("myself-inputs").style.display = "none"; 
		            document.getElementById("other-inputs").style.display = "block";
		            $('#for-myself').attr('disabled',false);
        			$("#for-other").focus()
		        }
		    });
		});






	});
</script>
@endsection

