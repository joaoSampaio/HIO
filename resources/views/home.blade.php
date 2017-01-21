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


</style>
@endsection

@section('content')

<!-- Header -->
    <header>


        <div class="container" style="    background-image: url({{ asset('img/header-bg.jpg')}});background-size: cover;">
            <div class="intro-text">
                @if(Auth::check())
                    <div class="intro-lead-in">{{getFirstName(Auth::user()->name)}}, WELCOME TO HIO</div>
                @else
                    <div class="intro-lead-in">WELCOME TO HIO</div>
                @endif

                <div class="intro-heading">READY TO CHALLENGE?</div>
                <a href="{{ action('HomeController@createChallenge') }}" class="page-scroll btn btn-xl">CREATE CHALLENGE</a>


            </div>
        </div>
    </header>


    <section >


        <div class="container">

            <div class="row">


            <div class="col-sm-12 col-xs-12 col-lg-5 bg-light-gray" >
                <div class="text-center" style="margin-bottom: 30px; font-size: 22pt;">Most Viewed</div>
                <div id="mostViewed" style="height: 300px;">
                    <span class="glyphicon glyphicon-refresh spinning"></span>
                </div>
                {{--<div class="col-lg-12 col-xs-12">--}}
                    {{--<div class="col-lg-2 col-xs-2">--}}
                        {{--<img src="{{'https://graph.facebook.com/v2.5/'. '592135650941808'  .'/picture?width=100&height=100'}}"--}}
                                                                                    {{--class=" img-circle img-responsive">--}}
                    {{--</div>--}}
                    {{--<div class="col-lg-8 col-xs-8">--}}
                        {{--<span style="font-size: 20px;line-height: 0;">JOAO SAMPAIO</span><br>--}}
                        {{--<a href="/challenge/" class="" title="">fazer um afundanço</a>--}}
                    {{--</div>--}}
                    {{--<div class="col-lg-2 col-xs-2">--}}
                        {{--574 Views--}}
                    {{--</div>--}}
                {{--</div>--}}

            </div>




            <div class="col-sm-12 col-xs-12 col-lg-5 col-lg-offset-2 bg-light-gray" >
                <div class="text-center" style="margin-bottom: 30px; font-size: 22pt;">Most Popular</div>

                <div id="mostParticipants" style="height: 300px;">
                    <span class="glyphicon glyphicon-refresh spinning"></span>

                </div>

            </div>

        </div>
    </section>





    <!-- Portfolio Grid Section -->
    <section id="portfolio" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading" style="color: #eb1946;margin-bottom: 5px;">New Challenges</h2>
                </div>
            </div>
            <div class="row" id="latest"></div>
        </div>
    </section>



    <div class="modal fade" id="challenge-views-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Views</h4>
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

        var dict = {};

        $.ajax({
          type: 'GET',
          url: '{{URL::action('HomeController@latestChallenges')}}',
          dataType: 'json',
          success: function(jsonData) {
            customDataSuccess(jsonData);
          },
          error: function() {
            //alert('Error loading PatientID=' + id);
          }
        });

    function customDataSuccess(jsonData){

        $("#latest").html(jsonData);
      }

      $.ajax({
        type: 'GET',
        url: '{{URL::action('HomeController@mostViewed')}}',
        dataType: 'json',
        success: function(jsonData) {
          $("#mostViewed").html(jsonData);

          var cw = $('.same-height').width();
                    $('.same-height').css({
                        'height': cw + 'px'
                    });
            enableChallengeViews();

            $('[data-toggle="tooltip"]').tooltip();

        },
        error: function() {
          //alert('Error loading PatientID=' + id);
        }
      });

    $.ajax({
        type: 'GET',
        url: '{{URL::action('HomeController@mostParticipants')}}',
        dataType: 'json',
        success: function(jsonData) {
          $("#mostParticipants").html(jsonData);
          var cw = $('.same-height').width();
          $('.same-height').css({
              'height': cw + 'px'
          });
        },
        error: function() {
          //alert('Error loading PatientID=' + id);
        }
      });




    function enableChallengeViews(){
      $('.challenge-views').click(function(e){
        $('#challenge-views-modal').modal('show');
           $.ajax({
               url: "/views/proof/"+$(e.currentTarget).data("id"),
               type:"GET",
               dataType : 'json',
               success:function(data){

//                 console.log(JSON.stringify(data));
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

                    $('#challenge-views-modal').on('shown.bs.modal', function() {
                        var wid = $('.same-height-modal-views').width();
                         $('.same-height-modal-views').css({
                             'height': wid + 'px'
                         });
                    })

               },error:function(){
                   //console.log("count:" + countVotes);
               }
           }); //end of ajax
               return false;
           });

       $( ".challenge-views" ).hover(function(e) {
            var id = $(e.currentTarget).data("id");
            if(!(id in dict)){
                 $.ajax({
                                url: "/views/proof/"+id,
                                type:"GET",
                                dataType : 'json',
                                success:function(data){
                                    dict[id] = data;
                                  console.log(JSON.stringify(data));
                                  $(e.currentTarget).prop('title', getViewsNames(dict[id]));
                                  $(e.currentTarget).attr('data-original-title', getViewsNames(dict[id]));
                                  $(e.currentTarget).tooltip('show');
                                },error:function(){
                                    //console.log("count:" + countVotes);
                                }
                            }); //end of ajax
           }else {
           $(e.currentTarget).prop('title', getViewsNames(dict[id]));
           $(e.currentTarget).attr('data-original-title', getViewsNames(dict[id]));

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