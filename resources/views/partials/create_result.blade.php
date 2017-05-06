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


{{--<link href="{{ asset('css/hio.css') }}" rel="stylesheet">--}}
</head>

<body style="background-color: white">

        <div class="container">
            <div class="row">

                <div class="alert alert-success col-sm-12 col-md-6 col-md-offset-3">
                    {{--<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>--}}
                    <strong>Challenge saved!</strong> Your new challenge has been added.
                </div>

            </div>
        </div>




</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>

<script>
$(function() {
    var  $frame = window.parent.document.getElementById('create-challenge-iframe');
    var curHeight = 100;
    if($frame != null)
        $frame.style.height =  curHeight + 'px' ;
        $( "#form-challenge" ).trigger( "myCustomEvent" );


    var myCustomData = { challengeId: '{{$challengeId}}' }
    var event = new CustomEvent('myEvent', { detail: myCustomData })
    window.parent.document.dispatchEvent(event)
});



</script>


