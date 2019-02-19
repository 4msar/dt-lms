@extends('layouts.app')
@section('pageTitle', 'View User')

@push('breadcrumbs')
<ol class="breadcrumb text-right">
    <li><a href="{{ route('home') }}">Dashboard</a></li>
    <li><a href="{{ route('users.index') }}">User</a></li>
    <li class="active">View</li>
</ol>
@endpush

@section('content')
<div class="animated fadeIn">
    <div class="buttons">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">View User</strong>
                        <div class="float-right">
                            <a href="{{ route('users.index') }}" class="btn btn-info btn-sm">Back</a>
                        </div>
                    </div>
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <td>Full Name</td>
                                <td>:</td>
                                <td>{{ $user->name }}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>:</td>
                                <td>{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <td>Username</td>
                                <td>:</td>
                                <td>{{ $user->username }}</td>
                            </tr>
                            <tr>
                                <td>Mobile Number</td>
                                <td>:</td>
                                <td>{{ $user->mobile_number }}</td>
                            </tr>
                            <tr>
                                <td>Working Status</td>
                                <td>:</td>
                                <td>{{ $user->designation . ($user->work_at != null ? ' in '. $user->work_at : '')  }}</td>
                            </tr>
                            <tr>
                                <td>Mailing Address</td>
                                <td>:</td>
                                <td>{{ $user->mailing_address }}</td>
                            </tr>
                            <tr>
                                <td>Role</td>
                                <td>:</td>
                                <td>{{ ucfirst($user->role) }}</td>
                            </tr>
                            <tr>
                                <td>Linked Social Account</td>
                                <td>:</td>
                                <td> <div class="social-icons" title="Connected">
                                    @if($user->facebook_profile_id)
                                    <i class="fa fa-facebook"></i>
                                    @endif
                                    @if($user->linkedin_profile_id)
                                    <i class="fa fa-linkedin"></i>
                                    @endif
                                    @if($user->google_id)
                                    <i class="fa fa-google-plus"></i>
                                    @endif
                                </div> </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        User Image
                    </div>
                    <div class="card-body">
                        <img class="user-img" src="{{ route('image', ['type'=>'user', 'id'=>$user->id]) }}" alt="{{ $user->name }}">
                    </div>
                </div>
            </div>
        </div><!-- .row -->
    </div> <!-- .buttons -->
</div><!-- .animated -->

@endsection