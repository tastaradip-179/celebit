@extends('web.common.master')

@section('page-css')
<style>
/* Mark input boxes that gets an error on validation: */
#booking-form input.invalid {
  background-color: #ffdddd;
}

/* Hide all steps by default: */
#booking-form  .tab {
  display: none;
}

/* Make circles that indicate the steps of the form: */
#booking-form .step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

/* Mark the active step: */
#booking-form .step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
#booking-form .step.finish {
  background-color: #272626;
}

#booking-form button#nextBtn {
  background-color: #272626;
  color: #ffffff;
  border: none;
  padding: 10px 20px;
  font-size: 17px;
  font-family: Raleway;
  cursor: pointer;
}

#booking-form button:hover {
  opacity: 0.8;
}

#booking-form button#prevBtn {
  background-color: #bbbbbb;
  color: #ffffff;
  border: none;
  padding: 10px 20px;
  font-size: 17px;
  font-family: Raleway;
  cursor: pointer;
}
#booking-form img{
	margin: 10px 0;
}
.table-borderless tbody + tbody, .table-borderless td, .table-borderless th, .table-borderless thead th {
    border: 0;
    text-align: center;
}
</style>
@endsection

@section('content')


<section class="request">
	<div class="container">
		@if(Session::has('message'))
		    <div class="alert alert-{{ Session::get('message-type') }} alert-dismissable">
		        <button aria-hidden="true" data-dismiss="alert" class="close" type="button" style="line-height: 0.5">×</button>
		        <i class="glyphicon glyphicon-{{ Session::get('message-type') == 'success' ? 'ok' : 'remove'}}"></i> {{ Session::get('message') }}
		    </div>
		@endif
		<div class="request-container">
			<div class="header">
				<img src="{{ $file_path_view.$celebrity->profileImage() }}" alt="dp" class="img-mini" />
				<h4>New Request for <strong>{{$celebrity->name}}</strong></h4>
				<hr/>
			</div>
			<form action="{{route('books.store')}}" method="post" id="booking-form">
				{{csrf_field()}}
				<div class="tab">
					<div class="row">
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
									<input type="radio" name="subject" class="input-hidden form-control" id="birthday" value="Birthday"/>
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
						</div>
					</div>
				</div>
				<div class="tab">
					<div class="row">
						<div class="col-md-12 booking-form">	
							<label class="label"><h4>Delivery Information</h4></label>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 booking-form">
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
							    <input type="checkbox" class="option-input checkbox" name="publish" value="1"/>
							    Publish on Website
							  </label>
							</div>
						</div>
					</div>
				</div>
				<div class="tab">
					<div class="row">
						<div class="col-md-12 booking-form">	
							<label class="label"><h4>Your Booking Details</h4></label>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 booking-form">
							<table class="table table-borderless">
								<tbody>
									<tr>
										<td>{{$celebrity_package->packageType->name}}</td>
										<td>{{$celebrity_package->total}} BDT</td>
									</tr>
									<tr>
										<td>Total</td>
										<td>{{$celebrity_package->total}} BDT</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 booking-form">	
							<label class="label"><h4>Payment Options</h4></label>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<img src="{{asset('web/images/resources/visa-master-card-bkash-nexus-logo.png')}}"/>
						</div>
					</div>
				</div>
				<div style="overflow:auto;">
				  <div style="float:right;">
				    <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
				    <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
				  </div>
				</div>
				<div class="row">
					<div class="col-md-4"></div>
					<div class="col-md-4">
						<button class="btn btn-submit-form" id="btn-submit-form" type="submit" style="display: none">Book for {{$celebrity_package->total}} BDT</button>
					</div>
					<div class="col-md-4"></div>
				</div>
				<!-- Circles which indicates the steps of the form: -->
				<div style="text-align:center;margin-top:40px;">
				  <span class="step"></span>
				  <span class="step"></span>
				  <span class="step"></span>
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
<script type="text/javascript">
	var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form ...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  // ... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
    document.getElementById("btn-submit-form").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
    document.getElementById("nextBtn").style.display = "inline";
    document.getElementById("btn-submit-form").style.display = "none";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").style.display = "none";
    document.getElementById("btn-submit-form").style.display = "block";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
    document.getElementById("btn-submit-form").style.display = "none";
  }
  // ... and run a function that displays the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form... :
  if (currentTab >= x.length) {
    //...the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false:
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class to the current step:
  x[n].className += " active";
}
</script>
@endsection

