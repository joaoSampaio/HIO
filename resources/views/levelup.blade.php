    @extends('app')

    @section('header')


    <style>

    /*<link rel="stylesheet" href="https://rawgit.com/enyo/dropzone/master/dist/dropzone.css">*/

    header {
        background-image: url(/img/bg_challenge.png);

        }


    @media (max-width: 768px) {
        #clockdiv div > span{

          font-size: 33pt !important;
          }
    }

    .container-add-prof{
        background: #fff;
        position: absolute;
        /*width: 370px;*/
        height: 261px;
    }

    .btn-add-prof{

            width: 100%;
            height: 20px;
            font-size: 165px;
            text-align: center;
            top: 19%;
            position: absolute;
            color: #eb1946;
    }

    video{
      position: relative;
      top: 50%;
      transform: translateY(-50%);
    }

    .btn-like  {
    border-color: #C1C5C8;
    background: #C1C5C8;
    background: url(/img/muscle-128.png);
        background-position: center center;
        background-repeat: no-repeat;
    }

    .btn-header {
        padding: 15px 50px;
        color: white;

    }

    .trash-proof{
    position: absolute;
        bottom: 10px;
        font-size: 18pt;
        color: #eb1946;
        right: 30px;
        cursor: pointer;
    }

      .smalltext{
          font-size: 18px;
          color: #404d57;
      }

    .challenge-end span{
        color: #C1C5C8;
    }

    #showmore {
    cursor: pointer;
    }

    .hide-friend{
        display: none !important;
    }






    .challenge-title{
        color: white;
        font-size: 36px;
        font-weight: 400;
        text-transform: inherit;
    }

    .challenge-subtitle{
        color: #3e4a54;
        font-size: 18px;
        font-weight: 800;
        text-transform: uppercase;
    }



    .edit-btn {
        font-size: 23px;
        font-family: "Roboto";
        color: rgb(255, 255, 255);
        font-weight: bold;
        text-transform: uppercase;
        line-height: 1.7;
        text-align: center;
        -moz-transform: matrix( 0.69874892240154,0,0,0.69874892240154,0,0);
        -webkit-transform: matrix( 0.69874892240154,0,0,0.69874892240154,0,0);
        -ms-transform: matrix( 0.69874892240154,0,0,0.69874892240154,0,0);
        border-radius: 8px;
        background-color: rgb(178, 178, 178);
        width: 150px;
        height: 56px;
        margin-top: 20px;
    }

    .profile-participant{
    width: 49px;
      height: 50px;
      background-color: rgb(255, 255, 255);
      border-radius: 50%;
    }



    .btn-show-all-participants {
        color: #fff;
        background-color: rgb(197, 197, 197);
        border-color: rgb(197, 197, 197);
        font-family: 'Roboto', sans-serif;
        text-transform: uppercase;
        font-weight: 700;
        border-radius: 3px;
        font-size: 18px;
        padding: 0px;
    }




    .show-friends div{
    background-color: #c5c5c5;
    }


    .people-participating{
    font-size: 20px;
    color: #acaeb0;
    font-weight: 400;

    }
    .people-participating a{
        color: #404d57;
        font-weight: bold;
    }
    #showmore{
    color: #404d57;
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

    .challenge-item-info{
        box-shadow: 0px 0px 68px 0px rgba(0, 0, 0, 0.2);
    }

    .wall-fame-subtitle {
        text-align: center;
        font-size: 24px;
        color: #43484c;
        font-weight: 400;
        margin-bottom: 20px;
        margin-top: 0px;
        text-transform: inherit;
    }

    .btn-file{
        background-color: rgb(178, 178, 178);
        color: rgb(255, 255, 255);
        font-size: 16px;
        font-family: "Roboto";
        text-transform: uppercase;
        padding: 6px 20px;
        margin-top: 30px;
    }

    .dropzonebg{
    background-color: #E7EBEE;
    border: 0px;
    padding: 50px 20px;
    }

    .upload-file-title {
        text-align: center;
        font-weight: 400;
        text-transform: initial;
            margin-bottom: 20px;
        font-size: 36px;
        line-height: 1.7;
        /*padding: 20px 0px;*/
    }

    .upload-subtitle{
      font-size: 20px;
      font-family: "Roboto";
      color: rgb(188, 188, 188);
      line-height: 1.2;
      text-align: center;
      -moz-transform: matrix( 2.12140524494472,0,0,2.13117012696179,0,0);
      -webkit-transform: matrix( 2.12140524494472,0,0,2.13117012696179,0,0);
      -ms-transform: matrix( 2.12140524494472,0,0,2.13117012696179,0,0);
        font-weight: 400;
    }

    .dropzone {
        padding: 20px 30px;
        border: 0px;
    }

    .create-input{
        margin-top: 20px;
        font-size: 20px;
    }


    .btn-upload{
        margin-top: 25px;
        font-size: 16px;
        font-weight: 500;
    }

    .dropzone .dz-preview.dz-image-preview {
        background: transparent;
    }

    @media (max-width: 767px){

        .modal-dialog {
            margin: 0px;
        }
        .modal-content{
            border-radius: 0px;
            border: 0px;
        }

        .close-new {
            right: 15px;
            top: 15px;
            line-height: 1;
        }

        .upload-file-title {
            font-size: 25px;
            margin-bottom: 5px;
            margin-top: 20px;
        }

        #img-icon-upload{
            display: none;
        }

        #proofs-upload-layout br{
            display: none;
        }
        .btn-file{
            margin-top: 0px;
        }

        .create-input {
            margin-top: 20px;
            font-size: 18px;
        }

    }
    .navbar-default {
        background-color: transparent !important;
    }

    .btn-accept {
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

        .small-margin{
            margin-bottom: 10px;
        }

        .btn-difficulty{
            background-color: white;
            color: black;
            border: 1px solid black;
            margin: 0px 5px;
        }

        .btn-difficulty.active{
            background-color: #eb1946;
            color: white;
        }

      </style>

    @endsection

    @section('content')


            <header>
                <div class="container">
                    <div style="padding-top: 200px;padding-bottom: 200px;">
                        <h1 class="challenge-title">Level Up</h1>
                        <div class="intro-lead-in"  style="    margin-top: 55px;">



                            <h3 class="challenge-subtitle">Once you accept one challenge you have one week to complete all challenges to level up.</h3>

                            <div class="col-sm-12 col-md-12" style="{{!$canRetry? "display:none;" : ""}}">
                                <div id="clockdiv">
                                  <div>
                                    <span class="days">7</span>
                                    <div class="smalltext">DAYS</div>
                                  </div>

                                  <div>
                                    <span class="hours">0</span>
                                    <div class="smalltext">HRS</div>
                                  </div>
                                  <div>
                                    <span class="minutes">0</span>
                                    <div class="smalltext">MIN</div>
                                  </div>
                                  <div>
                                    <span class="seconds">0</span>
                                    <div class="smalltext">SEC</div>
                                  </div>
                                </div>
                               </div>
                            </div>

                            @if(!$canRetry)

                                <h3  class="challenge-subtitle" style="margin-top: 30px">Your LVL UP will be decided after the 36 hours voting period.</h3>
                            @endif

                    </div>
                </div>
            </header>




            @if($selectedProfileCategory == null )
                <section style="padding-top: 0px;background-color: #e7eaed">
                <div class="container">
                    <div class="row text-center">
                        <div class="col-sm-12 col-md-10 col-md-offset-1" style="margin-top: 50px">

                            <h2 class="text-capitalize" style="color: #333; margin-bottom: 30px;font-size: 36px;font-weight: 400;">No category selected in user profile</h2>

                        </div>
                    </div>
                </div>
                </section>


            @elseif(! \App\Model\CategoryLevel::isLvlUpAvailable($level, Auth::user()->xp))

                <section style="padding-top: 0px;background-color: #e7eaed">
                    <div class="container">
                        <div class="row text-center">
                            <div class="col-sm-12 col-md-10 col-md-offset-1" style="margin-top: 50px">

                                <h2 class="text-capitalize" style="color: #333; margin-bottom: 30px;font-size: 36px;font-weight: 400;">Not enough XP to level up at <span class="rank">{{$selectedProfileCategory->name}}</span></h2>

                            </div>
                        </div>
                    </div>
                </section>


            @else


                <section style="padding-top: 0px;background-color: #e7eaed">
                    <div class="container">
                        <div class="row text-center">
                            <div class="col-sm-12 col-md-10 col-md-offset-1" style="margin-top: 50px">

                                <h2 class="text-capitalize" style="color: #333; margin-bottom: 30px;font-size: 36px;font-weight: 400;">Reaching</h2>
                                <div><span class="badge badge-lvl">{{$level+1}} <span>LVL</span></span></div>
                                <div style="    margin-top: 20px;    margin-bottom: 20px;">
                                    <span class="rank">ADVANCED</span><svg width="17px" height="17px">
                                     <path fill-rule="evenodd"  fill="rgb(72, 211, 98)"
                                      d="M16.855,8.391 L4.327,16.931 C4.008,17.163 3.615,16.760 3.850,16.440 L10.558,6.643 C10.638,6.534 10.772,6.484 10.903,6.512 L16.726,7.766 C17.018,7.829 17.098,8.215 16.855,8.391 ZM6.453,10.355 C6.372,10.463 6.238,10.514 6.107,10.486 L0.284,9.232 C-0.008,9.169 -0.088,8.783 0.155,8.607 L12.683,0.067 C13.002,-0.166 13.395,0.238 13.161,0.558 L6.453,10.355 Z"/>
                                     </svg>
                                    <span class="rank">{{$selectedProfileCategory->name}}</span>

                                </div>
                            </div>
                        </div>
                    </div>
                </section>


                <section  >
                    <div class="container" >

                        @if($hasFailed)
                            <div class="col-sm-12 col-xs-12 col-md-8 col-md-offset-2" style="text-align: center;margin-bottom: 50px">
                                {!! Form::open(array('action' => array('UserProfileController@resetLvlUp'))) !!}
                                <button type="submit" class="btn btn-accept btn-accept-lvl">Try Again</button>
                                </form>
                            </div>

                        @endif

                        <div class="col-sm-12 col-xs-12 col-md-8 col-md-offset-2" style="text-align: center;">

                            <div class="col-sm-4 col-xs-12 col-lg-4 small-margin" >Choose Difficulty</div>
                            <div class="col-sm-4 col-xs-12 col-lg-4 small-margin" >Challenge</div>
                            <div class="col-sm-4 col-xs-12 col-lg-4 small-margin" >State</div>

                            @php(
                            $inProgress = $categoryLevel != null ? $categoryLevel->getInProgressGroups() : array()
                            )

                            @php(
                            $failedGroups = $categoryLevel != null ? $categoryLevel->getFailedGroups() : array()
                            )

                            @php(
                            $completedGroups = $categoryLevel != null ? $categoryLevel->getCompletedGroups() : array()
                            )

                            @foreach($levelUpChallenges->group as $key => $challengeLvlUp)

    {{--                            {{json_encode($challengeLvlUp)}}--}}

                                <div class="col-sm-4 col-xs-12 col-lg-4 small-margin" >
                                    <div class="btn-group">
                                    @foreach($levelUpChallenges->difficulties[$key] as $chave=> $levelChallenge)
                                        <button type="button" class="btn {{$chave == 0? "active" : ""}} btn-difficulty" data-group="{{$key}}" data-diff="{{$levelChallenge}}">{{$levelChallenge}}</button>
                                    @endforeach
                                    </div>


    {{--                                {{json_encode($levelUpChallenges->difficulties[$key])}}--}}
                                </div>


                                @foreach($challengeLvlUp as $chave => $challenge)
                                    <div class="col-sm-4 col-xs-12 col-lg-4 small-margin group-{{$key}} diff-{{$challenge->difficulty}}" style="{{$chave != 0? "display: none;" : ""}}" >
                                        <p>{{$challenge->title}}</p>
                                        <p>{{$challenge->sub_title}}</p>
                                    </div>
                                    <div class="col-sm-4 col-xs-12 col-lg-4 small-margin group-{{$key}} diff-{{$challenge->difficulty}}" style="{{$chave != 0? "display: none;" : ""}}">
                                        @if(array_key_exists($challenge->group_challenge, $inProgress))
                                            <span><a href="/challenge/{{$inProgress[$challenge->group_challenge]}}" class="portfolio-link" title="{{$challenge->title}}">In progress</a></span>
                                        @elseif(array_key_exists($challenge->group_challenge, $completedGroups))
                                            <span><a href="/challenge/{{$completedGroups[$challenge->group_challenge]}}" class="portfolio-link" title="{{$challenge->title}}">Completed</a></span>

                                        @elseif(array_key_exists($challenge->group_challenge, $failedGroups) && $canRetry)
                                            <button class="btn btn-accept btn-accept-lvl" href="#" data-id="{{$challenge->id}}">Failed Retry?</button>
                                        @elseif(array_key_exists($challenge->group_challenge, $failedGroups) && !$canRetry)
                                        {{--nao posaso fazer retry--}}
                                            <span><a href="/challenge/{{$failedGroups[$challenge->group_challenge]}}" class="portfolio-link" title="{{$challenge->title}}">Failed</a></span>
                                        @elseif(!$canRetry)
                                        {{--ja acabou o deadline nao pode aceitar--}}
                                            <span>deadline acabou</span>
                                        @else
                                            <button class="btn btn-accept btn-accept-lvl" href="#" data-id="{{$challenge->id}}">Accept</button>
                                        @endif

                                    </div>
                                @endforeach



                                <div class="clearfix visible-xs visible-lg"></div>
                            @endforeach



                        </div>
                    </div>
                </section>
            @endif
    @endsection



    @section('footer')

                <script>
                function getTimeRemaining(endtime){
                  var t = endtime - Date.parse(new Date());
                  var seconds = Math.floor( (t/1000) % 60 );
                  var minutes = Math.floor( (t/1000/60) % 60 );
                  var hours = Math.floor( (t/(1000*60*60)) % 24 );
                  var days = Math.floor( t/(1000*60*60*24) );
                  return {
                    'total': t,
                    'days': days,
                    'hours': hours,
                    'minutes': minutes,
                    'seconds': seconds
                  };
                }
                function initializeClock(id, endtime) {
                  var clock = document.getElementById(id);
                  var daysSpan = clock.querySelector('.days');
                  var hoursSpan = clock.querySelector('.hours');
                  var minutesSpan = clock.querySelector('.minutes');
                  var secondsSpan = clock.querySelector('.seconds');

                  function updateClock() {
                    var t = getTimeRemaining(endtime);

                    daysSpan.innerHTML = t.days;
                    hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
                    minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
                    secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);

                    if (t.total <= 0) {
                      clearInterval(timeinterval);
                    }
                  }
                  updateClock();
                  var timeinterval = setInterval(updateClock, 1000);
                }

                @if(isset($categoryLevel) && $categoryLevel != null && $categoryLevel->deadLineLvl > 0)
                    var arr = '{{$categoryLevel->deadLineLvl}}'.split(/[- :]/);
                    var deadline = new Date(arr[0], arr[1]-1, arr[2], arr[3], arr[4], arr[5]);
                    initializeClock('clockdiv', deadline);
                    console.log(deadline);
                @endif


            $('.btn-difficulty').click(function(){
                var group = $(this).data('group');
                var diff = $(this).data('diff');

                $('.btn-difficulty[data-group='+group+']').removeClass('active')
                $(this).addClass('active')
                $('.group-'+group).hide();
                $('.group-'+group+'.diff-'+diff).show();
            });

                $('.btn-accept-lvl').click(function(){
                    var id = $(this).data('id');

                    $.post("/lvl-up/challenge",
                        {
                            challenge_lvl_up_id: id,
                        },
                        function(data, status){

                            var success = data.status;
                            location.reload();
                            if(success){

                            }
                        });
                });



            </script>

    @endsection


