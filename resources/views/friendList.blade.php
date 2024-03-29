@extends('app')

@section('header')

<style>

    .jumbotron {

        background-color: #fff;
    }
    .list-group-item {

        border: 0px solid #ddd;
    }

    .img-thumbnail {
        border: 0px solid #ddd;

    }

.list-content{
 min-height:300px;
}
.list-content .list-group .title{
  background:#eee;
  /*border:2px solid #DDDDDD;*/
  font-weight:bold;
  color:#eb1946;
}
.list-group-item img {
    height:80px;
    width:80px;
}

.jumbotron .btn {
    padding: 5px 5px !important;
    font-size: 12px !important;
}
.prj-name {
    color:#5bc0de;
}
.break{
    width:100%;
    margin:20px;
}
.name {
    color:#5bc0de;
}

.navbar-default {
    background-color: #222 !important;
    border-color: transparent;
    padding: 10px 0;
}

@media (max-width: 768px) {
    #clockdiv div > span{

      font-size: 33pt !important;
      }
}


form.pull-right{
margin-left: 5px;
}

.list-content .list-group .title{
margin-right: -15px;
    margin-left: -15px;
}

    .img-thumbnail{
        width: 50px;
        height: 50px;
    }
    /*tab-pane*/
    .tab-pane div:first-child{
        padding-top: 20px;
    }




    /*.tab-pane i*/
    /*{*/
        /*padding: 5px 10px;*/
        /*display: inline-block;*/
        /*-moz-border-radius: 100px;*/
        /*-webkit-border-radius: 100px;*/
        /*border-radius: 100px;*/
        /*-moz-box-shadow: 0px 0px 2px #888;*/
        /*-webkit-box-shadow: 0px 0px 2px #888;*/
        /*box-shadow: 0px 0px 2px #888;*/
    /*}*/

    .my-challenges-title{
        text-transform: inherit;
        font-size: 45px;
        font-weight: 300;
        margin-top: 40px;
            color: #43484c;
    }

  </style>
<link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
@endsection

@section('content')


    <section id="menu-challenges"  style="padding-top: 100px" class="fade in active " >


        <div class="container  bg-text" style="    padding-top: 75px;" data-bg-text="Friends">

            <div class="row"  >
                <h3 class="col-md-12 text-center my-challenges-title" style="margin-bottom: 40px;">Friends</h3>


            </div>

            <div class="row">
                <div class="tab-content col-md-6 col-md-offset-3 search-select2">
                    {!! Form::select('emailFriend[]', array(),null,array('required', 'data-validation'=>'required',  'class'=>'form-control hidden js-data-example-ajax', 'multiple'=>'multiple')) !!}
                </div>

                {{--<ul class="list-group">--}}
                    {{--<li href="#" class="list-group-item title text-right search-select2">--}}

                    {{--</li>--}}
                {{--</ul>--}}

            </div>

            <div class="row">

                <div class="col-md-12" style="text-align: center">
                    <div class="col-md-12" style="display: inline-block;margin-top: 0px;padding-top: 0px">
                        <a class="btn btn-tab-challenge active" href="#f-requests" aria-controls="ongoing" data-toggle="tab">Friend Requests</a>
                        <a class="btn btn-tab-challenge" href="#f-invites" aria-controls="ended" data-toggle="tab">Your Invites</a>
                        <a class="btn btn-tab-challenge" href="#my-friends" aria-controls="mychallenges" data-toggle="tab">My Friends</a>
                        <a class="btn btn-tab-challenge" href="#blocked" aria-controls="mychallenges" data-toggle="tab">Blocked</a>
                    </div>
                </div>

                <div class="tab-content col-md-6 col-md-offset-3">
                    <div role="tabpanel" class="tab-pane row active" style="padding-top:0px" id="f-requests">
                        @include('partials.friends_options', array('friends' => $friendRequests, 'type' => "request_tab"))
                    </div>
                    <div role="tabpanel" class="tab-pane row" id="f-invites">
                        @include('partials.friends_options', array('friends' => $sentFriendRequests, 'type' => "invite_tab"))
                    </div>
                    <div role="tabpanel" class="tab-pane row" id="my-friends">
                        @include('partials.friends_options', array('friends' => $friends, 'type' => "friend_tab"))
                    </div>


                    <div role="tabpanel" class="tab-pane row" id="blocked">
                        @include('partials.friends_options', array('friends' => $blockedFriends, 'type' => "block_tab"))
                    </div>
                </div>
            </div>
        </div>
    </section>


        {{--<section>--}}
            {{--<div class="container">--}}

               {{--<div class="jumbotron list-content">--}}


                   {{--<ul class="list-group">--}}
                       {{--<li href="#" class="list-group-item title text-right search-select2">--}}
                           {{--{!! Form::select('emailFriend[]', array(),null,array('required', 'data-validation'=>'required',  'class'=>'form-control js-data-example-ajax', 'multiple'=>'multiple')) !!}--}}

                       {{--</li>--}}
                   {{--</ul>--}}

                    {{--@if(Auth::user()->role == "trainer")--}}

                    {{--<ul class="list-group">--}}
                       {{--<li href="#" class="list-group-item title">--}}
                           {{--Followers--}}
                       {{--</li>--}}

                       {{--<div class="row">--}}

                           {{--@foreach ($friendRequests as $friendRequest)--}}
                               {{--<li href="#" class="list-group-item text-left">--}}
                                   {{--<a href="{{"/profile/".$friendRequest->id}}">--}}
                                       {{--@if($friendRequest->photo == "")--}}
                                           {{--<img class="img-thumbnail img-circle" src="/uploads/users/default_user.png" alt="{{$friendRequest->name}}" title="{{$friendRequest->name}}">--}}
                                       {{--@else--}}
                                           {{--<img class="img-thumbnail img-circle" src="{{'/uploads/users/'. $friendRequest->photo }}" alt="{{$friendRequest->name}}" title="{{$friendRequest->name}}" >--}}

                                       {{--@endif--}}
                                   {{--</a>--}}
                                   {{--<label class="name">--}}
                                       {{--<a href="{{"/profile/".$friendRequest->id}}">{{$friendRequest->name}}</a><br>--}}
                                   {{--</label>--}}
                                   {{--<label class="pull-right">--}}

                                       {{--<form class="pull-right" role="form" method="POST"  action="{{ url('/friend') }}">--}}
                                           {{--{{ csrf_field() }}--}}
                                           {{--<input type="hidden" name="friendId" value="{{$friendRequest->id}}">--}}
                                           {{--<input type="hidden" name="action" value="3">--}}
                                           {{--<button type="submit" class="btn btn-danger btn-xs glyphicon glyphicon-hand-paper-o ">--}}
                                               {{--<i class="fa fa-btn fa-user"></i> Block--}}
                                           {{--</button>--}}
                                       {{--</form>--}}


                                   {{--</label>--}}
                                   {{--<div class="break"></div>--}}
                               {{--</li>--}}
                           {{--@endforeach--}}
                           {{--<li href="#" class="list-group-item ">--}}
                               {{--{!! $friendRequests->links() !!}--}}
                           {{--</li>--}}



                   {{--</ul>--}}

                    {{--<ul class="list-group">--}}
                      {{--<li href="#" class="list-group-item title">--}}
                        {{--Blocked--}}
                      {{--</li>--}}

                      {{--<div class="row">--}}

                      {{--@foreach ($blockedFriends as $friendRequest)--}}
                          {{--<li href="#" class="list-group-item text-left">--}}
                              {{--<a href="{{"/profile/".$friendRequest->id}}">--}}
                                  {{--@if($friendRequest->photo == "")--}}
                                      {{--<img class="img-thumbnail img-circle" src="/uploads/users/default_user.png" alt="{{$friendRequest->name}}" title="{{$friendRequest->name}}">--}}
                                  {{--@else--}}
                                      {{--<img class="img-thumbnail img-circle" src="{{'/uploads/users/'. $friendRequest->photo }}" alt="{{$friendRequest->name}}" title="{{$friendRequest->name}}" >--}}

                                  {{--@endif--}}
                              {{--</a>--}}
                              {{--<label class="name">--}}
                                  {{--<a href="{{"/profile/".$friendRequest->id}}">{{$friendRequest->name}}</a><br>--}}
                              {{--</label>--}}
                             {{--<label class="pull-right">--}}
                                {{--<form class="pull-right" role="form" method="POST" action="{{ url('/friend') }}">--}}
                                    {{--{{ csrf_field() }}--}}
                                    {{--<input type="hidden" name="friendId" value="{{$friendRequest->id}}">--}}
                                    {{--<input type="hidden" name="action" value="4">--}}
                                    {{--<button type="submit" class="btn btn-success btn-xs glyphicon glyphicon-trash ">--}}
                                         {{--Unblock--}}
                                    {{--</button>--}}
                                {{--</form>--}}

                             {{--</label>--}}
                             {{--<div class="break"></div>--}}
                           {{--</li>--}}
                      {{--@endforeach--}}
                      {{--<li href="#" class="list-group-item 222">--}}
                        {{--{!! $blockedFriends->links() !!}--}}
                       {{--</li>--}}




                    {{--</ul>--}}


                    {{--@else--}}
                    {{--<ul class="list-group">--}}
                       {{--<li href="#" class="list-group-item title">--}}
                           {{--New Friend Requests--}}
                       {{--</li>--}}

                       {{--<div class="row">--}}

                           {{--@foreach ($friendRequests as $friendRequest)--}}
                               {{--<li href="#" class="list-group-item text-left">--}}
                                   {{--<a href="{{"/profile/".$friendRequest->id}}">--}}
                                       {{--@if($friendRequest->photo == "")--}}
                                           {{--<img class="img-thumbnail img-circle" src="/uploads/users/default_user.png" alt="{{$friendRequest->name}}" title="{{$friendRequest->name}}">--}}
                                       {{--@else--}}
                                           {{--<img class="img-thumbnail img-circle" src="{{'/uploads/users/'. $friendRequest->photo }}" alt="{{$friendRequest->name}}" title="{{$friendRequest->name}}" >--}}

                                       {{--@endif--}}
                                   {{--</a>--}}
                                   {{--<label class="name">--}}
                                       {{--<a href="{{"/profile/".$friendRequest->id}}">{{$friendRequest->name}}</a><br>--}}
                                   {{--</label>--}}
                                   {{--<label class="pull-right">--}}
                                       {{--<form class="pull-right" role="form" method="POST"action="{{ url('/friend') }}">--}}
                                           {{--{{ csrf_field() }}--}}
                                           {{--<input type="hidden" name="friendId" value="{{$friendRequest->id}}">--}}
                                           {{--<input type="hidden" name="action" value="1">--}}
                                           {{--<button type="submit" class="btn btn-success btn-xs glyphicon glyphicon-ok ">--}}
                                               {{--<i class="fa fa-btn fa-user"></i> Accept--}}
                                           {{--</button>--}}
                                       {{--</form>--}}

                                       {{--<form class="pull-right" role="form" method="POST"  action="{{ url('/friend') }}">--}}
                                           {{--{{ csrf_field() }}--}}
                                           {{--<input type="hidden" name="friendId" value="{{$friendRequest->id}}">--}}
                                           {{--<input type="hidden" name="action" value="2">--}}
                                           {{--<button type="submit" class="btn btn-danger btn-xs glyphicon glyphicon-trash ">--}}
                                               {{--<i class="fa fa-btn fa-user"></i> Decline--}}
                                           {{--</button>--}}
                                       {{--</form>--}}

                                       {{--<form class="pull-right" role="form" method="POST"  action="{{ url('/friend') }}">--}}
                                           {{--{{ csrf_field() }}--}}
                                           {{--<input type="hidden" name="friendId" value="{{$friendRequest->id}}">--}}
                                           {{--<input type="hidden" name="action" value="3">--}}
                                           {{--<button type="submit" class="btn btn-danger btn-xs glyphicon glyphicon-hand-paper-o ">--}}
                                               {{--<i class="fa fa-btn fa-user"></i> Block--}}
                                           {{--</button>--}}
                                       {{--</form>--}}


                                   {{--</label>--}}
                                   {{--<div class="break"></div>--}}
                               {{--</li>--}}
                           {{--@endforeach--}}
                           {{--<li href="#" class="list-group-item ">--}}
                               {{--{!! $friendRequests->links() !!}--}}
                           {{--</li>--}}



                   {{--</ul>--}}

                    {{--<ul class="list-group">--}}
                     {{--<li href="#" class="list-group-item title">--}}
                       {{--People you invited--}}
                     {{--</li>--}}

                     {{--<div class="row">--}}

                     {{--@foreach ($sentFriendRequests as $friendRequest)--}}
                         {{--<li href="#" class="list-group-item text-left">--}}
                             {{--<a href="{{"/profile/".$friendRequest->id}}">--}}
                                 {{--@if($friendRequest->photo == "")--}}
                                     {{--<img class="img-thumbnail img-circle" src="/uploads/users/default_user.png" alt="{{$friendRequest->name}}" title="{{$friendRequest->name}}">--}}
                                 {{--@else--}}
                                     {{--<img class="img-thumbnail img-circle" src="{{'/uploads/users/'. $friendRequest->photo }}" alt="{{$friendRequest->name}}" title="{{$friendRequest->name}}" >--}}

                                 {{--@endif--}}
                             {{--</a>--}}
                             {{--<label class="name">--}}
                                 {{--<a href="{{"/profile/".$friendRequest->id}}">{{$friendRequest->name}}</a><br>--}}
                             {{--</label>--}}
                            {{--<label class="pull-right">--}}
                                {{--<form class="pull-right" role="form" method="POST"  action="{{ url('/friend') }}">--}}
                                    {{--{{ csrf_field() }}--}}
                                    {{--<input type="hidden" name="friendId" value="{{$friendRequest->id}}">--}}
                                    {{--<input type="hidden" name="action" value="5">--}}
                                    {{--<button type="submit" class="btn btn-danger btn-xs glyphicon glyphicon-trash ">--}}
                                        {{--Cancel--}}
                                    {{--</button>--}}
                                {{--</form>--}}
                                {{--<a  class="btn btn-success btn-xs glyphicon glyphicon-ok" href="#" title="View"></a>--}}
                                {{--<a  class="btn btn-danger  btn-xs glyphicon glyphicon-trash" href="#" title="Delete"></a>--}}
                                {{--<a  class="btn btn-info  btn-xs glyphicon glyphicon glyphicon-comment" href="#" title="Send message"></a>--}}
                            {{--</label>--}}
                            {{--<div class="break"></div>--}}
                          {{--</li>--}}
                     {{--@endforeach--}}
                     {{--<li href="#" class="list-group-item ">--}}
                       {{--{!! $sentFriendRequests->links() !!}--}}
                      {{--</li>--}}


                   {{--</ul>--}}

                    {{--<ul class="list-group">--}}
                      {{--<li href="#" class="list-group-item title">--}}
                        {{--My Friends--}}
                      {{--</li>--}}

                      {{--<div class="row">--}}

                      {{--@foreach ($friends as $friendRequest)--}}
                          {{--<li href="#" class="list-group-item text-left">--}}
                              {{--<a href="{{"/profile/".$friendRequest->id}}">--}}
                                  {{--@if($friendRequest->photo == "")--}}
                                      {{--<img class="img-thumbnail img-circle" src="/uploads/users/default_user.png" alt="{{$friendRequest->name}}" title="{{$friendRequest->name}}">--}}
                                  {{--@else--}}
                                      {{--<img class="img-thumbnail img-circle" src="{{'/uploads/users/'. $friendRequest->photo }}" alt="{{$friendRequest->name}}" title="{{$friendRequest->name}}" >--}}

                                  {{--@endif--}}
                              {{--</a>--}}
                              {{--<label class="name">--}}
                                  {{--<a href="{{"/profile/".$friendRequest->id}}">{{$friendRequest->name}}</a><br>--}}
                              {{--</label>--}}
                             {{--<label class="pull-right">--}}
                                {{--<form class="pull-right" role="form" method="POST" action="{{ url('/friend') }}">--}}
                                    {{--{{ csrf_field() }}--}}
                                    {{--<input type="hidden" name="friendId" value="{{$friendRequest->id}}">--}}
                                    {{--<input type="hidden" name="action" value="6">--}}
                                    {{--<button type="submit" class="btn btn-danger btn-xs glyphicon glyphicon-trash ">--}}
                                         {{--Remove--}}
                                    {{--</button>--}}
                                {{--</form>--}}

                                {{--<form class="pull-right" role="form" method="POST"  action="{{ url('/friend') }}">--}}
                                    {{--{{ csrf_field() }}--}}
                                    {{--<input type="hidden" name="friendId" value="{{$friendRequest->id}}">--}}
                                    {{--<input type="hidden" name="action" value="3">--}}
                                    {{--<button type="submit" class="btn btn-danger btn-xs glyphicon glyphicon-hand-paper-o ">--}}
                                        {{--<i class="fa fa-btn fa-user"></i> Block--}}
                                    {{--</button>--}}
                                {{--</form>--}}

                                 {{--<a  class="btn btn-success btn-xs glyphicon glyphicon-ok" href="#" title="View"></a>--}}
                                 {{--<a  class="btn btn-danger  btn-xs glyphicon glyphicon-trash" href="#" title="Delete"></a>--}}
                                 {{--<a  class="btn btn-info  btn-xs glyphicon glyphicon glyphicon-comment" href="#" title="Send message"></a>--}}
                             {{--</label>--}}
                             {{--<div class="break"></div>--}}
                           {{--</li>--}}
                      {{--@endforeach--}}
                      {{--<li href="#" class="list-group-item 222">--}}
                        {{--{!! $friends->links() !!}--}}
                       {{--</li>--}}



                    {{--</ul>--}}

                    {{--<ul class="list-group">--}}
                      {{--<li href="#" class="list-group-item title">--}}
                        {{--Blocked--}}
                      {{--</li>--}}

                      {{--<div class="row">--}}

                      {{--@foreach ($blockedFriends as $friendRequest)--}}
                          {{--<li href="#" class="list-group-item text-left">--}}
                              {{--<a href="{{"/profile/".$friendRequest->id}}">--}}
                                  {{--@if($friendRequest->photo == "")--}}
                                      {{--<img class="img-thumbnail img-circle" src="/uploads/users/default_user.png" alt="{{$friendRequest->name}}" title="{{$friendRequest->name}}">--}}
                                  {{--@else--}}
                                      {{--<img class="img-thumbnail img-circle" src="{{'/uploads/users/'. $friendRequest->photo }}" alt="{{$friendRequest->name}}" title="{{$friendRequest->name}}" >--}}

                                  {{--@endif--}}
                              {{--</a>--}}
                              {{--<label class="name">--}}
                                  {{--<a href="{{"/profile/".$friendRequest->id}}">{{$friendRequest->name}}</a><br>--}}
                              {{--</label>--}}
                             {{--<label class="pull-right">--}}
                                {{--<form class="pull-right" role="form" method="POST" action="{{ url('/friend') }}">--}}
                                    {{--{{ csrf_field() }}--}}
                                    {{--<input type="hidden" name="friendId" value="{{$friendRequest->id}}">--}}
                                    {{--<input type="hidden" name="action" value="4">--}}
                                    {{--<button type="submit" class="btn btn-success btn-xs glyphicon glyphicon-trash ">--}}
                                         {{--Unblock--}}
                                    {{--</button>--}}
                                {{--</form>--}}

                             {{--</label>--}}
                             {{--<div class="break"></div>--}}
                           {{--</li>--}}
                      {{--@endforeach--}}
                      {{--<li href="#" class="list-group-item 222">--}}
                        {{--{!! $blockedFriends->links() !!}--}}
                       {{--</li>--}}




                    {{--</ul>--}}

                    {{--@endif--}}



             {{--</div>--}}



            {{--</div>--}}
        {{--</section>--}}






@endsection

@section('footer')
<script src="{{ asset('js/select2.full.min.js') }}"></script>
<script>

 $('.btn-tab-challenge').on('click', function (e) {
        $('.btn-tab-challenge').removeClass('active');
        $(e.currentTarget).addClass('active');
    })

    $(function() {
        // for bootstrap 3 use 'shown.bs.tab', for bootstrap 2 use 'shown' in the next line
        $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            // save the latest tab; use cookies if you like 'em better:
            localStorage.setItem('lastTab', $(this).attr('href'));
        });

        // go to the latest tab, if it exists:
        var lastTab = localStorage.getItem('lastTab');
        if (lastTab) {
            $('[href="' + lastTab + '"]').tab('show');
            $('.btn-tab-challenge').removeClass('active');
                    $('[href="' + lastTab + '"]').addClass('active');
        }
    });




    var search = $(".js-data-example-ajax").select2({
        ajax: {
          url: "{{ action('HomeController@searchFriend') }}",
          dataType: 'json',
          delay: 250,
          selectOnClose: true,
          selectOnBlur: true,
          tags: false,
          maximumSelectionLength: 0,
          multiple: false,
          data: function (params) {
          console.log('params:'+params);
            return {
              q: params.term, // search term
              page: params.page
            };
          },
          processResults: function (data, params) {
          console.log('data:'+data);


            return {
              results: $.map(data, function(obj) {
                            if(obj.name.toLowerCase().indexOf(params.term.toLowerCase()) > -1)
                          return { id: obj.id, name: obj.name, photo: obj.photo };
                      })

            };
          },
          cache: true
        },
        placeholder: "Search Friend",
        escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
        minimumInputLength: 1,
        templateResult: formatRepo, // omitted for brevity, see the source of this page
        templateSelection: formatRepoSelection // omitted for brevity, see the source of this page
      });

function formatRepo (repo) {
      if (repo.loading) return;

        if(repo.name == repo.id)
            return;
        if(repo.selected)
        return;
        if(repo.name == null)
         return;

    var url = (repo.photo == "")? "/uploads/users/default_user.png" : "/uploads/users/"+repo.photo;

    var markup =
        "<img class='search-img' src='"+url +"' />"+

        "<span class='k-state-default'><h3>"+repo.name+"</h3></span>";


//      var markup = "<a class='detail-link' href='/profile/"+repo.id+"'>"+
//      "<div class='select2-result-repository clearfix'>" +
//        "<div class='select2-result-repository__avatar'><img style='width: 100px; height: 100px' src='"+url +"' /></div>" +
//        "<div class='select2-result-repository__meta'>" +
//          "<div class='select2-result-repository__title'>" + repo.name + "</div>";
//
//      "</div></div></a>";

      return markup;
    }

    function formatRepoSelection (repo) {
        if(repo.name == null)
            return repo.id;
        return repo.name;
    }

    search.onSelect = (function(fn) {
            return function(data, options) {
                var target;

                if (options != null) {
                    target = $(options.target);
                }

                if (target && target.hasClass('detail-link')) {
                    window.location = target.attr('href');
                } else {
                    return fn.apply(this, arguments);
                }
            }
        })(search.onSelect);

    $('.js-data-example-ajax').on('select2:select', function (evt) {
        window.location = "/profile/"+evt.params.data.id;
    });

</script>


@endsection


