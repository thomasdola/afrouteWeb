<table class="table table-bordered table-striped table-booking-history">
	{{-- <caption><b><h3>Report for Users Transaction on {!! date('d/m/y') !!}</h3></b></caption> --}}
    <thead>
        <tr>
            <th>Customer Name</th>
            <th>Email</th>
            <th># trips</th>
            <th>Registration Date</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user -> name }}</td>
                <td>{{ $user -> email }}</td>
                <td>{{ $user -> bookings -> where('status', 'paid') -> count() }}</td>
                <td>{{ $user -> created_at->toFormattedDateString() }}</td>
            </tr>
        @endforeach
    </tbody>
</table>