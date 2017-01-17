@extends('app')

@section('header')


<style>

.navbar-default {
    background-color: #222 !important;
    border-color: transparent;
}

.img-responsive{
        width: 100%;
}

.btn-edit  {
border-color: #C1C5C8;
background: #C1C5C8;
padding: 10px 50px;
color: white;
}

.btn-edit:hover  {
border-color: #C1C5C8;
background: #eb1946;
padding: 10px 50px;
color: white;
}



#endedbtn:hover, #endedbtn:active,  #endedbtn:focus, #ongoingbtn:hover, #ongoingbtn:active,  #ongoingbtn:focus {
            text-decoration: none;
        }

.btn-circle.btn-xl {
  width: 100px;
  height: 100px;
  padding: 10px 16px;
  font-size: 24px;
  line-height: 1.33;
  border-radius: 70px;
}

.hide-friend{
    display: none !important;
}


    .full-width-tabs > ul.nav.nav-tabs {
        display: table;
        width: 100%;
        table-layout: fixed;
    }
    .full-width-tabs > ul.nav.nav-tabs > li {
        float: none;
        display: table-cell;
    }
    .full-width-tabs > ul.nav.nav-tabs > li > a {
        text-align: center;
    }
    .take-all-space-you-can{
        width:100%;
    }


    .nav-tabs {
        border-bottom: 0px solid #ddd;
    }



.ch-grid {
	margin: 20px 0 0 0;
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
	width: 100px;
	height: 100px;
	display: inline-block;
	margin: 20px;
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

.ch-info {
	position: absolute;
    top: 0;
	background: rgba(235, 25, 70, 0.7);
	width: inherit;
	height: inherit;
	border-radius: 50%;
	overflow: hidden;
	opacity: 0;
	transition: all 0.4s ease-in-out;
	transform: scale(0);
}


.ch-info h3 {
	color: #fff;
	text-transform: uppercase;
	letter-spacing: 2px;
	font-size: 22px;
	margin: 0 30px;
	padding: 45px 0 0 0;
	height: 140px;
	font-family: 'Open Sans', Arial, sans-serif;
	text-shadow:
		0 0 1px #fff,
		0 1px 2px rgba(0,0,0,0.3);
}

.ch-info p {
	color: #fff;
	padding: 10px 5px;
	font-style: italic;
	margin: 0 10px;
	font-size: 12px;
	border-top: 1px solid rgba(255,255,255,0.5);
	opacity: 0;
	transition: all 1s ease-in-out 0.4s;
}

.ch-info p a {
	display: block;
	color: rgba(255,255,255,1);
	font-style: normal;
    text-align: center;
	font-weight: 700;
	text-transform: uppercase;
	font-size: 9px;
	letter-spacing: 1px;
	padding-top: 4px;
	font-family: 'Open Sans', Arial, sans-serif;
}

.ch-info p a:hover {
	color: rgba(255,242,34, 0.8);
}

.ch-item:hover {
	box-shadow:
		inset 0 0 0 1px rgba(255,255,255,0.1),
		0 1px 2px rgba(0,0,0,0.1);
}

.ch-item:hover .ch-info {
	transform: scale(1);
	opacity: 1;
}

.ch-item:hover .ch-info p {
	opacity: 1;
}

.ch-item img{
    width: 100%;
    height: 100%;
    }


.take-all-space-you-can{
        width:100%;
        background-color: #f7f7f7 !important;
    }

.take-all-space-you-can.active a{
        background-color: #ffffff !important;
        color: #eb1946 !important;
}

.take-all-space-you-can a{
        color: #555 !important;
}

.nav-tabs>li.active>a, .nav-tabs>li.active>a:focus, .nav-tabs>li.active>a:hover {
    color: #555;
    cursor: default;
    background-color: #fff;
    border: 1px solid #ddd;
    border-bottom-color: transparent;
}

@media (min-width: 768px){
    .edit-profile{
        position: absolute;
        right: 0;
        top: 50px;
        z-index: 2;
    }
}


  </style>

@endsection

@section('content')


    <section  style="padding-top: 190px">
        <div class="container">

            @if(old('friendId') > 0)
                <div class="alert alert-success col-sm-12 col-md-6 col-md-offset-3">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Invitation Sent.</strong>
                </div>
            @endif



             @if(Session::has('challengeCreated'))
{{--             @if($challengeCreated)--}}

                <div class="alert alert-success col-sm-12 col-md-6 col-md-offset-3">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Challenge saved!</strong> Your new challenge has been added.
                </div>
            @endif
            @if(Auth::user()->email === $user->email)
            <div class="row text-center" style="margin-bottom: 40px;">
                <div class="col-sm-12 col-md-12">
                    <a class="btn btn-edit edit-profile" href="{{ action('HomeController@editProfile') }}">Edit</a>
                </div>
            </div>
             @endif
            <div class="row text-center">

            <div class="col-sm-12 col-md-12">

                @if($user->photo == "")
                    <img src="/uploads/users/default_user.png" alt="{{$user->name}}" title="{{$user->name}}" class="img-circle" style="height: 200px; width: 200px">
                @else
                    <img src="{{'/uploads/users/'. $user->photo }}" alt="{{$user->name}}" title="{{$user->name}}" class="img-circle" style="height: 200px; width: 200px">

                @endif


                {{--@if(Auth::user()->facebook_id != NULL)--}}
                    {{--<img src="{{'https://graph.facebook.com/v2.5/'. $user->facebook_id  .'/picture?width=200&height=200'}}" alt="{{$user->name}}" title="{{$user->name}}" class="img-circle center-block">--}}
                {{--@else--}}
                    {{--<img src="/img/no-photo.jpg" alt="{{$user->name}}" title="{{$user->name}}" class="img-circle center-block" style="width: 200px;height: 200px;">--}}

                {{--@endif--}}

                    <div ><h3 class="text-capitalize" style="margin-top: 30px;font-size: 30pt;font-weight: bold;">{{$user->name}}</h3></div>

            </div>
            {{--<div class="col-sm-12 col-md-12">--}}
                {{--<span class="help-block">{{$user->email}}</span>--}}
            {{--</div>--}}
            @if(true)
                <div class="col-sm-12 col-md-4" style="  margin-top: 30px; margin-bottom: 30px;">
                    <h4 class="section-heading" style="color: #eb1946;margin-bottom: 5px;">About me:</h4>
                    {!! nl2br(e($user->about)) !!}
                </div>
            @endif

{{--@if(!empty($user->interests))--}}
            @if(true)
                <div class="col-sm-12 col-md-4" style="  margin-top: 30px; margin-bottom: 30px;">
                    <h4 class="section-heading" style="color: #eb1946;margin-bottom: 5px;">My Goals:</h4>

                    {!! nl2br(e($user->interests)) !!}
                </div>
            @endif

            @if(true)
                <div class="col-sm-12 col-md-4" style="  margin-top: 30px; margin-bottom: 30px;">
                    <h4 class="section-heading" style="color: #eb1946;margin-bottom: 5px;">Achievements:</h4>
{{--                        {{$user->achievements}}--}}
                        <div class="col-sm-12">
                            {{--@for ($x = 0; $x < 6; $x++)--}}
                                {{--<div class="col-sm-3">--}}
                                     {{--<img src="{{ asset('img/achievement/ach1.png')}}" class="img-responsive" title="Achivement2" alt="Achivement1">--}}
                                {{--</div>--}}
                            {{--@endfor--}}
                            {{achievementToHtml($user->achievements)}}
                        </div>

                </div>
            @endif

            <div class="col-sm-12 col-md-12">
                <?php $sports = multiexplode(array(",",".","|",":"),$user->sports) ?>
                @foreach ($sports as $sport)
                    <a href="{{action('HomeController@showChallenges', $sport)}}">#{{$sport}}</a>

                @endforeach
            </div>

            <div class="col-sm-12 col-md-12" style="margin-top: 30px">
                @if(!Auth::check() || Auth::user()->id == $user->id)
                    <a href="{{ action('HomeController@createChallenge') }}" class="btn btn-xl">CREATE CHALLENGE</a>
                @else
                    <a href="{{ action('HomeController@createChallenge', $user->id) }}" class="btn btn-xl">CHALLENGE {{$user->name}}</a>
                @endif
            </div>

            <div class="col-sm-12 col-md-12" style="margin-top: 30px">

                @if($canBeFriend && Auth::check() && Auth::user()->id != $user->id)

                <form class="form-horizontal form-brand" role="form" method="POST" style="    margin-top: 30px;" action="{{ url('/friend') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="friendId" value="{{$user->id}}">
                    <input type="hidden" name="action" value="0">
                    <button type="submit" class="btn btn-success ">
                        <i class="fa fa-btn fa-user"></i> Send Friendship Request
                    </button>
                </form>
                @endif
            </div>

            <div class="col-sm-12 col-md-12" style="margin-top: 30px">
                <ul class="ch-grid">
                    {{--@if(is_array(json_decode($user->friends, true)))--}}
                    <?php $countFriends=0; ?>

                    @foreach ($userFriends as $friend)
                        <?php $countFriends++; ?>


                        @if($countFriends == 6)
                            <li class="show-friends">
                                <div class="ch-item ch-img-1">
                                    <button type="button" class="btn btn-info btn-circle btn-xl friends"><i class="glyphicon glyphicon-plus"></i><span style="font-size: 40px;">{{count($friends) - 5}}</span></button>
                                </div>
                            </li>
                        @endif

                        <li class="{{$countFriends >= 6? "hide-friend" : "" }}">
                            <div class="ch-item ch-img-1">

                                @if($friend->photo == "")
                                    <img src="/uploads/users/default_user.png" alt="{{$friend->name}}" title="{{$friend->name}}" class="img-circle friends {{$countFriends >= 6? "hide-friend" : "" }}" style="height: 100px; width: 100px">
                                @else
                                    <img src="{{'/uploads/users/'. $friend->photo }}" alt="{{$friend->name}}" title="{{$friend->name}}" class="img-circle friends {{$countFriends >= 6? "hide-friend" : "" }}" style="height: 100px; width: 100px">

                                @endif

                                <div class="ch-info">
                                    <p><a href="{{"/profile/".$friend->id}}">{{$friend->name}}</a></p>
                                </div>
                            </div>
                        </li>
                    @endforeach


                    <li class="show-friends">
                        <div class="ch-item ch-img-1">
                            <a href="/friends" class=" btn-circle friends">
                                <img src="/img/gear.png" class=" img-circle friends ">
                            </a>
                        </div>
                    </li>
                    {{--@endif--}}
                </ul>

            </div>



            </div>
        </div>
    </section>

<div>
    <div class="tabbable full-width-tabs">
        <ul class="nav nav-tabs">
            <li class="active take-all-space-you-can">
                <a href="#ongoing" aria-controls="ongoing" data-toggle="tab">
                    <h3>{{$challenges->total()}}</h3>
                    <h4 class="text-capitalize">Active</h4>
                </a>
            </li>
            <li class="take-all-space-you-can">
                <a href="#ended" aria-controls="ended" data-toggle="tab">
                    <h3>{{$endedChallenges->total()}}</h3>
                    <h4 class="text-capitalize">Completed</h4>
                </a>
            </li>

            <li class="take-all-space-you-can">
                <a href="#mychallenges" aria-controls="mychallenges" data-toggle="tab">
                    <h3>{{$myChallenges->total()}}</h3>
                    <h4 class="text-capitalize">Created Challenges</h4>
                </a>
            </li>
        </ul>
    </div>

</div>
<section  id="portfolio">
    <div class="container">
        <div class="row" id="latest">

            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="ongoing">

                    <div class="row">
                        @foreach ($challenges as $challenge)
                            @include('partials.single_challenge')
                        @endforeach
                    </div>

                    <div class="row">
                        {!! $challenges->links() !!}
                    </div>


                </div>
                <div role="tabpanel" class="tab-pane" id="ended">

                    <div class="row">
                        @foreach ($endedChallenges as $challenge)
                            @include('partials.single_challenge')
                        @endforeach
                    </div>
                    <div class="row">
                        {!! $endedChallenges->links() !!}
                    </div>

                </div>

                <div role="tabpanel" class="tab-pane" id="mychallenges">
                    <div class="row">
                        @foreach ($myChallenges as $challenge)
                            @include('partials.single_challenge')
                        @endforeach
                    </div>
                    <div class="row">
                        {!! $myChallenges->links() !!}
                    </div>

                </div>
              </div>


        </div>
    </div>
</section>




@endsection


@section('footer')

<script>

$("#endedbtn").click(function(){
    $("#endeddiv").addClass("bg-light-gray");
    $("#ongoingdiv").removeClass("bg-light-gray");
});

$("#ongoingbtn").click(function(){
    $("#endeddiv").removeClass("bg-light-gray");
    $("#ongoingdiv").addClass("bg-light-gray");
});

$(".show-friends").click(function(){
    $(".hide-friend").removeClass("hide-friend");
    $(".show-friends").hide();
});


</script>


<script>
//    $(window).on('hashchange', function() {
//        if (window.location.hash) {
//            var page = window.location.hash.replace('#', '');
//            if (page == Number.NaN || page <= 0) {
//                return false;
//            } else {
//                getPosts(page);
//            }
//        }
//    });
    $(document).ready(function() {
        $(document).on('click', '#ended .pagination a', function (e) {

            var userIDArray = $(this).attr('href').split('/');

            var userId = userIDArray[userIDArray.length-1].split('?')[0];
            var url = '/ended-challenges/'+userId+'/?ended=';

            getEndedChallenges(url, $(this).attr('href').split('ended=')[1]);
            e.preventDefault();
        });

        $(document).on('click', '#ongoing .pagination a', function (e) {

            var userIDArray = $(this).attr('href').split('/');

            var userId = userIDArray[userIDArray.length-1].split('?')[0];
            var url = '/ongoing-challenges/'+userId+'/?ongoing=';

            getOngoingChallenges(url, $(this).attr('href').split('ongoing=')[1]);
            e.preventDefault();
        });

        $(document).on('click', '#mychallenges .pagination a', function (e) {

            var userIDArray = $(this).attr('href').split('/');

            var userId = userIDArray[userIDArray.length-1].split('?')[0];
            var url = '/my-challenges/'+userId+'/?myChallenges=';

            getMyChallenges(url, $(this).attr('href').split('myChallenges=')[1]);
            e.preventDefault();
        });

    });
    function getEndedChallenges(url, page) {
        $.ajax({
            url : url + page,
            dataType: 'json'
        }).done(function (data) {
            $('#ended').html(data);
//            location.hash = page;
        }).fail(function () {
            alert('Posts could not be loaded.');
        });
    }

    function getOngoingChallenges(url, page) {
            $.ajax({
                url : url + page,
                dataType: 'json'
            }).done(function (data) {
                $('#ongoing').html(data);
            }).fail(function () {
                alert('Posts could not be loaded.');
            });
        }

        function getMyChallenges(url, page) {
            $.ajax({
                url : url + page,
                dataType: 'json'
            }).done(function (data) {
                $('#mychallenges').html(data);
            }).fail(function () {
                alert('Posts could not be loaded.');
            });
        }


    </script>






@endsection


