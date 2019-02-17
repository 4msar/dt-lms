@extends('layouts.app')
@section('pageTitle', 'Edit Category')

@push('breadcrumbs')
<ol class="breadcrumb text-right">
    <li><a href="{{ route('home') }}">Dashboard</a></li>
    <li><a href="{{ route('books.index') }}">Books</a></li>
    <li><a href="{{ route('categories.index') }}">Categories</a></li>
    <li class="active">Edit Category</li>
</ol>
@endpush

@section('content')
<div class="animated fadeIn">
    <div class="buttons">
        <div class="row justify-content-center">
            <div class="col-md-6 ">
                <div class="card">
                    <div class="card-header">
                        <strong>Edit Category</strong>
                    </div>
                    <div class="card-body card-block">
                        @include('layouts.message')
                        <form action="{{ route('categories.update', ['category' => $category->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="form-group">
                                <label class="form-control-label" for="name">Category Name</label>
                                <input class="form-control" id="name" name="name" placeholder="Enter category name" value="{{ $category->name }}" type="text" >
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label" for="image">Image</label>
                                <input class="form-control" name="image" id="image" type="file" accept="image/*">
                            </div>

                            <button class="btn btn-success" type="submit">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection