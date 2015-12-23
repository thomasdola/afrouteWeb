@extends('master')

@section('styles')

    <style type="text/css" media="screen">
       #filterList .mix{
        display: none;
       } 

       .select2-container .select2-selection--single {
         height: 34px;
         border-radius: 0;
         border-color: #cccccc;
         color: #555555;
       }
       .select2-container .select2-selection--single .select2-selection__rendered {
         padding-left: 15px;
         padding-right: 20px;
         padding-top: 2px;
         margin-left: 15px;
       }
       .select2-container--default .select2-results__option--highlighted[aria-selected] {
         background-color: rgb(237, 131, 35);
         color: white; 
       }
       

    </style>

@endsection


@section('content')

	<div class="container">
            <ul class="breadcrumb">
                <li><a href="{{ route('welcome') }}">Home</a>
                </li>
                <li class="active">Search Results</li>
            </ul>

            <h3 class="booking-title">@if($trips){{ $trips->count() }}@endif Trips from {{ $from }} to {{ $to }} on {{ $start->toFormattedDateString() }}</h3>
            <div class="col-md-8 col-md-offset-4" id="newSearch">
                <form class="">
                {!! Form::open(['class'=>'booking-item-dates-change', 'method'=>'get', 'action'=>'PagesController@search']) !!}
                    <div class="row">
                        <div class="col-md-3 col-xs-6 col-sm-3">
                            <div class="form-group form-group-icon-left"><i class="fa fa-map-marker input-icon input-icon-hightlight"></i>
                                <label>From</label>
                                <select class="form-control" name="departure_station" required>
                                    @include('partials._cities')
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 col-xs-6 col-sm-3">
                            <div class="form-group form-group-icon-left"><i class="fa fa-map-marker input-icon input-icon-hightlight"></i>
                                <label>To</label>
                                <select class="form-control" name="destination_station" required>
                                    @include('partials._cities')
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 col-xs-6 col-sm-3">
                            <div class="form-group form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-hightlight"></i>
                                <label>Departing</label>
                                <input class="date-pick form-control" data-date-format="MM d, D" type="text" name="start" value="{{ $start }}" />
                            </div>
                        </div>
                        <div class="col-md-3 col-xs-6 col-sm-3">
                            <label style="color: white;">.</label>
                            <input type="submit" class="btn btn-block btn-primary" value="Update Search">
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
            <div class="row">
                <div class="col-md-3 hidden-xs hidden-sm">

                    <aside class="booking-filters text-white">
                        <h3>Filter By:</h3>
                        <ul class="list booking-filters-list" id="Filters">
                            <li>
                                <h5 class="booking-filters-title">Stops </h5>
                                <div class="checkbox">
                                    <label>
                                        <input class="i-check filter" value=".0" type="checkbox" />Non-stop
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input class="i-check filter" value=".1" type="checkbox" />1 Stop
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input class="i-check filter" value=".plus" type="checkbox" />2+ Stops
                                    </label>
                                </div>
                            </li>
                            {{-- <li class="text-capitalize">
                                <h5 class="booking-filters-title">Travel Companies </h5>
                                @foreach ($travel_companies as $tc)
                                    <div class="checkbox">
                                        <label>
                                            <input class="i-check filter" data-filter=".{{ $tc->slug }}" type="checkbox" value=".{{ $tc->slug }}" />{{ $tc->name }}
                                        </label>
                                    </div>
                                @endforeach
                            </li> --}}
                            <li>
                                <h5 class="booking-filters-title">Departure Time</h5>
                                <div class="checkbox">
                                    <label>
                                        <input class="i-check filter" type="checkbox" value=".Morning" data-filter=".Morning" />Morning (3:00a - 11:59a)</label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input class="i-check filter" type="checkbox" value=".Afternoon" data-filter=".Afternoon" />Afternoon (12:00p - 5:59p)</label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input class="i-check filter" type="checkbox" value=".Evening" data-filter=".Evening" />Evening (6:00p - 11:59p)</label>
                                </div>
                            </li>
                        </ul>
                    </aside>
                </div>
                <div class="col-md-9">
                    <ul class="booking-list" id="filterList">
                        
                        @if ($trips)
                            @foreach ($trips as $trip)
                            
                            <li class="result-block mix {{ $trip->stops>=2?'more':$trip->stops }} {{ $trip->travel_company->slug }} {{ $trip->departure_time }}" data-fare="{{ $trip->fare }}" data-duration="{{ $trip->duration }}" data-stops="{{ $trip->stops }}">
                                <div class="booking-item-container">
                                    <div class="booking-item">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="booking-item-airline-logo">
                                                    <img src="{{ $trip -> travel_company->travel_company_logo ? asset($trip ->travel_company->travel_company_logo->path) : asset('img/OrangeLogo.png')}}" alt="Logo" title="{{ $trip->travel_company->name }}" />
                                                    <p>{{ $trip -> travel_company -> name }}</p>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="booking-item-flight-details">
                                                    <div class="col-md-6">
                                                        <Strong>Departure</Strong>
                                                        <div class="booking-item-departure"><i class="im im-bus"></i>
                                                            
                                                            <p class="booking-item-destination capitalize">{{ ucfirst($trip -> departure_station) }}</p>
                                                        </div>
                                                    </div>    
                                                    <div class="col-md-6">
                                                        <Strong>Destination</Strong>
                                                        <div class="booking-item-arrival"><i class="im im-bus"></i>
                                                            
                                                            <p class="booking-item-destination capitalize">{{ ucfirst($trip -> destination_station) }}</p>
                                                        </div>
                                                    </div>    
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <strong>Duration: </strong>
                                                <p>{{ $trip -> duration }}</p>
                                            </div>
                                            <div class="col-md-3"><span class="booking-item-price">₵ {{ $trip -> fare }}</span><span>/person</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="booking-item-details">
                                        <div class="row">
                                            <div class="col-md-6">
                                            <h5>Trip Details</h5>
                                                <div class="col-md-12">
                                                    <p><strong>Departure Time</strong>: {{ $trip -> departure_time }}</p>
                                                </div>
                                                <div class="col-md-12">
                                                    <p><strong>Boarding Point:</strong> <i>{{ $trip -> boarding_point }}</i></p>
                                                </div>
                                                <div class="col-md-12">
                                                    <p><strong>Number of Stops: </strong>: {{ $trip -> stops }}</p>
                                                </div>
                                                <div class="col-md-12">
                                                    <p><strong>Total Seats: </strong>: {{ $ts = $trip -> number_of_seats }}</p>
                                                </div>
                                                <div class="col-md-12">
                                                    <p><strong>Number of Seats Left:</strong> <i>{{ $sl = $ts - $trip -> bookings -> where('status', 'paid') ->  where('status', 'reserved') -> count() }}</i></p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                {!! Form::open(['action'=>['BookingsController@first', $trip->id], 'method'=>'get']) !!}
                                                    <div class="form-group form-group-lg form-group-select-plus">
                                                        <label>Passengers</label>
                                                        <div class="btn-group btn-group-select-num active" data-toggle="buttons">
                                                            <label class="btn btn-primary">
                                                                <input type="radio" selected required name="passengers" value="1" />
                                                                1
                                                            </label>
                                                            @unless ( $sl < 3 )
                                                                <label class="btn btn-primary">
                                                                    <input type="radio" required name="passengers" value="2" />
                                                                    2
                                                                </label>
                                                            @endunless

                                                            @unless ( $sl < 4)
                                                                <label class="btn btn-primary">
                                                                    <input type="radio" required name="passengers" value="3" />
                                                                    3
                                                                </label>
                                                            @endunless
                                                            
                                                            @unless ( $sl < 5 )
                                                                <label class="btn btn-primary">
                                                                    <input type="radio" required name="passengers" value="4" />
                                                                    4
                                                                </label>
                                                            @endunless
                                                            
                                                            @unless( $sl < 6 )
                                                                <label class="btn btn-primary">
                                                                    <input type="radio" required name="passengers" value="5" />
                                                                    5
                                                                </label>
                                                            @endunless
                                                            <label></label>
                                                            
                                                        </div>
                                                        
                                                    </div>
                                                    {{-- <input type="hidden" name="trip_id" value="2"> --}}
                                                    @if ($sl >= 1 )
                                                        <div class="form-group">
                                                            <input type="submit" class="btn btn-primary" name="" value="Book Now">
                                                        </div>
                                                    @else
                                                        <button type="button" class="btn btn-success" disabled >Bus Full</button>
                                                    @endif
                                                {!! Form::close() !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            @endforeach
                        @endif
                        
                    </ul>
                    <p class="text-right">Not what you're looking for? <a href="#newSearch">Try your search again</a>
                    </p>
                </div>
            </div>
            <div class="gap"></div>
        </div>
        @if (Session::has('search_error') OR $errors->any())
            <div class="alert search-error">
                {{ Session::get('search_error') }}
                @foreach ($errors->all() as $e)
                    {{ $e }}
                @endforeach
            </div>
        @endif
@endsection

@section('scripts')

    <script type="text/javascript">
        $(function()
            {
                $('select').select2({
                    placeholder: "Select a state",
                    allowClear: true
                });
            });
    </script>

@endsection