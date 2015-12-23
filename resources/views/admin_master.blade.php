<!DOCTYPE HTML>
<html>

<head>
    <title>afroute</title>


    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta name="keywords" content="" />
    <meta name="description" content="afroute - Platform for travel companies">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @include('partials.favicon')
    
    <!-- GOOGLE FONTS -->
    {{-- <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,600' rel='stylesheet' type='text/css'> --}}
    <!-- /GOOGLE FONTS -->
    <link rel="stylesheet" href="{{ asset('css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('css/wysihtml5.css') }}">
    <link rel="stylesheet" href="{{ asset('css/schemes/bright-turquoise.css') }}">
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('css/animate.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('css/schemes/denim.css') }}"> --}}
    @yield('styles')
    <script src="{{ asset('js/modernizr.js') }}"></script>


</head>

<body>

    <div class="global-wrap">
        <header id="main-header">
            <div class="header-top">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <a class="logo" href="{{ route('welcome') }}" style="color: white;">
                                <img src="{{ asset('img/logo-invert.png') }}" alt="Image Alternative text" title="Image Title" />
                                afroute
                            </a>
                        </div>
                        <div class="col-md-4 col-md-offset-5">
                            <div class="top-user-area clearfix">
                                <ul class="top-user-area-list list list-horizontal list-border">
                                    @if (Auth::staff()->check())
                                        <li class="top-user-area-avatar">
                                        <a href="{{ route('admin') }}" title="settings">
                                            {{-- <img class="origin round" src="img/40x40.png" alt="Image Alternative text" title="AMaze" /> --}}
                                            Hi, {{ Auth::staff()->get()->name }}
                                        </a>
                                    </li>
                                    <li><a href="{{ route('staffLogout') }}">Sign Out</a>
                                    </li>
                                    @else
                                        <li><a href="#">Sign In</a>
                                    @endif
                                    </li>
                                    <li class="top-user-area-lang nav-drop">
                                        <a href="#" title="Ghana">
                                            <img src="{{ asset('img/flags/32/gh.png') }}" alt="Ghana" title="Ghana" />GH<i class="fa fa-angle-down"></i><i class="fa fa-angle-up"></i>
                                        </a>
                                        <ul class="list nav-drop-menu">
                                            <li>
                                                <a title="Nigeria" href="#">
                                                    <img src="{{ asset('img/flags/32/ng.png') }}" alt="Nigeria" title="Nigeria" /><span class="right">NG</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a title="Ivory Coast" href="#">
                                                    <img src="{{ asset('img/flags/32/ie.png') }}" alt="Ivory Coast" title="Ivory Coast" /><span class="right">IE</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a title="Benin" href="#">
                                                    <img src="{{ asset('img/flags/32/bj.png') }}" alt="Benin" title="Benin" /><span class="right">BJ</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a title="Burkina-Faso" href="#">
                                                    <img src="{{ asset('img/flags/32/bf.png') }}" alt="Burkina-Faso" title="Burkina-Faso" /><span class="right">BF</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>



        @yield('content')


        <div class="gap">
            
        </div>



        <footer id="main-footer">
            <div class="container">
                
            </div>
        </footer>

    </div>
        <script src="{{ asset('js/all.js') }}"></script>
        {{-- <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script> --}}
        <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/nicescroll.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/dataTables.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/dataTables.bootstrap.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/notify.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/wysihtml5.all.js') }}"></script>
        <script type="text/javascript">

                $(function(){

                    $('input[type="tel"]').mask('9999999999');
                })

        </script>
        @yield('scripts')
</body>

</html>


