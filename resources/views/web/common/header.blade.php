<header>
	<marquee width="100%" direction="left" height="44px" style="background:#272626; ">
      <h3 style="color:#e60606; font-size: 30px">It's a Demo website. All the information and contents are fake. Please don't take it seriously.</h3>
	</marquee>
	<div class="top_bar">
		<div class="container">
			<div class="top_header_content">
				<div class="menu_logo">
					<a href="#" title="" class="menu">
						<i class="icon-menu"></i>
					</a>
					<a href="{{URL::to('/')}}" title="" class="logo">
						<img src="{{asset('web/images/icon/logo.png')}}" alt="logo">
					</a>
				</div><!--menu_logo end-->
				<div class="search_form">
					<form>
						<input type="text" name="celebrity" id="celebrity" placeholder="Search celebrity">
						<!-- <button type="submit">
							<i class="icon-search"></i>
						</button> -->
					</form>
				</div><!--search_form end-->
				<ul class="controls-lv">  
					<li>
						<a href="#" title=""><i class="icon-message"></i></a>
					</li>
					<li>
						<a href="#" title=""><i class="icon-notification"></i></a>
					</li>
					<li class="user-log">
						<div class="user-ac-img">
							<img src="{{asset('web/images/icon/user-icon.png')}}" alt="">
						</div>
						<div class="account-menu">
							<h4>AZYRUSMAX <span class="usr-status">PRO</span></h4>
							<div class="sd_menu">
								<ul class="mm_menu">
									<li>
										<span>
											<i class="icon-settings"></i>
										</span>
										<a href="#" title="">Settings</a>
									</li>
									@if(Auth::guard('customer')->check())
									 	@php($logged_customer = Auth::guard('customer')->user())
										<li>
											<span>
												<i class="icon-logout"></i>
											</span>
											<a href="{{route('web.customer.show', $logged_customer->username)}}" title="">Profile</a>
										</li>
										<li>
											<span>
												<i class="icon-logout"></i>
											</span>
											<a href="{{route('web.customer.logout')}}" title="">Sign out</a>
										</li>
									@else
										<li>
											<span>
												<i class="icon-login"></i>
											</span>
											<a href="#" data-toggle="modal" data-target="#elegantLoginModalForm" title="" onclick="openLoginModal()">Sign In</a>
										</li>
									@endif	
								</ul>
							</div><!--sd_menu end-->
							<div class="sd_menu scnd">
								<ul class="mm_menu">
									<li>
										<span>
											<i class="icon-light"></i>
										</span>
										<a href="javascript:void()" id="theme-toggler" onclick="toggleTheme()"></a>
										<!-- <label class="switch">
											<input type="checkbox">
										  	<b class="slider round"></b>
										</label> -->
									</li>
									<li>
										<span>
											<i class="icon-feedback"></i>
										</span>
										<a href="#" title="">Send feedback</a>
									</li>
								</ul>
							</div><!--sd_menu end-->
						</div>
					</li>
				</ul><!--controls-lv end-->
				<div class="clearfix"></div>
			</div><!--top_header_content end-->
		</div>
	</div><!--header_content end-->
</header><!--header end-->
