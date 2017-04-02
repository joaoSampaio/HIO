@foreach ($challenges as $challenge)
     <div class="col-lg-12 col-xs-12 proves pointer">
        <a class=" open-iframe" href="{{ action('SonChallengeController@showSonChallenge', [ 'uuid' => $challenge->uuid, 'user_id'=>$challenge->id]) }}" ><span class="clickable"></span></a>
        <div class="col-lg-2 col-xs-2 no-padding">
            <a href="{{"/profile/".$challenge->user_id}}" class="pull-left clickable-link" style="font-size: 14px;">
                <img src="/user/photo/{{$challenge->user_id}}" class=" img-circle img-responsive">
            </a>
        </div>
        <div class="col-lg-10 col-xs-10 no-padding">
            <span style="font-size: 20px;">"{{$challenge->title}}"</span>
            <br>

            <div style="margin-top: 15px">
                <a href="{{"/profile/".$challenge->user_id}}" class="pull-left clickable-link">{{$challenge->name}}</a>

                <span class="pull-right proves-icon" >{{$challenge->views}} <i class="fa fa-eye primary pointer challenge-views clickable-link" data-toggle="tooltip" data-placement="top" title="" data-id="{{$challenge->id}}" style="padding-left: 5px"></i></span>
            </div>
        </div>

        <div class="proves-divider col-lg-12 col-xs-12"></div>
    </div>

@endforeach


