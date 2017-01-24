@extends('layouts/auth')

<!-- Main Content -->
@section('content')

        <div class="row main-container" >
            <div class="col-md-4 col-md-offset-4 col-xs-10 col-xs-offset-1">
                <div class="">
                    <div class="panel-heading" style="    font-weight: 800;font-size: 25px;">Reset Password</div>
                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                                <div class="">
                                    <input id="email" type="email"  placeholder="E-Mail Address" class="form-control login-input" name="email" value="{{ old('email') }}">

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="">
                                    <button type="submit" class="btn btn-normal-login">
                                        <i class="fa fa-btn fa-envelope"></i> Reset Password
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

@endsection
