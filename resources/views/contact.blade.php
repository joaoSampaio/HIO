@extends('app')

@section('header')

<style>

section#contact {
     background-color: #fff;
     background-image: url(../);
    background-position: center;
    background-repeat: no-repeat;
}

header .intro-text {
    padding-top: 150px;
    padding-bottom: 50px;
}

</style>
@endsection

@section('content')

<!-- Header -->
    <header>
        <div class="container small-header">
            <div class="intro-text">
                <div class="intro-lead-in">Contact us</div>
            </div>
        </div>
    </header>

    <section id="contact" >
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Contact Us</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">

                {!! Form::open(array('action' => array('HomeController@storeContact'))) !!}
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

                    {{--<form name="sentMessage" id="contactForm" novalidate>--}}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::text('name', null,array('required', 'class'=>'form-control', 'placeholder'=>'Your Name *')) !!}

                                    {{--<input type="text" class="form-control" placeholder="Your Name *" name="name" id="name" required data-validation-required-message="Please enter your name.">--}}
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Your Email *" name="email" id="email" required data-validation-required-message="Please enter your email address.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                {{--<div class="form-group">--}}
                                    {{--<input type="tel" class="form-control" placeholder="Your Phone *" id="phone" required data-validation-required-message="Please enter your phone number.">--}}
                                    {{--<p class="help-block text-danger"></p>--}}
                                {{--</div>--}}
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Your Message *" name="message" id="message" required data-validation-required-message="Please enter a message."></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center">
                                <div id="success"></div>
                                @if(isset($message))
                                    <div class="alert alert-info">{{$message}}</div>
                                @endif
                                <button type="submit" class="btn btn-xl">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>



@endsection



