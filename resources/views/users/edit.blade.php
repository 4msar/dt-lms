@extends('layouts.app')
@section('pageTitle', 'Edit Books')

@push('breadcrumbs')
<ol class="breadcrumb text-right">
    <li><a href="{{ route('home') }}">Dashboard</a></li>
    <li><a href="{{ route('books.index') }}">Books</a></li>
    <li class="active">Edit Books</li>
</ol>
@endpush

@section('content')
<div class="animated fadeIn">
    <div class="buttons">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <strong>Edit Book</strong>
                        <small> edit a book...</small>
                    </div>
                    <div class="card-body card-block">
                        @include('layouts.message')
                        <form action="{{ route('books.update', ['book'=>$book->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="form-group">
                                <label class="form-control-label" for="name">Book Name</label>
                                <input class="form-control" id="name" placeholder="Enter book name" type="text" name="book_name" value="{{ $book->book_name }}" required="">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="author">Book Author Name</label>
                                <input class="form-control" id="author" placeholder="Enter book author" type="text" name="author_name" value="{{ $book->author_name }}" required="">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="category">Book Category</label>
                                <select name="category_id" id="category" class="form-control">
                                    <option value="">Select Category</option>
                                    @foreach($categories as $category)
                                    <option {{ $book->category_id == $category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="owner_id">Book Owner</label>
                                <select name="owner_id" id="owner_id" class="form-control">
                                    <option value="">Select User</option>
                                    @foreach($users as $user)
                                    <option {{ $book->owner_id == $user->id ? 'selected' : '' }} value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label" for="image">Image</label>
                                <input class="form-control" name="image" id="image" type="file" accept="image/*">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="hub_id">Branch</label>
                                <select name="hub_id" id="hub_id" class="form-control">
                                    <option value="">Select Branch</option>
                                    @foreach($branches as $hub)
                                    <option {{ $book->hub_id == $hub->id ? 'selected' : '' }} value="{{ $hub->id }}">{{ $hub->address }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="quantity">Book Quantity</label>
                                <input class="form-control" id="quantity" placeholder="Enter book quantity" type="number" name="quantity" value="{{ $book->quantity }}" required="">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="status">Book Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="1">Available</option>
                                    <option value="0">Not Available</option>
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