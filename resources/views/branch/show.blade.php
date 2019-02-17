@extends('layouts.app')
@section('pageTitle', 'View Branches')

@push('breadcrumbs')
<ol class="breadcrumb text-right">
    <li><a href="{{ route('home') }}">Dashboard</a></li>
    <li><a href="{{ route('branches.index') }}">Branches</a></li>
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
                        <strong class="card-title">View Branch</strong>
                        <div class="float-right">
                            <a href="{{ route('branches.index') }}" class="btn btn-info btn-sm">Back</a>
                        </div>
                    </div>
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <td>Address</td>
                                <td>:</td>
                                <td>{{ $branch->address }}</td>
                            </tr>
                            <tr>
                                <td>Area</td>
                                <td>:</td>
                                <td>{{ $branch->area }}</td>
                            </tr>
                            <tr>
                                <td>Contact Persion</td>
                                <td>:</td>
                                <td>{{ $branch->contact->name }}</td>
                            </tr>
                            <tr>
                                <td>Contact Number</td>
                                <td>:</td>
                                <td>{{ $branch->contact_number }}</td>
                            </tr>
                            <tr>
                                <td>Open Time</td>
                                <td>:</td>
                                <td>{{ $branch->show_time().' | '. $branch->show_week() }}</td>
                            </tr>
                            <tr>
                                <td colspan="3">Open in <a href="{{ $branch->map_link }}" target="_blank">Maps</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div><!-- .row -->
    </div> <!-- .buttons -->
</div><!-- .animated -->

@endsection