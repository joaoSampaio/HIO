
        <div class="col-md-3 col-sm-6 portfolio-item proof-item">
            <a href="{{ action('SonChallengeController@showSonChallenge', [ 'uuid' => $sonChallenge->uuid, 'user_id'=>$sonChallenge->id]) }}" class="portfolio-link container-add-prof" title="">
                <div class="portfolio-hover">
                    <div class="portfolio-hover-content">
                        <i class="fa fa-search-plus fa-3x"></i>
                    </div>
                </div>

                @if($sonChallenge->type == 1)
                      <img src="{{ asset('uploads/challenge/'. pathinfo(asset('uploads/challenge/'. $sonChallenge->filename), PATHINFO_FILENAME) . '.jpg')  }}"
                      class="img-responsive"  style="    height: 100%;margin: 0 auto;object-fit: cover;" alt="">
                @elseif($sonChallenge->type == 0)
                    <img src="{{ asset('uploads/challenge/'. $sonChallenge->filename)}}" class="img-responsive"  style="    height: 100%;margin: 0 auto;object-fit: cover;" alt="">

                @endif

            </a>
            <div class="portfolio-caption">
                <p>By {{$sonChallenge->name}}</p>
                 <a href="/challenge/{{$sonChallenge->uuid}}" class="" title="{{$sonChallenge->title}}">{{$sonChallenge->title}}</a>
                <p>{{$sonChallenge->views}} views</p>
                @if(Auth::check() && Auth::user()->id == $sonChallenge->user_id)
                    <div class="trash-proof" data-id="{{$sonChallenge->id}}" data-target="#confirm-delete" data-toggle="modal">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                    </div>
                @endif
            </div>
        </div>



