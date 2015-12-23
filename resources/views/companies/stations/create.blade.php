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
				<h2>Add New Station</h2>
				{!! Form::open(['method'=>'post', 'action'=>'CompaniesStationsController@store']) !!}
					<div class="form-group">
						<label for="">Country</label>
						<select class="form-control" name="country" autocomplete="off">
							<option disabled selected>Select country...</option>
							<option value="Ghana">Ghana</option>
							<option value="Nigeria">Nigeria</option>
							<option value="Ivory Coast">Ivory Coast</option>
							<option value="Burkina Faso">Burkina Faso</option>
							<option value="Benin">Benin</option>
							<option value="Togo">Togo</option>
						</select>
					</div>
					<div class="form-group">
						<label>State/Region</label>
						<input list="regions" autocomplete="off" class="form-control" name="region" value="{{ old('regions') }}">
					</div>
					<div class="form-group">
						<label>City</label>
						<select class="form-control" name="city">
							@include('partials._cities')
						</select>
					</div>
					<div class="form-group">
						<label>Location</label>
						<input type="text" autocomplete="off" name="location" class="form-control col-md-6" value="{{ old('location') }}" placeholder="Location">
					</div>
					<div class="gap gap-small"></div>
					<div class="form-group">
						<input type="submit" class="btn btn-primary btn-block" name="" value="Add">
					</div>
					<div class="form-group">
						<a href="{{ route('company.stations.index') }}" class="btn btn-danger btn-block">Cancel</a>
					</div>
				{!! Form::close() !!}

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