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

    <title>HIO - Challenge Your Friends</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/agency.css') }}" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="{{ asset('font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>

<link href='https://fonts.googleapis.com/css?family=Roboto:700,900,400,500' rel='stylesheet' type='text/css'>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">

    <link href="{{ asset('css/hio.css') }}" rel="stylesheet">


              {{--<script src="{{ asset('js/jquery.js') }}"></script>--}}



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
        background-color: transparent;
        border-color: transparent;
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
    font-size: 25px;
}

.modal-header-create {
    padding: 15px;
}













#fullscreen {
    /*position: fixed;*/
    /*top: 10px;*/
    right: 10px;
}
/* END OF DEMO CSS */

    .animate {
		-webkit-transition: all 0.3s ease-in-out;
		-moz-transition: all 0.3s ease-in-out;
		-o-transition: all 0.3s ease-in-out;
		-ms-transition: all 0.3s ease-in-out;
		transition: all 0.3s ease-in-out;
	}

	.navbar-fixed-left {
		position: fixed;
		top: 0px;
		left: 0px;
		border-radius: 0px;
	}

	.navbar-minimal {
		width: 60px;
		min-height: 60px;
		max-height: 100%;
		background-color: rgb(51, 51, 51);
		background-color: rgba(51, 51, 51, 0.8);
		border-width: 0px;
		z-index: 1000;
	}

	.navbar-minimal > .navbar-toggler {
		position: relative;
		min-height: 60px;
		border-bottom: 1px solid rgb(81, 81, 81);
		z-index: 100;
		cursor: pointer;
	}

	.navbar-minimal.open > .navbar-toggler,
	.navbar-minimal > .navbar-toggler:hover {
		background-color: #eb1946;
	}

	.navbar-minimal > .navbar-toggler > span {
		position: absolute;
		top: 50%;
		right: 50%;
		margin: -8px -8px 0 0;
		width: 16px;
		height: 16px;
		background-image: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4KPCEtLSBHZW5lcmF0b3I6IEFkb2JlIElsbHVzdHJhdG9yIDE2LjIuMSwgU1ZHIEV4cG9ydCBQbHVnLUluIC4gU1ZHIFZlcnNpb246IDYuMDAgQnVpbGQgMCkgIC0tPgo8IURPQ1RZUEUgc3ZnIFBVQkxJQyAiLS8vVzNDLy9EVEQgU1ZHIDEuMS8vRU4iICJodHRwOi8vd3d3LnczLm9yZy9HcmFwaGljcy9TVkcvMS4xL0RURC9zdmcxMS5kdGQiPgo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkxheWVyXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4IgoJIHdpZHRoPSIxNnB4IiBoZWlnaHQ9IjMycHgiIHZpZXdCb3g9IjAgMCAxNiAzMiIgZW5hYmxlLWJhY2tncm91bmQ9Im5ldyAwIDAgMTYgMzIiIHhtbDpzcGFjZT0icHJlc2VydmUiPgo8cGF0aCBmaWxsLXJ1bGU9ImV2ZW5vZGQiIGNsaXAtcnVsZT0iZXZlbm9kZCIgZmlsbD0iI0ZGRkZGRiIgZD0iTTEsN2gxNGMwLjU1MiwwLDEsMC40NDgsMSwxcy0wLjQ0OCwxLTEsMUgxQzAuNDQ4LDksMCw4LjU1MiwwLDgKCVMwLjQ0OCw3LDEsN3oiLz4KPHBhdGggZmlsbC1ydWxlPSJldmVub2RkIiBjbGlwLXJ1bGU9ImV2ZW5vZGQiIGZpbGw9IiNGRkZGRkYiIGQ9Ik0xLDEyaDE0YzAuNTUyLDAsMSwwLjQ0OCwxLDFzLTAuNDQ4LDEtMSwxSDFjLTAuNTUyLDAtMS0wLjQ0OC0xLTEKCVMwLjQ0OCwxMiwxLDEyeiIvPgo8cGF0aCBmaWxsLXJ1bGU9ImV2ZW5vZGQiIGNsaXAtcnVsZT0iZXZlbm9kZCIgZmlsbD0iI0ZGRkZGRiIgZD0iTTEsMmgxNGMwLjU1MiwwLDEsMC40NDgsMSwxcy0wLjQ0OCwxLTEsMUgxQzAuNDQ4LDQsMCwzLjU1MiwwLDMKCVMwLjQ0OCwyLDEsMnoiLz4KPHBhdGggZmlsbC1ydWxlPSJldmVub2RkIiBjbGlwLXJ1bGU9ImV2ZW5vZGQiIGZpbGw9IiNGRkZGRkYiIGQ9Ik0xLjMzLDI4Ljk3bDExLjY0LTExLjY0YzAuNDU5LTAuNDU5LDEuMjA0LTAuNDU5LDEuNjYzLDAKCWMwLjQ1OSwwLjQ1OSwwLjQ1OSwxLjIwNCwwLDEuNjYzTDIuOTkzLDMwLjYzM2MtMC40NTksMC40NTktMS4yMDQsMC40NTktMS42NjMsMEMwLjg3MSwzMC4xNzQsMC44NzEsMjkuNDMsMS4zMywyOC45N3oiLz4KPHBhdGggZmlsbC1ydWxlPSJldmVub2RkIiBjbGlwLXJ1bGU9ImV2ZW5vZGQiIGZpbGw9IiNGRkZGRkYiIGQ9Ik0yLjk5MywxNy4zM2wxMS42NDEsMTEuNjRjMC40NTksMC40NTksMC40NTksMS4yMDQsMCwxLjY2MwoJcy0xLjIwNCwwLjQ1OS0xLjY2MywwTDEuMzMsMTguOTkzYy0wLjQ1OS0wLjQ1OS0wLjQ1OS0xLjIwNCwwLTEuNjYzQzEuNzg5LDE2Ljg3MSwyLjUzNCwxNi44NzEsMi45OTMsMTcuMzN6Ii8+Cjwvc3ZnPgo=);
		background-repeat: no-repeat;
		background-position: 0 0;
		-webkit-transition: -webkit-transform .3s ease-out 0s;
		-moz-transition: -moz-transform .3s ease-out 0s;
		-o-transition: -moz-transform .3s ease-out 0s;
		-ms-transition: -ms-transform .3s ease-out 0s;
		transition: transform .3s ease-out 0s;
		-webkit-transform: rotate(0deg);
		-moz-transform: rotate(0deg);
		-o-transform: rotate(0deg);
		-ms-transform: rotate(0deg);
		transform: rotate(0deg);
	}

	.navbar-minimal > .navbar-menu {
		position: absolute;
		top: -1000px;
		right: 0px;
		margin: 0px;
		padding: 0px;
		list-style: none;
		z-index: 50;
		background-color: rgb(51, 51, 51);
		background-color: rgba(51, 51, 51, 0.8);
	}
	.navbar-minimal > .navbar-menu > li {
		margin: 0px;
		padding: 0px;
		border-width: 0px;
		height: 54px;
	}
	.navbar-minimal > .navbar-menu > li > a {
		position: relative;
		display: inline-block;
		color: rgb(255, 255, 255);
		padding: 20px 23px;
		text-align: left;
		cursor: pointer;
		border-bottom: 1px solid rgb(81, 81, 81);
		width: 100%;
		text-decoration: none;
		margin: 0px;
	}

	.navbar-minimal > .navbar-menu > li > a:last-child {
		border-bottom-width: 0px;
	}
	.navbar-minimal > .navbar-menu > li > a:hover {
		background-color: #eb1946;
	}
	.navbar-minimal > .navbar-menu > li > a > .glyphicon {
		float: right;
	}

	.navbar-minimal.open {
		/*width: 320px;*/
	}

	.navbar-minimal.open > .navbar-toggler > span {
		background-position: 0 -16px;
		-webkit-transform: rotate(-180deg);
		-moz-transform: rotate(-180deg);
		-o-transform: rotate(-180deg);
		-ms-transform: rotate(-180deg);
		transform: rotate(-180deg);
	}

	.navbar-minimal.open > .navbar-menu {
		top: 60px;
		/*width: 100%;*/
		min-height: 100%;
	}

	@media (min-width: 768px) {

	    .hide-full {
            display: none;
        }

		.navbar-minimal.open {
			width: 60px;
		}
		.navbar-minimal.open > .navbar-menu {
			overflow: visible;
		}
		.navbar-minimal > .navbar-menu > li > a > .desc {
			position: absolute;
			display: inline-block;
			top: 50%;
			left: 130px;
			margin-top: -20px;
			margin-left: 20px;
			text-align: left;
			white-space: nowrap;
			padding: 10px 13px;
			border-width: 0px !important;
			background-color: rgb(51, 51, 51);
			background-color: rgba(51, 51, 51, 0.8);
			opacity: 0;
		}
		.navbar-minimal > .navbar-menu > li > a > .desc:after {
			z-index: -1;
			position: absolute;
			top: 50%;
			left: -10px;
			margin-top: -10px;
			content:'';
			width: 0;
			height: 0;
			border-top: 10px solid transparent;
			border-bottom: 10px solid transparent;
			border-right: 10px solid rgb(51, 51, 51);
			border-right-color: rgba(51, 51, 51, 0.8);
		}
		.navbar-minimal > .navbar-menu > li > a:hover > .desc {
			left: 60px;
			opacity: 1;
		}
	}







    </style>


    @yield('header')

</head>




<body data-spy="scroll" data-target=".navbar" id="page-top" class="index">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll ">

{{--<button type="button" class="navbar-toggler animate" >--}}
                <div class="navbar-minimal animate hide-full" style="float: right;">
                    <div class="navbar-toggler  animate">
                        <span class="menu-icon"></span>
                    </div>


                    <ul class="navbar-menu animate">

                        @if(Auth::check())
                            <li style="height: 68px;">
                               <a href="{{ url('profile', 'me') }}" class="animate" style="padding-left: 10px;padding-right: 10px;">
                                   {{--<span class="desc animate"> Who We Are </span>--}}
                                   {{--<span class="glyphicon glyphicon-user"></span>--}}
                                   <img src="{{'/user/photo/'. Auth::user()->id }}"
                                   alt="{{Auth::user()->name}}" title="{{Auth::user()->name}}" class="img-circle" style="height: 42px; width: 42px">

                               </a>
                           </li>
                        @endif


                        <li>
                            <a style="padding-left: 5px;padding-right: 5px;text-align: center;" href="{{ url('challenges') }}" class="animate">
                                {{--<span class="desc animate"> What We Say </span>--}}
                                <span style="font-size: 11px;"  class="">Challenge</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('new') }}" class="animate">
                                {{--<span class="desc animate"> How To Reach Us </span>--}}
                                <i class="fa fa-fire" aria-hidden="true"></i>
                            </a>
                        </li>

                         @if(Auth::check())

                             <li>
                                <a href="{{ action('SocialAuthController@logout') }}" class="animate">
                                    <span class="glyphicon glyphicon-log-out"></span>
                                </a>
                             </li>

                         @else
                             <li >
                                <a class="animate" id="login_btn"  href="{{ url('/auth') }}">
                                    <span class="glyphicon glyphicon-log-in"></span>
                                </a>
                            </li>
                         @endif

                    </ul>

                </div>





                {{--</button>--}}


                {{--<button type="button"  class="navbar-toggler animate" >--}}
                    {{--<span class="sr-only">Toggle navigation</span>--}}
                    {{--<span class="icon-bar"></span>--}}
                    {{--<span class="icon-bar"></span>--}}
                    {{--<span class="icon-bar"></span>--}}
                {{--</button>--}}
                <div class="navbar-brand page-scroll">
                    <a  href="{{ action('HomeController@home') }}">
                         <img style="width: 100px;" id="logo-hio-mobile" src="{{ asset('img/logo.png')}}" alt="HIO">
                    </a>


                    <div style="width: 45px;float: right;margin-top: 13px;" id="mobile-notifications" >

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
                            {{--<li class="divider"></li>--}}
                            {{--<div class="notification-footer"><h4 class="menu-title">View all<i class="glyphicon glyphicon-circle-arrow-right"></i></h4></div>--}}
                        </ul>


                    </div>


                </div>

            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav nav-hio">
                    {{--<li class="hidden">--}}
                        {{--<a href="#page-top"></a>--}}
                    {{--</li>--}}

                    <li {{{Request::is('HIO-Mission') ? 'class=active' : ''}}}><a  class="header-link" href="{{ url('HIO-Mission') }}">HIO Mission</a></li>

                    <li {{{Request::is('challenges') ? 'class=active' : ''}}} >
                        <a class="header-link"  href="{{ url('challenges') }}">Challenges</a>
                    </li>

                    <li {{{Request::is('HIO-Mission') ? 'class=active' : ''}}}><a  class="header-link" href="{{ url('new') }}">New</a></li>


                    {{--<li class="search-select2">{!! Form::select('search[]', array(),null,array( 'class'=>'form-control hidden search-ajax', 'multiple'=>'multiple')) !!}</li>--}}
                    <li><i class="fa fa-search header-link main-search pointer" style="font-size: 14pt;padding-top: 15px" aria-hidden="true"></i></li>


                </ul>

                <ul class="nav navbar-nav navbar-right nav-hio" >


                    @if(Auth::check())
                        <li >
                            <a style="padding-top: 0px;" href="{{ url('profile', 'me') }}">

                                @if(Auth::user()->photo == "")
                                    <img src="/uploads/users/default_user.png" alt="{{Auth::user()->name}}" title="{{Auth::user()->name}}" class="img-circle" style="height: 50px; width: 50px">
                                @else
                                    <img src="{{'/uploads/users/'. Auth::user()->photo }}" alt="{{Auth::user()->name}}" title="{{Auth::user()->name}}" class="img-circle" style="height: 50px; width: 50px">

                                @endif
                            </a>
                        </li>
                        <li>
                            {{--<p class="header-link" style=" margin-bottom: 5px;text-align: left;">{{getFirstLastName(Auth::user()->name)}}</p>--}}
                            <a class="header-link" href="{{ url('profile', 'me') }}" style=" margin-bottom: 5px;text-align: left; padding-left: 0px;text-transform: capitalize;padding: 5px 0px 0px 0px;">{{getFirstLastName(Auth::user()->name)}}</a>

                            <a class="nav-logout header-link-secondary" style="padding-top: 0px;text-align: left;" href="{{ action('SocialAuthController@logout') }}">Logout</a>
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
                                {{--<li class="divider"></li>--}}
                                {{--<div class="notification-footer"><h4 class="menu-title">View all<i class="glyphicon glyphicon-circle-arrow-right"></i></h4></div>--}}
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


        {{--<nav class="navbar navbar-fixed-left navbar-minimal animate" role="navigation">--}}
    		{{--<div class="navbar-toggler animate">--}}
    			{{--<span class="menu-icon"></span>--}}
    		{{--</div>--}}
    		{{--<ul class="navbar-menu animate">--}}
    			{{--<li>--}}
    				{{--<a href="#about-us" class="animate">--}}
    					{{--<span class="desc animate"> Who We Are </span>--}}
    					{{--<span class="glyphicon glyphicon-user"></span>--}}
    				{{--</a>--}}
    			{{--</li>--}}
    			{{--<li>--}}
    				{{--<a href="#blog" class="animate">--}}
    					{{--<span class="desc animate"> What We Say </span>--}}
    					{{--<span class="glyphicon glyphicon-info-sign"></span>--}}
    				{{--</a>--}}
    			{{--</li>--}}
    			{{--<li>--}}
    				{{--<a href="#contact-us" class="animate">--}}
    					{{--<span class="desc animate"> How To Reach Us </span>--}}
    					{{--<span class="glyphicon glyphicon-comment"></span>--}}
    				{{--</a>--}}
    			{{--</li>--}}
    		{{--</ul>--}}
    	{{--</nav>--}}

    @yield('content')



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
            <div style="margin-bottom: 40px" class="row">
                <div class="col-md-12">
                    <ul class="list-inline footer-icon">
                        <li><a href="https://www.instagram.com/hioselfmadelegends/"><i class="fa fa-instagram"></i></a>
                        </li>
                        <li style="margin-left: 50px;margin-right: 50px"><a href="https://www.facebook.com/HIO-978238685528426/?fref=ts"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li><a href="https://hioblog.wordpress.com"><i class="fa fa-wordpress"></i></a>
                        </li>
                    </ul>

                </div>
            </div>

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

<script src="{{ asset('js/hio.js') }}"></script>

<script>
$('.navbar-toggler').on('click', function(event) {
		event.preventDefault();
		$(this).closest('.navbar-minimal').toggleClass('open');
	})


</script>

    @yield('footer')


</body>

</html>






