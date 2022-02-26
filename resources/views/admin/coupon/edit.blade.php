@extends('layouts.admin')
@section('title')
    Coupon Edit
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-success">
                <div class="card-header">
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i>Edit Coupon Information </h4>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('coupon.update') }}" class="form-horizontal" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="id" class="form-control" value="{{ $data->id }}">
                        <input type="hidden" name="slug" class="form-control" value="{{ $data->coupon_slug }}">

                        <div class="form-group row">
                            <label class="col-md-3 control-label col-form-label"> Coupon Name<span class="require_star">*</span></label>
                            <div class="col-md-9">
                                <input type="text" name="coupon_name" class="form-control" value="{{ $data->coupon_name }}">
                                @error('coupon_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 control-label col-form-label"> coupon Discount<span class="require_star">*</span></label>
                            <div class="col-md-9">
                                <input type="text" name="coupon_discount" class="form-control" value="{{ $data->coupon_discount }}">
                                @error('coupon_discount')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 control-label col-form-label">Coupon Validity Date<span class="require_star">*</span></label>
                            <div class="col-md-9">
                                <input type="date" name="coupon_validity" class="form-control" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}" value="{{ $data->coupon_validity }}">
                                @error('coupon_validity')
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





