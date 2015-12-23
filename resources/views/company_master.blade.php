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
    {{-- <link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,600' rel='stylesheet' type='text/css'> --}}
    <!-- /GOOGLE FONTS -->
    <link rel="stylesheet" href="{{ asset('css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('css/schemes/leather.css') }}">
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
                            <a class="logo" href="{{ route('welcome') }}">
                                <img src="{{ asset('img/logo-invert.png') }}" alt="Image Alternative text" title="Image Title" />
                                afroute
                            </a>
                        </div>
                        <div class="col-md-4 col-md-offset-5">
                            <div class="top-user-area clearfix">
                                <ul class="top-user-area-list list list-horizontal list-border">
                                    @if (Auth::travel_company_staff()->check())
                                        <li class="top-user-area-avatar">
                                        <a href="{{ route('company_dashboard') }}" title="settings">
                                            {{-- <img class="origin round" src="img/40x40.png" alt="Image Alternative text" title="AMaze" /> --}}
                                            Hi, {{ Auth::travel_company_staff()->get()->name }}
                                        </a>
                                    </li>
                                    <li><a href="{{ route('companyLogout') }}">Sign Out</a>
                                    </li>
                                    @endif
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
                <div class="row row-wrap">
                    <div class="col-md-3">
                        <a class="logo" href="{{ route('welcome') }}">
                            <img src="{{ asset('img/logo-invert.png') }}" alt="Image Alternative text" title="Image Title" />
                        </a>
                        <p class="mb20">Booking, reviews and advices on trips, travel packages, and lots more!</p>
                        <ul class="list list-horizontal list-space">
                            <li>
                                <a class="fa fa-facebook box-icon-normal round animate-icon-bottom-to-top" href="#"></a>
                            </li>
                            <li>
                                <a class="fa fa-twitter box-icon-normal round animate-icon-bottom-to-top" href="#"></a>
                            </li>
                            {{-- <li>
                                <a class="fa fa-google-plus box-icon-normal round animate-icon-bottom-to-top" href="#"></a>
                            </li>
                            <li>
                                <a class="fa fa-linkedin box-icon-normal round animate-icon-bottom-to-top" href="#"></a>
                            </li> --}}
                        </ul>
                    </div>

                    <div class="col-md-2 col-md-offset-2">
                        <ul class="list list-footer">
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
                            <li><a href="{{ route('contact_us') }}">CashCard Vending Points</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-4 col-md-offset-1">
                        <h4>Have Questions?</h4>
                        <h4 class="text-color">+233-246896111/248089578</h4>
                        <h4><a href="#" class="text-color">support@afroute.com</a></h4>
                        <p>24/7 Dedicated Customer Support</p>
                    </div>

                </div>
            </div>
        </footer>

        <script src="{{ asset('js/all.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/dataTables.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/dataTables.bootstrap.js') }}"></script>
        
        @yield('scripts')
    </div>
</body>

</html>


