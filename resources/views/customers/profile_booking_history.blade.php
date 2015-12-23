@extends('master')


@section('content')

	<div class="container">
        <h1 class="page-title">Booking History</h1>
        </div>


        <div class="container">
            <div class="row">
                
                @include('partials.customer_profile_aside')

                <div class="col-md-9">
                    <table class="table table-bordered table-striped" id="bT">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>For</th>
                                <th>Order Date</th>
                                <th>Execution Date</th>
                                <th>Cost</th>
                                <th>Current</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bookings as $b)
                                <tr>
                                    <td class="booking-history-title">
                                        {{ $b->trip->departure_station.' to '.$b->trip->destination_station}}
                                    </td>
                                    <td class="booking-history-title">
                                        {{ $b->passenger_name }}
                                    </td>
                                    <td>{{ $b -> updated_at -> toFormattedDateString() }}</td>
                                    <td>{{ $b -> trip -> departure_date -> toFormattedDateString() }}</td>
                                    <td>GHC ₵ {{ $b -> trip -> fare }}</td>
                                    <td class="text-center">
                                        @if ($b -> trip -> departure_date >= Carbon\Carbon::today() && $b -> status  == 'paid')
                                            <a href="{{ route('ticketing', ['code'=>$b->code]) }}" rel="tooltip" title="download PDF">
                                                <i class="fa fa-check"></i>
                                            </a>
                                        @else
                                            <i class="fa fa-times"></i>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($b -> status == "paid")
                                            <span class="label label-success">Paid</span>
                                        @elseif($b -> status == "reserved")
                                            <span class="label label-info">Pending</span>
                                        @elseif($b -> trip -> departure_date >= Carbon\Carbon::today() AND $b -> status == "cancelled")
                                            <span class="label label-default">Cancelled</span>
                                        @else
                                            <span class="label label-danger">Expired</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if($b -> trip -> departure_date >= Carbon\Carbon::today() AND $b -> status == "reserved")
                                            <a class="btn btn-primary btn-xs" href="{{ route('pay_reserve_booking_form', $b->code) }}" title="">Pay Now</a>
                                            
                                        @elseif($b -> trip -> departure_date == Carbon\Carbon::today() AND $b -> status == "paid" OR $b -> trip -> departure_date == Carbon\Carbon::tomorrow())
                                            <span class="label label-primary">Ready</span>
                                        @elseif($b -> trip -> departure_date -> lt(Carbon\Carbon::today()) AND $b -> status == "paid")
                                            {!! Form::open(['url'=>'remove-booking', 'method'=>'delete']) !!}
                                                <input type="hidden" name="booking_id" value="{{ $b->id }}">
                                                <input class="btn btn-warning btn-xs" type="submit" value="Remove">
                                            {!! Form::close() !!}
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div id="payBox" class="mfp-with-anim mfp-hide mfp-dialog">
            <div class="tabbable">
                <ul class="nav nav-tabs" id="myTab">
                    <li class="active"><a href="#tab-1" data-toggle="tab">CashCard</a>
                    </li>
                    <li><a href="#tab-2" data-toggle="tab">SpeedBanking</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="tab-1">
                       <form action="single_submit" method="get" accept-charset="utf-8">
                           <div class="form-group">
                               {{-- <label for="reveiw">Your Review</label> --}}
                               <input name="cashcard_code" class="form-control" placeholder="xxxx-xxxx-xxxx"></input>
                           </div>
                           <div class="form-group text-right">
                               <input type="submit" value="pay now" class="btn btn-primary btn-block">
                           </div>
                       </form>
                    </div>
                    <div class="tab-pane fade" id="tab-2">
                        <form action="single_submit" method="get" accept-charset="utf-8">
                            <div class="form-group">
                                {{-- <label for="reveiw">Your Review</label> --}}
                                <input name="speedBanking_code" class="form-control" placeholder="xxxx-xxxx-xxxx"></input>
                            </div>
                            <div class="form-group text-right">
                                <input type="submit" value="pay now" class="btn btn-primary btn-block">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        {{-- <div id="cancelBox" class="mfp-with-anim mfp-hide mfp-dialog">
            <form action="single_submit" method="get" accept-charset="utf-8">
                <div class="form-group">
                    <label for="reveiw">Are You Sure?</label>
                </div>
                <div class="form-group text-right">
                    <button type="button" value="" class="btn btn-danger btn-block">Yes, Cancel Trip.</button>
                </div>
            </form>
        </div> --}}

@endsection

@senction('scripts')


@endsection