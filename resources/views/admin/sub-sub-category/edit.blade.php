@extends('layouts.admin')
@section('title')
    Sub SubCategory Edit
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-info">
                <div class="card-header">
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i>Sub SubCategory Update Information</h4>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('sub-sub-category.update') }}" class="form-horizontal" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="id" class="form-control" value="{{ $subsubcategory->id }}">
                        <input type="hidden" name="slug" class="form-control" value="{{ $subsubcategory->subsubcategory_slug }}">

                        <div class="form-group row">
                            <label class="col-md-3 control-label col-form-label">Category Name<span class="require_star">*</span></label>
                            <div class="col-md-9">
                                <select class="form-control" name="category_id">
                                    <option value="">-- Select Category Name --</option>
                                    @foreach($category as $cat)
                                        <option value="{{ $cat->id }}" {{ $cat->id == $subsubcategory->category_id ? 'selected': '' }}> {{ $cat->category_name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 control-label col-form-label">Sub Category Name<span class="require_star">*</span></label>
                            <div class="col-md-9">
                                <select class="form-control" name="subcategory_id">
                                    <option value="">-- Select SubCategory Name --</option>
                                    @foreach($subcategory as $subcat)
                                        <option value="{{ $subcat->id }}" {{ $subcat->id == $subsubcategory->subcategory_id ? 'selected': '' }}> {{ $subcat->subcategory_name }}</option>
                                    @endforeach
                                </select>
                                @error('subcategory_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 control-label col-form-label"> Sub SubCategory Name<span class="require_star">*</span></label>
                            <div class="col-md-9">
                                <input type="text" name="subsubcategory_name" class="form-control" value="{{ $subsubcategory->subsubcategory_name }}">
                                @error('subsubcategory_name')
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
    </div>
@endsection





