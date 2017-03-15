
    @foreach ($sonChallenges as $sonChallenge)
        @if($sonChallenge->id >= 0)
            @include('partials.multi_son_challenge_single')

        @else
        @if($participating)
                <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12 portfolio-item proof-item" style="cursor: pointer;padding-left: 4.333333%;display: table;height: 230px;" data-toggle="modal" data-target="#myModal">
                    <div  class="portfolio-link" style="text-align: center;background: #fff;display: table-cell;vertical-align: middle;" title="">
                        <img src="/img/add.png"   alt="">
                        <p style="margin-top: 20px;font-size: 20px;font-weight: 800;color: rgb(64, 77, 87);">Upload Proof</p>
                    </div>

                </div>

            @endif
        @endif
    @endforeach
<div class=" hio-paginate col-sm-12 col-xs-12">
    {!! $sonChallenges->links() !!}
</div>


