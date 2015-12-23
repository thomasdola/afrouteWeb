@extends('master')


@section('content')

	<div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <i class="fa fa-check round box-icon-large box-icon-center box-icon-success mb30"></i>	
                    <h2 class="text-center">{{ ucwords(Auth::user()->get()->name) }}, your payment was successful!</h2>
                    <h5 class="text-center mb30">Booking details has been send to {{ Auth::user()->get()->email }}</h5>
                    <ul class="order-payment-list list mb30">
                        <li>
                            <div class="row">
                                <div class="col-xs-9">
                                    <h5><i class="fa fa-plane"></i> Trip from {{ $trip->departure_station }} to {{ $trip->destination_station }} for {{ ucwords($data["passenger_name"]) }}</h5>
                                    <p><small>{{ $trip->departure_date->toFormattedDateString() }} / {{ $code = $data["code"] }}</small>
                                    </p>
                                </div>
                                <div class="col-xs-3">
                                    <p class="text-right"><span class="text-lg">₵ {{ $trip->fare }}</span>
                                    </p>
                                </div>
                                <div class="col-md-1 text-center">
                                    <a href="{{ route('ticketing', ['code'=> $code]) }}" class="btn btn-primary btn-xs" title="">Download Ticket</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <div class="col-md-12 text-center">
                        <a href="{{ route('customer_booking_history') }}" class="btn btn-primary" title="">Booking History</a>
                    </div>
                </div>
            </div>
            <div class="gap"></div>
        </div>

@endsection