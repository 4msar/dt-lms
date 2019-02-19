@extends('layouts.app')
@section('pageTitle', 'Reservation')

@push('breadcrumbs')
<ol class="breadcrumb text-right">
    <li><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="active">Reservation</li>
</ol>
@endpush

@section('content')
<div class="animated fadeIn">
    <div class="reservation">
        <div class="row">
            <div class="col-md-12">
                @include('layouts.message')
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Reservation List</strong>
                    </div>
                    <div class="table-stats order-table ov-h ">
                        <table class="table ">
                            <thead>
                                <tr>
                                    <th class="serial">#</th>
                                    <th>Book Name</th>
                                    <th>Book Author</th>
                                    <th>Take By</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($reservations as $reservation)
                                <tr>
                                    <td class="serial">{{ $loop->iteration }}</td>
                                    <td> {{ $reservation->book->book_name }} </td>
                                    <td> {{ $reservation->book->author_name }} </td>
                                    <td> {{ $reservation->take_by->name }}</td>
                                    <td>
                                        @if(auth()->user()->ucan('reservation', ['show', 'edit', 'delete']))
                                        <form onsubmit="return confirm('Do you really want to delete?');" action="{{ route('reservation.destroy', ['reservation' => $reservation->id]) }}" method="POST">
                                            @if(auth()->user()->ucan('reservation', 'show'))
                                                <a class="btn btn-success btn-sm" href="{{ route('reservation.show', ['reservation' => $reservation->id]) }}"><i class="fa fa-eye"></i></a>
                                            @endif
                                            @if(auth()->user()->ucan('reservation', 'edit'))
                                                <a class="btn btn-info btn-sm" href="{{ route('reservation.edit', ['reservation' => $reservation->id]) }}"><i class="fa fa-edit"></i></a>
                                            @endif
                                            @if(auth()->user()->ucan('reservation', 'destroy'))
                                                @csrf
                                                {{ method_field('DELETE') }}
                                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                            @endif
                                        </form>
                                        @endif
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
                {{ $reservations->links() }}
            </div>
        </div><!-- .row -->
    </div> <!-- .buttons -->
</div><!-- .animated -->

@endsection