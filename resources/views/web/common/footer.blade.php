
<style>
.page-link-list li{
	display: inline;
}
</style>

<footer>

	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-12 col-12">
				<div class="row">
					<h4>What We Offer?</h4> 
				</div>
				<div class="row">
					<div class="col-md-4">
						<img src="{{asset('web/images/interview.png')}}" />
						<h6>Send Us Request</h6>
					</div>
					<div class="col-md-4">
						<img src="{{asset('web/images/video-camera.png')}}" />
						<h6>Get your video</h6>
					</div>
					<div class="col-md-4">
						<img src="{{asset('web/images/like.png')}}" />
						<h6>Make unforgettable mamories</h6>
					</div>
				</div>
				<div class="row">
					<ul class = "page-link-list">
						<li>About</li>
						<li>Community Rules</li>
						<li>Privacy</li>
						<li>Terms</li>
						<li>Blog</li>
						<li>Contact</li>
						<li>Donate</li>
						<li>Support</li>
						<li>FAQ</li>
					</ul>
				</div>
				
			</div>
			<div class="col-lg-6 col-md-6 col-sm-12 col-12"></div>
		</div>
	</div>




	<div class="container">
		<div class="top-footer">
			<div class="row">
				<div class="col-lg-12">
					<div class="ft-logo">
						<img src="{{asset('web/images/ft-logo.png')}}" alt="">
					</div><!--ft-logo end-->
				</div>
				<div class="col-lg-2 col-md-4 col-sm-6 col-12">
					<div class="widget">
						<h3 class="widget-title">pages</h3>
						<ul class="pages-link">
							<li><a href="#" title="">About</a></li>
							<li><a href="#" title="">Community Rules</a></li>
							<li><a href="#" title="">Privacy</a></li>
							<li><a href="#" title="">Terms</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-2 col-md-4 col-sm-6 col-12">
					<div class="widget">
						<h3 class="widget-title">Links</h3>
						<ul class="pages-link">
							<li><a href="#" title="">Blog</a></li>
							<li><a href="#" title="">Contact</a></li>
							<li><a href="#" title="">Donate</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-2 col-md-4 col-sm-6 col-12">
					<div class="widget">
						<h3 class="widget-title">support</h3>
						<ul class="pages-link">
							<li><a href="#" title="">Support</a></li>
							<li><a href="#" title="">FAQ</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-6 col-md-12 col-sm-6 col-12">
					<div class="widget widget-information">
						<h3 class="widget-title">Information</h3>
						<p>Celebrity is a platform that make your special day unforgettable</p>
					</div><!--widget-information end-->
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