@extends('static-master')


@section('page-title')

@include('partials.page-title', ['title'=>'404'])

@endsection


@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <p class="text-hero">404</p>
            <h1>Page is not found</h1>
            <a class="btn btn-white btn-ghost btn-lg mt5" href="{{ route('welcome') }}"><i class="fa fa-long-arrow-left"></i> to Homepage</a>
        </div>
    </div>
</div>


@endsection

@section('footer-links')

<ul class="footer-links">
    <li><a href="{{ route('about_us') }}">About US</a>
    </li>
    <li><a href="{{ route('posts') }}">Press Centre</a>
    </li>
    <li><a href="{{ route('policy') }}">Privacy Policy</a>
    </li>
    <li><a href="{{ route('terms') }}">Terms of Use</a>
    </li>
    <li><a href="{{ route('contact_us') }}">Contact Us</a>
    </li>
    <li><a href="{{ route('outlets') }}">CashCard Vending Points</a>
    </li>
    <li><a href="{{ route('company_login') }}">Travel Company Login</a>
    </li>
</ul>

@endsection