@extends('layouts.admin')
@section('title')
    Basic
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-success">
                <div class="card-header">
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i> Update Basic Information </h4>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ url('admin/general/basic/update') }}" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3 row">
                            <label for="example-text-input" class="col-md-2 col-form-label">Title <span class="require_star">*</span></label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="title" value="{{ $data->basic_title }}">
                                <input class="form-control" type="hidden" name="id" value="{{ $data->basic_id }}">
                                <input class="form-control" type="hidden" name="slug" value="{{ $data->basic_slug }}">
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="example-text-input" class="col-md-2 col-form-label">Subtitle</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="subtitle" value="{{ $data->basic_subtitle }}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="example-text-input" class="col-md-2 col-form-label">Details</label>
                            <div class="col-md-10">
                                <textarea class="form-control" rows="3" name="details">{{ $data->basic_details }}</textarea>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="example-text-input" class="col-md-2 col-form-label">Admin Logo <span class="require_star">*</span></label>
                            <div class="col-sm-3">
                                <input type="file" class="" name="pic">
                            </div>
                            <div class="col-sm-2">
                                @if($data->basic_pic!='')
                                    <img class="img-thumbnail img-fluid img100" src="{{asset('uploads/basic/'.$data->basic_pic)}}" alt="pic"/>
                                @else
                                    <img class="img-thumbnail img-fluid img100" src="{{asset('uploads/basic/avatar.png')}}" alt="pic"/>
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="example-text-input" class="col-md-2 col-form-label">Logo <span class="require_star">*</span></label>
                            <div class="col-sm-3">
                                <input type="file" class="" name="logo">
                            </div>
                            <div class="col-sm-2">
                                @if($data->basic_logo!='')
                                    <img class="img-thumbnail img-fluid img100" src="{{asset('uploads/basic/'.$data->basic_logo)}}" alt="logo"/>
                                @else
                                    <img class="img-thumbnail img-fluid img100" src="{{asset('uploads/basic/avatar.png')}}" alt="logo"/>
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="example-text-input" class="col-md-2 col-form-label">Favicon <span class="require_star">*</span></label>
                            <div class="col-sm-3">
                                <input type="file" class="" name="favicon">
                            </div>
                            <div class="col-sm-2">
                                @if($data->basic_favicon!='')
                                    <img class="img-thumbnail img-fluid img100" src="{{asset('uploads/basic/'.$data->basic_favicon)}}" alt="favicon"/>
                                @else
                                    <img class="img-thumbnail img-fluid img100" src="{{asset('uploads/basic/avatar.png')}}" alt="favicon"/>
                                @endif
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