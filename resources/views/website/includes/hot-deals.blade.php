

@php 
	$hot_deals = App\Models\Product::where('hot_deals',1)->where('product_status',1)->where('discount_price','!=',NULL)->orderBy('id','DESC')->get();
@endphp


	<div class="sidebar-widget hot-deals wow fadeInUp outer-bottom-xs outer-top-vs">
		<h3 class="section-title">hot deals</h3>
		<div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">
		@foreach($hot_deals as $product)
			<div class="item">
				<div class="products">
					<div class="hot-deal-wrapper">
						<div class="image">
							<img src="{{ asset($product->product_thambnail) }}" alt="">
						</div>

						@php
							$amount = $product->selling_price - $product->discount_price;
							$discount =  ( $amount/$product->selling_price) * 100;
						@endphp

						<div class="sale-offer-tag">
							@if ($product->discount_price == NULL)
								<span> new</span>
							@else
								<span>{{ round($discount) }}% <br>off</span>
							@endif
						</div>

						<div class="timing-wrapper">
							<div class="box-wrapper">
								<div class="date box">
									<span class="key">120</span>
									<span class="value">DAYS</span>
								</div>
							</div>
							
							<div class="box-wrapper">
								<div class="hour box">
									<span class="key">20</span>
									<span class="value">HRS</span>
								</div>
							</div>

							<div class="box-wrapper">
								<div class="minutes box">
									<span class="key">36</span>
									<span class="value">MINS</span>
								</div>
							</div>

							<div class="box-wrapper hidden-md">
								<div class="seconds box">
									<span class="key">60</span>
									<span class="value">SEC</span>
								</div>
							</div>
						</div>
					</div><!-- /.hot-deal-wrapper -->

					<div class="product-info text-left m-t-20">
						<h3 class="name"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug) }}">{{ $product->product_name }}</a></h3>
						
						@if (App\Models\ProductReview::where('product_id', $product->id)->first())
							@php
								$reviewProducts = App\Models\ProductReview::where('product_id', $product->id)->where('status','approve')->latest()->get();
								$rating = App\Models\ProductReview::where('product_id', $product->id)->where('status','approve')->avg('rating');
								$avgRating = number_format($rating,1);
							@endphp

							@for ($i = 1; $i <= 5; $i++)
								<span style="color: #fdd922" class="glyphicon glyphicon-star{{ $i <= $avgRating ? '' : '-empty' }}"></span>
							@endfor

							({{ count($reviewProducts) }})
							
						@else
							<span class="text-danger">No Review</span>
						@endif

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
							
							<div class="add-cart-button btn-group">
								<button class="btn btn-primary icon" type="button" data-toggle="modal" data-target="#cartModal" id="{{ $product->id }}" onclick="productView(this.id)">
									<i class="fa fa-shopping-cart"></i>													
								</button>
								<button class="btn btn-primary cart-btn" type="button" data-toggle="modal" data-target="#cartModal" id="{{ $product->id }}" onclick="productView(this.id)">Add to cart</button>
														
							</div>
							
						</div><!-- /.action -->
					</div><!-- /.cart -->
				</div>	
			</div>
		@endforeach	  
	</div><!-- /.sidebar-widget -->