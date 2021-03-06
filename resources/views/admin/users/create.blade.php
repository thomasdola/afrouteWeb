@extends('admin_master')

@section('content')

    <div class="container">
        <h3 class="booking-title">Admin</h3>
        <div class="row">
            @include('partials.admin_account_aside')
            <div class="col-md-4 col-md-offset-2">
                <h2>New Staff Details</h2>
                {!! Form::open(['action'=>'UsersController@store', 'method'=>'post']) !!}
                    <div class="form-group">
                        <label for="">Full Name</label>
                        <input type="text" class="form-control" name="name" value="{!! old('name') !!}" placeholder="Full Name">
                    </div>
                    <div class="form-group">
                        <label>Phone Number</label>
                        <input type="tel" name="phone" class="form-control" value="{!! old('phone') !!}" placeholder="Phone Number">
                    </div>
                    <div class="form-group">
                        <label>Role</label>
                        <select name="role_id" class="form-control">
                            @foreach ($roles as $role)
                                <option value="{{ $role -> id }}">{{ $role -> name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" name="email" class="form-control" value="{!! old('email') !!}" placeholder="Email Address">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control col-md-6" value="" placeholder="Password">
                    </div>
                    <div class="gap gap-small"></div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary btn-block" name="" value="Add">
                    </div>
                    <div class="form-group">
                        <a href="{{ route('admin.staffs.index') }}" class="btn btn-danger btn-block">Cancel</a>
                    </div>
                {!! Form::close() !!}
            </div>
            <div class="gap"></div>
        @if($errors -> any())
            @include('partials.errors')
        @endif
        </div>
        <div class="gap"></div>
    </div>

@endsection