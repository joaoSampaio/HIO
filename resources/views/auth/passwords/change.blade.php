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

    <link href='https://fonts.googleapis.com/css?family=Roboto:700,900,200,300,400,500' rel='stylesheet' type='text/css'>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">





    {{--    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">--}}

    <link href="{{ asset('css/bootstrap-datetimepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('css/radio.css') }}" rel="stylesheet">
{{--    <link href="{{ asset('css/bootstrap-tokenfield.css') }}" rel="stylesheet">--}}

    <link href="{{ asset('css/s2-docs.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-switch.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/hio.css') }}" rel="stylesheet">
<style>
.datepicker{
    background-color: #fff;
    color: #000;
}

.datepicker .btn{
    background-color: #fff;
    color: #000;
}

.timepicker{
    background-color: #fff;
    color: #000;
}

.timepicker-hour, .timepicker-minute ,  .timepicker-second{
color: #000;
}



.navbar-default{
background-color: #222;
}

.btn-xl{
padding: 20px 35px;
}
.btn-default  {
border-color: #C1C5C8;
background: #C1C5C8;
}

.form-control::-webkit-input-placeholder { color: #aaa; }
.form-control:-moz-placeholder { color: #aaa; }
.form-control::-moz-placeholder { color: #aaa; }
.form-control:-ms-input-placeholder { color: #aaa; }
.form-control {  color: #aaa;}



label.custom-select {
    position: relative;
    display: inline-block;
    width: 100%;
}


.no-pointer-events .custom-select:after {
    content: none;
}

.validar input:invalid, .validar select:invalid, .validar textarea:invalid  {
  box-shadow: 0 0 5px 1px red !important;
}

.bootstrap-switch-primary {
    color: #fff;
    background: #eb1946 !important;
}
.btn-create-hio{
    width: 245px;
}
.btn-cancel-hio{
    width: 245px;
}

@media (min-width: 992px){
    .btn-create-hio{
        float: left;
    }
    .btn-cancel-hio{
        float: right;
    }
}


@media (max-width: 500px){
    .col-mobile {
        width: 100%;
    }
}





.ch-grid {
	padding: 0;
	list-style: none;
	display: block;
	text-align: center;
	width: 100%;
}

.ch-grid:after,
.ch-item:before {
	content: '';
    display: table;
}

.ch-grid:after {
	clear: both;
}

.ch-grid li {
	width: 40px;
	height: 40px;
	display: inline-block;
	margin-left: 20px;
	margin-right: 20px;
}

.ch-item {
	width: 100%;
	height: 100%;
	border-radius: 50%;
	overflow: hidden;
	position: relative;
	cursor: default;
	box-shadow:
		inset 0 0 0 16px rgba(255,255,255,0.6),
		0 1px 2px rgba(0,0,0,0.1);
	transition: all 0.4s ease-in-out;
}

.ch-item span{
    font-size: 20px;
}

.ch-item .btn-xl {
    color: #fff;
    background-color: #C1C5C8;
    border-color: #C1C5C8;
    font-family: 'Roboto', sans-serif;
    text-transform: uppercase;
    font-weight: 700;
    border-radius: 3px;
    font-size: 18px;
    padding: 7px 15px;
}

.ch-item .btn-active {
    color: #fff;
    background-color: #eb1946;
    border-color: #eb1946;
    font-family: 'Roboto', sans-serif;
    text-transform: uppercase;
    font-weight: 700;
    border-radius: 3px;
    font-size: 18px;
    padding: 7px 15px;
}

.form-section{
    margin-top: 20px;
    display: none;
}
.form-section.current {
    display: inherit;
}

.select2-container{
width: 100% !important;
}

.form-section .select2-search__field{
width: 200px !important;
}


button:focus {
    border-color: #eb1946 !important;
    background-color: #eb1946 !important;
}

.form-section .btn-xl{
    width: 290px;
}

    .parsley-required{
        color: #eb1946;
    }




.radio-choice input[type=radio] {
    position: absolute;
    visibility: hidden;
}

.radio-choice label{
    position: relative;
    margin: .5rem;
    line-height: 135%;
    cursor: pointer;
    padding-left: 30px;
}

.inside{
    display: block;
    position: absolute;
    top: -3px;
    left: 0px;
    z-index: 5;
    transition: border .25s linear;
    -webkit-transition: border .25s linear;



    border-width: 2px;
    border-color: #C1C5C8;
    border-style: solid;
    border-radius: 50%;
    width: 26px;
    height: 26px;


}

.inside::before {
    display: block;
    position: absolute;
    content: '';

    top: 4px;
    left: 4px;
    margin: auto;
    transition: background 0.25s linear;
    -webkit-transition: background 0.25s linear;

    border-radius: 50%;
    /*background-color: rgb(188, 188, 188);*/

    width: 14px;
    height: 14px;

}

input[type=radio]:checked ~ .inside::before {
    background: #eb1946;
}

.btn-normal-login{
    margin-top: 30px;
}





    form, form label {
        color: #C1C5C8;
        font-weight: 400;
    }

    
    .select2-selection__choice{
        position: relative;
        border-radius: 50%!important;
        width: 50px;
        padding: 0px !important;
    }

.select2-selection__choice__remove {
    color: red !important;
    cursor: pointer;
    display: inline-block;
    font-weight: bold;
    right: 0;
    position: absolute;
    margin-right: 2px;
}

.participants-dim{
width: 50px;
    height: 50px;
    padding: 0px;
}

#participants li{
    float: left;
    position: relative;
}



.user_choice_remove {
    color: red !important;
    cursor: pointer;
    display: inline-block;
    font-weight: bold;
    top: -8px;
    font-size: 22px;
    right: 0;
    position: absolute;
    margin-right: 2px;
}

.user_choice_remove {
    display:none;
}
.user-remove:hover .user_choice_remove {
    display: block;
}






#add-user-search .select2-container--default .select2-search--inline .select2-search__field{
    width: 100% !important;
    margin-left: 20px;
}




#add-user-search:focus {
    background: 0 0;
}
#add-user-search .select2-container--default .select2-selection--multiple{
    background-color: transparent;
    border-radius: 0px;

    /*height: 67px;*/
    border: 0px solid #aaa;
    border-bottom: 1px solid #fff;
    border-top: 1px solid #fff;
}


#add-user-search .select2-container--default .select2-selection--multiple .select2-selection__rendered{
    /*margin-top: 20px;*/
    padding-left: 25px;
}

#add-user-search ul > li:not(:last-child) { display: none; }


.select2-results{
box-shadow: 0px -12px 58px 3px rgba(0, 0, 0, 0.2);
}
#menu-add-user{
box-shadow: 0px 0px 68px 0px rgba(0, 0, 0, 0.2);
}



body:after{
display: none;
}

.show-friends:before{
    content: '';
    position: absolute;
    top: 20px;
    left: -1000px;
    width: 2200px;
    height: 1px;
    background: #C1C5C8;
    z-index: -1;
}

.show-friends{
width: 2em;
  height: 2em;
  text-align: center;
  line-height: 40px;
  border-radius: 50%;
  background: #C1C5C8;
  margin: 0 1em;
  display: inline-block;
  color: white;
  position: relative;
}

.show-friends.active{
  background: #eb1946;

}

.show-friends.active:after {
    content: "";
    position: absolute;
    left: 15px;
    bottom: -4px;
    border-width: 5px 5px 0;
    border-style: solid;
    border-color: #eb1946 transparent;
    display: block;
    width: 0;
}


</style>
</head>

<body style="background-color: white">

        <div class="container">
            <div class="row" id="latest">

                <div class="col-md-offset-1 col-md-10 col-sm-12 col-xs-12 personal-info">

                    <form id="form-change-password" role="form" method="POST" action="{{ url('/user/credentials') }}" novalidate class="form-horizontal">
                        <div class="col-xs-12">
                            <label for="current-password" class="col-xs-4 control-label">Current Password</label>
                            <div class="col-xs-8">
                                <div class="form-group">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="password" class="form-control" id="current-password" name="current-password" value="{{ old('current-password')}}" placeholder="Password">
                                    @if ($errors->has('current-password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('current-password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <label for="password" class="col-xs-4 control-label">New Password</label>
                            <div class="col-xs-8">
                                <div class="form-group">
                                    <input type="password" class="form-control" id="password" value="{{ old('password')}}" name="password" placeholder="Password">
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <label for="password_confirmation" class="col-xs-4 control-label">Re-enter Password</label>
                            <div class="col-xs-8">
                                <div class="form-group">
                                    <input type="password" class="form-control" id="password_confirmation" value="{{ old('password_confirmation')}}" name="password_confirmation" placeholder="Re-enter Password">
                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class=" col-xs-12">
                                <button type="submit" class="btn btn-danger" style="margin-right: 15px;margin-top: 15px;padding: 10px 40px;float: right;">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>




</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>

<script src="{{ asset('js/agency.js') }}"></script>



