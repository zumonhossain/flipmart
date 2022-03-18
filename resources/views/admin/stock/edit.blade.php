@extends('layouts.admin')
@section('title')
    Stock Management Edit
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <div class="card card-outline-info">
                <div class="card-header">
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i>Edit Stock Information</h4>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ url('admin/product-stock/update') }}" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        
                        <input type="hidden" name="id" class="form-control" value="{{ $product->id }}">

                        <div class="form-group row">
                            <label class="col-md-3 control-label col-form-label"> Product Name<span class="require_star">*</span></label>
                            <div class="col-md-9">
                                <input type="text" name="product_name" class="form-control" value="{{ $product->product_name }}">
                                @error('product_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 control-label col-form-label"> Product Code<span class="require_star">*</span></label>
                            <div class="col-md-9">
                                <input type="text" name="product_code" class="form-control" value="{{ $product->product_code }}">
                                @error('product_code')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 control-label col-form-label"> Product Quantity<span class="require_star">*</span></label>
                            <div class="col-md-9">
                                <input type="text" name="product_qty" class="form-control" value="{{ $product->product_qty }}">
                                @error('product_qty')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-dark registration-btn">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-2"></div>
    </div>
@endsection





