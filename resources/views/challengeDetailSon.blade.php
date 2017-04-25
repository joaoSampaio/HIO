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






    {{--    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">--}}


    {{--<link href="{{ asset('css/s2-docs.css') }}" rel="stylesheet">--}}
    <link href="{{ asset('css/hio.css') }}" rel="stylesheet">

    @if($sonChallenge->type == 1)
        <meta property="og:image" content="{{ asset('uploads/challenge/'. pathinfo(asset('uploads/challenge/'. $sonChallenge->filename), PATHINFO_FILENAME) . '.jpg')  }}" />
    @else
        <meta property="og:image" content="{{ asset('uploads/challenge/'. $sonChallenge->filename)}}" />
    @endif
    <meta property="og:description" content="{{$sonChallenge->description}}" />

    <meta property="og:title" content="{{$sonChallenge->title}}" />

<link href="{{ asset('css/video-js.css') }}" rel="stylesheet">
{{--<link href="{{ asset('css/jTinder.css') }}" rel="stylesheet">--}}
<style>

.navbar-default {
    background-color: #222 !important;
    border-color: transparent;
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
        .take-all-space-you-can.active a{
                background-color: #f7f7f7 !important;
        }

        .nav-tabs {
            border-bottom: 0px solid #ddd;
        }



    .title-proof{
        font-size: 22pt;
        text-transform: uppercase;
        margin-top: 35px;
        text-align: center;
    }

    .primary{
        color: #eb1946;
    }

    .community-name{
        display: none !important;
    }




.parent {
    position: relative;
}

.parent .center-wrapper {
    position: absolute;
    left: 50%;
}

.parent .center-wrapper .center-content {
    position: relative;
    left: -50%;
}

.judge-info p{
font-size: 22px;text-align: center;
}

/*@media (min-width: 992px){*/
    /*.like{*/
        /*float: left;*/
    /*}*/
    /*.dislike{*/
        /*float: right;*/
    /*}*/
/*}*/

.alert-hio {
        background-color: #eee;
        border-color: #ddd;
}

#approved-logo.approved:after
{
    content:"Approved";
    position:absolute;
    top:70px;
    right:10px;
    z-index:1;
    font-family:Arial,sans-serif;
    -webkit-transform: rotate(45deg); /* Safari */
    -moz-transform: rotate(45deg); /* Firefox */
    -ms-transform: rotate(45deg); /* IE */
    -o-transform: rotate(45deg); /* Opera */
    transform: rotate(45deg);
    font-size:40px;
    color:#5cb767;
    /*background:#fff;*/
    border:solid 4px #5cb767;
    padding:5px;
    border-radius:5px;
    zoom:1;
    filter:alpha(opacity=20);
    opacity:0.5;
    -webkit-text-shadow: 0 0 2px #5cb767;
    text-shadow: 0 0 2px #5cb767;
    box-shadow: 0 0 2px #5cb767;
}

#approved-logo.rejected:after
{
    content:"Rejected";
    position:absolute;
    top:70px;
    right:10px;
    z-index:1;
    font-family:Arial,sans-serif;
    -webkit-transform: rotate(45deg); /* Safari */
    -moz-transform: rotate(45deg); /* Firefox */
    -ms-transform: rotate(45deg); /* IE */
    -o-transform: rotate(45deg); /* Opera */
    transform: rotate(45deg);
    font-size:40px;
    color:#c00;
    border:solid 4px #c00;
    padding:5px;
    border-radius:5px;
    zoom:1;
    filter:alpha(opacity=20);
    opacity:0.2;
    -webkit-text-shadow: 0 0 2px #c00;
    text-shadow: 0 0 2px #c00;
    box-shadow: 0 0 2px #c00;
}

.name-user-proof{
    font-size: 20px;
    color: rgb(64, 77, 87);
    font-weight: bold;
      line-height: 1.2;
      text-align: left;
      margin-bottom: 4px;
}
.date-proof{
    font-size: 16px;
    color: #acaeb0;
    font-weight: normal;
      line-height: 1.2;
      text-align: left;
      margin-bottom: 10px;
}

.proof-views {
  font-size: 16px;
  font-family: "Roboto";
  color: #b2b2b2;
  line-height: 1.945;
  text-align: left;
  font-weight: 400;

}


.vote-btn{
  text-transform: uppercase;
  line-height: 2.393;
  text-align: left;
  font-family: "Roboto";
  color: rgb(255, 255, 255);
  font-weight: bold;
  background-color: #eb1946;
  padding: 5px 20px;
}

.aprove-btn{
  text-transform: uppercase;
  line-height: 2.393;
  text-align: left;
  font-family: "Roboto";
  color: rgb(255, 255, 255);
  font-weight: bold;
  padding: 5px 20px;
}

.aprove-btn{
    background-color: #eb1946;
}
.dislike-btn{
    background-color: #b2b2b2;
}

.num-approve{
font-weight: 400;
font-size: 22px;
color: rgb(178, 178, 178);
text-align: center;
line-height: 1.296;
margin-top: 10px;

}

section{
    margin-top: 0px;
    padding-top: 0px;
    padding-bottom: 0px;
}
body:after {
    display: none;
}


.alert-xp{
position: absolute;
    margin: 0;
    top: -20px;
}

</style>

</head>

<body style="background-color: white">

    <!-- Portfolio Grid Section -->
    <section >
        <div class="container" id="list-proofs">
            <div class="row col-md-8 col-md-offset-2" style="    padding: 40px;" >

                <div class="col-lg-12 text-center {{$sonChallenge->judged == true? $sonChallenge->approved == true? 'approved': 'rejected' : 'nnn'}}" id="approved-logo"">

                    @if($sonChallenge->is_ready)

                        @if($sonChallenge->type == 1)

                            <video id="my-video" class="video-js vjs-fluid vjs-big-play-centered" controls preload="auto" width="100%" height="480"
                              poster="{{ asset('uploads/challenge/'. pathinfo(asset('uploads/challenge/'. $sonChallenge->filename), PATHINFO_FILENAME) . '.jpg')  }}" data-setup="{}" style="width: 100%">
                                <source src="{{ asset('uploads/challenge/'. $sonChallenge->filename)}}" type='video/mp4'>
                                <p class="vjs-no-js">
                                  To view this video please enable JavaScript, and consider upgrading to a web browser that
                                  <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
                                </p>
                              </video>

                        @else
                            <img src="{{ asset('uploads/challenge/'. $sonChallenge->filename)}}" class="img-responsive"  style="    height: 100%;margin: 0 auto;" alt="">

                        @endif

                    @else
                        <div class="alert alert-info col-sm-12 col-md-6 col-md-offset-3">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                             <p>Your video is being converted. It will be available soon.</p>
                            <p>This page will refresh when the video is available.</p>
                        </div>

                    @endif

                </div>

            <div class="col-xs-12 col-md-12" style="margin-bottom: 20px;margin-top: 40px;">

                <div>
                    <a style="padding-top: 0px; float: left;margin-right: 25px;" href="{{"/profile/".$sonChallenge->user_id}}">
                        <img src="{{'/user/photo/'. $sonChallenge->user_id }}" alt="{{$sonChallenge->name}}" title="{{$sonChallenge->name}}" class="img-circle" style="height: 50px; width: 50px">
                    </a>

                    <div style="float: left">
                        <p class="name-user-proof">{{getFirstLastName($sonChallenge->name)}}</p>
                        <p class="date-proof"><span class="">{{$sonChallenge->created_at}}</span></p>
                        <p class="proof-views">
                            <span>{{$userViews}}<i class="fa fa-eye pointer " style="margin-left: 5px" ></i></span>

                            <span style="float: right">
                                <span class="disqus-comment-count" data-disqus-identifier="{{$sonChallenge->uuid . " ".$sonChallenge->id}}"></span><i class="fa fa-comments pointer " style="margin-left: 5px" ></i>
                            </span>
                        </p>
                    </div>

                    @if($sonChallenge->judgment != NULL)
                        <div style="float: right" data-voted-{{$sonChallenge->id}}="{{($sonChallenge->judgment != NULL && $sonChallenge->judgment == 1)? "1" : "-1"}}">
                    @else
                        <div style="float: right" data-voted-{{$sonChallenge->id}}="0">
                    @endif
                         @if(Auth::check() && $sonChallenge->user_id == Auth::user()->id)
                            <div style="float: left;margin-right: 20px;">
                                <p class="num-approve">Your proof</p>
                            </div>
                         @else


                            <div style="float: left;margin-right: 20px;position: relative;">
                                <div class="badge alert-xp xp-like" style="display: none">
                                      <span>+25 XP</span>
                                </div>
                                <button class="btn vote-btn aprove-btn like" data-proof-id="{{$sonChallenge->id}}"><i class="fa fa-trophy" style="margin-right: 5px" aria-hidden="true"></i> Aproved</button>
                                <p class="num-approve"><span id="like-count-{{$sonChallenge->id}}" >{{$sonChallenge->positive}}</span></p>
                            </div>
                            <div style="float: right;position: relative;">
                                <div class="badge  alert-xp xp-dislike" style="display: none">
                                      <span>+25 XP</span>
                                </div>
                                <button class="btn vote-btn dislike-btn dislike" style="float: initial;" data-proof-id="{{$sonChallenge->id}}"><i class="fa fa-thumbs-down" style="margin-right: 5px" aria-hidden="true"></i> Not Yet</button>
                                <p class="num-approve"><span id="dislike-count-{{$sonChallenge->id}}">{{$sonChallenge->negative}}</span></p>
                            </div>
                        @endif
                    </div>
                </div>

            </div>

        </div>
        </div>
    </section>




    <section style="margin-top: 0px;" class="bg-light-gray" id="portfolio">
        <div class="container" id="comment">
            <div class="" >


                {{--<div class="col-sm-12 col-md-12 text-center">--}}
                    {{--<div class="fb-comments" data-href="http://hio.mobilebysampaio.eu/proof/{{$sonChallenge->uuid}}/{{$sonChallenge->user_id}}" data-numposts="6"></div>--}}
                {{--</div>--}}


                <div id="disqus_thread"></div>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
                <script id="dsq-count-scr" src="//hiolegends.disqus.com/count.js" async></script>
                <script>

                /**
                *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/




                @if(Auth::check())

                var disqus_config = function () {
//                this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
                this.page.identifier = '{{$sonChallenge->uuid . " ".$sonChallenge->id}}'; // Replace PAGE_IDENTIFIER with your page's unique identifier variable

                this.page.api_key = '{{$pub_key}}';
                this.page.remote_auth_s3 = '{{$message. " " . $hmac. " " . $timestamp}}';
                this.callbacks.onNewComment = [function(comment) {
                		console.log(JSON.stringify(comment));
                			$.post('{{URL::action('HomeController@addCommentCallback')}}', { proofId: '{{$sonChallenge->id}}', text: comment.text }, function(result){
                			});

                		}];
                };




                @endif

                (function() { // DON'T EDIT BELOW THIS LINE
                var d = document, s = d.createElement('script');
                s.src = '//hiolegends.disqus.com/embed.js';
                s.setAttribute('data-timestamp', +new Date());
                (d.head || d.body).appendChild(s);
                })();
                </script>
                <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>



            </div>
        </div>
    </section>


</body>

<script src="{{ asset('js/video.js') }}"></script>
<script>



    function like(e){
        var id = $(e.currentTarget).data("proof-id");
        if($('[data-voted-'+id+'= 0]').length > 0 || $('[data-voted-'+id+'= -1]').length > 0){
            $.post("/judge/proof",
                {
                    proof_id: $(e.currentTarget).data("proof-id"),
                    value: 1
                },
                function(data, status){

                    $('[data-proof-id=' + id + ']').removeClass("active");
                    $(e.currentTarget).addClass("active");

                    if($('[data-voted-'+id+'= 0]').length > 0){
                        $('#like-count-'+id).html(parseInt($('#like-count-'+id).html())+1);
                        $('[data-voted-'+id+'= 0]').attr( "data-voted-"+id, 1 );
                    } else if($('[data-voted-'+id+'= -1]').length > 0){
                        $('#like-count-'+id).html(parseInt($('#like-count-'+id).html())+1);
                        $('#dislike-count-'+id).html(parseInt($('#dislike-count-'+id).html())-1);
                        $('[data-voted-'+id+'= -1]').attr( "data-voted-"+id, 1 );
                    }
                    if(data.is_new)
                    $(".xp-like").slideDown(500).delay(2000).slideUp(500);
                });
        }
    }

    function dislike(e){
        var id = $(e.currentTarget).data("proof-id");
        if($('[data-voted-'+id+'= 0]').length > 0 || $('[data-voted-'+id+'= 1]').length > 0){
            $.post("/judge/proof",
                {
                    proof_id: $(e.currentTarget).data("proof-id"),
                    value: 0
                },
                function(data, status){

                var success = data.status;
                if(success){

                    $('[data-proof-id=' + id + ']').removeClass("active");
                    $(e.currentTarget).addClass("active");

                    if($('[data-voted-'+id+'= 0]').length > 0){
                        $('#dislike-count-'+id).html(parseInt($('#dislike-count-'+id).html())+1);
                        $('[data-voted-'+id+'= 0]').attr( "data-voted-"+id, -1 );
                    } else if($('[data-voted-'+id+'= 1]').length > 0){
                        $('#like-count-'+id).html(parseInt($('#like-count-'+id).html())-1);
                        $('#dislike-count-'+id).html(parseInt($('#dislike-count-'+id).html())+1);
                        $('[data-voted-'+id+'= 1]').attr( "data-voted-"+id, -1 );
                    }
                    if(data.is_new)
                        $(".xp-dislike").slideDown(500).delay(2000).slideUp(500);
                    }
                });
        }
    }

    $(".like").delay( 800 ).click(like);
    $(".dislike").delay( 800 ).click(dislike);


@if(!$sonChallenge->is_ready)

var refreshIntervalId;
function checkStatus(){
    $.ajax({
       url: "{{action('SonChallengeController@isProofReady', [ 'uuid' => $sonChallenge->uuid, 'file_id'=>$sonChallenge->id])}}",
       type:"GET",
       dataType : 'json',
       success:function(data){
           var success = data.status;
           console.log("success:" + success);
           if(success){
            //stop
            clearInterval(refreshIntervalId);
            location.reload();
           }else{

           }
       },error:function(){
       }
    });
}

$(document).ready(function() {
    refreshIntervalId = setInterval(function(){
      checkStatus();
    }, 5000);
});


@endif




</script>


