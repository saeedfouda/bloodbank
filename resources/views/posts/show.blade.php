@extends('layouts.app')

@section('page_title')
Show posts
@endsection

@section('content')
{{-- <div class="row mt-2">
    <div class="col-md-9 offset-md-2">
        <div class="card mb-3" style="min-width: 18rem;">

            <div class="card-body">
                <div class="card-title">
                    <h4> {{$post->title}}</h4>
                </div>

                <img src="{{ asset('images/posts/'.$post->image) }}" alt="" height="400" width="700">

                <div class="card-text">
                    {{$post->body}}
                </div>

                <hr>

            </div>
        </div>
    </div>
</div> --}}
<br><br><br><br>

  <!-- Page Header -->
  <header class="masthead">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-md-9 offset-md-2">
          <div class="site-heading">
            <h1 class="text-center">{{ $post->title }}</h1>
            <br><br><br><br>

            <img  src="{{ asset('images/posts/'.$post->image) }}" alt="" height="300" width="500" >
            <br><br><br><br>

        </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container">
  <div class="row">
    <div class=" col-md-8 mx-auto text-center">

        {!! $post->body !!}



        <br><br><br><br>


        </div>

    </div>
</div>


@endsection

