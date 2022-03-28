@extends('layouts.admin')
@section('title')
    Contact Information
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-success">
                <div class="card-header">
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i> Update Contact Information </h4>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ url('admin/general/contactinformation/update') }}" class="form-horizontal">
                        @csrf
                        <div class="row">
                            <div class="col-6 mb-3">
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><i class="mdi mdi-phone"></i><span class="require_star">*</span></span>
                                    <input type="text" name="phone1" class="form-control" id="inlineFormInputGroupUsername" value="{{ $data->ci_phone1 }}">
                                    <input type="hidden" name="id" class="form-control" id="inlineFormInputGroupUsername" value="{{ $data->ci_id }}">
                                    <input type="hidden" name="slug" class="form-control" id="inlineFormInputGroupUsername" value="{{ $data->ci_slug }}">
                                    @error('phone1')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6 mb-3">
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><i class="mdi mdi-phone"></i><span class="require_star">*</span></span>
                                    <input type="text" name="phone2" class="form-control" id="inlineFormInputGroupUsername" value="{{ $data->ci_phone2 }}">
                                    @error('phone2')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6 mb-3">
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><i class="mdi mdi-phone"></i></span>
                                    <input type="text" name="phone3" class="form-control" id="inlineFormInputGroupUsername" value="{{ $data->ci_phone3 }}">
                                </div>
                            </div>
                            <div class="col-6 mb-3">
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><i class="mdi mdi-phone"></i></span>
                                    <input type="text" name="phone4" class="form-control" id="inlineFormInputGroupUsername" value="{{ $data->ci_phone4 }}">
                                </div>
                            </div>
                            <div class="col-6 mb-3">
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><i class="mdi mdi-email"></i></span>
                                    <input type="text" name="email1" class="form-control" id="inlineFormInputGroupUsername" value="{{ $data->ci_email1 }}">
                                </div>
                            </div>
                            <div class="col-6 mb-3">
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><i class="mdi mdi-email"></i></span>
                                    <input type="text" name="email2" class="form-control" id="inlineFormInputGroupUsername" value="{{ $data->ci_email2 }}">
                                </div>
                            </div>
                            <div class="col-6 mb-3">
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><i class="mdi mdi-email"></i></span>
                                    <input type="text" name="email3" class="form-control" id="inlineFormInputGroupUsername" value="{{ $data->ci_email3 }}">
                                </div>
                            </div>
                            <div class="col-6 mb-3">
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><i class="mdi mdi-email"></i></span>
                                    <input type="text" name="email4" class="form-control" id="inlineFormInputGroupUsername" value="{{ $data->ci_email4 }}">
                                </div>
                            </div>
                            <div class="col-6 mb-3">
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><i class="mdi mdi-home"></i></span>
                                    <input type="text" name="add1" class="form-control" id="inlineFormInputGroupUsername" value="{{ $data->ci_add1 }}">
                                </div>
                            </div>
                            <div class="col-6 mb-3">
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><i class="mdi mdi-home"></i></span>
                                    <input type="text" name="add2" class="form-control" id="inlineFormInputGroupUsername" value="{{ $data->ci_add2 }}">
                                </div>
                            </div>
                            <div class="col-6 mb-3">
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><i class="mdi mdi-home"></i></span>
                                    <input type="text" name="add3" class="form-control" id="inlineFormInputGroupUsername" value="{{ $data->ci_add3 }}">
                                </div>
                            </div>
                            <div class="col-6 mb-3">
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><i class="mdi mdi-home"></i></span>
                                    <input type="text" name="add4" class="form-control" id="inlineFormInputGroupUsername" value="{{ $data->ci_add4 }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-dark waves-effect waves-light">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div> <!-- end col -->
    </div>

    
@endsection