@extends('layouts.admin')
@section('title')
    SubCategory Edit
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-info">
                <div class="card-header">
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i>SubCategory Update Information</h4>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('sub-category.update') }}" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        
                        <input type="hidden" name="id" class="form-control" value="{{ $subcategory->id }}">
                        <input type="hidden" name="subcategory_slug" class="form-control" value="{{ $subcategory->subcategory_slug }}">

                        <div class="form-group row">
                            <label class="col-md-3 control-label col-form-label">Category Name<span class="require_star">*</span></label>
                            <div class="col-md-9">
                                <select class="form-control" name="category_id">
                                    <option value="">-- Select Category Name --</option>
                                    @foreach($category as $cat)
                                        <option value="{{ $cat->id }}" {{ $cat->id == $subcategory->category_id ? 'selected': '' }}> {{ $cat->category_name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 control-label col-form-label"> SubCategory Name<span class="require_star">*</span></label>
                            <div class="col-md-9">
                                <input type="text" name="subcategory_name" class="form-control" value="{{ $subcategory->subcategory_name }}">
                                @error('subcategory_name')
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





