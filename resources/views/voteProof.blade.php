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

</style>





@endsection

@section('content')

<!-- Header -->



    <!-- Portfolio Grid Section -->
    <section id="portfolio" style="margin-top: 80px">
        <div class="container">

            @foreach($proofs as $sonChallenge)
            <div class="row">

                <div class="col-md-8 col-md-offset-2 text-center">

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

                <div class="col-md-8 col-md-offset-2 col-xs-12" id="approve-{{$sonChallenge->id}}">

                    <div class="col-md-12 col-xs-12 judge-info alert-hio">

                        <div class="col-xs-6 col-md-6" style="margin-bottom: 20px;">
                            <a href="#" class="btn_approve dislike" data-id="{{$sonChallenge->id}}"><i class="fa fa-meh-o " aria-hidden="true"></i></a>
                            {{--<button type="button" onclick="goBack()" class="btn btn-default btn-xl btn-cancel-hio" id="back_control">Back</button>--}}
                        </div>

                        <div class="col-xs-6 col-md-6">
                            {{--<button form="form1" type="submit" class="btn btn-primary btn-xl btn-create-hio" id="next_control">Save Changes</button>--}}
                            <a href="#" class="btn_approve like" data-id="{{$sonChallenge->id}}"><i class="fa fa-sign-language btn-create-hio" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>


            </div>
            @endforeach



        </div>
    </section>




@endsection

@section('footer')
<script src="{{ asset('js/video.js') }}"></script>


<script>

    $(".like").click(function(e){
        e.preventDefault();
        $.post("/judge/proof",
            {
                proof_id: $(e.currentTarget).data("id"),
                value: 1
            },
            function(data, status){
                $('#approve-'+$(e.currentTarget).data("id")).hide();
//        alert("Data: " + data + "\nStatus: " + status);
            });
    });

    $(".dislike").click(function(e){
        e.preventDefault();
        $.post("/judge/proof",
            {
                proof_id: $(e.currentTarget).data("id"),
                value: 0
            },
            function(data, status){
                $('#approve-'+$(e.currentTarget).data("id")).hide();
//        alert("Data: " + data + "\nStatus: " + status);
            });
    });


</script>


@endsection