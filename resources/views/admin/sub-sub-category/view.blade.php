@extends('layouts.admin')
@section('title')
    Sub SubCategory View
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-info">
                <div class="card-header">
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i>Sub SubCategory View Information</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <table class="table table-bordered dt-responsive nowrap">
                                <tr>
                                    <td>Category Name</td>
                                    <td>:</td>
                                    <td>{{ $data->category->category_name }}</td>
                                </tr>
                                <tr>
                                    <td>Sub Category Name</td>
                                    <td>:</td>
                                    <td>{{ $data->subcategory->subcategory_name }}</td>
                                </tr>
                                <tr>
                                    <td>Sub SubCategory Name</td>
                                    <td>:</td>
                                    <td>{{ $data->subsubcategory_name }}</td>
                                </tr>
                                <tr>
                                    <td>Created Date</td>
                                    <td>:</td>
                                    <td>{{ $data->created_at->format('Y-m-d') }}</td>
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





