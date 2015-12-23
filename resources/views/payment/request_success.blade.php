@extends('master')


@section('content')

	<div class="container">
            <div class="row">
            <div class="gap"></div>
                <div class="col-md-8 col-md-offset-2">
                    <i class="fa fa-check round box-icon-large box-icon-center box-icon-success mb30"></i>	
                    <h2 class="text-center">{{ ucwords($request->customer_name) }}, your request was sent successfully!</h2>
                    <h5 class="text-center mb30">We will get back to you shortly for further clarification.</h5>
                    {{-- <h5 class="text-center mb30">The Request details have been sent to {{ $ }}</h5> --}}
                    
                </div>
            </div>
            <div class="gap"></div>
        </div>

@endsection