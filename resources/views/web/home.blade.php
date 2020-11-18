@extends('web.common.master')

@section('content')
	<section class="banner-section">
		<div class="container">
			<div class="banner-text">
				<h2>we make your special day unforgettable</h2>
				<a href="{{URL::to('/profile')}}" title="">Lets start</a>
			</div><!--banner-text end-->
			<h3 class="headline">Video of the Day by <a href="{{URL::to('/profile')}}" title="">newfox media</a></h3>
		</div>
	</section><!--banner-section end-->
	<section class="more_items_sec">
  		<div class="container">
	  		<div class="amz_products_content">

	  			<div class="amazon">
					<div class="brws-head">
						<h3>All the celebrities </h3>
						<div class="amz-lg">
							<a href="#" title>View all</a>
						</div><!--amz-lg end-->
						<div class="clearfix"></div>
					</div><!--abt-amz end-->
					<div class="amz-img-inf">
						<div class="row">
							@foreach($celebrities as $celebrity)
							<div class="col-lg-2 col-md-4 col-sm-6 col-6 full_wdth">
								<div class="mg-inf">
									<div class="img-sr">
										@foreach($celebrity->images as $image)
                                            <a href="{{URL::to('/profile')}}" title="">
                                                <img src="{{ asset( '/storage/celebrities/'.$image->url ) }}" alt="Thumbnail">
                                            </a>
                                        @endforeach
									</div>
									<div class="info-sr">
										<h3><a href="{{URL::to('/profile')}}" title="">{{$celebrity->name}}</a></h3>
										<span>started at ৳3200</span>
									</div>
								</div><!--mg-inf end-->
							</div>
							@endforeach
						</div>
					</div><!--amz-img-in-->
				</div><!--amazon end-->

	  			<div class="amazon">
					<div class="brws-head">
						<h3>Top rated celebrity </h3>
						<div class="amz-lg">
							<a href="#" title>View all</a>
						</div><!--amz-lg end-->
						<div class="clearfix"></div>
					</div><!--abt-amz end-->
					<div class="amz-img-inf">
						<div class="row">
							<div class="col-lg-2 col-md-4 col-sm-6 col-6 full_wdth">
								<div class="mg-inf">
									<div class="img-sr">
										<a href="{{URL::to('/profile')}}" title="">
											<img src="{{asset('web/images/resources/pro1.png')}}" alt="">
										</a>
									</div>
									<div class="info-sr">
										<h3><a href="{{URL::to('/profile')}}" title="">HEMOON Men</a></h3>
										<span>started at ৳3200</span>
									</div>
								</div><!--mg-inf end-->
							</div>
							<div class="col-lg-2 col-md-4 col-sm-6 col-6 full_wdth">
								<div class="mg-inf">
									<div class="img-sr">
										<a href="{{URL::to('/profile')}}" title="">
											<img src="{{asset('web/images/resources/pro2.png')}}" alt="">
										</a>
									</div>
									<div class="info-sr">
										<h3><a href="{{URL::to('/profile')}}" title=""> MenK</a></h3>
										<span class="pr-d">started at ৳3400</span>
									</div>
								</div><!--mg-inf end-->
							</div>
							<div class="col-lg-2 col-md-4 col-sm-6 col-6 full_wdth">
								<div class="mg-inf">
									<div class="img-sr">
										<a href="{{URL::to('/profile')}}" title="">
											<img src="{{asset('web/images/resources/pro3.png')}}" alt="">
										</a>
									</div>
									<div class="info-sr">
										<h3> <a href="{{URL::to('/profile')}}" title="">Dickies </a></h3>
										<span class="pr-d">started at ৳1700</span>
									</div>
								</div><!--mg-inf end-->
							</div>
							<div class="col-lg-2 col-md-4 col-sm-6 col-6 full_wdth">
								<div class="mg-inf">
									<div class="img-sr">
										<a href="{{URL::to('/profile')}}" title="">
											<img src="{{asset('web/images/resources/pro4.png')}}" alt="">
										</a>
									</div>
									<div class="info-sr">
										<h3> <a href="{{URL::to('/profile')}}" title="">Men's Big-Tall</a></h3>
										<span class="pr-d">started at ৳3900</span>
									</div>
								</div><!--mg-inf end-->
							</div>
							<div class="col-lg-2 col-md-4 col-sm-6 col-6 full_wdth">
								<div class="mg-inf">
									<div class="img-sr">
										<a href="{{URL::to('/profile')}}" title="">
											<img src="{{asset('web/images/resources/pro5.png')}}" alt="">
										</a>
									</div>
									<div class="info-sr">
										<h3> <a href="{{URL::to('/profile')}}" title="">Dickies </a></h3>
										<span class="pr-d">started at ৳1700</span>
									</div>
								</div><!--mg-inf end-->
							</div>
							<div class="col-lg-2 col-md-4 col-sm-6 col-6 full_wdth">
								<div class="mg-inf">
									<div class="img-sr">
										<a href="{{URL::to('/profile')}}" title="">
											<img src="{{asset('web/images/resources/pro6.png')}}" alt="">
										</a>
									</div>
									<div class="info-sr">
										<h3> <a href="{{URL::to('/profile')}}" title="">Men's Big-Tall</a></h3>
										<span class="pr-d">started at ৳3900</span>
									</div>
								</div><!--mg-inf end-->
							</div>
						</div>
					</div><!--amz-img-in-->
				</div><!--amazon end-->
				<div class="amazon">
					<div class="abt-amz">
						<div class="amz-hd">
							<h2>Youtube celebrity </h2>
						</div><!--amz-hd end-->
						<div class="amz-lg">
							<img src="{{asset('web/images/resources/cp-logo.png')}}" alt="">
						</div><!--amz-lg end-->
						<div class="clearfix"></div>
					</div><!--abt-amz end-->
					<div class="amz-img-inf">
						<div class="row">
							<div class="col-lg-2 col-md-4 col-sm-6 col-6 full_wdth">
								<div class="mg-inf">
									<div class="img-sr">
										<a href="{{URL::to('/profile')}}" title="">
											<img src="{{asset('web/images/resources/pro7.png')}}" alt="">
										</a>
									</div>
									<div class="info-sr">
										<h3><a href="{{URL::to('/profile')}}" title="">HEMOON Men</a></h3>
										<span>started at ৳3200</span>
									</div>
								</div><!--mg-inf end-->
							</div>
							<div class="col-lg-2 col-md-4 col-sm-6 col-6 full_wdth">
								<div class="mg-inf">
									<div class="img-sr">
										<a href="{{URL::to('/profile')}}" title="">
											<img src="{{asset('web/images/resources/pro8.png')}}" alt="">
										</a>
									</div>
									<div class="info-sr">
										<h3><a href="{{URL::to('/profile')}}" title=""> MenK</a></h3>
										<span class="pr-d">started at ৳3400</span>
									</div>
								</div><!--mg-inf end-->
							</div>
							<div class="col-lg-2 col-md-4 col-sm-6 col-6 full_wdth">
								<div class="mg-inf">
									<div class="img-sr">
										<a href="{{URL::to('/profile')}}" title="">
											<img src="{{asset('web/images/resources/pro9.png')}}" alt="">
										</a>
									</div>
									<div class="info-sr">
										<h3> <a href="{{URL::to('/profile')}}" title="">Dickies </a></h3>
										<span class="pr-d">started at ৳1700</span>
									</div>
								</div><!--mg-inf end-->
							</div>
							<div class="col-lg-2 col-md-4 col-sm-6 col-6 full_wdth">
								<div class="mg-inf">
									<div class="img-sr">
										<a href="{{URL::to('/profile')}}" title="">
											<img src="{{asset('web/images/resources/pro10.png')}}" alt="">
										</a>
									</div>
									<div class="info-sr">
										<h3> <a href="{{URL::to('/profile')}}" title="">Men's Big-Tall</a></h3>
										<span class="pr-d">started at ৳3900</span>
									</div>
								</div><!--mg-inf end-->
							</div>
							<div class="col-lg-2 col-md-4 col-sm-6 col-6 full_wdth">
								<div class="mg-inf">
									<div class="img-sr">
										<a href="{{URL::to('/profile')}}" title="">
											<img src="{{asset('web/images/resources/pro11.png')}}" alt="">
										</a>
									</div>
									<div class="info-sr">
										<h3> <a href="{{URL::to('/profile')}}" title="">Dickies </a></h3>
										<span class="pr-d">started at ৳1700</span>
									</div>
								</div><!--mg-inf end-->
							</div>
							<div class="col-lg-2 col-md-4 col-sm-6 col-6 full_wdth">
								<div class="mg-inf">
									<div class="img-sr">
										<a href="{{URL::to('/profile')}}" title="">
											<img src="{{asset('web/images/resources/pro12.png')}}" alt="">
										</a>
									</div>
									<div class="info-sr">
										<h3> <a href="{{URL::to('/profile')}}" title="">Men's Big-Tall</a></h3>
										<span class="pr-d">started at ৳3900</span>
									</div>
								</div><!--mg-inf end-->
							</div>
						</div>
					</div><!--amz-img-in-->
				</div><!--amazon end-->
				<div class="amazon">
					<div class="abt-amz">
						<div class="amz-hd">
							<h2>Viral celebrity </h2>
						</div><!--amz-hd end-->
						<div class="amz-lg">
							<a href="#" class="btn btn-info">view all</a>
						</div><!--amz-lg end-->
						<div class="clearfix"></div>
					</div><!--abt-amz end-->
					<div class="amz-img-inf">
						<div class="row">
							<div class="col-lg-2 col-md-4 col-sm-6 col-6 full_wdth">
								<div class="mg-inf">
									<div class="img-sr">
										<a href="{{URL::to('/profile')}}" title="">
											<img src="{{asset('web/images/resources/pro13.png')}}" alt="">
										</a>
									</div>
									<div class="info-sr">
										<h3><a href="{{URL::to('/profile')}}" title="">HEMOON Men</a></h3>
										<span>started at ৳3200</span>
									</div>
								</div><!--mg-inf end-->
							</div>
							<div class="col-lg-2 col-md-4 col-sm-6 col-6 full_wdth">
								<div class="mg-inf">
									<div class="img-sr">
										<a href="{{URL::to('/profile')}}" title="">
											<img src="{{asset('web/images/resources/pro14.png')}}" alt="">
										</a>
									</div>
									<div class="info-sr">
										<h3><a href="{{URL::to('/profile')}}" title=""> MenK</a></h3>
										<span class="pr-d">started at ৳3400</span>
									</div>
								</div><!--mg-inf end-->
							</div>
							<div class="col-lg-2 col-md-4 col-sm-6 col-6 full_wdth">
								<div class="mg-inf">
									<div class="img-sr">
										<a href="{{URL::to('/profile')}}" title="">
											<img src="{{asset('web/images/resources/pro15.png')}}" alt="">
										</a>
									</div>
									<div class="info-sr">
										<h3> <a href="{{URL::to('/profile')}}" title="">Dickies </a></h3>
										<span class="pr-d">started at ৳1700</span>
									</div>
								</div><!--mg-inf end-->
							</div>
							<div class="col-lg-2 col-md-4 col-sm-6 col-6 full_wdth">
								<div class="mg-inf">
									<div class="img-sr">
										<a href="{{URL::to('/profile')}}" title="">
											<img src="{{asset('web/images/resources/pro16.png')}}" alt="">
										</a>
									</div>
									<div class="info-sr">
										<h3> <a href="{{URL::to('/profile')}}" title="">Men's Big-Tall</a></h3>
										<span class="pr-d">started at ৳3900</span>
									</div>
								</div><!--mg-inf end-->
							</div>
							<div class="col-lg-2 col-md-4 col-sm-6 col-6 full_wdth">
								<div class="mg-inf">
									<div class="img-sr">
										<a href="{{URL::to('/profile')}}" title="">
											<img src="{{asset('web/images/resources/pro17.png')}}" alt="">
										</a>
									</div>
									<div class="info-sr">
										<h3> <a href="{{URL::to('/profile')}}" title="">Dickies </a></h3>
										<span class="pr-d">started at ৳1700</span>
									</div>
								</div><!--mg-inf end-->
							</div>
							<div class="col-lg-2 col-md-4 col-sm-6 col-6 full_wdth">
								<div class="mg-inf">
									<div class="img-sr">
										<a href="{{URL::to('/profile')}}" title="">
											<img src="{{asset('web/images/resources/pro18.png')}}" alt="">
										</a>
									</div>
									<div class="info-sr">
										<h3> <a href="{{URL::to('/profile')}}" title="">Men's Big-Tall</a></h3>
										<span class="pr-d">started at ৳3900</span>
									</div>
								</div><!--mg-inf end-->
							</div>
						</div>
					</div><!--amz-img-in-->
				</div><!--amazon end-->
	  		</div><!--amz_products_content end-->
  		</div>
	</section><!--more_items_sec end-->
@endsection