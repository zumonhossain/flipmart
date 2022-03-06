<div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
	<div class="more-info-tab clearfix ">
	   <h3 class="new-product-title pull-left">New Products</h3>
		<ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
			<li class="active"><a data-transition-type="backSlide" href="#all" data-toggle="tab">All</a></li>
			@php
				$categories = App\Models\Category::where('category_status',1)->orderBy('category_name','ASC')->limit(5)->get();
			@endphp 

			@foreach($categories as $category)
				<li><a data-transition-type="backSlide" href="#category{{ $category->id }}" data-toggle="tab">{{ $category->category_name }}</a></li>
			@endforeach
		</ul><!-- /.nav-tabs -->
	</div>
	<div class="tab-content outer-top-xs">
		<div class="tab-pane in active" id="all">			
			<div class="product-slider">
				<div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">  
					@foreach($products as $product)
						<div class="item item-carousel">
							<div class="products">	
								<div class="product">		
									<div class="product-image">
										<div class="image">
											<a href="#"><img  src="{{ asset($product->product_thambnail) }}" alt=""></a>
										</div><!-- /.image -->	

										@php
											$amount = $product->selling_price - $product->discount_price;
											$discount = ( $amount/$product->selling_price) * 100;
										@endphp	

										<div class="tag new">
											@if ($product->discount_price == NULL)
												<span> new</span>
											@else
												<span>{{ round($discount) }}% </span>
											@endif
										</div>                        		   
									</div><!-- /.product-image -->
									<div class="product-info text-left">
										<h3 class="name"><a href="#">{{ $product->product_name }}</a></h3>
										<div class="rating rateit-small"></div>
										<div class="description"></div>
										<div class="product-price">	
											@if ($product->discount_price == NULL)
												<span class="price">${{ $product->selling_price }}</span>
											@else
												<span class="price">${{ $product->discount_price }}</span>
												<span class="price-before-discount">${{ $product->selling_price }}</span>
											@endif
										</div><!-- /.product-price -->
									</div><!-- /.product-info -->
									<div class="cart clearfix animate-effect">
										<div class="action">
											<ul class="list-unstyled">
												<li class="add-cart-button btn-group">
													<button class="btn btn-primary icon" type="button" title="Add Cart" data-toggle="modal" data-target="#cartModal"  id="{{ $product->id }}" onclick="productView(this.id)">
														<i class="fa fa-shopping-cart"></i>													
													</button>			
												</li>
												<button class="btn btn-primary icon" type="button" title="Add to WIshlist" id="{{ $product->id }}" onclick="addToWishlist(this.id)">
													<i class="icon fa fa-heart"></i>
												</button>
											</ul>
										</div><!-- /.action -->
									</div><!-- /.cart -->
								</div><!-- /.product -->
							</div><!-- /.products -->
						</div><!-- /.item -->
					@endforeach
				</div><!-- /.home-owl-carousel -->
			</div><!-- /.product-slider -->
		</div><!-- /.tab-pane -->
		@foreach($categories as $category)
			<div class="tab-pane" id="category{{ $category->id }}">
				<div class="product-slider">
					<div class="owl-carousel home-owl-carousel custom-carousel owl-theme">   
						@php
							$cateWiseProduct = App\Models\Product::where('product_status',1)->where('category_id',$category->id)->orderBy('id','DESC')->get();
						@endphp  
						@forelse($cateWiseProduct as $product)
							<div class="item item-carousel">
								<div class="products">
									<div class="product">		
										<div class="product-image">
											<div class="image">
												<a href="#"><img  src="{{ asset($product->product_thambnail) }}" alt=""></a>
											</div><!-- /.image -->

											@php
												$amount = $product->selling_price - $product->discount_price;
												$discount = ( $amount/$product->selling_price) * 100;
											@endphp	

											<div class="tag sale">
												@if ($product->discount_price == NULL)
													<span> new </span>
												@else
													<span> {{ round($discount) }}% </span>
												@endif
											</div>            		   
										</div><!-- /.product-image -->
										<div class="product-info text-left">
											<h3 class="name"><a href="#">{{ $product->product_name }}</a></h3>
											<div class="rating rateit-small"></div>
											<div class="description"></div>
											<div class="product-price">	
												<span class="price">{{ $product->selling_price }}</span>
												<span class="price-before-discount">{{ $product->discount_price }}</span>			
											</div><!-- /.product-price -->
										</div><!-- /.product-info -->
										<div class="cart clearfix animate-effect">
											<div class="action">
												<ul class="list-unstyled">
													<li class="add-cart-button btn-group">
														<button class="btn btn-primary icon" data-toggle="dropdown" type="button">
															<i class="fa fa-shopping-cart"></i>													
														</button>
														<button class="btn btn-primary cart-btn" type="button">Add to cart</button>					
													</li>
													<li class="lnk wishlist">
														<a class="add-to-cart" href="detail.html" title="Wishlist">
															<i class="icon fa fa-heart"></i>
														</a>
													</li>
													<li class="lnk">
														<a class="add-to-cart" href="detail.html" title="Compare">
															<i class="fa fa-signal" aria-hidden="true"></i>
														</a>
													</li>
												</ul>
											</div><!-- /.action -->
										</div><!-- /.cart -->
									</div><!-- /.product -->
								</div><!-- /.products -->
							</div><!-- /.item -->
						@empty
							<div class="text-danger" style="font-size:35px;text-align:center;margin-bottom: 50px;font-weight: bold;">
								No Product Found
							</div>
						@endforelse
					</div><!-- /.home-owl-carousel -->
				</div><!-- /.product-slider -->
			</div><!-- /.tab-pane -->
		@endforeach
	</div><!-- /.tab-content -->
</div><!-- /.scroll-tabs -->