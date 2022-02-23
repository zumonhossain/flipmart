@extends('layouts.admin')
@section('title')
    Category Edit
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-info">
                <div class="card-header">
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i>Category Update Information</h4>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('category.update') }}" class="form-horizontal" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label class="control-label text-right col-md-3"> Category Name<span class="require_star">*</span></label>
                            <div class="col-md-7">
                                <input type="text" name="category_name" class="form-control" value="{{ $data->category_name }}">
                                <input type="hidden" name="category_slug" class="form-control" value="{{ $data->category_slug }}">
                                <input type="hidden" name="id" class="form-control" value="{{ $data->id }}">
                                @error('category_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label text-right col-md-3"> Category Icon<span class="require_star">*</span></label>
                            <div class="col-md-7">
                                <input type="text" name="category_icon" class="form-control" value="{{ $data->category_icon }}">
                                @error('category_icon')
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





