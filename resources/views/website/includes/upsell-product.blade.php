<section class="section featured-product wow fadeInUp">
	<h3 class="section-title">Featured products</h3>
	<div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
		@foreach($relatedProducts as $product)
			<div class="item item-carousel">
				<div class="products">
					<div class="product">		
						<div class="product-image">
							<div class="image">
								<a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug) }}"><img  src="{{ asset($product->product_thambnail) }}" alt=""></a>
							</div><!-- /.image -->
							@php
								$amount = $product->selling_price - $product->discount_price;
								$discount =  ( $amount/$product->selling_price) * 100;
							@endphp
							<div class="tag new">
								@if ($product->discount_price == NULL)
									<span>new</span>
								@else
									<span>{{ round($discount) }}%</span>
								@endif
							</div>	   
						</div><!-- /.product-image -->
						<div class="product-info text-left">
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
</section><!-- /.section -->