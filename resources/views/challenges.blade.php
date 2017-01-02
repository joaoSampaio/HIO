@extends('app')

@section('header')

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


blockquote {
font-size: 18px;
font-style: italic;
width: 500px;
margin: 0.25em 0;
padding: 0.25em 40px;
line-height: 1.45;
position: relative;
color: #383838;
    border-left: 5px solid rgba(255, 255, 255, 0);
    }
blockquote:before {
display: block;
content: "\201C";
font-size: 80px;
position: absolute;
left: -20px;
top: -20px;
color: #7a7a7a;
}
blockquote p {
  display: inline;
}


</style>
@endsection

@section('content')

<!-- Header -->






    <!-- Portfolio Grid Section -->
    <section id="portfolio" style="margin-top: 80px">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading" style="color: #eb1946;margin-bottom: 5px;">Challenges</h2>
                    <h3 class="quotes" style="font-size: 20px;margin-top: 10px;margin-bottom: 50px;font-style: italic;">

                    <p></p>
                    </h3>


                </div>
                <div class="col-lg-12 text-center">
                    <a href="{{ action('HomeController@createChallenge') }}" class="page-scroll btn btn-xl">CREATE CHALLENGE</a>
                </div>
            </div>













            {{--<div class="challenges">--}}
                {{--@include('partials.challenge')--}}
            {{--</div>--}}

        </div>
    </section>




<div>
    <div class="tabbable full-width-tabs">
        <ul class="nav nav-tabs">
            <li class="active take-all-space-you-can">
                <a href="#ongoing" aria-controls="ongoing" data-toggle="tab">
                    <h3>{{$challenges->total()}}</h3>
                    <h4 class="text-capitalize">On Going</h4>
                </a>
            </li>
            <li class="take-all-space-you-can">
                <a href="#ended" aria-controls="ended" data-toggle="tab">
                    <h3>{{$endedChallenges->total()}}</h3>
                    <h4 class="text-capitalize">Completed</h4>
                </a>
            </li>
        </ul>
    </div>

</div>
<section class="bg-light-gray" id="portfolio">
    <div class="container">
        <div class="row" id="latest">

            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="ongoing">

                    <div class="row">
                        @foreach ($challenges as $challenge)
                            @include('partials.single_challenge')
                        @endforeach
                    </div>

                    <div class="row">
                        {!! $challenges->links() !!}
                    </div>


                </div>
                <div role="tabpanel" class="tab-pane" id="ended">

                    <div class="row">
                        @foreach ($endedChallenges as $challenge)
                            @include('partials.single_challenge')
                        @endforeach
                    </div>
                    <div class="row">
                        {!! $endedChallenges->links() !!}
                    </div>

                </div>
              </div>


        </div>
    </div>
</section>















@endsection

@section('footer')

<script src="{{ asset('js/owl.carousel.min.js') }}"></script>


<script>
//    $(window).on('hashchange', function() {
//        if (window.location.hash) {
//            var page = window.location.hash.replace('#', '');
//            if (page == Number.NaN || page <= 0) {
//                return false;
//            } else {
//                getPosts(page);
//            }
//        }
//    });
//    $(document).ready(function() {
//        $(document).on('click', '.pagination a', function (e) {
//            getPosts($(this).attr('href').split('page=')[1]);
//            e.preventDefault();
//        });
//    });
//    function getPosts(page) {
//        $.ajax({
//            url : '?page=' + page,
//            dataType: 'json'
//        }).done(function (data) {
//            $('.challenges').html(data);
//            location.hash = page;
//        }).fail(function () {
//            alert('Posts could not be loaded.');
//        });
//    }


    $(document).ready(function() {
        $(document).on('click', '#ended .pagination a', function (e) {

            var url = '/ended-challenges?ended='+$(this).attr('href').split('ended=')[1];

            var s = window.location.href.split('/');
            var category = s[s.length-1];
            category = category.split('?')[0];
            if(category != "challenges")
                url+= "&&category="+category
            console.log(category);

            getEndedChallenges(url);
            e.preventDefault();
        });

        $(document).on('click', '#ongoing .pagination a', function (e) {

            var url = '/ongoing-challenges?ongoing='+$(this).attr('href').split('ongoing=')[1];

            var s = window.location.href.split('/');
            var category = s[s.length-1];
            category = category.split('?')[0];
            if(category != "challenges")
                url+= "&&category="+category


            getOngoingChallenges(url);
            e.preventDefault();
        });

    });
    function getEndedChallenges( url) {
        $.ajax({
            url : url,
            dataType: 'json'
        }).done(function (data) {
            $('#ended').html(data);
//            location.hash = page;
        }).fail(function () {
            alert('Posts could not be loaded.');
        });
    }

    function getOngoingChallenges( url) {
            $.ajax({
                url : url,
                dataType: 'json'
            }).done(function (data) {
                $('#ongoing').html(data);
//                location.hash = page;
            }).fail(function () {
                alert('Posts could not be loaded.');
            });
        }

    var quotes = ["\"Money can't buy glory\"",
   "\"\"The biggest failure is when you don't to try at all\"\"",
   "\"\"Consistency always pays off\"\"",
   "\"The key is to fail often. Only then you will succeed\"",
   "\"Tired? Recharge, don't quit\"",
   "\"Achievements are made on those days you don't feel like to\"",
   "\"Be rich in your heart\"",
   "\"If I do better than yesterday, I'm always winning\"",
   "\"The greatest achievement is to conquer the mind\"",
   "\"The best stories are about overcoming\"",
   "\"I can accept failure, but I can't accept not trying\"",
   "\"To do when you can´t\"",
   "\"Own your glory\"",
   "\"Earn Not Given\"",
   "\"Challenge Luck\"",
   "\"Stop  the Rain\"",
   "\"Dream Chasers\"",
   "\"Self Made Legends\"",
   "\"Remember the Name\"",
   "\"Become What You Are\"",
   "\"Right Here, Righ Now\"",
   "\"History in the Making\"",
   "\"Success over Excuses\"",
   "\"Crave Legends\"",
   "\"Challenge de Gods (and the odds)\"",
   "\"Gods beat Odds\"",
   "\"Levitate your Potential\"",
   "\"Legends start with a single step\"",
   "\"Success over excuses\"",
   "\"Hall of Famers\"",
   "\"Pain is temporary, Glory lasts forever\"",
   "\"Suffer the pain of discipline or suffer the pain of regret\"",
   "\"Give up, Give in or Give all you got\"",
   "\"If you get tired learn to rest, not to quit\"",
   "\"He who is not corageous enough to take risks will accomplish nothing\"",
   "\"Greatness is a lot of small things done well\""
    ]

    var num = Math.floor(Math.random() * quotes.length)
    $('.quotes').text(quotes[num]);
    </script>


@endsection