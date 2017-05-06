<!DOCTYPE html>
<html lang="en">

<head>

    <meta name="google-site-verification" content="LfFDtDqbM9i_YBr5Hk06cAjJrHPgVXG0T6KJCHku7b0" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Sport Gamification using challenges">
    <meta name="author" content="">
    <link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/img/favicon.ico" type="image/x-icon">

    <title>HIO - Self Made Legends</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/agency.css') }}" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="{{ asset('font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>

<link href='https://fonts.googleapis.com/css?family=Roboto:700,900,400,500,200' rel='stylesheet' type='text/css'>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script src="/js/modernizr.js"></script>

    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">


    <link href="{{ asset('css/hio.css') }}" rel="stylesheet">
    <link href="{{ asset('css/menu.css') }}" rel="stylesheet">

    <style>


    .navbar-toggle .icon-bar {
        display: block;
        width: 100%;
        height: 4px;
        border-radius: 1px;
    }

    .navbar-default .navbar-toggle {
        background-color: transparent;
        border-color: transparent;
    }

    .navbar-default {

        background-color: #222;
    }


@media (min-width: 1000px){
    .home-header{
    background-size: 140% !important;
    }
}


@media (max-width:769px) and (min-width:600px){
    .home-header{
    background-size: 115% !important;
    }
}


.home-header{
    background-image: url({{ asset('img/header-bg.png')}});
    background-size: 200%;
    background-repeat: no-repeat;
    background-position: center;
    }

.create-challenge-title{
    text-align: center;
    font-weight: 400;
    text-transform: initial;
    margin-bottom: 0px;
    font-size: 25px;
}

.modal-header-create {
    padding: 15px;
}


.sidebar-brand .caret {
    position: absolute;
    right: 24px;
    top: 24px;
}

.sidebar-header {
background-color: #e91e63;
    position: relative;
    height: 157.5px;
    margin-bottom: 8px;
    -webkit-transition: all 0.2s ease-in-out;
    -o-transition: all 0.2s ease-in-out;
    transition: all 0.2s ease-in-out;
}
.sidebar-brand {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    display: block;
    height: 48px;
    line-height: 48px;
    padding: 0;
    padding-left: 16px;
    padding-right: 56px;
    text-decoration: none;
    clear: both;
    font-weight: 500;
    overflow: hidden;
    -o-text-overflow: ellipsis;
    text-overflow: ellipsis;
    white-space: nowrap;
    -webkit-transition: all 0.2s ease-in-out;
    -o-transition: all 0.2s ease-in-out;
    transition: all 0.2s ease-in-out;
}

.sidebar-image img {
    width: 54px;
    height: 54px;
    margin: 16px;
    border-radius: 50%;
    -webkit-transition: all 0.2s ease-in-out;
    -o-transition: all 0.2s ease-in-out;
    transition: all 0.2s ease-in-out;
}

#nav .dropdown-menu {
    position: relative;
    width: 100%;
    margin: 0;
    padding: 0;
    border: none;
    border-radius: 0;
    -webkit-box-shadow: none;
    box-shadow: none;
}


#nav .dropdown{
    padding: 0px;
    margin-left: 0px;
}
.sidebar-nav li a {
    position: relative;
    cursor: pointer;
    user-select: none;
    display: block;
    height: 48px;
    line-height: 48px;
    padding: 0;
    padding-left: 16px;
    padding-right: 56px;
    text-decoration: none;
    clear: both;
    font-weight: 500;
    overflow: hidden;
    -o-text-overflow: ellipsis;
    text-overflow: ellipsis;
    white-space: nowrap;
    -webkit-transition: all 0.2s ease-in-out;
    -o-transition: all 0.2s ease-in-out;
    transition: all 0.2s ease-in-out;
}

 .sidebar-brand {
    color: #e0e0e0 !important;
    background-color: transparent;
}
.top-bar {
    height: 25px;
    background: rgba(0, 0, 0, 0.1);
}

@media (max-width: 768px){
    .openCreate{
        margin-left: 8.33333333%;
        width: 83.33333333%;
    }
}





    </style>


    @yield('header')

</head>




<body data-spy="scroll" data-target=".navbar" id="page-top" class="index">


<div id="outer-wrap">
<div id="inner-wrap">



    {{--<nav id="nav"  role="navigation">--}}

        {{--<div class="block">--}}
            {{--<h2 class="block-title">Chapters</h2>--}}
            {{--@if(Auth::check())--}}
                {{--<div class="sidebar-header">--}}
                    {{--<!-- Top bar -->--}}
                    {{--<div class="top-bar"></div>--}}
                    {{--<!-- Sidebar toggle button -->--}}
                    {{--<button type="button" class="sidebar-toggle" style="display: none;">--}}
                        {{--<i class="icon-material-sidebar-arrow"></i>--}}
                    {{--</button>--}}
                    {{--<!-- Sidebar brand image -->--}}
                    {{--<a class="sidebar-image" href="{{ url('profile', 'me') }}">--}}
                        {{--<img src="{{'/user/photo/'. Auth::user()->id }}" alt="{{Auth::user()->name}}" title="{{Auth::user()->name}}" class="img-circle" >--}}
                    {{--</a>--}}
                    {{--<!-- Sidebar brand name -->--}}
                    {{--<a data-toggle="dropdown" class="sidebar-brand" href="#settings-dropdown">--}}
                        {{--{{Auth::user()->name}}--}}
                        {{--<b class="caret"></b>--}}
                    {{--</a>--}}
                {{--</div>--}}
            {{--@endif--}}
            {{--<ul>--}}
                {{--@if(Auth::check())--}}
                    {{--<li class="dropdown">--}}
                        {{--<ul id="settings-dropdown" class="dropdown-menu" style="display: none;">--}}
                            {{--<li>--}}
                                {{--<a href="#" tabindex="-1">--}}
                                    {{--Profile--}}
                                {{--</a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<a href="#" tabindex="-1">--}}
                                    {{--Settings--}}
                                {{--</a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<a href="#" tabindex="-1">--}}
                                    {{--Help--}}
                                {{--</a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<a href="#" tabindex="-1">--}}
                                    {{--Exit--}}
                                {{--</a>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}

                {{--@endif--}}

                 {{--<li class="{{{Request::is('HIO-Mission') ? 'active is-active' : ''}}}"><a  class="header-link" href="{{ url('HIO-Mission') }}">HIO Mission</a></li>--}}

                 {{--<li class="{{{Request::is('challenges') ? 'active is-active' : ''}}}" >--}}
                     {{--<a class="header-link"  href="{{ url('challenges') }}">Challenges</a>--}}
                 {{--</li>--}}

                 {{--<li class="{{{Request::is('new') ? 'active is-active' : ''}}}"><a  class="header-link" href="{{ url('new') }}">New</a></li>--}}

                 {{--@if(Auth::check())--}}

                 {{--<li>--}}
                    {{--<a href="{{ action('SocialAuthController@logout') }}">Logout</a>--}}
                 {{--</li>--}}

                 {{--@else--}}
                     {{--<li >--}}
                        {{--<a class="header-link" id="login_btn"  href="{{ url('/auth') }}">Login</a>--}}
                    {{--</li>--}}
                    {{--<li >--}}
                        {{--<a class="header-link-secondary"  href="{{ url('/auth') }}">Register</a>--}}
                    {{--</li>--}}
                 {{--@endif--}}
            {{--</ul>--}}
            {{--<a class="close-btn" id="nav-close-btn" href="#top">Return to Content</a>--}}
        {{--</div>--}}
    {{--</nav>--}}

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">


                {{--<button type="button" id="nav-open-btn" class="navbar-toggle" >--}}
                    {{--<span class="sr-only">Toggle navigation</span>--}}
                    {{--<span class="icon-bar"></span>--}}
                    {{--<span class="icon-bar"></span>--}}
                    {{--<span class="icon-bar"></span>--}}
                {{--</button>--}}





                <button class="button_container navbar-toggle" id="toggle">
                    <span class="top"></span>
                    <span class="middle"></span>
                    <span class="bottom"></span>
                </button>

                    <i class="fa fa-search search-mobile main-search pointer" style="font-size: 28px;color: white;padding-top: 6px;" aria-hidden="true"></i>

                <div class="navbar-brand page-scroll">
                    <a  href="{{ action('HomeController@home') }}">
                         <img style="width: 100px;" id="logo-hio-mobile" src="{{ asset('img/logo.png')}}" alt="HIO">
                    </a>

                    <div style="width: 45px;margin-right: 60px;float: right;margin-top: 13px;" id="mobile-notifications" >

                        <a id="notification-btn-mobile" class="header-link notification-btn" role="button" data-toggle="dropdown" data-target="#" href="#" aria-haspopup="true" aria-expanded="false" style="padding-left: 0px;padding-top: 5px;background-color: rgba(148, 0, 211, 0);">
                            <i class="glyphicon glyphicon-bell"></i>
                        </a>
                        <span class="badge badge-notify" style="display: none;margin-left: -10px;">0</span>


                        <ul class="dropdown-menu notifications pull-right" role="menu" aria-labelledby="notification-btn-mobile">

                            <div class="notification-heading text-color1">
                                <h4 class="menu-title col-md-offset-1">Your Notifications</h4>
                            </div>

                            <div class="notifications-wrapper">

                            </div>
                        </ul>


                    </div>

                </div>

            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav nav-hio">

                    <li {{{Request::is('HIO-Mission') ? 'class=active' : ''}}}><a  class="header-link" href="{{ url('HIO-Mission') }}">HIO Mission</a></li>

                    <li {{{Request::is('challenges') ? 'class=active' : ''}}} >
                        <a class="header-link"  href="{{ url('challenges') }}">Challenges</a>
                    </li>

                    {{--<li {{{Request::is('new') ? 'class=active' : ''}}}><a  class="header-link" href="{{ url('new') }}">New</a></li>--}}

                    <li><i class="fa fa-search header-link main-search pointer" style="font-size: 14pt;padding-top: 15px" aria-hidden="true"></i></li>


                </ul>

                <ul class="nav navbar-nav navbar-right nav-hio" >


                    @if(Auth::check())
                        <li >
                            <a style="padding-top: 0px;" href="{{ url('profile', 'me') }}">
                                <img src="{{'/user/photo/'. Auth::user()->id }}" alt="{{Auth::user()->name}}" title="{{Auth::user()->name}}" class="img-circle" style="height: 50px; width: 50px">
                            </a>
                        </li>
                        <li>
                            <div class="dropdown header-link">
                                <button class="dropdown-toggle" type="button" data-toggle="dropdown">{{getFirstLastName(Auth::user()->name)}}
                                    <span class="caret"></span></button>
                                <ul class="dropdown-menu" style="background-color: #555;    margin-top: 36px;">
                                    <li><a href="{{ url('profile', 'me') }}">My Profile</a></li>
                                    <li><a href="{{ action('UserProfileController@editProfile') }}">Settings</a></li>

                                    @if(Auth::user()->other_profile != NULL)

                                         @if(Auth::user()->role == "trainer")
                                            <li><a href="javascript:{}" onclick="document.getElementById('switch-profile').submit(); return false;">Change to Normal User</a></li>
                                         @else
                                            <li><a href="javascript:{}" onclick="document.getElementById('switch-profile').submit(); return false;">Change to Trainer account</a></li>
                                        @endif

                                         <form class="hidden" role="form" id="switch-profile" method="POST"  action="{{ url('/switch-profile') }}">
                                             {{ csrf_field() }}
                                             <button type="submit" class=""></button>
                                        </form>

                                    @endif
                                    <li><a href="{{ action('SocialAuthController@logout') }}">Logout</a></li>
                                </ul>
                            </div>

                            {{--<a class="nav-logout header-link-secondary" style="padding-top: 0px;text-align: left;" href="{{ action('SocialAuthController@logout') }}">Logout</a>--}}
                        </li>
                        <li style="width: 60px;" id="full-nav">

                            <a id="notification-btn" class="header-link notification-btn" role="button" data-toggle="dropdown" data-target="#" href="#" aria-haspopup="true" aria-expanded="false" style="padding-left: 0px;padding-top: 5px;background-color: rgba(148, 0, 211, 0);">
                                <i class="glyphicon glyphicon-bell"></i>
                            </a>
                            <span class="badge badge-notify" style="display: none;">0</span>


                            <ul class="dropdown-menu notifications pull-right" role="menu" aria-labelledby="notification-btn">

                                <div class="notification-heading text-color1">
                                    <h4 class="menu-title col-md-offset-1">Your Notifications</h4>
                                </div>

                                <div class="notifications-wrapper">

                                </div>
                            </ul>


                        </li>

                    @endif

                    @if(!Auth::check())
                        <li >
                            <a class="header-link" id="login_btn"  href="{{ url('/auth') }}">Login</a>
                        </li>
                        <li >
                            <a class="header-link-secondary"  href="{{ url('/auth') }}">Register</a>
                        </li>
                    @endif
                </ul>


            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>


        <div id="conteudo">
            @yield('content')
        </div>


    <div class="overlay" id="overlay">
        <nav class="overlay-menu">
            <ul>
            @if(Auth::check())
                <li class="mobile-header">

                    <div class="row" style="display: inline-block;padding: 15px 0px;">
                        <a style="padding-top: 0px;float: left; width: 50px" href="{{ url('profile', 'me') }}">
                            <img src="{{'/user/photo/'. Auth::user()->id }}" alt="{{Auth::user()->name}}" title="{{Auth::user()->name}}" class="img-circle mobile-img-header" >
                        </a>

                        <span class=" mobile-header-text" >
                            <span class="dropdown-toggle" type="button" data-toggle="dropdown">{{getFirstLastName(Auth::user()->name)}}
                            </span>

                            <p style="    text-align: initial;    margin-bottom: 0px;color: #334650">ADVANCED</p>

                        </span>
                        <span class=" mobile-menu" type="button" >
                            <span class="caret" style="color: #334650"></span>
                        </span>
                    </div>
                </li>

                    <li class="submenu hidden"><a href="{{ url('profile', 'me') }}">My Profile</a></li>
                    <li class="submenu hidden"><a href="{{ action('UserProfileController@editProfile') }}">Settings</a></li>
                    @if(Auth::user()->other_profile != NULL)

                        @if(Auth::user()->role == "trainer")
                        <li class="submenu hidden"><a href="javascript:{}" onclick="document.getElementById('switch-profile').submit(); return false;">Change to Normal User</a></li>
                        @else
                        <li class="submenu hidden"><a href="javascript:{}" onclick="document.getElementById('switch-profile').submit(); return false;">Change to Trainer account</a></li>
                        @endif
                        <form class="hidden hidden" role="form" id="switch-profile" method="POST"  action="{{ url('/switch-profile') }}">
                        {{ csrf_field() }}
                        <button type="submit" class=""></button>
                        </form>
                    @endif
                    <li class="submenu hidden"><a href="{{ action('SocialAuthController@logout') }}">Logout</a></li>

                @else
                    <li class="mobile-header">

                        <div class="row" style="display: inline-block;padding: 15px 0px;">
                            <a class="header-link" id="login_btn"  style="font-size: 30px;float: left;margin-right: 25px;" href="{{ url('/auth') }}">Login</a>

                            <a class="header-link-secondary" style="font-size: 30px;"  href="{{ url('/auth') }}">Register</a>
                        </div>
                    </li>
                @endif

                <li {{Request::is('HIO-Mission') ? 'class=active' : ''}}>
                    <a class="mobile-link" style="padding-top: 25px;" href="{{ url('HIO-Mission') }}">HIO Mission</a>
                </li>

                <li {{Request::is('challenges') ? 'class=active' : ''}} >
                    <a class="mobile-link"href="{{ url('challenges') }}">Challenges</a>
                </li>
            </ul>
        </nav>
    </div>








<div class="modal fade" id="search-modal" tabindex="-1" role="dialog" aria-labelledby="searchLabel" aria-hidden="true">
        <div class="modal-dialog" style="min-height: calc(40vh - 30px);">
            <div class="modal-content">
                <div class="modal-body" style="padding: 0px;    font-size: 27pt;    font-weight: 400;" >

                   <div class=" row search-select2" >
                        {!! Form::select('search[]', array(),null,array( 'id'=>'search-input', 'class'=>'form-control hidden search-ajax', 'multiple'=>'multiple')) !!}
                    </div>
            </div>
        </div>
    </div>
</div>


<footer>
    <div style="text-align: center; margin-bottom: 15px;margin-top: 50px;" class="container">
        {{--<div style="margin-bottom: 40px" class="row">--}}
            {{--<div class="col-md-12">--}}
                {{--<ul class="list-inline footer-icon">--}}
                    {{--<li><a href="https://www.instagram.com/hioselfmadelegends/"><i class="fa fa-instagram"></i></a>--}}
                    {{--</li>--}}
                    {{--<li style="margin-left: 50px;margin-right: 50px"><a href="https://www.facebook.com/HIO-978238685528426/?fref=ts"><i class="fa fa-facebook"></i></a>--}}
                    {{--</li>--}}
                    {{--<li><a href="https://hioblog.wordpress.com"><i class="fa fa-wordpress"></i></a>--}}
                    {{--</li>--}}
                {{--</ul>--}}

            {{--</div>--}}
        {{--</div>--}}

        <div class="row">
            <div class="col-md-12">
                <ul class="list-inline footer-links">
                    <li><a href="{{ url('private-policy') }}">Privacy Policy</a></li>

                    <li style="padding: 0px;">|</li>

                    <li><a  href="{{ url('terms') }}">Terms & Conditions</a></li>

                    <li style="padding: 0px;">|</li>



                    <li><a  href="{{ url('contact-us') }}">Contacts</a></li>

                </ul>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <span class="footer-links">&copy; 2016 HIO. All rights reserved</span>
            </div>
        </div>
    </div>
</footer>

    {{--<footer role="contentinfo">--}}
        {{--<div class="block prose">--}}
            {{--<p class="small"><a href="http://ota.ahds.ac.uk/desc/5730">Text distributed by the University of Oxford under a Creative Commons Attribution-ShareAlike 3.0 Unported License</a></p>--}}
            {{--<p class="small">Copyright © <a href="http://dbushell.com/">David Bushell</a></p>--}}
        {{--</div>--}}
    {{--</footer>--}}

</div>
<!--/#inner-wrap-->
</div>
<!--/#outer-wrap-->



@yield('modal')


    <!-- jQuery -->
{{--    <script src="{{ asset('js/jquery.js') }}"></script>--}}
    {{--<script src="js/jquery.js"></script>--}}

    <!-- Bootstrap Core JavaScript -->
{{--<script src="{{ asset('js/bootstrap.min.js') }}"></script>--}}
{{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>--}}
    <!-- Plugin JavaScript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    <script src="{{ asset('js/agency.js') }}"></script>
    <script src="{{ asset('js/select2.full.min.js') }}"></script>
    <script src="{{ asset('js/jquery.timeago.js') }}"></script>

    <script>
        $('#toggle').click(function() {
            $(this).toggleClass('active');
            $('#overlay').toggleClass('open');
            $('#conteudo').toggleClass('hidden');

            $('.navbar-default').toggleClass('no-color-nav');

        });

        $('.mobile-menu').click(function() {
            $(this).toggleClass('active');
            $('.submenu').toggleClass('hidden');
        });



    </script>


<script src="{{ asset('js/hio.js') }}"></script>

    @yield('footer')



</body>

</html>






