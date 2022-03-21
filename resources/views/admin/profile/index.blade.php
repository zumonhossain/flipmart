@extends('layouts.admin')
@section('title')
    My Profile
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
                                <form action="{{ route('profile.update') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Name</label>
                                        <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ Auth::user()->name }}">
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email</label>
                                        <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ Auth::user()->email }}">
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Phone</label>
                                        <input type="text" name="phone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ Auth::user()->phone }}">
                                        @error('phone')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-danger">Update</button>
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