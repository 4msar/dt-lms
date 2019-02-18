@extends('layouts.app')
@section('pageTitle', 'Add Users')

@push('breadcrumbs')
<ol class="breadcrumb text-right">
    <li><a href="{{ route('home') }}">Dashboard</a></li>
    <li><a href="{{ route('users.index') }}">Users</a></li>
    <li class="active">Add Users</li>
</ol>
@endpush

@section('content')
<div class="animated fadeIn">
    <div class="buttons">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <strong>Add User</strong>
                        <small> add a new user...</small>
                    </div>
                    <div class="card-body card-block">
                        @include('layouts.message')
                        <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="form-control-label" for="name">User full name</label>
                                <input class="form-control" id="name" placeholder="Enter full name" type="text" name="name" value="{{ old('name') }}" required="">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="username">Username</label>
                                <input class="form-control" id="username" placeholder="Enter username" type="text" name="username" value="{{ old('username') }}" required="">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="email">Email</label>
                                <input class="form-control" id="email" placeholder="Enter email" type="email" name="email" value="{{ old('email') }}" required="">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" required>
                            </div>
                            <div class="form-group">
                                <label for="password-confirm">Confirm Password</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm password" required>
                            </div>
                            <div class="form-group">
                                <label for="role">User Role</label>
                                <select name="role" id="role" class="form-control">
                                    <option {{ old('role') == 'user' ? 'selected' : '' }} value="user">User</option>
                                    <option {{ old('role') == 'manager' ? 'selected' : '' }} value="manager">Manager</option>
                                    <option {{ old('role') == 'admin' ? 'selected' : '' }} value="admin">Admin</option>
                                </select>
                            </div>
                            <div class="checkbox">
                                <label >
                                    <input type="checkbox" name="email_verify" > Require Email verify
                                </label>
                            </div>

                            <button class="btn btn-success" type="submit">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- .row -->
    </div> <!-- .buttons -->
</div><!-- .animated -->

@endsection