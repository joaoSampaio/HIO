<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>HIO - Challenge Your Friends</title>



    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/agency.css') }}" rel="stylesheet">
    <!-- Custom Fonts -->
{{--    <link href="{{ asset('font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">--}}
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>

    <link href='https://fonts.googleapis.com/css?family=Roboto:700,900,400,500' rel='stylesheet' type='text/css'>

    <link href="{{ asset('css/hio.css') }}" rel="stylesheet">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    {{--<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">--}}

    <!-- Styles -->
    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">--}}
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

<style>

.footer-icon li a{
background-color: transparent;
background: transparent;
color: #ffffff !important;
    font-size: 17pt;
}
body{
font-size: 16px;
background-color: #191c20;
}

.footer-links{
color: #43484c;
font-size: 16px;
}
.footer-links a{
color: #43484c;
text-transform: uppercase;
}

.logo-center{
position: absolute;
top: 50px;
left:50%;
margin-left:-76px;
}


.btn-normal-login{
    color: #fff;
    border-radius: 5px;
    background-color: #e12f59;
    border-color: #e12f59;
    font-family: 'Roboto', sans-serif;
    text-transform: uppercase;
    font-weight: 600;
    width: 268px;
    height: 58px;
      line-height: 3;
      text-align: center;
      vertical-align: middle;
    font-size: 16px;
}
.btn-normal-login:hover{
color: #fff;
}


.login-bg{
background-image: url({{ asset('img/HIGHLIGHT.png')}});background-size: 115%;background-repeat: no-repeat;background-position: center top;
}

.main-container{
    margin-top: 300px;margin-bottom: 130px
}

@media (max-width: 992px){
    .login-bg{
        background-image: url({{ asset('img/HIGHLIGHT.png')}});background-size: 200%;background-repeat: no-repeat;background-position: center top;
    }
    .footer-links li{
        display: block;
        margin-bottom: 5px;
    }
    .footer-links li:nth-child(even) {
        display: none;
    }

    .main-container{
        margin-top: 200px;margin-bottom: 130px
    }

    .margin15-mobile{
        margin-bottom: 15px;
    }
}

.alert-register{
    position: absolute;
    left: 50%;
    margin-top: 200px;
}
.alert-register-label{
    position: relative;
    left: -50%;
}


.login-input{
    font-family: "Roboto";
    background-color: transparent !important;
    border: 0;
    border-bottom: 2px solid rgba(188, 188, 188, 0.2);
    padding: 0px;
    font-size: 16px;
    color: #ffffff !important;

}

.login-input::-webkit-input-placeholder { /* WebKit, Blink, Edge */
    color:    #ffffff;
}
.login-input:-moz-placeholder { /* Mozilla Firefox 4 to 18 */
    color:    #ffffff;
    opacity:  1;
}
.login-input::-moz-placeholder { /* Mozilla Firefox 19+ */
    color:    #ffffff;
    opacity:  1;
}
.login-input:-ms-input-placeholder { /* Internet Explorer 10-11 */
    color:    #ffffff;
}

.login-input:focus {
    border-color: transparent;
    outline: 0;
    box-shadow:none;

    /*-webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(235,25,70,.6);*/
    /*box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(235,25,70,.6);*/
}

.extra-register, .extra-register a  {
    font-size: 16px;
    font-family: "Roboto";
    color: rgb(188, 188, 188);
    line-height: 1.2;
    text-align: center;
    /*padding: 6px 12px;*/
}




</style>
    @yield('header')
</head>
<body id="app-layout">


    <a class="logo-center" href="{{ url('/auth') }}"><img style="display: inherit;" src="/img/logo-login.png" alt="HIO"></a>


    {{--<nav class="navbar navbar-default navbar-static-top">--}}
        {{--<div class="container">--}}
            {{--<div class="navbar-header">--}}
                {{--<!-- Branding Image -->--}}
                {{--<a class="navbar-brand" href="{{ url('/') }}"><img style="display: inherit;" src="/img/logo-login.png" alt="HIO"></a>--}}
            {{--</div>--}}


        {{--</div>--}}
    {{--</nav>--}}

<header>

    <div class="container login-bg" style=" min-height: 768px;   ">

    @yield('content')


    <div style="text-align: center; margin-bottom: 15px" class="container">
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

    </div>

</header>


    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}

    @yield('footer')
</body>
</html>
