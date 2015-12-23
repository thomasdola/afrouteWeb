@extends('company_master')

@section('content')

	<div class="container">
            <h1 class="booking-title">Dashboard</h1>
        </div>




        <div class="container">
            <div class="row">
                
            @include('partials.company_account_aside')

                <div class="col-md-9">
                    <ul class="list list-inline user-profile-statictics mb30">
                        <li style="height: 200px;"><i class="fa fa-book user-profile-statictics-icon"></i>
                            <h5>{{ $number_of_paid_bookings }}</h5>
                            <p>Total Booked</p>
                        </li>
                        <li style="height: 200px;"><i class="fa fa-globe user-profile-statictics-icon"></i>
                            <h5>{{ $number_of_travel_bookings }}</h5>
                            <p>Total Traveled</p>
                        </li>
                        <li style="height: 200px;"><i class="fa fa-map-marker user-profile-statictics-icon"></i>
                            <h5>{{ $number_of_stations }}</h5>
                            <p>Stations</p>
                        </li>
                        <li style="height: 200px;"><i class="fa fa-car user-profile-statictics-icon"></i>
                            <h5>{{ $number_of_trips }}</h5>
                            <p>Trips</p>
                        </li>
                    </ul>
                    
                </div>
            </div>
        </div>

@endsection