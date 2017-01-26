@foreach ($challenges as $challenge)
    <div class="col-lg-12 col-xs-12 padding5" style="    margin-bottom: 15px;">
        <div class="col-lg-2 col-xs-2 padding5">
            <img src="{{ asset('img/categories_thumb/'.nameToUrl($challenge->category))}}" class=" img-circle img-responsive">
        </div>
        <div class="col-lg-6 col-xs-6">
            <a href="/challenge/{{$challenge->uuid}}" class="" title="">{{$challenge->title}}</a>
        </div>
        <div class="col-lg-4 col-xs-4">
            {{$challenge->total}} <i class="fa fa-users challenge-participants primary pointer" data-toggle="tooltip" data-placement="top" title="" data-id="{{$challenge->challenge_id}}"></i>
        </div>
    </div>
@endforeach


