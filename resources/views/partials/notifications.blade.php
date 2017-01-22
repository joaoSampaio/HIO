
<span id="numberUnread" class="hidden" data-number-unread="{{$numberUnread}}"></span>
@foreach ($notifications as $notification)
    {{--<a class="content" href="#">--}}

    @if($notification->type == 0)


            {{--<div class="notification-item {{$notification->unread == 1? "unread":"read"}}">--}}
                {{--<a class="content" href="/friends" data-notification="{{ $notification->id}}"><span class="clickable"></span></a>--}}
                {{--<h4 class="item-title"><time class="timeago" datetime="{{$notification->created_at}}">July 17, 2008</time></h4>--}}
                {{--<p class="item-info">--}}
                    {{--<a class="clickable-link" href="/profile/{{$notification->sender_id}}" data-notification="{{ $notification->id}}">{{ $notification->name}}</a> --}}
                    {{--has sent you a <a class="clickable-link" href="/friends" data-notification="{{ $notification->id}}">friend request</a>--}}
                {{--</p>--}}
            {{--</div>--}}

            <div class="notification-item row notification-text">
                <a href="/friends" data-notification="{{ $notification->id}}"><span class="clickable"></span></a>

                <div class="col-sm-1 col-md-1">
                    <i class="fa fa-circle {{$notification->unread == 1? "unread":"read"}}" aria-hidden="true" style=" margin-top: 22px;"></i>
                </div>

                <div class="col-sm-3 col-md-3">
                    <a class="clickable-link" href="/profile/{{$notification->sender_id}}" data-notification="{{ $notification->id}}">
                        <img src="/uploads/users/default_user.png"  class="img-circle img-responsive clickable-link">
                    </a>
                </div>

                <div class="col-sm-8 col-md-8 text-color1" >
                    <a class="clickable-link" href="/profile/{{$notification->sender_id}}" data-notification="{{ $notification->id}}">{{ $notification->name}}</a> has sent you a
                    <a class="clickable-link" href="/friends" data-notification="{{ $notification->id}}">friend request</a>

                    <p><time class="timeago notification-time" datetime="{{$notification->created_at}}">July 17, 2008</time></p>
                </div>
            </div>

    @elseif($notification->type == 1)
            {{--<div class="notification-item {{$notification->unread == 1? "unread":"read"}}">--}}
                {{--<a href="/proof/0/{{ $notification->reference_id}}" data-notification="{{ $notification->id}}"><span class="clickable"></span></a>--}}

                {{--<h4 class="item-title"><time class="timeago" datetime="{{$notification->created_at}}">July 17, 2008</time></h4>--}}
                    {{--<p class="item-info">--}}
                        {{--<a class="clickable-link" href="/profile/{{$notification->sender_id}}" data-notification="{{ $notification->id}}">{{ $notification->name}}</a> has liked your --}}
                        {{--<a class="clickable-link" href="/proof/0/{{ $notification->reference_id}}" data-notification="{{ $notification->id}}">challenge</a>--}}
                    {{--</p>--}}
            {{--</div>--}}

            <div class="notification-item row notification-text">
                <a href="/proof/0/{{ $notification->reference_id}}" data-notification="{{ $notification->id}}"><span class="clickable"></span></a>

                <div class="col-sm-1 col-md-1">
                    <i class="fa fa-circle {{$notification->unread == 1? "unread":"read"}}" aria-hidden="true" style=" margin-top: 22px;"></i>
                </div>

                <div class="col-sm-3 col-md-3">
                    <a class="clickable-link" href="/profile/{{$notification->sender_id}}" data-notification="{{ $notification->id}}">
                        <img src="/uploads/users/default_user.png"  class="img-circle img-responsive clickable-link">
                    </a>
                </div>

                <div class="col-sm-8 col-md-8 text-color1" >
                    <a class="clickable-link" href="/profile/{{$notification->sender_id}}" data-notification="{{ $notification->id}}">{{ $notification->name}}</a> liked your
                    <a class="clickable-link" href="/proof/0/{{ $notification->reference_id}}" data-notification="{{ $notification->id}}">challenge</a>

                    <p><time class="timeago notification-time" datetime="{{$notification->created_at}}">July 17, 2008</time></p>
                </div>
            </div>

    @elseif($notification->type == 2)

        <div class="notification-item row notification-text">
            <a href="/challenge/{{ $notification->reference_id}}" data-notification="{{ $notification->id}}"><span class="clickable"></span></a>

            <div class="col-sm-1 col-md-1">
                <i class="fa fa-circle {{$notification->unread == 1? "unread":"read"}}" aria-hidden="true" style=" margin-top: 22px;"></i>
            </div>

            <div class="col-sm-3 col-md-3">
                <a class="clickable-link" href="/profile/{{$notification->sender_id}}" data-notification="{{ $notification->id}}">
                    <img src="/uploads/users/default_user.png"  class="img-circle img-responsive clickable-link">
                </a>
            </div>

            <div class="col-sm-8 col-md-8 text-color1" >
                <a class="clickable-link" href="/profile/{{$notification->sender_id}}" data-notification="{{ $notification->id}}">{{ $notification->name}}</a> challenged you to
                <br>
                <a class="clickable-link" href="/challenge/{{ $notification->reference_id}}" data-notification="{{ $notification->id}}">{{truncateString($notification->parameters, 25)}}</a>

                <p><time class="timeago notification-time" datetime="{{$notification->created_at}}">July 17, 2008</time></p>
            </div>
        </div>



            {{--<div class="notification-item {{$notification->unread == 1? "unread":"read"}}">--}}
                {{--<a href="/challenge/{{ $notification->reference_id}}" data-notification="{{ $notification->id}}"><span class="clickable"></span></a>--}}
                {{--<h4 class="item-title"><time class="timeago" datetime="{{$notification->created_at}}">July 17, 2008</time></h4>--}}

                    {{--<p class="item-info">--}}
                        {{--<a class="clickable-link" href="/profile/{{$notification->sender_id}}" data-notification="{{ $notification->id}}">{{ $notification->name}}</a> has challenged you to <br><a class="clickable-link" href="/challenge/{{ $notification->reference_id}}" data-notification="{{ $notification->id}}">{{$notification->parameters}}</a>--}}
                    {{--</p>--}}
            {{--</div>--}}

    @endif
    <li class="divider"></li>


@endforeach


