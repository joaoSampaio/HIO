
    @foreach ($sonChallenges as $sonChallenge)
        @if($sonChallenge->id >= 0)
            @include('partials.multi_son_challenge_single')

        @else
        @if($participating)
                <div class="col-md-3 col-sm-6 portfolio-item proof-item" style="cursor: pointer" data-toggle="modal" data-target="#myModal">
                    <div  class="portfolio-link container-add-prof" title="">
                        <i class="fa fa-plus-circle fa-3x btn-add-prof"></i>
                    </div>
                    <div class="portfolio-caption" style="    height: 96px;">
                        <p >
                            Upload your Proof
                        </p>

                    </div>
                </div>
            @else

                <div class="col-md-3 col-sm-6 portfolio-item proof-item">
                    <div  class="portfolio-link container-add-prof" title="">
                        <i class="fa fa-plus-circle fa-3x btn-add-prof"></i>
                    </div>
                    <div class="portfolio-caption" style="    height: 96px;">
                        <p >
                            Accept Challenge before upload your proof
                        </p>

                    </div>
                </div>


            @endif
        @endif
    @endforeach
<div class="row hio-paginate col-sm-12">
    {!! $sonChallenges->links() !!}
</div>


