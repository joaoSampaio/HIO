@extends('app')

@section('header')
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


.btn_approve {
    float: left;
     display: block;
     background-color: #f7f7f7;
     background-image: -webkit-gradient(linear, left top, left bottom, from(#f7f7f7), to(#e7e7e7));
    background-image: -webkit-linear-gradient(top, #f7f7f7, #e7e7e7);
    background-image: -moz-linear-gradient(top, #f7f7f7, #e7e7e7);
    background-image: -ms-linear-gradient(top, #f7f7f7, #e7e7e7);
    background-image: -o-linear-gradient(top, #f7f7f7, #e7e7e7);
     color: #a7a7a7;
    margin: 15px;
    width: 80px;
    height: 80px;
     position: relative;
     text-align: center;
     line-height: 100px;
    border-radius: 50%;
    outline: none;
    box-shadow: 0px 3px 8px #aaa, inset 0px 2px 3px #fff;
}

.btn_approve:hover{
  text-decoration: none;
  color: #555;
  background: #f5f5f5;
}
.btn_approve i {
    display: inline-block;
    width: 40px;
    height: 80px;
        font-size: 45px;
}

.like{
color: #5cb767;
}

.dislike{
color: #ff720e;
float: right;
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

</style>

@endsection

@section('content')

<!-- Header -->

{{--<script>(function(d, s, id) {--}}
                      {{--var js, fjs = d.getElementsByTagName(s)[0];--}}
                      {{--if (d.getElementById(id)) return;--}}
                      {{--js = d.createElement(s); js.id = id;--}}
                      {{--js.src = "//connect.facebook.net/pt_PT/sdk.js#xfbml=1&version=v2.5&appId=948239501878979";--}}
                      {{--fjs.parentNode.insertBefore(js, fjs);--}}
                    {{--}(document, 'script', 'facebook-jssdk'));</script>--}}



{{--{{$sonChallenge->id_challenge}}--}}
    <!-- Portfolio Grid Section -->
    <section  style="margin-top: 80px">
        <div class="container">
            <div class="row" >
                <div class="col-lg-12 {{$sonChallenge->judged == true? $sonChallenge->approved == true? 'approved': 'rejected' : 'nnn'}}" id="approved-logo">
                    <div style=" font-size: 22pt;">
                        <a href="/challenge/{{$sonChallenge->uuid}}" class="" title="{{$sonChallenge->title}}" style="color: #333;text-decoration: none;">
                            <i class="fa fa-chevron-circle-left" style=" font-size: 44pt;vertical-align: middle;" aria-hidden="true"></i>   Back to
                            <a href="/challenge/{{$sonChallenge->uuid}}" class="" title="{{$sonChallenge->title}}">{{$sonChallenge->title}}</a>
                        </a>
                    </div>

                </div>
                <div class="col-lg-12 text-center">

                    @if($sonChallenge->is_ready)

                        @if($sonChallenge->type == 1)

                            <video id="my-video" class="video-js vjs-big-play-centered" controls preload="auto" width="100%" height="480"
                              poster="{{ asset('uploads/challenge/'. pathinfo(asset('uploads/challenge/'. $sonChallenge->filename), PATHINFO_FILENAME) . '.jpg')  }}" data-setup="{}" style="width: 100%">
                                <source src="{{ asset('uploads/challenge/'. $sonChallenge->filename)}}" type='video/mp4'>
                                {{--<source src="MY_VIDEO.webm" type='video/webm'>--}}
                                <p class="vjs-no-js">
                                  To view this video please enable JavaScript, and consider upgrading to a web browser that
                                  <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
                                </p>
                              </video>


                            {{--<video width="100%" controls>--}}
                              {{--<source src="{{ asset('uploads/challenge/'. $sonChallenge->filename)}}" type="video/mp4">--}}
                            {{--Your browser does not support the video tag.--}}
                            {{--</video>--}}
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


                @if($canApprove)
                <div class="col-md-12 col-xs-12" id="approve">

                     <div class="col-md-12 col-xs-12 judge-info alert-hio">
                         <p>You are the judge!</p>
                         <p style="font-size: 16px">Has {{getFirstLastName($sonChallenge->name)}} achieved the goal of the challenge or did it come short, you decide!</p>

                        <div class="col-xs-6 col-md-6" style="margin-bottom: 20px;">
                            <a href="#" class="btn_approve dislike"><i class="fa fa-meh-o " aria-hidden="true"></i></a>
                            {{--<button type="button" onclick="goBack()" class="btn btn-default btn-xl btn-cancel-hio" id="back_control">Back</button>--}}
                        </div>

                        <div class="col-xs-6 col-md-6">
                            {{--<button form="form1" type="submit" class="btn btn-primary btn-xl btn-create-hio" id="next_control">Save Changes</button>--}}
                            <a href="#" class="btn_approve like"><i class="fa fa-sign-language btn-create-hio" aria-hidden="true"></i></a>
                        </div>
                     </div>




                </div>
                @endif
                {{--<div class="col-lg-12 parent" style="    margin-bottom: 120px;">--}}
                    {{--<div class="center-wrapper">--}}
                        {{--<div class="center-content alert alert-info">--}}
                                {{--<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>--}}
                                 {{--<p>Your video is being converted. It will be available soon.</p>--}}
                                {{--<a href="#" class="btn_approve dislike"><i class="fa fa-meh-o" aria-hidden="true"></i></a>--}}
                                                            {{--<a href="#" class="btn_approve like"><i class="fa fa-sign-language" aria-hidden="true"></i></a>--}}

                        {{--</div>--}}
                    {{--</div>--}}

                {{--</div>--}}

                <div class="col-lg-12 title-proof">
                    <a href="{{"/profile/".$sonChallenge->user_id}}" class="" title="" style="color: #333;text-decoration: none;">{{$sonChallenge->name }}
                    </a>
                    <a href="/challenge/{{$sonChallenge->uuid}}" class="" title="{{$sonChallenge->title}}">{{$sonChallenge->title}}</a>



                    <i id="vote" class="fa {{$hasLiked? 'fa-heart' : 'fa-heart-o pointer'}} primary" style="margin-left: 50px;margin-right: 15px;"></i><span id="likes_num">{{$sonChallenge->likes}}</span>

                    <i class="fa fa-eye primary" style="margin-left: 35px;margin-right: 15px;"></i> <span style="text-transform: none;">{{$userViews}} Views</span>
                </div>

            </div>













            {{--<div class="challenges">--}}
                {{--@include('partials.challenge')--}}
            {{--</div>--}}

        </div>
    </section>




    <section class="bg-light-gray" id="portfolio">
        <div class="container">
            <div class="row">


                {{--<div class="col-sm-12 col-md-12 text-center">--}}
                    {{--<div class="fb-comments" data-href="http://hio.mobilebysampaio.eu/proof/{{$sonChallenge->uuid}}/{{$sonChallenge->user_id}}" data-numposts="6"></div>--}}
                {{--</div>--}}


                <div id="disqus_thread"></div>
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


@endsection

@section('footer')
<script src="{{ asset('js/video.js') }}"></script>
<script>


@if($canApprove)
$(".like").unbind().click(function(event){
    event.preventDefault();
    $.post("/judge/proof",
    {
        proof_id: {{$sonChallenge->id}},
        value: 1
    },
    function(data, status){
        $('#approve').hide();
//        alert("Data: " + data + "\nStatus: " + status);
    });
});

$(".dislike").unbind().click(function(event){
    event.preventDefault();
    $.post("/judge/proof",
    {
        proof_id: {{$sonChallenge->id}},
        value: 0
    },
    function(data, status){
        $('#approve').hide();
//        alert("Data: " + data + "\nStatus: " + status);
    });
});
@endif

@if(!$hasLiked)
    $("#vote").unbind().click(function(){
        $.ajax({
            url: "{{ action('SonChallengeController@likeFile', $sonChallenge->id) }}",
            type:"POST",
            dataType : 'json',
            data: { '_token': '{{ csrf_token() }}' },
            success:function(data){
               var success = data.status;
               if(success){
                    var countVotes = data.count;
                    console.log("count:" + countVotes);
                    if(countVotes != null) {
                        $("#likes_num").text(countVotes + "");
                        $("#vote").removeClass('fa-heart-o');
                        $("#vote").removeClass('pointer');
                        $("#vote").addClass('fa-heart');

                    }

               }
            },error:function(){
                //console.log("count:" + countVotes);
            }
        }); //end of ajax
            return false;
        });
@endif


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


@endsection