@if($friends->count() == 0)
    <div class="col-md-12 text-center" >
        <label class="">
            No results
        </label>
    </div>
@endif

@foreach ($friends as $friend)
    <div class="col-md-12 text-left" >
        <a href="{{"/profile/".$friend->id}}">
           <img class="img-thumbnail img-circle" src="{{'/user/photo/'. $friend->id }}" alt="{{$friend->name}}" title="{{$friend->name}}" >
        </a>
        <label class="name">
            <a href="{{"/profile/".$friend->id}}">{{$friend->name}}</a><br>
        </label>
        <label class="pull-right">
            @if($type == "block_tab")
                <form class="pull-right" role="form" method="POST" action="{{ url('/friend') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="friendId" value="{{$friend->id}}">
                    <input type="hidden" name="action" value="4">
                    <button type="submit" class="btn btn-success">

                        <i class="fa fa-btn fa-times" title="Unblock"></i>
                    </button>
                </form>
            @elseif($type == "friend_tab")
                <form class="pull-right" role="form" method="POST" action="{{ url('/friend') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="friendId" value="{{$friend->id}}">
                    <input type="hidden" name="action" value="6">
                    <button type="submit" class="btn btn-danger">
                        <i class="fa fa-btn fa-times" title="Decline"></i>
                    </button>
                </form>

                <form class="pull-right" role="form" method="POST"  action="{{ url('/friend') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="friendId" value="{{$friend->id}}">
                    <input type="hidden" name="action" value="3">
                    <button type="submit" class="btn btn-danger ">
                        <i class="fa fa-btn fa-stop" title="Block"></i>
                    </button>
                </form>

            @elseif($type == "invite_tab")
                <form class="pull-right" role="form" method="POST"  action="{{ url('/friend') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="friendId" value="{{$friend->id}}">
                    <input type="hidden" name="action" value="5">
                    <button type="submit" class="btn btn-danger">
                        <i class="fa fa-btn fa-times" title="Decline"></i>
                    </button>
                </form>

            @elseif($type == "request_tab")
                <form class="pull-right" role="form" method="POST"action="{{ url('/friend') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="friendId" value="{{$friend->id}}">
                    <input type="hidden" name="action" value="1">
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-btn fa-check" title="Accept"></i>
                    </button>
                </form>

                <form class="pull-right" role="form" method="POST"  action="{{ url('/friend') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="friendId" value="{{$friend->id}}">
                    <input type="hidden" name="action" value="2">
                    <button type="submit" class="btn btn-danger">
                        <i class="fa fa-btn fa-times" title="Decline"></i>
                    </button>
                </form>

                <form class="pull-right" role="form" method="POST"  action="{{ url('/friend') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="friendId" value="{{$friend->id}}">
                    <input type="hidden" name="action" value="3">
                    <button type="submit" class="btn btn-danger ">
                        <i class="fa fa-btn fa-stop" title="Block"></i>
                    </button>
                </form>
            @endif


        </label>
        <div class="break"></div>
    </div>
@endforeach
<div  href="#" class=" col-md-12">
    {!! $friends->links() !!}
</div>