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

	    <title>@yield('title')</title>
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

		<script src="https://js.stripe.com/v3/"></script>
		
		<style>
			.search-area {
				position: relative;
			}

			#suggestProduct {
				position: absolute;
				top: 100%;
				left: 0;
				width: 100%;
				background: #fff;
				z-index: 999;
				border-radius: 4px;
				margin-top: 2px;
			}

		</style>

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
								<li><a href="{{ route('wishlist') }}"><i class="icon fa fa-heart"></i>Wishlist</a></li>
								<li><a href="{{ route('cart') }}"><i class="icon fa fa-shopping-cart"></i>My Cart</a></li>
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


						<!-- ========================== Order Track Start ============================== -->

						<div class="cnt-block">
							<ul class="list-unstyled list-inline">
								<li class="dropdown dropdown-small">
									<a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="modal" data-target="#exampleModal"><span class="value">Order Track </span></a>
								</li>
							</ul><!-- /.list-unstyled -->
						</div><!-- /.cnt-cart -->

						<!-- Modal Start-->
						<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<form action="{{ route('order.track') }}" method="POST">
											@csrf
											<div class="form-group">
												<label for="exampleInputEmail1">Invoice No</label>
												<input type="text" name="invoice_no" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="invoice no">
											</div>
											<button type="submit" class="btn btn-primary">Track Now</button>
										</form>
									</div>
								</div>
							</div>
						</div>
						<!-- Modal End-->

						<!-- ========================== Order Track End ============================== -->

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
								<form action="{{ route('search.product') }}" method="GET">
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
										<input name="search" id="search" onfocus="showSearchResult()" onblur="hideSearchResult()" class="search-field" placeholder="Search here..." />
										<button class="search-button" href="#" ></button>    
									</div>
								</form>

								<div id="suggestProduct"></div>

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
									<div class="basket-item-count"><span class="count" id="cartQty"></span></div>
									<div class="total-price-basket">
										<span class="lbl">cart -</span>
										<span class="total-price">
											<span class="sign">$</span><span class="value" id="cartSubTotal"></span>
										</span>
									</div>
								</div>
							</a>
							<ul class="dropdown-menu">
								<li>
									<!-- mini cart start with ajax -->
										<div id="miniCart">

										</div>
									<!-- mini cart end -->

									
									<hr>
									<div class="clearfix cart-total">
										<div class="pull-right">
											<span class="text">Sub Total :</span><span class='price' id="cartSubTotal"></span>
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

		

		<script type="text/javascript" src="{{ asset('contents/common') }}/jquery.form-validator.min.js"></script>
		<script>
			$.validate({
				lang: 'en'
			});

		</script>

		<script src="{{ asset('contents/website') }}/assets/js/sweetalert2@8.js"></script>

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

			//start product view with modal
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

						// product id
						$('#product_id').val(id);
						// Quentity
						$('#qty').val(1);   

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
			//end product view with modal

			//Start add to cart product
			function addToCart(){
				var id = $('#product_id').val();
				var quantity = $('#qty').val();
				var color = $('#color option:selected').text();
				var size = $('#size option:selected').text();
				var product_name = $('#pname').text();

				$.ajax({
					type: "POST",
					dataType: 'json',
					data:{
						color:color, size:size, quantity:quantity, product_name:product_name
					},
					url: "/cart/data/store/"+id,
					success:function(data){

						miniCart();

						$('#closeModal').click();
						//  start message
						const Toast = Swal.mixin({
							toast: true,
							position: 'top-end',
							showConfirmButton: false,
							timer: 3000
						})
						if($.isEmptyObject(data.error)){
								Toast.fire({
								type: 'success',
								title: data.success
								})
						}else{
							Toast.fire({
								type: 'error',
								title: data.error
							})    
						}
						//  end message
					}
				})
			}
			//End add to cart product

		</script>



		<!-- =============== Mini Cart Start ==================== -->
		<script>
			/// mini cart product add start
			function miniCart(){
				$.ajax({
					type:'GET',
					url: '/product/mini/cart',
					dataType:'json',
					success:function(response){

						$('span[id="cartSubTotal"]').text(response.cartTotal);
						$('#cartQty').text(response.cartQty);

						var miniCart = ""

						$.each(response.carts, function(key,value){
							miniCart += `
								<div class="cart-item product-summary">
									<div class="row">
										<div class="col-xs-4">
											<div class="image">
												<a href="detail.html"><img src="/${value.options.image}" alt=""></a>
											</div>
										</div>
										<div class="col-xs-7">
											<h3 class="name"><a href="index8a95.html?page-detail">${value.name}</a></h3>
											<div class="price">$${value.price} * ${value.qty}</div>
										</div>
										<div class="col-xs-1 action">
										<button type="submit" id="${value.rowId}" onclick="miniCartRemove(this.id)"><i class="fa fa-trash"></i></button>
										</div>
									</div>
								</div>
								<div class="clearfix"></div>

								<hr>

							`
							
						});

						$('#miniCart').html(miniCart);
					}
				})
			}
			miniCart();
			/// mini cart product add end

			/// mini cart remove start
			function miniCartRemove(rowId){
				$.ajax({
					type:'GET',
					url: '/minicart/product-remove/'+rowId,
					dataType:'json',
					success:function(data){

						miniCart();
						
						//  start sweet alert message
						const Toast = Swal.mixin({
							toast: true,
							position: 'top-end',
							showConfirmButton: false,
							timer: 3000
						})
						if($.isEmptyObject(data.error)){
							Toast.fire({
								type: 'success',
								title: data.success
							})
						}else{
							Toast.fire({
								type: 'error',
								title: data.error
							})
						}
						//  end sweet alert message

					}
				})
			}
			// mini cart remove end
		</script>
		<!-- =============== Mini Cart End ==================== -->


		<!-- =============== Wishlist Page Start ==================== -->
		<script>
			// wishlist product add start
			function addToWishlist(product_id){
				$.ajax({
					type: "POST",
					dataType: 'json',
					url: "{{ url('/add-to-wishlist/') }}/"+product_id,
					success:function(data){

						//  start sweet alert message
						const Toast = Swal.mixin({
							toast: true,
							position: 'top-end',
							showConfirmButton: false,
							timer: 3000
						})
						if($.isEmptyObject(data.error)){
							Toast.fire({
								type: 'success',
								title: data.success
							})
						}else{
							Toast.fire({
								type: 'error',
								title: data.error
							})
						}
						//  end sweet alert message
					}
				})
			}
			// wishlist product add end

			// wishlist page product show start
			function wishlist(){
				$.ajax({
					type:'GET',
					url: "{{ url('/user/get-wishlist-product') }}",
					dataType:'json',
					success:function(response){

						var rows = ""

						$.each(response, function(key,value){
							rows += `
								<tr>
									<td class="col-md-2"><img src="/${value.product.product_thambnail}" alt="imga"></td>
									<td class="col-md-7">
										<div class="product-name"><a href="#">${value.product.product_name}</a></div>
										<div class="price">
										${value.product.discount_price == null
											? `$${value.product.selling_price}`
											:
											`$${value.product.discount_price} <span>$${value.product.selling_price}</span>`
										}
										</div>
									</td>
									<td class="col-md-2">
										<button class="btn-upper btn btn-primary" type="button" title="Add Cart" data-toggle="modal" data-target="#cartModal" id="${value.product_id}" onclick="productView(this.id)">Add to cart</button>
									</td>
									<td class="col-md-1 close-btn">
										<button type="submit" class="" id="${value.id}" onclick="wishlistRemove(this.id)" ><i class="fa fa-times"></i></button>
									</td>
								</tr>
							`
						});

						$('#wishlist').html(rows);
					}
				})
			}
			wishlist();
			// wishlist page product show end

			// wishlist product remove start
			function wishlistRemove(id){
				$.ajax({
					type:'GET',
					url: "{{ url('/user/wishlist-remove/') }}/"+id,
					dataType:'json',
					success:function(data){

						wishlist();
						
						//  start message
						const Toast = Swal.mixin({
							toast: true,
							position: 'top-end',
							showConfirmButton: false,
							timer: 3000
						})
						if($.isEmptyObject(data.error)){
							Toast.fire({
								type: 'success',
								title: data.success
							})
						}else{
							Toast.fire({
								type: 'error',
								title: data.error
							})
						}
						//  end message
					}
				});
			}
			// wishlist product remove end
		</script>
		<!-- =============== Wishlist Page End ==================== -->


		<!-- ================= Cart Page Start ====================== -->
		<script>

			// get cart product show start
			function cart(){
				$.ajax({
					type:'GET',
					url: "{{ url('/get-cart-product') }}",
					dataType:'json',
					success:function(response){
						
					var rows = ""

					$.each(response.carts, function(key,value){
						rows += `<tr>
							<td class="col-md-2"><img src="/${value.options.image}" alt="imga" style="height:60px; width:60px;"></td>
							<td class="col-md-2">
								<div class="product-name"><strong>${value.name}</strong></div>
								<strong>
								$${value.price}
								</strong>
							</td>
							<td class="col-md-2">
								<strong>${value.options.color}</strong>
							</td>
							<td class="col-md-2">
								${value.options.size == null
									? `<span >......</span>`
									:
									`<strong>${value.options.size}</strong>`
								}
							</td>
							<td class="col-md-2">

								${value.qty > 1
								? 
									` <button type="submit" class="btn btn-success btn-sm" id="${value.rowId}" onclick="cartDecrement(this.id)">-</button>`
								: 
									` <button type="submit" class="btn btn-success btn-sm" disabled>-</button>`
								}  

								<input type="text" value="${value.qty}" min="1" max="100" disabled style="width:25px;">
								<button type="submit" id="${value.rowId}" onclick="cartIncrement(this.id)" class="btn btn-danger btn-sm">+</button>

							</td>
							<td class="col-md-1">
								<strong>$${value.subtotal}</strong>
							</td>
							<td class="col-md-1 close-btn">
								<button type="submit" class="" id="${value.rowId}" onclick="cartRemove(this.id)" ><i class="fa fa-times"></i></button>
							</td>
						</tr>`
					});
					$('#cartPage').html(rows);
					}
				})
			}
			cart();
			// get cart product show end

			// cart remove start
			function cartRemove(id){
				$.ajax({
					type:'GET',
					url: "{{ url('/cart-remove/') }}/"+id,
					dataType:'json',
					success:function(data){

						cart();
						miniCart();
						couponCalculation();
						
						$('#coupon_name').val('');
						$('#couponField').show();

						//  start sweet alert message
						const Toast = Swal.mixin({
							toast: true,
							position: 'top-end',
							showConfirmButton: false,
							timer: 3000
						})
						if($.isEmptyObject(data.error)){
							Toast.fire({
								type: 'success',
								title: data.success
							})
						}else{
							Toast.fire({
								type: 'error',
								title: data.error
							})
						}
						//  end sweet alert message

					}
				});
			}
			// cart remove end

			// cart increment start
			function cartIncrement(rowId) {
				$.ajax({
					type: 'GET',
					url: "{{ url('/cart-increment/') }}/" + rowId,
					dataType: 'json',
					success: function(data) {
						couponCalculation();
						cart();
						miniCart();
					}
				});
			}
			// cart increment end

			// cart deccrement start
			function cartDecrement(rowId) {
				$.ajax({
					type: 'GET',
					url: "{{ url('/cart-decrement/') }}/" + rowId,
					dataType: 'json',
					success: function(data) {
						couponCalculation();
						cart();
						miniCart();
					}
				});
			}
			// cart deccrement end

		</script>
		<!-- ================= Cart Page End ====================== -->


		<!-- ===================== Coupon Page Start =============== -->
		<script>

			// Coupon apply Start
			function applyCoupon(){
				var coupon_name = $('#coupon_name').val();
				$.ajax({
					type:'POST',
					dataType:'json',
					data: { coupon_name:coupon_name},
					url: "{{ url('/coupon-apply') }}",
					success:function(data){
						couponCalculation();

						// $('#couponField').css("display","none");
						// $('#couponField').hide();
						
						if (data.validity == true) {
							$('#couponField').hide();
						}
						
						//  start sweet alert message
						const Toast = Swal.mixin({
							toast: true,
							position: 'top-end',
							showConfirmButton: false,
							timer: 3000
						})
						if($.isEmptyObject(data.error)){
							Toast.fire({
								type: 'success',
								title: data.success
							})
						}else{
							$('#coupon_name').val('');
							Toast.fire({
								type: 'error',
								title: data.error
							})
						}
						//  end sweet alert message
					}
				});
			}
			// Coupon apply end

			//coupon calculation start
			function couponCalculation(){
				$.ajax({
					type:'GET',
					url: "{{ url('/coupon-calculation') }}",
					dataType:'json',
					success:function(data){
						if (data.total) {
							$('#couponCalField').html(`
								<tr>
									<th>
										<div class="cart-sub-total">
											Subtotal = <span class="inner-left-md">$${data.total}</span>
										</div>
										<div class="cart-grand-total">
											Grand Total = <span class="inner-left-md">$${data.total}</span>
										</div>
									</th>
								</tr>
							`)
						}else{
							$('#couponCalField').html(`
								<tr>
									<th>
										<div class="cart-sub-total">
											Subtotal = <span class="inner-left-md">$${data.subtotal}</span>
										</div>
										<div class="cart-sub-total">
											Coupon = <span class="inner-left-md">${data.coupon_name} </span>
											<button type="submit" onclick="couponRemove()"><i class="fa fa-times"></i></button>
										</div>
										<div class="cart-sub-total">
											Discount Amount = <span class="inner-left-md">$${data.discount_amount}</span>
										</div>
										<div class="cart-grand-total">
											Grand Total = <span class="inner-left-md">$${data.total_amount}</span>
										</div>
									</th>
								</tr>
							`)
						}
					}
				});
			}
			couponCalculation();
			//coupon calculation end

			//remove coupon start
			function couponRemove(){
				$.ajax({
					type:'GET',
					url: "{{ url('/coupon-remove') }}",
					dataType:'json',
					success:function(data){

						$('#couponField').show();
						// $('#couponField').css("display","");
						
						$('#coupon_name').val('');
						//  start message

						couponCalculation();

						//  start sweet alert message
						const Toast = Swal.mixin({
							toast: true,
							position: 'top-end',
							showConfirmButton: false,
							timer: 3000
						})
						if($.isEmptyObject(data.error)){
							Toast.fire({
							type: 'success',
							title: data.success
							})
						}else{
							Toast.fire({
								type: 'error',
								title: data.error
							})
						}
						//  end sweet alert message
					}
				});
			}
			//remove coupon end

		</script>
		<!-- ===================== Coupon Page End =============== -->
		

		<!-- ================= SSLCommerz Payment Method Default Script Start =============== -->
		<script>
			var obj = {};
			obj.cus_name = $('#customer_name').val();
			obj.cus_phone = $('#mobile').val();
			obj.cus_email = $('#email').val();
			obj.cus_addr1 = $('#address').val();
			obj.amount = $('#total_amount').val();
			
			// custom
			obj.post_code = $('#post_code').val();
			obj.division_id = $('#division_id').val();
			obj.district_id = $('#district_id').val();
			obj.state_id = $('#state_id').val();
			obj.notes = $('#notes').val();

			$('#sslczPayBtn').prop('postdata', obj);
			(function (window, document) {
				var loader = function () {
					var script = document.createElement("script"), tag = document.getElementsByTagName("script")[0];
					// script.src = "https://seamless-epay.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7); // USE THIS FOR LIVE
					script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7); // USE THIS FOR SANDBOX
					tag.parentNode.insertBefore(script, tag);
				};
				window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
			})(window, document);
		</script>
		<script>
			(function (window, document) {
				var loader = function () {
					var script = document.createElement("script"), tag = document.getElementsByTagName("script")[0];
					script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7);
					tag.parentNode.insertBefore(script, tag);
				};
				window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
			})(window, document);
		</script>
		<!-- ================= SSLCommerz Payment Method Default Script End =============== -->

		<!-- ================= Search Start =============== -->
		<script>
			$("body").on("keyup", "#search", function() {
				let searchData = $("#search").val();
				if (searchData.length > 0) {
					$.ajax({
						type: 'POST',
						url: "{{ url('/find-products') }}",
						data: {
							search: searchData
						},
						success: function(result) {
							$('#suggestProduct').html(result)
						}
					});
				}

				if (searchData.length < 1) $('#suggestProduct').html("");
			})
    	</script>

		<script>
			function showSearchResult() {
				$('#suggestProduct').slideDown();
			}

			function hideSearchResult() {
				$('#suggestProduct').slideUp();
			}
    	</script>
		<!-- ================= Search End =============== -->
	</body>
</html>