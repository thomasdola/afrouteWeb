@extends('master')


@section('content')

	<div class="container">
            <div class="gap"></div>
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <i class="fa fa-check round box-icon-large box-icon-center box-icon-warning mb30"></i>	
                    <h2 class="text-center">{{ ucwords(Auth::user()->get()->name) }}, your reservation was successful!</h2>
                    <div class="text-center">
                        <h4 class=" text-danger">Need to Pay before {{ $trip->departure_date->copy()->subDay()->toFormattedDateString() }} or the reservation will be Cancelled.</h4>
                    </div>
                    <h5 class="text-center mb30">Reservation details</h5>
                    <ul class="order-payment-list list mb30">
                        @for ($i = 1; $i <= $passengers; $i++)
                            <li>
                                <div class="row">
                                    <div class="col-xs-9">
                                        <h5><i class="fa fa-car"></i> Trip from {{ $trip->departure_station }} to {{ $trip->destination_station }} for {{ ucwords($data["passenger_name_$i"]) }}</h5>
                                        <p><small>{{ $trip->departure_date->toFormattedDateString() }}</small>
                                        </p>
                                    </div>
                                    <div class="col-xs-3">
                                        <p class="text-right"><span class="text-lg">₵ {{ $trip->fare }}</span>
                                        </p>
                                    </div>
                                </div>
                            </li>
                        @endfor
                    </ul>
                    <div class="col-md-12 text-center">
                        <a href="{{ route('customer_booking_history') }}" class="btn btn-primary" title="">Booking History</a>
                    </div>
                </div>
            </div>
            <div class="gap"></div>
        </div>

@endsection