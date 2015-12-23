@extends('admin_master')

@section('content')

	<div class="container">
        <h3 class="booking-title">Admin</h3>
        <div class="row">
            @include('partials.admin_account_aside')
            <div class="col-md-9">
                <table class="table table-bordered table-striped table-booking-history">
                	<caption><b><h3>Trasanctions for {{ Carbon\Carbon::today()->toFormattedDateString() }}</h3></b></caption>
                    <thead>
                        <tr>
                            <th>Order Code</th>
                            <th>Order Date</th>
                            <th>Execution Date</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bookings as $p)
                            <tr>
                                <td>{{ $p -> booking -> code }}</td>
                                <td>{{ $p -> updated_at -> toFormattedDateString() }}</td>
                                <td>{{ $p -> trip -> departure_date -> toFormattedDateString() }}</td>
                                <td>{{ $p -> trip -> fare }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                    	<tr>
                    		<td></td>
                    		<td></td>
                    		<td class="text-uppercase"><b>Total</b></td>
                    		<td>{{ $total = $bookings->sum('amount') }}</td>
                    	</tr>
                    </tfoot>
                </table>
                <div class="gap gap-small"></div>
                <div class="col-md-3 col-md-offset-9">
                	<table class="table table-bordered table-striped table-booking-history">
	                	<caption><b><h3>Deduction</h3></b></caption>
	                	<thead>
	                		<tr>
	                			<th>Amount</th>
	                		</tr>
	                	</thead>
	                	<tbody class="text-center">
	                		<tr>
	                			<td>{{ $deduction = $bookings -> count() * 1 }}</td>
	                		</tr>
	                	</tbody>
	                </table>
                </div>
                <div class="gap gap-small"></div>
                <div class="col-md-3 col-md-offset-9">
                	<table class="table table-bordered table-striped table-booking-history">
	                	<caption><b><h3>Actual Amount</h3></b></caption>
	                	<thead>
	                		<tr>
	                			<th>Amount</th>
	                		</tr>
	                	</thead>
	                	<tbody class="text-center">
	                		<tr>
	                			<td>{{ $total - $deduction }}</td>
	                		</tr>
	                	</tbody>
	                </table>
                </div>
            </div>
        </div>
        <div class="gap"></div>
    </div>

@endsection