@extends('layouts.app')
@section('pageTitle', 'Add Branch')

@push('breadcrumbs')
<ol class="breadcrumb text-right">
    <li><a href="{{ route('home') }}">Dashboard</a></li>
    <li><a href="{{ route('branches.index') }}">Branches</a></li>
    <li class="active">Add Branch</li>
</ol>
@endpush

@section('content')
<div class="animated fadeIn">
    <div class="buttons">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <strong>Add Branch</strong>
                        <small> add a new branch...</small>
                    </div>
                    <div class="card-body card-block">
                        @include('layouts.message')
                        <form action="{{ route('branches.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label class="form-control-label" for="address">Branch Address</label>
                                <input class="form-control" id="address" placeholder="Enter branch address" type="text" name="address" required="">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="area">Branch Area</label>
                                <input class="form-control" id="area" placeholder="Enter branch area" type="text" name="area" required="">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="map_link">Area in Maps</label>
                                <input class="form-control" id="map_link" placeholder="Enter branch maps link" type="text" name="map_link" required="">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="contact_person_id">Contact Persion</label>
                                <select name="contact_person_id" id="contact_person_id" class="form-control">
                                    <option value="">Select User</option>
                                    @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="contact_number">Contact Number</label>
                                <input class="form-control" id="contact_number" placeholder="Enter branch contact number" type="text" name="contact_number" required="">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="close_days">Close Days</label>
                                <select name="close_days[]" id="close_days" class="form-control" multiple="">
                                    <option value="Sat">Saturday</option>
                                    <option value="Sun">Sunday</option>
                                    <option value="Mon">Monday</option>
                                    <option value="Tue">Tuesday</option>
                                    <option value="Wed">Wednesday</option>
                                    <option value="Thu">Thursday</option>
                                    <option value="Fri">Friday</option>
                                </select>
                            </div>
                            <div class="form-group" title="Enter the branch opening time as 24 hour format.">
                                <label class="form-control-label" for="open_time">Open time</label>
                                <input class="form-control" id="open_time" placeholder="10:00-17:00" type="text" name="open_time" required="">
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