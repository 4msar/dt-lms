@extends('layouts.auth')
@section('pageTitle', 'Login')

@section('content')

<form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="form-group">
        <label for="email">Email address</label>
        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>
        @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
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
    <div class="checkbox">
        <label>
            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
        </label>
        @if (Route::has('password.request'))
        <label class="float-right">
            <a href="{{ route('password.request') }}">
                Forgot Your Password?
            </a>
        </label>
        @endif

    </div>
    <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Sign in</button>
    <div class="pb-3"></div>
    <div class="register-link m-t-15 text-center">
        <p>Don't have account ? <a href="{{ route('register') }}"> Sign Up Here</a></p>
    </div>
</form>

@endsection
