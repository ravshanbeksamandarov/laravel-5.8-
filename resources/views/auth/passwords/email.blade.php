<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V15</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="/dashboard2/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/dashboard2/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/dashboard2/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/dashboard2/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/dashboard2/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/dashboard2/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/dashboard2/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/dashboard2/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/dashboard2/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/dashboard2/css/util.css">
	<link rel="stylesheet" type="text/css" href="/dashboard2/css/main.css">
<!--===============================================================================================-->
</head>
<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(/dashboard2/images/bg-01.jpg);">
					<span class="login100-form-title-1">
						Reset Password
					</span>
				</div>

                    <form class="login100-form validate-form" method="POST" action="{{ route('password.email') }}">
                        @csrf

					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">E-Mail Address</span>
						{{-- <input class="input100" type="text" name="username" placeholder="Enter username"> --}}
                        <input id="email" type="email" placeholder="E-Mail Address" class="input100 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        <span class="focus-input100"></span>
                    </div>

                        <div class="container-login100-form-btn">
                            <button type="submit" class="login100-form-btn">
                                {{ __('Send Password Reset Link') }}
                            </button>
                        </div>
                    </form>
			</div>
		</div>
	</div>

<!--===============================================================================================-->
	<script src="/dashboard2/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="/dashboard2/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="/dashboard2/vendor/bootstrap/js/popper.js"></script>
	<script src="/dashboard2/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="/dashboard2/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="/dashboard2/vendor/daterangepicker/moment.min.js"></script>
	<script src="/dashboard2/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="/dashboard2/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="/dashboard2/js/main.js"></script>

</body>
</html>
{{--


@extends('layouts.app', ['title'=> "Parolni tiklash"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
