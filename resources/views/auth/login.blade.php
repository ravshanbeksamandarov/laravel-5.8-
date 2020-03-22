<!DOCTYPE html>
<html lang="en">
<head>
	<title>Kirish</title>
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
						Sign In
					</span>
				</div>

                    <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
                        @csrf

					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">E-Mail</span>
						{{-- <input class="input100" type="text" name="username" placeholder="Enter username"> --}}
                        <input id="email" class="input100" type="email" placeholder="Enter E-Mail" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        <span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						{{-- <input class="input100" type="password" name="pass" > --}}
                        <input id="password" class="input100" type="password" placeholder="Enter password" @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        <span class="focus-input100"></span>

                        <div class="flex-sb-m w-full p-b-30">
                            <div class="contact100-form-checkbox">
                                {{-- <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                                <label class="label-checkbox100" for="ckb1">
                                    Remember me
                                </label> --}}
                                <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="label-checkbox100" for="ckb1" for="remember">
                                    {{ __('Remember Me') }}
                                </label>

                            </div>
                                <div>
                                    @if (Route::has('password.request'))
                                    <a class="txt1" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                    @endif
                                </div>
                            </div>
                        <div class="container-login100-form-btn">
                            <button type="submit" class="login100-form-btn">
                                  {{ __('Login') }}
                            </button>
                            <button type="submit" class="login100-form-btn">
                               <a href="{{ route('register') }}"> {{ __('Register') }} </a>
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
@extends('layouts.admin', ['title'=> 'Kirish'])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">

                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">

                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}


