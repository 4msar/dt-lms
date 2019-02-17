@extends('layouts.app')
@section('pageTitle', 'Edit Branch')

@push('breadcrumbs')
<ol class="breadcrumb text-right">
    <li><a href="{{ route('home') }}">Dashboard</a></li>
    <li><a href="{{ route('branches.index') }}">Branches</a></li>
    <li class="active">Edit Branch</li>
</ol>
@endpush

@section('content')
<div class="animated fadeIn">
    <div class="buttons">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <strong>Edit Branch</strong>
                        <small> edit a new branch...</small>
                    </div>
                    <div class="card-body card-block">
                        @include('layouts.message')
                        <form action="{{ route('branches.update', ['branch' => $branch->id]) }}" method="POST">
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="form-group">
                                <label class="form-control-label" for="address">Branch Address</label>
                                <input class="form-control" id="address" placeholder="Enter branch address" type="text" value="{{ $branch->address }}" name="address" required="">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="area">Branch Area</label>
                                <input class="form-control" id="area" placeholder="Enter branch area" type="text" value="{{ $branch->area }}" name="area" required="">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="map_link">Area in Maps</label>
                                <input class="form-control" id="map_link" placeholder="Enter branch maps link" type="text" value="{{ $branch->map_link }}" name="map_link" required="">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="contact_person_id">Contact Persion</label>
                                <select value="{{ $branch->contact_person_id }}" name="contact_person_id" id="contact_person_id" class="form-control">
                                    <option value="{{ $branch->User }}">Select User</option>
                                    @foreach($users as $user)
                                    <option {{ $branch->contact_person_id == $user->id ? 'selected' : '' }} value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="contact_number">Contact Number</label>
                                <input class="form-control" id="contact_number" placeholder="Enter branch contact number" type="text" value="{{ $branch->contact_number }}" name="contact_number" required="">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="close_days">Close Days</label>
                                @php
                                $cd = array_filter(explode(',', $branch->close_days));
                                @endphp
                                <select name="close_days[]" id="close_days" class="form-control" multiple="">
                                    <option {{ in_array('Sat', $cd) ? 'selected' : '' }} value="Sat">Saturday</option>
                                    <option {{ in_array('Sun', $cd) ? 'selected' : '' }} value="Sun">Sunday</option>
                                    <option {{ in_array('Mon', $cd) ? 'selected' : '' }} value="Mon">Monday</option>
                                    <option {{ in_array('Tue', $cd) ? 'selected' : '' }} value="Tue">Tuesday</option>
                                    <option {{ in_array('Wed', $cd) ? 'selected' : '' }} value="Wed">Wednesday</option>
                                    <option {{ in_array('Thu', $cd) ? 'selected' : '' }} value="Thu">Thursday</option>
                                    <option {{ in_array('Fri', $cd) ? 'selected' : '' }} value="Fri">Friday</option>
                                </select>
                            </div>
                            <div class="form-group" title="Enter the branch opening time as 24 hour format.">
                                <label class="form-control-label" for="open_time">Open time</label>
                                <input class="form-control" id="open_time" placeholder="10:00-17:00" type="text" value="{{ $branch->open_time }}" name="open_time" required="">
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