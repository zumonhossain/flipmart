@extends('layouts.admin')
@section('title')
    Brand View
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-info">
                <div class="card-header">
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i>Brand View Information</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <table class="table table-bordered dt-responsive nowrap">
                                <tr>
                                    <td>Name</td>
                                    <td>:</td>
                                    <td>{{$data->brand_name}}</td>
                                </tr>
                                <tr>
                                    <td>Created Date</td>
                                    <td>:</td>
                                    <td>{{ $data->created_at->format('Y-m-d') }}</td>
                                </tr>
                                <tr>
                                    <td>Image</td>
                                    <td>:</td>
                                    <td>
                                        <img src="{{ asset($data->brand_image) }}" alt="">
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection





