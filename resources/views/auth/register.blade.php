@extends('layouts.app')

@section('content')
<div class="limiter">
  <div class="p-l-20 p-r-30 p-t-25 p-b-20">
    <form class="login100-form validate-form" method="POST" action="{{ route('register') }}">
        @csrf
        <span class="login100-form-title p-b-30">Sign Up</span>
        
		<div class="wrap-input100">
			<span class="label-input100">Full Name</span>
			<input class="input100 @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name') }}" placeholder="Name...">
			<span class="focus-input100"></span>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
		</div>

		<div class="wrap-input100">
			<span class="label-input100">Email</span>
			<input class="input100 @error('email') is-invalid @enderror" type="text" name="email" value="{{ old('email') }}" placeholder="Email addess...">
			<span class="focus-input100"></span>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
		</div>

		<div class="wrap-input100">
			<span class="label-input100">Username</span>
			<input class="input100 @error('username') is-invalid @enderror" type="text" name="username" value="{{ old('username') }}" placeholder="Username...">
			<span class="focus-input100"></span>
            @error('username')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
		</div>

		<div class="wrap-input100">
			<span class="label-input100">Password</span>
			<input class="input100 @error('password') is-invalid @enderror" type="password" name="password" placeholder="*************">
			<span class="focus-input100"></span>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
		</div>

		<div class="wrap-input100">
			<span class="label-input100">Repeat Password</span>
			<input class="input100" type="password" name="password_confirmation" placeholder="*************">
			<span class="focus-input100"></span>
		</div>

		<div class="container-login100-form-btn">
			<div class="wrap-login100-form-btn">
				<div class="login100-form-bgbtn"></div>
					<button type="submit" class="login100-form-btn">Sign Up</button>
			</div>
            <span>Already have an account? </span>
            <a href="{{ route('login') }}" class="dis-block txt3 hov1  p-t-10 p-b-10 ">
                Sign in<i class="fa fa-long-arrow-right m-l-5"></i>
            </a>
		</div>
	</form>
  </div>	
</div>
@endsection