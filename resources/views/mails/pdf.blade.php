@extends('mail-master')

@section('styles')

    <style type="text/css" media="print">
       .ticket-container{
         width: 100%;
       }
       .info-container{
        width: 25%;
        display: inline-block;      
       }
       .logo-holder{
        height: 100px;
        width: 100px;
       }
       .slogan-holder{
        display: inline-block;
        width: 30%;
        color: #dc6a27;
        font-weight: bold;
        font-size: 1.2em;
        float: right;
       }
       .contact-holder{
        margin-left: 10%;
        display: inline-block;
        width: 55%;
       }
       .itinerary{
        text-align: center;
        clear: both;
       }
       .gap{
        margin: 20px 0 20px 0;
       }
    </style>

@endsection


@section('mail-content')

    
    
        <div>
            <div class="ticket-container">
                <div>
                    <div class="info-container">
                        <div class="logo-holder">
                            <img src="img/logo100x100.png">
                        </div>
                    </div>
                    <div class="slogan-holder">
                        <h5><i>Think Travel, We make it Convenient</i></h5>
                    </div>
                    <div class="contact-holder">
                        <p><b>Call for Support</b></p>
                        <p>+233-248089578/246896111</p>
                        <p>Serial Number: 5654554</p>
                    </div>
                </div>
                <div class="itinerary">
                    <p><u><b>Itinerary</b></u></p>
                </div>
                <div class="gap"></div>
                <div>
                    <table>
                        <thead>
                            <tr>
                                <th style="
                                    padding: 8px;
                                    line-height: 1.42857143;
                                    vertical-align: top;
                                    border-top: 1px solid #dddddd;
                                    vertical-align: bottom;
                                    border-bottom: 2px solid #dddddd;
                                ">Travel Company</th>
                                <th style="
                                    padding: 8px;
                                    line-height: 1.42857143;
                                    vertical-align: top;
                                    border-top: 1px solid #dddddd;
                                    vertical-align: bottom;
                                    border-bottom: 2px solid #dddddd;
                                ">Departure</th>
                                <th style="
                                    padding: 8px;
                                    line-height: 1.42857143;
                                    vertical-align: top;
                                    border-top: 1px solid #dddddd;
                                    vertical-align: bottom;
                                    border-bottom: 2px solid #dddddd;
                                ">Destination</th>
                                <th style="
                                    padding: 8px;
                                    line-height: 1.42857143;
                                    vertical-align: top;
                                    border-top: 1px solid #dddddd;
                                    vertical-align: bottom;
                                    border-bottom: 2px solid #dddddd;
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
                                ">data</td>
                                <td style="
                                    padding: 8px;
                                    line-height: 1.42857143;
                                    vertical-align: top;
                                    border-top: 1px solid #dddddd;
                                    text-align: center;
                                ">S4FD46FS4FSD4FS5</td>
                                <td style="
                                    padding: 8px;
                                    line-height: 1.42857143;
                                    vertical-align: top;
                                    border-top: 1px solid #dddddd;
                                    text-align: center;
                                ">Evening</td>
                                <td style="
                                    padding: 8px;
                                    line-height: 1.42857143;
                                    vertical-align: top;
                                    border-top: 1px solid #dddddd;
                                    text-align: center;
                                ">10:35PM</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="gap"></div>
                <div>
                    <table>
                        <thead>
                            <tr>
                                <th style="
                                    padding: 8px;
                                    line-height: 1.42857143;
                                    vertical-align: top;
                                    border-top: 1px solid #dddddd;
                                    vertical-align: bottom;
                                    border-bottom: 2px solid #dddddd;
                                ">Passenger Name</th>
                                <th style="
                                    padding: 8px;
                                    line-height: 1.42857143;
                                    vertical-align: top;
                                    border-top: 1px solid #dddddd;
                                    vertical-align: bottom;
                                    border-bottom: 2px solid #dddddd;
                                ">ticket #</th>
                                <th style="
                                    padding: 8px;
                                    line-height: 1.42857143;
                                    vertical-align: top;
                                    border-top: 1px solid #dddddd;
                                    vertical-align: bottom;
                                    border-bottom: 2px solid #dddddd;
                                ">Departure Time</th>
                                <th style="
                                    padding: 8px;
                                    line-height: 1.42857143;
                                    vertical-align: top;
                                    border-top: 1px solid #dddddd;
                                    vertical-align: bottom;
                                    border-bottom: 2px solid #dddddd;
                                ">Reporting Time</th>
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
                                ">data</td>
                                <td style="
                                    padding: 8px;
                                    line-height: 1.42857143;
                                    vertical-align: top;
                                    border-top: 1px solid #dddddd;
                                    text-align: center;
                                ">S4FD46FS4FSD4FS5</td>
                                <td style="
                                    padding: 8px;
                                    line-height: 1.42857143;
                                    vertical-align: top;
                                    border-top: 1px solid #dddddd;
                                    text-align: center;
                                ">Evening</td>
                                <td style="
                                    padding: 8px;
                                    line-height: 1.42857143;
                                    vertical-align: top;
                                    border-top: 1px solid #dddddd;
                                    text-align: center;
                                ">10:35PM</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="gap"></div>
                <div>
                    <table>
                        <thead>
                            <tr>
                                <th style="
                                    padding: 8px;
                                    line-height: 1.42857143;
                                    vertical-align: top;
                                    border-top: 1px solid #dddddd;
                                    vertical-align: bottom;
                                    border-bottom: 2px solid #dddddd;
                                ">Bus Type</th>
                                <th style="
                                    padding: 8px;
                                    line-height: 1.42857143;
                                    vertical-align: top;
                                    border-top: 1px solid #dddddd;
                                    vertical-align: bottom;
                                    border-bottom: 2px solid #dddddd;
                                ">Total Fare</th>
                                <th style="
                                    padding: 8px;
                                    line-height: 1.42857143;
                                    vertical-align: top;
                                    border-top: 1px solid #dddddd;
                                    vertical-align: bottom;
                                    border-bottom: 2px solid #dddddd;
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
                                ">data</td>
                                <td style="
                                    padding: 8px;
                                    line-height: 1.42857143;
                                    vertical-align: top;
                                    border-top: 1px solid #dddddd;
                                    text-align: center;
                                ">data</td>
                                <td style="
                                    padding: 8px;
                                    line-height: 1.42857143;
                                    vertical-align: top;
                                    border-top: 1px solid #dddddd;
                                    text-align: center;
                                ">data</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>           
    


@endsection