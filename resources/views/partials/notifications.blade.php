
@foreach ($notifications as $notification)
    {{--<a class="content" href="#">--}}

    @if($notification->type == 0)


            <div class="notification-item {{$notification->unread == 1? "unread":"read"}}">
                <a class="content" href="/friends" data-notification="{{ $notification->id}}"><span class="clickable"></span></a>
                <h4 class="item-title"><time class="timeago" datetime="{{$notification->created_at}}">July 17, 2008</time></h4>
                <p class="item-info">
                    <a class="clickable-link" href="/profile/{{$notification->sender_id}}" data-notification="{{ $notification->id}}">{{ $notification->name}}</a> has sent you a <a class="clickable-link" href="/friends" data-notification="{{ $notification->id}}">friend request</a>
                </p>
            </div>

    @elseif($notification->type == 1)
            <div class="notification-item {{$notification->unread == 1? "unread":"read"}}">
                <a href="/proof/0/{{ $notification->reference_id}}" data-notification="{{ $notification->id}}"><span class="clickable"></span></a>

                <h4 class="item-title"><time class="timeago" datetime="{{$notification->created_at}}">July 17, 2008</time></h4>
                    <p class="item-info">
                        <a class="clickable-link" href="/profile/{{$notification->sender_id}}" data-notification="{{ $notification->id}}">{{ $notification->name}}</a> has liked your <a class="clickable-link" href="/proof/0/{{ $notification->reference_id}}" data-notification="{{ $notification->id}}">challenge</a>
                    </p>
            </div>

    @elseif($notification->type == 2)

            <div class="notification-item {{$notification->unread == 1? "unread":"read"}}">
                <a href="/challenge/{{ $notification->reference_id}}" data-notification="{{ $notification->id}}"><span class="clickable"></span></a>
                <h4 class="item-title"><time class="timeago" datetime="{{$notification->created_at}}">July 17, 2008</time></h4>

                    <p class="item-info">
                        <a class="clickable-link" href="/profile/{{$notification->sender_id}}" data-notification="{{ $notification->id}}">{{ $notification->name}}</a> has challenged you to <a class="clickable-link" href="/challenge/{{ $notification->reference_id}}" data-notification="{{ $notification->id}}">{{$notification->parameters}}</a>
                    </p>
            </div>

    @endif



@endforeach


