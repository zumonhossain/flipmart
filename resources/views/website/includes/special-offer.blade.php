<div class="sidebar-widget outer-bottom-small wow fadeInUp">
	<h3 class="section-title">Special Offer</h3>
	<div class="sidebar-widget-body outer-top-xs">
		<div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
			@foreach($special_offers as $product)
				<div class="item">
					<div class="products special-product">

						@php
							$special_offerProduct = App\Models\Product::where('special_offer',1)->where('product_status',1)->orderBy('id','DESC')->limit(3)->get();
						@endphp 
						
						@foreach($special_offerProduct as $product)
							<div class="product">
								<div class="product-micro">
									<div class="row product-micro-row">
										<div class="col col-xs-5">
											<div class="product-image">
												<div class="image">
													<a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug) }}"><img src="{{ asset($product->product_thambnail) }}" alt=""></a>					
												</div><!-- /.image -->
											</div><!-- /.product-image -->
										</div><!-- /.col -->
										<div class="col col-xs-7">
											<div class="product-info">
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
											</div>
										</div><!-- /.col -->
									</div><!-- /.product-micro-row -->
								</div><!-- /.product-micro -->	
							</div>
						@endforeach
					</div>
				</div>
			@endforeach
		</div>
	</div><!-- /.sidebar-widget-body -->
</div><!-- /.sidebar-widget -->