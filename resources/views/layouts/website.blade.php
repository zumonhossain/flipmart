<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
		<meta name="description" content="">
		<meta name="author" content="">
	    <meta name="keywords" content="MediaCenter, Template, eCommerce">
	    <meta name="robots" content="all">
		<meta name="csrf-token" content="{{ csrf_token() }}">

	    <title>Flipmart</title>
	    <link rel="stylesheet" href="{{ asset('contents/website') }}/assets/css/bootstrap.min.css">
	    <link rel="stylesheet" href="{{ asset('contents/website') }}/assets/css/main.css">
	    <link rel="stylesheet" href="{{ asset('contents/website') }}/assets/css/blue.css">
	    <link rel="stylesheet" href="{{ asset('contents/website') }}/assets/css/owl.carousel.css">
		<link rel="stylesheet" href="{{ asset('contents/website') }}/assets/css/owl.transitions.css">
		<link rel="stylesheet" href="{{ asset('contents/website') }}/assets/css/animate.min.css">
		<link rel="stylesheet" href="{{ asset('contents/website') }}/assets/css/rateit.css">
		<link rel="stylesheet" href="{{ asset('contents/website') }}/assets/css/bootstrap-select.min.css">
		<link rel="stylesheet" href="{{ asset('contents/website') }}/assets/css/font-awesome.css">
		<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="{{ asset('contents/website') }}/assets/css/toastr.css">
	</head>
    <body class="cnt-home">
		<!-- ================== HEADER ================ -->
		<header class="header-style-1">
			<!-- =================== TOP MENU ===================== -->
			<div class="top-bar animate-dropdown">
				<div class="container">
					<div class="header-top-inner">
						<div class="cnt-account">
							<ul class="list-unstyled">
								<li><a href="#"><i class="icon fa fa-user"></i>My Account</a></li>
								<li><a href="#"><i class="icon fa fa-heart"></i>Wishlist</a></li>
								<li><a href="#"><i class="icon fa fa-shopping-cart"></i>My Cart</a></li>
								<li><a href="#"><i class="icon fa fa-check"></i>Checkout</a></li>
								@auth
									<li><a href="{{ route('user.dashboard') }}"><i class="icon fa fa-lock"></i>Profile</a></li>
									<!-- <li><a href="{{ url('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" style="color:green;font-weight:bold">Sign Out</a></li> -->

									<form id="logout-form" method="POST" action="{{ url('logout') }}">
										@csrf
									</form>
								@else
									<li><a href="{{ url('login') }}"><i class="icon fa fa-lock"></i>Login/Register</a></li>
								@endauth
							</ul>
						</div>

						<div class="cnt-block">
							<ul class="list-unstyled list-inline">
								<li class="dropdown dropdown-small">
									<a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="value">USD </span><b class="caret"></b></a>
									<ul class="dropdown-menu">
										<li><a href="#">USD</a></li>
										<li><a href="#">INR</a></li>
										<li><a href="#">GBP</a></li>
									</ul>
								</li>

								<li class="dropdown dropdown-small">
									<a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="value">English </span><b class="caret"></b></a>
									<ul class="dropdown-menu">
										<li><a href="#">English</a></li>
										<li><a href="#">French</a></li>
										<li><a href="#">German</a></li>
									</ul>
								</li>
							</ul><!-- /.list-unstyled -->
						</div>

						<div class="clearfix"></div>
					</div>
				</div>
			</div>
			<!-- ================= TOP MENU : END ================== -->
			<div class="main-header">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
							<!-- ============== LOGO =================== -->
							<div class="logo">
								<a href="{{ url('/') }}">
									<img src="{{ asset('contents/website') }}/assets/images/logo.png" alt="">
								</a>
							</div>
							<!-- ================== LOGO : END =================== -->				
						</div>
						<div class="col-xs-12 col-sm-12 col-md-7 top-search-holder">
							<!-- ============= SEARCH AREA =================== -->
							<div class="search-area">
								<form>
									<div class="control-group">
										<ul class="categories-filter animate-dropdown">
											<li class="dropdown">
												<a class="dropdown-toggle"  data-toggle="dropdown" href="category.html">Categories <b class="caret"></b></a>
												<ul class="dropdown-menu" role="menu" >
													@php
														$categories = App\Models\Category::where('category_status',1)->orderBy('category_name','ASC')->limit(5)->get();
													@endphp 

													@foreach($categories as $category)
														<li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- {{ $category->category_name }}</a></li>
													@endforeach
												</ul>
											</li>
										</ul>
										<input class="search-field" placeholder="Search here..." />
										<a class="search-button" href="#" ></a>    
									</div>
								</form>
							</div>
							<!-- ========== SEARCH AREA : END ================ -->				
						</div>
						<div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row">
						<!-- ===================== SHOPPING CART DROPDOWN ======================== -->

						<div class="dropdown dropdown-cart">
							<a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
								<div class="items-cart-inner">
								<div class="basket">
										<i class="glyphicon glyphicon-shopping-cart"></i>
									</div>
									<div class="basket-item-count"><span class="count">2</span></div>
									<div class="total-price-basket">
										<span class="lbl">cart -</span>
										<span class="total-price">
											<span class="sign">$</span><span class="value">600.00</span>
										</span>
									</div>
								</div>
							</a>
							<ul class="dropdown-menu">
								<li>
									<div class="cart-item product-summary">
										<div class="row">
											<div class="col-xs-4">
												<div class="image">
													<a href="detail.html"><img src="{{ asset('contents/website') }}/assets/images/cart.jpg" alt=""></a>
												</div>
											</div>
											<div class="col-xs-7">
												<h3 class="name"><a href="index8a95.html?page-detail">Simple Product</a></h3>
												<div class="price">$600.00</div>
											</div>
											<div class="col-xs-1 action">
												<a href="#"><i class="fa fa-trash"></i></a>
											</div>
										</div>
									</div>
									<div class="clearfix"></div>
									<hr>
									<div class="clearfix cart-total">
										<div class="pull-right">
											<span class="text">Sub Total :</span><span class='price'>$600.00</span>
										</div>
										<div class="clearfix"></div>
										<a href="checkout.html" class="btn btn-upper btn-primary btn-block m-t-20">Checkout</a>	
									</div>
								</li>
							</ul>
						</div>
						<!-- ======================= SHOPPING CART DROPDOWN : END======================= -->				
					</div>
					</div><!-- /.row -->
				</div><!-- /.container -->
			</div><!-- /.main-header -->

			<!-- ===================== NAVBAR ====================== -->
			<div class="header-nav animate-dropdown">
				<div class="container">
					<div class="yamm navbar navbar-default" role="navigation">
						<div class="navbar-header">
							<button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="nav-bg-class">
							<div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
								<div class="nav-outer">
									<ul class="nav navbar-nav">
										<li class="active dropdown yamm-fw">
											<a href="home.html" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">Home</a>
										</li>

										@foreach($categories as $category)
											<li class="dropdown yamm mega-menu">
												<a href="home.html" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">{{ $category->category_name }}</a>
												<ul class="dropdown-menu container">
													<li>
														<div class="yamm-content ">
															<div class="row">
																
																@php
																	$subcategories = App\Models\SubCategory::where('subcategory_status',1)->where('category_id',$category->id)->orderBy('subcategory_name','ASC')->get();
																@endphp

																@foreach($subcategories as $subcategory)
																	<div class="col-xs-12 col-sm-6 col-md-2 col-menu">
																			<h2 class="title">{{ $subcategory->subcategory_name }}</h2>
																			<ul class="links">
																				@php
																					$subsubcategories = App\Models\SubSubCategory::where('subcategory_id',$subcategory->id)->where('subsubcategory_status',1)->orderBy('subsubcategory_name','ASC')->get();
																				@endphp

																				@foreach($subsubcategories as $subsubcategory)
																					<li><a href="#">{{ $subsubcategory->subsubcategory_name }}</a></li>
																				@endforeach
																			</ul>
																	</div>
																@endforeach

																<div class="col-xs-12 col-sm-6 col-md-4 col-menu banner-image">
																	<img class="img-responsive" src="{{ asset('contents/website') }}/assets/images/banners/top-menu-banner.jpg" alt="">
																</div>
															</div>
														</div>
													</li>
												</ul>
											</li>
										@endforeach

									</ul><!-- /.navbar-nav -->
									<div class="clearfix"></div>				
								</div><!-- /.nav-outer -->
							</div><!-- /.navbar-collapse -->
						</div><!-- /.nav-bg-class -->
					</div><!-- /.navbar-default -->
				</div><!-- /.container-class -->
			</div><!-- /.header-nav -->
			<!-- =============== NAVBAR : END ================== -->
		</header>
		<!-- ============== HEADER : END =============== -->

		<!-- ============== Main Content Start =============== -->
		@yield('content')
		<!-- ============== Main Content End =============== -->

		<!-- =============== FOOTER ==================== -->
		<footer id="footer" class="footer color-bg">
			<div class="footer-bottom">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-6 col-md-3">
							<div class="module-heading">
								<h4 class="module-title">Contact Us</h4>
							</div>
							<div class="module-body">
								<ul class="toggle-footer" style="">
									<li class="media">
										<div class="pull-left">
											<span class="icon fa-stack fa-lg">
													<i class="fa fa-map-marker fa-stack-1x fa-inverse"></i>
											</span>
										</div>
										<div class="media-body">
											<p>ThemesGround, 789 Main rd, Anytown, CA 12345 USA</p>
										</div>
									</li>

									<li class="media">
										<div class="pull-left">
											<span class="icon fa-stack fa-lg">
											<i class="fa fa-mobile fa-stack-1x fa-inverse"></i>
											</span>
										</div>
										<div class="media-body">
											<p>+(888) 123-4567<br>+(888) 456-7890</p>
										</div>
									</li>

									<li class="media">
										<div class="pull-left">
											<span class="icon fa-stack fa-lg">
											<i class="fa fa-envelope fa-stack-1x fa-inverse"></i>
											</span>
										</div>
										<div class="media-body">
											<span><a href="#">flipmart@themesground.com</a></span>
										</div>
									</li>
								</ul>
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-3">
							<div class="module-heading">
								<h4 class="module-title">Customer Service</h4>
							</div>
							<div class="module-body">
								<ul class='list-unstyled'>
									<li class="first"><a href="#" title="Contact us">My Account</a></li>
									<li><a href="#" title="About us">Order History</a></li>
									<li><a href="#" title="faq">FAQ</a></li>
									<li><a href="#" title="Popular Searches">Specials</a></li>
									<li class="last"><a href="#" title="Where is my order?">Help Center</a></li>
								</ul>
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-3">
							<div class="module-heading">
								<h4 class="module-title">Corporation</h4>
							</div>
							<div class="module-body">
								<ul class='list-unstyled'>
									<li class="first"><a title="Your Account" href="#">About us</a></li>
									<li><a title="Information" href="#">Customer Service</a></li>
									<li><a title="Addresses" href="#">Company</a></li>
									<li><a title="Addresses" href="#">Investor Relations</a></li>
									<li class="last"><a title="Orders History" href="#">Advanced Search</a></li>
								</ul>
							</div>
						</div>

						<div class="col-xs-12 col-sm-6 col-md-3">
							<div class="module-heading">
								<h4 class="module-title">Why Choose Us</h4>
							</div>
							<div class="module-body">
								<ul class='list-unstyled'>
									<li class="first"><a href="#" title="About us">Shopping Guide</a></li>
									<li><a href="#" title="Blog">Blog</a></li>
									<li><a href="#" title="Company">Company</a></li>
									<li><a href="#" title="Investor Relations">Investor Relations</a></li>
									<li class=" last"><a href="contact-us.html" title="Suppliers">Contact Us</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="copyright-bar">
				<div class="container">
					<div class="col-xs-12 col-sm-6 no-padding social">
						<ul class="link">
						<li class="fb pull-left"><a target="_blank" rel="nofollow" href="#" title="Facebook"></a></li>
						<li class="tw pull-left"><a target="_blank" rel="nofollow" href="#" title="Twitter"></a></li>
						<li class="googleplus pull-left"><a target="_blank" rel="nofollow" href="#" title="GooglePlus"></a></li>
						<li class="rss pull-left"><a target="_blank" rel="nofollow" href="#" title="RSS"></a></li>
						<li class="pintrest pull-left"><a target="_blank" rel="nofollow" href="#" title="PInterest"></a></li>
						<li class="linkedin pull-left"><a target="_blank" rel="nofollow" href="#" title="Linkedin"></a></li>
						<li class="youtube pull-left"><a target="_blank" rel="nofollow" href="#" title="Youtube"></a></li>
						</ul>
					</div>
					<div class="col-xs-12 col-sm-6 no-padding">
						<div class="clearfix payment-methods">
							<ul>
								<li><img src="{{ asset('contents/website') }}/assets/images/payments/1.png" alt=""></li>
								<li><img src="{{ asset('contents/website') }}/assets/images/payments/2.png" alt=""></li>
								<li><img src="{{ asset('contents/website') }}/assets/images/payments/3.png" alt=""></li>
								<li><img src="{{ asset('contents/website') }}/assets/images/payments/4.png" alt=""></li>
								<li><img src="{{ asset('contents/website') }}/assets/images/payments/5.png" alt=""></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<!-- ================== FOOTER : END ====================== -->


				<!-- ================== Cart Modal Start ==================== -->
				<div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel"><span id="pname"></span></h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeModal">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-md-4">
								<div class="card" style="width:16rem;">
									<img src="" class="card-img-top" id="pimage" alt="" style="height: 200px;">
								</div>
							</div>
							<div class="col-md-4">
								<ul class="list-group">
									<li class="list-group-item">Price: <strong class="text-danger">$<span id="price"></span> </strong>
									<del id="oldprice">$</del>
									</li>
									<li class="list-group-item">Product Code: <strong id="pcode"></strong></li>
									<li class="list-group-item">Category: <strong id="pcategory"></strong></li>
									<li class="list-group-item">Brand: <strong id="pbrand"></strong> </li>

									<li class="list-group-item">Stock: <span class="badge badge-pill badge-success" id="aviable" style="background:green; color:white;"></span>
										<span class="badge badge-pill badge-danger" id="stockout" style="background:red; color:white;"></span>
									</li>
								</ul>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="color">Select Color</label>
									<select class="form-control" id="color" name="color">

									</select>
								</div>
								<div class="form-group" id="sizeArea">
									<label for="size">Select Size</label>
									<select class="form-control" id="size" name="size">

									</select>
								</div>
								<div class="form-group">
									<label for="qty">Quantity</label>
									<input type="number" class="form-control" id="qty" value="1" min="1">
								</div>
								<input type="hidden" id="product_id">
								<button type="submit" class="btn btn-danger" onclick="addToCart()">Add To Cart</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- ================== Cart Modal End ==================== -->

		<script src="{{ asset('contents/website') }}/assets/js/jquery-1.11.1.min.js"></script>
		<script src="{{ asset('contents/website') }}/assets/js/bootstrap.min.js"></script>
		<script src="{{ asset('contents/website') }}/assets/js/bootstrap-hover-dropdown.min.js"></script>
		<script src="{{ asset('contents/website') }}/assets/js/owl.carousel.min.js"></script>
		<script src="{{ asset('contents/website') }}/assets/js/echo.min.js"></script>
		<script src="{{ asset('contents/website') }}/assets/js/jquery.easing-1.3.min.js"></script>
		<script src="{{ asset('contents/website') }}/assets/js/bootstrap-slider.min.js"></script>
		<script src="{{ asset('contents/website') }}/assets/js/jquery.rateit.min.js"></script>
		<script type="text/javascript" src="{{ asset('contents/website') }}/assets/js/lightbox.min.js"></script>
		<script src="{{ asset('contents/website') }}/assets/js/bootstrap-select.min.js"></script>
		<script src="{{ asset('contents/website') }}/assets/js/wow.min.js"></script>
		<script src="{{ asset('contents/website') }}/assets/js/scripts.js"></script>
		<script src="{{ asset('contents/website') }}/assets/js/custom.js"></script>

		<script src="{{ asset('contents/website') }}/assets/js/toastr.min.js"></script>
		<script>
			@if(Session::has('messege'))
				var type="{{Session::get('alert-type','info')}}"
				switch(type){
					case 'info':
						toastr.info("{{ Session::get('messege') }}");
						break;
					case 'success':
						toastr.success("{{ Session::get('messege') }}");
						break;
					case 'warning':
						toastr.warning("{{ Session::get('messege') }}");
						break;
					case 'error':
						toastr.error("{{ Session::get('messege') }}");
						break;
				}
			@endif
		</script>


		<script type="text/javascript">
			$.ajaxSetup({
				headers:{
					'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
				}
			})

			function productView(id){
				$.ajax({
					type:'GET',
					url: 'product/view/modal/'+id,
					dataType:'json',
					success:function(data){
						$('#pname').text(data.product.product_name);
						$('#price').text(data.product.selling_price);
						$('#pcode').text(data.product.product_code);
						$('#pcategory').text(data.product.category.category_name);
						$('#pbrand').text(data.product.brand.brand_name);
						$('#pimage').attr('src','/'+data.product.product_thambnail); 

						//product price
						if (data.product.discount_price == null) {
							$('#pprice').text('');
							$('#oldprice').text('');
							$('#pprice').text(data.product.selling_price);
						}else{
							$('#pprice').text(data.product.discount_price);
							$('#oldprice').text(data.product.selling_price);
						}

						//stock
						if (data.product.product_qty > 0) {
							$('#aviable').text('');
							$('#stockout').text('');
							$('#aviable').text('aviable');
						}else{
							$('#aviable').text('');
							$('#stockout').text('');
							$('#stockout').text('stockout');
						}

						//color
						$('select[name="color"]').empty();
						$.each(data.color,function(key,value){
							$('select[name="color"]').append('<option value="'+value+'">'+value+'</option>')
						}) 

						//size
						$('select[name="size"]').empty();
						$.each(data.size,function(key,value){
							$('select[name="size"]').append('<option value="'+value+'">'+value+'</option>')
							if (data.size == "") {
								$('#sizeArea').hide();
							}else{
								$('#sizeArea').show();
							}
						})               


					}
				})
			}
			productView();


		</script>
	
	</body>
</html>