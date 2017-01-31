<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
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


    </style>


    @yield('header')

</head>




<body data-spy="scroll" data-target=".navbar" id="page-top" class="index">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle js-slideout-toggle" >
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="navbar-brand page-scroll">
                    <a  href="{{ action('HomeController@home') }}">
                         <img style="width: 100px;" src="{{ asset('img/logo.png')}}" alt="HIO">
                    </a>
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

                            <a id="notification-btn" class="header-link" role="button" data-toggle="dropdown" data-target="#" href="#" aria-haspopup="true" aria-expanded="false" style="padding-left: 0px;padding-top: 5px;background-color: rgba(148, 0, 211, 0);">
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

    <nav id="sidebar-wrapper" style="margin-top: 67px;">
      {{--<header>--}}
        {{--<h2>Menu</h2>--}}
      {{--</header>--}}
      <ul class="menu-lateral" style="padding-left: 0" >


        @if(Auth::check())

            <li>
                <div class="profile-wrapper">
                      <a href="{{ url('profile', 'me') }}">
                            @if(Auth::user()->photo == "")
                                <img src="/uploads/users/default_user.png" alt="{{Auth::user()->name}}" title="{{Auth::user()->name}}" class="img-circle profile-side-img" style="height: 90px; width: 90px">
                            @else
                                <img src="{{'/uploads/users/'. Auth::user()->photo }}" alt="{{Auth::user()->name}}" title="{{Auth::user()->name}}" class="img-circle profile-side-img" style="height: 90px; width: 90px">

                            @endif
                        </a>
                        {{--<div class="rgba-stylish-strong" style="color: #ffffff">--}}
                            {{--<p class="user white-text">{{Auth::user()->name}}<br><a href="#" style="color: #ffffff">Messages<i class="fa fa-angle-down rotate-icon"></i> <span class="badge">42</span></a>--}}
                            {{--</p>--}}
                        {{--</div>--}}
                  </div>
              </li>


              <li class="nav-list-item" id="mobile-notifications">

                  <a id="dLabel2" role="button" data-toggle="dropdown" data-target="#" href="#" aria-haspopup="true" aria-expanded="false" style="background-color: rgba(148, 0, 211, 0);">
                      <i class="glyphicon glyphicon-bell"></i>Notifications <span class="badge badge-notify">3</span>
                  </a>



                  <ul class="dropdown-menu notifications pull-right" role="menu" aria-labelledby="dLabel2" style="position: inherit;">

                      <div class="notification-heading"><h4 class="menu-title">Notifications</h4><h4 class="menu-title pull-right">View all<i class="glyphicon glyphicon-circle-arrow-right"></i></h4>
                      </div>
                      <li class="divider"></li>
                      <div class="notifications-wrapper">

                      </div>
                      <li class="divider"></li>
                      <div class="notification-footer"><h4 class="menu-title">View all<i class="glyphicon glyphicon-circle-arrow-right"></i></h4></div>
                  </ul>


              </li>


          @endif


          <li>
              <form class="search-form" role="search" _lpchecked="1">
                  <div class="form-group form-control-search search-select2">
                      {{--<input type="text" class="form-control nav-side-search" placeholder="Search">--}}
                      {!! Form::select('search[]', array(),null,array( 'class'=>'form-control hidden nav-side-search search-ajax', 'multiple'=>'multiple')) !!}
                  </div>
              </form>
          </li>


          <li class="nav-list-item {{{Request::is('profile/me') ? ' active' : ''}}}">
            <a class="arrow-r" href="{{ url('challenges') }}">
                <i class="fa fa-user"></i> Challenges<i class="fa fa-angle-down rotate-icon"></i>
            </a>
          </li>




          @if(Auth::check())
              <li class="nav-list-item" >
                  <a class="nav-logout" href="{{ action('SocialAuthController@logout') }}">
                    <i class="fa fa-sign-out"></i>Logout
                    </a>
              </li>
          @else
              <li class="nav-profile nav-list-item">
                  <a id="login_btn"  href="{{ url('/login') }}"><i class="fa fa-sign-in"></i>Login</a>
              </li>
          @endif
      </ul>
    </nav>

<main id="panel">

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




            {{--<div class="container">--}}
                {{--<div class="row">--}}
                    {{--<div class="col-md-4">--}}
                        {{--<span class="copyright">&copy; 2016 HIO. Todos os direitos reservados</span>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-4">--}}
                        {{--<ul class="list-inline social-buttons">--}}
                            {{--<li><a href="https://www.instagram.com/hioselfmadelegends/"><i class="fa fa-instagram"></i></a>--}}
                            {{--</li>--}}
                            {{--<li><a href="https://www.facebook.com/HIO-978238685528426/?fref=ts"><i class="fa fa-facebook"></i></a>--}}
                            {{--</li>--}}
                            {{--<li><a href="https://hioblog.wordpress.com"><i class="fa fa-wordpress"></i></a>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}




                    {{--<div class="col-md-4">--}}
                        {{--<ul class="list-inline quicklinks">--}}
                            {{--<li><a href="{{ url('private-policy') }}">Privacy Policy</a>--}}
                            {{--</li>--}}
                            {{--<li style="    color: #eb1946;padding: 0px;">|</li>--}}
                            {{--<li><a href="#">Terms of Use</a>--}}
                            {{--</li>--}}
                            {{--<li style="    color: #eb1946;padding: 0px;">|</li>--}}
                            {{--<li><a  href="{{ url('terms') }}">Terms & Conditions</a></li>--}}

                            {{--<li><a  href="{{ url('contact-us') }}">Contact us</a></li>--}}
                             {{--<li style="    color: #eb1946;padding: 0px;">|</li>--}}
                            {{--<li><a  href="{{ url('HIO-Mission') }}">HIO Mission</a></li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</footer>--}}

</main>
    <!-- jQuery -->
{{--    <script src="{{ asset('js/jquery.js') }}"></script>--}}
    {{--<script src="js/jquery.js"></script>--}}

    <!-- Bootstrap Core JavaScript -->
{{--<script src="{{ asset('js/bootstrap.min.js') }}"></script>--}}
{{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>--}}
    <!-- Plugin JavaScript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>--}}
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
{{--    <script src="{{ asset('js/jquery.easing.min.js') }}"></script>--}}




{{--    <script src="{{ asset('js/jqBootstrapValidation.js') }}"></script>--}}
{{--    <script src="{{ asset('js/contact_me.js') }}"></script>--}}

    <script src="{{ asset('js/agency.js') }}"></script>
    <script src="{{ asset('js/select2.full.min.js') }}"></script>
    <script src="{{ asset('js/jquery.timeago.js') }}"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/slideout/1.0.1/slideout.min.js"></script>
<script>
  var slideout = new Slideout({
    'panel': document.getElementById('panel'),
    'menu': document.getElementById('sidebar-wrapper'),
    'padding': 256,
    'tolerance': 70
  });


  document.querySelector('.js-slideout-toggle').addEventListener('click', function() {
          slideout.toggle();
        });

        document.querySelector('#sidebar-wrapper').addEventListener('click', function(eve) {
          if (eve.target.nodeName === 'A') { slideout.close(); }
        });
</script>

<script src="{{ asset('js/hio.js') }}"></script>

    @yield('footer')


</body>

</html>






