@extends('app')

@section('header')

 <link href="{{ asset('css/croppic.css') }}" rel="stylesheet">

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
    padding: 9px 40px !important;
color: white;
margin-top: 25px;
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
        /*position: absolute;*/
        /*right: 0;*/
        /*top: 50px;*/
        /*z-index: 2;*/
    }
}

.challenge-item-info{
    /*border: 1px solid #807c7c;*/
    /*box-shadow: 0 5px 15px rgba(0,0,0,.5);*/
    box-shadow: 0px 0px 68px 0px rgba(0, 0, 0, 0.2);
}


.profile-main-photo{
    width: 140px;
    height: 140px;
}

.profile-main-name{
margin-top: 30px;
    font-size: 36px;
    font-weight: 500;
}


.bg-text, .bg-text-brand-new {
    /*background-color: #aaa;*/
    /*overflow: hidden;*/
    position: relative;
}
.bg-text::before {
    color: #ececed;
    content: attr(data-bg-text);
    display: block;
    font-size: 208px;
    line-height: 1;
    position: absolute;
    top: 1px;
    white-space: nowrap;
        overflow: hidden;
        max-width: 95%;
}





.my-challenges-title{
text-transform: inherit;
    font-size: 45px;
    font-weight: 300;
    margin-top: 40px;
}



.btn-friends {
    border-color: #5cb85c;
    background: #5cb85c;
    padding: 9px 40px !important;
    color: white;
    margin-top: 25px;
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
                <div class="alert alert-success col-sm-12 col-md-6 col-md-offset-3">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Challenge saved!</strong> Your new challenge has been added.
                </div>
            @endif

            <div class="row text-center">

                <div class="col-sm-12 col-md-12">

                    <div  style="text-align: center">
                        @if($user->role === "trainer")
                            <h3 class="text-capitalize profile-main-name">Treinador !!!</h3>
                        @endif

                        <div  style="display: inline-block;" >
                            <div id="cropContainerEyecandy" style="position: relative;width: 140px; height: 140px">
                                <img src="{{'/user/photo/'. $user->id }}" id="user-crop" alt="{{$user->name}}" title="{{$user->name}}" class="img-circle profile-main-photo">
                            </div>

                        </div>
                    </div>
                    <div ><h3 class="text-capitalize profile-main-name">{{$user->name}}</h3></div>

                </div>

            @if(true)
                <div class="col-sm-12 col-md-8 col-md-offset-2" style="  margin-top: 30px; margin-bottom: 30px;font-size: 16px;font-weight: 500;">
                    {!! nl2br(e($user->about)) !!}

                </div>
                <div class="col-sm-12 col-md-8 col-md-offset-2" style="  margin-bottom: 30px;font-size: 16px;font-weight: 500;">

                    {!! nl2br(e($user->interests)) !!}
                </div>
            @endif


            <div class="col-sm-12 col-md-12">
                <?php $sports = multiexplode(array(",",".","|",":"),$user->sports) ?>
                @foreach ($sports as $sport)
                    <a href="{{action('HomeController@showChallenges', $sport)}}">#{{$sport}}</a>

                @endforeach
            </div>

            @if(Auth::user()->email === $user->email)
                <div class="col-sm-12 col-md-12">
                    <a class="btn btn-edit edit-profile" href="{{ action('UserProfileController@editProfile') }}">Edit</a>
                </div>
                <div class="col-sm-12 col-md-12">
                    <a class="btn  btn-friends edit-profile" href="/friends">Friends</a>
                </div>
            @else
                 <div class="col-sm-12 col-md-12">
                    <a class="btn btn-friends edit-profile" href="{{action('HomeController@getFriendsUser', [ 'id' => $user->id, 'name'=>$user->name])}}">Friends</a>
                </div>

             @endif

                @if(Auth::user()->role === "admin" && $user->other_profile == NULL)
                    <form class="form-horizontal form-brand" role="form" method="POST" style="    margin-top: 30px;" action="{{ url('/upgrade-trainer') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="user_id" value="{{$user->id}}">
                        <button type="submit" class="btn btn-success ">
                            <i class="fa fa-btn fa-user"></i> Upgrade to trainer
                        </button>
                    </form>

                @endif


             <div class="col-sm-12 col-md-12" style="margin-top: 30px">
                 @if(!Auth::check() || Auth::user()->id == $user->id)
                     <a href="#" id="openCreate" class="btn btn-xl">CREATE CHALLENGE</a>
                 @elseif($user->role != "trainer")
                     <a href="#" id="openCreate" class="btn btn-xl">CHALLENGE {{$user->name}}</a>
                 @endif
             </div>

             <div class="col-sm-12 col-md-12" style="margin-top: 30px">
                 @if($canBeFriend && Auth::check() && Auth::user()->id != $user->id && Auth::user()->role != "trainer")

                 <form class="form-horizontal form-brand" role="form" method="POST"  action="{{ url('/friend') }}">
                     {{ csrf_field() }}
                     <input type="hidden" name="friendId" value="{{$user->id}}">
                     <input type="hidden" name="action" value="0">
                     <button type="submit" class="btn btn-success ">
                         <i class="fa fa-btn fa-user"></i>
                            {{$user->role === "trainer"? "Follow" : "Send Friendship Request"}}

                     </button>
                 </form>
                 @endif
             </div>


            </div>
        </div>
    </section >

    @if($user->role != "trainer")
        <section style="background-color: #e7e7e7">
            <div id="wrapper" style="text-align: center">
                <div id="yourdiv" style="display: inline-block;" >{{achievementToHtml($user->achievements)}}</div>
            </div>
        </section>
    @endif


    <section  class="bg-text" data-bg-text="Challenges" >


        <h3 class="col-md-12 text-center my-challenges-title">My challenges</h3>
        <div style="text-align: center">
            <div class="col-md-12" style="display: inline-block;margin-bottom: 100px;margin-top: 25px;">

                <a class="btn btn-tab-challenge active" href="#ongoing" aria-controls="ongoing" data-toggle="tab">ON GOING</a>
                <a class="btn btn-tab-challenge" href="#ended" aria-controls="ended" data-toggle="tab">FINISHED</a>
                <a class="btn btn-tab-challenge" href="#mychallenges" aria-controls="mychallenges" data-toggle="tab">ALL</a>
            </div>
        </div>

        <div class="container">
            <div class="row" id="latest">

                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="ongoing">

                        <div class="row">
                            @foreach ($challenges as $challenge)
                                @include('partials.single_challenge')
                            @endforeach
                        </div>

                        <div class="row" style="text-align: center;">
                            {!! $challenges->links() !!}
                        </div>


                    </div>
                    <div role="tabpanel" class="tab-pane" id="ended">

                        <div class="row">
                            @foreach ($endedChallenges as $challenge)
                                @include('partials.single_challenge')
                            @endforeach
                        </div>
                        <div class="row" style="text-align: center;">
                            {!! $endedChallenges->links() !!}
                        </div>

                    </div>

                    <div role="tabpanel" class="tab-pane" id="mychallenges">
                        <div class="row">
                            @foreach ($myChallenges as $challenge)
                                @include('partials.single_challenge')
                            @endforeach
                        </div>
                        <div class="row" style="text-align: center;">
                            {!! $myChallenges->links() !!}
                        </div>

                    </div>
                  </div>


            </div>
        </div>
    </section>


    <div class="modal fade" id="create-challenge" tabindex="-1" role="dialog" aria-labelledby="modalHome" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header-create">
                    <button type="button" class="close" style="font-size: 40px;font-weight: 300;" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="create-challenge-title" id="modalHome">Create Challenge</h4>
                </div>

                <div class="modal-body">
                    <span id="create-spin" class="glyphicon glyphicon-refresh spinning"></span>
                    <iframe id="create-challenge-iframe" src="" style="" width="99.6%" frameborder="0"></iframe>

                </div>

            </div>
        </div>
    </div>




@endsection


@section('footer')

<script>
    $('#openCreate').click(function(){

        $('#create-challenge').on('shown.bs.modal', function() {
        @if(!Auth::check() || Auth::user()->id == $user->id)
             $('#create-challenge-iframe').attr("src","{{ action('HomeController@createChallenge') }}");
         @else
            $('#create-challenge-iframe').attr("src","{{ action('HomeController@createChallenge', $user->id) }}");
         @endif

        });
        $('#create-challenge').modal({show:true})
    });

</script>


<script>

$('.btn-tab-challenge').on('click', function (e) {
    $('.btn-tab-challenge').removeClass('active');
    $(e.currentTarget).addClass('active');
})



</script>

<script src="{{ asset('js/croppic.min.js') }}"></script>
@if(Auth::user()->email == $user->email)
<script>
    var eyeCandy = $('#cropContainerEyecandy');
    var croppedOptions = {
        zoomFactor:10,
        doubleZoomControls:false,
        rotateFactor:10,
        rotateControls:false,
        customUploadButtonId:'user-crop',
        uploadUrl: '/upload-photo',
        cropUrl: '/crop-photo',
        modal:true,
        onAfterImgCrop:
            function(){
                var d = new Date();
                $(".croppedImg").attr("src", "{{'/user/photo/'. $user->id }}?"+d.getTime());
                $(".croppedImg").addClass('img-circle');


                $(".img-circle").attr("src", "{{'/user/photo/'. $user->id }}?"+d.getTime());

                console.log('onAfterImgCrop')


            },
        cropData:{
            'width' : 140,
            'height': 140
        }
    };
    var cropperBox = new Croppic('cropContainerEyecandy', croppedOptions);
</script>
@endif

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


