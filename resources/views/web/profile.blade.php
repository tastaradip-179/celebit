@extends('web.common.master')

@section('content')
<section class="channel-cover">
	<img src="{{asset('web/images/resources/channel-banner.jpg')}}" alt="">
</section><!--channel-cover end-->

<section class="videso_section">
	<div class="info-pr-sec">
		<div class="container">
			<div class="vcp_inf cr">
				<span class="vc_hd">
					<img src="{{asset('web/images/resources/sn.png')}}" alt="">
				</span>
				<div class="vc_info pr">
					<h4>ScereBro <span class="verify_ic"><i class="icon-tick"></i></span></h4>
					<span>Reality TV Star - Big Brother, Amazing Race, Fear Factor</span>
				</div>
			</div><!--vcp_inf end-->
			<ul class="chan_cantrz">
				<li>
					<a href="#" title="" class="subscribe">Request a video <strong></strong></a>
				</li>
			</ul><!--chan_cantrz end-->
			<div class="clearfix"></div>
		</div>
	</div><!--info-pr-sec end-->

	<div class="about_tab_content">
		<div class="container">
			<div class="description">
			<div class="row">
				<div class="col-lg-12">
					<div class="decp_cotnet">
						<h2 class="ab-fd">About </h2>
						<p>Welcome to the official Saturday Night Live channel on YouTube!  Here you will find your favorite sketches, behind the scenes clips and web exclusives, featuring all your favorite hosts and cast members.  Check out more SNL at http://www.nbc.com/</p>
					</div><!--abt-founder end-->

					<div class="link-pr">
						<h2 class="ab-fd">Tags </h2>
						<ul class="">
							<li><a href="#" title="">SNL on NBC</a></li>
							<li><a href="#" title=""> Facebook</a></li>
							<li><a href="#" title="">Twitter</a></li>
							<li><a href="#" title="">Instagram</a></li>
							<li><a href="#" title="">Subscribe to SNL on Oren</a></li>
							<li><a href="#" title="">Google+</a></li>
						</ul>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div>
		</div>
	</div><!--about_tab_content end-->
</section><!--Featured Videos end-->


@endsection