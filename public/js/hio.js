/**
 * Created by Sampaio on 28/01/2017.
 */

function goBack() {
    window.history.back()
}


$('.main-search').click(function(e){
    $('#search-modal').on('shown.bs.modal', function () {
        $('#search-input').select2('open');
    });
    $('#search-modal').modal('show');
});


$.ajax({
    type: 'GET',
    url: '/notifications',
    dataType: 'json',
    success: function(jsonData) {
        $(".notifications-wrapper").html(jsonData);
        //numberUnread
        var number = $('#numberUnread').data('number-unread');
        if (number > 0) {
            $('.badge-notify').html(number);
            $('.badge-notify').show();
        }
        jQuery(document).ready(function() {
            jQuery("time.timeago").timeago();
        });


        $('.notification-item a').click(function (event){
        //event.preventDefault();
            $.ajax({
                url: '/notifications/read/' + $(this).attr('data-notification')
                ,success: function(response) {
                //alert(response)
                }
            })
        });
    },
    error: function() {
    }
});

$('.notification-btn').on('click', function () {
    $('.badge-notify').hide();
    $.get( "/notifications/ignore/"+$('#highest_id').data('highest-id'), function( data ) {
    });

});



$(".search-ajax").select2({
    ajax: {
    url: "/search",
    dataType: 'json',
    delay: 250,
    selectOnClose: true,
    selectOnBlur: true,
    tags: false,
    maximumSelectionLength: 0,
    multiple: false,
    data: function (params) {
    return {
    q: params.term, // search term
    page: params.page
    };
    },
    processResults: function (data, params) {
    return {
    results: $.map(data, function(obj) {
    return { id: obj.id, text: obj.name, role: obj.role, photo: obj.image, type: obj.type };
    })
    };
    },
    cache: true
    },
    placeholder: "Search",
    escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
    minimumInputLength: 1,
    templateResult: formatRepoSearch, // omitted for brevity, see the source of this page
    templateSelection: formatRepoSelectionSearch // omitted for brevity, see the source of this page
    });

$(".search-ajax").show();


$('.search-ajax').on('select2:select', function (evt) {
    return false;
    });



function formatRepoSearch (repo) {
    if (repo.loading) return;

    if(repo.selected)
    return;
    if(repo.text == null)
    return;

    var url = getPhotoUrl(repo.type, repo.photo);
    var type = "";
    if(repo.type == 0){
    type = 'User';
        if(repo.role != "" && repo.role != "admin"){
            type = repo.role;

        }
    }else if(repo.type == 1){
    type = 'Challenge';
    }else if(repo.type == 2){
    type = 'Category';
    }

    var markup =
    "<img class='search-img' src='"+url +"' />"+

    "<span class='k-state-default'><h3>"+repo.text+"</h3><p>#"+ type +"</p></span>";

    return markup;
    }

function formatRepoSelectionSearch (repo) {
    console.log("formatRepoSelection" + repo)
    if(repo.type == 0){
    window.location = "/profile/"+repo.id;
    }else if(repo.type == 1){
    window.location = "/challenge/"+repo.id;
    } else if(repo.type == 2){
    window.location = "/challenges/"+repo.id;
    }

    }

function getPhotoUrl (type, image) {

    if(type == 0){
    return (image == "")? "/uploads/users/default_user.png" : "/uploads/users/"+image;
    }else if(type == 1){
    return categoryToUrl(image);
    }else if(type == 2){
    return categoryToUrl(image);
    }

    }

function categoryToUrl(name){
    var url = "";
    switch(name){
    case 'Awesome Stuff':
    url = 'Amazing.jpg';
    break;
    case 'Running':
    url = 'Running.jpg';
    break;
    case 'Trail':
    url = 'Trail.jpg';
    break;
    case 'Gym':
    url = 'Gym.jpg';
    break;
    case 'Fitness':
    url = 'Fitness.jpg';
    break;
    case 'Football':
    url = 'Soccer.jpg';
    break;
    case 'Golf':
    url = 'Golf.jpg';
    break;
    case 'Tennis':
    url = 'Tennis.jpg';
    break;
    case 'Rugby':
    url = 'Rugby.jpg';
    break;
    case 'Surf':
    url = 'Surf.jpg';
    break;
    case 'Bodyboard':
    url = 'Bodyboard.jpg';
    break;
    case 'Swimming':
    url = 'Swim.jpg';
    break;
    case 'Martial Arts':
    url = 'Martial-Arts.jpg';
    break;
    case 'Cycling':
    url = 'Cycling.jpg';
    break;
    case 'Gymnastics':
    url = 'Gymnastic.jpg';
    break;
    case 'Basketball':
    url = 'Basketball.jpg';
    break;
    case 'Volleyball':
    url = 'Volley.jpg';
    break;
    case 'Snow Sports':
    url = 'Ski.jpg';
    break;
    case 'Hockey':
    url = 'Hockey.jpg';
    break;




    case 'Boxe':
    url = 'Categories_Thumb_Boxe.jpg';
    break;
    case 'Karate':
    url = 'Categories_Thumb_Karate.jpg';
    break;
    case 'Judo':
    url = 'Categories_Thumb_Judo.jpg';
    break;
    case 'Jiu-Jitsu':
    url = 'Categories_Thumb_Jiu-Jitsu.jpg';
    break;
    case 'Muay Thai':
    url = 'Martial-Arts.jpg';
    break;
    case 'Taekwondo':
    url = 'Categories_Thumb_Taekwondo.jpg';
    break;
    case 'Kickboxing':
    url = 'Categories_Thumb_Kickboxing.jpg';
    break;
    case 'MMA':
    url = 'Categories_Thumb_MMA.jpg';
    break;

    }
    return "/img/categories/"+url;
    }

$(function () {
    $('.menu-lateral').show();
    });

$('#dLabel2').on('click', function (e) {
    e.stopPropagation();
    //mobile-notifications
    $('#mobile-notifications').toggleClass('open');
//    $(this).next('.dropdown').find('[data-toggle=dropdown]').dropdown('toggle');
    });



function enableChallengeParticipants(){
    $('.challenge-participants').unbind().click(function(e){
        $('#modalHome').html("Participants");
        $('#challenge-views-modal').modal('show');
        $.ajax({
            url: "/participants/"+$(e.currentTarget).data("id"),
            type:"GET",
            dataType : 'json',
            success:function(data){
                var challengeViews="";
                for (index = 0; index < data.length; ++index) {

                    challengeViews += "<div class=\"padding5 row row-eq-height margin-bottom\">";
                    challengeViews += "                           <div class=\"col-lg-2 col-xs-2 padding5\">";
                    challengeViews += "                               <a href=\"\/profile\/"+data[index].userId+"\" class=\"container-modal-views-link\" title=\"\">";
                    if(data[index].photo == "")
                        challengeViews += "                                       <img src=\"\/uploads\/users\/default_user.png\" class=\"img-circle img-responsive same-height-modal-views\">";
                    else
                        challengeViews += "                                       <img src=\"\/uploads\/users\/"+data[index].photo+"\" class=\"img-circle img-responsive same-height-modal-views\">";
                    challengeViews += "                               <\/a>";
                    challengeViews += "                           <\/div>";
                    challengeViews += "                           <div class=\"col-lg-7 col-xs-7\">";
                    challengeViews += "                               <a href=\"\/profile\/"+data[index].userId+"\" class=\"center-middle\" title=\"\">"+data[index].name+"<\/a>";
                    challengeViews += "                           <\/div>";
                    challengeViews += "                       <\/div>";
                    challengeViews += "                    <\/div>";
                }
                $("#modal-views-content").html(challengeViews);
            },error:function(){
            }
        }); //end of ajax
        return false;
    });

    $( ".challenge-participants" ).hover(function(e) {
        var id = $(e.currentTarget).data("id");
        if(!(id in dictParticipants)){
            $.ajax({
                url: "/participants/"+id,
                type:"GET",
                dataType : 'json',
                success:function(data){
                    dictParticipants[id] = data;
                    console.log(JSON.stringify(data));
                    $(e.currentTarget).prop('title', getViewsNames(dictParticipants[id]));
                    $(e.currentTarget).attr('data-original-title', getViewsNames(dictParticipants[id]));
                    $(e.currentTarget).tooltip('show');
                },error:function(){
                }
            }); //end of ajax
        }else {
            $(e.currentTarget).prop('title', getViewsNames(dictParticipants[id]));
            $(e.currentTarget).attr('data-original-title', getViewsNames(dictParticipants[id]));

            $(e.currentTarget).tooltip('show');
        }
    });
}

function enableProofModal(){
    $('.open-iframe').unbind().click( function (e) {
        e.stopPropagation();
        $('#show-proof').on('shown.bs.modal', function() {
            $('#proof-iframe').attr("src",$(e.currentTarget).attr('href'));
        });
        $('#show-proof').modal({show:true})
        return false;
    });
}

$('#proof-iframe').on('load', function(){
    $('#spin-proof').hide();
    console.log('load the iframe')
});

function enableChallengeViews(){
    $('.challenge-views').unbind().click(function(e){
        $('#modalHome').html("Views");
        $('#challenge-views-modal').modal('show');
        $.ajax({
            url: "/views/proof/"+$(e.currentTarget).data("id"),
            type:"GET",
            dataType : 'json',
            success:function(data){
                var challengeViews="";
                for (index = 0; index < data.length; ++index) {
//                        console.log(data[index]);

                    challengeViews += "<div class=\"padding5 row row-eq-height margin-bottom\">";
                    challengeViews += "                           <div class=\"col-lg-2 col-xs-2 padding5\">";
                    challengeViews += "                               <a href=\"\/profile\/"+data[index].userId+"\" class=\"container-modal-views-link\" title=\"\">";
                    if(data[index].photo == "")
                        challengeViews += "                                       <img src=\"\/uploads\/users\/default_user.png\" class=\"img-circle img-responsive same-height-modal-views\">";
                    else
                        challengeViews += "                                       <img src=\"\/uploads\/users\/"+data[index].photo+"\" class=\"img-circle img-responsive same-height-modal-views\">";
                    challengeViews += "                               <\/a>";
                    challengeViews += "                           <\/div>";
                    challengeViews += "                           <div class=\"col-lg-7 col-xs-7\">";
                    challengeViews += "                               <a href=\"\/profile\/"+data[index].userId+"\" class=\"center-middle\" title=\"\">"+data[index].name+"<\/a>";
                    challengeViews += "                           <\/div>";
                    challengeViews += "                       <\/div>";
                    challengeViews += "                    <\/div>";
                }
                $("#modal-views-content").html(challengeViews);



            },error:function(){
                //console.log("count:" + countVotes);
            }
        }); //end of ajax
        return false;
    });

    $( ".challenge-views" ).hover(function(e) {
        var id = $(e.currentTarget).data("id");
        if(!(id in dictViews)){
            $.ajax({
                url: "/views/proof/"+id,
                type:"GET",
                dataType : 'json',
                success:function(data){
                    dictViews[id] = data;
                    console.log(JSON.stringify(data));
                    $(e.currentTarget).prop('title', getViewsNames(dictViews[id]));
                    $(e.currentTarget).attr('data-original-title', getViewsNames(dictViews[id]));
                    $(e.currentTarget).tooltip('show');
                },error:function(){
                    //console.log("count:" + countVotes);
                }
            }); //end of ajax
        }else {
            $(e.currentTarget).prop('title', getViewsNames(dictViews[id]));
            $(e.currentTarget).attr('data-original-title', getViewsNames(dictViews[id]));

            $(e.currentTarget).tooltip('show');
        }
    });
}

function getViewsNames(data){
    var challengeViews="";

    if(data.length>= 5){
        challengeViews += data[0].name + ", " +  data[1].name + ", " +  data[2].name + " and " + (data.length - 3) + " other people";
    }else{
        for (index = 0; index < data.length; ++index) {
            challengeViews += data[index].name + ", ";
        }
        if(data.length > 0)
            challengeViews = challengeViews.slice(0, -2);
    }


    return challengeViews;
}

$('#create-challenge-iframe').on('load', function(){
    $('#create-spin').hide();
    console.log('load the iframe')
});

(function(window, document, undefined)
{

    // helper functions

    var trim = function(str)
    {
        return str.trim ? str.trim() : str.replace(/^\s+|\s+$/g,'');
    };

    var hasClass = function(el, cn)
    {
        return (' ' + el.className + ' ').indexOf(' ' + cn + ' ') !== -1;
    };

    var addClass = function(el, cn)
    {
        if (!hasClass(el, cn)) {
            el.className = (el.className === '') ? cn : el.className + ' ' + cn;
        }
    };

    var removeClass = function(el, cn)
    {
        el.className = trim((' ' + el.className + ' ').replace(' ' + cn + ' ', ' '));
    };

    var hasParent = function(el, id)
    {
        if (el) {
            do {
                if (el.id === id) {
                    return true;
                }
                if (el.nodeType === 9) {
                    break;
                }
            }
            while((el = el.parentNode));
        }
        return false;
    };

    // normalize vendor prefixes

    var doc = document.documentElement;

    var transform_prop = window.Modernizr.prefixed('transform'),
        transition_prop = window.Modernizr.prefixed('transition'),
        transition_end = (function() {
            var props = {
                'WebkitTransition' : 'webkitTransitionEnd',
                'MozTransition'    : 'transitionend',
                'OTransition'      : 'oTransitionEnd otransitionend',
                'msTransition'     : 'MSTransitionEnd',
                'transition'       : 'transitionend'
            };
            return props.hasOwnProperty(transition_prop) ? props[transition_prop] : false;
        })();

    window.App = (function()
    {

        var _init = false, app = { };

        var inner = document.getElementById('inner-wrap'),

            nav_open = false,

            nav_class = 'js-nav';


        app.init = function()
        {
            if (_init) {
                return;
            }
            _init = true;

            var closeNavEnd = function(e)
            {
                if (e && e.target === inner) {
                    document.removeEventListener(transition_end, closeNavEnd, false);
                }
                nav_open = false;
            };

            app.closeNav =function()
            {
                if (nav_open) {
                    // close navigation after transition or immediately
                    var duration = (transition_end && transition_prop) ? parseFloat(window.getComputedStyle(inner, '')[transition_prop + 'Duration']) : 0;
                    if (duration > 0) {
                        document.addEventListener(transition_end, closeNavEnd, false);
                    } else {
                        closeNavEnd(null);
                    }
                }
                removeClass(doc, nav_class);
            };

            app.openNav = function()
            {
                if (nav_open) {
                    return;
                }
                addClass(doc, nav_class);
                nav_open = true;
            };

            app.toggleNav = function(e)
            {
                if (nav_open && hasClass(doc, nav_class)) {
                    app.closeNav();
                } else {
                    app.openNav();
                }
                if (e) {
                    e.preventDefault();
                }
            };

            // open nav with main "nav" button
            document.getElementById('nav-open-btn').addEventListener('click', app.toggleNav, false);

            // close nav with main "close" button
            document.getElementById('nav-close-btn').addEventListener('click', app.toggleNav, false);

            // close nav by touching the partial off-screen content
            document.addEventListener('click', function(e)
                {
                    if (nav_open && !hasParent(e.target, 'nav')) {
                        e.preventDefault();
                        app.closeNav();
                    }
                },
                true);

            addClass(doc, 'js-ready');

        };

        return app;

    })();

    if (window.addEventListener) {
        window.addEventListener('DOMContentLoaded', window.App.init, false);
    }

})(window, window.document);
