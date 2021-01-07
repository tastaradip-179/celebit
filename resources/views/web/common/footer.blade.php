<footer>
	<div class="container">
		<div class="top-footer">
				<div class="row">
					<div class="col-lg-12">
						<div class="ft-logo">
							<img src="{{asset('web/images/ft-logo.png')}}" alt="">
						</div><!--ft-logo end-->
					</div>
				</div>
				<div class="row">			
					<div class="col-lg-6 col-md-6 col-sm-12 col-12">
						<form class="newsletter" id="newsletter">
							<h4>Join us to get latest news</h4>
							<input type="email" placeholder="Email Address" />
							<button type="submit" class="btn btn-default waves-effect waves-light">&#8594;</button>
						</form>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-12 col-12">
						<h4>What We Offer?</h4> 				
						<div class="row">
							<div class="col-md-4">
								<img class="icon" src="{{asset('web/images/icon/smartphone.png')}}" />
								<h6>Send Us Request to your fav</h6>
							</div>
							<div class="col-md-4">
								<img class="icon" src="{{asset('web/images/icon/video-camera2.png')}}" />
								<h6>Get your personalized video</h6>
							</div>
							<div class="col-md-4">
								<img class="icon" src="{{asset('web/images/icon/balloon.png')}}" />
								<h6>Make unforgettable memories</h6>
							</div>
						</div>				
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-12">
						<ul class="page-link-list">
							<h4>Links</h4>
							<li><a href="">About</a></li>
							<li><a href="">Community Rules</a></li>
							<li><a href="">Privacy</a></li>
							<li><a href="">Terms</a></li>
							<li><a href="">Blog</a></li>
							<li><a href="">Contact</a></li>
							<li><a href="">Donate</a></li>
							<li><a href="">Support</a></li>
							<li><a href="">FAQ</a></li>
						</ul>
					</div>
				</div>
		</div><!--top-footer end-->
		<div class="bottom-strip">
			<p>© <?php echo date('Y') ?> Celebrity App <i class="icon-like"></i> Crafted by Arcturus Technology</p>
			<ul class="social-links">
				<li><a href="#" title=""><i class="icon-facebook-official"></i></a></li>
				<li><a href="#" title=""><i class="icon-twitter"></i></a></li>
				<li><a href="#" title=""><i class="icon-instagram"></i></a></li>
			</ul>
			<div class="clearfix"></div>
		</div><!--bottom-strip end-->
	</div>
</footer><!--footer -->

@include('web.common.customer-login')
@include('web.common.customer-registration')