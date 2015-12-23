@extends('company_master')

@section('styles')

    <style type="text/css" media="screen">
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


@section('content')

	
	<div class="container">
		<div class="gap">
			
		</div>
		<div class="row">
				@include('partials.company_account_aside')
			<div class="col-md-5 col-md-offset-2">
				@if ($errors -> any())
					<div class="alert alert-danger">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						@foreach ($errors->all() as $e)
							<ul class="list list-unstyled">
								<li>{{ $e }}</li>
							</ul>
						@endforeach
					</div>

				@endif
				<h2>Creat a Trip</h2>
				{!! Form::open(['method'=>'post', 'action'=>'CompaniesTripsController@store']) !!}
					<div class="form-group">
						<label for="">Departure Station</label>
						<select name="departure_station" class="form-control">
							@foreach ($stations as $station)
								<option value="{{ $station->city }}">{{ $station->location }} ({{ $station->city }})</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label>Stops</label>
						<select class="form-control" name="stops">
							<option value="0">0</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
						</select>
					</div>
					<div class="form-group">
						<label for="">Destination Station</label>
						<select name="destination_station" class="form-control">
							@foreach ($stations as $station)
								<option value="{{ $station->city }}">{{ $station->location }} ({{ $station->city }})</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<input type="hidden" name="trip_type" value="One Way">
					</div>
					<div class="form-group">
						<label>Departure Date</label>
						<input type="text" name="departure_date" class="date-pick form-control" value="{{ old('departure_date') }}" placeholder="Departure Date">
					</div>
					<div class="form-group">
						<label>Departure Time</label>
						<input type="text" name="departure_time" class="form-control time-pick" value="{{ old('departure_time') }}" placeholder="">
						{{-- <select class="form-control" name="departure_time">
							<option value="Morning">Morning</option>
							<option value="Afternoon">Afternoon</option>
							<option value="Evening">Evening</option>
						</select> --}}
					</div>
					<div class="form-group">
						<label>Boarding Point</label>
						<input type="text" value="{{ old('boarding_point') }}" name="boarding_point" class="form-control">
					</div>
					<div class="form-group">
						<label>Transport Model</label>
						<input type="text" name="transport_model" class="form-control" value="{{ old('transport_model') }}" placeholder="Transport Model">
					</div>
					<div class="form-group">
						<label>Number of Seats</label>
						<input type="number" name="number_of_seats" class="form-control" value="{{ old('number_of_seats') }}" placeholder="Number of Seats">
					</div>
					<div class="form-group">
						<label>Fare</label>
						<input type="text" name="fare" class="form-control" value="{{ old('fare') }}" placeholder="Fare">
					</div>
					<div class="form-group">
						<label>Duration</label>
						<div class="col-md-6">
							<select name="hour" class="form-control">
								<option>Hour</option>
								<option value="0">0</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
								<option value="6">6</option>
								<option value="7">7</option>
								<option value="8">8</option>
								<option value="9">9</option>
								<option value="10">10</option>
								<option value="11">11</option>
								<option value="12">12</option>
							</select>
						</div>
						<div class="col-md-6">
							<select name="minute" class="form-control">
								<option>Minute</option>
								<option value="0">0</option>
								<option value="5">5</option>
								<option value="10">10</option>
								<option value="15">15</option>
								<option value="20">20</option>
								<option value="25">25</option>
								<option value="30">30</option>
								<option value="35">35</option>
								<option value="40">40</option>
								<option value="45">45</option>
								<option value="50">50</option>
								<option value="55">55</option>
							</select>
						</div>
						
					</div>
					<div class="gap gap-small"></div>
					<div class="form-group">
						<input type="submit" class="btn btn-primary btn-block" name="" value="Create">
					</div>
					<div class="form-group">
						<a href="{{ route('company.trips.index') }}" class="btn btn-danger btn-block" name="" value="Update">Cancel</a>
					</div>
				{!! Form::close() !!}
				<div class="gap"></div>
				
			</div>
		</div>
	</div>


@endsection

@section('scripts')

    <script type="text/javascript">
        $(function()
            {
                $('select').select2({
                    // placeholder: "Select a state",
                    allowClear: true
                });
            });
    </script>

@endsection