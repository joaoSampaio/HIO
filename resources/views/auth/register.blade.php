@extends('layouts/auth')

@section('header')

<style>


.Radio {
  position: absolute;
  left: 0px;
  top: 0px;
  width: 2304px;
  height: 4024px;
  z-index: 49;
}
.Ellipse {
  border-radius: 50%;
  background-color: rgb(188, 188, 188);

  width: 14px;
  height: 14px;
}
.Ellipse {
  border-width: 2px;
  border-color: rgb(54, 58, 61);
  border-style: solid;
  border-radius: 50%;
  position: absolute;
  left: 1513px;
  top: 229px;
  width: 22px;
  height: 22px;
  z-index: 47;
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
      border-color: rgb(54, 58, 61);
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
    background: rgb(188, 188, 188);
}

</style>


@endsection
@section('content')



    <div class="row" style="margin-top: 300px;margin-bottom: 130px">

<div class="radio-choice">

  <label for="male"><input id="male" class="radio" type="radio" name="choice" value="user">
  <div class="inside"></div>
  USER
  </label>
  <label for="female">
  <input id="female" class="radio" type="radio" name="choice" value="brand">
  <div class="inside"></div>
  BRAND</label>
</div>




         <form class="form-horizontal form-user" role="form" method="POST" style="    margin-top: 30px;" action="{{ url('/register') }}">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('name-reg') ? ' has-error' : '' }}">

                <div class="col-md-6" style="margin-bottom: 15px;">
                    <input id="name" type="text" class="form-control" placeholder="First Name" name="name-reg" value="{{ old('name-reg') }}">
                </div>
                <div class="col-md-6">
                    <input id="apelido" type="text" class="form-control" placeholder="Last name" name="apelido-reg" value="{{ old('apelido-reg') }}">
                </div>
            </div>

            <div class="form-group{{ $errors->has('email-reg') ? ' has-error' : '' }}">

                <div class="col-md-12">
                    <input id="email" type="email" class="form-control" placeholder="Email" name="email-reg" value="{{ old('email-reg') }}">
                    @if ($errors->has('email-reg'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email-reg') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('password-reg') ? ' has-error' : '' }}">

                <div class="col-md-12">
                    <input id="password" type="password" placeholder="Password" class="form-control" name="password-reg">

                    @if ($errors->has('password-reg'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password-reg') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('password-reg_confirmation') ? ' has-error' : '' }}">

                <div class="col-md-12">
                    <input id="password-confirm" type="password" placeholder="Confirm Password" class="form-control" name="password-reg_confirmation">

                    @if ($errors->has('password-reg_confirmation'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password-reg_confirmation') }}</strong>
                        </span>
                    @endif
                </div>
            </div>




            <div class="form-group">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-success col-md-12">
                        <i class="fa fa-btn fa-user"></i> Register
                    </button>
                </div>
            </div>
        </form>

        <form class="form-horizontal form-brand" role="form" method="POST" style="    margin-top: 30px;" action="{{ url('/register-brand') }}">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('name-brand') ? ' has-error' : '' }}">

                <div class="col-md-12">
                    <input id="name" type="text" class="form-control" placeholder="Name" name="name-brand" value="{{ old('name-brand') }}">
                    @if ($errors->has('name-brand'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name-brand') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('email-brand') ? ' has-error' : '' }}">

                <div class="col-md-12">
                    <input id="email" type="email" class="form-control" placeholder="Email" name="email-brand" value="{{ old('email-brand') }}">
                    @if ($errors->has('email-brand'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email-brand') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('email-brand') ? ' has-error' : '' }}">

                <div class="col-md-12">
                    <input id="email" type="text" class="form-control" placeholder="Address" name="address-brand" value="{{ old('address-brand') }}">
                    @if ($errors->has('address-brand'))
                        <span class="help-block">
                            <strong>{{ $errors->first('address-brand') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('password-brand') ? ' has-error' : '' }}">

                <div class="col-md-12">
                    <input id="password" type="password" placeholder="Password" class="form-control" name="password-brand">

                    @if ($errors->has('password-brand'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password-brand') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('password-brand_confirmation') ? ' has-error' : '' }}">

                <div class="col-md-12">
                    <input id="password-confirm" type="password" placeholder="Confirm Password" class="form-control" name="password-brand_confirmation">

                    @if ($errors->has('password-brand_confirmation'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password-brand_confirmation') }}</strong>
                        </span>
                    @endif
                </div>
            </div>




            <div class="form-group">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-success col-md-12">
                        <i class="fa fa-btn fa-user"></i> Register
                    </button>
                </div>
            </div>
        </form>












        <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" placeholder="Nome" name="name" value="{{ old('name') }}">
                </div>
                <div class="col-md-6">
                    <input id="apelido" type="text" class="form-control" placeholder="Apelido" name="apelido" value="{{ old('apelido') }}">
                </div>
            </div>


            {{--<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">--}}
                {{--<label for="name" class="col-md-4 control-label">Name</label>--}}

                {{--<div class="col-md-6">--}}
                    {{--<input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">--}}

                    {{--@if ($errors->has('name'))--}}
                        {{--<span class="help-block">--}}
                            {{--<strong>{{ $errors->first('name') }}</strong>--}}
                        {{--</span>--}}
                    {{--@endif--}}
                {{--</div>--}}
            {{--</div>--}}

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="col-md-4 control-label">Password</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control" name="password">

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-btn fa-user"></i> Register
                    </button>
                </div>
            </div>
        </form>
    </div>

@endsection

@section('footer')
    <script>

        $(document).ready(function() {
            $('input[type=radio]').change(function() {
                if (this.value == 'user') {
                     $('.form-user').show();
                    $('.form-brand').hide();
                }
                else if (this.value == 'brand') {

                    $('.form-user').hide();
                    $('.form-brand').show();
                }
            });
            var brandChoice = false;
            @if($errors->has('name-brand') || $errors->has('email-brand') || $errors->has('address-brand') || $errors->has('password-brand'))
                brandChoice = true;
            @endif
            if(brandChoice){
            $("#radio-brand").click();
            }else{
            $("#radio-user").click();
            }

        });
    </script>

@endsection