@foreach ($challenges as $challenge)
    <div class="col-lg-12 col-xs-12 padding5" style="    margin-bottom: 15px;">
        <div class="col-lg-2 col-xs-2 padding5">
            <a href="{{"/profile/".$challenge->user_id}}" class="portfolio-link container-add-prof" title="">

                <img src="{{'https://graph.facebook.com/v2.5/'. $challenge->facebook_id  .'/picture?width=100&height=100'}}"
                                                                        class=" img-circle img-responsive">

            </a>
        </div>
        <div class="col-lg-7 col-xs-7">
            <span style="font-size: 20px;line-height: 0;">{{$challenge->name}}</span><br>
            <a href="{{ action('HomeController@showSonChallenge', [ 'uuid' => $challenge->uuid, 'user_id'=>$challenge->id]) }}" class="" title="">{{$challenge->title}}</a>
        </div>
        <div class="col-lg-3 col-xs-3">
            {{$challenge->views}} <i class="fa fa-eye primary"></i>
        </div>
    </div>
@endforeach


