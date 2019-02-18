@extends('layouts.app')
@section('pageTitle', 'View Book')

@push('breadcrumbs')
<ol class="breadcrumb text-right">
    <li><a href="{{ route('home') }}">Dashboard</a></li>
    <li><a href="{{ route('books.index') }}">Book</a></li>
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
                        <strong class="card-title">View Book</strong>
                        <div class="float-right">
                            <a href="{{ route('books.index') }}" class="btn btn-info btn-sm">Back</a>
                        </div>
                    </div>
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <td>Book Name</td>
                                <td>:</td>
                                <td>{{ $book->book_name }}</td>
                            </tr>
                            <tr>
                                <td>Book Author</td>
                                <td>:</td>
                                <td>{{ $book->author_name }}</td>
                            </tr>
                            <tr>
                                <td>Book Category</td>
                                <td>:</td>
                                <td>{{ $book->category->name }}</td>
                            </tr>
                            <tr>
                                <td>Book Owner</td>
                                <td>:</td>
                                <td>{{ $book->owner->name }}</td>
                            </tr>
                            <tr>
                                <td>Branch</td>
                                <td>:</td>
                                <td>{{ $book->hub->address }}</td>
                            </tr>
                            <tr>
                                <td>Quantity</td>
                                <td>:</td>
                                <td>{{ $book->quantity }}</td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>:</td>
                                <td><span class="badge badge-{{ $book->status == 1 ? 'success' : 'warning' }}">{{ $book->status == 1 ? 'Available' : 'Not Available' }}</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        Book Image
                    </div>
                    <div class="card-body">
                        <img src="{{ route('image', ['type'=>'books', 'id'=>$book->id]) }}" alt="{{ $book->book_name }}">
                    </div>
                </div>
            </div>
        </div><!-- .row -->
    </div> <!-- .buttons -->
</div><!-- .animated -->

@endsection