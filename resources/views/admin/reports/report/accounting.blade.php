@extends('admin_master')


@section('content')

	<div class="container">
        <h3 class="booking-title">Admin</h3>
        <div class="row">
            @include('partials.admin_account_aside')
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-12 text-left">
                        <a href="" class="btn btn-danger" title="">Export</a>
                    </div>
                    <div class="col-md-12">
                <table class="table table-bordered table-striped table-booking-history">
                    <caption><b><h3>Report for Companies Transaction on {!! date('d/m/y') !!}</h3></b></caption>
                    <thead>
                        <tr>
                            <th>Travel Company</th>
                            <th>Amount</th>
                            <th>Deduction</th>
                            <th>Company Outcome</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>SONTRANS</td>
                            <td>500</td>
                            <td>5</td>
                            <td>495</td>
                        </tr>
                    </tbody>
                </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="gap"></div>
    </div>

@endsection