@extends('admin_master')


@section('content')

	<div class="container">
        <h3 class="booking-title">Admin</h3>
        <div class="row">
            @include('partials.admin_account_aside')
            <div class="col-md-9">
                <table class="table table-bordered table-striped table-booking-history">
                	<caption><b><h3>Report for Companies Transaction on {!! date('d/m/y') !!}</h3></b></caption>
                    <thead>
                        <tr>
                            <th>Travel Company</th>
                            <th>Order Code</th>
                            <th>Order Date</th>
                            <th>Execution Date</th>
                            <th>Customer Name</th>
                            <th>Amount</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>SONTRANS</td>
                            <td>464564HKHJ</td>
                            <td>12/03/2015</td>
                            <td>12/03/2015</td>
                            <td>Thomas Dola</td>
                            <td>50</td>
                            <td>Reserved</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="gap"></div>
    </div>

@endsection