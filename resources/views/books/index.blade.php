@extends('layouts.app')
@section('pageTitle', 'Books')

@push('breadcrumbs')
<ol class="breadcrumb text-right">
    <li><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="active">Books</li>
</ol>
@endpush

@section('content')
<div class="animated fadeIn">
    <div class="buttons">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Books List</strong>
                    </div>
                    <div class="table-stats order-table ov-h ">
                        <table class="table ">
                            <thead>
                                <tr>
                                    <th class="serial">#</th>
                                    <th class="avatar">Image</th>
                                    <th>Book Name</th>
                                    <th>Author Name</th>
                                    <th>Quantity</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($books as $book)
                                <tr>
                                    <td class="serial">{{ $loop->iteration }}</td>
                                    <td class="avatar">
                                        <div class="round-img">
                                            <a href="#"><img class="rounded-circle" src="{{ asset('assets/images/books.svg') }}" alt="{{ $book->book_name }}"></a>
                                        </div>
                                    </td>
                                    <td><span class="name">{{ $book->book_name }}</span> </td>
                                    <td> <span class="product">{{ $book->author_name }}</span> </td>
                                    <td><span class="count">{{ $book->quantity }}</span></td>
                                    <td><span class="badge badge-complete">{{ $book->status == 1 ? 'Available' : 'Not Available' }}</span></td>
                                    <td>
                                        <div class="btn-group">
                                            <a class="btn btn-primary btn-sm" href="{{ route('books.show', ['book'=>$book->id]) }}"><i class="fa fa-eye"></i></a>
                                            <a class="btn btn-info btn-sm" href="{{ route('books.edit', ['book'=>$book->id]) }}"><i class="fa fa-edit"></i></a>
                                            <form onsubmit="return confirm('Do you really want to delete?');" action="{{ route('books.destroy', ['book'=>$book->id]) }}" method="POST">
                                                @csrf
                                                {{ method_field('DELETE') }}
                                                <a href="javascript:void(0)" class="btn btn-danger btn-sm" onclick="this.form.submit();"><i class="fa fa-trash"></i></a>
                                            </form>
                                        </div>
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
                {{ $books->links() }}
            </div>
        </div><!-- .row -->
    </div> <!-- .buttons -->
</div><!-- .animated -->

@endsection