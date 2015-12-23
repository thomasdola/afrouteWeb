@extends('company_master')

@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-fileupload.min.css') }}">

@endsection


@section('content')

    {{-- @include("partials.big_error") --}}
    @include("partials.success")

	<div class="container">
		<h1 class="booking-title">
			Settings
		</h1>
	</div>

	<div class="container">

		@include('partials.company_account_aside')

		<div class="col-md-9">
                <div class="tabbable">
                    <ul class="nav nav-tabs" id="myTab">
                        <li class="active"><a href="#tab-1" data-toggle="tab">Public Infomation</a>
                        </li>
                        {{--<li><a href="#tab-2" data-toggle="tab">Change Company Logo</a>--}}
                        </li>
                        <li><a href="#tab-3" data-toggle="tab">Public Images</a>
                        </li>
                        <li><a href="#tab-4" data-toggle="tab">Staffs</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="tab-1">
                            <div class="col-md-5">
                                {!! Form::open(['method'=>'patch', 'action'=>'CompaniesController@profile_update']) !!}
                                    <h4>Company Public Infomation</h4>
                                    <div class="form-group form-group-icon-left"><i class="fa fa-user input-icon"></i>
                                        <label>Terminal Name</label>
                                        <input class="form-control" value="{{ $travel_company->name }}" type="text" name="name" />
                                    </div>
                                    {{-- <div class="form-group form-group-icon-left"><i class="fa fa-envelope input-icon"></i>
                                        <label>E-mail</label>
                                        <input class="form-control" value="{{ $travel_company->email }}" type="text" name="email" />
                                    </div> --}}
                                    {{-- <div class="form-group form-group-icon-left"><i class="fa fa-phone input-icon"></i>
                                        <label>Phone Number</label>
                                        <input class="form-control" value="{{ $travel_company->phone }}" type="text" name="phone" />
                                    </div> --}}
                                    <div class="form-group form-group-icon-left"><i class="fa fa-facebook input-icon"></i>
                                        <label>Social Media Links(Only FaceBook Allowed)</label>
                                        <input class="form-control" value="{{ $travel_company->facebook_link }}" type="url" name="facebook_link" />
                                    </div>
                                    <div class="form-group">
                                    	<label>Bus Features</label>
                                    	<select name="bus_features[]" multiple class="form-control" id="features_list">
                                            @foreach($bus_features as $f)
                                                <option value="{{ $f->id }}">{{ $f -> name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea name="description" id="artBody" class="form-control" placeholder="Service description...">{{ $travel_company->description }}</textarea>
                                    </div>
                                    <div class="gap gap-small"></div>
                                    <h4>Company Location</h4>
                                    <div class="form-group"></i>
                                        <label>HeadQuarter Address</label>
                                        <input class="form-control" value="{{ $travel_company->address }}" type="text" name="address" />
                                    </div>
                                    {{-- <div class="form-group"></i>
                                        <label>Google Map (Should be a URL)</label>
                                        <input class="form-control" value="{{ $travel_company->location_url }}" type="text" name="location_url" />
                                    </div> --}}
                                    <div class="form-group">
                                        <label>Country</label>
                                        <input name="country" class="form-control" value="{{ $travel_company->country }}" type="text" />
                                    </div>
                                    <div class="form-group">
                                        <label>City</label>
                                        <input name="city" class="form-control" value="{{ $travel_company->city }}" type="text" />
                                    </div>
                                    <div class="form-group">
                                        <label>State/Province/Region</label>
                                        <input name="region" class="form-control" value="{{ $travel_company->region }}" type="text" />
                                    </div>
                                    <hr>
                                    <input type="submit" class="btn btn-primary" value="Save Changes">
                                
                                {!! Form::close() !!}
                            </div>
                            {!! Form::open(['method'=>'patch', 'action'=>'CompaniesController@password_change']) !!}
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
                                    <div class="col-md-12">
                                        @if ($errors->any())
                                            @foreach ($errors->all() as $e)
                                                <div class="alert alert-danger">
                                                    {{ $e }}
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                       {{--  @if ($errors->any())
                        	<ul>
                        		@foreach ($errors->all() as $e)
                        			<li>{{ $e }}</li>
                        		@endforeach
                        	</ul>
                        @endif --}}
                        {{--<div class="tab-pane fade" id="tab-2">--}}
	                        {{--<div class="gap gap-small"></div>--}}
							{{--<div class="row">--}}
							{{--<div class="col-md-5">--}}
								{{--<h4>Your Logo Here</h4>--}}
							{{--</div>--}}
								{{--<div class="col-md-3">--}}
									{{--{!! Form::open(['class'=>'dropzone logo', 'route'=>'company_logo_upload']) !!}--}}

                                    {{--{!! Form::close() !!}--}}
								{{--</div>--}}
							{{--</div>--}}
							{{--<hr>--}}
							{{--<div class="row">--}}
							{{--<div class="col-md-5">--}}
								{{--<h4>Your Logo Here</h4>--}}
							{{--</div>--}}
								{{--<div class="col-md-3">--}}
									{{--{!! Form::open(['class'=>'dropzone profile', 'route'=>'company_logo_upload']) !!}--}}

									{{--{!! Form::close() !!}--}}
								{{--</div>--}}
							{{--</div>--}}
                        {{--</div>--}}
                        <div class="tab-pane fade" id="tab-3">
                            <div class="gap gap-small"></div>
                            <div class="row">
                                <div class="col-md-5">
                                    <h4>Your Logo Here</h4>
                                </div>
                                    <div class="col-md-3">
                                        {!! Form::open() !!}

                                        {!! Form::close() !!}

                                        {!! Form::open(['class'=>'dropzone logo', 'route'=>'company_logo_upload']) !!}

                                        {!! Form::close() !!}
                                    </div>
                            </div>
                            <hr>
                            <div class="row">
                            <div class="col-md-5">
                                <h4>Your Public Image Here</h4>
                            </div>
                                <div class="col-md-5">
                                    {!! Form::open(['class'=>'form', 'route'=>'company_image_upload', 'files'=>true]) !!}
                                        <div class="form-group">
                                            <input type="file" required name="terminal_images[]" multiple value="" placeholder="" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-primary btn-block" value="Add">
                                        </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-4">
                        	<div class="gap gap-small"></div>
                        	<div class="row">
                        		<div class="col-md-4">
                        			{!! Form::open(['method'=>'post', 'action'=>'CompaniesController@add_staff']) !!}
		                                <h4>Staffs</h4>
		                                <div class="form-group form-group-icon-left"><i class="fa fa-user input-icon"></i>
		                                    <label>Full Name</label>
		                                    <input class="form-control" value="{{ old('name') }}" name="name" type="text" />
		                                </div>
		                                <div class="form-group form-group-icon-left"><i class="fa fa-user input-icon"></i>
		                                    <label>User Name</label>
		                                    <input class="form-control" name="username" value="{{ old('username') }}" type="text" />
		                                </div>
		                                <div class="form-group form-group-icon-left"><i class="fa fa-envelope input-icon"></i>
		                                    <label>E-mail</label>
		                                    <input class="form-control" name="email" value="{{ old('email') }}" type="text" />
		                                </div>
		                                <div class="form-group form-group-icon-left"><i class="fa fa-phone input-icon"></i>
		                                    <label>Phone Number</label>
		                                    <input class="form-control" name="phone" value="{{ old('phone') }}" type="text" />
		                                </div>
		                                <div class="form-group">
		                                    <label>Password</label>
		                                    <input class="form-control" name="password" type="password" />
		                                </div>
		                                <hr>
		                                <input type="submit" class="btn btn-primary" value="Add">
		                            {!! Form::close() !!}
                        		</div>
                        		<div class="col-md-8">
                        			<table class="table table-bordered table-striped table-booking-history">
							            <thead>
							                <tr>
							                    <th>Full Name</th>
							                    <th>User Name</th>
							                    <th>Email</th>
							                    <th>Phone Number</th>
							                    <th>Role</th>
							                </tr>
							            </thead>
							            <tbody>
							                @foreach ($staffs as $staff)
							                	<tr>
								                    <td>{{ $staff -> name }}</td>
								                    <td>{{ $staff -> username }}</td>
								                    <td>{{ $staff -> email }}</td>
								                    <td>{{ $staff -> phone }}</td>
								                    <td>
								                    	@if ($staff -> type == 1)
								                    		Admin
							                    		@else
							                    			Cashier
								                    	@endif
								                    </td>
								                </tr>
							                @endforeach
							            </tbody>
							        </table>
                        		</div>
                        	</div>
                        </div>
                    </div>
                </div>
            </div>

	</div>

@endsection


@section('scripts')

    <script type="text/javascript">
        $(function(){
            $('#artBody').wysihtml5({
                    toolbar: {
                        "link": false,
                        "image": false,
                        'fa': true,
                        "emphasis": false,
                        "font-styles": false,
                        "blockquote": false
                    }
                });


                $('#features_list').select2();

        // $('#artBody').wysihtml5({
        //       // toolbar: {
        //         "font-styles": true, //Font styling, e.g. h1, h2, etc. Default true
        //         "emphasis": true, //Italics, bold, etc. Default true
        //         "lists": true, //(Un)ordered lists, e.g. Bullets, Numbers. Default true
        //         "html": false, //Button which allows you to edit the generated HTML. Default false
        //         "link": true, //Button to insert a link. Default true
        //         "image": true, //Button to insert an image. Default true,
        //         "color": false, //Button to change color of font  
        //         "blockquote": true, //Blockquote  
        //         "size": <buttonsize> //default: none, other options are xs, sm, lg
        //       // }
        //     });
        })
    </script>

@endsection