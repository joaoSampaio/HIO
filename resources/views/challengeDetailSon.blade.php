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




    <!-- Portfolio Grid Section -->
    <section id="portfolio" style="margin-top: 80px">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 ">
                    <div style=" font-size: 22pt;">
                        <a href="/challenge/{{$sonChallenge->uuid}}" class="" title="{{$sonChallenge->title}}" style="color: #333;text-decoration: none;">
                            <i class="fa fa-chevron-circle-left" style=" font-size: 44pt;vertical-align: middle;" aria-hidden="true"></i>   Back to
                            <a href="/challenge/{{$sonChallenge->uuid}}" class="" title="{{$sonChallenge->title}}">{{$sonChallenge->title}}</a>
                        </a>
                    </div>

                </div>
                <div class="col-lg-12 text-center">


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

                </div>

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

//                				alert(result);

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

@if(!$hasLiked)
    $("#vote").click(function(){
        $.ajax({
            url: "{{ action('HomeController@likeFile', $sonChallenge->id) }}",
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

</script>


@endsection