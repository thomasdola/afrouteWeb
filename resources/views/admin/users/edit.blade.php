@extends('admin_master')

@section('content')

    <div class="container">
        <h3 class="booking-title">Admin</h3>
        <div class="row">
            @include('partials.admin_account_aside')
            <div class="col-md-9">
                <div class="col-md-5 col-md-offset-2">
                <h2>Edit Staff</h2>
                {!! Form::open(['action'=>['UsersController@update', $staff], 'method'=> 'PUT']) !!}
                    <div class="form-group">
                        <label for="">Full Name</label>
                        <input type="text" class="form-control" name="name" value="{!! $staff -> name !!}" placeholder="Full Name">
                    </div>
                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" name="email" class="form-control" value="{!! $staff -> email!!}" placeholder="Email Address">
                    </div>
                    <div class="form-group">
                        <label>Phone Number</label>
                        <input type="text" name="phone" class="form-control" value="{!! $staff -> phone !!}" placeholder="Phone Number">
                    </div>
                    <div class="form-group">
                        <label>Role</label>
                        <select name="role_id" class="form-control">
                            @foreach ($roles as $role)
                                <option value="{{ $role -> id }}" @if ($role->id == $staff->role_id)
                                    {{'selected'}}
                                @endif>
                                {{ $role -> name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control col-md-6" value="" placeholder="Password">
                    </div>
                    <div class="gap gap-small"></div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary btn-block" name="" value="udpate">
                    </div>
                    <div class="form-group">
                        <a href="{{ route('admin.staffs.index') }}" class="btn btn-danger btn-block">Cancel</a>
                    </div>
                {!! Form::close() !!}
            </div>
            </div>
            {{-- {{ dd($errors->all()) }} --}}
        </div>
        <div class="gap"></div>
    </div>

@endsection