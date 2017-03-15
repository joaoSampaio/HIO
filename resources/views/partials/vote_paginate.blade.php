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
                        <video class="video-js vjs-big-play-centered vjs-fluid video-js-unprocessed" controls preload="none" width="100%" height="480"
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


                    <p class="judgment-proof {{$sonChallenge->judged == true? $sonChallenge->approved == true? 'approved': 'rejected' : 'hide'}}"><span></span></p>
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
                    {{--<div class="share right">--}}
                        {{--<ul>--}}
                            {{--<li><a href="javascript:void(0);" class="badge-facebook-share badge-evt badge-track btn-share facebook" data-track="social,fb.s,,,d,aebrrNQ,l" data-evt="PostList,ShareSocial,Fresh,,FacebookButton" data-entry-id="aebrrNQ" data-position="9" data-share="http://9gag.com/gag/aebrrNQ?ref=fb.s" rel="nofollow">Facebook</a></li>--}}

                            {{--<li><a href="javascript:void(0);" class="badge-twitter-share badge-evt badge-track btn-share twitter" data-track="social,t.s,,,d,aebrrNQ,l" data-evt="PostList,ShareSocial,Fresh,,TwitterButton" data-title="How%20I%20feel%20after%20watching%20HIMYM%20or%20any%20other%20good%20show" data-entry-id="aebrrNQ" data-position="9" data-share="http://9gag.com/gag/aebrrNQ?ref=t" rel="nofollow">Twitter</a>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                    <div class="clearfix"></div>
                </div>
            </div>

        </article>


    </div>
@endforeach


