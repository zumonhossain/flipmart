@extends('layouts.admin')
@section('title')
    Brand Edit
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-info">
                <div class="card-header">
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i>Brand Update Information</h4>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('brand.update') }}" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                            <input type="hidden" name="id" class="form-control" value="{{ $data->id }}">
                            <input type="hidden" name="brand_slug" class="form-control" value="{{ $data->brand_slug }}">
                            <input type="hidden" name="old_image" class="form-control" value="{{ $data->brand_image }}">

                        <div class="form-group row">
                            <label class="control-label text-right col-md-3"> Brand Name<span class="require_star">*</span></label>
                            <div class="col-md-7">
                                <input type="text" name="brand_name" class="form-control" value="{{ $data->brand_name }}">
                                @error('brand_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label text-right col-md-3">Brand Image</label>
                            <div class="col-md-4">
                                <input type="file" name="brand_image" value="{{old('brand_image')}}" onchange="mainThambUrl(this)">
                                
                                <br>
                                @error('brand_image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                                <img src="" alt="" id="mainThmb">
                            </div>
                            <div class="col-sm-3">
                                @if($data->brand_image!='')
                                    <img height="100" width="100" src="{{asset($data->brand_image)}}" class="img-thumbail"/>
                                @else
                                    <img height="100" width="100" src="{{asset('uploads/admin/brand/avatar.png')}}"/>
                                @endif
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





