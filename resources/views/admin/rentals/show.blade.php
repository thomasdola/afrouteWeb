@extends('admin_master')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3 class="booking-title">Admin</h3>
            </div>
        </div>
        <div class="row">
            @include('partials.admin_account_aside')
            

            <div class="col-md-9">
            	
            	<div class="booking-item-dates-change">
            		<table class="table table-bordered table-striped table-hover">
            			<tbody>
            				<tr>
            					<td>Trip Type</td>
            					<td>
	            					{{ ucwords(str_replace("_", " ", $rental -> trip_type)) }}
            					</td>
            				</tr>
            				<tr>
            					<td>Customer Name</td>
            					<td>
            						{{ ucwords($rental -> customer_name) }}
            					</td>
            				</tr>
            				<tr>
            					<td>Customer Email</td>
            					<td>
            						{{ $rental -> customer_email }}
            					</td>
            				</tr>
            				<tr>
            					<td>Customer Phone Number</td>
            					<td>
            						{{ $rental -> customer_phone_number }}
            					</td>
            				</tr>
            				<tr>
            					<td>Departing Address</td>
            					<td>
            						{{ ucwords($rental -> departing_address) }}
            					</td>
            				</tr>
            				<tr>
            					<td>Destination Address</td>
            					<td>
            						{{ ucwords($rental -> destination_address) }}
            					</td>
            				</tr>
            				<tr>
            					<td>Departing Date</td>
            					<td>
            						{{ \Carbon\Carbon::parse($rental -> departing_date) -> toFormattedDateString() }}
            					</td>
            				</tr>
            				@if ($rental->trip_type == "round_trip")
            					<tr>
            						<td>Returning Date</td>
            						<td>
            							{{ \Carbon\Carbon::parse($rental -> returning_date) -> toFormattedDateString() }}
            						</td>
            					</tr>
            				@endif
            				<tr>
            					<td>Departing Time</td>
            					<td>
            						{{ $rental -> departing_time }}
            					</td>
            				</tr>
            				@if ($rental->trip_type == "round_trip")
            					<tr>
            						<td>Returning Time</td>
            						<td>
            							{{ $rental -> returning_time }}
            						</td>
            					</tr>
            				@endif
            				<tr>
            					<td>Bus Type</td>
            					<td>
            						{{ $rental -> bus -> name }}
            					</td>
            				</tr>
            				<tr>
            					<td>Number Of Buses</td>
            					<td>
            						{{ $rental -> number_of_bus }}
            					</td>
            				</tr>
            			</tbody>
            		</table>
            	</div>

            	<div class="row">
            		<div class="col-md-6">
            			<a href="" title="" class="btn btn-success btn-block btn-sm">
		            		<i class="fa fa-check"></i>
	            			Confirm
            			</a>
            		</div>
            		<div class="col-md-6">
            			<a href="{{ route('bus_request') }}" title="" class="btn btn-warning btn-block btn-sm">
		            		<i class="fa fa-times"></i>
	            			Go Back
            			</a>
            		</div>
            	</div>

            </div>

        </div>
        <div class="gap"></div>
    </div>

@endsection

@section('scripts')

<script>
    
</script>

@endsection