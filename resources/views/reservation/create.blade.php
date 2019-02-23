@extends('layouts.app')
@section('pageTitle', 'Add Reservatios')


@push('header')
<link rel="stylesheet" href="{{ asset('assets/lib/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}">
@endpush

@push('breadcrumbs')
<ol class="breadcrumb text-right">
    <li><a href="{{ route('home') }}">Dashboard</a></li>
    <li><a href="{{ route('reservation.index') }}">Reservatios</a></li>
    <li class="active">Issue New Book</li>
</ol>
@endpush

@section('content')
<div class="animated fadeIn">
    <div class="buttons">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <strong>Issue Book</strong>
                        <small> issue a book to user...</small>
                    </div>
                    <div class="card-body card-block">
                        @include('layouts.message')
                        <form action="{{ route('reservation.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="form-control-label" for="book">Select Book</label>
                                <select name="book" id="book" class="form-control select2">
                                    <option value="">Choose Book</option>
                                    @foreach($books as $book)
                                    <option {{ old('book') == $book->id ? 'selected' : '' }} value="{{ $book->id }}">{{ $book->book_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="user">Select User</label>
                                <select name="user" id="user" class="form-control select2">
                                    <option value="">Choose User</option>
                                    @foreach($users as $user)
                                    <option {{ old('user') == $user->id ? 'selected' : '' }} value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="date">Return Date</label>
                                <input type="text" class="form-control dpick" name="return_date" id="date" placeholder="Enter return date">
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

@push('footer')
<script type="text/javascript" src="{{ asset('assets/lib/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script type="text/javascript">
    (function($){
        $('.dpick').datepicker({
            autoclose: true
        });
    })(jQuery);
</script>
@endpush