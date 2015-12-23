<div style="font-family: 'Courier New', Courier, monospace; font-style: normal; font-variant: normal; width: 75%; margin: 0 auto;">
    <div>
        <div style="text-align: center;">
            
            <p><u><b>Itinerary</b></u></p>
        </div>
        
        <div style="margin: 20px 0;"></div>
        <hr>
        <div style="">
        </div>
        <div style="margin: 20px 0 20px 0;"></div>
        <div style="margin-left: -15px;margin-right: -15px;">
            <div style="width: 100%;">
                <table style="width: 100%;margin-bottom: 20px;">
                    <thead>
                        <tr>
                            <th style="
                                padding: 8px;
                                line-height: 1.42857143;
                                vertical-align: top;
                                border-top: 1px solid #dddddd;
                                vertical-align: bottom;
                                
                            ">Travel Company</th>
                            <th style="
                                padding: 8px;
                                line-height: 1.42857143;
                                vertical-align: top;
                                border-top: 1px solid #dddddd;
                                vertical-align: bottom;
                                
                            ">Departure</th>
                            <th style="
                                padding: 8px;
                                line-height: 1.42857143;
                                vertical-align: top;
                                border-top: 1px solid #dddddd;
                                vertical-align: bottom;
                                
                            ">Destination</th>
                            <th style="
                                padding: 8px;
                                line-height: 1.42857143;
                                vertical-align: top;
                                border-top: 1px solid #dddddd;
                                vertical-align: bottom;
                                
                            ">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="
                                padding: 8px;
                                line-height: 1.42857143;
                                vertical-align: top;
                                border-top: 1px solid #dddddd;
                                text-align: center;
                            ">{{ ucwords($booking -> trip -> travel_company -> name) }}</td>
                            <td style="
                                padding: 8px;
                                line-height: 1.42857143;
                                vertical-align: top;
                                border-top: 1px solid #dddddd;
                                text-align: center;
                            ">{{ ucwords($booking -> trip -> departure_station) }}</td>
                            <td style="
                                padding: 8px;
                                line-height: 1.42857143;
                                vertical-align: top;
                                border-top: 1px solid #dddddd;
                                text-align: center;
                            ">{{ ucwords($booking -> trip -> destination_station) }}</td>
                            <td style="
                                padding: 8px;
                                line-height: 1.42857143;
                                vertical-align: top;
                                border-top: 1px solid #dddddd;
                                text-align: center;
                            ">{{ ucwords($booking -> trip -> departure_date -> toFormattedDateString()) }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        
        <div style="margin-left: -15px;margin-right: -15px;">
            <div style="width: 100%;">
                <table style="width: 100%;margin-bottom: 20px;">
                    <thead>
                        <tr>
                            <th style="
                                padding: 8px;
                                line-height: 1.42857143;
                                vertical-align: top;
                                border-top: 1px solid #dddddd;
                                vertical-align: bottom;
                                
                            ">Passenger Name</th>
                            <th style="
                                padding: 8px;
                                line-height: 1.42857143;
                                vertical-align: top;
                                border-top: 1px solid #dddddd;
                                vertical-align: bottom;
                                
                            ">Ticket Code</th>
                            <th style="
                                padding: 8px;
                                line-height: 1.42857143;
                                vertical-align: top;
                                border-top: 1px solid #dddddd;
                                vertical-align: bottom;
                                
                            ">Departure Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="
                                padding: 8px;
                                line-height: 1.42857143;
                                vertical-align: top;
                                border-top: 1px solid #dddddd;
                                text-align: center;
                            ">{{ ucwords($booking -> passenger_name) }}</td>
                            <td style="
                                padding: 8px;
                                line-height: 1.42857143;
                                vertical-align: top;
                                border-top: 1px solid #dddddd;
                                text-align: center;
                            ">{{ $booking -> code }}</td>
                            <td style="
                                padding: 8px;
                                line-height: 1.42857143;
                                vertical-align: top;
                                border-top: 1px solid #dddddd;
                                text-align: center;
                            ">{{ ucwords($booking -> trip -> departure_time) }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div style="width: 100%;">
                <table style="width: 100%;margin-bottom: 20px;">
                    <thead>
                        <tr>
                            <th style="
                                padding: 8px;
                                line-height: 1.42857143;
                                vertical-align: top;
                                border-top: 1px solid #dddddd;
                                vertical-align: bottom;
                                
                            ">Bus Type</th>
                            <th style="
                                padding: 8px;
                                line-height: 1.42857143;
                                vertical-align: top;
                                border-top: 1px solid #dddddd;
                                vertical-align: bottom;
                                
                            ">Total Fare</th>
                            <th style="
                                padding: 8px;
                                line-height: 1.42857143;
                                vertical-align: top;
                                border-top: 1px solid #dddddd;
                                vertical-align: bottom;
                                
                            ">Boarding Point</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="
                                padding: 8px;
                                line-height: 1.42857143;
                                vertical-align: top;
                                border-top: 1px solid #dddddd;
                                text-align: center;
                            ">{{ ucwords($booking -> trip -> transport_model) }}</td>
                            <td style="
                                padding: 8px;
                                line-height: 1.42857143;
                                vertical-align: top;
                                border-top: 1px solid #dddddd;
                                text-align: center;
                            ">GHC {{ ucwords($booking -> trip -> fare) }}</td>
                            <td style="
                                padding: 8px;
                                line-height: 1.42857143;
                                vertical-align: top;
                                border-top: 1px solid #dddddd;
                                text-align: center;
                            ">{{ ucwords($booking -> trip -> boarding_point) }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <hr>
        </div>
        <div>
            <p style="text-align: right;"><b>Serial Number: </b> {{ $booking -> ticket_number }}</p>
            <p>
                <b>Call for Support</b>
            </p>
            <p>+233-208134588 / +233-243283240</p>
            
              <p style="text-align: right;">Have a Safe Trip!</p>
        </div>
        <img src="img/logo-invert5.png" alt="">
        <b>afroute</b> <span style="color: #dc6a27;font-weight: bold;font-size: 1em;"> <i>Think Travel, We make it Convenient</i></span>
    </div>
</div>