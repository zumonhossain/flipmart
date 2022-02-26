@extends('layouts.admin')
@section('title')
    District Edit
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-success">
                <div class="card-header">
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i> Edit Ship District </h4>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('district.update') }}" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" class="form-control" value="{{ $district->id }}">
                        <input type="hidden" name="slug" class="form-control" value="{{ $district->district_slug }}">

                        <div class="form-group row">
                            <label class="col-md-3 control-label col-form-label"> Division Name<span class="require_star">*</span></label>
                            <div class="col-md-9">
                                <select class="form-control select2-show-search" name="division_id">
                                    <option value="">-- Select Division Name --</option>
                                    @foreach($divisions as $division)
                                        <option value="{{ $division->id }}" {{ $division->id == $district->division_id ? 'selected': '' }}>{{ $division->division_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 control-label col-form-label"> District Name<span class="require_star">*</span></label>
                            <div class="col-md-9">
                                <input type="text" name="district_name" class="form-control" placeholder="Enter district name" value="{{ $district->district_name }}">
                                @error('district_name')
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





