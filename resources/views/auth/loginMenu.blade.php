









@extends('layouts/auth')

@section('header')

    <style>
/*.panel {*/
    /*margin-bottom: 20px;*/
    /*background-color: #48494D;*/
    /*border: 1px solid transparent;*/
    /*border-radius: 4px;*/
    /*-webkit-box-shadow: 0 1px 1px rgba(0,0,0,.05);*/
    /*box-shadow: 0 1px 1px rgba(0,0,0,.05);*/
/*}*/
/*.panel-default>.panel-heading {*/
    /*color: #fff;*/
    /*background-color: #48494D;*/
    /*border-color: #ddd;*/
/*}*/
/*.divider {*/
/*position: relative;*/
/*border-bottom: 1px solid #f0f0f0;*/
/*margin-bottom: 30px;*/
/*margin-top: 30px; }*/

/*body {*/
    /*background-color: #cccccc;*/
     /*background-image: url(/img/login/bg.jpg);*/
    /*background-size: cover;*/
/*}*/
/*.panel-title-hio{*/
/*color: #ffffff;*/
/*font-size: 20px;*/
/*margin-bottom: 15px;*/
/*}*/

/*.registrar-op{*/
/*color: #ffffff;*/
/*}*/
/*.form-control {*/

    /*height: 35px;*/
    /*}*/




.btn-facebook{
    color: #fff;
    border-radius: 5px;
    background-color: rgb(81, 102, 174);
    border-color: rgb(81, 102, 174);
    font-family: 'Roboto', sans-serif;
    text-transform: uppercase;
    font-weight: 600;
    width: 268px;
    height: 58px;
    line-height: 3;
      text-align: center;
            vertical-align: middle;
      text-align: center;
    font-size: 16px;

}

.btn-facebook:hover{
color: #fff;
}




    </style>


@endsection
@section('content')


        <div class="main-container">
            <div class="row" style="margin-bottom: 15px">
                <a href="{{ action('SocialAuthController@redirectToProvider') }}" class="btn btn-facebook">Facebook Login</a>
            </div>

            <div class="row">
                <a href="/login" class="btn btn-normal-login">Login</a>
            </div>


            <div class="row extra-register" style="margin-bottom: 130px; margin-top: 15px">
                <a  href="{{ url('/password/reset') }}">Forgot my Password </a>
                |
                <a href="{{ url('/register') }}">Register</a>
            </div>
        </div>

            {{--<div class="col-md-6">--}}

            {{--</div>--}}

            {{--<div class="col-md-6">--}}
                {{--<div class="panel panel-default" style="    border: 1px solid #fff;border-radius: 5px;">--}}
                    {{--<div class="panel-heading">Login</div>--}}
                    {{--<div class="panel-body">--}}

                    {{--@if (session('activationStatus'))--}}
                        {{--<div class="alert alert-success">--}}
                            {{--{{ trans('auth.activationStatus') }}--}}
                        {{--</div>--}}
                    {{--@endif--}}

                    {{--@if (session('activationWarning'))--}}
                        {{--<div class="alert alert-warning">--}}
                            {{--{{ trans('auth.activationWarning') }}--}}
                        {{--</div>--}}
                    {{--@endif--}}


                    {{--<div class="col-md-5">--}}
                        {{--<label class="panel-title-hio">Login</label>--}}
                        {{--<form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">--}}
                            {{--{{ csrf_field() }}--}}

                            {{--<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">--}}

                                {{--<div class="col-md-12">--}}
                                    {{--<input id="email" type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}">--}}

                                    {{--@if ($errors->has('email'))--}}
                                        {{--<span class="help-block">--}}
                                            {{--<strong>{{ $errors->first('email') }}</strong>--}}
                                        {{--</span>--}}
                                    {{--@endif--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">--}}

                                {{--<div class="col-md-12">--}}
                                    {{--<input id="password" type="password" placeholder="Password" class="form-control" name="password">--}}

                                    {{--@if ($errors->has('password'))--}}
                                        {{--<span class="help-block">--}}
                                            {{--<strong>{{ $errors->first('password') }}</strong>--}}
                                        {{--</span>--}}
                                    {{--@endif--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="form-group">--}}
                                {{--<div class="col-md-6 col-md-offset-4">--}}
                                    {{--<div class="checkbox">--}}
                                        {{--<label>--}}
                                            {{--<input type="checkbox" name="remember"> Remember Me--}}
                                        {{--</label>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="form-group">--}}
                                {{--<div class="col-md-12">--}}
                                    {{--<button type="submit" class="btn btn-primary col-md-12">--}}
                                        {{--<i class="fa fa-btn fa-sign-in"></i> Login--}}
                                    {{--</button>--}}

                                    {{--<a class="btn " href="{{ url('/password/reset') }}">Forgot Your Password?</a>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</form>--}}

                        {{--<div class="divider"></div>--}}

                            {{--<a id="login_btn"  href="{{ action('SocialAuthController@redirectToProvider') }}">Login Facebook</a>--}}
                    {{--</div>--}}





                    {{--<div class="col-md-7" style="    border-left: 1px solid #fff;">--}}
                        {{--<div class="panel-title-hio">Register</div>--}}

                        {{--<label class="radio-inline registrar-op"><input id="radio-user" type="radio" name="choice" value="user" >USER</label>--}}
                        {{--<label class="radio-inline registrar-op"><input id="radio-brand" type="radio" name="choice" value="brand">BRAND</label>--}}

                         {{--<form class="form-horizontal form-user" role="form" method="POST" style="    margin-top: 30px;" action="{{ url('/register') }}">--}}
                            {{--{{ csrf_field() }}--}}

                            {{--<div class="form-group{{ $errors->has('name-reg') ? ' has-error' : '' }}">--}}

                                {{--<div class="col-md-6" style="margin-bottom: 15px;">--}}
                                    {{--<input id="name" type="text" class="form-control" placeholder="First Name" name="name-reg" value="{{ old('name-reg') }}">--}}
                                {{--</div>--}}
                                {{--<div class="col-md-6">--}}
                                    {{--<input id="apelido" type="text" class="form-control" placeholder="Last name" name="apelido-reg" value="{{ old('apelido-reg') }}">--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="form-group{{ $errors->has('email-reg') ? ' has-error' : '' }}">--}}

                                {{--<div class="col-md-12">--}}
                                    {{--<input id="email" type="email" class="form-control" placeholder="Email" name="email-reg" value="{{ old('email-reg') }}">--}}
                                    {{--@if ($errors->has('email-reg'))--}}
                                        {{--<span class="help-block">--}}
                                            {{--<strong>{{ $errors->first('email-reg') }}</strong>--}}
                                        {{--</span>--}}
                                    {{--@endif--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="form-group{{ $errors->has('password-reg') ? ' has-error' : '' }}">--}}

                                {{--<div class="col-md-12">--}}
                                    {{--<input id="password" type="password" placeholder="Password" class="form-control" name="password-reg">--}}

                                    {{--@if ($errors->has('password-reg'))--}}
                                        {{--<span class="help-block">--}}
                                            {{--<strong>{{ $errors->first('password-reg') }}</strong>--}}
                                        {{--</span>--}}
                                    {{--@endif--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="form-group{{ $errors->has('password-reg_confirmation') ? ' has-error' : '' }}">--}}

                                {{--<div class="col-md-12">--}}
                                    {{--<input id="password-confirm" type="password" placeholder="Confirm Password" class="form-control" name="password-reg_confirmation">--}}

                                    {{--@if ($errors->has('password-reg_confirmation'))--}}
                                        {{--<span class="help-block">--}}
                                            {{--<strong>{{ $errors->first('password-reg_confirmation') }}</strong>--}}
                                        {{--</span>--}}
                                    {{--@endif--}}
                                {{--</div>--}}
                            {{--</div>--}}




                            {{--<div class="form-group">--}}
                                {{--<div class="col-md-12">--}}
                                    {{--<button type="submit" class="btn btn-success col-md-12">--}}
                                        {{--<i class="fa fa-btn fa-user"></i> Register--}}
                                    {{--</button>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</form>--}}

                        {{--<form class="form-horizontal form-brand" role="form" method="POST" style="    margin-top: 30px;" action="{{ url('/register-brand') }}">--}}
                            {{--{{ csrf_field() }}--}}

                            {{--<div class="form-group{{ $errors->has('name-brand') ? ' has-error' : '' }}">--}}

                                {{--<div class="col-md-12">--}}
                                    {{--<input id="name" type="text" class="form-control" placeholder="Name" name="name-brand" value="{{ old('name-brand') }}">--}}
                                    {{--@if ($errors->has('name-brand'))--}}
                                        {{--<span class="help-block">--}}
                                            {{--<strong>{{ $errors->first('name-brand') }}</strong>--}}
                                        {{--</span>--}}
                                    {{--@endif--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="form-group{{ $errors->has('email-brand') ? ' has-error' : '' }}">--}}

                                {{--<div class="col-md-12">--}}
                                    {{--<input id="email" type="email" class="form-control" placeholder="Email" name="email-brand" value="{{ old('email-brand') }}">--}}
                                    {{--@if ($errors->has('email-brand'))--}}
                                        {{--<span class="help-block">--}}
                                            {{--<strong>{{ $errors->first('email-brand') }}</strong>--}}
                                        {{--</span>--}}
                                    {{--@endif--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="form-group{{ $errors->has('email-brand') ? ' has-error' : '' }}">--}}

                                {{--<div class="col-md-12">--}}
                                    {{--<input id="email" type="text" class="form-control" placeholder="Address" name="address-brand" value="{{ old('address-brand') }}">--}}
                                    {{--@if ($errors->has('address-brand'))--}}
                                        {{--<span class="help-block">--}}
                                            {{--<strong>{{ $errors->first('address-brand') }}</strong>--}}
                                        {{--</span>--}}
                                    {{--@endif--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="form-group{{ $errors->has('password-brand') ? ' has-error' : '' }}">--}}

                                {{--<div class="col-md-12">--}}
                                    {{--<input id="password" type="password" placeholder="Password" class="form-control" name="password-brand">--}}

                                    {{--@if ($errors->has('password-brand'))--}}
                                        {{--<span class="help-block">--}}
                                            {{--<strong>{{ $errors->first('password-brand') }}</strong>--}}
                                        {{--</span>--}}
                                    {{--@endif--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="form-group{{ $errors->has('password-brand_confirmation') ? ' has-error' : '' }}">--}}

                                {{--<div class="col-md-12">--}}
                                    {{--<input id="password-confirm" type="password" placeholder="Confirm Password" class="form-control" name="password-brand_confirmation">--}}

                                    {{--@if ($errors->has('password-brand_confirmation'))--}}
                                        {{--<span class="help-block">--}}
                                            {{--<strong>{{ $errors->first('password-brand_confirmation') }}</strong>--}}
                                        {{--</span>--}}
                                    {{--@endif--}}
                                {{--</div>--}}
                            {{--</div>--}}




                            {{--<div class="form-group">--}}
                                {{--<div class="col-md-12">--}}
                                    {{--<button type="submit" class="btn btn-success col-md-12">--}}
                                        {{--<i class="fa fa-btn fa-user"></i> Register--}}
                                    {{--</button>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</form>--}}


                    {{--</div>--}}


                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}




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
