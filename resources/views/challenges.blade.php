@extends('app')

@section('header')
<link href="https://fonts.googleapis.com/css?family=Droid+Serif" rel="stylesheet">
<link href="{{ asset('css/magnific-popup.css') }}" rel="stylesheet">
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

.nav-tabs > li, .nav-pills > li {
    float:none;
    display:inline-block;
    *display:inline; /* ie7 fix */
    zoom:1; /* hasLayout ie7 trigger */
}

.nav-tabs, .nav-pills {
    text-align:center;
}

.nav-tabs>li.active>a, .nav-tabs>li.active>a:focus, .nav-tabs>li.active>a:hover {
    color: #eb1946;;
    cursor: default;
    background-color: #fff;
    border: 0px solid #ddd;
    border-bottom-color: transparent;
}


.challenge-selector{
    background-color: #f2f5f8;
    border-bottom: 0px solid #ddd;
}



.challenge-selector a{
    color: #43484c;;
    cursor: default;
    border: 0px solid #ddd;
    border-bottom-color: transparent;
    font-weight: 400;
}

.challenge-selector .active a{
    color: #eb1946;;
    cursor: default;
    background-color: #fff;
    border: 0px solid #ddd;
    border-bottom-color: transparent;
    font-weight: 400;
}





.challenge-item-info{
    /*border: 1px solid #807c7c;*/
    /*box-shadow: 0 5px 15px rgba(0,0,0,.5);*/
    box-shadow: 0px 0px 68px 0px rgba(0, 0, 0, 0.2);
}

.hint{
    font-family: 'Droid Serif', serif;
    font-size: 43px;
    color: #acaeb0;
    font-weight: 400;
    margin-bottom: 50px;
    font-style: italic;
}
@media (max-width: 768px){
    .hint{
        font-size: 20px;
        margin-bottom: 0px;
    }
}


</style>
@endsection

@section('content')

<!-- Header -->






    <!-- Portfolio Grid Section -->
    <section id="portfolio" style="background-color: #f2f5f8;    padding-top: 170px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">

                    <span class="section-heading" style="color: #43484c; font-size: 36px;font-weight: 400;margin-bottom: 5px;">All the Challenges</span>
                    <p style="margin-top: 55px;margin-bottom: 20px;"><img src="/img/Symbol.png"></p>
                    <p class="quotes hint">

                    <p></p>
                    </p>
                </div>
            </div>
        </div>
    </section>




<ul class="nav nav-tabs challenge-selector" >
    <li class="active"><a data-toggle="tab" href="#menu-challenges">CHALLENGES</a></li>
    <li><a data-toggle="tab" href="#menu-proofs">PROOFS</a></li>
</ul>





<div class="tab-content">
    <section id="menu-challenges"  style="padding-top: 0px;" class="tab-pane fade in active" >
        <div class="container">
            <div class="row">

                <div style="text-align: center">
                    <div class="col-md-12" style="display: inline-block;margin-bottom: 100px;margin-top: 25px;">
                        <a class="btn btn-tab-challenge active" href="#ongoing" aria-controls="ongoing" data-toggle="tab">ON GOING</a>
                        <a class="btn btn-tab-challenge" href="#ended" aria-controls="ended" data-toggle="tab">FINISHED</a>
                        <a class="btn btn-tab-challenge" href="#all-challenges" aria-controls="mychallenges" data-toggle="tab">ALL</a>
                    </div>
                </div>

                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="ongoing">
                        @include('partials.challenge', array('challenges' => $challenges))
                    </div>
                    <div role="tabpanel" class="tab-pane" id="ended">
                        @include('partials.challenge', array('challenges' => $endedChallenges))
                    </div>
                    <div role="tabpanel" class="tab-pane" id="all-challenges">
                        @include('partials.challenge', array('challenges' => $allChallenges))
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="menu-proofs" style="padding-top: 0px;margin-top: 0px" class="tab-pane fade" >
        <div class="container">
            <div class="row" >

                <div style="text-align: center">
                    <div class="col-md-12" style="display: inline-block;margin-bottom: 100px;margin-top: 25px;">
                        <a class="btn btn-tab-challenge active" href="#ongoing-proofs" aria-controls="ongoing" data-toggle="tab">ON GOING</a>
                        <a class="btn btn-tab-challenge" href="#ended-proofs" aria-controls="ended" data-toggle="tab">FINISHED</a>
                        <a class="btn btn-tab-challenge" href="#all-proofs" aria-controls="mychallenges" data-toggle="tab">ALL</a>
                    </div>
                </div>

                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="ongoing-proofs">
                        @include('partials.proofs', array('proofs' => $ongoingProofs))
                    </div>
                    <div role="tabpanel" class="tab-pane" id="ended-proofs">
                        @include('partials.proofs', array('proofs' => $endedProofs))
                    </div>
                    <div role="tabpanel" class="tab-pane" id="all-proofs">
                        @include('partials.proofs', array('proofs' => $allProofs))
                    </div>
                </div>
            </div>
        </div>

    </section>
</div>


<div class="modal fade" id="create-challenge" tabindex="-1" role="dialog" aria-labelledby="modalHome" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header-create">
                <button type="button" class="close" style="font-size: 40px;font-weight: 300;" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="create-challenge-title" id="modalHome">Create Challenge</h4>
            </div>

            <div class="modal-body">
                <span id="create-spin" class="glyphicon glyphicon-refresh spinning"></span>
                <iframe id="create-challenge-iframe" src="" style="" width="99.6%" frameborder="0"></iframe>

            </div>

        </div>
    </div>
</div>
@endsection


@section('modal')
    <div class="modal fade" id="create-challenge" tabindex="-1" role="dialog" aria-labelledby="modalHome" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header-create">
                    <button type="button" class="close" style="font-size: 40px;font-weight: 300;" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="create-challenge-title" id="modalHome">Create Challenge</h4>
                </div>

                <div class="modal-body">
                    <span id="create-spin" class="glyphicon glyphicon-refresh spinning"></span>
                    <iframe id="create-challenge-iframe" src="" style="" width="99.6%" frameborder="0"></iframe>

                </div>

            </div>
        </div>
    </div>


    <div class="modal fade" id="show-proof" tabindex="-1" role="dialog" aria-labelledby="modalHome" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-body">
                    <span id="create-spin-proof" class="glyphicon glyphicon-refresh spinning"></span>
                    <iframe id="proof-iframe" src="" style="" width="99.6%" frameborder="0"></iframe>

                </div>

            </div>
        </div>
    </div>

@endsection



@section('footer')


<script src="/js/jquery.magnific-popup.min.js"></script>
<script type="text/javascript">
  function enableProofSlider(container){
    $(container).magnificPopup({
      disableOn: 700,
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
    enableProofSlider('#all-proofs .open-iframe');
    enableProofSlider('#ongoing-proofs .open-iframe');
    enableProofSlider('#ended-proofs .open-iframe');
  });
</script>

<script>
    $('.openCreate').click(function(){

        $('#create-challenge').on('shown.bs.modal', function() {
            $('#create-challenge-iframe').attr("src","/new/challenge");
        });
        $('#create-challenge').modal({show:true})
    });

</script>

<script>


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

        $(document).on('click', '#all-challenges .pagination a', function (e) {
            var url = '/all-challenges?all='+$(this).attr('href').split('all=')[1];
            var s = window.location.href.split('/');
            var category = s[s.length-1];
            category = category.split('?')[0];
            if(category != "challenges")
                url+= "&&category="+category
            getAllChallenges(url);
            e.preventDefault();
        });

        $(document).on('click', '#all-proofs .pagination a', function (e) {
            var url = '/all-proofs?all='+$(this).attr('href').split('all=')[1];
            getAllProofs(url);
            e.preventDefault();
        });

        $(document).on('click', '#ongoing-proofs .pagination a', function (e) {
            var url = '/ongoing-proofs?ongoing='+$(this).attr('href').split('ongoing=')[1];
            getOngoingProofs(url);
            e.preventDefault();
        });
        $(document).on('click', '#ended-proofs .pagination a', function (e) {
            var url = '/ended-proofs?ended='+$(this).attr('href').split('ended=')[1];
            getEndedProofs(url);
            e.preventDefault();
        });
    });


    function getAllProofs( url) {
        $.get( url, function( data ) {
              $('#all-proofs').html(data);
              enableProofSlider('#all-proofs .open-iframe');
        }, "json");
    }
    function getOngoingProofs( url) {
    $.ajax({
                url : url,
                dataType: 'json'
            }).done(function (data) {
                $('#ongoing-proofs').html(data);
                enableProofSlider('#ongoing-proofs .open-iframe');
            }).fail(function () {
            });
    }
    function getEndedProofs( url) {
        $.get( url, function( data ) {
              $('#ended-proofs').html(data);
              enableProofSlider('#ended-proofs .open-iframe');
        }, "json");
    }

    function getAllChallenges( url) {
        $.ajax({
            url : url,
            dataType: 'json'
        }).done(function (data) {
            $('#all-challenges').html(data);
        }).fail(function () {
        });
    }
    function getEndedChallenges( url) {
        $.ajax({
            url : url,
            dataType: 'json'
        }).done(function (data) {
            $('#ended').html(data);
        }).fail(function () {
        });
    }

    function getOngoingChallenges( url) {
            $.ajax({
                url : url,
                dataType: 'json'
            }).done(function (data) {
                $('#ongoing').html(data);
            }).fail(function () {
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
<script>

    $('.btn-tab-challenge').on('click', function (e) {
        $('.btn-tab-challenge').removeClass('active');
        $(e.currentTarget).addClass('active');
    })



</script>


@endsection