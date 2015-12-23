@extends('admin_master')

@section('content')

	@include("partials.big_error")
	@include("partials.success")

	<div class="container">
            <h3 class="booking-title">Admin</h3>
            <div class="row">
                @include('partials.admin_account_aside')
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-12">
                           {!! Form::open(['method'=>'patch', 'action'=>'AdminSettingsController@change_password']) !!}
                           <div class="col-md-4 col-md-offset-1">
                               <div class="row">
                                   <div class="col-md-12">
                                        <h4>Change Password</h4>
                                            <div class="form-group form-group-icon-left"><i class="fa fa-lock input-icon"></i>
                                                <label>New Password</label>
                                                <input name="password" required class="form-control" type="password" />
                                            </div>
                                            <div class="form-group form-group-icon-left"><i class="fa fa-lock input-icon"></i>
                                                <label>Confirmation New Password</label>
                                                <input name="password_confirmation" required class="form-control" type="password" />
                                            </div>
                                            <hr />
                                            <input class="btn btn-primary" type="submit" value="Change Password" />
                           {!! Form::close() !!}
                        </div>
                        <div class="gap"></div>
                        
                    </div>
                </div>
            </div>
            <div class="gap"></div>
        </div>

@endsection