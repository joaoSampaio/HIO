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

/*<link rel="stylesheet" href="https://rawgit.com/enyo/dropzone/master/dist/dropzone.css">*/
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

  </style>
<link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
@endsection

@section('content')




        <section>
            <div class="container">

               <div class="jumbotron list-content">


                   <ul class="list-group">
                       <li href="#" class="list-group-item title text-right search-select2">
                           {!! Form::select('emailFriend[]', array(),null,array('required', 'data-validation'=>'required',  'class'=>'form-control js-data-example-ajax', 'multiple'=>'multiple')) !!}

                       </li>
                   </ul>

                    @if(Auth::user()->role == "trainer")

                    <ul class="list-group">
                       <li href="#" class="list-group-item title">
                           Followers
                       </li>

                       <div class="row">

                           @foreach ($friendRequests as $friendRequest)
                               <li href="#" class="list-group-item text-left">
                                   <a href="{{"/profile/".$friendRequest->id}}">
                                       @if($friendRequest->photo == "")
                                           <img class="img-thumbnail img-circle" src="/uploads/users/default_user.png" alt="{{$friendRequest->name}}" title="{{$friendRequest->name}}">
                                       @else
                                           <img class="img-thumbnail img-circle" src="{{'/uploads/users/'. $friendRequest->photo }}" alt="{{$friendRequest->name}}" title="{{$friendRequest->name}}" >

                                       @endif
                                   </a>
                                   <label class="name">
                                       <a href="{{"/profile/".$friendRequest->id}}">{{$friendRequest->name}}</a><br>
                                   </label>
                                   <label class="pull-right">

                                       <form class="pull-right" role="form" method="POST"  action="{{ url('/friend') }}">
                                           {{ csrf_field() }}
                                           <input type="hidden" name="friendId" value="{{$friendRequest->id}}">
                                           <input type="hidden" name="action" value="3">
                                           <button type="submit" class="btn btn-danger btn-xs glyphicon glyphicon-hand-paper-o ">
                                               <i class="fa fa-btn fa-user"></i> Block
                                           </button>
                                       </form>


                                   </label>
                                   <div class="break"></div>
                               </li>
                           @endforeach
                           <li href="#" class="list-group-item ">
                               {!! $friendRequests->links() !!}
                           </li>



                   </ul>

                    <ul class="list-group">
                      <li href="#" class="list-group-item title">
                        Blocked
                      </li>

                      <div class="row">

                      @foreach ($blockedFriends as $friendRequest)
                          <li href="#" class="list-group-item text-left">
                              <a href="{{"/profile/".$friendRequest->id}}">
                                  @if($friendRequest->photo == "")
                                      <img class="img-thumbnail img-circle" src="/uploads/users/default_user.png" alt="{{$friendRequest->name}}" title="{{$friendRequest->name}}">
                                  @else
                                      <img class="img-thumbnail img-circle" src="{{'/uploads/users/'. $friendRequest->photo }}" alt="{{$friendRequest->name}}" title="{{$friendRequest->name}}" >

                                  @endif
                              </a>
                              <label class="name">
                                  <a href="{{"/profile/".$friendRequest->id}}">{{$friendRequest->name}}</a><br>
                              </label>
                             <label class="pull-right">
                                <form class="pull-right" role="form" method="POST" action="{{ url('/friend') }}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="friendId" value="{{$friendRequest->id}}">
                                    <input type="hidden" name="action" value="4">
                                    <button type="submit" class="btn btn-success btn-xs glyphicon glyphicon-trash ">
                                         Unblock
                                    </button>
                                </form>

                             </label>
                             <div class="break"></div>
                           </li>
                      @endforeach
                      <li href="#" class="list-group-item 222">
                        {!! $blockedFriends->links() !!}
                       </li>




                    </ul>


                    @else
                    <ul class="list-group">
                       <li href="#" class="list-group-item title">
                           New Friend Requests
                       </li>

                       <div class="row">

                           @foreach ($friendRequests as $friendRequest)
                               <li href="#" class="list-group-item text-left">
                                   <a href="{{"/profile/".$friendRequest->id}}">
                                       @if($friendRequest->photo == "")
                                           <img class="img-thumbnail img-circle" src="/uploads/users/default_user.png" alt="{{$friendRequest->name}}" title="{{$friendRequest->name}}">
                                       @else
                                           <img class="img-thumbnail img-circle" src="{{'/uploads/users/'. $friendRequest->photo }}" alt="{{$friendRequest->name}}" title="{{$friendRequest->name}}" >

                                       @endif
                                   </a>
                                   <label class="name">
                                       <a href="{{"/profile/".$friendRequest->id}}">{{$friendRequest->name}}</a><br>
                                   </label>
                                   <label class="pull-right">
                                       <form class="pull-right" role="form" method="POST"action="{{ url('/friend') }}">
                                           {{ csrf_field() }}
                                           <input type="hidden" name="friendId" value="{{$friendRequest->id}}">
                                           <input type="hidden" name="action" value="1">
                                           <button type="submit" class="btn btn-success btn-xs glyphicon glyphicon-ok ">
                                               <i class="fa fa-btn fa-user"></i> Accept
                                           </button>
                                       </form>

                                       <form class="pull-right" role="form" method="POST"  action="{{ url('/friend') }}">
                                           {{ csrf_field() }}
                                           <input type="hidden" name="friendId" value="{{$friendRequest->id}}">
                                           <input type="hidden" name="action" value="2">
                                           <button type="submit" class="btn btn-danger btn-xs glyphicon glyphicon-trash ">
                                               <i class="fa fa-btn fa-user"></i> Decline
                                           </button>
                                       </form>

                                       <form class="pull-right" role="form" method="POST"  action="{{ url('/friend') }}">
                                           {{ csrf_field() }}
                                           <input type="hidden" name="friendId" value="{{$friendRequest->id}}">
                                           <input type="hidden" name="action" value="3">
                                           <button type="submit" class="btn btn-danger btn-xs glyphicon glyphicon-hand-paper-o ">
                                               <i class="fa fa-btn fa-user"></i> Block
                                           </button>
                                       </form>


                                   </label>
                                   <div class="break"></div>
                               </li>
                           @endforeach
                           <li href="#" class="list-group-item ">
                               {!! $friendRequests->links() !!}
                           </li>



                   </ul>

                    <ul class="list-group">
                     <li href="#" class="list-group-item title">
                       People you invited
                     </li>

                     <div class="row">

                     @foreach ($sentFriendRequests as $friendRequest)
                         <li href="#" class="list-group-item text-left">
                             <a href="{{"/profile/".$friendRequest->id}}">
                                 @if($friendRequest->photo == "")
                                     <img class="img-thumbnail img-circle" src="/uploads/users/default_user.png" alt="{{$friendRequest->name}}" title="{{$friendRequest->name}}">
                                 @else
                                     <img class="img-thumbnail img-circle" src="{{'/uploads/users/'. $friendRequest->photo }}" alt="{{$friendRequest->name}}" title="{{$friendRequest->name}}" >

                                 @endif
                             </a>
                             <label class="name">
                                 <a href="{{"/profile/".$friendRequest->id}}">{{$friendRequest->name}}</a><br>
                             </label>
                            <label class="pull-right">
                                <form class="pull-right" role="form" method="POST"  action="{{ url('/friend') }}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="friendId" value="{{$friendRequest->id}}">
                                    <input type="hidden" name="action" value="5">
                                    <button type="submit" class="btn btn-danger btn-xs glyphicon glyphicon-trash ">
                                        Cancel
                                    </button>
                                </form>
                                {{--<a  class="btn btn-success btn-xs glyphicon glyphicon-ok" href="#" title="View"></a>--}}
                                {{--<a  class="btn btn-danger  btn-xs glyphicon glyphicon-trash" href="#" title="Delete"></a>--}}
                                {{--<a  class="btn btn-info  btn-xs glyphicon glyphicon glyphicon-comment" href="#" title="Send message"></a>--}}
                            </label>
                            <div class="break"></div>
                          </li>
                     @endforeach
                     <li href="#" class="list-group-item ">
                       {!! $sentFriendRequests->links() !!}
                      </li>


                   </ul>

                    <ul class="list-group">
                      <li href="#" class="list-group-item title">
                        My Friends
                      </li>

                      <div class="row">

                      @foreach ($friends as $friendRequest)
                          <li href="#" class="list-group-item text-left">
                              <a href="{{"/profile/".$friendRequest->id}}">
                                  @if($friendRequest->photo == "")
                                      <img class="img-thumbnail img-circle" src="/uploads/users/default_user.png" alt="{{$friendRequest->name}}" title="{{$friendRequest->name}}">
                                  @else
                                      <img class="img-thumbnail img-circle" src="{{'/uploads/users/'. $friendRequest->photo }}" alt="{{$friendRequest->name}}" title="{{$friendRequest->name}}" >

                                  @endif
                              </a>
                              <label class="name">
                                  <a href="{{"/profile/".$friendRequest->id}}">{{$friendRequest->name}}</a><br>
                              </label>
                             <label class="pull-right">
                                <form class="pull-right" role="form" method="POST" action="{{ url('/friend') }}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="friendId" value="{{$friendRequest->id}}">
                                    <input type="hidden" name="action" value="6">
                                    <button type="submit" class="btn btn-danger btn-xs glyphicon glyphicon-trash ">
                                         Remove
                                    </button>
                                </form>

                                <form class="pull-right" role="form" method="POST"  action="{{ url('/friend') }}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="friendId" value="{{$friendRequest->id}}">
                                    <input type="hidden" name="action" value="3">
                                    <button type="submit" class="btn btn-danger btn-xs glyphicon glyphicon-hand-paper-o ">
                                        <i class="fa fa-btn fa-user"></i> Block
                                    </button>
                                </form>

                                 {{--<a  class="btn btn-success btn-xs glyphicon glyphicon-ok" href="#" title="View"></a>--}}
                                 {{--<a  class="btn btn-danger  btn-xs glyphicon glyphicon-trash" href="#" title="Delete"></a>--}}
                                 {{--<a  class="btn btn-info  btn-xs glyphicon glyphicon glyphicon-comment" href="#" title="Send message"></a>--}}
                             </label>
                             <div class="break"></div>
                           </li>
                      @endforeach
                      <li href="#" class="list-group-item 222">
                        {!! $friends->links() !!}
                       </li>



                    </ul>

                    <ul class="list-group">
                      <li href="#" class="list-group-item title">
                        Blocked
                      </li>

                      <div class="row">

                      @foreach ($blockedFriends as $friendRequest)
                          <li href="#" class="list-group-item text-left">
                              <a href="{{"/profile/".$friendRequest->id}}">
                                  @if($friendRequest->photo == "")
                                      <img class="img-thumbnail img-circle" src="/uploads/users/default_user.png" alt="{{$friendRequest->name}}" title="{{$friendRequest->name}}">
                                  @else
                                      <img class="img-thumbnail img-circle" src="{{'/uploads/users/'. $friendRequest->photo }}" alt="{{$friendRequest->name}}" title="{{$friendRequest->name}}" >

                                  @endif
                              </a>
                              <label class="name">
                                  <a href="{{"/profile/".$friendRequest->id}}">{{$friendRequest->name}}</a><br>
                              </label>
                             <label class="pull-right">
                                <form class="pull-right" role="form" method="POST" action="{{ url('/friend') }}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="friendId" value="{{$friendRequest->id}}">
                                    <input type="hidden" name="action" value="4">
                                    <button type="submit" class="btn btn-success btn-xs glyphicon glyphicon-trash ">
                                         Unblock
                                    </button>
                                </form>

                             </label>
                             <div class="break"></div>
                           </li>
                      @endforeach
                      <li href="#" class="list-group-item 222">
                        {!! $blockedFriends->links() !!}
                       </li>




                    </ul>

                    @endif



             </div>



            </div>
        </section>






@endsection

@section('footer')
<script src="{{ asset('js/select2.full.min.js') }}"></script>
<script>

    var search = $(".js-data-example-ajax").select2({
        ajax: {
          url: "{{ action('HomeController@searchFriend') }}",
          dataType: 'json',
          delay: 250,
          allowClear: true,
          data: function (params) {
          console.log('params:'+params);
            return {
              q: params.term, // search term
              page: params.page
            };
          },
          processResults: function (data, params) {
          console.log('data:'+data);
            // parse the results into the format expected by Select2
            // since we are using custom formatting functions we do not need to
            // alter the remote JSON data, except to indicate that infinite
            // scrolling can be used
            //params.page = params.page || 1;

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
        tags: true,
        tokenSeparators: [',','\n', '\t'],
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
      var markup = "<a class='detail-link' href='/profile/"+repo.id+"'>"+
      "<div class='select2-result-repository clearfix'>" +
        "<div class='select2-result-repository__avatar'><img style='width: 100px; height: 100px' src='"+url +"' /></div>" +
        "<div class='select2-result-repository__meta'>" +
          "<div class='select2-result-repository__title'>" + repo.name + "</div>";

      "</div></div></a>";

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


