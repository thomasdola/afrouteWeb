@extends('company_master')

@section('styles')

    <style type="text/css" media="screen">
        .btn{
            display: inline-block;
        }
    </style>

@endsection


@section('content')

        <div class="container">
            <div class="col-md-10">
                <h1 class="booking-title">All Trips</h1>
            </div>
            <div class="col-md-2">
            <div class="gap gap-small"></div>
                <div class="text-right">
                <a href="{{ action('CompaniesTripsController@create') }}" class="
                    @if ($stations_number < 2)
                         disabled 
                    @endif
                btn btn-primary pull-right" title="">Add New Trip</a>
            </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                
                @include('partials.company_account_aside')

                <div class="col-md-9">
                    <table class="table table-bordered table-striped table-booking-history" id="bT">
            <thead>
                <tr>
                    <th>Departure</th>
                    <th>Stop(s)</th>
                    <th>Destination</th>
                    <th>Departure Date</th>
                    <th>Departure Time</th>
                    <th>Duration</th>
                    {{-- <th>Trip Type</th> --}}
                    <th>Fare</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($trips as $trip)
                    <tr>
                        <td class="booking-history-title">{{ $trip -> departure_station }}</td>
                        <td>{{ $trip -> stops }}</td>
                        <td>{{ $trip -> destination_station }}</td>
                        <td>{{ $trip -> departure_date->toFormattedDateString() }}</td>
                        <td>{{ $trip -> departure_time }}</td>
                        <td>{{ $trip -> duration }}</td>
                        <td>{{ $trip -> fare }}</td>
                        <td>
                           
                                @if ($trip->bookings->count() > 0)
                                    <a href="{{ route('company.trips.edit', [$trip]) }}" class="btn btn-xs btn-block btn-info" title="" disabled >Edit</a>
                                @else
                                    <a href="{{ route('company.trips.edit', [$trip]) }}" class="btn btn-xs btn-block btn-info" title="">Edit</a>
                                @endif
                        
                            
                                @if ($trip->bookings->count() > 0)
                                    @if ($trip -> departure_date -> lt(Carbon\Carbon::today()))
                                        {!! Form::open(['method' => 'DELETE', 'action'=>['CompaniesTripsController@destroy', $trip]]) !!}
                                            <button type="submit" class="third btn btn-xs btn-warning btn-block btn-xs">remove</button>
                                        {!! Form::close() !!}
                                    @elseif($trip -> departure_date -> gt(Carbon\Carbon::today()))
                                        {!! Form::open(['method' => 'DELETE', 'action'=>['CompaniesTripsController@destroy', $trip]]) !!}
                                            <button type="submit" disabled class="third btn btn-xs btn-warning btn-block btn-xs">delete</button>
                                        {!! Form::close() !!}
                                    @else
                                        {!! Form::open(['method' => 'DELETE', 'action'=>['CompaniesTripsController@destroy', $trip]]) !!}
                                            <button type="submit" disabled class="third btn btn-xs btn-warning btn-block btn-xs">delete</button>
                                        {!! Form::close() !!}
                                    @endif
                                    
                                @elseif($trip->bookings->count() == 0)
                                    @if ($trip -> departure_date -> lt(Carbon\Carbon::today()))
                                        {!! Form::open(['method' => 'DELETE', 'action'=>['CompaniesTripsController@destroy', $trip]]) !!}
                                            <button type="submit" class="third btn btn-xs btn-warning btn-block btn-xs">remove</button>
                                        {!! Form::close() !!}
                                    @elseif($trip -> departure_date -> gt(Carbon\Carbon::today()))
                                        {!! Form::open(['method' => 'DELETE', 'action'=>['CompaniesTripsController@destroy', $trip]]) !!}
                                            <button type="submit" disabled class="third btn btn-xs btn-warning btn-block btn-xs">delete</button>
                                        {!! Form::close() !!}
                                    @else
                                        {!! Form::open(['method' => 'DELETE', 'action'=>['CompaniesTripsController@destroy', $trip]]) !!}
                                            <button type="submit" class="third btn btn-xs btn-warning btn-block btn-xs">delete</button>
                                        {!! Form::close() !!}
                                    @endif
                                @endif
                            
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
                </div>
            </div>
        </div>

@endsection


@section('scripts')

<script>
    $(function(){
        $('#bT').dataTable();
    })
</script>

@endsection