@extends('layouts.admin')
@section('title')
    Product Edit
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-success">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8 card_top_title user-registration">
                            <i class="fa fa-gg-circle"></i> Add Product Information
                        </div>
                        <div class="col-md-4 text-right">
                            <a href="{{route('product.manage')}}" class="btn btn-sm btn-dark card_top_btn"><i class="fa fa-plus-circle"></i> All Product</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('product.update') }}" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" class="form-control" value="{{ $product->id }}">
                        <input type="hidden" name="old_img" value="{{ $product->product_thambnail }}">

                        <div class="row row-sm">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Brand Name<span class="require_star">*</span></label>
                                    <select class="form-control select2-show-search" name="brand_id">
                                        <option value="">-- Select Brand Name --</option>
                                        @foreach($brands as $brand)
                                            <option value="{{ $brand->id }}" {{ $brand->id == $product->brand_id ? 'selected' :'' }}>{{ $brand->brand_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('brand_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>  
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Category Name<span class="require_star">*</span></label>
                                    <select class="form-control select2-show-search" name="category_id">
                                        <option value="">-- Select Category Name --</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' :'' }}>{{ $category->category_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>  
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Sub Category Name<span class="require_star">*</span></label>
                                    <select class="form-control select2-show-search" name="subcategory_id">
                                        <option value="">-- Select SubCat Name --</option>
                                    
                                    </select>
                                    @error('subcategory_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>  
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Sub SubCategory Name<span class="require_star">*</span></label>
                                    <select class="form-control select2-show-search"  name="subsubcategory_id">
                                        <option value="">-- Select Sub SubCat Name --</option>
                                    
                                    </select>
                                    @error('subsubcategory_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>  
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product Name<span class="require_star">*</span></label>
                                    <input class="form-control" type="text" name="product_name" value="{{ $product->product_name }}">
                                    @error('product_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div> 
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product Code<span class="require_star">*</span></label>
                                    <input class="form-control" type="text" name="product_code" value="{{ $product->product_code }}">
                                    @error('product_code')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div> 

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product Quantity<span class="require_star">*</span></label>
                                    <input class="form-control" type="text" name="product_qty" value="{{ $product->product_qty }}">
                                    @error('product_qty')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div> 
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product Tags<span class="require_star">*</span></label>
                                    <input class="form-control" type="text" name="product_tags" value="{{ $product->product_tags }}" data-role="tagsinput"><br>
                                    @error('product_tags')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div> 
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product Size<span class="require_star">*</span></label>
                                    <input class="form-control" type="text" name="product_size" value="{{ $product->product_size }}"  data-role="tagsinput"><br>
                                    @error('product_size')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div> 
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product Color<span class="require_star">*</span></label>
                                    <input class="form-control" type="text" name="product_color" value="{{ $product->product_color }}" data-role="tagsinput"><br>
                                    @error('product_color')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div> 
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Selling Price<span class="require_star">*</span></label>
                                    <input class="form-control" type="text" name="selling_price" value="{{ $product->selling_price }}">
                                    @error('selling_price')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div> 
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Discount Price</label>
                                    <input class="form-control" type="text" name="discount_price" value="{{ $product->discount_price }}">
                                </div>
                            </div> 
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Short Description<span class="require_star">*</span></label>
                                    <textarea name="short_description" id="summernote">{{ $product->short_description }}</textarea>
                                    @error('short_description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div> 
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Long Description<span class="require_star">*</span></label>
                                    <textarea name="long_description" id="summernote2">{{ $product->long_description }}</textarea>
                                    @error('long_description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div> 
                            <div class="col-md-3">
                                <div class="form-check">
                                    <input type="checkbox" name="hot_deals" class="form-check-input" id="exampleCheck1" value="1" {{ $product->hot_deals == 1 ? 'checked': '' }}>
                                    <label class="form-check-label" for="exampleCheck1">Hot Deals</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-check">
                                    <input type="checkbox" name="featured" class="form-check-input" id="exampleCheck2" value="1" {{ $product->featured == 1 ? 'checked': '' }}>
                                    <label class="form-check-label" for="exampleCheck2">Featured</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-check">
                                    <input type="checkbox" name="special_offer" class="form-check-input" id="exampleCheck3" value="1" {{ $product->special_offer == 1 ? 'checked': '' }}>
                                    <label class="form-check-label" for="exampleCheck3">Special Offer</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-check">
                                    <input type="checkbox" name="special_deals" class="form-check-input" id="exampleCheck4" value="1" {{ $product->special_deals == 1 ? 'checked': '' }}>
                                    <label class="form-check-label" for="exampleCheck4">Special Deals</label>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <div class="mt-5 mb-2">
                                        <label class="form-control-label">Main Thambnail<span class="require_star">*</span></label><br>
                                    </div>
                                    <img class="card-img-top" src="{{ asset($product->product_thambnail) }}" alt="Card image cap" style="height: 150px; width:150px;">
                                    <input class="form-control" type="file" name="product_thambnail" onchange="mainThambUrl(this)">
                                    @error('product_thambnail')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <img src="" id="mainThmb">
                                </div>
                            </div> 
                            <div class="col-md-12">
                                <div class="text-center mt-5">
                                    <button type="submit" class="btn btn-dark registration-btn ">Update Product</button>
                                </div>
                            </div>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="category_id"]').on('change', function(){
                var category_id = $(this).val();
                if(category_id) {
                    $.ajax({
                        url: "{{  url('/admin/subcategory/ajax') }}/"+category_id,
                        type:"GET",
                        dataType:"json",
                        success:function(data) {
                        var d =$('select[name="subcategory_id"]').empty();
                            $.each(data, function(key, value){
                                $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="subcategory_id"]').on('change', function(){
                var subcategory_id = $(this).val();
                if(subcategory_id) {
                    $.ajax({
                        url: "{{  url('/admin/subsubcategory/ajax') }}/"+subcategory_id,
                        type:"GET",
                        dataType:"json",
                        success:function(data) {
                        var d =$('select[name="subsubcategory_id"]').empty();
                            $.each(data, function(key, value){
                                $('select[name="subsubcategory_id"]').append('<option value="'+ value.id +'">' + value.subsubcategory_name + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });
        });
    </script>
@endsection





