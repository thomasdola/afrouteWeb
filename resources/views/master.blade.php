{{-- <!DOCTYPE HTML> --}}
<html>

<head>
    <title>afroute</title>


    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta name="keywords" content="" />
    <meta name="description" content="afroute - Platform for travel companies">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @include('partials.favicon')
    
    <!-- GOOGLE FONTS -->
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,600' rel='stylesheet' type='text/css'>
    <!-- /GOOGLE FONTS -->
    <link rel="stylesheet" href="{{ asset('css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstraptour.css') }}">
    <link rel="stylesheet" href="{{ asset('js/css/jquery.marquee.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('css/schemes/denim.css') }}"> --}}
    @yield('styles')
    <script src="{{ asset('js/modernizr.js') }}"></script>


    
    <style type="text/css" media="screen">
        a.logo{color: white;}
        .search-error, .success-info, .rent-error{
            position: absolute;
            width: 30%;
            color: white;
            background: #f05258;
            text-align: center;
            font-size: 1.2em;
            line-height: 1.2em;
            top: 300px;
            right: 0;
            z-index:99999999999999;
        }

        .rent-error{
            left:0 ;
        }

        .alert-ash{
            background: rgba(77, 77, 78, .95);            
            color: white;
        }

        .success-info{
            background: #02e642;
            top: 100px;
        }
    </style>

</head>

<body>
    {{--<div class="container" style="position: fixed; z-index: 999999; margin-top: 55px; right: 10px; width: 40%;">--}}
        {{--<div class="alert alert-ash" style="width: 100%;">--}}
            {{--<div class="row">--}}
                {{--<div class="col-md-4" style="font-size: 1.5em;padding-top: 40px;">--}}
                    {{--<span>Start Booking In : </span>--}}
                {{--</div>--}}
                {{--<div class="col-md-6" style="font-size: .7em;">--}}
                    {{--<div class="countdown countdown-md" inline_comment="countdown" data-countdown="Oct 01, 2015" id="countdown"></div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    <div class="global-wrap">
        <header id="main-header">
            
            <div class="header-top">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 logo-container">
                            <a class="logo" href="{{ route('welcome') }}">
                                <img src="{{ asset('img/logo-invert.png') }}" alt="Image Alternative text" title="Image Title" />
                                afroute
                            </a>
                        </div>

                        <div class="col-md-4 col-md-offset-5">
                            <div class="top-user-area clearfix">
                                <ul class="top-user-area-list list list-horizontal list-border">
                                    @if (Auth::user()->check())
                                        <li class="top-user-area-avatar">
                                            <a href="{{ route('customer_profile') }}" title="profile">
                                                {{-- <img class="origin round" src="img/40x40.png" alt="Image Alternative text" title="AMaze" /> --}}
                                                Hi, {{ Auth::user()->get()->name }}
                                            </a>
                                        </li>
                                        <li><a href="{{ route('logout') }}">Sign Out</a>
                                        </li>
                                    @elseif(Auth::travel_company_staff()->check())
                                        <li class="top-user-area-avatar">
                                            <a href="{{ route('company_dashboard') }}" title="settings">
                                                {{-- <img class="origin round" src="img/40x40.png" alt="Image Alternative text" title="AMaze" /> --}}
                                                Hi, {{ Auth::travel_company_staff()->get()->name }}
                                            </a>
                                        </li>
                                        <li><a href="{{ route('companyLogout') }}">Sign Out</a>
                                        </li>
                                    @elseif(Auth::staff()->check())
                                        <li class="top-user-area-avatar">
                                        <a href="{{ route('admin') }}" title="settings">
                                            {{-- <img class="origin round" src="img/40x40.png" alt="Image Alternative text" title="AMaze" /> --}}
                                            Hi, {{ Auth::staff()->get()->name }}
                                        </a>
                                        </li>
                                    <li><a href="{{ route('staffLogout') }}">Sign Out</a>
                                    </li>
                                    @else
                                        <li><a href="{{ route('login') }}" title="">Sing In / Sign Up</a></li>
                                    @endif
                                    <li class="top-user-area-lang">
                                        <a href="#" title="Ghana" style="cursor: default;">
                                            <img src="{{ asset('img/flags/32/gh.png') }}" alt="Ghana" title="Ghana" />GH{{-- <i class="fa fa-angle-down"></i><i class="fa fa-angle-up"></i> --}}
                                        </a>
                                        {{-- <ul class="list nav-drop-menu">
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
                                        </ul> --}}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="nav col-md-9">
                    <ul class="slimmenu" id="slimmenu">
                        <li class="{{ Request::is('/') ? "active" : '' }}">
                            <a href="{{ URL::to( '/') }}">Home</a>
                        </li>
                        <li class="{{ Request::is('companies') ? "active" : '' }}">
                            <a href="{{ URL::to( '/companies') }}">Travel Terminals</a>
                        </li>
                        <li class="{{ Request::is('rent-bus') ? "active" : '' }}">
                            <a href="{{ URL::to( '/rent-bus') }}">Rent Bus</a>
                        </li>
                       {{--  <li class="{{ Request::is('posts') ? "active" : '' }}">
                            <a href="{{ URL::to( '/posts') }}">Press Centre</a>
                        </li> --}}
                    </ul>
                </div>
                <div class="col-md-3">
                    {{-- <div class="alert search-error">
                        fjalskdjlkfjskl
                    </div> --}}
                    <div class="col-md-12">
                        <div class="gap gap-mini"></div>
                    <a class="popup-text" href="#small-dialog" data-effect="mfp-zoom-out"><em>Check Ticket, Card</em></a>
                    </div>
                </div>
            </div>
        </header>

        
         
        <div id="small-dialog" class="mfp-with-anim mfp-hide mfp-dialog">
            <div class="gap gap-small"></div>
            {!! Form::open(['method'=>'get', 'action'=>'PagesController@check_result']) !!}
                <div class="form-group">
                    <input type="text" name="code" id="inp" autocomplete="off" class="form-control" required placeholder="Ticket Code or CashCard Code">
                </div>
                <div class="form-group">
                    <div class="radio-inline radio-lg">
                        <label>
                            <input class="i-radio" type="radio" value="ticket" id="ticket" required name="checkType" />Ticket Code</label>
                    </div>
                    <div class="radio-inline radio-lg">
                        <label>
                            <input class="i-radio" type="radio" value="cashcard" id="cash" required name="checkType" />CashCard Code</label>
                    </div>
                </div>
                <div class="form-group text-center">
                    <input type="submit" class="btn btn-block btn-primary" value="Check">
                </div>
            {!! Form::close() !!}
        </div>


        @yield('content')


        <div class="gap">
            
        </div>



        <footer id="main-footer">
            <div class="container">
                <div class="row row-wrap">
                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <a class="logo" href="{{ route('welcome') }}">
                            <img src="{{ asset('img/logo-invert.png') }}" alt="Image Alternative text" title="Image Title" />
                            afroute
                        </a>
                        <p class="mb20">Booking, reviews and advices on trips, travel packages, and lots more!</p>
                        <ul class="list list-horizontal list-space">
                            <li>
                                <a class="fa fa-facebook box-icon-normal round animate-icon-bottom-to-top" href="http://facebook.com/afroute" target="_blank"></a>
                            </li>
                            <li>
                                <a class="fa fa-twitter box-icon-normal round animate-icon-bottom-to-top" href="http://twitter.com/afroute" target="_blank"></a>
                            </li>
                            {{-- <li>
                                <a class="fa fa-google-plus box-icon-normal round animate-icon-bottom-to-top" href="http://googleplus.com/officialafroute" target="_blank"></a>
                            </li>
                            <li>
                                <a class="fa fa-linkedin box-icon-normal round animate-icon-bottom-to-top" href="http://linkedin.com/afroute_web" target="_blank"></a>
                            </li> --}}
                        </ul>
                        <div class="gap gap-mini"></div>
                        <div class="row">
                            <p>&copy; Copyright 2015 by Eureka Cachet. All Rights Reserved.</p>
                        </div>
                    </div>

                    <div class="col-md-2 col-md-offset-2 col-sm-3 col-xs-6">
                        <ul class="list list-footer">
                            <li><a href="{{ route('about_us') }}">About US</a>
                            </li>
                            {{-- <li><a href="{{ route('posts') }}">Press Centre</a>
                            </li> --}}
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
                    </div>
                    <div class="col-md-4 col-md-offset-1 col-sm-3 col-xs-6">
                        <h4>Have Questions?</h4>
                        <h4 class="text-color">+233-208134588</h4>
                        <h4 class="text-color">+233-243283840</h4>
                        <h4><a href="#" class="text-color">support@afroute.com</a></h4>
                        <p>24/7 Dedicated Customer Support</p>
                    </div>

                </div>
            </div>
        </footer>

        <script src="{{ asset('js/all.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/notify.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/nicescroll.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/dataTables.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/dataTables.bootstrap.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/wysihtml5.all.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/maskedinput.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/bootstraptour.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/jquery.marquee.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
        <script type="text/javascript">

                $(function(){
                    $('#ticket').on('ifChecked', function(){
                        $('input[id="inp"]').mask('***********');
                    });

                    $('#cash').on('ifChecked', function(){
                        $('input[id="inp"]').mask('****-****-****');
                    })

                    $('input[type="tel"]').mask('9999999999');
                })

        </script>
        
        @yield('scripts')
    </div>
</body>

</html>


