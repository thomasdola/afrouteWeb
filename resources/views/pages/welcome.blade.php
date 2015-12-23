@extends('master')

@section('styles')

    <style type="text/css" media="screen">
        .alert {
            border-color: rgba(149, 149, 149, 0.3);
            border-radius: 50px;
            width: 50px;
        }
        .alert > [data-notify="icon"] {
            color: white;
            display: inline-block;
            margin-right: 10px;
        }
        .alert > [data-notify="title"] {
            color: rgb(255, 255, 255);
            display: inline-block;
            font-size: 1.2em;
        }

        .alert-twitter{
            background-color: #0084b4;
        }
        .alert-facebook{
            background-color: #3b5998;
        }

        .select2-container .select2-selection--single {
          height: 45px;
          border-radius: 0;
          border-color: #cccccc;
          color: #555555;
          line-height: 1.6em;
          background: rgba(255, 255, 255, 0.498039);
        }
        .select2-container .select2-selection--single .select2-selection__rendered {
          padding-left: 15px;
          padding-right: 20px;
          padding-top: 10px;
          margin-left: 25px;
        }
        .select2-container--default .select2-results__option--highlighted[aria-selected] {
          background-color: rgb(237, 131, 35);
          color: white; 
        }
        .select2-container--default .select2-selection--single .select2-selection__arrow {
            top: 10px;
        }
        .select2-results__options {
            background: rgba(255, 255, 255, 0.498039);
        }
        /*.full-height{
            background: #4d4d4e;
        }*/

    
    </style>

@endsection


@section('content')

    <!-- TOP AREA -->
        <div class="top-area show-onload">
            <div class="bg-holder full">
                <div class="bg-front full-height bg-front-mob-rel">
                    <div class="container full-height">
                        <div class="rel full-height">
                            <div class="tagline visible-lg">
                            <span>Travelling </span>
                                <ul>
                                    <li class="active">Simplified</li>
                                </ul>
                            <span></span>    
                            </div>
                            <div class="search-tabs search-tabs-bg search-tabs-bottom mb50">
                                <div class="tabbable">
                                    <div class="tab-content">
                                        <div class="tab-pane fade in active" id="tab-2">
                                            <h2>Search for Trips</h2>
                                            
                                                <div class="tabbable">
                                                    <ul class="nav nav-pills nav-sm nav-no-br mb10" id="flightChooseTab">
                                                        <li class="active"><a href="#trip-search-1" data-toggle="tab">One Way</a>
                                                        </li>
                                                    </ul>
                                                    <div class="tab-content">
                                                        <div class="tab-pane fade in active" id="trip-search-1">
                                                        {!! Form::open(['method'=>'get', 'data-in_search', 'action'=>'PagesController@search']) !!}
                                                        <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="row">
                                                                        <div class="col-md-6 col-sm-6 col-xs-12" id="from">
                                                                            <div class="form-group form-group-lg form-group-icon-left"><i style="color: white;" class="fa fa-map-marker input-icon input-icon-highlight"></i>
                                                                                <label>From</label>
                                                                                <select class="form-control" name="departure_station" required>
                                                                                    @include('partials._cities')
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 col-sm-6 col-xs-12" id="to">
                                                                            <div class="form-group form-group-lg form-group-icon-left"><i style="color: white;"  class="fa fa-map-marker input-icon input-icon-highlight"></i>
                                                                                <label>To</label>
                                                                                <select class="form-control" name="destination_station" required>
                                                                                    @include('partials._cities')
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="input-daterange" data-date-format="M d, D">
                                                                        <div class="row">
                                                                            <div class="col-md-6 col-xs-12 col-sm-6" id="date">
                                                                                <div class="form-group form-group-lg form-group-icon-left"><i style="color: white;"  class="fa fa-calendar input-icon input-icon-highlight"></i>
                                                                                    <label>Departing</label>
                                                                                    <input name="start" class="date-pick form-control" data-date-format="M d, D" type="text" required/>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6 col-xs-12 col-sm-6" id="search">
                                                                                <div class="form-group">
                                                                                    <label style="color: transparent;">.</label>
                                                                                    <button class="btn btn-primary btn-lg btn-block search" type="submit">Search</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        {!! Form::close() !!}
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- <div class="text-right">
                                                    <button class="btn btn-primary btn-lg" type="submit">Search</button>
                                                </div> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="owl-carousel owl-slider owl-carousel-area visible-lg" >
                    <div class="bg-holder full">
                        {{-- <div class="bg-mask"></div> --}}
                        {{-- <img src="{{ asset('img/backgrounds/sunny-bg.jpg') }}" alt=""> --}}
                        <div class="bg-img" style="background-image:url('img/backgrounds/sunny-bg.jpg');"></div>
                    </div>
                </div>
                {{-- <div class="bg-mask hidden-lg"></div> --}}
            </div>
        </div>
        <!-- END TOP AREA  -->
        @if ( ! $trips_to_display -> isEmpty())
            
            <div class="tripDisplayContainer hidden-xs hidden-sm">
                <ul class="tripTag">
                    <li>
                        <p>Available Trips: </p>
                    </li>
                    <li>
                        <ul id="tripShow" class="marquee">
                            @foreach ($trips_to_display as $e)
                                <li>
                                    <a href="#" title="">{{ ucwords($e->departure_station) }} to {{ ucwords($e->destination_station) }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                </ul>
            </div>

            <div class="gap"></div>

        @endif

    <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="row row-wrap" data-gutter="120">
                        <div class="col-md-4 col-xs-12 col-sm-4 text-center">
                            <div class="thumb">
                                <header class="thumb-header"><i class="fa fa-car box-icon-black round box-icon-big animate-icon-top-to-bottom"></i>
                                </header>
                                <div class="thumb-caption">
                                    <h5 class="thumb-title"><a class="text-darken" href="{{ route('all_companies') }}">Travel Companies</a></h5>
                                    <p class="thumb-desc">Get the best transportation and good service delivery</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-xs-12 col-sm-4 text-center">
                            <div class="thumb">
                                <header class="thumb-header"><i class="fa fa-send box-icon-black round box-icon-big animate-icon-top-to-bottom"></i>
                                </header>
                                <div class="thumb-caption">
                                    <h5 class="thumb-title"><a class="text-darken" href="{{ route('all_stations') }}">Destinations</a></h5>
                                    <p class="thumb-desc">Quick, Easy to find and safe to depart and arrive at without any hassle and tussle</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-xs-12 col-sm-4 text-center">
                            <div class="thumb">
                                <header class="thumb-header"><i class="fa fa-question box-icon-black round box-icon-big animate-icon-top-to-bottom"></i>
                                </header>
                                <div class="thumb-caption">
                                    <h5 class="thumb-title"><a class="text-darken" href="{{ route('faq') }}">FAQ</a></h5>
                                    <p class="thumb-desc">Get understanding to questions on your mind and easy fix to difficulties about our processes</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="gap gap-small"></div>
        </div>
       {{--  <div class="container">
            <div class="gap"></div>
            <h2 class="text-center">Top Destinations</h2>
            <div class="gap">
                <div class="row row-wrap">
                    <div class="col-md-3">
                        <div class="thumb">
                            <header class="thumb-header">
                                <a class="hover-img curved" href="#">
                                    <img src="{{ asset('img/ghana.jpg') }}" alt="Image Alternative text" />
                                </a>
                            </header>
                            <div class="img-left">
                                <img src="{{ asset('img/flags/32/gh.png') }}" alt="Image Alternative text" title="Image Title" />
                            </div>
                            <div class="thumb-caption">
                                <h4 class="thumb-title"><a class="text-darken" href="#">Ghana</a></h4>
                                <div class="thumb-caption">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="thumb">
                            <header class="thumb-header">
                                <a class="hover-img curved" href="#">
                                    <img src="{{ asset('img/nigeria.jpg') }}" alt="Image Alternative text" />
                                </a>
                            </header>
                            <div class="img-left">
                                <img src="{{ asset('img/flags/32/ng.png') }}" alt="Image Alternative text" title="Image Title" />
                            </div>
                            <div class="thumb-caption">
                                <h4 class="thumb-title"><a class="text-darken" href="#">Nigeria</a></h4>
                                <div class="thumb-caption">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="thumb">
                            <header class="thumb-header">
                                <a class="hover-img curved" href="#">
                                    <img src="{{ asset('img/ic.jpg') }}" alt="Image Alternative text"/>
                                </a>
                            </header>
                            <div class="img-left">
                                <img src="{{ asset('img/flags/32/ie.png') }}" alt="Image Alternative text" title="Image Title" />
                            </div>
                            <div class="thumb-caption">
                                <h4 class="thumb-title"><a class="text-darken" href="#">Ivory Coast</a></h4>
                                <div class="thumb-caption">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="thumb">
                            <header class="thumb-header">
                                <a class="hover-img curved" href="#">
                                    <img src="{{ asset('img/bf.jpg') }}" alt="Image Alternative text" />
                                </a>
                            </header>
                            <div class="img-left">
                                <img src="{{ asset('img/flags/32/bf.png') }}" alt="Image Alternative text" title="Image Title" />
                            </div>
                            <div class="thumb-caption">
                                <h4 class="thumb-title"><a class="text-darken" href="#">Burkina Faso</a></h4>
                                <div class="thumb-caption">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
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
                $('#tripShow').marquee();

                $('select').select2({
                     placeholder: "Choose a city",
                });

                

                $.notify({
                    icon: 'fa fa-thumbs-o-up fa-2x',
                    url: 'https://facebook.com/afroute',
                    target: '_blank',
                },{
                    timer: 10000000,
                    type: 'facebook',
                    delay: 5000,
                    placement: {
                        from: 'bottom',
                        align: 'left'
                    },
                    animate:{
                        enter: "animated fadeInUp",
                        exit: "animated fadeOutDown"
                    },
                    allow_dismiss: true,
                    template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                        '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>'+
                        '<span data-notify="icon"></span>' +
                        '<span data-notify="title">{1}</span>' +
                        '<a href="{3}" target="{4}" data-notify="url"></a>'+
                    '</div>'
                });

                $.notify({
                    icon: 'fa fa-twitter-square fa-2x',
                    url: 'https://twitter.com/afroute',
                    target: '_blank',
                },{
                    timer: 10000000,
                    type: 'twitter',
                    delay: 5000,
                    placement: {
                        from: 'bottom',
                        align: 'left'
                    },
                    animate:{
                        enter: "animated fadeInUp",
                        exit: "animated fadeOutDown"
                    },
                    allow_dismiss: true,
                    template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                        '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>'+
                        '<span data-notify="icon"></span>' +
                        '<span data-notify="title">{1}</span>' +
                        '<a href="{3}" target="{4}" data-notify="url"></a>'+
                    '</div>'
                });

            setInterval(function(){
                var element = $('.alert');
                    element.addClass('animated rubberBand')
                }, 3000);

            });
    </script>

@endsection