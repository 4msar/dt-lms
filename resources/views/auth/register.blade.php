@extends('layouts.auth')
@section('pageTitle', 'Register')

@section('content')

<form method="POST" action="{{ route('register') }}">
    @csrf
    <div class="form-group">
        <label for="name">Full Name</label>
        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="Enter Name" required autofocus>
        @if ($errors->has('name'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
        @endif
    </div>
    <div class="form-group">
        <label for="email">Email Address</label>
        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Enter email address" required>
        @if ($errors->has('email'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
        @endif
    </div>
    <div class="form-group">
        <label for="username">Username</label>
        <input id="username" type="email" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" placeholder="Enter user name" required>
        @if ($errors->has('username'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('username') }}</strong>
        </span>
        @endif
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" required>
        @if ($errors->has('password'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group">
        <label for="password-confirm">Confirm Password</label>
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm password" required>
    </div>

    <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Sign up</button>
    <div class="pb-2"></div>
    <div class="social-login-content">
        <div class="social-button">
            <a href="{{ route('social', 'facebook') }}" class="btn social facebook btn-addon"><i class="ti-facebook"></i>Sign up with facebook</a>
            <a href="{{ route('social', 'linkedin') }}" class="btn social linkedin btn-addon mt-2"><i class="ti-linkedin"></i>Sign up with linkedin</a>
            <a href="{{ route('social', 'google') }}" class="btn social google btn-addon mt-2"><i class="ti-google"></i>Sign up with google</a>
        </div>
    </div>
    <div class="register-link m-t-15 text-center">
        <p>Already have an account? <a href="{{ route('login') }}"> Login Here</a></p>
    </div>
</form>

@endsection
