@extends('layouts.admin')
@section('title')
    Banner
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-success">
                <div class="card-header">
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i> Add Banner </h4>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('banner.insert') }}" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-md-3 control-label col-form-label"> Banner Title<span class="require_star">*</span></label>
                            <div class="col-md-9">
                                <input type="text" name="ban_title" class="form-control" value="{{ old('ban_title') }}">
                                @error('ban_title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 control-label col-form-label"> Banner Subtitle<span class="require_star">*</span></label>
                            <div class="col-md-9">
                                <input type="text" name="ban_subtitle" class="form-control" value="{{ old('ban_subtitle') }}">
                                @error('ban_subtitle')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 control-label col-form-label"> Banner Description <span class="require_star">*</span></label>
                            <div class="col-md-9">
                                <input type="text" name="ban_description" class="form-control" value="{{ old('ban_description') }}">
                                @error('ban_description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 control-label col-form-label"> Banner Button <span class="require_star">*</span></label>
                            <div class="col-md-9">
                                <input type="text" name="ban_button" class="form-control" value="{{ old('ban_button') }}">
                                @error('ban_button')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 control-label col-form-label"> Banner Url <span class="require_star">*</span></label>
                            <div class="col-md-9">
                                <input type="text" name="ban_url" class="form-control" value="{{ old('ban_url') }}">
                                @error('ban_url')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 control-label col-form-label"> Banner Image <span class="require_star">*</span></label>
                            <div class="col-md-9">
                                <input type="file" name="ban_image" class="form-control" onchange="mainThambUrl(this)">
                                @error('ban_image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <img src="" id="mainThmb">
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
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i> All Banner</h4>
                </div>
                <div class="card-body">
                    <table id="alltableinfo" class="table table-bordered table-striped table-hover custom_table">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Subtitle</th>
                                <th>Button</th>
                                <th>Url</th>
                                <th>Image</th>
                                <th>Manage</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($banner as $item)
                                <tr>
                                    <td>{{ $item->ban_title }}</td>
                                    <td>{{ Str::words($item->ban_subtitle,2) }}</td>
                                    <td>{{ $item->ban_button }}</td>
                                    <td>{{ Str::words($item->ban_url,3) }}</td>
                                    <td>
                                        <img src="{{ asset($item->ban_image) }}" alt="" style="height: 60px; width:60px;">
                                    </td>
                                    <td>
                                        <a class="btn-success view-icon" href="{{ url('admin/banner/view/'.$item->ban_slug) }}"><i class="mdi mdi-library-plus"></i></a>
                                        <a class="btn-warning edit-icon" href="{{ url('admin/banner/edit/'.$item->ban_slug) }}"><i class="mdi mdi-table-edit"></i></a>
                                        <a class="btn-danger delete-icon" id="softDelete" data-toggle="modal" data-target="#softDelModal" data-id="{{$item->id}}" href="#"><i class="mdi mdi-delete"></i></a>
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
            <form method="post" action="{{ route('banner.softdelete') }}">
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





