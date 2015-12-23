@extends('master')

@section('content')

	<div class="container">
    <div class="gap"></div>
            <div class="row">
                {!! Form::open() !!}
                    <div class="col-md-8">
                        <h3>Passengers</h3>
                        <ul class="list booking-item-passengers">
                            @for ($id = 1; $id <= $passengers; $id++)
                                <li>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label>Sex</label>
                                            <div class="radio-inline radio-small">
                                                <label>
                                                    <input class="i-radio" type="radio" name="passenger_sex_{!! $id !!}" required value="male" />Male</label>
                                            </div>
                                            <div class="radio-inline radio-small">
                                                <label>
                                                    <input class="i-radio" type="radio" name="passenger_sex_{!! $id !!}" required value="female" />Female</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Full Name</label>
                                                <input class="form-control" type="text" name="passenger_name_{!! $id !!}" value='{{ old("passenger_name_{$id}") }}' required />
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Identification Type</label>
                                                <select name="passenger_id_type_{!! $id !!}" class="form-control">
                                                    <option value="National ID">National ID</option>
                                                    <option value="Passport">Passport</option>
                                                    <option value="Drivers License">Drivers License</option>
                                                    <option value="Voters ID">Voters ID</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Date of Birth</label>
                                                <input class="date-pick-years form-control" type="text" name="passenger_dob_{!! $id !!}" required value='{{ old("passenger_dob_{$id}") }}' />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3 col-md-offset-3">
                                            <div class="form-group">
                                                <label>Citizenship</label>
                                                <input class="form-control" type="text" required name="passenger_citizenship_{!! $id !!}" value='{{ old("passenger_citizenship_{$id}") }}' required/>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Identification Number</label>
                                                <input class="form-control" type="text" name="passenger_id_number_{!! $id !!}" value='{{ old("passenger_id_number_{$id}") }}'/>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group form-group-cc-date">
                                                <label>Expiry Date</label>
                                                <input id="exp_date" class="form-control" type="text" name="passenger_id_exp_date_{!! $id !!}" value='{{ old("passenger_id_exp_date_{$id}") }}' placeholder="mm/yy"/>
                                            </div>
                                        </div>
                                        {{-- <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Reporting Time</label>
                                                <input class="time-pick form-control" type="text" name="passenger_reporting_time_{!! $id !!}" value='{{ old("passenger_reporting_time_{$id}") }}' required/>
                                                
                                                
                                                
                                            </div>
                                        </div> --}}
                                        <div class="col-md-4">
                                        <div class="gap gap-mini"></div>
                                            @foreach ($errors->all() as $error)
                                                    <span class="text-danger">{{ $error}}</span>
                                                @endforeach
                                        </div>
                                    </div>
                                </li>
                            @endfor
                        </ul>
                        <div class="gap gap-small"></div>
                        <h4 style="font-weight: bold;">Payment</h4>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="gap gap-small"></div>
                                <h4>Cash Card</h4>
                                <div class="clearfix">
                                    <div class="form-group form-group-cc-number">
                                        <label>Code</label>
                                        <input class="form-control" name="cash_card_code" placeholder="xxxx-xxxx-xxxx" type="text" id="card" />
                                    </div>
                                </div>
                                <input class="btn btn-primary" name="cash_card" type="submit" value="With CashCard" />
                            </div>
                            
                            @if ($trip -> departure_date ->gt( Carbon\Carbon::tomorrow()) )
                                <div class="col-md-6 col-md-offset-2">
                                    <div class="gap gap-small"></div>
                                    <h4>Pay Later</h4>
                                    <p class="text-danger">
                                        Reservation expires 24H before trip departure date if 
                                        payment is not made. 
                                    </p>
                                    <input class="btn btn-primary" name="reserve" type="submit" value="Reserve" />
                                </div>
                            @endif
                        </div>
                    </div>
                {!! Form::close() !!}
                <div class="col-md-4">
                    <div class="booking-item-payment">
                        <header class="clearfix">
                            <h5 class="mb0">{{ $trip -> departure_station }} - {{ $trip -> destination_station }}, ({{ $trip->boarding_point }})</h5>
                        </header>
                        <ul class="booking-item-payment-details">
                            <li>
                                <h5>Trip Details</h5>
                                <div class="booking-item-payment-flight">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="booking-item-flight-details">
                                                <div class="booking-item-departure"><i class="fa fa-car"></i>
                                                    <p class="booking-item-date">{{ $trip->departure_date->toFormattedDateString() }}</p>
                                                    <p class="booking-item-destination">{{ $trip -> departure_station }}</p>
                                                </div>
                                                <div class="booking-item-arrival"><i class="fa fa-car"></i>
                                                    <p class="booking-item-date">{{ $trip->departure_date->toFormattedDateString() }}</p>
                                                    <p class="booking-item-destination">{{ $trip -> destination_station }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="booking-item-flight-duration">
                                                <p>Duration</p>
                                                <h5>{{ $trip->duration }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-9">
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <h5>Trip {{ $passengers }} Passenger(s)</h5>
                                <ul class="booking-item-payment-price">
                                    <li>
                                        <p class="booking-item-payment-price-title">{{ $passengers }} Passenger(s)</p>
                                        <p class="booking-item-payment-price-amount">₵ {{ $trip->fare }}<small>/per passnger</small>
                                        </p>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <div class="booking-item-payment-total row">
                            <div class="col-md-6">
                                Total trip: <span>₵ {{ $trip->fare  * $passengers}}</span>
                            </div>
                            <div class="col-md-6">
                                Departure: <span>{{ $trip -> departure_time }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="gap"></div>
        </div>

@endsection

@section('scripts')

<script type="text/javascript">
    
    $(function(){
        $('#card').mask('****-****-****');
        $('#exp_date').mask('**/**');
    })

</script>


@endsection