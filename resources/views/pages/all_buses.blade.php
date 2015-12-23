@extends('master')

@section('content')
	
	<div class="container">
	    <ul class="breadcrumb">
	        <li><a href="{{ route('welcome') }}">Home</a>
	        </li>
	        <li class="active">Rental Buses</li>
	    </ul>
	    <div class="gap"></div>

	    <div class="row">
	        
	        <div class="col-md-9 col-md-offset-1">
	            
	            <ul class="booking-list">
	                @foreach ($buses as $bus)
	                	<li>
	                	    <a class="booking-item" href="{{ route('rent_bus', ['id'=>$bus->id]) }}" style="height: 135px;">
	                	        <div class="row">
	                	            <div class="col-md-3">
	                	                <div class="booking-item-car-img">
	                	                    <p class="booking-item-car-title" style="font-size:1.5em; margin-top: 30px; margin-left:25px;"> <i class="im im-bus"></i> {{ strtoupper($bus->name) }}</p>
	                	                </div>
	                	            </div>
	                	            <div class="col-md-6">
	                	                <div class="row">
	                	                    <div class="col-md-8" style="margin-top:20px;">
	                	                        <ul class="booking-item-features booking-item-features-sign clearfix">
	                	                        	@foreach ($bus->bus_features as $f)
	                	                        		<li rel="tooltip" data-placement="top" title="{{ $f->name }}">
	                	                        			<i class="{{ $f->icon }}"></i>
	                	                        		</li>
	                	                        	@endforeach
	                	                        </ul>
	                	                    </div>
	                	                </div>
	                	            </div>
	                	            <div class="col-md-2">
	                	            	<button type="button" style="margin-top:20px;" class="btn btn-primary">Select</button>
	                	            </div>
	                	        </div>
	                	    </a>
	                	</li>
	                @endforeach
	            </ul>
	        </div>
	    </div>
	    <div class="gap"></div>
	</div>

@endsection