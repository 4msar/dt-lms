@extends('layouts.auth')
@section('pageTitle', 'Forget password')

@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-4">
            <div class="login-content card">
                <div class="login-form">
                    <h4>Forget password</h4>

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
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

                        <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Send Password Reset Link</button>
                        <div class="register-link m-t-15 text-center">
                            <p><a href="{{ route('login') }}"> Login Here</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
