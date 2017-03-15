@extends('app')

@section('header')
<link href="{{ asset('css/video-js.css') }}" rel="stylesheet">
<style>

.navbar-default {
    background-color: #222 !important;
    border-color: transparent;
}
.img-responsive{
        width: 100%;
}

.btn-default:hover {
    color: #fff;
    background-color: #00CE6C;
    border-color: #00CE6C;
}
.btn-default {
    color: #fff;
    background-color: #00CE6C;
    border-color: #00CE6C;
    border-radius: 0px;
}
.form-control{
border-radius: 0px;
}

.intro-lead-in{
color: #eb1946;
    text-transform: uppercase;
}

.full-width-tabs > ul.nav.nav-tabs {
            display: table;
            width: 100%;
            table-layout: fixed;
        }
        .full-width-tabs > ul.nav.nav-tabs > li {
            float: none;
            display: table-cell;
        }
        .full-width-tabs > ul.nav.nav-tabs > li > a {
            text-align: center;
        }
        .take-all-space-you-can{
            width:100%;
        }
        .take-all-space-you-can.active a{
                background-color: #f7f7f7 !important;
        }

        .nav-tabs {
            border-bottom: 0px solid #ddd;
        }



    .title-proof{
        font-size: 22pt;
        text-transform: uppercase;
        margin-top: 35px;
        text-align: center;
    }

    .primary{
        color: #eb1946;
    }

    .community-name{
        display: none !important;
    }

#tinderslide li{
position: inherit;
}

#tinderslide li.pane1 {
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    transform: rotate(0deg);
}






.judgment-proof.rejected:after {
        content: "Rejected";
        position: absolute;
        top: 70px;
        right: 10px;
        z-index: 1;
        font-family: Arial,sans-serif;
        -webkit-transform: rotate(45deg);
        -moz-transform: rotate(45deg);
        -ms-transform: rotate(45deg);
        -o-transform: rotate(45deg);
        transform: rotate(45deg);
        font-size: 40px;
        color: #c00;
        border: solid 4px #c00;
        padding: 5px;
        border-radius: 5px;
        zoom: 1;
        filter: alpha(opacity=20);
        opacity: 0.2;
        -webkit-text-shadow: 0 0 2px #c00;
        text-shadow: 0 0 2px #c00;
        box-shadow: 0 0 2px #c00;
    }

.judgment-proof.approved:after
{
    content:"Approved";
    position:absolute;
    top:70px;
    right:10px;
    z-index:1;
    font-family:Arial,sans-serif;
    -webkit-transform: rotate(45deg); /* Safari */
    -moz-transform: rotate(45deg); /* Firefox */
    -ms-transform: rotate(45deg); /* IE */
    -o-transform: rotate(45deg); /* Opera */
    transform: rotate(45deg);
    font-size:40px;
    color:#5cb767;
    /*background:#fff;*/
    border:solid 4px #5cb767;
    padding:5px;
    border-radius:5px;
    zoom:1;
    filter:alpha(opacity=20);
    opacity:0.5;
    -webkit-text-shadow: 0 0 2px #5cb767;
    text-shadow: 0 0 2px #5cb767;
    box-shadow: 0 0 2px #5cb767;
}

</style>





@endsection

@section('content')

<!-- Header -->



    <!-- Portfolio Grid Section -->
    <section id="list-proofs" style="margin-top: 0px">
        <div class="container" id="proofs-data">

            @include('partials.vote_paginate')

        </div>

        <div class="ajax-load text-center" style="display:none">
            <p><img src="/img/loader.gif">Loading More post</p>
        </div>
    </section>




@endsection

@section('footer')
<script src="{{ asset('js/video.js') }}"></script>

<script type="text/javascript">
    var page = 1;
    $(window).scroll(function() {
        if($(window).scrollTop() + $(window).height() >= $(document).height()) {
            page++;
            loadMoreData(page);
        }
    });

    function loadMoreData(page){
        $.ajax(
            {
                url: '?page=' + page,
                type: "get",
                beforeSend: function()
                {
                    $('.ajax-load').show();
                }
            })
            .done(function(data)
            {
                if(data.html == " "){
                    $('.ajax-load').html("No more records found");
                    return;
                }
                $('.ajax-load').hide();
                $("#proofs-data").append(data.html);
                $(".like").unbind();
                $(".dislike").unbind();
                $(".like").delay( 800 ).click(like);
                $(".dislike").delay( 800 ).click(dislike);
                reloadNewVideos();
            })
            .fail(function(jqXHR, ajaxOptions, thrownError)
            {
                alert('server not responding...');
            });
    }

    function reloadNewVideos() {

        var videos = $('.video-js-unprocessed');
        $.each( videos, function( key, value ) {
            videojs(value, {}, function() {
            });
        });
        $('.video-js-unprocessed').removeClass('video-js-unprocessed');
    }



</script>

<script>



function like(e){
var id = $(e.currentTarget).data("proof-id");
if($('[data-voted-'+id+'= 0]').length > 0 || $('[data-voted-'+id+'= -1]').length > 0){
        $.post("/judge/proof",
            {
                proof_id: $(e.currentTarget).data("proof-id"),
                value: 1
            },
            function(data, status){

                $('[data-proof-id=' + id + ']').removeClass("active");
                $(e.currentTarget).addClass("active");

                if($('[data-voted-'+id+'= 0]').length > 0){
                    $('#like-count-'+id).html(parseInt($('#like-count-'+id).html())+1);
                    $('[data-voted-'+id+'= 0]').attr( "data-voted-"+id, 1 );
                } else if($('[data-voted-'+id+'= -1]').length > 0){
                    $('#like-count-'+id).html(parseInt($('#like-count-'+id).html())+1);
                    $('#dislike-count-'+id).html(parseInt($('#dislike-count-'+id).html())-1);
                    $('[data-voted-'+id+'= -1]').attr( "data-voted-"+id, 1 );
                }
//                $(".like").unbind();
//                 $(".dislike").unbind();
//                 $(".dislike").click(dislike);
             });
             }
         }

function dislike(e){
var id = $(e.currentTarget).data("proof-id");
if($('[data-voted-'+id+'= 0]').length > 0 || $('[data-voted-'+id+'= 1]').length > 0){
        $.post("/judge/proof",
            {
                proof_id: $(e.currentTarget).data("proof-id"),
                value: 0
            },
            function(data, status){
                $('[data-proof-id=' + id + ']').removeClass("active");
                $(e.currentTarget).addClass("active");

                if($('[data-voted-'+id+'= 0]').length > 0){
                    $('#dislike-count-'+id).html(parseInt($('#dislike-count-'+id).html())+1);
                    $('[data-voted-'+id+'= 0]').attr( "data-voted-"+id, -1 );
                } else if($('[data-voted-'+id+'= 1]').length > 0){
                    $('#like-count-'+id).html(parseInt($('#like-count-'+id).html())-1);
                    $('#dislike-count-'+id).html(parseInt($('#dislike-count-'+id).html())+1);
                    $('[data-voted-'+id+'= 1]').attr( "data-voted-"+id, -1 );
                }
//                $(".dislike").unbind();
//                 $(".like").unbind();
//                 $(".like").click(like);
            });
            }
    }

        $(".like").delay( 800 ).click(like);
        $(".dislike").delay( 800 ).click(dislike);


//$(function () {
//
//    $('.video-js-unprocessed').bind("loadedmetadata", function () {
//        var width = this.videoWidth;
//        var height = this.videoHeight;
//        // ...
//
//    });
//
//})
$('.video-js-unprocessed').removeClass('video-js-unprocessed');

</script>


@endsection