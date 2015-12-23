@extends('admin_master')


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



@section('styles')

    <style type="text/css" media="screen">
        .alert-noData{
            background: #1c9fe3;
            color: white;
            border-radius: 0;
        }
    </style>

@endsection


@section('content')

    <div class="container">
            <h3 class="booking-title">Admin</h3>
            <div class="row">
                @include('partials.admin_account_aside')

                <div class="col-md-5 col-md-offset-2">
                <h3>Booking Report for {{ ucwords($travel_company) }}</h3>
                {!! Form::open(['class'=>'booking-item-dates-change mb30', 'method'=>'post', 'action'=>'AdminReportsController@booking_report_generate']) !!}
                        <div class="form-group">
                            <label>Terminal</label>
                            <input type="text" readonly value="{{ ucwords($travel_company) }}" class="form-control">
                        </div>
                        <div class="form-group form-group-icon-left"><i class="fa fa-map-marker input-icon input-icon-hightlight"></i>
                            <label>Trips</label>
                            <select class="form-control" name="trip_id" required>
                                @foreach ($trips as $t)
                                    <option value="{{ $t -> id }}">
                                        <span>
                                            {{ $t -> departure_station }} - {{ $t -> destination_station }} (dep_date: {{ Carbon\Carbon::parse($t -> departure_date)->toFormattedDateString() }}) 
                                        </span>
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Format</label>
                            <input type="text" readonly value="PDF" class="form-control">
                        </div>
                        {{-- <div class="form-group form-group-icon-left"><i class="fa fa-map-marker input-icon input-icon-hightlight"></i>
                            <label>Format</label>
                            <select class="form-control" name="file_format" required>
                                <option value="pdf">PDF</option>
                                <option value="excel">Excel</option>
                            </select>
                        </div> --}}

                        {{-- <div class="input-daterange">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-hightlight"></i>
                                        <label>From</label>
                                        <input required name="start" class="form-control" type="text" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-hightlight"></i>
                                        <label>To</label>
                                        <input required name="end" class="form-control" type="text" />
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        <div class="text-center">
                            <input class="btn btn-success btn-block" type="submit" value="Generate" />
                            <a href="{{ route('admin_booking_reports') }}" class="btn btn-danger btn-block">Go Back</a>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
            <div class="gap"></div>
            @if (Session::has('info'))
                <div class="col-md-5 col-md-offset-5">
                    <div class="alert alert-noData text-center">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        {{ Session::get('info') }}
                    </div>
                </div>
            @endif
        </div>

@endsection

@section('scripts')
    
    <script type="text/javascript" charset="utf-8">
        $(function()
        {
            $('select').select2({
                     placeholder: "Choose a city",
                });
        })
    </script>

@endsection