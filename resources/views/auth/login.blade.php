@extends('layouts/auth')

@section('header')

    <style>





    </style>


@endsection
@section('content')

    @if (session('activationStatus'))
        <div class="alert-register">
            <div class="alert alert-success alert-register-label">
                <span class="">{{ trans('auth.activationStatus') }}</span>
            </div>
        </div>
    @endif

    @if (session('activationWarning'))
        <div class="alert-register">
            <div class="alert alert-warning alert-register-label">
                <span class="">{{ trans('auth.activationWarning') }}</span>
            </div>
        </div>
    @endif


    <div class="row main-container">

            <form class="col-md-4 col-md-offset-4 col-xs-10 col-xs-offset-1 form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                    <div class="col-md-12">
                        <input id="email" type="email" class="form-control login-input" placeholder="Email" name="email" value="{{ old('email') }}">

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}" style="margin-bottom: 10px">

                    <div class="col-md-12">
                        <input id="password" type="password" placeholder="Password" class="form-control login-input" name="password">

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>


                <div class="form-group" style="margin-top: 50px">
                    <div class="col-md-10 col-md-offset-1">
                        <button type="submit" class="btn btn-normal-login">
                            Login
                        </button>

                        <div class="extra-register " style="margin-top: 15px">
                            <a  href="{{ url('/password/reset') }}">Forgot my Password </a>
                                                                        |
                            <a href="{{ url('/register') }}">Register</a>
                        </div>

                    </div>
                </div>
            </form>
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

