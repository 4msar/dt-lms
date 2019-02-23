@extends('layouts.app')
@section('pageTitle', 'View Reservation')

@push('breadcrumbs')
<ol class="breadcrumb text-right">
    <li><a href="{{ route('home') }}">Dashboard</a></li>
    <li><a href="{{ route('reservation.index') }}">Reservation</a></li>
    <li class="active">View</li>
</ol>
@endpush

@section('content')
<div class="animated fadeIn">
    <div class="buttons">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">View Reservation</strong>
                        <div class="float-right">
                            <a href="{{ route('reservation.index') }}" class="btn btn-info btn-sm">Back</a>
                        </div>
                    </div>
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <td>Book Name</td>
                                <td>:</td>
                                <td>{{ $reservation->book->book_name }}</td>
                            </tr>
                            <tr>
                                <td>Book Author</td>
                                <td>:</td>
                                <td>{{ $reservation->book->author_name }}</td>
                            </tr>
                            <tr>
                                <td>Category</td>
                                <td>:</td>
                                <td>{{ $reservation->book->category->name }}</td>
                            </tr>
                            <tr>
                                <td>Book Take by</td>
                                <td>:</td>
                                <td>{{ $reservation->take_by->name }}</td>
                            </tr>
                            <tr>
                                <td>From Branch</td>
                                <td>:</td>
                                <td>{{ $reservation->book->hub->address }}</td>
                            </tr>
                            <tr>
                                <td>Return Date</td>
                                <td>:</td>
                                <td>{{ date('d M Y', strtotime($reservation->return_date)) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        Book Image
                    </div>
                    <div class="card-body">
                        <img src="{{ route('image', ['type'=>'books', 'id'=>$reservation->book->id]) }}" alt="{{ $reservation->book->book_name }}">
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        User Image
                    </div>
                    <div class="card-body">
                        <img src="{{ route('image', ['type'=>'user', 'id'=>$reservation->user_id]) }}" alt="{{ $reservation->take_by->name }}">
                    </div>
                </div>
            </div>
        </div><!-- .row -->
    </div> <!-- .buttons -->
</div><!-- .animated -->

@endsection