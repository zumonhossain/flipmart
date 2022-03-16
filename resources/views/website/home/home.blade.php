@extends('layouts.website')
@section('title')
    Flipmart
@endsection 
@section('content')
	<div class="body-content outer-top-xs" id="top-banner-and-menu">
		<div class="container">
			<div class="row">
				<!-- ================= SIDEBAR ================ -->	
				<div class="col-xs-12 col-sm-12 col-md-3 sidebar">
					
					@include('website.includes.category')

					@include('website.includes.hot-deals')
					
				</div>

				@include('website.includes.special-offer')
			
				@include('website.includes.product-tags')

				@include('website.includes.special-deals')

				@include('website.includes.newsletter')

				@include('website.includes.testimonials')

				<div class="home-banner">
					<img src="{{ asset('contents/website') }}/assets/images/banners/LHS-banner.jpg" alt="Image">
				</div> 
				</div> 
				<!-- ============= SIDEBAR END ================ -->

				<!-- ============== CONTENT ==================== -->
				<div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
					
					@include('website.includes.slider')

					<!-- ==================== INFO BOXES =================== -->
					<div class="info-boxes wow fadeInUp">
						<div class="info-boxes-inner">
							<div class="row">
								<div class="col-md-6 col-sm-4 col-lg-4">
									<div class="info-box">
										<div class="row">
											
											<div class="col-xs-12">
												<h4 class="info-box-heading green">money back</h4>
											</div>
										</div>	
										<h6 class="text">30 Days Money Back Guarantee</h6>
									</div>
								</div><!-- .col -->

								<div class="hidden-md col-sm-4 col-lg-4">
									<div class="info-box">
										<div class="row">
											
											<div class="col-xs-12">
												<h4 class="info-box-heading green">free shipping</h4>
											</div>
										</div>
										<h6 class="text">Shipping on orders over $99</h6>	
									</div>
								</div><!-- .col -->

								<div class="col-md-6 col-sm-4 col-lg-4">
									<div class="info-box">
										<div class="row">
											
											<div class="col-xs-12">
												<h4 class="info-box-heading green">Special Sale</h4>
											</div>
										</div>
										<h6 class="text">Extra $5 off on all items </h6>	
									</div>
								</div><!-- .col -->
							</div><!-- /.row -->
						</div><!-- /.info-boxes-inner -->
					</div>
					<!-- ================ INFO BOXES END =================== -->

					@include('website.includes.new-product')

					<!-- ========= WIDE PRODUCTS ============ -->
					<div class="wide-banners wow fadeInUp outer-bottom-xs">
						<div class="row">
							<div class="col-md-7 col-sm-7">
								<div class="wide-banner cnt-strip">
									<div class="image">
										<img class="img-responsive" src="{{ asset('contents/website') }}/assets/images/banners/home-banner1.jpg" alt="">
									</div>
								</div><!-- /.wide-banner -->
							</div><!-- /.col -->
							<div class="col-md-5 col-sm-5">
								<div class="wide-banner cnt-strip">
									<div class="image">
										<img class="img-responsive" src="{{ asset('contents/website') }}/assets/images/banners/home-banner2.jpg" alt="">
									</div>
								</div><!-- /.wide-banner -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div>
					<!-- ============== WIDE PRODUCTS END =================== -->


					<!-- ============== Featured Product Start =================== -->
						@include('website.includes.featured-product')
					<!-- ============== Featured Product End =================== -->


					<!-- ============= Skip Category PRODUCTS Start ============= -->
						@include('website.includes.skip-category-product')
					<!-- ============= Skip Category PRODUCTS END ============= -->


					
					<!-- =================== WIDE PRODUCTS =============== -->
					<div class="wide-banners wow fadeInUp outer-bottom-xs">
						<div class="row">
							<div class="col-md-12">
								<div class="wide-banner cnt-strip">
									<div class="image">
										<img class="img-responsive" src="{{ asset('contents/website') }}/assets/images/banners/home-banner.jpg" alt="">
									</div>	
									<div class="strip strip-text">
										<div class="strip-inner">
											<h2 class="text-right">New Mens Fashion<br>
											<span class="shopping-needs">Save up to 40% off</span></h2>
										</div>	
									</div>
									<div class="new-label">
										<div class="text">NEW</div>
									</div><!-- /.new-label -->
								</div><!-- /.wide-banner -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div>
					<!-- =============== WIDE PRODUCTS END ================= -->

					@include('website.includes.best-seller')

					@include('website.includes.blog-slider')

					@include('website.includes.new-arrivals')

				</div>
			</div>

			<!-- ================= BRANDS CAROUSEL ================== -->
			@include('website.includes.brand')
			<!-- ============== BRANDS CAROUSEL END ================= -->

		</div>
	</div>
@endsection