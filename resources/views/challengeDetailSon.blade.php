@extends('app')

@section('header')

    @if($sonChallenge->type == 1)
        <meta property="og:image" content="{{ asset('uploads/challenge/'. pathinfo(asset('uploads/challenge/'. $sonChallenge->filename), PATHINFO_FILENAME) . '.jpg')  }}" />
    @else
        <meta property="og:image" content="{{ asset('uploads/challenge/'. $sonChallenge->filename)}}" />
    @endif
    <meta property="og:description" content="{{$sonChallenge->description}}" />

    {{--<meta property="og:url"content="http://www.coachesneedsocial.com/coacheswisdomtelesummit/" />--}}

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
        <div class="container" id="list-proofs">
            <div class="row col-md-8 col-md-offset-2" >
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

                            <video id="my-video" class="video-js vjs-fluid vjs-big-play-centered" controls preload="auto" width="100%" height="480"
                              poster="{{ asset('uploads/challenge/'. pathinfo(asset('uploads/challenge/'. $sonChallenge->filename), PATHINFO_FILENAME) . '.jpg')  }}" data-setup="{}" style="width: 100%">
                                <source src="{{ asset('uploads/challenge/'. $sonChallenge->filename)}}" type='video/mp4'>
                                {{--<source src="MY_VIDEO.webm" type='video/webm'>--}}
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

                <div class="col-xs-12 col-md-12" style="margin-bottom: 20px;padding: 0px;">


                    @if($sonChallenge->judgment != NULL)
                        <p class="post-meta" data-voted-{{$sonChallenge->id}}="{{($sonChallenge->judgment != NULL && $sonChallenge->judgment == 1)? "1" : "-1"}}">
                    @else
                        <p class="post-meta" data-voted-{{$sonChallenge->id}}="0">

                            @endif
                            <a class="badge-evt point">
                                <span id="like-count-{{$sonChallenge->id}}" class="badge-item-like-count">{{$sonChallenge->positive}}</span> Up</a> ·
                            <a class="badge-evt point">
                                <span id="dislike-count-{{$sonChallenge->id}}" class="badge-item-dislike-count">{{$sonChallenge->negative}}</span> Down</a> ·

                            <a class="badge-evt point">
                                <span id="dislike-count-{{$sonChallenge->id}}" class="badge-item-dislike-count">{{$userViews}}</span> Views</a> ·

                            <a class="comment badge-evt" href="#comment">0 comments</a> ·

                            <a class="badge-evt point">
                                <span class="">Created on {{$sonChallenge->created_at}}</span></a>
                        </p>
                </div>

                <div class="col-md-12 col-xs-12" style="margin-bottom: 20px;padding: 0px;">

                    @if(Auth::check() && $sonChallenge->user_id != Auth::user()->id)

                    <p>You are the judge!</p>
                    <p style="font-size: 16px">Do you Approve
                        <a href="{{"/profile/".$sonChallenge->user_id}}" class="" title="" style="color: #333;text-decoration: underline;">{{getFirstLastName($sonChallenge->name)}}</a>
                        ´s challenge or is it a Fail?
                    </p>
                    @endif


                    <div class="badge-item-vote-container post-afterbar-a in-list-view  " style="width: 100%">
                        <div class="vote">
                            <ul class="btn-vote left">
                                {{--@if(false)--}}
                                @if(Auth::check() && $sonChallenge->user_id == Auth::user()->id)
                                    <li><a href="{{ action('SonChallengeController@showSonChallenge', [ 'uuid' => $sonChallenge->uuid, 'user_id'=>$sonChallenge->id]) }}" class="your-proof">Your proof</a></li>
                                @else
                                    <li><a href="javascript:void(0);" class="badge-item-vote-up up like {{($sonChallenge->judgment != NULL && $sonChallenge->judgment == 1)? "active" : ""}}" data-proof-id="{{$sonChallenge->id}}">Upvote</a></li>
                                    <li><a href="javascript:void(0);" class="badge-item-vote-down down dislike {{($sonChallenge->judgment != NULL && $sonChallenge->judgment == -1)? "active" : ""}}" data-proof-id="{{$sonChallenge->id}}">Downvote</a></li>
                                @endif
                                <li><a class="comment badge-evt badge-item-comment" href="#comment">Comment</a></li>

                            </ul>
                        </div>
                        <div class="share right">
                            <ul>
                                <li><a href="javascript:void(0);" class="badge-facebook-share badge-evt badge-track btn-share facebook" data-track="social,fb.s,,,d,aebrrNQ,l" data-evt="PostList,ShareSocial,Fresh,,FacebookButton" data-entry-id="aebrrNQ" data-position="9" data-share="http://9gag.com/gag/aebrrNQ?ref=fb.s" rel="nofollow">Facebook</a></li>

                                <li><a href="javascript:void(0);" class="badge-twitter-share badge-evt badge-track btn-share twitter" data-track="social,t.s,,,d,aebrrNQ,l" data-evt="PostList,ShareSocial,Fresh,,TwitterButton" data-title="How%20I%20feel%20after%20watching%20HIMYM%20or%20any%20other%20good%20show" data-entry-id="aebrrNQ" data-position="9" data-share="http://9gag.com/gag/aebrrNQ?ref=t" rel="nofollow">Twitter</a>
                                </li>
                            </ul>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                     {{--<div class="col-md-12 col-xs-12 judge-info alert-hio" id="list-proofs">--}}


                        {{----}}
                     {{--</div>--}}
                </div>

                {{--<div class="col-lg-12 col-md-12 col-xs-12 title-proof">--}}
                    {{--<a href="{{"/profile/".$sonChallenge->user_id}}" class="" title="" style="color: #333;text-decoration: none;">{{$sonChallenge->name }}--}}
                    {{--</a>--}}
                    {{--<a href="/challenge/{{$sonChallenge->uuid}}" class="" title="{{$sonChallenge->title}}">{{$sonChallenge->title}}</a>--}}



                    {{--<i id="vote" class="fa {{$hasLiked? 'fa-heart' : 'fa-heart-o pointer'}} primary" style="margin-left: 50px;margin-right: 15px;"></i><span id="likes_num">{{$sonChallenge->likes}}</span>--}}

                    {{--<i class="fa fa-eye primary" style="margin-left: 35px;margin-right: 15px;"></i> <span style="text-transform: none;">{{$userViews}} Views</span>--}}
                {{--</div>--}}

            </div>













            {{--<div class="challenges">--}}
                {{--@include('partials.challenge')--}}
            {{--</div>--}}

        </div>
    </section>




    <section class="bg-light-gray" id="portfolio">
        <div class="container" id="comment">
            <div class="row" >


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


@endsection