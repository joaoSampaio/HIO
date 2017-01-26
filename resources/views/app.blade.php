<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

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


        .read{
            color: #999999;
        }

        .unread{
            color: #eb1946;
        }
        /*.unread a{*/
            /*color: #ffffff !important;*/
        /*}*/

        .notifications a:hover {
            color: #000 !important;
        }

        .notifications .col-md-8{
            padding: 0px;
        }

        .clickable {
            height: 100%;
            width: 100%;
            left: 0;
            top: 0;
            position: absolute;
            z-index: 1;
        }

        .clickable-link{
            z-index: 2;
            position: relative;
        }

        @media (min-width: 768px) {
            .navbar-default {

                padding-bottom: 0px;

            }
        }

        .img-circle {
            object-fit: cover;
        }



.row-eq-height {
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display:         flex;
}

.margin-bottom{
    margin-bottom: 10px;
}

.center-middle{
    position: absolute;
    top: 50%;
    transform: translate(0%,-50%);
}

.modal-dialog{
    overflow-y: initial !important
}
#challenge-views-modal .modal-body{
    height: 350px;
    overflow-y: auto;
}

.pointer{
        cursor: pointer;
    }

@media only screen
and (max-device-width : 1024px) {
    .tooltip {
        display: none !important;
    }
 }

.same-height-modal-views{
    /*width: 62px;*/
    /*height: 62px;*/
        /*max-height: 95vh;*/
}


        .modal-dialog {
          display: -webkit-box;
          display: -webkit-flex;
          display: -moz-box;
          display: -ms-flexbox;
          display: flex;
          -webkit-box-orient: vertical;
          -webkit-box-direction: normal;
          -webkit-flex-direction: column;
             -moz-box-orient: vertical;
             -moz-box-direction: normal;
              -ms-flex-direction: column;
                  flex-direction: column;
          -webkit-box-pack: center;
          -webkit-justify-content: center;
             -moz-box-pack: center;
              -ms-flex-pack: center;
                  justify-content: center;
          overflow-y: auto;
          min-height: -webkit-calc(100vh - 60px);
          min-height: -moz-calc(100vh - 60px);
          min-height: calc(100vh - 60px);
        }
        @media (max-width: 767px) {
          .modal-dialog {
            min-height: -webkit-calc(100vh + 30px);
            min-height: -moz-calc(100vh + 30px);
            min-height: calc(100vh + 30px);
          }
        }

        .header-link {
            color: #ffffff !important;
            font-size: 16pt;
        }
        .header-link-secondary {
            color: #43484c !important;
            font-size: 16pt;
        }

        .navbar .navbar-nav {
          display: inline-block;
          float: none;
          vertical-align: top;
        }

        .navbar .navbar-collapse {
          text-align: center;
        }
        /*font-family: "Myriad pro Semibold"*/

        /*Medium*/
        /*font-family: "Roboto";*/
        /*font-weight: 500;*/


.navbar-nav .active:after {
    position: absolute;
    bottom: 7px;
    left: 15px;
    right: 15px;
    /*margin-left: -5px;*/
    vertical-align: middle;
    content: " ";
    border-bottom: 3px solid;
    color: #eb1946;
}
/*.modal-backdrop {*/
        /*height: 100%;*/
    /*}*/


    #search-modal .select2-container--default .select2-search--inline .select2-search__field{
        width: 100% !important;
    }

    .select2-results__message {
    display: none;
    }
    .select2-dropdown {
        background-color: white;
        border: 0px solid #aaa;
        }
#search-modal .select2-container .select2-search--inline {
     float: inherit;
}
#search-modal .select2-selection__choice{
    display: none;
}

body{
font-weight: 600;
}

        .notification-text a{
            text-transform: capitalize !important;
        }

        .text-color1{
            color: #003333;
        }

        .notification-time{
            color: #999999;
        }

        .notification-text img {
            width: 40px;
        }

        .notification-text .col-sm-9, .notification-text .col-md-9{
            padding-left: 0px;
            padding-right: 0px;
        }

        .notification-text i{
            margin-top: 10px;
        }





        .notifications-wrapper::-webkit-scrollbar {
            width: 12px;
        }

        /* Track */
        .notifications-wrapper::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
            /*-webkit-border-radius: 10px;*/
            /*border-radius: 10px;*/
        }

        /* Handle */
        .notifications-wrapper::-webkit-scrollbar-thumb {
            /*-webkit-border-radius: 10px;*/
            /*border-radius: 10px;*/
            background: rgba(255,0,0,0.8);
            -webkit-box-shadow: inset 0 0 6px #eb1946;
        }
        .notifications-wrapper::-webkit-scrollbar-thumb:window-inactive {
        	background: rgba(255,0,0,0.4);
        }

        .notifications-wrapper .divider:first-child {
            margin-top: 0px;
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

                            <a id="dLabel" class="header-link" role="button" data-toggle="dropdown" data-target="#" href="#" aria-haspopup="true" aria-expanded="false" style="padding-left: 0px;padding-top: 5px;background-color: rgba(148, 0, 211, 0);">
                                <i class="glyphicon glyphicon-bell"></i>
                            </a>
                            <span class="badge badge-notify">0</span>


                        <ul class="dropdown-menu notifications pull-right" role="menu" aria-labelledby="dLabel">

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
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <span class="copyright">&copy; 2016 HIO. Todos os direitos reservados</span>
                    </div>
                    <div class="col-md-4">
                        <ul class="list-inline social-buttons">
                            <li><a href="https://www.instagram.com/hioselfmadelegends/"><i class="fa fa-instagram"></i></a>
                            </li>
                            <li><a href="https://www.facebook.com/HIO-978238685528426/?fref=ts"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li><a href="https://hioblog.wordpress.com"><i class="fa fa-wordpress"></i></a>
                            </li>
                        </ul>
                    </div>




                    <div class="col-md-4">
                        <ul class="list-inline quicklinks">
                            <li><a href="{{ url('private-policy') }}">Privacy Policy</a>
                            </li>
                            <li style="    color: #eb1946;padding: 0px;">|</li>
                            <li><a href="#">Terms of Use</a>
                            </li>
                            <li style="    color: #eb1946;padding: 0px;">|</li>
                            <li><a  href="{{ url('terms') }}">Terms & Conditions</a></li>

                            <li><a  href="{{ url('contact-us') }}">Contact us</a></li>
                             <li style="    color: #eb1946;padding: 0px;">|</li>
                            <li><a  href="{{ url('HIO-Mission') }}">HIO Mission</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>

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

<script>
function goBack() {
    window.history.back()
}


$('.main-search').click(function(e){
        $('#search-modal').on('shown.bs.modal', function () {
            $('#search-input').select2('open');
        });
        $('#search-modal').modal('show');
});


@if(Auth::check())
$.ajax({
    type: 'GET',
    url: '{{URL::action('HomeController@getNotifications')}}',
    dataType: 'json',
    success: function(jsonData) {
        $(".notifications-wrapper").html(jsonData);

        //numberUnread
        $('.badge-notify').html($('#numberUnread').data('number-unread'));
//        $('.badge-notify').html($('.notifications .notification-item.unread').length/2);
        jQuery(document).ready(function() {
          jQuery("time.timeago").timeago();
        });

        $('.notification-item a').click(function (event){
            //event.preventDefault();
            $.ajax({
                url: '/notifications/' + $(this).attr('data-notification')
                ,success: function(response) {
                    //alert(response)
                }
            })
        });
    },
    error: function() {
    }
});
@endif


$(".search-ajax").select2({
            ajax: {
                url: "{{ action('HomeController@search') }}",
                dataType: 'json',
                delay: 250,
                selectOnClose: true,
                selectOnBlur: true,
                tags: false,
                maximumSelectionLength: 0,
                multiple: false,
                data: function (params) {
                    return {
                      q: params.term, // search term
                      page: params.page
                    };
              },
              processResults: function (data, params) {
                return {
                  results: $.map(data, function(obj) {
//                                if(obj.name.toLowerCase().indexOf(params.term.toLowerCase()) > -1)
                              return { id: obj.id, text: obj.name, photo: obj.image, type: obj.type };
                          })
                };
              },
              cache: true
            },
            placeholder: "Search",
            escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
            minimumInputLength: 1,
            templateResult: formatRepoSearch, // omitted for brevity, see the source of this page
            templateSelection: formatRepoSelectionSearch // omitted for brevity, see the source of this page
          });

$(".search-ajax").show();


$('.search-ajax').on('select2:select', function (evt) {
//    if(evt.params.data.type == 0){
//        window.location = "/profile/"+evt.params.data.id;
//    }else if(evt.params.data.type == 1){
//        window.location = "/challenge/"+evt.params.data.id;
//    } else if(evt.params.data.type == 2){
//        window.location = "/challenges/"+evt.params.data.id;
//    }
        return false;
    });



    function formatRepoSearch (repo) {
          if (repo.loading) return;

            if(repo.selected)
            return;
            if(repo.text == null)
             return;

        var url = getPhotoUrl(repo.type, repo.photo);
          var markup = ""+
          "<div class='select2-result-repository clearfix'>" +
            "<div class='select2-result-repository__avatar'><img style='width: 50px; height: 50px' src='"+url +"' /></div>" +
            "<div class='select2-result-repository__meta'>" +
              "<div class='select2-result-repository__title'>" + repo.text + "</div>";

          "</div></div>";

            var type = "";
            if(repo.type == 0){
                type = 'User';
            }else if(repo.type == 1){
                type = 'Challenge';
            }else if(repo.type == 2){
                type = 'Category';
            }

           var markup =
            "<img class='search-img' src='"+url +"' />"+

                                                     "<span class='k-state-default'><h3>"+repo.text+"</h3><p>#"+ type +"</p></span>";

          return markup;
        }

    function formatRepoSelectionSearch (repo) {
        console.log("formatRepoSelection" + repo)
            if(repo.type == 0){
                window.location = "/profile/"+repo.id;
            }else if(repo.type == 1){
                window.location = "/challenge/"+repo.id;
            } else if(repo.type == 2){
                window.location = "/challenges/"+repo.id;
            }

//$('#search-input').val(null).trigger("change");

//            if(repo.text == null)
//                return repo.id;
//            return repo.text;
    }

        function getPhotoUrl (type, image) {

            if(type == 0){
                return (image == "")? "/uploads/users/default_user.png" : "/uploads/users/"+image;
            }else if(type == 1){
                return categoryToUrl(image);
            }else if(type == 2){
                return categoryToUrl(image);
            }

        }

        function categoryToUrl(name){
              var url = "";
              switch(name){
                  case 'Awesome Stuff':
                      url = 'Amazing.jpg';
                      break;
                  case 'Running':
                      url = 'Running.jpg';
                      break;
                  case 'Trail':
                      url = 'Trail.jpg';
                      break;
                  case 'Gym':
                      url = 'Gym.jpg';
                      break;
                  case 'Fitness':
                      url = 'Fitness.jpg';
                      break;
                  case 'Football':
                      url = 'Soccer.jpg';
                      break;
                  case 'Golf':
                      url = 'Golf.jpg';
                      break;
                  case 'Tennis':
                      url = 'Tennis.jpg';
                      break;
                  case 'Rugby':
                      url = 'Rugby.jpg';
                      break;
                  case 'Surf':
                      url = 'Surf.jpg';
                      break;
                  case 'Bodyboard':
                      url = 'Bodyboard.jpg';
                      break;
                  case 'Swimming':
                      url = 'Swim.jpg';
                      break;
                  case 'Martial Arts':
                      url = 'Martial-Arts.jpg';
                      break;
                  case 'Cycling':
                      url = 'Cycling.jpg';
                      break;
                  case 'Gymnastics':
                      url = 'Gymnastic.jpg';
                      break;
                  case 'Basketball':
                      url = 'Basketball.jpg';
                      break;
                  case 'Volleyball':
                      url = 'Volley.jpg';
                      break;
                  case 'Snow Sports':
                      url = 'Ski.jpg';
                      break;
                  case 'Hockey':
                      url = 'Hockey.jpg';
                      break;




                  case 'Boxe':
                      url = 'Categories_Thumb_Boxe.jpg';
                      break;
                  case 'Karate':
                      url = 'Categories_Thumb_Karate.jpg';
                      break;
                  case 'Judo':
                      url = 'Categories_Thumb_Judo.jpg';
                      break;
                  case 'Jiu-Jitsu':
                      url = 'Categories_Thumb_Jiu-Jitsu.jpg';
                      break;
                  case 'Muay Thai':
                      url = 'Martial-Arts.jpg';
                      break;
                  case 'Taekwondo':
                      url = 'Categories_Thumb_Taekwondo.jpg';
                      break;
                  case 'Kickboxing':
                      url = 'Categories_Thumb_Kickboxing.jpg';
                      break;
                  case 'MMA':
                      url = 'Categories_Thumb_MMA.jpg';
                      break;

              }
              return "/img/categories/"+url;
          }

$(function () {
    $('.menu-lateral').show();
});

$('#dLabel2').on('click', function (e) {
    e.stopPropagation();
    //mobile-notifications
    $('#mobile-notifications').toggleClass('open');
//    $(this).next('.dropdown').find('[data-toggle=dropdown]').dropdown('toggle');
});

</script>
    @yield('footer')


</body>

</html>






