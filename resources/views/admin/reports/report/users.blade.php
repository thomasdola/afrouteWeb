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
                            <th>Customer Name</th>
                            <th>Registration Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Thomas Dola</td>
                            <td>01/09/2011</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="gap"></div>
    </div>

@endsection