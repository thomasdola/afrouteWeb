@extends('master')

@section('styles')

    <style type="text/css" media="screen">
       #filterList .mix{
        display: none;
       } 
       .station{
        
        border-style: solid;
        padding: 5px;
       }
       .booking-item-car-title{
        /*font-weight: bold;*/
        font-size: 1.1em;
        border-right-style: dashed;
       }
       .last{
        border-right: none;
       }
    </style>

@endsection


@section('content')

	<div class="container">
            <ul class="breadcrumb">
                <li><a href="{{ route('welcome') }}">Home</a>
                </li>
                <li class="active">All Travel Stations</li>
            </ul>
            <div class="gap"></div>
            <div class="row">
                <div class="col-md-3">
                    <aside class="booking-filters text-white">
                        <h3>Filter By:</h3>
                        <ul class="list booking-filters-list" id="Filters">
                            <li>
                                <h5 class="booking-filters-title">Country</h5>
                                <div class="checkbox">
                                    <label>
                                        <input class="i-check filter" value=".Ghana" type="checkbox" />Ghana</label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input class="i-check filter" value=".Nigeria" type="checkbox" />Nigeria</label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input class="i-check filter" value=".Togo" type="checkbox" />Togo</label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input class="i-check filter" value=".Benin" type="checkbox" />Benin</label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input class="i-check filter" value=".Ivory Coast" type="checkbox" />Ivory Coast</label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input class="i-check filter" value=".Burkina Faso" type="checkbox" />Burkina Faso</label>
                                </div>
                            </li>
                            {{-- <li>
                                <h5 class="booking-filters-title">Travel Company</h5>
                                <div class="checkbox">
                                    <label>
                                        <input class="i-check" type="checkbox" />VIP</label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input class="i-check" type="checkbox" />VVIP</label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input class="i-check" type="checkbox" />SON-TRANS</label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input class="i-check" type="checkbox" />M-PLAZA</label>
                                </div>
                            </li> --}}
                        </ul>
                    </aside>
                </div>
                <div class="col-md-9">

        <ul class="booking-list" id="filterList">
            <li>
                <div class="row">
                    <div class="col-md-3">
                        <p class="booking-item-car-title"><b>Travel Company</b></p>
                    </div>
                    <div class="col-md-3">
                        <p class="booking-item-car-title"><b>Country</b></p>
                    </div>
                    <div class="col-md-2">
                        <p class="booking-item-car-title"><b>State/Region</b></p>
                    </div>
                    <div class="col-md-2">
                        <p class="booking-item-car-title"><b>City</b></p>
                    </div>
                    <div class="col-md-2">
                        <p class="booking-item-car-title last"><b>Location</b></p>
                    </div>
                </div>
            </li>
            @foreach ($stations as $s)
                <li class="booking-item mix {{ $s->country }} station" style="cursor: default;">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="booking-item-car-img">
                                {{-- <img src="img/Land-Rover-Range-Rover-Evoque.png" alt="Image Alternative text" title="Image Title" /> --}}
                                <p class="booking-item-car-title">{{ $s -> travel_company->name }}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <p class="booking-item-car-title">{{ $s -> country }}</p>
                        </div>
                        <div class="col-md-2">
                            <p class="booking-item-car-title">{{ $s -> region }}</p>
                        </div>
                        <div class="col-md-2">
                            <p class="booking-item-car-title">{{ $s -> city }}</p>
                        </div>
                        <div class="col-md-2">
                            <p class="booking-item-car-title last">{{ $s -> location }}</p>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>

    </div>
            </div>
            <div class="gap"></div>
        </div>

@endsection