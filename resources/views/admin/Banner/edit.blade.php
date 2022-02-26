@extends('layouts.admin')
@section('title')
    Banner Edit
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-info">
                <div class="card-header">
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i>Banner Update Information</h4>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('banner.update') }}" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                            <input type="hidden" name="id" class="form-control" value="{{ $data->id }}">
                            <input type="hidden" name="slug" class="form-control" value="{{ $data->ban_slug }}">
                            <input type="hidden" name="old_image" class="form-control" value="{{ $data->ban_image }}">

                        <div class="form-group row">
                            <label class="col-md-3 control-label col-form-label"> Banner Title<span class="require_star">*</span></label>
                            <div class="col-md-9">
                                <input type="text" name="ban_title" class="form-control" value="{{ $data->ban_title }}">
                                @error('ban_title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 control-label col-form-label"> Banner Subtitle<span class="require_star">*</span></label>
                            <div class="col-md-9">
                                <input type="text" name="ban_subtitle" class="form-control" value="{{ $data->ban_subtitle }}">
                                @error('ban_subtitle')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 control-label col-form-label"> Banner Description<span class="require_star">*</span></label>
                            <div class="col-md-9">
                                <input type="text" name="ban_description" class="form-control" value="{{ $data->ban_description }}">
                                @error('ban_description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 control-label col-form-label"> Banner Button<span class="require_star">*</span></label>
                            <div class="col-md-9">
                                <input type="text" name="ban_button" class="form-control" value="{{ $data->ban_button }}">
                                @error('ban_button')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 control-label col-form-label"> Banner Url<span class="require_star">*</span></label>
                            <div class="col-md-9">
                                <input type="text" name="ban_url" class="form-control" value="{{ $data->ban_url }}">
                                @error('ban_url')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 control-label col-form-label"> Banner Image<span class="require_star">*</span></label>
                            <div class="col-md-9">
                                <img class="card-img-top" src="{{ asset($data->ban_image) }}" alt="Card image cap" style="height: 150px; width:150px;">
                                <input type="file" name="ban_image" class="form-control" onchange="mainThambUrl(this)">
                                @error('ban_image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <img src="" id="mainThmb">
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





