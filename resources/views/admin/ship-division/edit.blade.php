@extends('layouts.admin')
@section('title')
    Division Edit
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-info">
                <div class="card-header">
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i>Division Update Information</h4>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('division.update') }}" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                            <input type="hidden" name="id" class="form-control" value="{{ $data->id }}">
                            <input type="hidden" name="slug" class="form-control" value="{{ $data->division_slug }}">

                        <div class="form-group row">
                            <label class="col-md-3 control-label col-form-label"> Division Name<span class="require_star">*</span></label>
                            <div class="col-md-9">
                                <input type="text" name="division_name" class="form-control" value="{{ $data->division_name }}">
                                @error('division_name')
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





