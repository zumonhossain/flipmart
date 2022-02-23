@extends('layouts.website')

@section('content')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="home.html">Home</a></li>
                    <li class='active'>Reset Password</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="body-content">
        <div class="container">
            <div class="sign-in-page">
                <div class="row">
                    <div class="col-md-12 col-sm-12 create-new-account">
                        <h4 class="checkout-subtitle">Forgate Password</h4>
                        <form method="POST" action="{{ route('password.email') }}" class="register-form outer-top-xs" role="form">
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
                            <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Send Password Reset Link</button>
                            <a href="{{ route('login') }}" class="forgot-password pull-right"><span style="border-bottom:1px solid;font-weight:bold;">Return to login</span></a>
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

