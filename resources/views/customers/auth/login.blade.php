@extends('master')

@section('styles')
<style type="text/css" media="screen">
    .facebook{
        background:  #3b5998;
        color: white;
    }
    .facebook:hover{
        background: #164096;
        color: white;
    }
    .google-plus{
        background: #d34836;
        color: white;
    }
    .google-plus:hover{
        background: #d22711;
        color: white;
    }
    .twitter{
        background: #0084b4;
        color: white;
    }
    .twitter:hover{
        background: #0176a1;
        color: white;
    }
</style>
@endsection


@section('content')

	<div class="container">
            <h1 class="page-title">Login/Register on Afroute</h1>
        </div>

        <div class="gap"></div>


        <div class="container">
            <div class="row" data-gutter="60">
                <div class="col-md-4">
                    <h3>Login</h3>
                    {!! Form::open(['method'=>'post', 'route'=>'login']) !!}
                        <div class="form-group form-group-icon-left"><i class="fa fa-user input-icon input-icon-show"></i>
                            <label>Email</label>
                            <input autocomplete="off" required name="email" class="form-control" placeholder="e.g. johndoe@gmail.com" type="text" />
                        </div>
                        <div class="form-group form-group-icon-left"><i class="fa fa-lock input-icon input-icon-show"></i>
                            <label>Password</label>
                            <input name="password" required class="form-control" type="password" placeholder="my secret password" />
                        </div>
                        <div class="form-group checkbox">
                            <label>
                                <input name="remember" class="i-check" type="checkbox"/>Remember Me
                            </label>
                        </div>
                        <input class="btn btn-primary" type="submit" value="Sign in" />
                        <div class="gap gap-mini"></div>
                    {!! Form::close() !!}
                    @if ($errors->any())
                    <ul class="list list-unstyled">
                    @foreach ($errors->all() as $e)
                        <li><div class="alert alert-danger">{{ $e }}</div></li>
                    @endforeach
                    </ul>
                    @endif
                </div>
                <div class="col-md-4">
                    <h3>New To Afroute?</h3>
                    {!! Form::open(['method'=>'post', 'route'=>'register']) !!}
                        <div class="form-group form-group-icon-left"><i class="fa fa-user input-icon input-icon-show"></i>
                            <label>Full Name</label>
                            <input autocomplete="off" required class="form-control" placeholder="e.g. John Doe" type="text" value="{{ old("name") }}" name="name" />
                        </div>
                        <div class="form-group form-group-icon-left"><i class="fa fa-phone input-icon input-icon-show"></i>
                            <label>Phone Number</label>
                            <input autocomplete="off" required class="form-control" placeholder="e.g. 0524546644" type="tel" name="phone" value="{{ old("phone") }}" />
                        </div>
                        <div class="form-group form-group-icon-left"><i class="fa fa-envelope input-icon input-icon-show"></i>
                            <label>Email</label>
                            <input autocomplete="off" required class="form-control" placeholder="e.g. johndoe@gmail.com" type="text" name="email" value="{{ old("email") }}" />
                        </div>
                        <div class="form-group form-group-icon-left"><i class="fa fa-lock input-icon input-icon-show"></i>
                            <label>Password</label>
                            <input class="form-control" required type="password" placeholder="my secret password" name="password" />
                        </div>
                        <div class="form-group checkbox">
                            <label>
                                <input name="agree" class="i-check" type="checkbox" required/>Agree to our <a target="_blank" href="{{ route('terms') }}" title="">Terms and Conditions</a>
                            </label>
                        </div>
                        <input class="btn btn-primary" type="submit" value="Sign up" />
                    {!! Form::close() !!}
                </div>
                <div class="col-md-4">
                    {{-- <div class="row text-center">
                        <div class="col-md-12">
                            <h3>Or Sign Up with </h3>
                        </div>
                        <div class="gap"></div>
                        <div class="col-md-12">
                            <a href="{{ action('AppAuthController@socialLogin', ['provider'=>'github']) }}" title="" class="btn  facebook"><i class="fa fa-facebook"></i> <span >Facebook</span></a>
                        </div>
                        <div class="gap"></div>
                        <div class="col-md-12">
                            <a href="{{ action('AppAuthController@socialLogin', ['provider'=>'twitter']) }}" title="" class="btn  twitter"><i class="fa fa-twitter"></i> <span >Twitter</span></a>
                        </div>
                        <div class="gap"></div>
                        <div class="col-md-12">
                            <a href="{{ action('AppAuthController@socialLogin', ['provider'=>'google']) }}" title="" class="btn  google-plus"><i class="fa fa-google-plus"></i> <span >Google Plus</span></a>
                        </div>
                        <div class="gap"></div> --}}
                        {{-- <div class="col-md-12">
                            <a href="" title="" class="btn  linked-in"><i class="fa fa-linkedin"></i> <span >LinkedIn</span></a>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>

@endsection