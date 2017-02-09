

@foreach ($notifications as $notification)
    {{--<a class="content" href="#">--}}
    <li class="divider"></li>
    @if($notification->type == 0)

        <div class="notification-item row notification-text">
                <a href="/friends" data-notification="{{ $notification->id}}"><span class="clickable"></span></a>

                <div class="col-sm-1 col-md-1">
                    <i class="fa fa-circle {{$notification->unread == 1? "unread":"read"}}" aria-hidden="true" ></i>
                </div>

                <div class="col-sm-2 col-md-2">
                    <a class="clickable-link" href="/profile/{{$notification->sender_id}}" data-notification="{{ $notification->id}}">
                        <img src="/user/photo/{{$notification->sender_id}}"  class="img-circle img-responsive clickable-link">
                    </a>
                </div>

                <div class="col-sm-9 col-md-9 text-color1" >
                    <a class="clickable-link" href="/profile/{{$notification->sender_id}}" data-notification="{{ $notification->id}}">{{ $notification->name}}</a> has sent you a
                    <a class="clickable-link" href="/friends" data-notification="{{ $notification->id}}">friend request</a>
                    <br>
                    <time class="timeago notification-time" datetime="{{$notification->created_at}}">July 17, 2008</time>
                </div>
            </div>

    @elseif($notification->type == 1)


        <div class="notification-item row notification-text">
                <a href="/proof/0/{{ $notification->reference_id}}" data-notification="{{ $notification->id}}"><span class="clickable"></span></a>

                <div class="col-sm-1 col-md-1">
                    <i class="fa fa-circle {{$notification->unread == 1? "unread":"read"}}" aria-hidden="true"></i>
                </div>

                <div class="col-sm-2 col-md-2">
                    <a class="clickable-link" href="/profile/{{$notification->sender_id}}" data-notification="{{ $notification->id}}">
                        <img src="/user/photo/{{$notification->sender_id}}"  class="img-circle img-responsive clickable-link">
                    </a>
                </div>

                <div class="col-sm-9 col-md-9 text-color1" >
                    <a class="clickable-link" href="/profile/{{$notification->sender_id}}" data-notification="{{ $notification->id}}">{{ $notification->name}}</a> liked your
                    <a class="clickable-link" href="/proof/0/{{ $notification->reference_id}}" data-notification="{{ $notification->id}}">challenge</a>
                    <br>
                    <time class="timeago notification-time" datetime="{{$notification->created_at}}">July 17, 2008</time>
                </div>
            </div>

    @elseif($notification->type == 2)
        {{--desafio--}}

        <div class="notification-item row notification-text">
            <a href="/challenge/{{ $notification->reference_id}}" data-notification="{{ $notification->id}}"><span class="clickable"></span></a>

            <div class="col-sm-1 col-md-1">
                <i class="fa fa-circle {{$notification->unread == 1? "unread":"read"}}" aria-hidden="true"></i>
            </div>

            <div class="col-sm-2 col-md-2">
                <a class="clickable-link" href="/profile/{{$notification->sender_id}}" data-notification="{{ $notification->id}}">
                    <img src="/user/photo/{{$notification->sender_id}}"  class="img-circle img-responsive clickable-link">
                </a>
            </div>

            <div class="col-sm-9 col-md-9 text-color1" >
                <a class="clickable-link" href="/profile/{{$notification->sender_id}}" data-notification="{{ $notification->id}}">{{ $notification->name}}</a> challenged you to
                <br>
                <a class="clickable-link" href="/challenge/{{ $notification->reference_id}}" data-notification="{{ $notification->id}}">{{truncateString($notification->parameters, 25)}}</a>
                <br>
                <time class="timeago notification-time" datetime="{{$notification->created_at}}">July 17, 2008</time>
            </div>
        </div>

    @elseif($notification->type == 3)
        {{--comment--}}
        <div class="notification-item row notification-text">
            <a href="/proof/0/{{ $notification->reference_id}}" data-notification="{{ $notification->id}}"><span class="clickable"></span></a>

            <div class="col-sm-1 col-md-1">
                <i class="fa fa-circle {{$notification->unread == 1? "unread":"read"}}" aria-hidden="true"></i>
            </div>

            <div class="col-sm-2 col-md-2">
                <a class="clickable-link" href="/profile/{{$notification->sender_id}}" data-notification="{{ $notification->id}}">
                    <img src="/user/photo/{{$notification->sender_id}}"  class="img-circle img-responsive clickable-link">
                </a>
            </div>

            <div class="col-sm-9 col-md-9 text-color1" >
                <a class="clickable-link" href="/profile/{{$notification->sender_id}}" data-notification="{{ $notification->id}}">{{ $notification->name}}</a> wrote a new comment:
                <br>
                <a class="clickable-link" href="/proof/0/{{ $notification->reference_id}}" data-notification="{{ $notification->id}}">{{truncateString($notification->parameters, 25)}}</a>
                <br>
                <time class="timeago notification-time" datetime="{{$notification->created_at}}">July 17, 2008</time>
            </div>
        </div>
        @elseif($notification->type == 4)
            {{--new upload--}}
            <div class="notification-item row notification-text">
                <a href="/proof/0/{{ $notification->reference_id}}" data-notification="{{ $notification->id}}"><span class="clickable"></span></a>

                <div class="col-sm-1 col-md-1">
                    <i class="fa fa-circle {{$notification->unread == 1? "unread":"read"}}" aria-hidden="true"></i>
                </div>

                <div class="col-sm-2 col-md-2">
                    <a class="clickable-link" href="/profile/{{$notification->sender_id}}" data-notification="{{ $notification->id}}">
                        <img src="/user/photo/{{$notification->sender_id}}"  class="img-circle img-responsive clickable-link">
                    </a>
                </div>

                <div class="col-sm-9 col-md-9 text-color1" >
                    <a class="clickable-link" href="/profile/{{$notification->sender_id}}" data-notification="{{ $notification->id}}">{{ $notification->name}}</a> uploaded a new proof to:
                    <a class="clickable-link" href="/proof/0/{{ $notification->reference_id}}" data-notification="{{ $notification->id}}">{{truncateString($notification->parameters, 25)}}</a>
                    <br>
                    <time class="timeago notification-time" datetime="{{$notification->created_at}}">July 17, 2008</time>
                </div>
            </div>
        @endif



@endforeach
<span id="numberUnread" class="hidden" data-number-unread="{{$numberUnread}}"></span>
<span id="highest_id" class="hidden" data-highest-id="{{$max_id}}"></span>

