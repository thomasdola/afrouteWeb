@extends('master')


@section('content')

        @include("partials.success")

        @include("partials.big_error")

        <div class="container">
            <h1 class="page-title">Account Settings</h1>
        </div>

        <div class="container">
            <div class="row">
                
                 @include('partials.customer_profile_aside')

                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-5">
                            {!! Form::open(['method'=>'post', 'action'=>['CustomersController@info_update']]) !!}
                                <h4>Personal Infomation</h4>
                                <div class="form-group form-group-icon-left"><i class="fa fa-user input-icon"></i>
                                    <label>Full Name</label>
                                    <input class="form-control" value="{{ $user->name }}" type="text" name="name" />
                                </div>
                                <div class="form-group form-group-icon-left"><i class="fa fa-envelope input-icon"></i>
                                    <label>E-mail</label>
                                    <input class="form-control" value="{{ $user->email }}" type="text" name="email" />
                                </div>
                                <div class="form-group form-group-icon-left"><i class="fa fa-phone input-icon"></i>
                                    <label>Phone Number</label>
                                    <input class="form-control" value="{{ $user->phone }}" type="text" name="phone" />
                                </div>
                                <div class="gap gap-small"></div>
                                <h4>Location</h4>
                                <div class="form-group">
                                    <label>City</label>
                                    <input class="form-control" value="{{ $user->city }}" type="text" name="city" />
                                </div>
                                <div class="form-group">
                                    <label>State/Province/Region</label>
                                    <input class="form-control" value="{{ $user->region }}" type="text" name="region" />
                                </div>
                                <div class="form-group">
                                    <label>Country</label>
                                    <input class="form-control" value="{{ $user->country }}" type="text" name="country" />
                                </div>
                                <hr>
                                <input type="submit" name="info_change" class="btn btn-primary" value="Save Changes">
                        </div>
                    {!! Form::close() !!}
                    {!! Form::open(['method'=>'post', 'action'=>['CustomersController@password_change']]) !!}
                        <div class="col-md-4 col-md-offset-1">
                            <h4>Change Password</h4>
                                <div class="form-group form-group-icon-left"><i class="fa fa-lock input-icon"></i>
                                    <label>New Password</label>
                                    <input class="form-control" required type="password" placeholder="oooooooooo" name="password" />
                                </div>
                                <div class="form-group form-group-icon-left"><i class="fa fa-lock input-icon"></i>
                                    <label>Confirm New Password</label>
                                    <input class="form-control" required placeholder="oooooooooo" type="password" name="password_confirmation" />
                                </div>
                                <hr />
                                <input class="btn btn-primary" type="submit" value="Change Password" />
                        </div>
                    {!! Form::close() !!}
                    </div>

                </div>
            </div>
        </div>
        <div class="gap">
            
        </div>

@endsection