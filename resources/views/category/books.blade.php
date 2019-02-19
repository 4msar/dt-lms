@extends('layouts.app')
@section('pageTitle', 'Category Books')

@push('breadcrumbs')
<ol class="breadcrumb text-right">
    <li><a href="{{ route('home') }}">Dashboard</a></li>
    <li><a href="{{ route('categories.index') }}">Categories</a></li>
    <li class="active">Category Books</li>
</ol>
@endpush

@section('content')
<div class="animated fadeIn">
    <div class="books-list">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Books in "{{ $category->name }}" Category</strong>
                    </div>
                    <div class="table-stats order-table ov-h ">
                        <table class="table ">
                            <thead>
                                <tr>
                                    <th class="serial">#</th>
                                    <th class="avatar">Image</th>
                                    <th>Book Name</th>
                                    <th>Author Name</th>
                                    <th>Have in</th>
                                    <th>Contact Persion</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($category->books as $book)
                                <tr>
                                    <td class="serial">{{ $loop->iteration }}</td>
                                    <td class="avatar">
                                        <div class="round-img">
                                            <img src="{{ route('image', ['type'=>'books', 'id'=>$book->id]) }}" alt="{{ $book->book_name }}">
                                        </div>
                                    </td>
                                    <td><span class="name">{{ $book->book_name }}</span> </td>
                                    <td> <span class="product">{{ $book->author_name }}</span> </td>
                                    <td>
                                        <span class="address">{{ $book->hub->address }} Branch</span> <br>
                                        <a href="{{ route('branches.show', ['branch'=>$book->hub_id]) }}">View Details</a>
                                    </td>
                                    <td>{{ $book->hub->contact->name }}</td>
                                    <td><span class="badge badge-sm badge-{{ $book->status == 1 ? 'success' : 'warning' }}">{{ $book->status == 1 ? 'Available' : 'Not Available' }}</span>
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
            </div>
        </div><!-- .row -->
    </div> <!-- .buttons -->
</div><!-- .animated -->

@endsection