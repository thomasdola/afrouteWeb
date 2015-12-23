@extends('static-master')


@section('page-title')

@include('partials.page-title', ['title'=>'We\'re Comming Soon'])

@endsection


@section('content')


    <div class="container">
        <h2>We're Comming Soon</h2>
        <div class="countdown countdown-lg" inline_comment="countdown" data-countdown="Aug 01, 2015" id="countdown"></div>
        <div class="gap"></div>
        <p>Want be notified? We just need your email address</p>
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                {!! Form::open(['class'=>'form form-inline']) !!}
                    <div class="form-group form-group-ghost form-group-lg">
                        <input class="form-control" placeholder="Type your email address" type="email" />
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>


@endsection