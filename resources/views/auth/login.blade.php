@extends('layouts.website')

@section('content')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="home.html">Home</a></li>
                    <li class='active'>Login</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="body-content">
        <div class="container">
            <div class="sign-in-page">
                <div class="row">
				    <!-- Sign-in -->			
                    <div class="col-md-6 col-sm-6 sign-in">

                        @error('banned')
                            <h3 class="text-danger">{{ $message }}</h3>
                        @enderror
                        
                        <h4 class="">Sign in</h4>
                        <p class="">Hello, Welcome to your account.</p>
                        <div class="social-sign-in outer-top-xs">
                            <a href="{{ route('login.facebook') }}" class="facebook-sign-in"><i class="fa fa-facebook"></i> Sign In with Facebook</a>
                            <a href="{{ route('login.google') }}" class="twitter-sign-in"><i class="fa fa-google"></i> Sign In with Google</a>
                        </div>
                        <form action="{{ route('login') }}" method="POST"  class="register-form outer-top-xs" role="form">
                            @csrf

                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
                                <input type="email" class="form-control unicase-form-control text-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" id="exampleInputEmail1">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputPassword1">Password <span>*</span></label>
                                <input type="password" class="form-control unicase-form-control text-input @error('password') is-invalid @enderror" name="password" id="exampleInputPassword1" >
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="radio outer-xs">
                                <label>
                                    <input type="radio" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>Remember me!
                                </label>
                                <a href="{{ route('password.request') }}" class="forgot-password pull-right"><span style="border-bottom:1px solid;">Forgot your Password?</span></a>
                            </div>
                            <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Login</button>
                        </form>					
                    </div>
                    <!-- Sign-in -->

                    <!-- create a new account -->
                    <div class="col-md-6 col-sm-6 create-new-account">
                        <h4 class="checkout-subtitle">Create a new account</h4>
                        <p class="text title-tag-line">Create your new account.</p>
                        <form method="POST" action="{{ route('register') }}" class="register-form outer-top-xs" role="form">
                            @csrf

                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail2">Email Address <span>*</span></label>
                                <input type="email" class="form-control unicase-form-control text-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Name <span>*</span></label>
                                <input type="text" class="form-control unicase-form-control text-input @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" id="exampleInputEmail1" >
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Phone Number <span>*</span></label>
                                <input type="phone" name="phone" class="form-control unicase-form-control text-input @error('phone') is-invalid @enderror" id="exampleInputEmail1" >
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Password <span>*</span></label>
                                <input type="password" class="form-control unicase-form-control text-input @error('password') is-invalid @enderror" name="password" >
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Confirm Password <span>*</span></label>
                                <input type="password" class="form-control unicase-form-control text-input" name="password_confirmation" >
                            </div>
                            <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Sign Up</button>
                        </form>
                    </div>	
                </div>
            </div>

            <!-- ================= BRANDS CAROUSEL ================== -->
            @include('website.includes.brand')
            <!-- ============== BRANDS CAROUSEL END ================= -->
            
        </div>
    </div>
@endsection

