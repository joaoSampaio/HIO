@extends('app')

@section('header')

<link href="{{ asset('css/magnific-popup.css') }}" rel="stylesheet">
<style>




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



#latest {
    margin-top: 50px;
}





@media (max-width: 768px){

.slider-title{
        font-size: 17px;
        margin-bottom: 10px;
}

#carousell{
    display: none;
}

}

.padding5{
    padding-right: 5px;
    padding-left: 5px;
}
@media (min-width: 1200px){
    .padding5{
        padding-right: 15px;
        padding-left: 15px;
    }
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

.bg-text-brand-new::before {
      color: #e0e0e0;
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

.navbar-default {
        background-color: transparent;
        border-color: transparent;
    }

/*.background-text{*/
/*position: absolute;*/
   /*top: 0;*/
   /*left: 0;*/
/*color: #fff;*/
   /*font-size: 249px;*/
   /*z-index: 0;*/
   /*overflow: hidden;*/
/*}*/

</style>
@endsection

@section('content')

<!-- Header -->
    <header>


        <div class="container home-header">
            <div class="intro-text" >
                @if(Auth::check())
                    <div class="intro-lead-in" style="text-transform: inherit;">{{getFirstName(Auth::user()->name)}}, welcome to HIO</div>
                @else
                    <div class="intro-lead-in" style="text-transform: inherit;">WELCOME TO HIO</div>
                @endif

                <div class="intro-heading">READY TO CHALLENGE?</div>
                <button href="#" id="openCreate" class="page-scroll btn btn-xl">CREATE CHALLENGE</button>


            </div>
        </div>
    </header>





    <section class="bg-text" style="background-color: #f7f7f7;" data-bg-text="Wall of fame">
        <div class="container">

            <div class="row">

                <div class="col-sm-12 col-xs-12 col-lg-12" >
                    <h2 class="wall-fame-title">Wall of fame</h2>
                </div>


                <div class="col-sm-6 col-xs-12 col-lg-6" >
                    <h4 class="text-center proves-title">Proves</h4>
                    <div id="mostViewed" class="proves-container col-lg-12 col-xs-12">
                        <span class="glyphicon glyphicon-refresh spinning"></span>
                    </div>
                </div>

                <div class="col-sm-6 col-xs-12 col-lg-6 ">
                    <h4 class="text-center proves-title">Challenges</h4>

                    <div id="mostParticipants" class="proves-container col-lg-12 col-xs-12">
                        <span class="glyphicon glyphicon-refresh spinning"></span>

                    </div>
                </div>

            </div>
        </div>

    </section>





    <!-- Portfolio Grid Section -->
    <section  class="bg-text-brand-new" style="background-color: #e7e7e7;padding-bottom: 150px;margin-top: 0px" data-bg-text="challenges">
        <div class="container">
            <div class="row">

                <div class="col-sm-12 col-xs-12 col-lg-12" >
                    <h2 class="wall-fame-title">Brand new challenges</h2>
                </div>
            </div>
            <div class="row" id="latest"></div>
        </div>
    </section>









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


    <div class="modal fade" id="challenge-views-modal" tabindex="-1" role="dialog" aria-labelledby="modalHome" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="modalViews">Views</h4>
                </div>

                <div class="modal-body" id="modal-views-content">


                    <div class="padding5 row row-eq-height margin-bottom">
                        <div class="col-lg-2 col-xs-2 padding5">
                            <a href="/profile/" class="portfolio-link container-add-prof" title="">
                                @if(true)
                                    <img src="/uploads/users/default_user.png" class="img-circle img-responsive">
                                @else
                                    <img src="{{'/uploads/users/'. $challenge->photo }}" alt="{{$challenge->name}}" title="{{$challenge->name}}" class="img-circle img-responsive same-height">
                                @endif
                            </a>
                        </div>
                        <div class="col-lg-7 col-xs-7">
                            <a href="link" class="center-middle" title="">nome pessoa</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="show-proof" tabindex="-1" role="dialog" aria-labelledby="modalHome" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                 <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>

                <div class="modal-body">
                    <span id="spin-proof" class="glyphicon glyphicon-refresh spinning"></span>
                    <iframe id="proof-iframe" src="" style="height: 800px" width="99.6%" frameborder="0"></iframe>

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
</script>



<script>
    $('#openCreate').click(function(){
        @if(Auth::check())
        $('#create-challenge').on('shown.bs.modal', function() {
            $('#create-challenge-iframe').attr("src","/new/challenge");
        });
        $('#create-challenge').modal({show:true})
        @else
        window.location.replace("/auth");
        @endif
    });





</script>


    <script>

        var dictViews = {};
        var dictParticipants = {};

        $.ajax({
          type: 'GET',
          url: '{{URL::action('HomeController@latestChallenges')}}',
          dataType: 'json',
          success: function(jsonData) {
            $("#latest").html(jsonData);

          },
          error: function() {
            //alert('Error loading PatientID=' + id);
          }
        });

      $.ajax({
        type: 'GET',
        url: '{{URL::action('HomeController@mostViewed')}}',
        dataType: 'json',
        success: function(jsonData) {
          $("#mostViewed").html(jsonData);
            enableChallengeViews();
//            enableProofModal();
enableProofSlider();
            $('[data-toggle="tooltip"]').tooltip();

        },
        error: function() {
        }
      });

    $.ajax({
        type: 'GET',
        url: '{{URL::action('HomeController@mostParticipants')}}',
        dataType: 'json',
        success: function(jsonData) {
          $("#mostParticipants").html(jsonData);
          enableChallengeParticipants();
          $('[data-toggle="tooltip"]').tooltip();

        },
        error: function() {
          //alert('Error loading PatientID=' + id);
        }
      });

$('#challenge-views-modal').on('shown.bs.modal', function() {
    $('.tooltip').not(this).hide();
})




    </script>





@endsection