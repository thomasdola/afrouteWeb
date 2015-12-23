<div style="font-family: 'Helvetica'; font-size: .9em;">
            <div>
            <div style="text-align: center;">
                <h1>Afroute - Travel Terminal Booking Report </h1>
            </div>
            <div>
                <p>Travel Terminal : {{ ucwords($trip -> travel_company -> name) }}</p>
                <p>Trip Departure : {{ $trip -> departure_station }}</p>
                <p>Trip Destination : {{ $trip -> destination_station }}</p>
                <p>Trip Departure Date : {{ Carbon\Carbon::parse($trip -> departure_date)->toFormattedDateString() }}</p>
                <p>Trip Departure Time : {{ $trip -> departure_time }}</p>
                <p>Printed On : {{ $date }}</p>
            </div>
                    <div>
                        <table style="
                            width: 100%; 
                            border: 1px solid black;
                            border-collapse: collapse;
                            margin: 10px auto;
                        ">
                            <thead>
                                <tr>
                                    <th style=" border: 1px solid black;">Customer Name</th>
                                    <th style=" border: 1px solid black;">Ticket Number</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bookings as $b)
                                    <tr>
                                        <td style=" border: 1px solid black;">{{ ucwords($b -> passenger_name) }}</td>
                                        <td style=" border: 1px solid black;">{{ ucwords($b -> code) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td style=" border: 1px solid black;">Total</td>
                                    <td style=" border: 1px solid black;">{{ $bookings -> count() }}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                
        </div>