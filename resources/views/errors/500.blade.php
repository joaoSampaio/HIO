@extends('app')

@section('header')


<style>
  .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
      width: 70%;
      margin: auto;
  }
  </style>

@endsection

@section('content')

  <header>


        <div class="container" style="    background-image: url({{ asset('img/header-bg.jpg')}});background-size: cover;">
            <div class="intro-text">

               <div class="intro-lead-in">Server error.</div>

        </div>
    </header>



@endsection



