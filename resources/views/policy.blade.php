@extends('app')

@section('header')
<style>


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


                <div class="intro-lead-in">Privacy Policy</div>


            </div>
        </div>
    </header>







    <!-- Portfolio Grid Section -->
    <section id="portfolio" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <object data="pdf/HIO_PRIVACY_POLICY.pdf" type="application/pdf" width="100%" height="800px">

                      <p>It appears you don't have a PDF plugin for this browser.
                      No biggie... you can <a href="myfile.pdf">click here to
                      download the PDF file.</a></p>

                    </object>

                </div>
            </div>
        </div>
    </section>









@endsection

@section('footer')

@endsection