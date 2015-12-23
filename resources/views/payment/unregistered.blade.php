@extends('master')

@section('content')

	<div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h3>Customer</h3>
                    <p>Sign in to your <a href="#">Traveler account</a> for fast booking.</p>
                    <form>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>First & Last Name</label>
                                    <input class="form-control" type="text" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input class="form-control" type="text" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>E-mail</label>
                                    <input class="form-control" type="text" />
                                </div>
                            </div>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input class="i-check" type="checkbox" checked/>Create Traveler account <small>(password will be send to your e-mail)</small>
                            </label>
                        </div>
                    </form>
                    <div class="gap gap-small"></div>
                    <h3>Passengers</h3>
                    <ul class="list booking-item-passengers">
                        <li>
                            <div class="row">
                                <div class="col-md-3">
                                    <label>Sex</label>
                                    <div class="radio-inline radio-small">
                                        <label>
                                            <input class="i-radio" type="radio" name="passenger-1-sex" />Male</label>
                                    </div>
                                    <div class="radio-inline radio-small">
                                        <label>
                                            <input class="i-radio" type="radio" name="passenger-1-sex" />Female</label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input class="form-control" type="text" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Surname</label>
                                        <input class="form-control" type="text" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Date of Birth</label>
                                        <input class="date-pick-years form-control" type="text" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 col-md-offset-3">
                                    <div class="form-group">
                                        <label>Citizenship</label>
                                        <input class="form-control" type="text" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Document Series</label>
                                        <input class="form-control" type="text" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Expiry Date</label>
                                        <input class="date-pick-years form-control" type="text" />
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="row">
                                <div class="col-md-3">
                                    <label>Sex</label>
                                    <div class="radio-inline radio-small">
                                        <label>
                                            <input class="i-radio" type="radio" name="passenger-2-sex" />Male</label>
                                    </div>
                                    <div class="radio-inline radio-small">
                                        <label>
                                            <input class="i-radio" type="radio" name="passenger-2-sex" />Female</label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input class="form-control" type="text" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Surname</label>
                                        <input class="form-control" type="text" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Date of Birth</label>
                                        <input class="date-pick-years form-control" type="text" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 col-md-offset-3">
                                    <div class="form-group">
                                        <label>Citizenship</label>
                                        <input class="form-control" type="text" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Document Series</label>
                                        <input class="form-control" type="text" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Expiry Date</label>
                                        <input class="date-pick-years form-control" type="text" />
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <div class="gap gap-small"></div>
                    <div class="row">
                        <div class="col-md-6">
                            <img class="pp-img" src="img/paypal.png" alt="Image Alternative text" title="Image Title" />
                            <p>Important: You will be redirected to PayPal's website to securely complete your payment.</p><a class="btn btn-primary">Checkout via Paypal</a>	
                        </div>
                        <div class="col-md-6">
                            <form class="cc-form">
                                <div class="clearfix">
                                    <div class="form-group form-group-cc-number">
                                        <label>Card Number</label>
                                        <input class="form-control" placeholder="xxxx xxxx xxxx xxxx" type="text" /><span class="cc-card-icon"></span>
                                    </div>
                                    <div class="form-group form-group-cc-cvc">
                                        <label>CVC</label>
                                        <input class="form-control" placeholder="xxxx" type="text" />
                                    </div>
                                </div>
                                <div class="clearfix">
                                    <div class="form-group form-group-cc-name">
                                        <label>Cardholder Name</label>
                                        <input class="form-control" type="text" />
                                    </div>
                                    <div class="form-group form-group-cc-date">
                                        <label>Valid Thru</label>
                                        <input class="form-control" placeholder="mm/yy" type="text" />
                                    </div>
                                </div>
                                <div class="checkbox checkbox-small">
                                    <label>
                                        <input class="i-check" type="checkbox" checked/>Add to My Cards</label>
                                </div>
                                <input class="btn btn-primary" type="submit" value="Proceed Payment" />
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="booking-item-payment">
                        <header class="clearfix">
                            <h5 class="mb0">London - New York</h5>
                        </header>
                        <ul class="booking-item-payment-details">
                            <li>
                                <h5>Flight Details</h5>
                                <div class="booking-item-payment-flight">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="booking-item-flight-details">
                                                <div class="booking-item-departure"><i class="fa fa-plane"></i>
                                                    <h5>10:25 PM</h5>
                                                    <p class="booking-item-date">Sun, Mar 22</p>
                                                    <p class="booking-item-destination">London, England, United Kingdom (LHR)</p>
                                                </div>
                                                <div class="booking-item-arrival"><i class="fa fa-plane fa-flip-vertical"></i>
                                                    <h5>12:25 PM</h5>
                                                    <p class="booking-item-date">Sat, Mar 23</p>
                                                    <p class="booking-item-destination">Charlotte, CA, United States (CLT)</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="booking-item-flight-duration">
                                                <p>Duration</p>
                                                <h5>10h</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <p>STOP 2 h 55 min Charlotte, United States</p>
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="booking-item-flight-details">
                                                <div class="booking-item-departure"><i class="fa fa-plane"></i>
                                                    <h5>10:25 PM</h5>
                                                    <p class="booking-item-date">Sun, Mar 22</p>
                                                    <p class="booking-item-destination">London, England, United Kingdom (LHR)</p>
                                                </div>
                                                <div class="booking-item-arrival"><i class="fa fa-plane fa-flip-vertical"></i>
                                                    <h5>12:25 PM</h5>
                                                    <p class="booking-item-date">Sat, Mar 23</p>
                                                    <p class="booking-item-destination">Charlotte, CA, United States (CLT)</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="booking-item-flight-duration">
                                                <p>Duration</p>
                                                <h5>10h</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <h5>Flight (2 Passengers)</h5>
                                <ul class="booking-item-payment-price">
                                    <li>
                                        <p class="booking-item-payment-price-title">2 Passengers</p>
                                        <p class="booking-item-payment-price-amount">$178<small>/per passnger</small>
                                        </p>
                                    </li>
                                    <li>
                                        <p class="booking-item-payment-price-title">Taxes</p>
                                        <p class="booking-item-payment-price-amount">$18<small>/per passnger</small>
                                        </p>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <p class="booking-item-payment-total">Total trip: <span>$392</span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="gap"></div>
        </div>

@endsection