<div class="row">
    @foreach ($proofs as $sonChallenge)
        @include('partials.multi_son_challenge_single')
    @endforeach
        <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12  portfolio-item proof-item openCreate" style="cursor: pointer;padding-left: 4.333333%;display: table;height: 230px;" data-toggle="modal" data-target="#myModal">
            <div  class="portfolio-link" style="box-shadow: 0px 0px 68px 0px rgba(0, 0, 0, 0.2);text-align: center;background: #fff;display: table-cell;vertical-align: middle;" title="">
                <img src="/img/add.png"   alt="">
                <p style="margin-top: 20px;font-size: 20px;font-weight: 800;color: rgb(64, 77, 87);">Create challenge</p>
            </div>
        </div>
</div>
<div class="" style="text-align: center;">
    {!! $proofs->links() !!}
</div>

