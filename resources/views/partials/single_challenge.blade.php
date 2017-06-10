<div class="col-md-4 col-lg-4 col-sm-6 col-xs-12 portfolio-item challenge-item">
    <a href="/challenge/{{$challenge->uuid}}" class="portfolio-link col-lg-10 col-md-10  col-xs-9 col-xs-offset-1" title="{{$challenge->title}}">
                {{--<img src="{{ asset('img/challenge_default.jpg')}}" class="img-responsive" alt="">--}}
        <img src="{{ asset('img/categories/'.($challenge->category->photo))}}"  class="img-responsive" alt="{{$challenge->title}}">
    </a>
    <div class="portfolio-caption col-lg-10 col-lg-offset-2 col-md-offset-2 col-md-10 col-xs-9 col-xs-offset-2 challenge-item-info">

        <div class="col-md-12 challenge-item-caption">
            <a class="category-challenge pull-left challenge-item-category" href="#">{{$challenge->category->name}}</a>

            <span class="badge pull-right challenge-item-deadline"><i class="fa fa-clock-o" aria-hidden="true"></i> {{getDayMonth($challenge->deadLine)}}</span>
        </div>
        <div class="col-md-12 col-xs-12 no-padding challenge-item-title-container" >
            <span class="challenge-item-title">{{$challenge->title}}</span>
        </div>
    </div>
</div>




