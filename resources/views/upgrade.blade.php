<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/img/favicon.ico" type="image/x-icon">

    <title>HIO - Challenge Your Friends</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/agency.css') }}" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="{{ asset('font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>

    <link href='https://fonts.googleapis.com/css?family=Roboto:700,900,200,300,400,500' rel='stylesheet' type='text/css'>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">





    {{--    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">--}}

    <link href="{{ asset('css/bootstrap-datetimepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('css/radio.css') }}" rel="stylesheet">
{{--    <link href="{{ asset('css/bootstrap-tokenfield.css') }}" rel="stylesheet">--}}

    <link href="{{ asset('css/s2-docs.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-switch.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/hio.css') }}" rel="stylesheet">
<style>
.datepicker{
    background-color: #fff;
    color: #000;
}

.datepicker .btn{
    background-color: #fff;
    color: #000;
}

.timepicker{
    background-color: #fff;
    color: #000;
}

.timepicker-hour, .timepicker-minute ,  .timepicker-second{
color: #000;
}



.navbar-default{
background-color: #222;
}

.btn-xl{
padding: 20px 35px;
}
.btn-default  {
border-color: #C1C5C8;
background: #C1C5C8;
}

.form-control::-webkit-input-placeholder { color: #aaa; }
.form-control:-moz-placeholder { color: #aaa; }
.form-control::-moz-placeholder { color: #aaa; }
.form-control:-ms-input-placeholder { color: #aaa; }
.form-control {  color: #aaa;}



label.custom-select {
    position: relative;
    display: inline-block;
    width: 100%;
}


.no-pointer-events .custom-select:after {
    content: none;
}

.validar input:invalid, .validar select:invalid, .validar textarea:invalid  {
  box-shadow: 0 0 5px 1px red !important;
}

.bootstrap-switch-primary {
    color: #fff;
    background: #eb1946 !important;
}
.btn-create-hio{
    width: 245px;
}
.btn-cancel-hio{
    width: 245px;
}

@media (min-width: 992px){
    .btn-create-hio{
        float: left;
    }
    .btn-cancel-hio{
        float: right;
    }
}


@media (max-width: 500px){
    .col-mobile {
        width: 100%;
    }
}





.ch-grid {
	padding: 0;
	list-style: none;
	display: block;
	text-align: center;
	width: 100%;
}

.ch-grid:after,
.ch-item:before {
	content: '';
    display: table;
}

.ch-grid:after {
	clear: both;
}

.ch-grid li {
	width: 40px;
	height: 40px;
	display: inline-block;
	margin-left: 20px;
	margin-right: 20px;
}

.ch-item {
	width: 100%;
	height: 100%;
	border-radius: 50%;
	overflow: hidden;
	position: relative;
	cursor: default;
	box-shadow:
		inset 0 0 0 16px rgba(255,255,255,0.6),
		0 1px 2px rgba(0,0,0,0.1);
	transition: all 0.4s ease-in-out;
}

.ch-item span{
    font-size: 20px;
}

.ch-item .btn-xl {
    color: #fff;
    background-color: #C1C5C8;
    border-color: #C1C5C8;
    font-family: 'Roboto', sans-serif;
    text-transform: uppercase;
    font-weight: 700;
    border-radius: 3px;
    font-size: 18px;
    padding: 7px 15px;
}

.ch-item .btn-active {
    color: #fff;
    background-color: #eb1946;
    border-color: #eb1946;
    font-family: 'Roboto', sans-serif;
    text-transform: uppercase;
    font-weight: 700;
    border-radius: 3px;
    font-size: 18px;
    padding: 7px 15px;
}

.form-section{
    margin-top: 20px;
    display: none;
}
.form-section.current {
    display: inherit;
}

.select2-container{
width: 100% !important;
}

.form-section .select2-search__field{
width: 200px !important;
}


button:focus {
    border-color: #eb1946 !important;
    background-color: #eb1946 !important;
}

.form-section .btn-xl{
    width: 290px;
}

    .parsley-required{
        color: #eb1946;
    }




.radio-choice input[type=radio] {
    position: absolute;
    visibility: hidden;
}

.radio-choice label{
    position: relative;
    margin: .5rem;
    line-height: 135%;
    cursor: pointer;
    padding-left: 30px;
}

.inside{
    display: block;
    position: absolute;
    top: -3px;
    left: 0px;
    z-index: 5;
    transition: border .25s linear;
    -webkit-transition: border .25s linear;



    border-width: 2px;
    border-color: #C1C5C8;
    border-style: solid;
    border-radius: 50%;
    width: 26px;
    height: 26px;


}

.inside::before {
    display: block;
    position: absolute;
    content: '';

    top: 4px;
    left: 4px;
    margin: auto;
    transition: background 0.25s linear;
    -webkit-transition: background 0.25s linear;

    border-radius: 50%;
    /*background-color: rgb(188, 188, 188);*/

    width: 14px;
    height: 14px;

}

input[type=radio]:checked ~ .inside::before {
    background: #eb1946;
}

.btn-normal-login{
    margin-top: 30px;
}





    form, form label {
        color: #C1C5C8;
        font-weight: 400;
    }

    
    .select2-selection__choice{
        position: relative;
        border-radius: 50%!important;
        width: 50px;
        padding: 0px !important;
    }

.select2-selection__choice__remove {
    color: red !important;
    cursor: pointer;
    display: inline-block;
    font-weight: bold;
    right: 0;
    position: absolute;
    margin-right: 2px;
}

.participants-dim{
width: 50px;
    height: 50px;
    padding: 0px;
}

#participants li{
    float: left;
    position: relative;
}



.user_choice_remove {
    color: red !important;
    cursor: pointer;
    display: inline-block;
    font-weight: bold;
    top: -8px;
    font-size: 22px;
    right: 0;
    position: absolute;
    margin-right: 2px;
}

.user_choice_remove {
    display:none;
}
.user-remove:hover .user_choice_remove {
    display: block;
}






#add-user-search .select2-container--default .select2-search--inline .select2-search__field{
    width: 100% !important;
    margin-left: 20px;
}




#add-user-search:focus {
    background: 0 0;
}
#add-user-search .select2-container--default .select2-selection--multiple{
    background-color: transparent;
    border-radius: 0px;

    /*height: 67px;*/
    border: 0px solid #aaa;
    border-bottom: 1px solid #fff;
    border-top: 1px solid #fff;
}


#add-user-search .select2-container--default .select2-selection--multiple .select2-selection__rendered{
    /*margin-top: 20px;*/
    padding-left: 25px;
}

#add-user-search ul > li:not(:last-child) { display: none; }


.select2-results{
box-shadow: 0px -12px 58px 3px rgba(0, 0, 0, 0.2);
}
#menu-add-user{
box-shadow: 0px 0px 68px 0px rgba(0, 0, 0, 0.2);
}



body:after{
display: none;
}

.show-friends:before{
    content: '';
    position: absolute;
    top: 20px;
    left: -1000px;
    width: 2200px;
    height: 1px;
    background: #C1C5C8;
    z-index: -1;
}

.show-friends{
width: 2em;
  height: 2em;
  text-align: center;
  line-height: 40px;
  border-radius: 50%;
  background: #C1C5C8;
  margin: 0 1em;
  display: inline-block;
  color: white;
  position: relative;
}

.show-friends.active{
  background: #eb1946;

}

.show-friends.active:after {
    content: "";
    position: absolute;
    left: 15px;
    bottom: -4px;
    border-width: 5px 5px 0;
    border-style: solid;
    border-color: #eb1946 transparent;
    display: block;
    width: 0;
}


</style>
</head>

<body style="background-color: white">

        <div class="container">
            <div class="row" id="latest">

                <div class="col-md-offset-1 col-md-10 col-sm-12 col-xs-12 personal-info">
                    {!! Form::open(array('action' => array('HomeController@storeChallenge'), 'class' => 'form-horizontal', 'id' => 'form-challenge', 'autocomplete' => 'off')) !!}


                        <div class="form-section">


                            <div class="form-group">
                                <div class="col-lg-12">
                                    <p>Upgrade to Trainer</p>
                                    <ul class="" id="participants" style="padding: 0px">
                                        <li class=" dropdown" id="dropdown-add-user" style="padding: 0px">

                                            <button type="button" id="add-user" class="btn img-circle participants-dim"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                            <ul class="dropdown-menu " id="menu-add-user" role="menu" aria-labelledby="add-user">


                                            <div class="notifications-wrapper" id="add-user-search" style="    width: 350px;">
                                        {!! Form::select('emailFriendTeste[]', array(),null,array('id'=>'friends-cha-teste', 'class'=>'form-control js-data-user-select2', 'multiple'=>'multiple')) !!}

                                            </div>
                                        </ul>
                                        </li>


                                    </ul>


                                </div>
                            </div>

                            <div class="form-group" style="display: none">
                                <div class="col-lg-12">
                                    @if(Auth::user()->role == "brand")
                                        {!! Form::select('emailFriend[]', array(),null,array('id'=>'friends-cha', 'class'=>'form-control  js-data-example-ajax', 'multiple'=>'multiple')) !!}
                                    @else
                                        {!! Form::select('emailFriend[]', array(),null,array('id'=>'friends-cha','required', 'data-validation'=>'required','data-parsley-required-message'=>'*information required',  'class'=>'form-control js-data-example-ajax', 'multiple'=>'multiple')) !!}
                                    @endif
                                </div>
                            </div>


                        </div>

                        <div class="form-group" style="margin-bottom: 0px;margin-top: 30px; text-align: center;" id="controls" >
                              <div class="col-md-12 col-xs-12">

                                <div class="col-xs-6 col-md-6 col-mobile" style="margin-bottom: 20px;">
                                    <button type="button" class="btn btn-default btn-xl btn-cancel-hio" id="back_control">Back</button>
                                    {{--<input class="btn btn-default btn-xl btn-cancel-hio" value="Back" id="back_control" >--}}
                                </div>

                                <div class="col-xs-6 col-md-6 col-mobile">
                                    <button type="button" class="btn btn-primary btn-xl btn-create-hio" id="next_control">Next</button>
                                    {{--<input class="btn btn-primary btn-xl btn-create-hio" value="Next" id="next_control">--}}
                                </div>


                              </div>
                            </div>


<input class="btn btn-primary  hide" value="Next" id="enviar" type="submit">
                    </form>
                </div>
            </div>
        </div>




</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>

<script src="{{ asset('js/agency.js') }}"></script>
<script src="{{ asset('js/select2.full.min.js') }}"></script>

    <script src="{{ asset('js/moment-with-locales.min.js') }}"></script>

    <script src="{{ asset('js/bootstrap-datetimepicker.min.js') }}"></script>


    <script src="{{ asset('js/bootstrap-datetimepicker.pt-BR.js') }}"></script>


    <script src="{{ asset('js/bootstrap-switch.min.js') }}"></script>


    <script src="{{ asset('js/parsley2.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-tokenfield.js') }}"></script>

    <script type="text/javascript">


var selectedUsers = {};


$('.js-data-user-select2').select2({
      ajax: {
          url: "{{ action('HomeController@searchUsers') }}",
          dataType: 'json',
          delay: 250,
          data: function (params) {
              return {
                q: params.term, // search term
                page: params.page
              };
        },
        processResults: function (data, params) {
          return {
            results: $.map(data, function(obj) {
                        return { id: obj.id, text: obj.name, photo: obj.photo };
                    })
          };
        },
        cache: true
      },
      tags: true,
      multiple: true,
      placeholder: "EMAILS OR USERS",
      tokenSeparators: [',','\n', '\t'],
      escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
      minimumInputLength: 1,
      templateResult: formatRepo, // omitted for brevity, see the source of this page
      templateSelection: formatRepoSelection // omitted for brevity, see the source of this page
    });

    $('#add-user').on('click', function (event) {
        $("#dropdown-add-user").toggleClass('open');
        $("#add-user-search .select2-search__field").attr("placeholder", "Search");
        $("#menu-add-user input").focus();
    });

    $('body').on('click', function (e) {
        if (!$("#dropdown-add-user").is(e.target)
            && $("#dropdown-add-user").has(e.target).length === 0
            && $('.open').has(e.target).length === 0
        ) {
            $("#dropdown-add-user").removeClass('open');
        }
    });


    $(".js-data-user-select2").on("select2:select", function (e) {
        $('.js-data-example-ajax').append($('<option>', {
                        value: e.params.data.id,
                        text : e.params.data.text
                    })).trigger("change");
            addUser(e);
     });

     function addUser(e){
            selectedUsers[$(".js-data-user-select2").val()] = $(".js-data-user-select2").val();
             var array_keys = $(".js-data-user-select2").val();
             selectedUsers[array_keys[array_keys.length -1]] = array_keys[array_keys.length -1];
              $(".js-data-example-ajax").val(array_keys).trigger("change");
              var html = formatRepoSelectionUser(e.params.data);
              $('#participants').append(html);
             $("#dropdown-add-user").removeClass('open');
             updateRemoveUser();
     }

     function updateRemoveUser(){
        $('.user_choice_remove').unbind().click(function (e) {
             var id = $(e.currentTarget).data("id");
             delete selectedUsers[id];
             var array_keys = new Array();
             for (var key in selectedUsers) {
                 array_keys.push(key);
             }
             $(".js-data-example-ajax").val(array_keys).trigger("change");
             $(".js-data-user-select2").val(array_keys).trigger("change");
             $(".user-remove-"+id).remove();
             $("#friends-cha option[value='"+id+"']").remove();
         });
     }


$(".js-data-example-ajax").select2({
            ajax: {
                url: "{{ action('HomeController@searchUsers') }}",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                      q: params.term, // search term
                      page: params.page
                    };
              },
              processResults: function (data, params) {
                return {
                  results: $.map(data, function(obj) {
                              return { id: obj.id, text: obj.name, photo: obj.photo };
                          })
                };
              },
              cache: true
            },
            tags: true,
            multiple: true,
            selectOnClose: true,
            selectOnBlur: true,
            allowClear: true,
            placeholder: "EMAILS OR USERS",
            tokenSeparators: [',','\n', '\t'],
            escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
            minimumInputLength: 1,
            templateResult: formatRepo, // omitted for brevity, see the source of this page
            templateSelection: formatRepoSelection // omitted for brevity, see the source of this page
          });


    @if(isset($targetUser))

        var targetId = <?php echo $targetUser->id; ?>;
        var nameUser = "<?php echo $targetUser->name; ?>";


        $('.js-data-example-ajax').append($('<option>', {
                value: targetId,
                text : nameUser
            })).trigger("change");
        $(".js-data-user-select2").append($('<option>', {
              value: targetId,
              text : nameUser
          })).trigger("change");

        $(".js-data-example-ajax").val([ targetId]).trigger("change");
        $(".js-data-user-select2").val([ targetId]).trigger("change");
        var challengedUser = {text:nameUser, id:targetId};
        var html = formatRepoSelectionUser(challengedUser);
      $('#participants').append(html);
     updateRemoveUser();
    @endif

    function formatRepo (repo) {
          if (repo.loading) return;

            if(repo.text == repo.id)
                return;
            if(repo.selected)
            return;
            if(repo.text == null)
             return;

        var url = "/user/photo/"+repo.id;

        var markup =
            "<img class='search-img' src='"+url +"' />"+

            "<span class='k-state-default'><h3>"+repo.text+"</h3></span>";


//          var markup = ""+
//          "<div class='select2-result-repository clearfix'>" +
//            "<div class='select2-result-repository__avatar'><img style='width: 50px; height: 50px' src='"+url +"' /></div>" +
//            "<div class='select2-result-repository__meta'>" +
//              "<div class='select2-result-repository__title'>" + repo.text + "</div>";
//
//          "</div></div>";

          return markup;
        }

        function formatRepoSelection (repo) {
            if(repo.text == null)
                return repo.id;
            return repo.text;
            return markup;
        }

        function formatRepoSelectionUser (repo) {
            var url = "/user/photo/"+repo.id;
            var markup = "<li class='user-remove user-remove-"+repo.id+"'><img style='width: 50px; height: 50px' title='"+repo.text+"' class='img-circle' src='"+url +"' />" +
                "<span class='user_choice_remove' data-id='"+repo.id+"' role='presentation'>×</span></li>";

            return markup;
        }


    $(function () {

        $('#deadLine').datetimepicker({

                format: 'YYYY-MM-DD HH:mm',
                dayViewHeaderFormat: 'MMMM',
                locale : 'pt',
                 defaultDate : moment({hour: 23, minute: 59}),
                 minDate : moment(),
                 maxDate: moment().add(6, 'month'),
                  inline : true

               });


               $('#change-date').click(function(){
                    $("a[data-action='togglePicker'] .glyphicon-calendar").click()
               });
               $('#change-time').click(function(){
                   $("a[data-action='togglePicker'] .glyphicon-time").click()
               });



    });


    function changeState(el) {
        if (el.readOnly) el.checked=el.readOnly=false;
        else if (!el.checked) el.readOnly=el.indeterminate=true;
    }


//    $("[name='public']").bootstrapSwitch();
    $("[name='post_facebook']").bootstrapSwitch();
    $("[name='sendall']").bootstrapSwitch();

</script>

<script type="text/javascript">
$(function () {
  var $sections = $('.form-section');

  function navigateTo(index) {
    // Mark the current section with the class 'current'
    $sections
      .removeClass('current')
      .eq(index)
        .addClass('current');
    // Show only the navigation buttons that make sense for the current section:
    $('#back_control').toggle(index >= 0);


    var atTheEnd = index >= $sections.length - 1;
//    $('#next_control').toggle(!atTheEnd);
    $('#next_control').toggle(index >= 0);
    //$('#form-challenge [type=submit]').toggle(atTheEnd);





    for (i = 1; i <= 3; i++) {
        $("#circle"+i).removeClass("active");

    }
     $("#circle"+(index+1)).addClass("active");


    if(atTheEnd){
        $("#next_control").html("Create");
    }else{
        $("#next_control").html("Next");
    }

      updateParentHeight();


  }

  function curIndex() {
    // Return the current index by looking at which section has the class 'current'
    return $sections.index($sections.filter('.current'));
  }

  // Previous button is easy, just go back
  $('#back_control').click(function() {
    navigateTo(curIndex() - 1);
      moveTopCreate();
  });

  $('#nextp1').click(function() {
      if ($('#form-challenge').parsley().validate({group: 'block-' + curIndex()})){

          navigateTo(curIndex() + 1);
          moveTopCreate();
        }
    });

  // Next button goes forward iff current block validates
  $('#next_control').click(function() {
    if ($('#form-challenge').parsley().validate({group: 'block-' + curIndex()})){
        var atTheEnd = curIndex() >= $sections.length - 1;
        if(atTheEnd){
            $( "#enviar" ).click();
        }else{

            navigateTo(curIndex() + 1);
            moveTopCreate();
        }

      }
  });

  // Prepare sections by setting the `data-parsley-group` attribute to 'block-0', 'block-1', etc.
  $sections.each(function(index, section) {
    $(section).find(':input').attr('data-parsley-group', 'block-' + index);
  });


  $("#circle1").click(function() {
     navigateTo(0);
  });

  $("#circle2").click(function() {
      if ($('#form-challenge').parsley().validate({group: 'block-' + 0})){
          moveTopCreate();
          navigateTo(1);
      }
  });

  $("#circle3").click(function() {
      $('#form-challenge').parsley().validate({group: 'block-' + 0})
      if ($('#form-challenge').parsley().validate({group: 'block-' + 1})){
          moveTopCreate();
          navigateTo(2);
      }
  });

  navigateTo(0); // Start at the beginning
});


function moveTopCreate() {

    $('html, body').animate({
        scrollTop: $('#top-create').offset().top - 20
    }, 'slow');


}

function updateParentHeight() {
    var  $frame = window.parent.document.getElementById('create-challenge-iframe');
    var curHeight = $('body').outerHeight();
    console.log('curHeight->' + curHeight);
    var $sections = $('.form-section');
    var index = $sections.index($sections.filter('.current'));
    var isPrivate = $('.form-private').is(":visible");
    if(index == 0 && !isPrivate)
        curHeight  = 300;
    if(index == 0 && isPrivate)
        curHeight  = 450;
    else if(index == 1)
         curHeight  = 400;
    else if(index == 2)
        curHeight  = 545;
    if($frame != null)
        $frame.style.height =  curHeight + 'px' ;

        $( "#form-challenge" ).trigger( "myCustomEvent" );
        console.log('myCustomEvent->' );
}



</script>



