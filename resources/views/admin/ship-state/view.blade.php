@extends('layouts.admin')
@section('title')
    State View
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-info">
                <div class="card-header">
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i>State View Information</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <table class="table table-bordered dt-responsive nowrap">
                                <tr>
                                    <td>Division Name</td>
                                    <td>:</td>
                                    <td>{{ $state->division->division_name }}</td>
                                </tr>
                                <tr>
                                    <td>District Name</td>
                                    <td>:</td>
                                    <td>{{ $state->district->district_name }}</td>
                                </tr>
                                <tr>
                                    <td>State Name</td>
                                    <td>:</td>
                                    <td>{{ $state->state_name }}</td>
                                </tr>
                                <tr>
                                    <td>Created Date</td>
                                    <td>:</td>
                                    <td>{{ $state->created_at->format('Y-m-d') }}</td>
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





