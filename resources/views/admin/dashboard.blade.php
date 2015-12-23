@extends('admin_master')


@section('content')

    <div class="container">
            <h3 class="booking-title">Admin</h3>
            <div class="row">
                @include('partials.admin_account_aside')
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="list list-inline user-profile-statictics mb30">
                                <li style="height: 200px;"><i class="fa fa-car user-profile-statictics-icon"></i>
                                    <h5>{{ $tC }}</h5>
                                    <p>Total Travel Companies</p>
                                </li>
                                <li style="height: 200px;"><i class="fa fa-globe user-profile-statictics-icon"></i>
                                    <h5>{{ $tT }}</h5>
                                    <p>Total Trips</p>
                                </li>
                                <li style="height: 200px;"><i class="fa fa-money user-profile-statictics-icon"></i>
                                    <h5>{{ $tP }}</h5>
                                    <p>Total Paid Trips</p>
                                </li>
                                <li style="height: 200px;"><i class="fa fa-globe user-profile-statictics-icon"></i>
                                    <h5>5</h5>
                                    <p>Countries</p>
                                </li>
                                <li style="height: 200px;"><i class="fa fa-user user-profile-statictics-icon"></i>
                                    <h5>{{ $tU }}</h5>
                                    <p>Total Users</p>
                                </li>
                            </ul>
                            <ul class="list list-inline user-profile-statictics mb30">
                                <li style="height: 200px;"><i class="fa fa-car user-profile-statictics-icon"></i>
                                    <h5>{{ $tB }}</h5>
                                    <p>Total Bus Requests</p>
                                </li>
                            </ul>
                        </div>
                        <div class="gap"></div>
                        
                    </div>
                </div>
            </div>
            <div class="gap"></div>
        </div>

@endsection