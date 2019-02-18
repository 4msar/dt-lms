@extends('layouts.app')
@section('pageTitle', 'Users')

@push('breadcrumbs')
<ol class="breadcrumb text-right">
    <li><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="active">Users</li>
</ol>
@endpush

@section('content')
<div class="animated fadeIn">
    <div class="books-list">
        <div class="row">
            <div class="col-md-12">
                @include('layouts.message')
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Users List</strong>
                    </div>
                    <div class="table-stats order-table ov-h ">
                        <table class="table ">
                            <thead>
                                <tr>
                                    <th class="serial">#</th>
                                    <th class="avatar">Avatar</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Work at</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($users as $user)
                                <tr>
                                    <td class="serial">{{ $loop->iteration }}</td>
                                    <td class="avatar">
                                        <div class="round-img">
                                            <img src="{{ route('image', ['type'=>'user', 'id'=>$user->id]) }}" alt="{{ $user->user_name }}">
                                        </div>
                                    </td>
                                    <td>{{ $user->name }} </td>
                                    <td>{{ $user->email }} </td>
                                    <td>{{ ucfirst($user->role) }}</td>
                                    <td>{{ ($user->work_at != null ? $user->work_at : '---' ) }}</td>
                                    <td>
                                        <form onsubmit="return confirm('Do you really want to delete?');" action="{{ route('users.destroy', ['user'=>$user->id]) }}" method="POST">
                                            <div class="btn-group">
                                                <a class="btn btn-primary btn-sm" href="{{ route('users.show', ['user'=>$user->id]) }}"><i class="fa fa-eye"></i></a>
                                                <a class="btn btn-info btn-sm" href="{{ route('users.edit', ['user'=>$user->id]) }}"><i class="fa fa-edit"></i></a>
                                                @csrf
                                                {{ method_field('DELETE') }}
                                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td class="text-center" colspan="7">Not Found!!</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div> <!-- /.table-stats -->
                </div>
                {{ $users->links() }}
            </div>
        </div><!-- .row -->
    </div> <!-- .buttons -->
</div><!-- .animated -->

@endsection