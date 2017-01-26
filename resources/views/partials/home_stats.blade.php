@foreach ($challenges as $challenge)
    <div class="col-lg-12 col-xs-12 padding5" style="    margin-bottom: 15px;">
        <div class="col-lg-2 col-xs-2 padding5">
            <a href="{{"/profile/".$challenge->user_id}}" class="portfolio-link container-add-prof" title="">

                @if($challenge->photo == "")
                    <img src="/uploads/users/default_user.png" alt="{{$challenge->name}}" title="{{$challenge->name}}" class="img-circle img-responsive">
                @else
                    <img src="{{'/uploads/users/'. $challenge->photo }}" alt="{{$challenge->name}}" title="{{$challenge->name}}" class="img-circle img-responsive">

                @endif
            </a>
        </div>
        <div class="col-lg-7 col-xs-7">
            <span style="font-size: 20px;line-height: 0;"><a style="color: #333;text-decoration: none;" href="{{"/profile/".$challenge->user_id}}">{{$challenge->name}}</a> </span><br>
            <a href="{{ action('HomeController@showSonChallenge', [ 'uuid' => $challenge->uuid, 'user_id'=>$challenge->id]) }}" class="" title="">{{$challenge->title}}</a>
        </div>
        <div class="col-lg-3 col-xs-3">
            {{$challenge->views}} <i class="fa fa-eye primary challenge-views pointer " data-toggle="tooltip" data-placement="top" title="" data-id="{{$challenge->id}}"></i>
        </div>
    </div>
@endforeach


