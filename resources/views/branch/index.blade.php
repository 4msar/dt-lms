@extends('layouts.app')
@section('pageTitle', 'Branches')

@push('breadcrumbs')
<ol class="breadcrumb text-right">
    <li><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="active">Branches</li>
</ol>
@endpush

@section('content')
<div class="animated fadeIn">
    <div class="buttons">
        <div class="row">
            <div class="col-md-12">
                @include('layouts.message')
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Branches List</strong>
                    </div>
                    <div class="table-stats order-table ov-h ">
                        <table class="table ">
                            <thead>
                                <tr>
                                    <th class="serial">#</th>
                                    <th>Address/Name</th>
                                    <th>Contact Persion</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($branches as $branch)
                                <tr>
                                    <td class="serial">{{ $loop->iteration }}</td>
                                    <td> {{ $branch->address }} </td>
                                    <td> {{ $branch->contact->name }} </td>
                                    <td> {{ $branch->is_open(true) }} Now</td>
                                    <td>
                                        <form onsubmit="return confirm('Do you really want to delete?');" action="{{ route('branches.destroy', ['branch' => $branch->id]) }}" method="POST">
                                            <a class="btn btn-success btn-sm" href="{{ route('branches.show', ['branch' => $branch->id]) }}"><i class="fa fa-eye"></i></a>
                                            <a class="btn btn-info btn-sm" href="{{ route('branches.edit', ['branch' => $branch->id]) }}"><i class="fa fa-edit"></i></a>
                                            @csrf
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
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
                {{ $branches->links() }}
            </div>
        </div><!-- .row -->
    </div> <!-- .buttons -->
</div><!-- .animated -->

@endsection