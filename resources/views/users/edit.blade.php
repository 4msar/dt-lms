@extends('layouts.app')
@section('pageTitle', 'Edit User')

@push('breadcrumbs')
<ol class="breadcrumb text-right">
    <li><a href="{{ route('home') }}">Dashboard</a></li>
    <li><a href="{{ route('users.index') }}">User</a></li>
    <li class="active">Edit User</li>
</ol>
@endpush

@section('content')
<div class="animated fadeIn">
    <div class="buttons">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <strong>Edit User</strong>
                        <small> edit a user...</small>
                    </div>
                    <div class="card-body card-block">
                        @include('layouts.message')
                        <form action="{{ route('users.update', ['user'=>$user->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="form-group">
                                <label class="form-control-label" for="name">User full name</label>
                                <input class="form-control" id="name" placeholder="Enter full name" type="text" name="name" value="{{ $user->name }}" required="">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="username">Username</label>
                                <input class="form-control" id="username" placeholder="Enter username" type="text" value="{{ $user->username }}" readonly="">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="email">Email</label>
                                <input class="form-control" id="email" placeholder="Enter email" type="email" value="{{ $user->email }}" readonly>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="mobile_number">Mobile Number</label>
                                <input class="form-control" id="mobile_number" placeholder="Enter mobile_number" name="mobile_number" type="text" value="{{ $user->mobile_number }}" >
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="designation">Designtion</label>
                                <input class="form-control" name="designation" id="designation" placeholder="Enter designation" type="text" value="{{ $user->designation}}" >
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="work_at">Company Name</label>
                                <input class="form-control" name="work_at" id="work_at" placeholder="Enter company name" type="text" value="{{ $user->work_at }}" >
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="mailing_address">Address</label>
                                <input class="form-control" name="mailing_address" id="mailing_address" placeholder="Enter mailing address" type="text" value="{{ $user->mailing_address }}" >
                            </div>
                            <div class="form-group">
                                <label for="role">User Role</label>
                                <select name="role" id="role" class="form-control">
                                    <option {{ $user->role == 'user' ? 'selected' : '' }} value="user">User</option>
                                    <option {{ $user->role == 'manager' ? 'selected' : '' }} value="manager">Manager</option>
                                    <option {{ $user->role == 'admin' ? 'selected' : '' }} value="admin">Admin</option>
                                </select>
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