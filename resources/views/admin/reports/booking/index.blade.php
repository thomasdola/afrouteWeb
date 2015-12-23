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
                <h3>Booking Report For</h3>
                {!! Form::open(['class'=>'booking-item-dates-change mb30', 'method'=>'get', 'action'=>'AdminReportsController@booking_reports_to_generate']) !!}
                        <div class="form-group form-group-icon-left"><i class="fa fa-map-marker input-icon input-icon-hightlight"></i>
                            <label>Choose Travel Terminal</label>
                            <select class="form-control" name="travel_terminal" required>
                                @foreach ($companies as $c)
                                    <option value="{{ $c -> slug }}">{{ ucwords($c -> name) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="text-center">
                            <input class="btn btn-danger btn-block" type="submit" value="Next" />
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