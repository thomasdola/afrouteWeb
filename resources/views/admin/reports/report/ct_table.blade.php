<table class="table table-bordered table-striped table-booking-history">
    {{-- <caption><b><h3>Report for Companies Transaction on {!! date('d/m/y') !!}</h3></b></caption> --}}
    <thead>
        <tr>
            <th>Travel Company</th>
            <th>Company Outcome</th>
            {{-- <th>Date</th> --}}
        </tr>
    </thead>
    <tbody>
        @foreach ($companies as $c)
            <tr>
                <td>{{ $c -> name }}</td>
                <td>{{$tc =  $c -> payments -> sum('amount') }}</td>
                {{-- <td>{{ $start }} to {{ $end }}</td> --}}
            </tr>
        @endforeach
    </tbody>
</table>