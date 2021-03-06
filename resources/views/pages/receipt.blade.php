@extends('master')

@section("styles")

    <style type="text/css" media="screen, print">
        .logo-container{
            margin-top: 5px;
            height: 100px;
            width: 100px;
        }
        .ticket-container{
            padding: 20px !important;
            border-left: 10px solid #4d4d42;
            border-right: 10px solid #4d4d42;
            border-top: 1px solid #4d4d42;
            border-bottom: 1px solid #4d4d42;
        }
        h5.slogan{
            color: #dc6a27;
            font-weight: bold;
        }
    </style>

@endsection


@section('content')

	<div class="container">
            <h1 class="booking-title">Booking Ticket</h1>
    </div>

        <div class="container">
            <div class="container">
                <div class="col-md-10 col-md-offset-1 ticket-container">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="logo-container">
                                <img src="{{ asset('img/logo100x100.png') }}">
                            </div>
                        </div>
                        <div class="col-md-5">
                        <div class="gap gap-mini"></div>
                            <h5 class="slogan"><i>Think Travel, We make it Convenient</i></h5>
                        </div>
                        <div class="col-md-4">
                            <p><b>Call for Support</b></p>
                            <p>+233-248089578/246896111</p>
                            <div class="col-md-8 col-md-offset-4">
                                <p>Serial Number: 5654554</p>
                            </div>
                        </div>
                    </div>
                    <div class="gap gap-mini"></div>
                    <div class="row">
                        <div class="col-md-12 text-center text-underline">
                            <p><u><b>Itinerary</b></u></p>
                        </div>
                    </div>
                    <div class="gap gap-mini"></div>
                    <div class="row">
                        <div class="col-md-4">
                            <b>Departure</b> to <b>Destination</b>
                        </div>
                        <div class="col-md-4">
                            <b>Date:</b>
                        </div>
                        <div class="col-md-4">
                            <b>Travel Company Name</b>
                        </div>
                    </div>
                    <div class="gap gap-small"></div>
                    <div class="row">
                        <div class="col-md-3">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Passenger Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>data</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-3">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ticket #</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>S4FD46FS4FSD4FS5</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-3">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Departure Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Evening</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-3">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Reporting Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>10:35PM</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="gap gap-mini"></div>
                    <div class="row">
                        <div class="col-md-4">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Bus Type</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>data</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-4">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Total Fare</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>data</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-4">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Boarding Point Address</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>data</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="gap gap-mini"></div>
                </div>
            </div>           
        </div>

@endsection