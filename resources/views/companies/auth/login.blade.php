@extends('layout')


@section('content')


    <div class="full-page">
        <div class="bg-holder full">
            <div class="bg-img" style="background:#333333;"></div>
            <div class="bg-holder-content full text-white">
                <a class="logo-holder" href="{{ route('welcome') }}">
                    <img src="{{ asset('img/logo-invert.png') }}" alt="Image Alternative text" title="Image Title" />
                    Afroute
                </a>
                <div class="full-center">
                    <div class="container">
                        <div class="row row-wrap" data-gutter="60">
                            <div class="col-md-4 col-md-offset-4">
                                <h3 class="mb15">Login</h3>
                                {!! Form::open(['method'=>'post', 'route'=>'company_login']) !!}
                                    <div class="form-group form-group-ghost form-group-icon-left"><i class="fa fa-user input-icon input-icon-show"></i>
                                        <label>Email</label>
                                        <input class="form-control" autocomplete="off" name="email" placeholder="e.g. johndoe@gmail.com" type="email" />
                                    </div>
                                    <div class="form-group form-group-ghost form-group-icon-left"><i class="fa fa-lock input-icon input-icon-show"></i>
                                        <label>Password</label>
                                        <input class="form-control" name="password" type="password" placeholder="my secret password" />
                                    </div>
                                    <div class="form-group checkbox">
                                        <label>
                                            <input name="remember" class="i-check" type="checkbox" />Remember Me
                                        </label>
                                    </div>
                                    <input class="btn btn-primary" type="submit" value="Sign in" />
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
                <ul class="footer-links" style="color: ">
                    <li><a href="{{ route('about_us') }}">About Us</a>
                    </li>
                    <li><a href="{{ route('policy') }}">Privacy Policy</a>
                    </li>
                    <li><a href="{{ route('terms') }}">Terms of Use</a>
                    </li>
                    <li><a href="{{ route('contact_us') }}">Contact Us</a>
                    </li>
                    <li><a href="{{ route('outlets') }}">CashCard Vending Points</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>


@endsection