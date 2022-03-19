@extends('layouts.admin')
@section('title')
    Edit Role
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-8 m-auto">
            <div class="card card-outline-success">
                <div class="card-header">
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i> Edit Role </h4>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('role.update') }}" class="form-horizontal">
                        @csrf
                        <div class="form-group row">
                            <label class="control-label text-right col-md-3"> Role Name<span class="require_star">*</span></label>
                            <div class="col-md-7">
                                <input type="hidden" name="id" class="form-control" value="{{ $role->id }}">
                                <input type="text" name="name" class="form-control" value="{{ $role->name }}">
                                @error('name')
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





