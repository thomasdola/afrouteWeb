<!DOCTYPE HTML>
<html class="full">

<head>
    <title>afroute - Coming soon</title>


    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta name="keywords" content="online, ticket, bus, booking" />
    <meta name="description" content="Afroute - Platform for online ticket booking">
    <meta name="author" content="TWOKAYS">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @include('partials.favicon-orange')

    <!-- GOOGLE FONTS -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,600' rel='stylesheet' type='text/css'>
    <!-- /GOOGLE FONTS -->
    <link rel="stylesheet" href="{{ asset('css/all.css') }}">
    <script src="{{ asset('js/modernizr.js') }}"></script>


</head>

<body class="full">

    <!-- FACEBOOK WIDGET -->
    <!-- /FACEBOOK WIDGET -->
    <div class="global-wrap">

                            <div class="countdown countdown-lg" inline_comment="countdown" data-countdown="Sep 01, 2015" id="countdown"></div>
        <div class="full-page text-center">
            <div class="bg-holder full">
                <div class="bg-mask-darken"></div>
                 <div class="bg-img" style="background-image:url(img/soon.jpg);"></div>
                <div class="bg-holder-content full text-white">
                    <a class="logo-holder" href="" style="cursor: default;">
                        <img src="{{ asset('img/logo-invert.png') }}" alt="Afroute Logo" title="Afroute" />
                        afroute
                    </a>
                    <div class="full-center">
                        <div class="container">
                            <h2>Launching Soon</h2>
                            <div class="gap"></div>
                            <p style="color: #fff; font-size: 1.5em;">Afroute is a service facilitating platform that makes transaction between the travelers and transport companies.</p>
                            <p style="color: #fff; font-size: 1.5em;">We enable customers to book and pay transport tickets
                                                                      Online.
 </p>
                            {{--<div class="row">--}}
                                {{--<div class="col-md-4 col-md-offset-4">--}}
                                    {{--<form>--}}
                                        {{--<div class="form-group form-group-ghost form-group-lg">--}}
                                            {{--<input class="form-control" placeholder="Type your email address" type="text" />--}}
                                            {{--<div class="gap gap-mini"></div>--}}
                                            {{--<input type="submit" class="btn btn-primary" name="" value="Notify Me">--}}
                                        {{--</div>--}}
                                    {{--</form>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        </div>
                    </div>
                    <ul class="list footer-social">
                        <li>
                            <a class="fa fa-facebook round box-icon-normal animate-icon-bounce" href="http://www.facebook.com/afroute" target="_blank"></a>
                        </li>
                        <li>
                            <a class="fa fa-twitter round box-icon-normal animate-icon-bounce" href="http://www.twitter.com/afroute" target="_blank"></a>
                        </li>
                        {{-- <li>
                            <a class="fa fa-google-plus round box-icon-normal animate-icon-bounce" href=""></a>
                        </li>
                        <li>
                            <a class="fa fa-linkedin round box-icon-normal animate-icon-bounce" href=""></a>
                        </li> --}}
                        &copy; Copyright 2015 by Eureka Cachet. All Rights Reserved.
                    </ul>

                </div>
            </div>
        </div>



        <script src="{{ asset('js/all.js') }}"></script>
        
    </div>
</body>

</html>


