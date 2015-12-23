@extends('company_master')

@section('content')

	
	<div class="container">
		<div class="gap">
			
		</div>
		<div class="row">
				@include('partials.company_account_aside')
			<div class="col-md-5 col-md-offset-2">
				<h2>Editing Station</h2>
				{!! Form::open(['method'=>'patch', 'action'=>['CompaniesStationsController@update', $station]]) !!}
					<div class="form-group">
						<label for="">Country</label>
						<select class="form-control" name="country">
							<option value="Ghana" @if ($station->country == 'Ghana')
								'selected'
							@endif>Ghana</option>
							<option value="Nigeria" @if ($station->country == 'Nigeria')
								'selected'
							@endif>Nigeria</option>
							<option value="Ivory Coast" @if ($station->country == 'Ivory Coast')
								'selected'
							@endif>Ivory Coast</option>
							<option value="Burkina Faso" @if ($station->country == 'Burkina Faso')
								'selected'
							@endif>Burkina Faso</option>
							<option value="Benin" @if ($station->country == 'Benin')
								'selected'
							@endif>Benin</option>
							<option value="Togo"  @if ($station->country == 'Togo')
								'selected'
							@endif>Togo</option>
						</select>
					</div>
					<div class="form-group">
						<label>State/Region</label>
						<input type="text" name="region" class="form-control" value="{{ $station -> region }}" placeholder="State/Region">
					</div>
					<div class="form-group">
						<label>City</label>
						<input list="cities" class="form-control" name="city" value="{{ $station -> city }}">
						@include('partials._cities')
					</div>
					<div class="form-group">
						<label>Location</label>
						<input list="cities" class="form-control" name="location" value="{{ $station -> location }}">
						@include('partials._cities')
					</div>
					<div class="gap gap-small"></div>
					<div class="form-group">
						<input type="submit" class="btn btn-primary btn-block" name="" value="Update">
					</div>
					<div class="form-group">
						<a href="{{ route('company.stations.index') }}" class="btn btn-danger btn-block">Cancel</a>
					</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>


@endsection