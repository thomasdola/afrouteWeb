@extends('admin_master')


@section('content')

	<div class="container">
        <h3 class="booking-title">Admin</h3>
        <div class="row">
            @include('partials.admin_account_aside')
            <div class="col-md-9">
                @if ($bookings)
                    <table class="table table-bordered table-striped table-booking-history">
                        <caption><b><h3>Transactions for {!! Carbon\Carbon::today()->toFormattedDateString() !!}</h3></b></caption>
                        <thead>
                            <tr>
                                <th>Travel Company</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($companies as $company)
                                <tr>
                                    <td><a href="{{ route('one_account', ['slug'=>$company->slug]) }}" title="">{{ $company -> name }}</a></td>
                                    <th>{{ Carbon\Carbon::today()->toFormattedDateString() }}</th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="panel">
                        No Paid Bookings Yet..
                    </div>
                @endif
            </div>
        </div>
        <div class="gap"></div>
    </div>

@endsection