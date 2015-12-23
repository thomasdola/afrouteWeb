@extends('master')

@section('content')

	<div class="container">
	    <ul class="breadcrumb">
	        <li><a href="{{ route('welcome') }}">Home</a>
	        </li>
	        <li><a href="{{ route('all_buses') }}">All Buses</a>
	        </li>
	        <li class="active">selected Bus</li>
	    </ul>
	    <div class="booking-item-details">

	        <header class="booking-item-header">
	            <div class="row">
	                <div class="col-md-9">
	                    <h2 class="lh1em">{{ ucwords($bus->name) }}</h2>
	                    {{-- <ul class="list list-inline text-small">
	                        <li><a href="#"><i class="fa fa-envelope"></i> E-mail Car Agent</a>
	                        </li>
	                        <li><i class="fa fa-phone"></i> 810 1 941-684-2144</li>
	                    </ul> --}}
	                </div>
	                {{-- <div class="col-md-3">
	                    <p class="booking-item-header-price"><small>price</small>  <span class="text-lg">$70</span>/day</p>
	                </div> --}}
	            </div>
	        </header>
	        <div class="gap gap-small"></div>
	        <div class="row row-wrap">
	            <div class="col-md-6">
	                <div class="row">
	                    <div class="col-md-12">
	                    	<div class="tab-pane fade in active" id="tab-1">
	                    	    <div class="fotorama" data-allowfullscreen="true" data-nav="thumbs">
	                    	        @foreach ($bus->bus_images as $img)
	                    	        	<img src="{{ asset($img->path) }}"/>
	                    	        @endforeach
                    	        </div>
                	        </div>
	                    </div>
	                </div>
	                <!-- <p class="text-small">Arrive at your destination in style with this air-conditioned automatic. With room for 4 passengers and 2 pieces of luggage, it's ideal for small groups looking to get from A to B in comfort. Price can change at any moment so book now to avoid disappointment!</p> -->

	                <hr>
	                <div class="row row-wrap">
	                    <div class="col-md-4">
	                        <h5>Bus Features</h5>
	                        <ul class="booking-item-features booking-item-features-expand clearfix">
	                        	
	                        	@foreach ($features as $f)
	                        		<li><i class="{{ $f->icon }}"></i><span class="booking-item-feature-title">{{ $f->name }}</span>
	                        		</li>
	                        	@endforeach

	                        </ul>
	                    </div>
	                </div>
	            </div>
	            <div class="col-md-6">
	                <div class="booking-item-deails-date-location">
	                	<div class="tabbable">
                            <ul class="nav nav-tabs" id="myTab">
                                <li class="active"><a href="#roundTrip" data-toggle="tab">Round Trip</a>
                                </li>
                                <li><a href="#oneWay" data-toggle="tab">One Way</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="roundTrip">
        		                    {!! Form::open(['class'=>'booking-item-dates-change mb30', 'method'=>'post', 'route'=>'rental_save']) !!}
        		                            <div class="row">
        		                            	<div class="col-md-6">
        		                            		<input type="hidden" name="trip_type" value="round_trip">
        		                            		<div class="form-group form-group-icon-left"><i class="fa fa-map-marker input-icon input-icon-hightlight"></i>
        		                            		    <label>Departing Address</label>
        		                            		    <input type="text" required name="departing_address" class="form-control" value="{{ old('departing_address') }}" placeholder="Departing Address">
        		                            		</div>

        		                            		<input type="hidden" name="bus_id" value="{{ $bus->id }}">
        		                            		
        		                            		<div class="form-group form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-hightlight"></i>
        		                            		    <label>Departing Date</label>
        		                            		    <input name="departing_date" required class="date-pick form-control" data-date-format="MM d, D" type="text" />
        		                            		</div>
        		                            		<div class="form-group form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-hightlight"></i>
        		                            		    <label>Departing Time</label>
        		                            		    <input name="departing_time" required class="time-pick form-control" type="text" />
        		                            		</div>
        		                            	</div>	
        		                            	<div class="col-md-6">
        		                            		<div class="form-group form-group-icon-left"><i class="fa fa-map-marker input-icon input-icon-hightlight"></i>
        		                            		    <label>Destination Address</label>
        		                            		    <input type="text" required name="destination_address" class="form-control" value="{{ old('destination_address') }}" placeholder="Destination Address">
        		                            		</div>
        		                            		<div class="form-group form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-hightlight"></i>
        		                            		    <label>Returning Date</label>
        		                            		    <input name="returning_date" required class="date-pick form-control" data-date-format="MM d, D" type="text" />
        		                            		</div>
        		                            		<div class="form-group form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-hightlight"></i>
        		                            		    <label>Returning Time</label>
        		                            		    <input name="returning_time" required class="time-pick form-control" type="text" />
        		                            		</div>
        		                            	</div>
        		                            </div>
        		                            <div class="row">
        		                            	<div class="col-md-12">
        		                            		<div class="form-group form-group-icon-left"><i class="fa fa-user input-icon input-icon-hightlight"></i>
        		                            		    <label>Name (Person / Organization)</label>
        		                            		    <input type="text" name="customer_name" required class="form-control" value="{{ old('customer_name') }}" placeholder="">
        		                            		</div>
        		                            		<div class="form-group form-group-icon-left"><i class="fa fa-envelope input-icon input-icon-hightlight"></i>
        		                            		    <label>Email Address</label>
        		                            		    <input type="text" name="customer_email" required class="form-control" value="{{ old('customer_email') }}" placeholder="">
        		                            		</div>
        		                            		<div class="row">
        		                            			<div class="col-md-6">
        		                            				<div class="form-group form-group-icon-left"><i class="fa fa-phone input-icon input-icon-hightlight"></i>
        		                            				    <label>Phone Number</label>
        		                            				    <input name="customer_phone_number" value="{{ old('customer_phone_number') }}" required class="form-control" type="text" />
        		                            				</div>
        		                            			</div>
        		                            			<div class="col-md-6">
        		                            				<div class="form-group form-group-icon-left"><i class="im im-bus input-icon input-icon-hightlight"></i>
        		                            				    <label>Number of Bus</label>
        		                            				    <input name="number_of_bus" required class="form-control" max="10" type="number"  value="{{ old('number_of_bus') }}" />
        		                            				</div>
        		                            			</div>
        		                            		</div>
        		                            	</div>
        		                            </div>
        		                            <input type="submit" class="btn btn-primary btn-block" value="Send Request">	
        	                        {!! Form::close() !!}
                                </div>
                                <div class="tab-pane fade" id="oneWay">
        		                    {!! Form::open(['class'=>'booking-item-dates-change mb30', 'method'=>'post', 'route'=>'rental_save']) !!}
        		                            <div class="row">
        		                            	<div class="col-md-6">
        		                            		<input type="hidden" name="trip_type" value="one_way">
        		                            		<div class="form-group form-group-icon-left"><i class="fa fa-map-marker input-icon input-icon-hightlight"></i>
        		                            		    <label>Departing Address</label>
        		                            		    <input type="text" required name="departing_address" class="form-control" value="{{ old('departing_address') }}" placeholder="Departing Address">
        		                            		</div>

        		                            		<input type="hidden" name="bus_id" value="{{ $bus->id }}">
        		                            		
        		                            		<div class="form-group form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-hightlight"></i>
        		                            		    <label>Departing Date</label>
        		                            		    <input name="departing_date" required class="date-pick form-control" data-date-format="MM d, D" type="text" />
        		                            		</div>
        		                            	</div>	
        		                            	<div class="col-md-6">
        		                            		<div class="form-group form-group-icon-left"><i class="fa fa-map-marker input-icon input-icon-hightlight"></i>
        		                            		    <label>Destination Address</label>
        		                            		    <input type="text" required name="destination_address" class="form-control" value="{{ old('destination_address') }}" placeholder="Destination Address">
        		                            		</div>
        		                            		<div class="form-group form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-hightlight"></i>
        		                            		    <label>Departing Time</label>
        		                            		    <input name="departing_time" required class="time-pick form-control" type="text" />
        		                            		</div>
        		                            	</div>
        		                            </div>
        		                            <div class="row">
        		                            	<div class="col-md-12">
        		                            		<div class="form-group form-group-icon-left"><i class="fa fa-user input-icon input-icon-hightlight"></i>
        		                            		    <label>Name (Person / Organization)</label>
        		                            		    <input type="text" name="customer_name" required class="form-control" value="{{ old('customer_name') }}" placeholder="">
        		                            		</div>
        		                            		<div class="form-group form-group-icon-left"><i class="fa fa-envelope input-icon input-icon-hightlight"></i>
        		                            		    <label>Email Address</label>
        		                            		    <input type="text" name="customer_email" required class="form-control" value="{{ old('customer_email') }}" placeholder="">
        		                            		</div>
        		                            		<div class="row">
        		                            			<div class="col-md-6">
        		                            				<div class="form-group form-group-icon-left"><i class="fa fa-phone input-icon input-icon-hightlight"></i>
        		                            				    <label>Phone Number</label>
        		                            				    <input name="customer_phone_number" value="{{ old('customer_phone_number') }}" required class="form-control" type="text" />
        		                            				</div>
        		                            			</div>
        		                            			<div class="col-md-6">
        		                            				<div class="form-group form-group-icon-left"><i class="im im-bus input-icon input-icon-hightlight"></i>
        		                            				    <label>Number of Bus</label>
        		                            				    <input name="number_of_bus" required class="form-control" max="10" type="number"  value="{{ old('number_of_bus') }}" />
        		                            				</div>
        		                            			</div>
        		                            		</div>
        		                            	</div>
        		                            </div>
        		                            <input type="submit" class="btn btn-primary btn-block" value="Send Request">	
        	                        {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
	                </div>
	                <div class="gap gap-small"></div>
	            </div>
	        </div>
	    </div>
	</div>

	@if (Session::has('rent_error') OR $errors->any())
	    <div class="alert rent-error">
	        {{ Session::get('rent_error') }}
	        <ul class="list list-unstyled">
	        	@foreach ($errors->all() as $e)
	        	    <li>{{ $e }}</li>
	        	@endforeach
	        </ul>
	    </div>
	@endif

@endsection