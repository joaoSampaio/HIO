@extends('app')

@section('header')


<style>
  .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
      width: 70%;
      margin: auto;
  }
  </style>


<link href="{{ asset('css/owl.carousel.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('css/owl.theme.css') }}" rel="stylesheet" type="text/css">
<style>

.glyphicon.spinning {
    animation: spin 1s infinite linear;
    -webkit-animation: spin2 1s infinite linear;
        margin-left: 50%;
        font-size: 30px;
        margin-bottom: 30px;
}

@keyframes spin {
    from { transform: scale(1) rotate(0deg); }
    to { transform: scale(1) rotate(360deg); }
}

@-webkit-keyframes spin2 {
    from { -webkit-transform: rotate(0deg); }
    to { -webkit-transform: rotate(360deg); }
}


.img-responsive{
        width: 100%;
}

.btn-default:hover {
    color: #fff;
    background-color: #00CE6C;
    border-color: #00CE6C;
}
.btn-default {
    color: #fff;
    background-color: #00CE6C;
    border-color: #00CE6C;
    border-radius: 0px;
}
.form-control{
border-radius: 0px;
}

.intro-lead-in{
color: #eb1946;
    text-transform: uppercase;
}


.title-challenge{
    text-transform: capitalize;
}

.slider-title{
    font-size: 40px;
}
.slider-subtitle{
    font-size: 22px;
}

.slider-bullet li{
    margin-left: 10px !important;
}

#latest {
    margin-top: 50px;
}





@media (max-width: 768px){

.slider-title{
        font-size: 17px;
        margin-bottom: 10px;
}

#carousell{
    display: none;
}

}

.padding5{
    padding-right: 5px;
    padding-left: 5px;
}
@media (min-width: 1200px){
    .padding5{
        padding-right: 15px;
        padding-left: 15px;
    }
}


</style>
@endsection

@section('content')

<!-- Header -->
    <header>


        <div class="container" style="    background-image: url({{ asset('img/header-bg.jpg')}});background-size: cover;">
            <div class="intro-text">
                @if(Auth::check())
                    <div class="intro-lead-in">HI {{Auth::user()->name}}, WELCOME TO HIO.</div>
                @else
                    <div class="intro-lead-in">WELCOME TO HIO.</div>
                @endif

                <div class="intro-heading">READY TO CHALLENGE?</div>
                <a href="{{ action('HomeController@createChallenge') }}" class="page-scroll btn btn-xl">CREATE CHALLENGE</a>


            </div>
        </div>
    </header>


    <section >


        <div class="container">

            <div class="row">


            <div class="col-sm-12 col-xs-12 col-lg-5 bg-light-gray" >
                <div class="text-center" style="margin-bottom: 30px; font-size: 22pt;">Most Viewed</div>
                <div id="mostViewed" style="height: 300px;">
                    <span class="glyphicon glyphicon-refresh spinning"></span>
                </div>
                {{--<div class="col-lg-12 col-xs-12">--}}
                    {{--<div class="col-lg-2 col-xs-2">--}}
                        {{--<img src="{{'https://graph.facebook.com/v2.5/'. '592135650941808'  .'/picture?width=100&height=100'}}"--}}
                                                                                    {{--class=" img-circle img-responsive">--}}
                    {{--</div>--}}
                    {{--<div class="col-lg-8 col-xs-8">--}}
                        {{--<span style="font-size: 20px;line-height: 0;">JOAO SAMPAIO</span><br>--}}
                        {{--<a href="/challenge/" class="" title="">fazer um afundanço</a>--}}
                    {{--</div>--}}
                    {{--<div class="col-lg-2 col-xs-2">--}}
                        {{--574 Views--}}
                    {{--</div>--}}
                {{--</div>--}}

            </div>




            <div class="col-sm-12 col-xs-12 col-lg-5 col-lg-offset-2 bg-light-gray" >
                <div class="text-center" style="margin-bottom: 30px; font-size: 22pt;">Most Popular</div>

                <div id="mostParticipants" style="height: 300px;">
                    <span class="glyphicon glyphicon-refresh spinning"></span>

                </div>

            </div>

        </div>
    </section>





    <!-- Portfolio Grid Section -->
    <section id="portfolio" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading" style="color: #eb1946;margin-bottom: 5px;">Latest Events</h2>
                </div>
            </div>
            <div class="row" id="latest"></div>
        </div>
    </section>

@endsection

@section('footer')



<script src="{{ asset('js/jquery.mobile.custom.min.js') }}"></script>


    <script>


        $.ajax({
          type: 'GET',
          url: '{{URL::action('HomeController@latestChallenges')}}',
          dataType: 'json',
          success: function(jsonData) {
            customDataSuccess(jsonData);
          },
          error: function() {
            //alert('Error loading PatientID=' + id);
          }
        });

    function customDataSuccess(jsonData){

        $("#latest").html(jsonData);
      }

      $.ajax({
        type: 'GET',
        url: '{{URL::action('HomeController@mostViewed')}}',
        dataType: 'json',
        success: function(jsonData) {
          $("#mostViewed").html(jsonData);
        },
        error: function() {
          //alert('Error loading PatientID=' + id);
        }
      });

    $.ajax({
        type: 'GET',
        url: '{{URL::action('HomeController@mostParticipants')}}',
        dataType: 'json',
        success: function(jsonData) {
          $("#mostParticipants").html(jsonData);
          var cw = $('.same-height').width();
          $('.same-height').css({
              'height': cw + 'px'
          });
        },
        error: function() {
          //alert('Error loading PatientID=' + id);
        }
      });






//$(document).ready(function() {
//   $("#myCarousel").swiperight(function() {
//      $(this).carousel('prev');
//    });
//   $("#myCarousel").swipeleft(function() {
//      $(this).carousel('next');
//   });
//});



    </script>


@endsection