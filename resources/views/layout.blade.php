<!DOCTYPE HTML>
<html class="full">

<head>
    <title>afroute</title>


    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta name="description" content="afroute - Platform for travel companies">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @include('partials.favicon')

    <!-- GOOGLE FONTS -->
   {{--  <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,600' rel='stylesheet' type='text/css'> --}}
    <!-- /GOOGLE FONTS -->
    <link rel="stylesheet" href="{{ asset('css/all.css') }}">
    <script src="{{ asset('js/modernizr.js') }}"></script>


</head>

<body class="full">

    <div class="global-wrap">

        
    @yield('content')


    <script src="{{ asset('js/all.js') }}"></script>


    </div>
</body>

</html>


