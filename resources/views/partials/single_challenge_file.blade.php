


<div class="col-md-4 col-sm-6 portfolio-item">
    <a href="#" class="portfolio-link" title="">
        <div class="portfolio-hover">
            <div class="portfolio-hover-content">
                <i class="fa fa-search-plus fa-3x"></i>
            </div>
        </div>
                {{--<img src="{{ asset('img/challenge_default.jpg')}}" class="img-responsive" alt="">--}}
        @if($user_challenge->file == "")
            <img src="{{ asset('img/categories/Bodyboard.jpg')}}" class="img-responsive" alt="">
        @else
            <img src="{{ asset('img/categories/Bodyboard.jpg')}}" class="img-responsive" alt="">

        @endif
    </a>
    <div class="portfolio-caption">

        <h3 class="title-challenge short-text" >
            {{--<a href="/challenge/{{$challenge->uuid}}" class="portfolio-link title-link" title="{{$challenge->title}}">{{$challenge->title}}</a>--}}
        </h3>
        {{--<a class="category-challenge" href="{{action('HomeController@showChallenges', $challenge->category)}}">{{$challenge->category}}</a>--}}
{{--        <h3 class="category-challenge">{{$challenge->category}}</h3>--}}
        <p class="text-muted">22</p>
    </div>
</div>




