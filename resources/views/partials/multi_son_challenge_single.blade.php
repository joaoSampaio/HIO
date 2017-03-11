
        {{--<div class="col-md-3 col-sm-6 portfolio-item proof-item">--}}
            {{--<a href="{{ action('SonChallengeController@showSonChallenge', [ 'uuid' => $sonChallenge->uuid, 'user_id'=>$sonChallenge->id]) }}" class="portfolio-link container-add-prof" title="">--}}
                {{--<div class="portfolio-hover">--}}
                    {{--<div class="portfolio-hover-content">--}}
                        {{--<i class="fa fa-search-plus fa-3x"></i>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--@if($sonChallenge->type == 1)--}}
                      {{--<img src="{{ asset('uploads/challenge/'. pathinfo(asset('uploads/challenge/'. $sonChallenge->filename), PATHINFO_FILENAME) . '.jpg')  }}"--}}
                      {{--class="img-responsive"  style="    height: 100%;margin: 0 auto;object-fit: cover;" alt="">--}}
                {{--@elseif($sonChallenge->type == 0)--}}
                    {{--<img src="{{ asset('uploads/challenge/'. $sonChallenge->filename)}}" class="img-responsive"  style="    height: 100%;margin: 0 auto;object-fit: cover;" alt="">--}}

                {{--@endif--}}

            {{--</a>--}}
            {{--<div class="portfolio-caption">--}}
                {{--<p>By {{$sonChallenge->name}}</p>--}}
                 {{--<a href="/challenge/{{$sonChallenge->uuid}}" class="" title="{{$sonChallenge->title}}">{{$sonChallenge->title}}</a>--}}
                {{--<p>{{$sonChallenge->views}} views</p>--}}
                {{--@if(Auth::check() && Auth::user()->id == $sonChallenge->user_id)--}}
                    {{--<div class="trash-proof" data-id="{{$sonChallenge->id}}" data-target="#confirm-delete" data-toggle="modal">--}}
                        {{--<i class="fa fa-trash" aria-hidden="true"></i>--}}
                    {{--</div>--}}
                {{--@endif--}}
            {{--</div>--}}
        {{--</div>--}}
{{--style="    height: 100%;margin: 0 auto;object-fit: cover;"--}}

<div class="col-md-4 col-lg-4 col-sm-6 col-xs-12 portfolio-item challenge-item">
    <a href="{{ action('SonChallengeController@showSonChallenge', [ 'uuid' => $sonChallenge->uuid, 'user_id'=>$sonChallenge->id]) }}" class="portfolio-link col-lg-10 col-md-10  col-xs-9 col-xs-offset-1" title="">
                {{--<img src="{{ asset('img/challenge_default.jpg')}}" class="img-responsive" alt="">--}}
        @if($sonChallenge->type == 1)
          <img src="{{ asset('uploads/challenge/'. pathinfo(asset('uploads/challenge/'. $sonChallenge->filename), PATHINFO_FILENAME) . '.jpg')  }}"
              class="img-responsive"   alt="">
        @elseif($sonChallenge->type == 0)
            <img src="{{ asset('uploads/challenge/'. $sonChallenge->filename)}}" class="img-responsive"  alt="">
        @endif
    </a>
    <div class="portfolio-caption col-lg-10 col-lg-offset-2 col-md-offset-2 col-md-10 col-xs-9 col-xs-offset-2 challenge-item-info">

        <div class="col-md-12 challenge-item-caption">
            <a class="category-challenge pull-left challenge-item-category" href="{{ url('profile', $sonChallenge->user_id) }}">{{$sonChallenge->name}}</a>

            <span class="pull-right proves-icon">{{$sonChallenge->views}}<i class="fa fa-eye" style="padding-left: 5px" aria-hidden="true"></i></span>
        </div>
        <div class="col-md-12 col-xs-12 no-padding challenge-item-title-container" >
            <span class="challenge-item-title">{{$sonChallenge->title}}</span>
        </div>

        @if(Auth::check() && Auth::user()->id == $sonChallenge->user_id)
            <div class="trash-proof" data-id="{{$sonChallenge->id}}" data-target="#confirm-delete" data-toggle="modal">
                <i class="fa fa-trash" aria-hidden="true"></i>
            </div>
        @endif
    </div>
</div>
