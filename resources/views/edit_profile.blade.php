@extends('app')

@section('header')


<style>
header .intro-text {
    padding-top: 150px;
    padding-bottom: 50px;
}

.img-circle.center-block{
width: 200px;
}

  </style>

@endsection

@section('content')



<!-- Header -->
    <header>



        <div class="container">
            <div class="intro-text">
                @if(Auth::check())
                    <div class="intro-lead-in">{{Auth::user()->name}}'s Profile</div>

                @endif


            </div>
        </div>
    </header>


        <section  style="padding-top: 120px">
            <div class="container">

                <button href="#" class="btn btn-xl">Create Normal User Profile</button>

                <div class="row  col-md-offset-2 col-md-8 col-sm-12 col-xs-12">

                    <div class="col-sm-12 col-md-12">
{{--                                                <img src="{{'https://graph.facebook.com/v2.5/'. Auth::user()->facebook_id  .'/picture?width=200&height=200'}}" alt="" title="" class="img-circle center-block">--}}
                            @if(Auth::user()->photo == "")
                                <img src="/uploads/users/default_user.png" alt="" title="" class="img-circle center-block">
                            @else
                                <img src="{{'/uploads/users/'. Auth::user()->photo }}" alt="" title="" class="img-circle center-block">

                            @endif

    {{--                        <div ><h3 class="text-capitalize">{{$user->name}}</h3></div>--}}

                    </div>

                    <div class="col-sm-12 col-md-12 personal-info">
                  {{--<div class="alert alert-info alert-dismissable">--}}
                    {{--<a class="panel-close close" data-dismiss="alert">×</a>--}}
                    {{--<i class="fa fa-coffee"></i>--}}
                    {{--This is an <strong>.alert</strong>. Use this to show important messages to the user.--}}
                  {{--</div>--}}
                  <h3 class="text-center">Personal info</h3>
                  {!! Form::open(array('action' => array('UserProfileController@post_editProfile'), 'class' => 'form-horizontal','files' => true)) !!}

                  <div class="form-group">
                    <label class="col-lg-12">Profile photo:</label>
                    <div class="col-lg-12">
                      <input name="file" class="form-control" type="file" id="pictureupload">
                    </div>
                  </div>



                  {{--<form class="form-horizontal" role="form">--}}
                    <div class="form-group">
                      <label class="col-lg-12">Name:</label>
                      <div class="col-lg-12">
                        <input class="form-control" value="{{Auth::user()->name}}" name="name" type="text">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-lg-12">Sports:</label>
                      <div class="col-lg-12">
                           <?php $sportsSelected = multiexplode(array(",",".","|",":"),Auth::user()->sports) ?>
                      </div>
                    </div>

                    <div class="form-group" style="margin-left: 20px">
                        <div class="controls span2 col-lg-3 col-xs-12 ">

                            <label class="checkbox">
                                <input type="checkbox" name="sports[]" value="Basketball" {{in_array('Basketball', $sportsSelected )? 'checked="checked"' : ''}} id="inlineCheckbox3"> Basketball
                            </label>
                            <label class="checkbox">
                                <input type="checkbox" name="sports[]" value="Bodyboard" {{in_array('Bodyboard', $sportsSelected )? 'checked="checked"' : ''}} id="inlineCheckbox2"> Bodyboard
                            </label>
                             <label class="checkbox">
                                <input type="checkbox" name="sports[]" value="Boxe" {{in_array('Boxe', $sportsSelected )? 'checked="checked"' : ''}} id="inlineCheckbox2"> Boxe
                            </label>
                            <label class="checkbox">
                                <input type="checkbox" name="sports[]" value="Cycling" {{in_array('Cycling', $sportsSelected )? 'checked="checked"' : ''}} id="inlineCheckbox3"> Cycling
                            </label>
                            <label class="checkbox">
                                <input type="checkbox" name="sports[]" value="Fitness" {{in_array('Fitness', $sportsSelected )? 'checked="checked"' : ''}} id="inlineCheckbox3"> Fitness
                            </label>
                             <label class="checkbox">
                                <input type="checkbox" name="sports[]" value="Football" {{in_array('Football', $sportsSelected )? 'checked="checked"' : ''}} id="inlineCheckbox1"> Football
                            </label>




                        </div>
                        <div class="controls span2 col-lg-3 col-xs-12">
                            <label class="checkbox">
                                <input type="checkbox" name="sports[]" value="Golf" {{in_array('Golf', $sportsSelected )? 'checked="checked"' : ''}} id="inlineCheckbox2"> Golf
                            </label>

                            <label class="checkbox">
                                <input type="checkbox" name="sports[]" value="Gym" {{in_array('Gym', $sportsSelected )? 'checked="checked"' : ''}} id="inlineCheckbox3"> Gym
                            </label>

                            <label class="checkbox">
                                <input type="checkbox" name="sports[]" value="Gymnastics" {{in_array('Gymnastics', $sportsSelected )? 'checked="checked"' : ''}} id="inlineCheckbox3"> Gymnastics
                            </label>

                            <label class="checkbox">
                                <input type="checkbox" name="sports[]" value="Hockey" {{in_array('Hockey', $sportsSelected )? 'checked="checked"' : ''}} id="inlineCheckbox3"> Hockey
                            </label>

                            <label class="checkbox">
                                <input type="checkbox" name="sports[]" value="Jiu-Jitsu" {{in_array('Jiu-Jitsu', $sportsSelected )? 'checked="checked"' : ''}} id="inlineCheckbox3"> Jiu-Jitsu
                            </label>

                            <label class="checkbox">
                                <input type="checkbox" name="sports[]" value="Judo" {{in_array('Judo', $sportsSelected )? 'checked="checked"' : ''}} id="inlineCheckbox3"> Judo
                            </label>

                        </div>

                        <div class="controls span2 col-lg-3 col-xs-12 ">
                            <label class="checkbox">
                                <input type="checkbox" name="sports[]" value="Karate" {{in_array('Karate', $sportsSelected )? 'checked="checked"' : ''}} id="inlineCheckbox3"> Karate
                            </label>

                            <label class="checkbox">
                                <input type="checkbox" name="sports[]" value="Kickboxing" {{in_array('Kickboxing', $sportsSelected )? 'checked="checked"' : ''}} id="inlineCheckbox3"> Kickboxing
                            </label>

                            <label class="checkbox">
                                <input type="checkbox" name="sports[]" value="MMA" {{in_array('MMA', $sportsSelected )? 'checked="checked"' : ''}} id="inlineCheckbox3"> MMA
                            </label>

                            <label class="checkbox">
                                <input type="checkbox" name="sports[]" value="Muay Thai" {{in_array('Muay Thai', $sportsSelected )? 'checked="checked"' : ''}} id="inlineCheckbox3"> Muay Thai
                            </label>

                            <label class="checkbox">
                                <input type="checkbox" name="sports[]" value="Rugby" {{in_array('Rugby', $sportsSelected )? 'checked="checked"' : ''}} id="inlineCheckbox3"> Rugby
                            </label>

                            <label class="checkbox">
                                <input type="checkbox" name="sports[]" value="Running" {{in_array('Running', $sportsSelected )? 'checked="checked"' : ''}} id="inlineCheckbox1"> Running
                            </label>

                        </div>
                        <div class="controls span2 col-lg-3 col-sm-12">


                            <label class="checkbox">
                                <input type="checkbox" name="sports[]" value="Snow Sports" {{in_array('Snow Sports', $sportsSelected )? 'checked="checked"' : ''}} id="inlineCheckbox3"> Snow Sports
                            </label>


                            <label class="checkbox">
                                <input type="checkbox" name="sports[]" value="Surf" {{in_array('Surf', $sportsSelected )? 'checked="checked"' : ''}} id="inlineCheckbox1"> Surf
                            </label>

                            <label class="checkbox">
                                <input type="checkbox" name="sports[]" value="Swimming" {{in_array('Swimming', $sportsSelected )? 'checked="checked"' : ''}} id="inlineCheckbox3"> Swimming
                            </label>

                            <label class="checkbox">
                                <input type="checkbox" name="sports[]" value="Taekwondo" {{in_array('Taekwondo', $sportsSelected )? 'checked="checked"' : ''}} id="inlineCheckbox3"> Taekwondo
                            </label>

                            <label class="checkbox">
                                <input type="checkbox" name="sports[]" value="Tennis" {{in_array('Tennis', $sportsSelected )? 'checked="checked"' : ''}} id="inlineCheckbox3"> Tennis
                            </label>

                            <label class="checkbox">
                                <input type="checkbox" name="sports[]" value="Trail" {{in_array('Trail', $sportsSelected )? 'checked="checked"' : ''}} id="inlineCheckbox2"> Trail
                            </label>
                            <label class="checkbox">
                                <input type="checkbox" name="sports[]" value="Volleyball" {{in_array('Volleyball', $sportsSelected )? 'checked="checked"' : ''}} id="inlineCheckbox3"> Volleyball
                            </label>
                        </div>
                    </div>







                    <div class="form-group">
                      <label class="col-lg-12">About me:</label>
                      <div class="col-lg-12">
                        <textarea class="form-control" rows="5" name="about">{!! Auth::user()->about !!}</textarea>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-lg-12">My personal goals:</label>
                      <div class="col-lg-12">
                        <textarea class="form-control" rows="5" name="interests">{!! Auth::user()->interests !!}</textarea>
                      </div>
                    </div>



                    <div class="form-group">
                      <label class="col-md-3 control-label"></label>
                      <div class="col-md-12">

                        <input class="btn btn-primary" value="Save Changes" type="submit">
                        <span></span>
                        <input class="btn btn-default" value="Cancel" type="reset" onclick="goBack()">
                      </div>
                    </div>
                  </form>
                </div>

                </div>
            </div>
        </section>











@endsection



