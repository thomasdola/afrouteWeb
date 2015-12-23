@extends('master')

@section('styles')

    <style type="text/css" media="screen">
        .alert-welcome{
            position: absolute;
            z-index: 99999;
            width: 100%;
            background: black;
            color: #009999;
            text-align: center;
            top: 0;
            font-size: 1.5em;
            font-style: italic;
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
            <h1 class="page-title">Profile</h1>
        </div>




        <div class="container">
            <div class="row">
                

                @include('partials.customer_profile_aside')


                <div class="col-md-4">
                    <h4>My Trip Records</h4>
                    <ul class="list list-inline user-profile-statictics mb30">
                        {{-- <li><i class="fa fa-building-o user-profile-statictics-icon"></i>
                            <h5>15</h5>
                            <p>Cities</p>
                        </li>
                        <li><i class="fa fa-flag-o user-profile-statictics-icon"></i>
                            <h5>3</h5>
                            <p>Countries</p>
                        </li> --}}
                        <li style="height: 200px;"><i class="fa fa-car user-profile-statictics-icon"></i>
                            <h5>{{ $total_traveled }}</h5>
                            <p>Trips</p>
                        </li>
                    </ul>
                </div>
                <div class="col-md-3">
                <h3>Search For Trips</h3>
                {!! Form::open(['class'=>'booking-item-dates-change mb30', 'method'=>'get', 'action'=>'PagesController@search']) !!}
                        <div class="form-group form-group-icon-left"><i class="fa fa-map-marker input-icon input-icon-hightlight"></i>
                            <label>From</label>
                            <select class="form-control" name="departure_station" required>
                                @include('partials._cities')
                            </select>
                        </div>
                        <div class="form-group form-group-icon-left"><i class="fa fa-map-marker input-icon input-icon-hightlight"></i>
                            <label>To</label>
                            <select class="form-control" name="destination_station" required>
                                @include('partials._cities')
                            </select>
                        </div>
                        <div class="form-group form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-hightlight"></i>
                            <label>Departing</label>
                            <input name="start" class="date-pick form-control" data-date-format="MM d, D" type="text" />
                        </div>
                        <div class="text-center">
                            <input class="btn btn-primary" type="submit" value="Search" />
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

        @if (Session::has('info'))
            <div class="alert alert-welcome">
                {{ Session::get('info') }}
            </div>
        @endif

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