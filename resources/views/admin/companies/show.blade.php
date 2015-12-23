@extends('admin_master')

@section('content')

    <div class="container">
        <h3 class="booking-title">Admin</h3>
        <div class="row">
            @include('partials.admin_account_aside')
            <div class="col-md-9">
                <div class="nav-drop booking-sort">
                </div>
            </div>
        </div>
        <div class="gap"></div>
    </div>

@endsection