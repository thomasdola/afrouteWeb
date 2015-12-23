<table class="table table-bordered table-striped table-booking-history">
	{{-- <caption><b><h3>Report for Companies on {!! date('d/m/y') !!}</h3></b></caption> --}}
    <thead>
        <tr>
            <th>Company Name</th>
            <th>Email</th>
            <th># Stations</th>
            <th># Trips</th>
            <th>Registration Date</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($companies as $c)
            <tr>
                <td>{{ $c -> name }}</td>
                <td>{{ $c -> email }}</td>
                <td>{{ $c -> stations -> count() }}</td>
                <td>{{ $c -> trips -> count() }}</td>
                <td>{{ $c -> created_at ->toFormattedDateString() }}</td>
            </tr>
        @endforeach
    </tbody>
</table>