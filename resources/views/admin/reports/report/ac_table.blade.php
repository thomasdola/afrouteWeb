<table class="table table-bordered table-striped table-booking-history">
    <caption><b><h3>Report for Companies Transaction on {!! date('d/m/y') !!}</h3></b></caption>
    <thead>
        <tr>
            <th>Travel Company</th>
            <th>Amount</th>
            <th>Company Outcome</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($companies as $c)
            <tr>
                <td>{{ ucfirst($c -> name) }}</td>
                <td>{{$tc =  $c -> payments -> sum('amount') }}</td>
                <td>----</td>
            </tr>
        @endforeach
    </tbody>
</table>