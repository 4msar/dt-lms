@extends('layouts.app')
@section('pageTitle', 'Category')

@push('breadcrumbs')
<ol class="breadcrumb text-right">
    <li><a href="{{ route('home') }}">Dashboard</a></li>
    <li><a href="{{ route('books.index') }}">Books</a></li>
    <li class="active">Categories</li>
</ol>
@endpush

@section('content')
<div class="animated fadeIn">
    <div class="buttons">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('layouts.message')
            </div>
            @if(auth()->user()->ucan('category', 'create'))
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <strong>Add Category</strong>
                        <small> add a new category...</small>
                    </div>
                    <div class="card-body card-block">
                        <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="form-control-label" for="name">Category Name</label>
                                <input class="form-control" id="name" name="name" placeholder="Enter category name" type="text" >
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
            @endif
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Category List</strong>
                    </div>
                    <div class="table-stats order-table ov-h ">
                        <table class="table ">
                            <thead>
                                <tr>
                                    <th class="serial">#</th>
                                    <th>Category Name</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($categories as $category)
                                <tr>
                                    <td class="serial">{{ $loop->iteration }}</td>
                                    <td><span class="name">{{ $category->name }}</span> </td>
                                    <td class="avatar">
                                        <div class="round-img">
                                            <a href="#"><img class="category-img" src="{{ route('image', ['type'=>'category', 'id'=>$category->id]) }}" alt="{{ $category->name }}"></a>
                                        </div>
                                    </td>
                                    <td>
                                        @if(auth()->user()->ucan('category', ['edit', 'delete']))
                                        <form onsubmit="return confirm('Do you really want to delete?');" action="{{ route('categories.destroy', ['category' => $category->id]) }}" method="POST">
                                            <a class="btn btn-info btn-sm" href="{{ route('categories.edit', ['category' => $category->id]) }}"><i class="fa fa-edit"></i></a>
                                            @csrf
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                        </form>
                                        @else
                                        <a href="{{ route('categories.show', ['category'=>$category->id]) }}" class="btn btn-info"><i class="fa fa-eye"></i></a>
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
                {{ $categories->links() }}
            </div>
        </div><!-- .row -->
    </div> <!-- .buttons -->
</div><!-- .animated -->

@endsection