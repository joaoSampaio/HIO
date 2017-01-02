@extends('app')

@section('header')

<style>


header .intro-text {
    padding-top: 150px;
    padding-bottom: 50px;
}

</style>
@endsection

@section('content')

    <header>
        <div class="container small-header">
            <div class="intro-text">
                    <div class="intro-lead-in">HIO Mission</div>

            </div>
        </div>
    </header>






    <section id="portfolio" class="bg-light-gray">
        <div class="container">
            <div class="row">

                <div class="col-md-8 col-md-offset-2 text-justify" style="margin-top: 50px">

                    <p>Success is based on motivation allayed to hard work and fused with opportunity timing.</p>
                    <p>HIO works within a motivational culture, challenging a continuous work based on sports challenges and personal overcome.</p>

                    <p>HIO  materializes the social sports concept through a social gamificator. This digital platform is made for you to interact with your friends through sports challenges.</p>

                    <p>Challenge yourself, challenge your friends and challenge the odds. Establish rewards and penalty's within a deadline. Own yourself and prove your destiny among the gods!</p>

                    <p>Our mission is to create Self Made Legends</p>


                </div>
            </div>


        </div>
    </section>






@endsection

@section('footer')

<script src="{{ asset('js/owl.carousel.min.js') }}"></script>


<script>
    $(window).on('hashchange', function() {
        if (window.location.hash) {
            var page = window.location.hash.replace('#', '');
            if (page == Number.NaN || page <= 0) {
                return false;
            } else {
                getPosts(page);
            }
        }
    });
    $(document).ready(function() {
        $(document).on('click', '.pagination a', function (e) {
            getPosts($(this).attr('href').split('page=')[1]);
            e.preventDefault();
        });
    });
    function getPosts(page) {
        $.ajax({
            url : '?page=' + page,
            dataType: 'json'
        }).done(function (data) {
            $('.challenges').html(data);
            location.hash = page;
        }).fail(function () {
            alert('Posts could not be loaded.');
        });
    }
    </script>


@endsection