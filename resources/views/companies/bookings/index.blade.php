@extends('company_master')


@section('content')
	<div class="container">
		<div class="col-md-5">
			<h1 class="booking-title">All Bookings</h1>
		</div>
		<div class="col-md-5">
		<div class="gap gap-small"></div>
			{!! Form::open(['class'=>"form form-inline", 'method'=>'get', 'action'=>'CompaniesController@filter_bookings']) !!}
				<div class="row">
					<div class="form-group col-md-10">
						<div class="input-daterange">
	                        <div class="row">
	                            <div class="col-md-6">
	                                <div class="form-group">
	                                    <label>Start Date</label>
	                                    <input class="form-control" name="start" type="text" />
	                                </div>
	                            </div>
	                            <div class="col-md-6">
	                                <div class="form-group">
	                                    <label>End Date</label>
	                                    <input class="form-control" name="end" type="text" />
	                                </div>
	                            </div>
	                        </div>
	                    </div>
					</div>
					<div class="form-group col-md-2">
						<label style="color: transparent;">.</label>
						<input type="submit" class="btn btn-primary btn-block" name="" value="Filter">
					</div>
				</div>
			{!! Form::close() !!}
		</div>
		</div>
    </div>

    <div class="container">
        <div class="row">
                
                @include('partials.company_account_aside')

            <div class="col-md-9">
                <div class="tabbable">
                    <ul class="nav nav-tabs" id="myTab">
                        <li class="active"><a href="#tab-1" data-toggle="tab">Reserved</a>
                        </li>
                        <li><a href="#tab-2" data-toggle="tab">Paid</a>
                        </li>
                        <li><a href="#tab-3" data-toggle="tab">Cancelled</a>
                        </li>
                    </ul>
                    <div class="gap gap-mini"></div>
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="tab-1">
                            <table id="reservedT" class="table table-bordered table-striped table-booking-history">
					            <thead>
					                <tr>
					                    <th>Customer Name</th>
					                    <th>ID Type</th>
					                    <th>ID Number</th>
					                    <th>Phone</th>
					                    <th>Title</th>
					                    <th>Order Date</th>
					                    <th>Execution Date</th>
					                    <th>Cost</th>
					                 
					                </tr>
					            </thead>
					            <tbody>
					                @if ($reserved_bookings->count()>0)
					                	@foreach ($reserved_bookings as $b)
					                		<tr>
					                		    <td>{{ $b -> passenger_name }}</td>
					                		    <td>{{ $b -> passenger_id_type }}</td>
					                		    <td>{{ $b -> passenger_id_number }}</td>
					                		    <td>{{ $b -> passenger_id_number }}</td>
					                		    <td>{{ $b -> trip -> departure_station. ' - '. $b -> trip -> destination_station }}</td>
					                		    <td>{{ $b -> updated_at -> toFormattedDateString() }}</td>
					                		    <td>{{ $b -> trip -> departure_date -> toFormattedDateString() }}</td>
					                		    <td>{{ $b -> trip -> fare }}</td>
					                		</tr>
					                	@endforeach
					                @endif
					            </tbody>
					        </table>
                        </div>
                        <div class="tab-pane fade" id="tab-2">
                            <table id="paidT" class="table table-bordered table-striped table-booking-history">
					            <thead>
					                <tr>
					                    <th>Customer Name</th>
					                    <th>Reporting time</th>
					                    {{-- <th>ID Type</th>
					                    <th>ID Number</th> --}}
					                    <th>Title</th>
					                    <th>Order Date</th>
					                    <th>Execution Date</th>
					                    <th>Cost</th>
					                    <th>Tickect Number</th>
					              
					                </tr>
					            </thead>
					            <tbody>
					                @if ($paid_bookings->count()>0)
					                	@foreach ($paid_bookings as $b)
					                		<tr>
					                		    <td>{{ $b -> passenger_name }}</td>
					                		    <td>{{ $b -> passenger_reporting_time }}</td>
					                		    {{-- <td>{{ $b -> passenger_id_type }}</td>
					                		    <td>{{ $b -> passenger_id_number }}</td> --}}
					                		    {{-- <td>{{ $b -> passenger_id_number }}</td> --}}
					                		    <td>{{ $b -> trip -> departure_station. ' - '. $b -> trip -> destination_station }}</td>
					                		    <td>{{ $b -> updated_at -> toFormattedDateString() }}</td>
					                		    <td>{{ $b -> trip -> departure_date -> toFormattedDateString() }}</td>
					                		    <td>{{ $b -> trip -> fare }}</td>
					                		    <td>{{ $b -> code }}</td>
					                		</tr>
					                	@endforeach
					                @endif
					            </tbody>
					        </table>
                        </div>
                        <div class="tab-pane fade" id="tab-3">
                            <table id="canceledT" class="table table-bordered table-striped table-booking-history">
					            <thead>
					                <tr>
					                    <th>Customer Name</th>
					                    <th>ID Type</th>
					                    <th>ID Number</th>
					                    <th>Phone</th>
					                    <th>Title</th>
					                    <th>Order Date</th>
					                    <th>Execution Date</th>
					                    <th>Cost</th>
					                    <th>Tickect Number</th>
					                   
					                </tr>
					            </thead>
					            <tbody>
					                <tr>
					                    @if ($canceled_bookings -> count()>0)
					                    	    @foreach ($canceled_bookings as $b)
					                    		<tr>
					                    		    <td>{{ $b -> passenger_name }}</td>
					                    		    <td>{{ $b -> passenger_id_type }}</td>
					                    		    <td>{{ $b -> passenger_id_number }}</td>
					                    		    <td>{{ $b -> passenger_id_number }}</td>
					                    		    <td>{{ $b -> trip -> departure_station. ' - '. $b -> trip -> destination_station }}</td>
					                    		    <td>{{ $b -> updated_at -> toFormattedDateString() }}</td>
					                    		    <td>{{ $b -> trip -> departure_date -> toFormattedDateString() }}</td>
					                    		    <td>{{ $b -> trip -> fare }}</td>
					                    		    <td>{{ $b -> trip -> code }}</td>
					                    		</tr>
					                    	@endforeach
					                    @endif
					                    
					                </tr>
					            </tbody>
					        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')

<script>
    $(function(){
        $('#reservedT, #paidT').dataTable();
    })
</script>

@endsection