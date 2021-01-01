@extends('web.common.master')

@section('content')

<section class="celebrity-profile">
	<div class="container">
		<div class="celebrity-profile-container">
			<div class="row">
				<div class="col-md-5">
					<div class="img">
						<img src="{{ asset( '/storage/celebrities/'.$image->url ) }}" alt="dp" class="img-fluid" />
					</div>
				</div>
				<div class="col-md-7">
					<div class="about">
						<h3>{{$celebrity->name}}</h3>
						<h5>{{$celebrity->designation}}</h5>
						<p>{{$celebrity->about}}</p>
						{!! $celebrity->AllTags() !!}
					</div>
					<div class="services">
						<h6>Request for</h6>
						<div class="row">
							@foreach($celebrity_packages as $key=>$celebrity_package)
							@if(!empty($celebrity_packages))
							<div class="col-12 col-lg-4 col-md-6 col-sm-12 service-btn">
				                <a href="#">
				                	<span class="service-name">{{$celebrity_packages[$key]->packageType->name}}</span>
				                	<span class="service-price">৳{{$celebrity_packages[$key]->total}}</span>
				                	<span class="service-time">{{$celebrity_packages[$key]->duration}}min</span>
				                </a>
				            </div>
				            @endif
				            @endforeach
			            </div>    
					</div>					
				</div>
			</div>
			<div class="clearfix"></div>
		</div>		
	</div>
</section>

@include('web.common.how-it-works')

@endsection