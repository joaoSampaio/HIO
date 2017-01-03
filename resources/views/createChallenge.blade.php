@extends('app')

@section('header')
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

.custom-select:after {
    content: "▼";
    position: absolute;
    top: 2px;
    right: 2px;
    bottom: 2px;
    font-size: 90%;
    line-height: 35px;
    padding: 3px 15px;
    background: #E1E2E4;
    color: white;
    pointer-events: none;
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
	margin: 20px 0 0 0;
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
	width: 80px;
	height: 80px;
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

.ch-item .btn-xl {
    color: #fff;
    background-color: #C1C5C8;
    border-color: #C1C5C8;
    font-family: 'Roboto', sans-serif;
    text-transform: uppercase;
    font-weight: 700;
    border-radius: 3px;
    font-size: 18px;
    padding: 11px 28px;
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
    padding: 11px 28px;
}



.select2-container{
width: 100% !important;
}


button:focus {
    border-color: #eb1946 !important;
    background-color: #eb1946 !important;
}


</style>
@endsection

@section('content')

    <section>

        <div class="container" style="margin-top: 50px">
            <div class="row" id="latest">

                <h1 style="    text-align: center;margin-bottom: 10px;margin-top: 40px;">New Challenge</h1>

                <div class="col-md-offset-1 col-md-10 col-sm-12 col-xs-12 personal-info">
                    {!! Form::open(array('action' => array('HomeController@storeChallenge'), 'class' => 'form-horizontal', 'id' => 'formulario', 'autocomplete' => 'off')) !!}

                        <ul class="ch-grid">
                            <li class="show-friends">
                                <div class="ch-item ch-img-1 ">
                                    <button type="button" id="circle1" class="btn btn-info btn-circle btn-xl btn-active"><span style="font-size: 40px;">1</span></button>
                                </div>
                            </li>
                            <li class="show-friends">
                                <div class="ch-item ch-img-1">
                                    <button type="button" id="circle2" class="btn btn-info btn-circle btn-xl"><span style="font-size: 40px;">2</span></button>
                                </div>
                            </li>
                            <li class="show-friends">
                                <div class="ch-item ch-img-1">
                                    <button type="button" id="circle3" class="btn btn-info btn-circle btn-xl"><span style="font-size: 40px;">3</span></button>
                                </div>
                            </li>
                            <li class="show-friends">
                                <div class="ch-item ch-img-1">
                                    <button type="button" id="circle4" class="btn btn-info btn-circle btn-xl"><span style="font-size: 40px;">4</span></button>
                                </div>
                            </li>



                        </ul>

@if (count($errors) > 0)
                              <div class="alert alert-danger">
                                  <ul>
                                      @foreach ($errors->all() as $error)
                                          <li>{{ $error }}</li>
                                      @endforeach
                                  </ul>
                              </div>
                          @endif



                        <div style="margin-top: 35px;" id="page1">

                            <div class="form-group">
                                <div class="col-md-offset-3 col-md-6 col-sm-12 col-xs-12" style="text-align: center;margin-bottom: 30px">
                                    <h4 >Nominate who you want to take the challenge</h4>
                                    <h4 >(Yes, you can challenge yourself):</h4>
                                </div>

                                <div class="col-lg-12">
                                @if(Auth::user()->role == "brand")
                                    {!! Form::select('emailFriend[]', array(),null,array( 'class'=>'form-control js-data-example-ajax', 'multiple'=>'multiple')) !!}
                                @else
                                    {!! Form::select('emailFriend[]', array(),null,array('required', 'data-validation'=>'required',  'class'=>'form-control js-data-example-ajax', 'multiple'=>'multiple')) !!}
                                @endif
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


                            <div class="form-group" style="margin-top: 70px; text-align: center;" >
                              <div class="col-md-12 col-xs-12">
                                    <input class="btn btn-primary btn-xl" value="Next" id="nextp1">
                              </div>
                            </div>
                        </div>

                        <div style="margin-top: 35px;" id="page2">
                            <div class="form-group">
                              <div class="col-md-offset-3 col-md-6 col-sm-12 col-xs-12" style="text-align: center;margin-bottom: 30px">
                                  <h4 >Let them know what is waiting for them</h4>
                              </div>
                              <div class="col-lg-12">
                                {!! Form::text('title', null,array('required', 'data-validation'=>'required', 'class'=>'form-control', 'placeholder'=>'Title')) !!}
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-lg-6 col-md-6">

                              <label class="custom-select">
                                    {!! Form::select('category', $category,'teste',array('required', 'class'=>'form-control')) !!}

                              </label>

                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-lg-12">
                                {{ Form::textarea('description', null,array('required', 'class'=>'form-control', 'placeholder'=>'Describe your challenge ...')) }}

                              </div>
                            </div>


                        </div>

                        <div style="margin-top: 35px;" id="page3">
                            <div class="form-group">

                                <div class="col-md-offset-3 col-md-6 col-sm-12 col-xs-12" style="text-align: center;margin-bottom: 30px">
                                      <h4 >It is a matter of time until the end, how much will they have to succeed?</h4>
                                </div>

                              <div class="col-lg-12 col-md-12">
                                 <div class='input-group' style="background-color: #ccc; padding: 20px; border-radius: 20px;     margin: 0 auto;">
                                     {!! Form::text('deadLine',null,  ['required', 'id'=>"deadLine" , 'class'=>'form-control hidden ','placeholder'=>'Define dead line']) !!}
                                 </div>



                              </div>
                            </div>


                        </div>

                        <div style="margin-top: 35px;" id="page4">
                            <div class="form-group">

                                <div class="col-md-offset-3 col-md-6 col-sm-12 col-xs-12" style="text-align: center;margin-bottom: 30px">
                                      <h4 >Dare to reward your friends. If they fail, feel free to penalty them or yourself</h4>
                                </div>

                                <div class="col-lg-6 col-md-6" style="margin-bottom: 15px;">
                                    {!! Form::text('reward', null,array('required', 'class'=>'form-control','placeholder'=>'Reward')) !!}
                                </div>


                                <div class="col-lg-6 col-md-6">
                                    {!! Form::text('penalty', null,array('required', 'class'=>'form-control', 'placeholder'=>'Penalty')) !!}
                                </div>

                                <h5 style="text-transform: none;" class="col-lg-12">
                                    We are not responsible for the nature of your rewards and penalties. Don't make anything capable of hurting yourself and your friends.
                                 </h5>
                            </div>

                            <div class="form-group">

                              <div class="col-lg-6 col-md-6">

                                 <div class='input-group' >

                                    <div class="col-lg-6 col-md-6">
                                        <label style="float: left;     margin-top: 7px;">Public Challenge</label>
                                    </div>

                                    <div class="col-lg-6 col-md-6">
                                        <div class="checkbox checkbox-circle checkbox-info" style="float: left; margin-top: -7px; margin-left: 10px;">
                                            <input type="checkbox" name="public" checked value="yes" data-on-text="Public" data-off-text="Private" data-on-color="primary" data-off-color="primary">
                                        </div>
                                    </div>
                                 </div>
                              </div>

                              {{--<div class="col-lg-6 col-md-6">--}}
                                   {{--<div class='input-group' >--}}
                                    {{--<div class="col-lg-6 col-md-6">--}}
                                          {{--<label style="float: left; margin-top: 7px;">Publish on Facebook</label>--}}
                                      {{--</div>--}}
                                      {{--<div class="col-lg-6 col-md-6">--}}
                                        {{--<div class="checkbox checkbox-circle checkbox-info" style="float: left; margin-top: -7px; margin-left: 10px;">--}}
                                              {{--<input type="checkbox" name="post_facebook" checked value="yes" data-on-text="Publish" data-off-text="Private" data-on-color="primary" data-off-color="primary">--}}
                                          {{--</div>--}}
                                      {{--</div>--}}
                                   {{--</div>--}}
                                {{--</div>--}}

                            </div>


                        </div>







                        <div class="form-group" style="margin-top: 70px; text-align: center;" id="controls" >
                              <div class="col-md-12 col-xs-12">

                                <div class="col-xs-12 col-md-6" style="margin-bottom: 20px;">
                                    <input class="btn btn-default btn-xl btn-cancel-hio" value="Back" id="back_control" >
                                </div>

                                <div class="col-xs-12 col-md-6">
                                    <input class="btn btn-primary btn-xl btn-create-hio" value="Next" id="next_control">
                                </div>


                              </div>
                            </div>


<input class="btn btn-primary  hide" value="Next" id="enviar" type="submit">
                    </form>
                </div>
            </div>
        </div>






    </section>



@endsection

@section('footer')
{{--<script src="js/bootstrap-datetimepicker.min.js"></script>--}}

    <script src="{{ asset('js/moment-with-locales.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    <script src="{{ asset('js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-tokenfield.js') }}"></script>



    <script src="{{ asset('js/transition.js') }}"></script>
    <script src="{{ asset('js/collapse.js') }}"></script>


    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment.min.js"></script>

    <script src="{{ asset('js/bootstrap-datetimepicker.pt-BR.js') }}"></script>


<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>

<script src="{{ asset('js/bootstrap-switch.min.js') }}"></script>

    <script type="text/javascript">


$( "#submeter" ).click(function( event ) {
    $( "#formulario" ).addClass( "validar" );
});


$(".js-data-example-ajax").select2({
            ajax: {
                url: "{{ action('HomeController@searchFriend') }}",
                dataType: 'json',

                delay: 250,
                tags: true,
                selectOnClose: true,
                selectOnBlur: true,
                allowClear: true,
                data: function (params) {
              console.log('params:'+params);
                return {
                  q: params.term, // search term
                  page: params.page
                };
              },
              processResults: function (data, params) {
                return {
                  results: $.map(data, function(obj) {
//                                if(obj.name.toLowerCase().indexOf(params.term.toLowerCase()) > -1)
                              return { id: obj.id, text: obj.name, photo: obj.photo };
                          })
                };
              },
              cache: true
            },
            placeholder: "EMAILS OR USERS",
            tokenSeparators: [',','\n', '\t'],
            escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
            minimumInputLength: 1,
            templateResult: formatRepo, // omitted for brevity, see the source of this page
            templateSelection: formatRepoSelection // omitted for brevity, see the source of this page
          });


    $( ".select2-container" )
      .focusout(function() {
        console.log("focus out");
        var select2 = $('.js-data-example-ajax').data('select2');
        console.log("evt:", $('.js-data-example-ajax').data('select2'));
      }).blur(function() {
            console.log("blur out");
          });


    @if(isset($targetUser))

        var fbId = <?php echo $targetUser->id; ?>;
        var nameFb = "<?php echo $targetUser->name; ?>";


        $('.js-data-example-ajax').append($('<option>', {
                value: fbId,
                text : nameFb
            })).trigger("change");

        $(".js-data-example-ajax").val([ fbId]).trigger("change");

    @else
        //$(".js-data-example-ajax").val([<?php echo Auth::user()->facebook_id; ?>]).trigger("change");
    @endif










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
            if(repo.text == null)
                return repo.id;
            return repo.text;
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


    var currentPage = 0;
    function showPage(page){
        console.log("page:" + page);
        currentPage = page;
        for (i = 1; i <= 4; i++) {
            $("#page"+i).addClass("hide");
            $("#circle"+i).removeClass("btn-active");

        }
         $("#circle"+page).addClass("btn-active");
         $("#page"+page).removeClass("hide");


        if(page == 1){
            $("#controls").addClass("hide");
        }else{
            $("#controls").removeClass("hide");
        }

        if(page == 4){
            $("#next_control").val("Create Challenge");
        }else{
            $("#next_control").val("Next");
        }
    }

$("#circle1").click(function() {
   showPage(1);
});

$("#circle2").click(function() {
   showPage(2);
});

$("#circle3").click(function() {
   showPage(3);
});

$("#circle4").click(function() {
   showPage(4);
});


    $("#nextp1").click(function() {
       showPage(2);
    });
    $("#next_control").click(function() {

        if(currentPage == 4){

        $( "#enviar" ).click();

        }else{
            showPage(currentPage+1);
        }
    });

    $("#back_control").click(function() {
       showPage(currentPage-1);
    });

  $.validate({
    lang: 'es',
    form : '#formulario'

  });

    showPage(1);

    function changeState(el) {
        if (el.readOnly) el.checked=el.readOnly=false;
        else if (!el.checked) el.readOnly=el.indeterminate=true;
    }


    $("[name='public']").bootstrapSwitch();
    $("[name='post_facebook']").bootstrapSwitch();
    $("[name='sendall']").bootstrapSwitch();

</script>





@endsection

