@extends('master')


@section('content')

	<div class="container">
            <h1 class="booking-title">Result</h1>
        </div>

        <div class="container">
            @if ($code_type == 'booking_ticket')
                @if ($ticket)
                    <div class="col-md-8 col-md-offset-2">
                        <div class="row">
                            <div class="col-md-5">
                                <p>Ticket Code </p>
                            </div>
                            <div class="col-md-1">
                                : 
                            </div>
                            <div class="col-md-6">
                                {{ $ticket->code }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <p>Serial Number </p>
                            </div>
                            <div class="col-md-1">
                                : 
                            </div>
                            <div class="col-md-6">
                                {{ $ticket-> ticket_number }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <p>Cost </p>
                            </div>
                            <div class="col-md-1">
                                : 
                            </div>
                            <div class="col-md-6">
                                GHC ₵ {{ $ticket->trip->fare }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <p>Passenger Name </p>
                            </div>
                            <div class="col-md-1">
                                : 
                            </div>
                            <div class="col-md-6">
                                {{ $ticket->passenger_name }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <p>Customer Email </p>
                            </div>
                            <div class="col-md-1">
                                : 
                            </div>
                            <div class="col-md-6">
                                {{ $ticket->user->email }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <p>Phone Number </p>
                            </div>
                            <div class="col-md-1">
                                : 
                            </div>
                            <div class="col-md-6">
                                {{ $ticket->user->phone }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <p>Identification Type </p>
                            </div>
                            <div class="col-md-1">
                                : 
                            </div>
                            <div class="col-md-6">
                                {{ $ticket->passenger_id_type }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <p>ID Number </p>
                            </div>
                            <div class="col-md-1">
                                : 
                            </div>
                            <div class="col-md-6">
                                {{ $ticket->passenger_id_number }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <p>Trip Description </p>
                            </div>
                            <div class="col-md-1">
                                : 
                            </div>
                            <div class="col-md-6">
                                {{ $ticket->trip->departure_station }} to {{ $ticket->trip->destination_station }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <p>Trip Type </p>
                            </div>
                            <div class="col-md-1">
                                : 
                            </div>
                            <div class="col-md-6">
                                One Way
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <p>Status </p>
                            </div>
                            <div class="col-md-1">
                                : 
                            </div>
                            <div class="col-md-6">
                                {{ $ticket->status }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <p>Order Date </p>
                            </div>
                            <div class="col-md-1">
                                : 
                            </div>
                            <div class="col-md-6">
                                {{ $ticket->updated_at->toFormattedDateString() }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <p>Execution Date </p>
                            </div>
                            <div class="col-md-1">
                                : 
                            </div>
                            <div class="col-md-6">
                                {{ $ticket->trip->departure_date->toFormattedDateString() }}
                            </div>
                        </div>
                    </div>
                    <hr/>
                    <div class="gap gap-big"></div>
                @else
                    @foreach ($errors->all() as $e)
                        <div class="alert alert-danger">
                            {{ $e }}                  
                        </div>
                    @endforeach
                @endif
            @else
                
                @if ($card)
                    <div class="col-md-8 col-md-offset-2">
                        <div class="row">
                            <div class="col-md-5">
                                <p>CashCard Code </p>
                            </div>
                            <div class="col-md-1">
                                : 
                            </div>
                            <div class="col-md-6">
                                {{ $card->code }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <p>Amount </p>
                            </div>
                            <div class="col-md-1">
                                : 
                            </div>
                            <div class="col-md-6">
                                GHC ₵ {{ $card->price }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <p>Expiration Date </p>
                            </div>
                            <div class="col-md-1">
                                : 
                            </div>
                            <div class="col-md-6">
                                {{ $ed = $card->created_at->copy()->addMonth()->toFormattedDateString() }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <p>Status </p>
                            </div>
                            <div class="col-md-1">
                                : 
                            </div>
                            <div class="col-md-6">
                                @if ($ed <= Carbon\Carbon::today())
                                    Expired
                                @else
                                    Valid
                                @endif
                            </div>
                        </div>
                    </div>
                @else
                    @foreach ($errors->all() as $e)
                        <div class="alert alert-danger">
                            {{ $e }}                  
                        </div>
                    @endforeach
                @endif

            @endif
        </div>

@endsection