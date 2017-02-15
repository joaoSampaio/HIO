<div class="row" id="latest">
    @foreach ($challenges as $challenge)
        @include('partials.single_challenge')
    @endforeach
</div>
<div class="row" style="text-align: center;">
    {!! $challenges->links() !!}
</div>

