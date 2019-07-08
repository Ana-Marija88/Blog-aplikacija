@extends('layouts.app')

@section('content')

<div class="container-fluid">
<div class="row">
    <nav class="col-sm-3 col-md-2 d-none d-sm-block bg-light sidebar">
        <ul class="nav nav-pills flex-column">
            <li class="nav-item">
                <a class="nav-link " href=" {{route('home') }}">Post<span class="sr-only">(current)</span></a>
            </li>
        </ul>

        <ul class="nav nav-pills flex-column">
                <li class="nav-item">
                    <a class="nav-link" href=" {{route('post.form') }}">Create post</a>
                </li>
            </ul>
    </nav>

    <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
        <h1> Welcome {{Auth::user()-> name}} </h1>
        <h2> Posts
            <a href="{{ route('post.form') }}">
                <button type="button" class="btn btn-warning btn-sm">Create post</button>
            </a>
        </h2>
        @if(Session::has('success'))
        <div>
            <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
            <div id="message" class="alert alert-success">
                {{Session::get('success')}}
            </div>
            </div>
        </div>
        @endif

      <table class="table table-striped table-hover">
          <thead>
              <tr>
                  <th>#</th>
                  <th>Title</th>
                  <th>Author</th>
                  <th>Learn more</th>
                  <th>Created on</th>
              </tr>
          </thead>
          <tbody>
              @if($posts)
                @foreach($posts as $post)
                <tr>
                    <th> {{$loop -> iteration }}</th>
                    <th> {{$post -> title }}</th>
                    <th> {{$post -> name }}</th>
                <th> <a href="{{ route('post.detail', ['id' =>$post->id]) }}">View more</a></th>
                    <th> {{Carbon\Carbon::parse($post->created_at)->format('d-m-Y') }}</th>
                </tr>
            @endforeach
            @else
                <p class="text-center text-primary">Neeeema postova još!!!</p>
            @endif
          </tbody>

    </main>
</div>
</div>

@endsection
