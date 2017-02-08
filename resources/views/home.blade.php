@extends('app')

@section('header')



<style>

.glyphicon.spinning {
    animation: spin 1s infinite linear;
    -webkit-animation: spin2 1s infinite linear;
        margin-left: 50%;
        font-size: 30px;
        margin-bottom: 30px;
}

@keyframes spin {
    from { transform: scale(1) rotate(0deg); }
    to { transform: scale(1) rotate(360deg); }
}

@-webkit-keyframes spin2 {
    from { -webkit-transform: rotate(0deg); }
    to { -webkit-transform: rotate(360deg); }
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

.wall-fame-title{
text-align: center;
    font-size: 37px;
    color: #43484c;
    margin-bottom: 70px;
    margin-top: 20px;
        text-transform: inherit;
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

.background-text{
position: absolute;
   top: 0;
   left: 0;
color: #fff;
   font-size: 249px;
   z-index: 0;
   overflow: hidden;
}

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
                <a href="{{ action('HomeController@createChallenge') }}" class="page-scroll btn btn-xl">CREATE CHALLENGE</a>


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
    <section  class="bg-text-brand-new" style="background-color: #e7e7e7;padding-bottom: 150px;" data-bg-text="challenges">
        <div class="container">
            <div class="row">

                <div class="col-sm-12 col-xs-12 col-lg-12" >
                    <h2 class="wall-fame-title">Brand new challenges</h2>
                </div>
            </div>
            <div class="row" id="latest"></div>
        </div>
    </section>



    <div class="modal fade" id="challenge-views-modal" tabindex="-1" role="dialog" aria-labelledby="modalHome" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="modalHome">Views</h4>
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

                {{--<div class="modal-footer">--}}
                    {{--<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>--}}
                    {{--<a class="btn btn-danger btn-ok btn-proof-delete">Delete</a>--}}
                {{--</div>--}}
            </div>
        </div>
    </div>

@endsection

@section('footer')


{{--<script type="text/javascript" src="path-to-file/jquery.actual.js"></script>--}}
{{--<script src="{{ asset('js/jquery.mobile.custom.min.js') }}"></script>--}}


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

    function enableChallengeParticipants(){
          $('.challenge-participants').unbind().click(function(e){
            $('#modalHome').html("Participants");
            $('#challenge-views-modal').modal('show');
               $.ajax({
                   url: "/participants/"+$(e.currentTarget).data("id"),
                   type:"GET",
                   dataType : 'json',
                   success:function(data){
                        var challengeViews="";
                        for (index = 0; index < data.length; ++index) {

                            challengeViews += "<div class=\"padding5 row row-eq-height margin-bottom\">";
                             challengeViews += "                           <div class=\"col-lg-2 col-xs-2 padding5\">";
                             challengeViews += "                               <a href=\"\/profile\/"+data[index].userId+"\" class=\"container-modal-views-link\" title=\"\">";
                             if(data[index].photo == "")
                                challengeViews += "                                       <img src=\"\/uploads\/users\/default_user.png\" class=\"img-circle img-responsive same-height-modal-views\">";
                             else
                                challengeViews += "                                       <img src=\"\/uploads\/users\/"+data[index].photo+"\" class=\"img-circle img-responsive same-height-modal-views\">";
                             challengeViews += "                               <\/a>";
                             challengeViews += "                           <\/div>";
                             challengeViews += "                           <div class=\"col-lg-7 col-xs-7\">";
                             challengeViews += "                               <a href=\"\/profile\/"+data[index].userId+"\" class=\"center-middle\" title=\"\">"+data[index].name+"<\/a>";
                             challengeViews += "                           <\/div>";
                             challengeViews += "                       <\/div>";
                             challengeViews += "                    <\/div>";
                        }
                        $("#modal-views-content").html(challengeViews);
                   },error:function(){
                   }
               }); //end of ajax
                   return false;
               });

           $( ".challenge-participants" ).hover(function(e) {
                var id = $(e.currentTarget).data("id");
                if(!(id in dictParticipants)){
                     $.ajax({
                            url: "/participants/"+id,
                            type:"GET",
                            dataType : 'json',
                            success:function(data){
                                dictParticipants[id] = data;
                              console.log(JSON.stringify(data));
                              $(e.currentTarget).prop('title', getViewsNames(dictParticipants[id]));
                              $(e.currentTarget).attr('data-original-title', getViewsNames(dictParticipants[id]));
                              $(e.currentTarget).tooltip('show');
                            },error:function(){
                            }
                        }); //end of ajax
               }else {
               $(e.currentTarget).prop('title', getViewsNames(dictParticipants[id]));
               $(e.currentTarget).attr('data-original-title', getViewsNames(dictParticipants[id]));

               $(e.currentTarget).tooltip('show');
               }
           });
        }

    function enableChallengeViews(){
      $('.challenge-views').unbind().click(function(e){
        $('#modalHome').html("Views");
        $('#challenge-views-modal').modal('show');
           $.ajax({
               url: "/views/proof/"+$(e.currentTarget).data("id"),
               type:"GET",
               dataType : 'json',
               success:function(data){
                    var challengeViews="";
                    for (index = 0; index < data.length; ++index) {
//                        console.log(data[index]);

                        challengeViews += "<div class=\"padding5 row row-eq-height margin-bottom\">";
                         challengeViews += "                           <div class=\"col-lg-2 col-xs-2 padding5\">";
                         challengeViews += "                               <a href=\"\/profile\/"+data[index].userId+"\" class=\"container-modal-views-link\" title=\"\">";
                         if(data[index].photo == "")
                            challengeViews += "                                       <img src=\"\/uploads\/users\/default_user.png\" class=\"img-circle img-responsive same-height-modal-views\">";
                         else
                            challengeViews += "                                       <img src=\"\/uploads\/users\/"+data[index].photo+"\" class=\"img-circle img-responsive same-height-modal-views\">";
                         challengeViews += "                               <\/a>";
                         challengeViews += "                           <\/div>";
                         challengeViews += "                           <div class=\"col-lg-7 col-xs-7\">";
                         challengeViews += "                               <a href=\"\/profile\/"+data[index].userId+"\" class=\"center-middle\" title=\"\">"+data[index].name+"<\/a>";
                         challengeViews += "                           <\/div>";
                         challengeViews += "                       <\/div>";
                         challengeViews += "                    <\/div>";
                    }
                    $("#modal-views-content").html(challengeViews);



               },error:function(){
                   //console.log("count:" + countVotes);
               }
           }); //end of ajax
               return false;
           });

       $( ".challenge-views" ).hover(function(e) {
            var id = $(e.currentTarget).data("id");
            if(!(id in dictViews)){
                 $.ajax({
                                url: "/views/proof/"+id,
                                type:"GET",
                                dataType : 'json',
                                success:function(data){
                                    dictViews[id] = data;
                                  console.log(JSON.stringify(data));
                                  $(e.currentTarget).prop('title', getViewsNames(dictViews[id]));
                                  $(e.currentTarget).attr('data-original-title', getViewsNames(dictViews[id]));
                                  $(e.currentTarget).tooltip('show');
                                },error:function(){
                                    //console.log("count:" + countVotes);
                                }
                            }); //end of ajax
           }else {
           $(e.currentTarget).prop('title', getViewsNames(dictViews[id]));
           $(e.currentTarget).attr('data-original-title', getViewsNames(dictViews[id]));

           $(e.currentTarget).tooltip('show');
           }
       });
    }

    function getViewsNames(data){
        var challengeViews="";

        if(data.length>= 5){
            challengeViews += data[0].name + ", " +  data[1].name + ", " +  data[2].name + " and " + (data.length - 3) + " other people";
        }else{
            for (index = 0; index < data.length; ++index) {
                challengeViews += data[index].name + ", ";
            }
            if(data.length > 0)
                challengeViews = challengeViews.slice(0, -2);
        }


        return challengeViews;
    }


    </script>


@endsection