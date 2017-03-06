@extends('app')

@section('header')
<link href="{{ asset('css/video-js.css') }}" rel="stylesheet">
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

#tinderslide li{
position: inherit;
}

#tinderslide li.pane1 {
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    transform: rotate(0deg);
}



#list-proofs article {
    margin-bottom: 30px;
    border-top: 1px solid #eee;
    padding: 20px 0 0;
}


#list-proofs .header-list-proofs {
    margin-bottom: 10px;
    position: relative;

}

#list-proofs h2 {

    text-transform: inherit;
    font-weight: bold;
}

#list-proofs h2 a {
    font-size: 20px;
    color: #000;

}

#list-proofs .post-container {
    width: 500px;
    position: relative;
}

#list-proofs .post-container a img {
    display: block;
    width: 500px;
    border: 0;
}

#list-proofs p.post-meta {
    color: #999;
    margin: 10px 0;
}

#list-proofs p.post-meta a {
    color: #999;
    font-weight: 400;
}

#list-proofs .post-afterbar-a.in-list-view {
    width: 500px;
}

#list-proofs .post-afterbar-a {
    margin: 10px 0;
    padding-bottom: 0;
}
#list-proofs .badge-toolbar-pre, .post-afterbar-a {
    position: relative;
}

.left {
    float: left!important;
}

#list-proofs .btn-vote {
    overflow: hidden;
    padding: 0;
}

#list-proofs .btn-vote li {
    margin: 0 10px 0 0;
    float: left;
    list-style: none;
}

#list-proofs .btn-vote a {
    box-sizing: border-box;
    border: 1px solid #ddd;
    border-radius: 2px;
    width: 44px;
    height: 34px;
    display: block;
    text-indent: -999px;
    position: relative;
}



#list-proofs .btn-vote .down:after, #list-proofs .btn-vote .up:after {
    position: absolute;
    content: " ";
    width: 30px;
    height: 30px;
    left: 50%;
    top: 50%;
    margin-top: -15px;
    margin-left: -15px;
}
#list-proofs .btn-vote .up:after {
    background: url(../img/sprite.png) -120px 0 no-repeat;
    background-size: 240px 60px;
}

#list-proofs .btn-vote .down:after {
    background: url(../img/sprite.png) -150px 0 no-repeat;
    background-size: 240px 60px;
}

#list-proofs .btn-vote .comment:after, .btn-vote .up.active:after {
    position: absolute;
    content: " ";
    width: 30px;
    height: 30px;
    left: 50%;
    top: 50%;
    margin-top: -15px;
    margin-left: -15px;
}

#list-proofs .btn-vote .comment:after {
    background: url(../img/sprite.png) -180px 0 no-repeat;
    background-size: 240px 60px;
}

.right {
    float: right!important;
}


#list-proofs .post-afterbar-a .share ul {
    overflow: hidden;
    list-style-type: none;
}

#list-proofs .post-afterbar-a .share.right li {
    margin: 0 0 0 10px;
}
#list-proofs .post-afterbar-a .share li {
    float: left;
    margin-right: 10px;
}

#list-proofs .post-afterbar-a .btn-share.facebook {
    background-color: #3b5998;
}
#list-proofs .post-afterbar-a .btn-share {
    display: block;
    color: #fff;
    font-weight: 700;
    height: 34px;
    /*background-color: #f4f4f4;*/
    line-height: 34px;
    padding: 0 15px 0 34px;
    border-radius: 2px;
    text-align: center;
    position: relative;
}

#list-proofs .post-afterbar-a .btn-share.facebook:after {
    content: " ";
    width: 32px;
    height: 32px;
    position: absolute;
    top: 50%;
    margin-top: -16px;
    left: 2px;
    background: url(../img/sprite.png) -90px 0 no-repeat;
    background-size: 240px 60px;
}

.post-afterbar-a .btn-share.twitter {
    background-color: #00aced;
}

#list-proofs .post-afterbar-a .btn-share.twitter:after {
    content: " ";
    width: 32px;
    height: 32px;
    position: absolute;
    top: 50%;
    margin-top: -15px;
    left: 2px;
    background: url(../img/sprite.png) -90px -30px no-repeat;
    background-size: 240px 60px;
}

.clearfix {
    clear: both;
}

#list-proofs .btn-vote .up.active:after {
    background: url(../img/sprite.png) -120px -30px no-repeat;
    background-size: 240px 60px;
}

#list-proofs .btn-vote .down.active:after {
    position: absolute;
    content: " ";
    width: 30px;
    height: 30px;
    background: url(../img/sprite.png) -150px -30px no-repeat;
    background-size: 240px 60px;
    left: 50%;
    top: 50%;
    margin-top: -15px;
    margin-left: -15px;
}

.your-proof{
box-sizing: border-box;
    border: 1px solid #ddd;
    border-radius: 2px;
    width: inherit !important;
    height: 34px;
    padding: 0 10px;
    display: block;
    text-indent: inherit !important;
    position: relative;
}

</style>





@endsection

@section('content')

<!-- Header -->



    <!-- Portfolio Grid Section -->
    <section id="list-proofs" style="margin-top: 80px">
        <div class="container">

            @foreach($proofs as $sonChallenge)
            <div class="row">

                <article data-entry-id="aebrrNQ" data-entry-url="http://9gag.com/gag/aebrrNQ" data-entry-votes="1" data-entry-comments="0" id="jsid-entry-entity-aebrrNQ" class="badge-entry-container badge-entry-entity badge-in-view badge-in-view-focus" style="min-height: 393px;">
                    <div class="header-list-proofs">

                        <h2 class="badge-item-title">
                            <a class="badge-evt badge-track" href="{{ action('SonChallengeController@showSonChallenge', [ 'uuid' => $sonChallenge->uuid, 'user_id'=>$sonChallenge->id]) }}" target="_blank">
                                {{$sonChallenge->title}}            </a>
                        </h2>
                    </div>


                    <div class="col-xs-12 col-md-6" style="margin-bottom: 20px;padding: 0px;">
                        <div class="badge-post-container post-container ">
                                {{--<img class="badge-item-img" src="https://img-9gag-fun.9cache.com/photo/aebrrNQ_460s.jpg" alt="How I feel after watching HIMYM or any other good show">--}}
                                @if($sonChallenge->type == 1)
                                    <video id="my-video" class="video-js vjs-big-play-centered" controls preload="none" width="100%" height="480"
                                           poster="{{ asset('uploads/challenge/'. pathinfo(asset('uploads/challenge/'. $sonChallenge->filename), PATHINFO_FILENAME) . '.jpg')  }}" data-setup="{}" style="width: 100%">
                                        <source src="{{ asset('uploads/challenge/'. $sonChallenge->filename)}}" type='video/mp4'>
                                        <p class="vjs-no-js">
                                            To view this video please enable JavaScript, and consider upgrading to a web browser that
                                            <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
                                        </p>
                                    </video>
                                @else
                                    <a href="{{ action('SonChallengeController@showSonChallenge', [ 'uuid' => $sonChallenge->uuid, 'user_id'=>$sonChallenge->id]) }}" class="badge-evt badge-track badge-track-no-follow" data-evt="PostList,TapPost,Fresh,,PostImage" data-entry-id="aebrrNQ" data-position="9" style="min-height:289.13043478261px;" target="_blank">
                                        <img src="{{ asset('uploads/challenge/'. $sonChallenge->filename)}}" class="badge-item-img"  alt="{{$sonChallenge->title}} ">
                                    </a>
                                @endif
                        </div>
                    </div>



                    <div class="col-xs-12 col-md-6" style="margin-bottom: 20px;">
                        <div class="post-text-container badge-item-description">
                        <h3 style="margin: 0px">Objectives:</h3>
                            {{$sonChallenge->description}}
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-12" style="margin-bottom: 20px;padding: 0px;">


                        @if($sonChallenge->judgment != NULL)
                            <p class="post-meta" data-voted-{{$sonChallenge->id}}="{{($sonChallenge->judgment != NULL && $sonChallenge->judgment == 1)? "1" : "-1"}}">
                        @else
                            <p class="post-meta" data-voted-{{$sonChallenge->id}}="0">

                        @endif
                            <a class="badge-evt point" id="love-count-aebrrNQ" href="{{ action('SonChallengeController@showSonChallenge', [ 'uuid' => $sonChallenge->uuid, 'user_id'=>$sonChallenge->id]) }}" target="_blank" data-evt="PostList,TapPost,Fresh,,Point" data-entry-id="aebrrNQ" data-position="9">
                                <span id="like-count-{{$sonChallenge->id}}" class="badge-item-like-count">{{$sonChallenge->positive}}</span> Up</a> ·
                            <a class="badge-evt point" id="love-count-aebrrNQ" href="{{ action('SonChallengeController@showSonChallenge', [ 'uuid' => $sonChallenge->uuid, 'user_id'=>$sonChallenge->id]) }}" target="_blank" data-evt="PostList,TapPost,Fresh,,Point" data-entry-id="aebrrNQ" data-position="9">
                                <span id="dislike-count-{{$sonChallenge->id}}" class="badge-item-dislike-count">{{$sonChallenge->negative}}</span> Down</a> ·
                            <a class="comment badge-evt" href="{{ action('SonChallengeController@showSonChallenge', [ 'uuid' => $sonChallenge->uuid, 'user_id'=>$sonChallenge->id]) }}#comment" target="_blank" data-evt="PostList,TapPost,Fresh,,CommentCountText" data-entry-id="aebrrNQ" data-position="9">0 comments</a>
                        </p>
                    </div>

                    <div class="col-xs-12 col-md-6" style="margin-bottom: 20px;padding: 0px;">
                        <div class="badge-item-vote-container post-afterbar-a in-list-view  ">
                            <div class="vote">
                                <ul class="btn-vote left">
                                    @if(Auth::check() && $sonChallenge->user_id == Auth::user()->id)
                                        <li><a href="{{ action('SonChallengeController@showSonChallenge', [ 'uuid' => $sonChallenge->uuid, 'user_id'=>$sonChallenge->id]) }}" class="your-proof">Your proof</a></li>
                                    @else
                                        <li><a href="javascript:void(0);" class="badge-item-vote-up up like {{($sonChallenge->judgment != NULL && $sonChallenge->judgment == 1)? "active" : ""}}" data-proof-id="{{$sonChallenge->id}}">Upvote</a></li>
                                        <li><a href="javascript:void(0);" class="badge-item-vote-down down dislike {{($sonChallenge->judgment != NULL && $sonChallenge->judgment == -1)? "active" : ""}}" data-proof-id="{{$sonChallenge->id}}">Downvote</a></li>
                                    @endif
                                    <li><a class="comment badge-evt badge-item-comment" target="_blank" href="{{ action('SonChallengeController@showSonChallenge', [ 'uuid' => $sonChallenge->uuid, 'user_id'=>$sonChallenge->id]) }}#comment">Comment</a></li>

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
                    </div>

                </article>


            </div>
            @endforeach



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
//                $(".like").unbind();
//                 $(".dislike").unbind();
//                 $(".dislike").click(dislike);
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
//                $(".dislike").unbind();
//                 $(".like").unbind();
//                 $(".like").click(like);
            });
            }
    }

        $(".like").delay( 800 ).click(like);
        $(".dislike").delay( 800 ).click(dislike);

</script>


@endsection