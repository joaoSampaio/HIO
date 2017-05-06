@extends('app')

@section('header')

    <meta property="og:image" content="{{ asset('img/categories/'.nameToUrl($challenge->category))}}" />

    <meta property="og:description" content="{{$challenge->description}}" />
    <meta property="og:title" content="{{$challenge->title}}" />

<link href="{{ asset('css/dropzone.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/magnific-popup.css') }}" rel="stylesheet">
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

  </style>

@endsection

@section('content')

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
    </header>

    @else

        <header>
            <div class="container">
                <div style="padding-top: 200px;padding-bottom: 200px;">
                    <h1 class="challenge-title">{{ $challenge->title }}</h1>
                    <div class="intro-lead-in"  style="    margin-top: 55px;">

                        @if(!$challenge->closed && $isValid)

                        <h3 class="challenge-subtitle">You still have</h3>

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


                    <div class="col-sm-12 col-md-10 col-md-offset-1" style="margin-top: 50px">

                        <h2 class="text-capitalize" style="color: #333; margin-bottom: 30px;font-size: 36px;font-weight: 400;">About the Challenge</h2>
                        <p style="font-size: 16px;font-weight: 400;">{!! nl2br(e($challenge->description)) !!}</p>


                        @if($challenge->public == 0)
                            <span  style="font-size: 16px;font-weight: 600;">Reward</span>
                            <p  style="font-size: 16px;font-weight: 400;">{!! nl2br(e($challenge->reward)) !!}</p>

                            <span  style="font-size: 16px;font-weight: 600;">Penalty</span>
                            <p  style="font-size: 16px;font-weight: 400;">{!! nl2br(e($challenge->penalty)) !!}</p>
                        @endif

                        <a href="{{action('HomeController@showChallenges', $challenge->category->name)}}">#{{$challenge->category->name}}</a>

                        @if(!$challenge->closed && $isValid && Auth::check() && Auth::user()->id == $challenge->creator_id)
                            <p><a class="btn edit-btn" href="{{ action('HomeController@editChallenge', $challenge->uuid) }}">Edit</a></p>
                        @endif
                    </div>
                </div>
            </div>
        </section>

        <section id="friends-section" style="background-color: #e7eaed">
            <ul class="ch-grid" id="participants-list">
                <?php $countFriends=0; ?>
                @foreach ($peopleParticipating as $friend)
                    <?php $countFriends++; ?>

                    @if($countFriends == 6)
                        <li class="show-friends">
                            <div class="ch-item ch-img-1">
                                <button type="button" class="btn btn-circle btn-show-all-participants friends"><span class="plus-sign"></span></button>
                                {{--<a href="#" class="plus-sign"></a>--}}
                            </div>

                        </li>
                    @endif

                    <li class="{{$countFriends >= 6? "hide-friend" : "" }}">
                        <div class="ch-item ch-img-1">
                            <a href="{{"/profile/".$friend->user_id}}">
                                <img src="{{'/user/photo/'. $friend->user_id }}" alt="{{$friend->name}}" title="{{$friend->name}}" class="img-circle profile-participant friends {{$countFriends >= 6? "hide-friend" : "" }}">
                            </a>
                        </div>
                    </li>

                @endforeach
            </ul>
            <p class="text-center people-participating" >{!!$people!!}</p>

        </section>

        <section class="bg-light-gray bg-text" data-bg-text="Proofs">
            <div class="container" >

                <div class="col-sm-12 col-xs-12 col-lg-12" >
                    <h2 class="wall-fame-title">Uploaded Proofs</h2>

                    @if($sonChallenges->total() == 0 || $sonChallenges->firstItem() == NULL ||
                    ($sonChallenges->total() == 1 && $sonChallenges[0]->id == -1) )
                        <h3 class="wall-fame-subtitle">No proofs uploaded yet!</h3>
                    @endif
                    {{--{{$sonChallenges->total()}}--}}
                    {{--{{$sonChallenges->firstItem() == NULL ? "e null" : "nao e"}}--}}
                    {{--{{json_encode($sonChallenges)}}--}}

                </div>
                <div class="col-sm-12 col-xs-12 col-lg-12" id="proofs">
                    @include('partials.multi_son_challenge')
                </div>
            </div>
        </section>




    @endif

@endsection

@section('modal')

    <div id="myModal" class="modal fade" style="padding: 0px !important;" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header" style="    padding: 30px 15px 0px;">
                <button type="button" class="close close-new" data-dismiss="modal">&#10005;</button>
                <h4 class="modal-title upload-file-title">Upload  proof</h4>
              </div>
              <div class="modal-body" style="    text-align: center;    padding-top: 40px;">

                <span class="upload-subtitle">Drop your media here or choose file.</span>
                {!! Form::open(array('action' => array('SonChallengeController@uploadFile'), 'class' => 'dropzone ','novalidate' => 'novalidate', 'id' => 'myAwesomeDropzone',
                                                                                                                  'files' => true)) !!}

                    <div id="dropzonePreview" class="dropzonebg pointer">

                        <div id="proofs-upload-layout">
                            <img id="img-icon-upload" src="/img/icon_upload.png">
                            <div class="dz-message hidden" data-dz-message></div>
                            <br>
                            <button type="button" class="btn btn-file">Choose file</button>
                        </div>
                        <div id="proofs-upload-list"></div>

                    </div>

                    <div class="form-group">

                        <div class="col-md-8 col-md-offset-2 col-xs-12">
                            {!! Form::text('description', null,array('required', 'data-validation'=>'required', 'data-parsley-required-message'=>'*information required', 'class'=>'form-control create-input', 'placeholder'=>'Description')) !!}
                        </div>

                    </div>

                    <button id="upload-proof-btn" disabled class="btn btn-xl btn-header btn-upload" >Upload</button>


                {{--<form action="/upload" class="dropzone">--}}
                {{ Form::hidden('challenge', $challenge->id) }}
                </form>

              </div>
              {{--<div class="modal-footer">--}}
                {{--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>--}}
              {{--</div>--}}
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


        <div class="modal fade" id="upload-video-msg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Converting Video</h4>
                    </div>

                    <div class="modal-body">
                        <p>Your video is beeing converted. It will be available soon.</p>
                        <p>You can close this page and return in a few minutes.</p>
                        <p class="debug-url"></p>
                    </div>


                </div>
            </div>
        </div>

@endsection

@section('footer')

<script src="/js/jquery.magnific-popup.min.js"></script>
<script type="text/javascript">
  function enableProofSlider(){
    $('.open-iframe').magnificPopup({
      disableOn: 0,
      type: 'iframe',
      mainClass: 'mfp-fade',
      removalDelay: 160,
      preloader: false,
      gallery: {
        enabled: true,
        navigateByImgClick: true,
        preload: [0,1] // Will preload 0 - before current, and 1 after the current image
      },
      fixedContentPos: false
    });
  }
  $(document).ready(function() {
      enableProofSlider();
    });
</script>

    {{--<script src="https://rawgit.com/enyo/dropzone/master/dist/dropzone.min.js"></script>--}}
<script src="{{ asset('js/dropzone.min.js') }}"></script>

    @if(!isset($isPublic))
        @if($isValid)
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
                       if(success){
                            var uuid = "{{$challenge->id}}";
                            var url = '/challenge-proofs/'+uuid+'/?page='+currentPage;
                            getEndedChallenges(url);

                            $('#people').html(messageText);
                            $('#showmore').click(function () {
                                    $('#showmore').hide();
                                    $('#otherpeople').show();
                                });
                           $('#join_resposta').text('You are now taking this challenge');
                           $( "#join" ).remove();
                           addUserToParticipants();
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

        function addUserToParticipants() {
            @if(Auth::check())
                var userprofile="";
                userprofile += "<li> <div class=\"ch-item ch-img-1\">";
                userprofile += "<a href=\"{{'/profile/'.Auth::user()->id}}\">";
                userprofile += "<img src=\"{{'/user/photo/'. Auth::user()->id }}\"  class=\"img-circle profile-participant friends \">";
                userprofile += "<div class=\"ch-info\">";
                userprofile += "<\/a><\/div><\/li>";
                $("#participants-list").append(userprofile);
            @endif
        }

        var arr = '{{$challenge->deadLine}}'.split(/[- :]/);
        var deadline = new Date(arr[0], arr[1]-1, arr[2], arr[3], arr[4], arr[5]);
        initializeClock('clockdiv', deadline);
        console.log(deadline);

        </script>
        @endif

        <script>
            $(".show-friends").click(function(){
                $(".hide-friend").removeClass("hide-friend");
                $(".show-friends").hide();
            });
            $('#showmore').click(function () {
                $('#showmore').hide();
                $('#otherpeople').show();
            });
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
                  autoProcessQueue: false,
                  clickable:'#dropzonePreview',
                  previewsContainer:'#dropzonePreview',
                  accept: function(file, done) {
                    if (file.name == "gg.jpg") {
                      done("Naha, you don't.");
                    }
                    else { done(); }
                  },
                  addRemoveLinks:true,
                  headers: {
                          'X-CSRFToken': $( "input[name='_token']" ).val()
                      },
                  init: function() {

                    var submitButton = $('#upload-proof-btn');
                    var myDropzone = this; // closure

                    submitButton.click( function(e) {
                        e.preventDefault();
                        e.stopPropagation();
                      myDropzone.processQueue(); // Tell Dropzone to process all queued files.
                    });

                    // You might want to show the submit button only when
                    // files are dropped here:
                    this.on("addedfile", function() {
                      // Show submit button here and/or inform user to click it.
                      $('#proofs-upload-layout').hide();
                      $('#upload-proof-btn').prop("disabled",false);


                    });
                    this.on("removedfile", function(file) {
                        $('#proofs-upload-layout').show();
                     });

                      this.on("uploadprogress", function(file, progress, bytesSent) {

                      });

                      this.on("success", function(file, response) {

                          $('#myModal').modal('hide');
                          $('.wall-fame-subtitle').hide();
                          myDropzone.removeFile(file);

                        var tamanho = $("#proofs > .proof-item").length;
                        if(tamanho >= 6){
                            $("#proofs> .proof-item:nth-child(5)" ).hide();
                        }
                        $( "#proofs> .proof-item").first().after(response.html);
                        });
                    }
                };


            </script>


            <script>
                $('#confirm-delete').on('show.bs.modal', function(e) {
                    $(".btn-proof-delete").unbind().click(function(){
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


