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

<link href='https://fonts.googleapis.com/css?family=Roboto:700,900' rel='stylesheet' type='text/css'>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">

    <link href="{{ asset('css/hio.css') }}" rel="stylesheet">

    <style>
        .select2-container{
            width: 200px !important;
            /*padding: 10px 15px;*/
        }

.select2-dropdown{
    width: 400px !important;
}

    .search-img{
        box-shadow: inset 0 0 30px rgba(0,0,0,.3);
        margin: 10px;
        width: 50px;
        height: 50px;
        border-radius: 50%;
    }

                        .dropdown-header {
                            border-width: 0 0 1px 0;
                            text-transform: uppercase;
                        }

                        .dropdown-header > span {
                            display: inline-block;
                            padding: 10px;
                        }

                        .dropdown-header > span:first-child {
                            width: 50px;
                        }

                        .k-list-container > .k-footer {
                            padding: 10px;
                        }

                        .select2-container .select2-results__option {
                            line-height: 1em;
                            min-width: 300px;
                        }

                        /* Material Theme padding adjustment*/

                        .k-material .select2-container .select2-results__option,
                        .k-material .select2-container .select2-results__option.k-state-hover,
                        .k-materialblack .select2-container .select2-results__option,
                        .k-materialblack .select2-container .select2-results__option.k-state-hover {
                            padding-left: 5px;
                            border-left: 0;
                        }

                        .select2-container .select2-results__option > span {
                            -webkit-box-sizing: border-box;
                            -moz-box-sizing: border-box;
                            box-sizing: border-box;
                            display: inline-block;
                            vertical-align: top;
                            margin: 20px 10px 10px 5px;
                        }

                        .select2-container .select2-results__option > span:first-child {
                            -moz-box-shadow: inset 0 0 30px rgba(0,0,0,.3);
                            -webkit-box-shadow: inset 0 0 30px rgba(0,0,0,.3);
                            box-shadow: inset 0 0 30px rgba(0,0,0,.3);
                            margin: 10px;
                            width: 50px;
                            height: 50px;
                            border-radius: 50%;
                            background-size: 100%;
                            background-repeat: no-repeat;
                        }

                        .select2-container h3 {
                            font-size: 1.2em;
                            font-weight: normal;
                            margin: 0 0 1px 0;
                            padding: 0;
                        }

                        .select2-container p {
                            margin: 0;
                            padding: 0;
                            font-size: .8em;
                        }


                        .menu-icon{
                            background: center center no-repeat transparent;
                            background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABkAAAAZCAYAAADE6YVjAAAAGXRFW…FBYtMq3BiHT3DRPU4YR4NrNAmPJuHRJDyahEeT8Ii3BCDAAF0WBj5Er5idAAAAAElFTkSuQmCC);
                            display: block;
                            width: 40px;
                            height: 40px;
                            position: absolute;
                            top: 0;
                            left: 20px;
                            margin-top: 200px;
                        }


    </style>




              <script src="{{ asset('js/jquery.js') }}"></script>

     <style>
     body {
       width: 100%;
       height: 100%;
     }

     .slideout-menu {
       position: fixed;
       top: 0;
       bottom: 0;
       width: 256px;
       min-height: 100vh;
       overflow-y: scroll;
       -webkit-overflow-scrolling: touch;
       z-index: 0;
       display: none;
     }

     .slideout-menu-left {
       left: 0;
     }

     .slideout-menu-right {
       right: 0;
     }

     .slideout-panel {
       position: relative;
       z-index: 1;
       /*will-change: transform;*/
       background-color: #FFF; /* A background-color is required */
       min-height: 100vh;
     }

     .slideout-open,
     .slideout-open body,
     .slideout-open .slideout-panel {
       overflow: hidden;
     }

     .slideout-open .slideout-menu {
       display: block;
     }




     /*.profile-wrapper {*/
         /*padding-left: 33%;*/
         /*padding-right: 33%;*/
         /*padding-top: 10%;*/
     /*}*/





.profile-wrapper {
    background: url(http://mdbootstrap.com/images/sidenavs/mdb.jpg) center center no-repeat;
    background-size: cover;
}
@media (max-height: 910px){
    .profile-wrapper a {
        height: 80px;
    }
}
.profile-side-img {
         max-width: 60px;
            /*padding: 20px 10px;*/
            float: left;
                    margin-top: 25px;
                    margin-right: 15px;
                margin-left: 20px;
            /*padding: 20% 50px;*/
    }

@media only screen and (max-height: 910px){
    .profile-side-img {
        /*max-width: 50px;*/
        /*vertical-align: middle;*/
        /*border: 3px solid #294a65;*/
        /*padding: 7% 50px;*/
    }
    .profile-wrapper {


     }
}

.nav-side-search{
border-bottom: 1px solid #fff;
    font-weight: 300;
    padding-left: 30px;
    color: #fff;
    background-color: transparent;
        border: none;
        border-radius: 0;
        outline: 0;
        height: 2.1rem;
        width: 100% !important;
        font-size: 1rem;
        box-shadow: none;
        -webkit-box-sizing: content-box;
        -moz-box-sizing: content-box;
        box-sizing: content-box;
        transition: all .3s;
        border-bottom: 1px solid #fff;
}

ul, ul li {
    list-style-type: none;
}


.search-form .select2-container{
    width: 100% !important;
}

.nav-list-item{
    padding-right: 1rem;
    padding-left: 1rem;
    border-radius: 2px;
}


.nav-list-item a{
    margin-bottom: 5px;
    color: #fff;
    font-weight: 300;
    font-size: 18px;
    height: 45px;
    line-height: 45px;
    padding-left: 20px;
        display: block;
}

.nav-list-item .fa {
    font-size: 20px;
    margin-right: 13px;
    color: rgba(227,242,253,.64);
}

.form-control-search:focus {
    background: 0 0;
}
.form-control-search .select2-container--default .select2-selection--multiple{
background-color: transparent;
border-radius: 0px;

height: 67px;
    border: 0px solid #aaa;
    border-bottom: 1px solid #fff;
}

.search-form{
color: white;
}
.form-control-search .select2-container--default .select2-selection--multiple .select2-selection__rendered{
margin-top: 20px;
    padding-left: 25px;
}

.profile-wrapper p {
    font-size: 15px;
    padding-top: 20px;
    padding-bottom: 20px;
    margin: 0;
}

.modal-backdrop{
    left: auto;
    z-index: 0;
}

     </style>


    @yield('header')

</head>




<body id="page-top" class="index">

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
                <ul class="nav navbar-nav navbar-left nav-hio" >
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>



                    <li {{{Request::is('challenges') ? 'class=active' : ''}}} >
                        <a  href="{{ url('challenges') }}">Challenges</a>
                    </li>

                    <li>{!! Form::select('emailFriend[]', array(),null,array( 'class'=>'form-control hidden search-ajax', 'multiple'=>'multiple')) !!}</li>



                    @if(Auth::check())
                        <li class="nav-profile{{{Request::is('profile/me') ? ' active' : ''}}}" >
                            <a style="padding-top: 0px;" href="{{ url('profile', 'me') }}">

                                @if(Auth::user()->photo == "")
                                    <img src="/uploads/users/default_user.png" alt="{{Auth::user()->name}}" title="{{Auth::user()->name}}" class="img-circle" style="height: 50px; width: 50px">
                                @else
                                    <img src="{{'/uploads/users/'. Auth::user()->photo }}" alt="{{Auth::user()->name}}" title="{{Auth::user()->name}}" class="img-circle" style="height: 50px; width: 50px">

                                @endif


                                My Profile
                            </a>
                        </li>
                    @endif

                    @if(Auth::check())
                        <li >
                            <a class="nav-logout" href="{{ action('SocialAuthController@logout') }}">Logout</a>
                        </li>
                    @else
                        <li class="nav-profile">
                            <a id="login_btn"  href="{{ url('/login') }}">Login</a>
                        </li>
                    @endif
                </ul>



            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

<nav id="menu" style="margin-top: 67px;    background: linear-gradient(135deg,#000 0,#3f729b 100%);">
  {{--<header>--}}
    {{--<h2>Menu</h2>--}}
  {{--</header>--}}
  <ul class="" style="padding-left: 0" >


    @if(Auth::check())

        <li>
            <div class="profile-wrapper">
                  <a href="{{ url('profile', 'me') }}">
                        @if(Auth::user()->photo == "")
                            <img src="/uploads/users/default_user.png" alt="{{Auth::user()->name}}" title="{{Auth::user()->name}}" class="img-circle profile-side-img" style="height: 40px; width: 40px">
                        @else
                            <img src="{{'/uploads/users/'. Auth::user()->photo }}" alt="{{Auth::user()->name}}" title="{{Auth::user()->name}}" class="img-circle profile-side-img" style="height: 40px; width: 40px">

                        @endif
                    </a>
                    <div class="rgba-stylish-strong" style="color: #ffffff">
                        <p class="user white-text">{{Auth::user()->name}}<br><a href="#" style="color: #ffffff">Messages<i class="fa fa-angle-down rotate-icon"></i> <span class="badge">42</span></a>
                        </p>
                    </div>
              </div>
          </li>

      @endif


                      <li>
                          <form class="search-form" role="search" _lpchecked="1">
                              <div class="form-group form-control-search">
                                  {{--<input type="text" class="form-control nav-side-search" placeholder="Search">--}}
                                  {!! Form::select('emailFriend[]', array(),null,array( 'class'=>'form-control hidden nav-side-search search-ajax', 'multiple'=>'multiple')) !!}
                              </div>
                          </form>
                      </li>


                      <li class="nav-list-item {{{Request::is('profile/me') ? ' active' : ''}}}">
                        <a class="arrow-r" href="{{ url('challenges') }}">
                            <i class="fa fa-user"></i> Challenges<i class="fa fa-angle-down rotate-icon"></i>
                        </a>
                      </li>



                      {{--<li {{{Request::is('challenges') ? 'class=active' : ''}}} >--}}
                          {{--<a  href="{{ url('challenges') }}">Challenges</a>--}}
                      {{--</li>--}}

                      {{--<li>{!! Form::select('emailFriend[]', array(),null,array( 'class'=>'form-control hidden search-ajax', 'multiple'=>'multiple')) !!}</li>--}}


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
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    <script src="{{ asset('js/jquery.easing.min.js') }}"></script>


    <script src="{{ asset('js/classie.js') }}"></script>
    <script src="{{ asset('js/cbpAnimatedHeader.js') }}"></script>


    <script src="{{ asset('js/jqBootstrapValidation.js') }}"></script>
    <script src="{{ asset('js/contact_me.js') }}"></script>

    <script src="{{ asset('js/agency.js') }}"></script>
    <script src="{{ asset('js/select2.full.min.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/slideout/1.0.1/slideout.min.js"></script>
<script>
  var slideout = new Slideout({
    'panel': document.getElementById('panel'),
    'menu': document.getElementById('menu'),
    'padding': 256,
    'tolerance': 70
  });


  document.querySelector('.js-slideout-toggle').addEventListener('click', function() {
          slideout.toggle();
        });

        document.querySelector('#menu').addEventListener('click', function(eve) {
          if (eve.target.nodeName === 'A') { slideout.close(); }
        });
</script>

<script>
function goBack() {
    window.history.back()
}

$(".search-ajax").select2({
            ajax: {
                url: "{{ action('HomeController@search') }}",
                dataType: 'json',

                delay: 250,
                selectOnClose: true,
                selectOnBlur: true,
                allowClear: true,
                data: function (params) {
              console.log('params:'+params);
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
            templateResult: formatRepo, // omitted for brevity, see the source of this page
            templateSelection: formatRepoSelection // omitted for brevity, see the source of this page
          });

$(".search-ajax").show();
//    $( ".select2-container" )
//      .focusout(function() {
//        console.log("focus out");
//        var select2 = $('.js-data-example-ajax').data('select2');
//        console.log("evt:", $('.js-data-example-ajax').data('select2'));
//      }).blur(function() {
//            console.log("blur out");
//          });

$('.search-ajax').on('select2:select', function (evt) {
    if(evt.params.data.type == 0){
        window.location = "/profile/"+evt.params.data.id;
    }else{
        window.location = "/challenge/"+evt.params.data.id;
    }

    });



    function formatRepo (repo) {
          if (repo.loading) return;

            if(repo.text == repo.id)
                return;
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
            }else{
            type = 'Challenge';
            }

           var markup =
            "<img class='search-img' src='"+url +"' />"+

                                                     "<span class='k-state-default'><h3>"+repo.text+"</h3><p>#"+ type +"</p></span>";

//"<span class='k-state-default' style='background-image: url(\""+url+"\")'></span>" +
          return markup;
        }





        function formatRepoSelection (repo) {
            if(repo.text == null)
                return repo.id;
            return repo.text;
        }

        function getPhotoUrl (type, image) {

            if(type == 0){
                return (image == "")? "/uploads/users/default_user.png" : "/uploads/users/"+image;
            }else if(type == 1){
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



</script>
    @yield('footer')


</body>

</html>






