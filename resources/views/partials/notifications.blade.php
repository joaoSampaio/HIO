
@foreach ($notifications as $notification)
    {{--<a class="content" href="#">--}}

    <div class="notification-item {{$notification->unread == 1? "unread":"read"}}">
            <h4 class="item-title"><time class="timeago" datetime="{{$notification->created_at}}">July 17, 2008</time></h4>
            @if($notification->type == 0)
                    <p class="item-info">
                        <a href="/profile/{{$notification->sender_id}}" data-notification="{{ $notification->id}}">{{ $notification->name}}</a> has sent you a <a href="/friends" data-notification="{{ $notification->id}}">friend request</a>
                    </p>
            @elseif($notification->type == 1)
                    <p class="item-info">
                            <a href="/profile/{{$notification->sender_id}}" data-notification="{{ $notification->id}}">{{ $notification->name}}</a> has liked your <a href="/proof/0/{{ $notification->reference_id}}" data-notification="{{ $notification->id}}">challenge</a>
                    </p>
            @elseif($notification->type == 2)
                <p class="item-info">
                    <a href="/profile/{{$notification->sender_id}}" data-notification="{{ $notification->id}}">{{ $notification->name}}</a> has challenged you to <a href="/challenge/{{ $notification->reference_id}}" data-notification="{{ $notification->id}}">{{$notification->parameters}}</a>
                </p>
            @endif
    </div>

    {{--</a>--}}

</li>
@endforeach


