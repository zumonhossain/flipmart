@forelse($products as $product)
    <div class="category-product-inner wow fadeInUp">
        <div class="products">				
            <div class="product-list product">
                <div class="row product-list-row">
                    <div class="col col-sm-4 col-lg-4">
                        <div class="product-image">
                            <div class="image">
                                <img src="{{ asset($product->product_thambnail) }}" alt="">
                            </div>
                        </div><!-- /.product-image -->
                    </div><!-- /.col -->
                    <div class="col col-sm-8 col-lg-8">
                        <div class="product-info">
                            <h3 class="name"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug) }}">{{ $product->product_name }}</a></h3>
                            <div class="rating rateit-small"></div>
                            <div class="product-price">	
                                <span class="price">{{ $product->selling_price }}</span>
                                <span class="price-before-discount">{{ $product->discount_price }}</span>						
                            </div><!-- /.product-price -->
                            <div class="description m-t-10">
                                {!! $product->short_description !!}
                            </div>
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
                        </div><!-- /.product-info -->	
                    </div><!-- /.col -->
                </div><!-- /.product-list-row -->

                @php
                    $amount = $product->selling_price - $product->discount_price;
                    $discount = ( $amount/$product->selling_price) * 100;
                @endphp	

                <div class="tag new">
                    @if ($product->discount_price == NULL)
                        <span> new </span>
                    @else
                        <span> {{ round($discount) }}% </span>
                    @endif
                </div>        
            </div><!-- /.product-list -->
        </div><!-- /.products -->
    </div><!-- /.category-product-inner -->
@empty
    <div class="text-danger" style="font-size:35px;text-align:center;margin-bottom: 50px;font-weight: bold;">
        No Product Found
    </div>

@endforelse