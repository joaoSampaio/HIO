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
font-weight: bold;
}

.btn-edit:hover  {
border-color: #a6aaad;
background: #a6aaad;
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




.profile-main-name{
margin-top: 30px;
    font-size: 36px;
    font-weight: 400;
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
    font-weight: bold;
}

/*.profile-pic-anim{*/
/*overflow: hidden;*/
 /*width: 120px;*/
  /*height: 120px;*/
  /*z-index: -1;*/
  /*position: relative;*/
/*box-shadow: 60px -60px 0 2px #ffa86a, -60px -60px 0 2px #ffa86a, -60px 60px 0 2px #ffa86a, 60px 60px 0 2px #ffa86a, 0 0 0 2px #ffa86a;*/
/*}*/
/*.profile-pic-anim:hover{*/
    /*animation: border .4s ease 1 forwards;*/
/*}*/

/*@keyframes border {*/
  /*0% {*/
    /*box-shadow: 60px -60px 0 2px #fff, -60px -60px 0 2px #fff, -60px 60px 0 2px #fff, 60px 60px 0 2px #fff, 0 0 0 2px #fff;*/
  /*}*/
  /*25% {*/
    /*box-shadow: 0 -125px 0 2px #fff, -60px -60px 0 2px #fff, -60px 60px 0 2px #fff, 60px 60px 0 2px #fff, 0 0 0 2px #73ff00;*/
  /*}*/
  /*50% {*/
    /*box-shadow: 0 -125px 0 2px #fff, -125px 0px 0 2px #fff, -60px 60px 0 2px #fff, 60px 60px 0 2px #fff, 0 0 0 2px #73ff00;*/
  /*}*/
  /*75% {*/
    /*box-shadow: 0 -125px 0 2px #fff, -125px 0px 0 2px #fff, 0px 125px 0 2px #fff, 60px 60px 0 2px #fff, 0 0 0 2px #73ff00;*/
  /*}*/
  /*100% {*/
    /*box-shadow: 0 -125px 0 2px #fff, -125px 0px 0 2px #fff, 0px 125px 0 2px #fff, 120px 40px 0 2px #fff, 0 0 0 2px #73ff00;*/
  /*}*/
/*}*/





.profile-main-photo{
    width: 150px;
    height: 150px;
        padding: 2px;
}



div[data-anim~=base] {
  -webkit-animation-iteration-count: 1;  /* Only run once */
  -webkit-animation-fill-mode: forwards; /* Hold the last keyframe */
  -webkit-animation-timing-function:linear; /* Linear animation */
}

.wrapper[data-anim~=wrapper] {
  -webkit-animation-duration: 0.01s; /* Complete keyframes asap */
  -webkit-animation-delay: 0.5s; /* Wait half of the animation */
  -webkit-animation-name: close-wrapper; /* Keyframes name */
}

.circle[data-anim~=left] {
  -webkit-animation-duration: 1s; /* Full animation time */
  -webkit-animation-name: left-spin;
}

.circle[data-anim~=right] {
  -webkit-animation-duration: 0.5s; /* Half animation time */
  -webkit-animation-name: right-spin;
}

.wrapper {
  width: 150px; /* Set the size of the progress bar */
  height: 150px;
  position: absolute; /* Enable clipping */
  clip: rect(0px, 150px, 150px, 75px); /* Hide half of the progress bar */
}
/* Set the sizes of the elements that make up the progress bar */
.circle {
  width: 150px;
  height: 150px;
  border: 4px solid #8dd39a;
  border-radius: 50%;
  position: absolute;
  clip: rect(0px, 75px, 150px, 0px);
}

@-webkit-keyframes right-spin {
  from {
    -webkit-transform: rotate(0deg);
  }
  to {
    -webkit-transform: rotate(180deg);
  }
}
/* Rotate the left side of the progress bar from 0 to 360 degrees */
@-webkit-keyframes left-spin {
  from {
    -webkit-transform: rotate(0deg);
  }
  to {
    -webkit-transform: rotate(360deg);
  }
}
/* Set the wrapper clip to auto, effectively removing the clip */
@-webkit-keyframes close-wrapper {
  to {
    clip: rect(auto, auto, auto, auto);
  }
}

.badge-lvl {
    background-color: rgb(72, 211, 98);
    font-size: 22px;
     color: rgb(255, 255, 255);
      font-weight: bold;
      text-transform: uppercase;
      line-height: 1.2;
      text-align: center;
      margin-top: 25px;
      border-radius: 25px;
          padding: 5px 15px;

}
.badge-lvl span{
        font-size: 14px;
      font-family: "Roboto";
      color: rgba(255, 255, 255, 0.749);
      font-weight: bold;
      text-transform: uppercase;
      line-height: 1.2;

}

.progress-bar-container .progress {
    border-right: solid 5px #FFF;
}
.progress-bar-container:last-child {
    border: none;
}

.rank{
    font-size: 18px;
      font-family: "Roboto";
      color: rgb(72, 211, 98);
      font-weight: bold;
      text-transform: uppercase;
      line-height: 1.2;
      text-align: center;
      margin-right: 10px;
      margin-left: 10px;
      margin-top: 20px;
      margin-bottom: 20px;

}


.progress-bar-xp {
  background-color: rgb(72, 211, 98);
  height: 6px;
}
.progress-bar-base {
  background-color: rgb(231, 234, 237);
  height: 6px;
}

.progress-bar-container .progress{
    height: initial;
    width: 20%;
    float: left;
    margin-bottom: 10px;
}

.xp-text {
  font-size: 20px;
  font-family: "Roboto";
  color: rgb(188, 188, 188);
  line-height: 1.2;
  text-align: center;
  font-weight: 400;
}

.badge-category {
    background-color: rgb(178, 178, 178);
    font-size: 12px;
    color: #ffffff;
    font-weight: bold;
    text-transform: uppercase;
    text-align: left;
    border-radius: 50%;
    padding: 5px 8px;
    margin-left: 7px;
    line-height: 1.1;
    vertical-align: middle;
}
.span-category {
    font-size: 16px;
    color: rgb(178, 178, 178);
    font-weight: bold;
    text-transform: uppercase;
    text-align: left;
    margin-left: 15px;
    line-height: 2;
}
.span-category-more{
    text-decoration: underline;
}

.btn-lvl-up {
    border-color: #eb1946;
    background: #eb1946;
    padding: 11px 31px !important;
    color: white;
    font-family: "Roboto";
      color: rgb(255, 255, 255);
      font-weight: bold;
      text-transform: uppercase;
      line-height: 1.2;
      text-align: center;
      margin-left: 12px;

}

.achievement{
    float: none;
    width: 110px;
}

.view-achievements{
    color: rgb(178, 178, 178);
    font-weight: bold;
    font-size: 16px;
    margin-top: 25px;
    text-decoration: underline;
    text-transform: uppercase;
    line-height: 1.43;
    text-align: center;

}

.friend_message {
  font-size: 20px;
  font-family: "Roboto";
  color: rgb(64, 77, 87);
  line-height: 1.2;
  text-align: center;
  font-weight: 400;
  margin-top: 20px;
}
.friend_message span {
    color: #acaeb0
}

    .category-btn{
        background: transparent;
        border: 0px;
    }

.category-btn.active {
    color: green;
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
                            <div id="cropContainerEyecandy" class=" " style="position: relative;width: 140px; height: 140px">
                                <div class="wrapper" data-anim="base wrapper">
                                  <div class="circle" data-anim="base left"></div>
                                  <div class="circle" data-anim="base right"></div>
                                </div>
                                <img src="{{'/user/photo/'. $user->id }}" id="user-crop" alt="{{$user->name}}"
                                                                title="{{$user->name}}" class="img-circle profile-main-photo profile-pic-anim">
                            </div>
                        </div>
                    </div>

                    <div><span class="badge badge-lvl">0 <span>LVL</span></span></div>

                    <div ><h3 class="text-capitalize profile-main-name">{{$user->name}}</h3></div>
                    <div style="    margin-top: 20px;    margin-bottom: 20px;">
                        @if($selectedProfileCategory != null)
                        <span class="rank">ADVANCED</span><svg width="17px" height="17px">
                                                                 <path fill-rule="evenodd"  fill="rgb(72, 211, 98)"
                                                                  d="M16.855,8.391 L4.327,16.931 C4.008,17.163 3.615,16.760 3.850,16.440 L10.558,6.643 C10.638,6.534 10.772,6.484 10.903,6.512 L16.726,7.766 C17.018,7.829 17.098,8.215 16.855,8.391 ZM6.453,10.355 C6.372,10.463 6.238,10.514 6.107,10.486 L0.284,9.232 C-0.008,9.169 -0.088,8.783 0.155,8.607 L12.683,0.067 C13.002,-0.166 13.395,0.238 13.161,0.558 L6.453,10.355 Z"/>
                                                                 </svg>
                        <span class="rank">{{$selectedProfileCategory->name}}</span>
                        @endif
                    </div>


                </div>
                <div class="col-sm-12 col-md-4 col-md-offset-4 progress-bar-container">
                    <div class="progress">
                          <div class="progress-bar progress-bar-xp bar1" role="progressbar" style="width:0%"></div>
                    </div>
                    <div class="progress">
                          <div class="progress-bar progress-bar-xp bar2" role="progressbar" style="width:0%"></div>
                    </div>
                    <div class="progress">
                          <div class="progress-bar progress-bar-xp bar3" role="progressbar" style="width:0%"></div>
                    </div>
                    <div class="progress">
                          <div class="progress-bar progress-bar-xp bar4" role="progressbar" style="width:0%"></div>
                    </div>
                    <div class="progress">
                          <div class="progress-bar progress-bar-xp bar5" role="progressbar" style="width:0%"></div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-md-offset-4 ">
                    <span class="xp-text">{{$user->xp}} / 1000XP</span>

                </div>

            @if($user->about != "")
                <div class="col-sm-12 col-md-8 col-md-offset-2" style="  margin-top: 30px; margin-bottom: 30px;font-size: 16px;font-weight: 500;">
                    {!! nl2br(e($user->about)) !!}

                </div>
            @endif
            @if($user->interests != "")
                <div class="col-sm-12 col-md-8 col-md-offset-2" style="  margin-bottom: 30px;font-size: 16px;font-weight: 500;">

                    {!! nl2br(e($user->interests)) !!}
                </div>
            @endif


            <div class="col-sm-12 col-md-12">
<!--                --><?php //$sports = multiexplode(array(",",".","|",":"),$user->sports) ?>
                <?php $countSports=0; ?>

                <form class="form-horizontal form-brand" role="form" method="POST" action="{{ url('/profile/me/category') }}">
                    {{ csrf_field() }}
                    @foreach ($categories as $sport)
                        <?php $countSports++; ?>
                        @if($countSports > 3)
                            @break
                        @endif
                        {{--href="{{action('HomeController@showChallenges', $sport->name)}}"--}}
                        <button type="submit" name="category_id" value="{{$sport->id}}" class=" {{$user->selected_category_id == $sport->id? "active":""}} category-btn span-category">{{$sport->name}}<span class="badge badge-category">{{$sport->level != null? $sport->level : 0}}</span></button>
                    @endforeach
                </form>
                @if($countSports > 3)
                    <a href="#" class="span-category span-category-more">SEE MORE</a>
                @endif
            </div>
            @if(Auth::user()->email === $user->email)
                <div class="col-sm-12 col-md-12" style="margin-top: 25px;">
                    <a class="btn btn-edit edit-profile" href="{{ action('UserProfileController@editProfile') }}">Edit</a>
                    <a class="btn  btn-lvl-up" href="/lvl-up">LEVEL UP</a>
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


             {{--<div class="col-sm-12 col-md-12" style="margin-top: 30px">--}}
                 {{--@if(!Auth::check() || Auth::user()->id == $user->id)--}}
                     {{--<a href="#" id="openCreate" class="btn btn-xl">CREATE CHALLENGE</a>--}}
                 {{--@elseif($user->role != "trainer")--}}
                     {{--<a href="#" id="openCreate" class="btn btn-xl">CHALLENGE {{$user->name}}</a>--}}
                 {{--@endif--}}
             {{--</div>--}}


                @if($canBeFriend && Auth::check() && Auth::user()->id != $user->id && Auth::user()->role != "trainer")

                    <div class="col-sm-12 col-md-12" style="margin-top: 30px">
                         <form class="form-horizontal form-brand" role="form" method="POST"  action="{{ url('/friend') }}">
                             {{ csrf_field() }}
                             <input type="hidden" name="friendId" value="{{$user->id}}">
                             <input type="hidden" name="action" value="0">
                             <button type="submit" class="btn btn-success ">
                                 <i class="fa fa-btn fa-user"></i>
                                    {{$user->role === "trainer"? "Follow" : "Send Friendship Request"}}
                             </button>
                         </form>
                     </div>
                @endif

            </div>
        </div>
    </section >

    @if($user->role != "trainer")
        <section style="background-color: #f2f5f8">
            <div id="wrapper" style="text-align: center">
                <div id="yourdiv" style="display: inline-block;" >{{achievementToHtml($user->achievements)}}</div>
            </div>
            <div class="view-achievements">View All achievements</div>
        </section>
    @endif

    <section id="friends-section" style="background-color: #e7eaed;position: relative;padding-left: 5px;padding-right: 5px;">

        @if($userFriends->total() > 0)
        <ul class="ch-grid" id="participants-list">
            <?php $countFriends=0; ?>
            @foreach ($userFriends as $friend)
                <?php $countFriends++; ?>

                <li class="{{$countFriends >= 6? "hide-friend" : "" }}">
                    <div class="ch-item ch-img-1">
                        <a href="{{"/profile/".$friend->id}}">
                            <img src="{{'/user/photo/'. $friend->id }}" alt="{{$friend->name}}" title="{{$friend->name}}" class="img-circle profile-participant friends {{$countFriends >= 6? "hide-friend" : "" }}">
                        </a>
                    </div>
                </li>

            @endforeach
        </ul>
        @endif
        <p class="text-center friend_message" >{!!$friendsMessage!!}</p>

        @if($userFriends->total() == 0 && $canBeFriend && Auth::check() && Auth::user()->id != $user->id && Auth::user()->role != "trainer")

            <div class="" style="margin-top: 30px">
                <form class="form-horizontal form-brand text-center" role="form" method="POST"  action="{{ url('/friend') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="friendId" value="{{$user->id}}">
                    <input type="hidden" name="action" value="0">
                    <button type="submit" class="btn btn-success ">
                        <i class="fa fa-btn fa-user"></i>
                        {{$user->role === "trainer"? "Follow" : "Send Friendship Request"}}
                    </button>
                </form>
            </div>
        @endif


    @if($userFriends->total() > 0)
        <div class="view-achievements">
            @if(Auth::user()->email === $user->email)
                <a href="/friends"  class="span-category span-category-more">
                    My Friends
                </a>
            @else
                <a href="{{action('HomeController@getFriendsUser', [ 'id' => $user->id, 'name'=>$user->name])}}"  class="span-category span-category-more">
                    {{getFirstName($user->name)}}'s Friends
                </a>
            @endif
        </div>
    @endif

</section>

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
                        @foreach ($ongoingChallenges as $challenge)
                            @include('partials.single_challenge')
                        @endforeach
                    </div>

                    <div class="row" style="text-align: center;">
                        {!! $ongoingChallenges->links() !!}
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
@endsection
@section('modal')
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
@if(Auth::check())
        window.document.addEventListener('myEvent', handleEvent, false)
        function handleEvent(e) {
          console.log(e.detail.challengeId) // outputs: {foo: 'bar'}
          window.location.replace("/challenge/"+e.detail.challengeId);
        }
    @endif
$('#openCreate').click(function(){
    @if(Auth::check())
        $('#create-challenge').on('shown.bs.modal', function() {
            @if(!Auth::check() || Auth::user()->id == $user->id)
                 $('#create-challenge-iframe').attr("src","{{ action('HomeController@createChallenge') }}");
             @else
                $('#create-challenge-iframe').attr("src","{{ action('HomeController@createChallenge', $user->id) }}");
             @endif
         });
        $('#create-challenge').modal({show:true})
    @else
        window.location.replace("/auth");
    @endif


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
        url : url + page+"&showcreate=false",
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
            url : url + page+"&showcreate=false",
            dataType: 'json'
        }).done(function (data) {
            $('#ongoing').html(data);
        }).fail(function () {
            alert('Posts could not be loaded.');
        });
    }

    function getMyChallenges(url, page) {
        $.ajax({
            url : url + page+"&showcreate=false",
            dataType: 'json'
        }).done(function (data) {
            $('#mychallenges').html(data);
        }).fail(function () {
            alert('Posts could not be loaded.');
        });
    }


    var xpNeeded = 1000;
    var currentXp = {{$user->xp}};
    var xpPerBar = xpNeeded/5;
    var numBarFilled = Math.floor(currentXp/xpPerBar);
    var remainder = currentXp % xpPerBar;
    for(var i=1;i<=numBarFilled; i++){
        $( ".bar"+i+"").width('100%');
    }
    if(remainder > 0){
        var rest = remainder*100/xpPerBar;
        $( ".bar"+(numBarFilled+1)+"").width(rest+'%');
    }

    //progress-bar-container
//<div class="progress-bar progress-bar-xp" role="progressbar" style="width:100%"></div>

</script>



@endsection


