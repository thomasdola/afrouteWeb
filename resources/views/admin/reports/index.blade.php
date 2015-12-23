@extends('admin_master')

@section('styles')

    <style type="text/css" media="screen">
        .alert-noData{
            background: #1c9fe3;
            color: white;
            border-radius: 0;
        }
    </style>

@endsection


@section('content')

    <div class="container">
            <h3 class="booking-title">Admin</h3>
            <div class="row">
                @include('partials.admin_account_aside')
                <div class="col-md-5 col-md-offset-2">
                    <div class="gap"></div>
                    {!! Form::open(['class'=>'form', 'method'=>'post', 'action'=>'AdminReportsController@general_report_generate']) !!}
                        <div class="form-group form-group-lg">
                            <select name="type" class="form-control" required >
                                <option value="transactions">Companies Transactions</option>
                                <option value="companies">Companies</option>
                                <option value="users">Users</option>
                                {{-- <option value="Accounting">Accounting</option> --}}
                            </select>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="col-md-6">
                                    <div class="radio radio-lg">
                                        <label>
                                            <input class="i-radio form-control" value="excel" type="radio" name="file_format" />Excel</label>
                                    </div>
                                </div>    
                                <div class="col-md-6">
                                    <div class="radio radio-lg">
                                        <label>
                                            <input class="i-radio form-control" value="pdf" type="radio" name="file_format" />Pdf</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="input-daterange">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-group-lg">
                                        <label for="from">From</label>
                                        <input required type="text" id="from" class="form-control" name="start" value="" placeholder="From" placeholder="From">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group form-group-lg">
                                        <label for="to">To</label>
                                        <input id="to" type="text" class="form-control" required name="end" value="" placeholder="To">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-right form-group-lg">
                            <input style="border-radius: 0;" type="submit" class="btn btn-block btn-primary" name="" value="Generate">
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
            <div class="gap"></div>
            @if (Session::has('info'))
                <div class="col-md-5 col-md-offset-5">
                    <div class="alert alert-noData text-center">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        {{ Session::get('info') }}
                    </div>
                </div>
            @endif
        </div>

@endsection