@extends('layouts.admin')
@section('title')
    Coupon
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-success">
                <div class="card-header">
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i> Add Coupon </h4>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('coupon.insert') }}" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-md-3 control-label col-form-label"> Coupon Name<span class="require_star">*</span></label>
                            <div class="col-md-9">
                                <input type="text" name="coupon_name" class="form-control" placeholder="Enter coupon name" value="{{ old('coupon_name') }}">
                                @error('coupon_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 control-label col-form-label"> coupon Discount (%)<span class="require_star">*</span></label>
                            <div class="col-md-9">
                                <input type="text" name="coupon_discount" class="form-control" placeholder="Enter coupon discount" value="{{ old('coupon_discount') }}">
                                @error('coupon_discount')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 control-label col-form-label">Coupon Validity Date<span class="require_star">*</span></label>
                            <div class="col-md-9">
                                <input type="date" name="coupon_validity" class="form-control" placeholder="Enter coupon validaty time" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}" value="{{ old('coupon_validity') }}">
                                @error('coupon_validity')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-dark registration-btn">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card card-outline-success">
                <div class="card-header">
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i> All Coupon</h4>
                </div>
                <div class="card-body">
                    <table id="alltableinfo" class="table table-bordered table-striped table-hover custom_table">
                        <thead>
                            <tr>
                                <th>Coupon Name</th>
                                <th>Coupon Discount</th>
                                <th>Coupon Validity Date</th>
                                <th>Coupon Status</th>
                                <th>Manage</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($coupons as $coupon)
                                <tr>
                                    <td>{{ $coupon->coupon_name }}</td>
                                    <td>{{ $coupon->coupon_discount }}</td>
                                    <td>{{ $coupon->coupon_validity }}</td>
                                    <td>
                                        @if ($coupon->coupon_validity >= Carbon\Carbon::now()->format('Y-m-d'))
                                            <span class="badge badge-pill badge-success">Valid</span>
                                        @else
                                            <span class="badge badge-pill badge-danger">Invalid</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn-success view-icon" href="{{ url('admin/coupon/view/'.$coupon->coupon_slug) }}"><i class="mdi mdi-library-plus"></i></a>
                                        <a class="btn-warning edit-icon" href="{{ url('admin/coupon/edit/'.$coupon->coupon_slug) }}"><i class="mdi mdi-table-edit"></i></a>
                                        <a class="btn-danger delete-icon" id="softDelete" data-toggle="modal" data-target="#softDelModal" data-id="{{$coupon->id}}" href="#"><i class="mdi mdi-delete"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!--delete modal code start -->
    <div id="softDelModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form method="post" action="{{ route('coupon.softdelete') }}">
            @csrf
            <div class="modal-content">
                <div class="modal-header modal_header_title">
                    <h5><i class="mdi mdi-gamepad-circle"></i> Confirm Message</h5>
                </div>
                <div class="modal-body modal_card">
                    <input type="hidden" name="modal_id" id="modal_id" />
                    Are you want to sure delete this data?
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger waves-effect">Confirm</button>
                    <button type="button" class="btn btn-info waves-effect" data-dismiss="modal">Close</button>
                </div>
            </div>
            </form>
        </div>
    </div>
@endsection





