@extends('app')

@section('header')

    <link href="{{ asset('css/bootstrap-datetimepicker.css') }}" rel="stylesheet">



<style>
.datepicker{
    background-color: #fff;
    color: #000;
}

.datepicker .btn{
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

.form-control::-webkit-input-placeholder { color: #C1C5C8; }
.form-control:-moz-placeholder { color: #C1C5C8; }
.form-control::-moz-placeholder { color: #C1C5C8; }
.form-control:-ms-input-placeholder { color: #C1C5C8; }
.form-control {  color: #C1C5C8;}



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
    padding: 0 15px;
    background: #E1E2E4;
    color: white;
    pointer-events: none;
}

.no-pointer-events .custom-select:after {
    content: none;
}

.headerHIO {
    text-align: center;
     margin-top: 5px !important;
    margin-bottom: 50px;
}
</style>
@endsection

@section('content')



<!-- Header -->
    <section id="clients" style="margin-top: 100px">



        <div class="container" style="padding-top: 60px;">
            <h1 class="headerHIO">We're sorry we need some additional information</h1>
            <p class="headerHIO">Sometimes Facebook does not return needed information.</p>
                      <div class="row">
                        <!-- left column -->

                        <!-- edit form column -->
                        <div class="col-md-offset-2 col-md-8 col-sm-12 col-xs-12 personal-info">


                          {!! Form::open(array('action' => array('SocialAuthController@saveMissingFB'), 'class' => 'form-horizontal')) !!}
                          {{--<form class="form-horizontal" role="form">--}}
                          @if (count($errors) > 0)
                              <div class="alert alert-danger">
                                  <ul>
                                      @foreach ($errors->all() as $error)
                                          <li>{{ $error }}</li>
                                      @endforeach
                                  </ul>
                              </div>
                          @endif

                            @if($data["name"])
                                {{ Form::hidden('name',$data["name"] ) }}
                            @endif

                            @if($data["facebook_id"])
                                {{ Form::hidden('facebook_id',$data["facebook_id"] ) }}
                            @endif

                            @if($data["facebook_token"])
                                {{ Form::hidden('facebook_token',$data["facebook_token"] ) }}
                            @endif

                            @if($data["facebook_id"])
                                {{ Form::hidden('facebook_id',$data["facebook_id"] ) }}
                            @endif




                            @if($data["email"])
                                {{ Form::hidden('email',$data["email"] ) }}
                            @else

                                <div class="form-group">
                                  <h5 class="col-lg-12">Your email</h5>
                                  <div class="col-lg-12">
                                    {!! Form::text('email', null,array('required', 'class'=>'form-control', 'placeholder'=>'Email')) !!}
                                  </div>
                                </div>
                            @endif



                            <div class="form-group">
                            @if($data["location"])
                                {{ Form::hidden('location',$data["location"] ) }}
                            @else
                                  <div class="col-lg-6 col-md-6">
                                      <label class="custom-select">
                                            {!! Form::select('location', $distritos,null,array('required', 'class'=>'form-control', 'placeholder'=>'Distrito')) !!}
                                      </label>
                                  </div>
                              @endif

                              @if($data["birthday"])
                                  {{ Form::hidden('birthday',$data["birthday"] ) }}
                              @else
                              <div class="col-lg-6 col-md-6">

                                <div class='input-group' >
                                  {!! Form::text('birthday', null,array('required', 'id'=>"birthday" , 'class'=>'form-control', 'placeholder'=>'Birthday')) !!}
                                  <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                </div>
                              </div>
                              @endif
                            </div>

                            @if($data["gender"])
                                {{ Form::hidden('gender',$data["gender"] ) }}
                            @else
                                <div class="form-group">
                                  <div class="col-lg-6 col-md-6" style="margin-bottom: 15px;">

                                    <label class="radio-inline">{{ Form::radio('gender', 'male', true) }}Male</label>
                                    <label class="radio-inline">{{ Form::radio('gender', 'female') }}Female</label>
                                  </div>

                                </div>
                            @endif



                            <div class="form-group" style="margin-top: 70px;">
                              <div class="col-md-12 col-xs-12">
                                    <input class="btn btn-primary btn-xl" value="Create account" type="submit">
                                </div>



                            </div>
                          </form>
                        </div>
                      </div>
        </div>
    </section>



@endsection

@section('footer')

    <script src="{{ asset('js/moment-with-locales.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    <script src="{{ asset('js/bootstrap-datetimepicker.min.js') }}"></script>

    <script src="{{ asset('js/transition.js') }}"></script>
    <script src="{{ asset('js/collapse.js') }}"></script>


    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment.min.js"></script>

    <script src="{{ asset('js/bootstrap-datetimepicker.pt-BR.js') }}"></script>

    <script>

     $(function () {
            $('#birthday').datetimepicker({
            format: 'YYYY-MM-DD'

           });

        });




    </script>

@endsection

