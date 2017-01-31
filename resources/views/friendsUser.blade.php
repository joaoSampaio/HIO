@extends('app')

@section('header')

<style>

    .jumbotron {

        background-color: #fff;
    }
    .list-group-item {

        border: 0px solid #ddd;
    }

    .img-thumbnail {
        border: 0px solid #ddd;

    }

/*<link rel="stylesheet" href="https://rawgit.com/enyo/dropzone/master/dist/dropzone.css">*/
.list-content{
 min-height:300px;
}
.list-content .list-group .title{
  background:#eee;
  /*border:2px solid #DDDDDD;*/
  font-weight:bold;
  color:#eb1946;
}
.list-group-item img {
    height:80px;
    width:80px;
}

.jumbotron .btn {
    padding: 5px 5px !important;
    font-size: 12px !important;
}
.prj-name {
    color:#5bc0de;
}
.break{
    width:100%;
    margin:20px;
}
.name {
    color:#5bc0de;
}

.navbar-default {
    background-color: #222 !important;
    border-color: transparent;
    padding: 10px 0;
}

@media (max-width: 768px) {
    #clockdiv div > span{

      font-size: 33pt !important;
      }
}


form.pull-right{
margin-left: 5px;
}

.list-content .list-group .title{
margin-right: -15px;
    margin-left: -15px;
}

  </style>
@endsection

@section('content')


        <section>
            <div class="container">

               <div class="jumbotron list-content">



                  <ul class="list-group">
                      <li href="#" class="list-group-item title">
                        {{$name}} Friends
                      </li>

                      <div class="row">

                      @foreach ($friends as $friendRequest)
                          <li href="#" class="list-group-item text-left">
                              <a href="{{"/profile/".$friendRequest->id}}">
                                  @if($friendRequest->photo == "")
                                      <img class="img-thumbnail img-circle" src="/uploads/users/default_user.png" alt="{{$friendRequest->name}}" title="{{$friendRequest->name}}">
                                  @else
                                      <img class="img-thumbnail img-circle" src="{{'/uploads/users/'. $friendRequest->photo }}" alt="{{$friendRequest->name}}" title="{{$friendRequest->name}}" >

                                  @endif
                              </a>
                              <label class="name">
                                  <a href="{{"/profile/".$friendRequest->id}}">{{$friendRequest->name}}</a><br>
                              </label>

                             <div class="break"></div>
                           </li>
                      @endforeach
                      <li href="#" class="list-group-item 222">
                        {!! $friends->links() !!}
                       </li>


                    </div>
                    </ul>




                 </div>
                 </div>

        </section>






@endsection

@section('footer')


@endsection


