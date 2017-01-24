@extends('app')

@section('header')
{{--    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">--}}


<style>


.navbar-default{
background-color: #222;
}

.btn-create-hio{
    width: 245px;
}
.btn-cancel-hio{
    width: 245px;
}

.btn-default {
    border-color: #C1C5C8;
    background: #C1C5C8;
}

@media (min-width: 992px){
    .btn-create-hio{
        float: left;
    }
    .btn-cancel-hio{
        float: right;
    }
}

/*.datepicker-days { color: #eee; }*/
</style>
@endsection

@section('content')



    <section  style="padding-top: 120px">
        <div class="container">

            <div class="row text-center col-md-offset-2 col-md-8 col-sm-12 col-xs-12">

                <div class="col-sm-12 col-md-12">
                        <img src="{{'https://graph.facebook.com/v2.5/'. Auth::user()->facebook_id  .'/picture?width=200&height=200'}}" alt="" title="" class="img-circle center-block">
{{--                        <div ><h3 class="text-capitalize">{{$user->name}}</h3></div>--}}

                </div>


                <div class="col-sm-12 col-md-12 personal-info">
                    @if (isset($error))
                          <div class="alert alert-danger">
                              {{ $error }}
                          </div>
                    @else
                    <h3>Edit Challenge</h3>
                      {!! Form::open(array('action' => array('HomeController@editStoreChallenge', $challenge->uuid), 'class' => 'form-horizontal', 'id'=>'form1')) !!}


                        <div class="form-group">
                          <label class="col-md-12 " style="text-align: center;">Description:</label>
                          <div class="col-sm-12 col-md-12">
                            <textarea class="form-control" rows="5" name="description">{!! $challenge->description !!}</textarea>
                          </div>
                        </div>

                        <div class="form-group">

                          <label class="col-lg-12 control-label" style="text-align: center; margin-bottom: 10px">Share your challenge with your friends and defy them to join:</label>
                          <div class="col-lg-12">


                            @if($challenge->public === 1)
                                <a style=" text-align: center;" class="col-lg-12" href="{{ action('HomeController@challengeDetail', $challenge->uuid) }}">{{ action('HomeController@challengeDetail', $challenge->uuid) }}</a>
                            @else
                                 <a style=" text-align: center;" class="col-lg-12" href="{{ action('HomeController@challengeDetail', [ 'uuid' => $challenge->uuid, 'secret'=>$challenge->secret]) }}">{{ action('HomeController@challengeDetail', [ 'uuid' => $challenge->uuid, 'secret'=>$challenge->secret]) }}</a>

                            @endif
                          </div>
                        </div>

                        <div class="form-group" style="margin-top: 70px; text-align: center;" id="controls" >
                            <div class="col-md-12 col-xs-12">

                                <div class="col-xs-12 col-md-6" style="margin-bottom: 20px;">
                                    <button type="button" onclick="goBack()" class="btn btn-default btn-xl btn-cancel-hio" id="back_control">Back</button>
                                    {{--<input class="btn btn-default btn-xl btn-cancel-hio" value="Back" id="back_control" >--}}
                                </div>

                                <div class="col-xs-12 col-md-6">
                                    <button form="form1" type="submit" class="btn btn-primary btn-xl btn-create-hio" id="next_control">Save Changes</button>
                                    {{--<input class="btn btn-primary btn-xl btn-create-hio" value="Next" id="next_control">--}}
                                </div>


                            </div>
                        </div>


                        {{--<div class="form-group">--}}
                          {{--<label class="col-md-3 control-label"></label>--}}
                          {{--<div class="col-md-8">--}}

                            {{--<input class="btn btn-primary" value="Save Changes" type="submit">--}}
                            {{--<span></span>--}}
                            {{--<input class="btn btn-default" value="Cancel" type="reset" onclick="goBack()">--}}
                          {{--</div>--}}


                        {{--</div>--}}
                      </form>
                    @endif
                </div>

            </div>
        </div>
    </section>


@endsection

@section('footer')
{{--<script src="js/bootstrap-datetimepicker.min.js"></script>--}}

<script src="{{ asset('js/bootstrap.min.js') }}"></script>








@endsection

