@extends('company_master')


@section('content')
	<div class="container">
		<div class="col-md-10">
			<h1 class="booking-title">All Stations</h1>
		</div>
		<div class="col-md-2">
		<div class="gap gap-small"></div>
			<div class="text-right">
			<a href="{{ action('CompaniesStationsController@create') }}" class="btn btn-primary pull-right" title="">Add New Station</a>
		</div>
		</div>
    </div>

    <div class="container">
        <div class="row">
                
                @include('partials.company_account_aside')

            <div class="col-md-9">
                <table class="table table-bordered table-striped table-booking-history" id="bT">
		            <thead>
		                <tr>
		                    <th>Country</th>
		                    <th>State/Region</th>
		                    <th>City</th>
		                    <th>Location</th>
		                    <th>Actions</th>
		                </tr>
		            </thead>
		            <tbody>
		                @foreach ($stations as $station)
		                	<tr>
			                    <td>{{ $station -> country }}</td>
			                    <td>{{ $station -> region }}</td>
			                    <td>{{ $station -> city }}</td>
			                    <td>{{ $station -> location }}</td>
			                    <td>
				                    <div class="col-md-6">
				                    	<a href="{{ route('company.stations.edit', [$station]) }}" class="btn btn-block btn-xs btn-info" title="">Edit</a>
				                    </div>
				                    <div class="col-md-6">
				                    	{!! Form::open(['method' => 'DELETE', 'action'=>['CompaniesStationsController@destroy', $station]]) !!}
				                    	<button type="submit" class="third btn-block btn btn-danger btn-block btn-xs">Delete</button>
				                    	{!! Form::close() !!}
				                    </div>
			                    </td>
			                </tr>
		                @endforeach
		            </tbody>
		        </table>
            </div>
        </div>
    </div>

@endsection

@section('scripts')

<script>
    $(function(){
        $('#bT').dataTable();
    })
</script>

@endsection