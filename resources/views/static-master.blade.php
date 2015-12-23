<!DOCTYPE HTML>
<html class="full">

<head>
    @yield('page-title')


    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta name="keywords" content="online, ticket, bus, booking" />
    <meta name="description" content="Afroute - Platform for travel companies">
    <meta name="author" content="samaritan">
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
    <!-- /FACEBOOK WIDGET -->
    <div class="global-wrap">

        <div class="full-page">
            <div class="bg-holder full">
                <div class="bg-mask"></div>
                <div class="bg-blur" style="background-image:url(img/1300x900.png);"></div>
                <div class="bg-holder-content full text-white">
                    <a class="logo-holder" href="" style="cursor: default;">
                        <img src="{{ asset('img/logo-invert.png') }}" alt="Afroute Logo" title="Afroute" />
                    </a>
                    <div class="full-center">
                        @yield('content')
                    </div>
                    @yield('footer-links')
                </div>
            </div>
        </div>



        <script type="text/javascript" src="{{ asset('js/all.js') }}"></script>
    </div>
</body>

</html>


