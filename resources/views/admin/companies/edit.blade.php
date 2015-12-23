@extends('admin_master')

@section('content')

    <div class="container">
        <h3 class="booking-title">Admin</h3>
        <div class="row">
            @include('partials.admin_account_aside')
            <div class="col-md-5 col-md-offset-2">
                <h2>Editing</h2>
                {!! Form::open(['action'=>['TravelCompaniesController@update', $travel_company], 'method'=> 'PATCH']) !!}
                    <div class="form-group">
                        <label for="">Full Name</label>
                        <input type="text" class="form-control" name="name" value="{{ $travel_company -> name }}" placeholder="Full Name">
                    </div>
                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" name="email" class="form-control" value="{{ $travel_company -> email }}" placeholder="Email Address">
                    </div>
                    <div class="form-group">
                        <label>Phone Number</label>
                        <input type="text" name="phone" class="form-control" value="{{ $travel_company -> phone }}" placeholder="Phone Number">
                    </div>
                    
                    <div class="gap gap-small"></div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary btn-block" name="" value="Update">
                    </div>
                    <div class="form-group">
                        <a href="{{ route('admin.travel-companies.index') }}" class="btn btn-danger btn-block" name="" value="Add">Cancel</a>
                    </div>
                {!! Form::close() !!}
            </div>
            @if ($errors->any())
                @include('partials.errors')
            @endif
        </div>
        <div class="gap"></div>
    </div>

@endsection