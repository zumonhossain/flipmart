@extends('layouts.admin')
@section('title')
    Image Change
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-success">
                <div class="card-header">
                    <h4 class="user-registration"><i class="mdi mdi-account-circle"></i> My Profile </h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 m-auto">
                            @include('admin.profile.includes.my-profile-sidebar')
                        </div>
                        <div class="col-md-7 m-auto">
                            <div class="">
                                <h3 class="text-center"> <span class="text-danger">Hi..!</span> <strong class="text-warning">{{ Auth::user()->name }}</strong> Update Your profile</h3>
                                <form action="{{ route('image.update') }}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <input type="hidden" name="old_image" value="{{ Auth::user()->image }}">

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Image</label>
                                        <input type="file" name="image" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                        @error('image')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-danger">Upload</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection