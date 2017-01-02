@extends('app')

@section('header')
{{--    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">--}}

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
                      {!! Form::open(array('action' => array('HomeController@editStoreChallenge', $challenge->uuid), 'class' => 'form-horizontal')) !!}


                        <div class="form-group">
                          <label class="col-md-12 " style="text-align: start;">Description:</label>
                          <div class="col-sm-12 col-md-12">
                            <textarea class="form-control" rows="5" name="description">{!! $challenge->description !!}</textarea>
                          </div>
                        </div>

                        <div class="form-group">

                          <label class="col-lg-12 control-label" style="text-align: start; margin-bottom: 10px">Show them what you got. Share your challenge with your friends:</label>
                          <div class="col-lg-12">


                            @if($challenge->public === 1)
                                <a style=" text-align: start;" class="col-lg-12" href="{{ action('HomeController@challengeDetail', $challenge->uuid) }}">{{ action('HomeController@challengeDetail', $challenge->uuid) }}</a>
                            @else
                                 <a style=" text-align: start;" class="col-lg-12" href="{{ action('HomeController@challengeDetail', [ 'uuid' => $challenge->uuid, 'secret'=>$challenge->secret]) }}">{{ action('HomeController@challengeDetail', [ 'uuid' => $challenge->uuid, 'secret'=>$challenge->secret]) }}</a>

                            @endif
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-md-3 control-label"></label>
                          <div class="col-md-8">

                            <input class="btn btn-primary" value="Save Changes" type="submit">
                            <span></span>
                            <input class="btn btn-default" value="Cancel" type="reset" onclick="goBack()">
                          </div>


                        </div>
                      </form>
                    @endif
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

    <script src="{{ asset('js/transition.js') }}"></script>
    <script src="{{ asset('js/collapse.js') }}"></script>



<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment.min.js"></script>

{{--    <script src="{{ asset('js/bootstrap-datetimepicker.min.js') }}"></script>--}}
    <script src="{{ asset('js/bootstrap-datetimepicker.pt-BR.js') }}"></script>


    <script type="text/javascript">
                $(function () {
                    $('#deadLine').datetimepicker({

                    format: 'YYYY-MM-DD HH:mm',
                     useCurrent : true,
                     locale : 'pt'

                   });
                });
            </script>


<script type="text/javascript">
      $(function() {
        $('#datetimepicker1').datetimepicker({
          language: 'pt-BR'
        });
      });
    </script>



@endsection

