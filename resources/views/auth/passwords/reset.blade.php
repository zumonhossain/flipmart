@extends('layouts.website')
@section('content')
<!-- ============================================== HEADER : END ============================================== -->
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.html">Home</a></li>
				<li class='active'>Reset Password</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

	<div class="body-content">
		<div class="container">
			<div class="sign-in-page">
				<div class="row">
					<!-- Sign-in -->
					<div class="col-md-12 col-sm-12 sign-in">
						<h4 class="">Forget Password</h4>
						<form class="register-form outer-top-xs" role="form" method="POST" action="{{ route('password.update') }}">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">

							<div class="form-group">
								<label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
								<input type="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" name="email" vvalue="{{ $email ?? old('email') }}" placeholder="email address" >
								@error('email')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							    @enderror
                            </div>

                            <div class="form-group">
								<label class="info-title" for="exampleInputEmail1">Password <span>*</span></label>
								<input type="password" class="form-control unicase-form-control text-input" id="exampleInputEmail1" name="password"  placeholder="password" >
								@error('password')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							    @enderror
                            </div>

                            <div class="form-group">
								<label class="info-title" for="exampleInputEmail1">Confirm Password <span>*</span></label>
								<input type="password" class="form-control unicase-form-control text-input" id="exampleInputEmail1" name="password_confirmation"  placeholder="Retype Password" >
                            </div>

							<button type="submit" class="btn-upper btn btn-primary checkout-page-button">{{ __('Reset Password') }}</button>
							<a href="{{ route('login') }}" class="forgot-password pull-right">Return to login</a>

						</form>
					</div>
					<!-- Sign-in -->
				</div><!-- /.row -->

				</div><!-- /.sigin-in-->

	</div><!-- /.container -->
	</div><!-- /.body-content -->
@endsection