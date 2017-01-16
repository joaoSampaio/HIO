@extends('app')

@section('header')

<link href="{{ asset('css/dropzone.min.css') }}" rel="stylesheet">
<style>

/*<link rel="stylesheet" href="https://rawgit.com/enyo/dropzone/master/dist/dropzone.css">*/

header {
    background-image: url(/img/challenge_bg.jpg);

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

  #clockdiv{
      font-family: 'Roboto', sans-serif;
      color: #fff;
      display: inline-block;
      text-align: center;
      font-size: 30px;
      height: 200px;
  }

  #clockdiv > div{
      padding: 10px;
      border-radius: 3px;
      /*background: #00BF96;*/
      display: inline-block;
  }

  #clockdiv div > span{
      /*padding: 15px;*/
      border-radius: 3px;
      /*background: #00816A;*/
      font-size: 70pt;
      display: inline-block;
  }

  .smalltext{
      padding-top: 5px;
      font-size: 16px;
      color: #C1C5C8;
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

.btn-xl2 {
    color: #fff;
    background-color: #eb1946;
    border-color: #eb1946;
    font-family: 'Roboto', sans-serif;
    text-transform: uppercase;
    font-weight: 700;
    border-radius: 3px;
    font-size: 18px;
    padding: 7px 15px !important;
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
	width: 70px;
	height: 70px;
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


  </style>

@endsection

@section('content')

{{--<script>(function(d, s, id) {--}}
                      {{--var js, fjs = d.getElementsByTagName(s)[0];--}}
                      {{--if (d.getElementById(id)) return;--}}
                      {{--js = d.createElement(s); js.id = id;--}}
                      {{--js.src = "//connect.facebook.net/pt_PT/sdk.js#xfbml=1&version=v2.5&appId=948239501878979";--}}
                      {{--fjs.parentNode.insertBefore(js, fjs);--}}
                    {{--}(document, 'script', 'facebook-jssdk'));</script>--}}

<!-- Header -->

    @if(isset($isPublic) && $isPublic == 0)
<header>

            <div class="container">
                <div style="padding-top: 200px;padding-bottom: 200px;">
                    <h1>Private Challenge</h1>
                    <div class="intro-lead-in">


                            <p> Use the link sent to your email to access</p>

                    </div>

                </div>
            </div>


            </div>
        </header>

    @else

        <header>

            <div class="container">
                <div style="padding-top: 200px;padding-bottom: 200px;">
                    <h1>{{ $challenge->title }}</h1>

                    <div class="intro-lead-in"  style="    margin-top: 25px;">

                        @if(!$challenge->closed && $isValid)
                        <div class="col-sm-12 col-md-12">
                            <div id="clockdiv">
                              <div>
                                <span class="days"></span>
                                <div class="smalltext">DAYS</div>
                              </div>

                              <div>
                                <span class="hours"></span>
                                <div class="smalltext">HRS</div>
                              </div>
                              <div>
                                <span class="minutes"></span>
                                <div class="smalltext">MIN</div>
                              </div>
                              <div>
                                <span class="seconds"></span>
                                <div class="smalltext">SEC</div>
                              </div>
                            </div>
                           </div>
                        @elseif($challenge->closed)
                            <p> Challenge Closed!</p>
                        @else
                            <p> Challenge has ended!</p>
                        @endif
                    </div>

                    <div class="intro-lead-in"  style="    margin-top: 25px;">
                        <div>
                            @if( !$challenge->closed && $isValid && !$participating)
                                <button id="join" class="btn btn-xl btn-header" style="margin-bottom: 25px" >Accept challenge</button>
                            @endif
                            <div class="col-md-12" style="    margin-bottom: 25px;">

                            </div>
                            @if( Auth::check() && !$challenge->closed && $isValid && Auth::user()->id == $challenge->creator_id )
                                <div class="col-md-12" style="    margin-bottom: 65px;">
                                    {!! Form::open(array('action' => array('HomeController@closeChallenge', $challenge->uuid ), 'class' => 'form-horizontal, col-md-12')) !!}
                                        <input class="btn btn-xl" value="FINISH Challenge" type="submit">
                                    </form>
                                </div>
                            @endif
                        </div>
                        <div>
                            <span id="join_resposta"></span>
                        </div>

                    </div>




                </div>


            </div>
        </header>

        <section style="padding-top: 0px">
            <div class="container">
                <div class="row text-center">

                <div class="col-sm-12 col-md-12" style="margin-top: 30px">

                    <p>Created by: <a href="{{"/profile/".$challenge->creator_id}}">{{$creator}}</a></p>

                    <p style="color: #333; margin-bottom: 30px"> {{count($peopleParticipating)}} participants</p>
                        <ul class="ch-grid">
                            <?php $countFriends=0; ?>
                            @foreach ($peopleParticipating as $friend)
                                <?php $countFriends++; ?>

                                @if($countFriends == 6)
                                    <li class="show-friends">
                                        <div class="ch-item ch-img-1">
                                            <button type="button" class="btn btn-info btn-circle btn-xl2 friends"><i class="glyphicon glyphicon-plus"></i><span style="font-size: 40px;">{{count($peopleParticipating) - 5}}</span></button>
                                        </div>
                                    </li>
                                @endif
                                @if($friend->user_id > 0)

                                    <li class="{{$countFriends >= 6? "hide-friend" : "" }}">
                                        <div class="ch-item ch-img-1">
                                            @if($friend->photo == "")
                                                <img src="/uploads/users/default_user.png" alt="{{$friend->name}}" title="{{$friend->name}}" class="img-circle friends {{$countFriends >= 6? "hide-friend" : "" }}" style="height: 70px; width: 70px">
                                            @else
                                                <img src="{{'/uploads/users/'. $friend->photo }}" alt="{{$friend->name}}" title="{{$friend->name}}" class="img-circle friends {{$countFriends >= 6? "hide-friend" : "" }}" style="height: 70px; width: 70px">

                                            @endif
                                            <div class="ch-info">
                                                <p><a href="{{"/profile/".$friend->id}}">{{$friend->name}}</a></p>
                                            </div>


                                        </div>
                                    </li>
                                @else

                                    <li class="{{$countFriends >= 6? "hide-friend" : "" }}">
                                        <div class="ch-item ch-img-1">
                                            <img src="{{'https://graph.facebook.com/v2.5/'. $friend->facebook_id  .'/picture?width=100&height=100'}}"
                                            class=" img-circle friends ">
                                            <div class="ch-info">
                                                <p>Profile not available</p>
                                            </div>
                                        </div>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                </div>


                    <div class="col-sm-12 col-md-10 col-md-offset-1">
                    {{--{{"!challenge->closed:".!$challenge->closed}}--}}
                    {{--{{"isValid:".$isValid}}--}}
                    {{--{{"Auth::check():".Auth::check()}}--}}
                    {{--{{"Auth::user()->id :". Auth::user()->id}}--}}
                    {{--{{"challenge->creator_id :". $challenge->creator_id}}--}}
                        @if(!$challenge->closed && $isValid && Auth::check() && Auth::user()->id == $challenge->creator_id)
                            <div style="position: absolute;right: 0px;">
                                <a class="navbar-brand page-scroll" href="{{ action('HomeController@editChallenge', $challenge->uuid) }}">Edit</a>
                            </div>
                        @endif

                        <h2 class="text-capitalize" style="color: #333; margin-bottom: 30px">About the Challenge</h2>
                        <p style="font-size: 25px;">{!! nl2br(e($challenge->description)) !!}</p>

                        <a href="{{action('HomeController@showChallenges', $challenge->category)}}">#{{$challenge->category}}</a>
                    </div>

                    <div class="col-sm-12 col-md-10 col-md-offset-1" style="margin-top: 30px">

                        <p>Time to prove yourself. Share pictures or videos through #HIO #SelfMadeLegends #ChallengeAccepted</p>
                    </div>

                </div>
            </div>
        </section>


        <section class="bg-light-gray" id="portfolio">
            <div class="container" id="proofs">
                    @include('partials.multi_son_challenge')
            </div>
        </section>


        <div id="myModal" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
              </div>
              <div class="modal-body">
                {!! Form::open(array('action' => array('HomeController@uploadFile'), 'class' => 'dropzone','novalidate' => 'novalidate', 'id' => 'myAwesomeDropzone',
                                                                                                                  'files' => true)) !!}

                {{--<form action="/upload" class="dropzone">--}}
                {{ Form::hidden('challenge', $challenge->id) }}
                </form>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>

          </div>
        </div>






        <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Confirm Delete</h4>
                    </div>

                    <div class="modal-body">
                        <p>You are about to delete this proof, this procedure is irreversible.</p>
                        <p>Do you want to proceed?</p>
                        <p class="debug-url"></p>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-danger btn-ok btn-proof-delete">Delete</a>
                    </div>
                </div>
            </div>
        </div>

    @endif

@endsection

@section('footer')



    {{--<script src="https://rawgit.com/enyo/dropzone/master/dist/dropzone.min.js"></script>--}}
<script src="{{ asset('js/dropzone.min.js') }}"></script>

    @if(!isset($isPublic))
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

            //var deadline = new Date(Date.parse(new Date()) + 15 * 24 * 60 * 60 * 1000);



        var g = true;
        var h = '{{Auth::check()}}';
        var isLogin = $.parseJSON('{{Auth::check()? 'true': 'false'}}');

        $("#join").click(function(){


            if(!isLogin){
                $('#login_btn')[0].click();
            }else{
                $.ajax({
                    url: "{{ action('HomeController@joinChallenge', $challenge->uuid) }}",
                    type:"POST",
                    dataType : 'json',
                    data: { '_token': '{{ csrf_token() }}' },
                    success:function(data){
                       var success = data.status;
                       var messageText = data.message;
                       console.log("message:"+data.message);
                       console.log("messageText:"+messageText);
                       console.log("data:"+data);
                       if(success){

                            var uuid = "{{$challenge->id}}";
                            var url = '/challenge-proofs/'+uuid+'/?page='+currentPage;
                            getEndedChallenges(url);

                            $('#people').html(messageText);
                            $('#showmore').click(function () {
                                    $('#showmore').hide();
                                    $('#otherpeople').show();
                                });
                           $('#join_resposta').text('Join Success');
                           $( "#join" ).remove();
                       }else{
                       $('#join_resposta').text('Already joined');
                       }
                    },error:function(){
                        $('#join_resposta').text('Joining problem');
                    }
                }); //end of ajax
            }
            return false;
        });

        $(".show-friends").click(function(){
            $(".hide-friend").removeClass("hide-friend");
            $(".show-friends").hide();
        });


        $('#showmore').click(function () {
            $('#showmore').hide();
            $('#otherpeople').show();
        });

        var arr = '{{$challenge->deadLine}}'.split(/[- :]/);
        var deadline = new Date(arr[0], arr[1]-1, arr[2], arr[3], arr[4], arr[5]);
        {{--var deadline = new Date('{{$challenge->deadLine}}');--}}
        initializeClock('clockdiv', deadline);
        console.log(deadline);

        </script>


        <script>
            var currentPage = 1;
            $(document).ready(function() {
                    $(document).on('click', '.hio-paginate .pagination a', function (e) {
                        var uuid = "{{$challenge->id}}";
                        var url = '/challenge-proofs/'+uuid+'/?page='+$(this).attr('href').split('page=')[1];
                        currentPage = $(this).attr('href').split('page=')[1];
                        getEndedChallenges(url);
                        e.preventDefault();
                    });



                });
                function getEndedChallenges( url) {
                    $.ajax({
                        url : url,
                        dataType: 'json'
                    }).done(function (data) {
                        $('#proofs').html(data);
                    }).fail(function () {
                        alert('Posts could not be loaded.');
                    });
                }



        </script>


        @if(Auth::check())
            <script>
                Dropzone.options.myAwesomeDropzone = {
                  paramName: "file", // The name that will be used to transfer the file
                  maxFiles: 1, // MB
                  accept: function(file, done) {
                    if (file.name == "gg.jpg") {
                      done("Naha, you don't.");
                    }
                    else { done(); }
                  },
                  headers: {
                          'X-CSRFToken': $( "input[name='_token']" ).val()
                      },
                  init: function() {

                      this.on("uploadprogress", function(file, progress, bytesSent) {

                          console.log("p:"+ progress);
                            if(progress == 100){

                            }

                      });

                      this.on("success", function(file, response) {

                          //myModal
                          $('#myModal').modal('hide');


                        //$( "#proofs> .proof-item:nth-child(3)" )
                        var tamanho = $("#proofs > .proof-item").length;

                        if(tamanho >= 4){
                            $("#proofs> .proof-item:nth-child(4)" ).hide();
                        }

                        var challenge="";
                        challenge += "<div class=\"col-md-3 col-sm-6 portfolio-item proof-item\">";
                        challenge += "    <a href=\"/proof/{{$challenge->uuid}}/"+response.id+"\" class=\"portfolio-link container-add-prof\" title=\"\">";
                        challenge += "        <div class=\"portfolio-hover\">";
                        challenge += "            <div class=\"portfolio-hover-content\">";
                        challenge += "                <i class=\"fa fa-search-plus fa-3x\"><\/i>";
                        challenge += "            <\/div>";
                        challenge += "        <\/div>";
                        challenge += "        <img src=\"\/uploads\/challenge\/"+response.fileName+"\" class=\"img-responsive\"  style=\"    height: 100%;margin: 0 auto;object-fit: cover;\" alt=\"\">";
                        challenge += "    <\/a>";
                        challenge += "    <div class=\"portfolio-caption\">";
                        challenge += "        <p>By {{Auth::user()->name}}<\/p>";
                        challenge += "         <a href=\"#\" class=\"\" title=\"{{$challenge->title}}\">{{$challenge->title}}<\/a>";
                        challenge += "        <p>0 views<\/p>";
                        challenge += "            <div class=\"trash-proof\" data-id=\""+response.id+"\" data-target=\"#confirm-delete\" data-toggle=\"modal\">";
                        challenge += "                <i class=\"fa fa-trash\" aria-hidden=\"true\"><\/i>";
                        challenge += "            <\/div>";
                        challenge += "    <\/div>";
                        challenge += "<\/div>";




                        $( "#proofs> .proof-item:nth-child(1)" ).after(challenge)
                        $("#user_challenge").html(challenge);

                        });
                    }
                };


            </script>


            <script>
                $('#confirm-delete').on('show.bs.modal', function(e) {
                    $(".btn-proof-delete").click(function(){
                        $.ajax({
                            url: "/delete/proof/"+$(e.relatedTarget).data("id"),
                            type:"POST",
                            dataType : 'json',
                            data: { '_token': '{{ csrf_token() }}' },
                            success:function(data){
                               var success = data.status;
                               if(success){

                                    var tamanho = $("#proofs > .proof-item").length;
                                    //one item +
                                    if(tamanho == 1){
                                        currentPage--;
                                    }


                                    var uuid = "{{$challenge->id}}";
                                    var url = '/challenge-proofs/'+uuid+'/?page='+currentPage;

                                    getEndedChallenges(url);
                                    $('#confirm-delete').modal('hide');
                               }
                            },error:function(){
                            }
                        }); //end of ajax
                            return false;
                    });
                });
            </script>
        @endif
    @endif
@endsection


