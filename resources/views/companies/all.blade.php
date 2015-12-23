@extends('master')

@section('styles')

    <style type="text/css" media="screen">
       #filterList .mix{
        display: none;
       }
        
    </style>

@endsection


@section('content')

	<div class="container">
        <ul class="breadcrumb">
            <li class="active">All Travel Companies</li>
        </ul>
        <div class="gap"></div>
        <div class="row">
            {{-- <div class="col-md-3">
                <aside class="booking-filters text-white">
                    <h3>Filter By:</h3>
                    <ul class="list booking-filters-list" id="Filter">
                        <li>
                            <h5 class="booking-filters-title">Star Rating</h5>
                            <div class="checkbox">
                                <label>
                                    <input class="i-check filter" value="5" type="checkbox" />5 star</label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input class="i-check filter" value="4" type="checkbox" />4 star</label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input class="i-check filter" value="3" type="checkbox" />3 star</label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input class="i-check filter" value="2" type="checkbox" />2 star</label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input class="i-check filter" value="1" type="checkbox" />1 star</label>
                            </div>
                        </li>
                    </ul>
                </aside>
            </div> --}}
            <div class="col-md-9 col-md-offset-2">
                <ul class="booking-list"  id="filterList">
                    <div class="row">
                            @foreach ($companies as $c)
                            <div class="col-md-6">
                                <li class="mix">
                                    <a class="booking-item" href="{{ route('single',['slug'=>$c->slug]) }}" style="margin-bottom: 30px; padding: 10px">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="booking-item-airline-logo">
                                                    <img src="{{ $c->travel_company_logo ? asset($c->travel_company_logo->path) : asset('img/OrangeLogo.png') }}" alt="Image Alternative text"/>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h5 class="booking-item-title" style="font-weight: bold; font-size: 13px; height: 50px; margin-top: 10px; margin-top: 0;">{{ $c -> name }}</h5>
                                                <p class="booking-item-address"><i class="fa fa-map-marker"></i> {{ $c -> address }}</p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </div>
                            @endforeach
                    </div>                   
                </ul>
                {{-- <div class="row">
                    <div class="col-md-6">
                        <p><small>530 Travel Companies. &nbsp;&nbsp;Showing 1 – 15</small>
                        </p>
                        <ul class="pagination">
                            <li class="active"><a href="#">1</a>
                            </li>
                            <li><a href="#">2</a>
                            </li>
                            <li><a href="#">3</a>
                            </li>
                            <li><a href="#">4</a>
                            </li>
                            <li><a href="#">5</a>
                            </li>
                            <li><a href="#">6</a>
                            </li>
                            <li><a href="#">7</a>
                            </li>
                            <li class="dots">...</li>
                            <li><a href="#">43</a>
                            </li>
                            <li class="next"><a href="#">Next Page</a>
                            </li>
                        </ul>
                    </div>
                </div> --}}
            </div>
        </div>
        <div class="gap"></div>
    </div>

@endsection