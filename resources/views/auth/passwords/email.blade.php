@extends('layouts.auth')
@section('pageTitle', 'Forget password')

@section('content')

@if (session('status'))
    <div class="alert alert-success mt-3 mb-3" role="alert">
        {{ session('status') }}
    </div>
@endif

<form method="POST" action="{{ route('password.email') }}">
    @csrf
    <div class="form-group">
        <label for="email">Email Address</label>
        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Enter email address" required>
        @if ($errors->has('email'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
        @endif
    </div>

    <button type="submit" class="btn btn-primary btn-flat mb-4">Send Password Reset Link</button>
    <div class="register-link m-t-15 text-center">
        <p><a href="{{ route('login') }}"> Login Here</a></p>
    </div>
</form>

@endsection
