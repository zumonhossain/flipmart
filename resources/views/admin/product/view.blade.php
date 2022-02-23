@extends('layouts.admin')
@section('title')
    Product View
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-info">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8 card_top_title user-registration">
                            <i class="fa fa-gg-circle"></i> View Product Information
                        </div>
                        <div class="col-md-4 text-right">
                            <a href="{{route('product.manage')}}" class="btn btn-sm btn-dark card_top_btn"><i class="fa fa-plus-circle"></i> All Product</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <table class="table table-bordered dt-responsive nowrap">
                                <tr>
                                    <td>Brand Name</td>
                                    <td>:</td>
                                    <td>{{$data->brand->brand_name}}</td>
                                </tr>
                                <tr>
                                    <td>Category Name</td>
                                    <td>:</td>
                                    <td>{{$data->category->category_name}}</td>
                                </tr>
                                <tr>
                                    <td>Sub Category Name</td>
                                    <td>:</td>
                                    <td>{{$data->subcategory->subcategory_name}}</td>
                                </tr>
                                <tr>
                                    <td>Sub SubCategory Name</td>
                                    <td>:</td>
                                    <td>{{$data->subsubcategory->subsubcategory_name}}</td>
                                </tr>
                                <tr>
                                    <td>Product Name</td>
                                    <td>:</td>
                                    <td>{{$data->product_name}}</td>
                                </tr>
                                <tr>
                                    <td>Product Code</td>
                                    <td>:</td>
                                    <td>{{$data->product_code}}</td>
                                </tr>
                                <tr>
                                    <td>Product Quantity</td>
                                    <td>:</td>
                                    <td>{{$data->product_qty}}</td>
                                </tr>
                                <tr>
                                    <td>Product Tags</td>
                                    <td>:</td>
                                    <td>{{$data->product_tags}}</td>
                                </tr>
                                <tr>
                                    <td>Product Size</td>
                                    <td>:</td>
                                    <td>{{$data->product_size}}</td>
                                </tr>
                                <tr>
                                    <td>Product Color</td>
                                    <td>:</td>
                                    <td>{{$data->product_color}}</td>
                                </tr>
                                <tr>
                                    <td>Selling Price</td>
                                    <td>:</td>
                                    <td>{{$data->selling_price}}</td>
                                </tr>
                                <tr>
                                    <td>Discount Price</td>
                                    <td>:</td>
                                    <td>{{$data->discount_price}}</td>
                                </tr>
                                <tr>
                                    <td>Short Description</td>
                                    <td>:</td>
                                    <td>{{ Str::words($data->short_description,5) }}</td>
                                </tr>
                                <tr>
                                    <td>Long Description</td>
                                    <td>:</td>
                                    <td>{{ Str::words($data->long_description,5) }}</td>
                                </tr>
                                <tr>
                                    <td>Hot Deals</td>
                                    <td>:</td>
                                    <td>
                                        @if ($data->hot_deals == 1)
                                            <span class="badge badge-pill badge-success">Publish</span>
                                        @else
                                            <span class="badge badge-pill badge-danger">Unpublish</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>featured</td>
                                    <td>:</td>
                                    <td>
                                        @if ($data->featured == 1)
                                            <span class="badge badge-pill badge-success">Publish</span>
                                        @else
                                            <span class="badge badge-pill badge-danger">Unpublish</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Special Offer</td>
                                    <td>:</td>
                                    <td>
                                        @if ($data->special_offer == 1)
                                            <span class="badge badge-pill badge-success">Publish</span>
                                        @else
                                            <span class="badge badge-pill badge-danger">Unpublish</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Special Deals</td>
                                    <td>:</td>
                                    <td>
                                        @if ($data->special_deals == 1)
                                            <span class="badge badge-pill badge-success">Publish</span>
                                        @else
                                            <span class="badge badge-pill badge-danger">Unpublish</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Main Thambnail</td>
                                    <td>:</td>
                                    <td>
                                        <img src="{{ asset($data->product_thambnail) }}" alt="" style="height: 60px; width:60px;">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Multi Image</td>
                                    <td>:</td>
                                    <td>
                                        @foreach ($multiImgs as $img)
                                            <img class="card-img-top" src="{{ asset($img->photo_name) }}" alt="Card image cap" style="height: 50px; width:50px;">
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td>Product Creator</td>
                                    <td>:</td>
                                    <td>{{$data->product_creator}}</td>
                                </tr>
                                <tr>
                                    <td>Created Date</td>
                                    <td>:</td>
                                    <td>{{ $data->created_at->format('Y-m-d') }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection





