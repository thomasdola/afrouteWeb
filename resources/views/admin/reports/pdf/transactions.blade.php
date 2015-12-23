<div style="font-family: 'Helvetica'; font-size: .9em;">
            <div>
            <div style="text-align: center;">
                <h1>Afroute Internal Report </h1>
            </div>
            <div>
                <p>{{ $title }}</p>
                <p>Date Range: {{ $from }} to {{ $to }}</p>
                <p>Printed on: {{ $today }}</p>
                {{-- <p>Staff Name: </p> --}}
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
                                    <th style=" border: 1px solid black;">Travel Company</th>
                                    <th style=" border: 1px solid black;">Company Outcome</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $c)
                                    <tr>
                                        <td style=" border: 1px solid black;">{{ $c -> name }}</td>
                                        <td style=" border: 1px solid black;">{{$tc =  $c -> payments -> sum('amount') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                
        </div>