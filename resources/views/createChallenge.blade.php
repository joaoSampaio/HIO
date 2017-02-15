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

    <link href='https://fonts.googleapis.com/css?family=Roboto:700,900,400,500' rel='stylesheet' type='text/css'>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">

    <link href="{{ asset('css/hio.css') }}" rel="stylesheet">






    {{--    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">--}}

    <link href="{{ asset('css/bootstrap-datetimepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('css/radio.css') }}" rel="stylesheet">
{{--    <link href="{{ asset('css/bootstrap-tokenfield.css') }}" rel="stylesheet">--}}

    <link href="{{ asset('css/s2-docs.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-switch.min.css') }}" rel="stylesheet">

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
	margin: 20px;
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
    margin-top: 35px;
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



.create-input{
    font-family: "Roboto";
    background-color: transparent !important;
    border: 0;
    border-bottom: 2px solid rgba(188, 188, 188, 0.2);
    padding: 0px;
    font-size: 16px;
    color: #C1C5C8 !important;
    -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0);
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0);

}

.create-input::-webkit-input-placeholder { /* WebKit, Blink, Edge */
    color:    #C1C5C8;
}
.create-input:-moz-placeholder { /* Mozilla Firefox 4 to 18 */
    color:    #C1C5C8;
    opacity:  1;
}
.create-input::-moz-placeholder { /* Mozilla Firefox 19+ */
    color:    #C1C5C8;
    opacity:  1;
}
.create-input:-ms-input-placeholder { /* Internet Explorer 10-11 */
    color:    #C1C5C8;
}

.create-input:focus {
    border-color: transparent;
    outline: 0;
    box-shadow:none;

    /*-webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(235,25,70,.6);*/
    /*box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(235,25,70,.6);*/
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

</style>
</head>

<body style="background-color: white">

        <div class="container">
            <div class="row" id="latest">

                <div class="col-md-offset-1 col-md-10 col-sm-12 col-xs-12 personal-info">
                    {!! Form::open(array('action' => array('HomeController@storeChallenge'), 'class' => 'form-horizontal', 'id' => 'form-challenge', 'autocomplete' => 'off')) !!}

                        <ul class="ch-grid">
                            <li class="show-friends">
                                <div class="ch-item ch-img-1 ">
                                    <button type="button" id="circle1" class="btn btn-info btn-circle btn-xl btn-active"><span >1</span></button>
                                </div>
                            </li>
                            <li class="show-friends">
                                <div class="ch-item ch-img-1">
                                    <button type="button" id="circle2" class="btn btn-info btn-circle btn-xl"><span>2</span></button>
                                </div>
                            </li>
                            <li class="show-friends">
                                <div class="ch-item ch-img-1">
                                    <button type="button" id="circle3" class="btn btn-info btn-circle btn-xl"><span>3</span></button>
                                </div>
                            </li>
                            <li class="show-friends">
                                <div class="ch-item ch-img-1">
                                    <button type="button" id="circle4" class="btn btn-info btn-circle btn-xl"><span>4</span></button>
                                </div>
                            </li>



                        </ul>

                    <div id="top-create"></div>
                        @if (count($errors) > 0)
                              <div class="alert alert-danger">
                                  <ul>
                                      @foreach ($errors->all() as $error)
                                          <li>{{ $error }}</li>
                                      @endforeach
                                  </ul>
                              </div>
                          @endif



                        <div class="form-section" id="page1">

                            <div class="form-group">

                                <div class="col-lg-12">
                                    {!! Form::text('title', null,array('required', 'data-validation'=>'required', 'data-parsley-required-message'=>'*information required', 'class'=>'form-control create-input', 'placeholder'=>'Challenge Title')) !!}
                                </div>

                            </div>
                            <div class="form-group" style="margin-top: 35px;margin-bottom: 30px">
                                <div class="col-lg-12 col-md-12">


                                    <div class="radio-choice">

                                        <label for="radio-public">
                                            <input id="radio-public" checked="checked" class="radio radio-btn-public" type="radio" name="public" value="yes">
                                            <div class="inside"></div>
                                            Public
                                        </label>
                                        <label for="radio-private">
                                            <input id="radio-private" class="radio radio-btn-public" type="radio" name="public" value="no">
                                            <div class="inside"></div>
                                            Private
                                        </label>
                                    </div>


                                </div>
                            </div>
                            <div class="form-group form-private">

                                <div class="col-lg-12 col-md-12" style="margin-bottom: 15px;">
                                    {!! Form::text('reward', null,array( 'class'=>'form-control create-input','placeholder'=>'Reward')) !!}
                                </div>
                            </div>
                            <div class="form-group form-private">

                                <div class="col-lg-12 col-md-12">
                                    {!! Form::text('penalty', null,array( 'class'=>'form-control create-input', 'placeholder'=>'Penalty')) !!}
                                </div>
                            </div>


                            @if(Auth::user()->role == "brand")
                            <div class="form-group" >
                              <div class="col-md-12 col-lg-12">
                                   <div class='input-group' >
                                       <div class="col-lg-6 col-md-6">
                                           <label style="float: left;     margin-top: 7px;">Send to all Friends</label>
                                       </div>

                                       <div class="col-lg-6 col-md-6">
                                           <div class="checkbox checkbox-circle checkbox-info" style="float: left; margin-top: -7px; margin-left: 10px;">
                                               <input type="checkbox" name="sendall" value="no" data-on-text="All" data-off-text="None" data-on-color="primary" data-off-color="primary">
                                           </div>
                                       </div>
                                    </div>
                              </div>
                            </div>
                            @endif

                        </div>

                        <div class="form-section" id="page2">


                            <div class="form-group">
                              <div class="col-lg-6 col-md-6 col-xs-6">

                              <label class="custom-select">
                                    {!! Form::select('category', $category,'teste',array('required', 'data-parsley-required-message'=>'*information required', 'class'=>'form-control create-input')) !!}

                              </label>

                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-lg-12">
                                {{ Form::text('description', null,array('required', 'data-parsley-required-message'=>'*information required', 'class'=>'form-control create-input', 'placeholder'=>'Describe your challenge')) }}

                              </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-12">
                                    @if(Auth::user()->role == "brand")
                                        {!! Form::select('emailFriend[]', array(),null,array('id'=>'friends-cha', 'class'=>'form-control  js-data-example-ajax', 'multiple'=>'multiple')) !!}
                                    @else
                                        {!! Form::select('emailFriend[]', array(),null,array('id'=>'friends-cha','required', 'data-validation'=>'required','data-parsley-required-message'=>'*information required',  'class'=>'form-control js-data-example-ajax', 'multiple'=>'multiple')) !!}
                                    @endif
                                </div>
                            </div>


                        </div>

                        <div class="form-section" id="page3">
                            <div class="form-group">

                                <div class="col-md-offset-3 col-md-6 col-sm-12 col-xs-12" style="text-align: center;margin-bottom: 30px">
                                      <h4 >It is a matter of time until the end,<br> how much will they have to succeed?</h4>
                                </div>

                              <div class="col-lg-12 col-md-12">
                                 <div class='input-group' style="background-color: #ccc; padding: 20px; border-radius: 20px;     margin: 0 auto;">
                                     {!! Form::text('deadLine',null,  ['required', 'id'=>"deadLine" , 'class'=>'form-control hidden ','placeholder'=>'Define dead line']) !!}
                                 </div>



                              </div>
                            </div>


                        </div>




                        <div class="form-group" style="margin-top: 70px; text-align: center;" id="controls" >
                              <div class="col-md-12 col-xs-12">

                                <div class="col-xs-6 col-md-6" style="margin-bottom: 20px;">
                                    <button type="button" class="btn btn-default btn-xl btn-cancel-hio" id="back_control">Back</button>
                                    {{--<input class="btn btn-default btn-xl btn-cancel-hio" value="Back" id="back_control" >--}}
                                </div>

                                <div class="col-xs-6 col-md-6">
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


$( "#submeter" ).click(function( event ) {
    $( "#formulario" ).addClass( "validar" );
});

$(document).ready(function() {
    $('input[name="public"]').change(function () {
        if (this.value == 'yes') {
            $('.form-private').hide();
        }
        else if (this.value == 'no') {

            $('.form-private').show();
        }
        updateParentHeight();
    });

    var isPublic = true;

    if (isPublic) {
        $('.form-private').hide();
    } else {
        $('.form-private').show();
    }
    updateParentHeight();
});





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
        var nameFb = "<?php echo $targetUser->name; ?>";


        $('.js-data-example-ajax').append($('<option>', {
                value: targetId,
                text : nameFb
            })).trigger("change");

        $(".js-data-example-ajax").val([ targetId]).trigger("change");
    @endif

$('.js-data-example-ajax').on('select2:select', function (evt) {
//    if(evt.params.data.type == 0){
//        window.location = "/profile/"+evt.params.data.id;
//    }else if(evt.params.data.type == 1){
//        window.location = "/challenge/"+evt.params.data.id;
//    } else if(evt.params.data.type == 2){
//        window.location = "/challenges/"+evt.params.data.id;
//    }
    return true;
    });

    function formatRepo (repo) {
          if (repo.loading) return;

            if(repo.text == repo.id)
                return;
            if(repo.selected)
            return;
            if(repo.text == null)
             return;

        var url = (repo.photo == "")? "/uploads/users/default_user.png" : "/uploads/users/"+repo.photo;
          var markup = ""+
          "<div class='select2-result-repository clearfix'>" +
            "<div class='select2-result-repository__avatar'><img style='width: 50px; height: 50px' src='"+url +"' /></div>" +
            "<div class='select2-result-repository__meta'>" +
              "<div class='select2-result-repository__title'>" + repo.text + "</div>";

          "</div></div>";

          return markup;
        }

        function formatRepoSelection (repo) {
//            if(repo.text == null)
//                return repo.id;
//            return repo.text;

            var url = (repo.photo == "")? "/uploads/users/default_user.png" : "/uploads/users/"+repo.photo;
            var markup = "<img style='width: 50px; height: 50px' class='img-circle' src='"+url +"' />";



            return markup;



        }


    $(function () {

        $('#deadLine').datetimepicker({

                format: 'YYYY-MM-DD HH:mm',
                locale : 'pt',
                 defaultDate : moment({hour: 23, minute: 59}),
                 minDate : moment(),
                 maxDate: moment().add(6, 'month'),
                  inline : true

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





    for (i = 1; i <= 4; i++) {
        $("#circle"+i).removeClass("btn-active");

    }
     $("#circle"+(index+1)).addClass("btn-active");


    if(atTheEnd){
        $("#next_control").val("Create Challenge");
    }else{
        $("#next_control").val("Next");
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

  $("#circle4").click(function() {
      //campo 2 é o calendario e esta sempre ok
      $('#form-challenge').parsley().validate({group: 'block-' + 0})
      if ($('#form-challenge').parsley().validate({group: 'block-' + 1})){
          moveTopCreate();
          navigateTo(3);
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
    var curHeight = $('body').height();
    curHeight  = 500;
    if($frame != null)
        $frame.style.height =  curHeight + 'px' ;

}

//jQuery(function($){
//    var lastHeight = 0, curHeight = 0, $frame = window.parent.document.getElementById('create-challenge-iframe');
//    setInterval(function(){
//        curHeight = $('body').height();
//
//        if($frame != null)
//        $frame.style.height =  '500px' ;
//
////        parent.document.getElementById("create-challenge-iframe").style.height = (lastHeight = curHeight) + 'px' ;
//
////        if ( curHeight != lastHeight ) {
////            $frame.style.height = (lastHeight = curHeight) + 'px' ;
////        }
//    },5000);
//});

//$(function () {
//    var $frame = window.parent.document.getElementById('create-challenge-iframe');
//    $frame.css('height', (lastHeight = curHeight) + 'px' );
//});

</script>



