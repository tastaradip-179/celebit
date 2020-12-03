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
					<img src="{{ asset( '/storage/celebrities/'.$image->url ) }}" alt="">
				</span>
				<div class="vc_info pr">
					<h4>{{$celebrity->name}} <span class="verify_ic"><i class="icon-tick"></i></span></h4>
					<span>{{$celebrity->designation}}</span>
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
	<div class="history-lst tbY">
		<div class="container">
			<ul class="nav nav-tabs" id="myTab" role="tablist">
			  <li class="nav-item">
			    <a class="nav-link" id="home_tab" data-toggle="tab" href="#home_vidz" role="tab" aria-controls="home_tab" aria-selected="true">Home</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link active" id="packages_tab" data-toggle="tab" href="#packages_tab" role="tab" aria-controls="packages_tab" aria-selected="false">Packages </a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" id="videos_taab" data-toggle="tab" href="#vvideo_tabz" role="tab" aria-controls="videos_taab" aria-selected="false">Videos </a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" id="playlist-tab" data-toggle="tab" href="#playlist_tab" role="tab" aria-controls="playlist-tab" aria-selected="false">Playlist</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" id="channels-tab" data-toggle="tab" href="#channels_tab" role="tab" aria-controls="channels-tab" aria-selected="false">Channels</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" id="about-tab" data-toggle="tab" href="#about_tab" role="tab" aria-controls="about-tab" aria-selected="false">About</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" id="amazon-tab" data-toggle="tab" href="#amazong-tb" role="tab" aria-controls="amazon-tab" aria-selected="false">Amazon Products</a>
			  </li>
			</ul><!--nav-tabs end-->
			<div class="clearfix"></div>
		</div>
	</div><!--history-lst end-->
	<div class="tab-content p-0" id="myTabContent">
		<div class="tab-pane fade  show active" id="packages_tab" role="tabpanel" aria-labelledby="packages_tab">
			<div class="packages_tab_content">
				<div class="container">
					<div class="content-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th style="width:20%">Name</th>
                                    <th style="width:20%">Offered Duration</th>
                                    <th style="width:20%">Per Min Fee</th>
                                    <th style="width:20%">Extra Per Min Free</th>
                                    <th style="width:20%">Choose</th>
                                </tr>
                            </thead>
                            @foreach($celebrity_packages as $key=>$celebrity_package)
                            <tbody>
                                @if(!empty($celebrity_packages))
                                <tr>
                                    <td>{{$celebrity_packages[$key]->package->name}}</td>
                                    <td>{{$celebrity_packages[$key]->duration}}</td>
                                    <td>{{$celebrity_packages[$key]->per_minute_fee}}</td>
                                    <td>{{$celebrity_packages[$key]->extra_per_minute_fee}}</td> 
                                    <td><a href="{{route('request.create',['id'=>$celebrity_packages[$key]->id])}}" class="btn btn-default">Choose</a></td>
                                </tr> 
                                @endif 
                            </tbody>
                            @endforeach 
                        </table>
                    </div>
				</div>
			</div><!--package_tab_content end-->
		</div>
		<div class="tab-pane fade" id="about_tab" role="tabpanel" aria-labelledby="about-tab">
			<div class="about_tab_content">
				<div class="container">
					<div class="description">
						<div class="row">
							<div class="col-lg-12">
								<div class="decp_cotnet">
									<h2 class="ab-fd">About </h2>
									<p>{{$celebrity->about}}</p>
								</div><!--abt-founder end-->

								<div class="link-pr">
									<h2 class="ab-fd">Tags </h2>
									<ul class="">
										<li><a href="#" title="">SNL on NBC</a></li>
										<li><a href="#" title="">Facebook</a></li>
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
		</div>
	</div>
</section><!--Featured Videos end-->


@endsection