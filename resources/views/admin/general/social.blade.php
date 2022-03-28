@extends('layouts.admin')
@section('title')
    Social Media
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-success">
                <div class="card-header">
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i> Update Social Media Information </h4>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ url('admin/general/social/update') }}" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-6 mb-3">
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><i class="mdi mdi-facebook"></i><span class="require_star">*</span></span>
                                    <input type="text" name="facebook" class="form-control" id="inlineFormInputGroupUsername" value="{{ $data->sm_facebook }}">
                                    <input type="hidden" name="id" class="form-control" id="inlineFormInputGroupUsername" value="{{ $data->sm_id }}">
                                    <input type="hidden" name="slug" class="form-control" id="inlineFormInputGroupUsername" value="{{ $data->sm_slug }}">
                                    @error('facebook')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6 mb-3">
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><i class="mdi mdi-twitter"></i><span class="require_star">*</span></span>
                                    <input type="text" name="twitter" class="form-control" id="inlineFormInputGroupUsername" value="{{ $data->sm_twitter }}">
                                    @error('twitter')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6 mb-3">
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><i class="mdi mdi-linkedin"></i></span>
                                    <input type="text" name="linkedin" class="form-control" id="inlineFormInputGroupUsername" value="{{ $data->sm_linkedin }}">
                                </div>
                            </div>
                            <div class="col-6 mb-3">
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><i class="mdi mdi-google"></i></span>
                                    <input type="text" name="google" class="form-control" id="inlineFormInputGroupUsername" value="{{ $data->sm_google }}">
                                </div>
                            </div>
                            <div class="col-6 mb-3">
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><i class="mdi mdi-pinterest"></i></span>
                                    <input type="text" name="pinterest" class="form-control" id="inlineFormInputGroupUsername" value="{{ $data->sm_pinterest }}">
                                </div>
                            </div>
                            <div class="col-6 mb-3">
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><i class="mdi mdi-youtube-play"></i></span>
                                    <input type="text" name="youtube" class="form-control" id="inlineFormInputGroupUsername" value="{{ $data->sm_youtube }}">
                                </div>
                            </div>
                            <div class="col-6 mb-3">
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><i class="mdi mdi-vimeo"></i></span>
                                    <input type="text" name="vimeo" class="form-control" id="inlineFormInputGroupUsername" value="{{ $data->sm_vimeo }}">
                                </div>
                            </div>
                            <div class="col-6 mb-3">
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><i class="mdi mdi-instagram"></i></span>
                                    <input type="text" name="instagram" class="form-control" id="inlineFormInputGroupUsername" value="{{ $data->sm_instagram }}">
                                </div>
                            </div>
                            <div class="col-6 mb-3">
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><i class="mdi mdi-whatsapp"></i></span>
                                    <input type="text" name="whatsapp" class="form-control" id="inlineFormInputGroupUsername" value="{{ $data->sm_whatsapp }}">
                                </div>
                            </div>
                            <div class="col-6 mb-3">
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><i class="mdi mdi-skype"></i></span>
                                    <input type="text" name="skype" class="form-control" id="inlineFormInputGroupUsername" value="{{ $data->sm_skype }}">
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