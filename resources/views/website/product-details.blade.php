@extends('layouts.website')
@section('title')
    {{ $product->product_name }}
@endsection 

@section('meta')
    <meta property="og:title" content="{{ $product->product_name }}" />
    <meta property="og:url" content="{{ Request::fullUrl() }}" />
    <meta property="og:image" content="{{ URL::to($product->product_thambnail) }}" />
    <meta property="og:description" content="{{ $product->short_description }}" />
    <meta property="og:site_name" content="Flipmart" />
@endsection

@section('content')
    <div id="app">
        <div class="breadcrumb">
            <div class="container">
                <div class="breadcrumb-inner">
                    <ul class="list-inline list-unstyled">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li class='active'>Product Details</li>
                    </ul>
                </div><!-- /.breadcrumb-inner -->
            </div><!-- /.container -->
        </div><!-- /.breadcrumb -->
        <div class="body-content outer-top-xs">
            <div class='container'>
                <div class='row single-product'>
                    <div class='col-md-3 sidebar'>
                        <div class="sidebar-module-container">
                            <div class="home-banner outer-top-n">
                                <img src="{{ asset('contents/website') }}/assets/images/banners/LHS-banner.jpg" alt="Image">
                            </div>		
            
                            <!-- ============ HOT DEALS START ============= -->
                                @include('website.includes.hot-deals')
                            <!-- ============ HOT DEALS END ============= -->

                            </div>

                            <!-- ============= NEWSLETTER ============= -->
                                @include('website.includes.newsletter')
                            <!-- ============= NEWSLETTER: END ============= -->

                            <!-- ============= Testimonials============= -->
                                @include('website.includes.testimonials')
                            <!-- ============= Testimonials: END ============= -->

                            </div>
                        </div><!-- /.sidebar -->

                    <div class='col-md-9'>
                        <div class="detail-block">
                            <div class="row  wow fadeInUp">
                                <div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
                                    <div class="product-item-holder size-big single-product-gallery small-gallery">
                                        <div id="owl-single-product">

                                            @foreach ($multiImgs as $img)
                                                <div class="single-product-gallery-item" id="slide{{ $img->id }}">
                                                    <a data-lightbox="image-1" data-title="Gallery" href="{{ asset($img->photo_name) }}">
                                                        <img class="img-responsive" alt="" src="{{ asset($img->photo_name) }}" data-echo="{{ asset($img->photo_name) }}" />
                                                    </a>
                                                </div><!-- /.single-product-gallery-item -->
                                            @endforeach

                                        </div><!-- /.single-product-slider -->

                                        <div class="single-product-gallery-thumbs gallery-thumbs">
                                            <div id="owl-single-product-thumbnails">

                                                @foreach ($multiImgs as $img)
                                                    <div class="item">
                                                        <a class="horizontal-thumb active" data-target="#owl-single-product" data-slide="{{ $img->id }}" href="#slide{{ $img->id }}">
                                                            <img class="img-responsive" width="85" alt="" src="{{ asset($img->photo_name) }}" data-echo="{{ asset($img->photo_name) }}" />
                                                        </a>
                                                    </div>
                                                @endforeach

                                            </div><!-- /#owl-single-product-thumbnails -->

                                        </div><!-- /.gallery-thumbs -->
                                    </div><!-- /.single-product-gallery -->
                                </div><!-- /.gallery-holder -->        			
                                <div class='col-sm-6 col-md-7 product-info-block'>
                                    <div class="product-info">
                                        <h1 id="pname" class="name">{{ $product->product_name }}</h1>
                                        
                                        <div class="rating-reviews m-t-20">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        <span style="color: #fdd922" class="glyphicon glyphicon-star{{ $i <= $avgRating ? '' : '-empty' }}"></span>
                                                    @endfor
                                                    <h4 style="color:red;"><b>5 / {{ $avgRating }}</b></h4>
                                                </div>
                                                <div class="col-sm-8">
                                                    <div class="reviews">
                                                        <a href="#" class="lnk">({{ count($reviewProducts) }} Reviews)</a>
                                                    </div>
                                                </div>
                                            </div><!-- /.row -->		
                                        </div><!-- /.rating-reviews -->

                                        <div class="stock-container info-container m-t-10">
                                            <div class="row">
                                                <div class="col-sm-2">
                                                    <div class="stock-box">
                                                        <span class="label">Availability :</span>
                                                    </div>	
                                                </div>
                                                <div class="col-sm-9">
                                                    <div class="stock-box">
                                                        <span class="value">In Stock</span>
                                                    </div>	
                                                </div>
                                            </div><!-- /.row -->	
                                        </div><!-- /.stock-container -->

                                        <div class="description-container m-t-20">
                                            {!! $product->short_description !!}
                                        </div><!-- /.description-container -->

                                        <div class="price-container info-container m-t-20">
                                            <div class="row">
                                                <div class="col-sm-6">

                                                    @auth
                                                        <send-message 

                                                            :receiver-id="{{ $product->user_id }}" 
                                                            receiver-name="{{ $product->user->name }}"
                                                            :product-id="{{ $product->id }}"
                                                        
                                                        >

                                                        </send-message>
                                                    @else
                                                        <h4 class="text-danger" style="font-size:12px">Chat This Seller To <a style="color:green;" href="{{ route('login') }}" target="_blank">Login</a> Your Account</h4>
                                                    @endauth

                                                    <div class="price-box">
                                                        @if ($product->discount_price == NULL)
                                                            <span class="price">${{ $product->selling_price }}</span>
                                                        @else
                                                            <span class="price">${{ $product->discount_price }}</span>
                                                            <span class="price-strike">${{ $product->selling_price }}</span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="favorite-button m-t-10">
                                                <!-- =========== Product Share Start =========== -->
                                                        <div class="sharethis-inline-share-buttons" data-href="{{ Request::url() }}"></div>
                                                    <!-- =========== Product Share End =========== -->
                                                    </div>
                                                </div>

                                            </div><!-- /.row -->
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    @if ($product->product_color == null)

                                                    @else
                                                        <div class="form-group">
                                                            <label for="color">Select Color</label>
                                                            <select class="form-control" id="color">
                                                                @foreach ($product_color as $color)
                                                                    <option value="{{ $color }}">{{ ucwords($color) }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="col-sm-6">
                                                    @if ($product->product_size == null)

                                                    @else
                                                        <div class="form-group">
                                                            <label for="size">Select Size</label>
                                                            <select class="form-control" id="size">
                                                                @foreach ($product_size as $size)
                                                                    <option value="{{ $size }}">{{ ucwords($size) }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div><!-- /.row -->
                                        </div><!-- /.price-container -->

                                        <div class="quantity-container info-container">
                                            <div class="row">
                                                
                                                <div class="col-sm-2">
                                                    <span class="label">Qty :</span>
                                                </div>
                                                
                                                <div class="col-sm-2">
                                                    <div class="cart-quantity">
                                                        <div class="quant-input">
                                                            <div class="arrows">
                                                                <div class="arrow plus gradient"><span class="ir"><i class="icon fa fa-sort-asc"></i></span></div>
                                                                <div class="arrow minus gradient"><span class="ir"><i class="icon fa fa-sort-desc"></i></span></div>
                                                            </div>
                                                            <input type="number" class="form-control" id="qty" value="1" min="1">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-7">
                                                    <input type="hidden" id="product_id" value="{{ $product->id }}">
                                                    <button type="submit" class="btn btn-danger" onclick="addToCart()">Add To Cart</button>
                                                </div>
                                            </div><!-- /.row -->
                                        </div><!-- /.quantity-container -->
                                    </div><!-- /.product-info -->
                                </div><!-- /.col-sm-7 -->
                            </div><!-- /.row -->
                        </div>
                        
                        <div class="product-tabs inner-bottom-xs  wow fadeInUp">
                            <div class="row">
                                <div class="col-sm-3">
                                    <ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
                                        <li class="active"><a data-toggle="tab" href="#description">DESCRIPTION</a></li>
                                        <li><a data-toggle="tab" href="#review">REVIEW</a></li>
                                        <li><a data-toggle="tab" href="#tags">Comments</a></li>
                                    </ul><!-- /.nav-tabs #product-tabs -->
                                </div>
                                <div class="col-sm-9">
                                    <div class="tab-content">
                                        <div id="description" class="tab-pane in active">
                                            <div class="product-tab">
                                                <p class="text">{!! $product->long_description !!}</p>
                                            </div>	
                                        </div><!-- /.tab-pane -->

                                        <div id="review" class="tab-pane">
                                            <div class="product-tab">		
                                                @foreach ($reviewProducts as $review)				
                                                    <div class="product-reviews">
                                                        <h4 class="title">{{ $review->user->name }}</h4>
                                                        <div class="reviews">
                                                            <div class="review">
                                                                <div class="review-title">
                                                                    <span class="summary">
                                                                        @for ($i = 1; $i <= 5; $i++)
                                                                            <span style="color: #fdd922"
                                                                                class="glyphicon glyphicon-star{{ $i <= $review->rating ? '' : '-empty' }}"></span>
                                                                        @endfor
                                                                    </span>
                                                                    <span class="date">
                                                                        <i class="fa fa-calendar"></i>
                                                                        <span>{{ $review->created_at->diffForHumans() }}</span>
                                                                    </span>
                                                                </div>
                                                                <div class="text">{{ $review->comment }}</div>
                                                            </div>
                                                        </div><!-- /.reviews -->
                                                    </div><!-- /.product-reviews -->
                                                @endforeach
                                            </div><!-- /.product-tab -->
                                        </div><!-- /.tab-pane -->

                                        <div id="tags" class="tab-pane">
                                            <div class="product-tag">

                                                <!-- ========= Facebook Comments Start =========== -->
                                                    <div class="fb-comments" data-href="{{ Request::url() }}" data-numposts="10"></div>
                                                <!-- ========= Facebook Comments Start =========== -->

                                            </div><!-- /.product-tab -->
                                        </div><!-- /.tab-pane -->

                                    </div><!-- /.tab-content -->
                                </div><!-- /.col -->
                            </div><!-- /.row -->
                        </div><!-- /.product-tabs -->

                            <!-- ========== Upsell Product Start =========== -->
                            @include('website.includes.upsell-product')
                            <!-- ========= Upsell Product END =========== -->
                    
                    </div><!-- /.col -->
                    <div class="clearfix"></div>
                </div><!-- /.row -->

                            <!-- ========== BRANDS CAROUSEL =========== -->
                                @include('website.includes.brand')
                            <!-- ========= BRANDS CAROUSEL END =========== -->
                            
            </div><!-- /.container -->
        </div>
    </div>


    <script src="{{ asset('js/app.js') }}" defer></script>
    
    <!-- ========= Facebook Comments Start =========== -->
    <div id="fb-root"></div>

    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v10.0" nonce="ZZuNAuS0"></script>
    <!-- ========= Facebook Comments End =========== -->


    <!-- ========= Social Media Share Start =========== -->
    <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=6233708cf1b1a00019ad9d90&product=inline-share-buttons" data-href="{{ Request::url() }}" async="async"></script>
    <!-- ========= Social Media Share End =========== -->
	
@endsection
