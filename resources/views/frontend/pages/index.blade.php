@extends('layouts.public')
@section('content')
<main class="main">
    <div class="main-header">
      <div class="main-jumbotron">
        Hello World, Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit, tempora?
      </div>
      <div class="container-main">
        <div class="list-item blog">
          <p class="title">Blog Terbaru</p>
          <p class="desc">Blog disini merupakan </p>
          <a href="{{ url('blog') }}" class="more">Show More</a>
          <div class="list-card">
            @foreach ($blog as $data)
              <a href="{{ url('blog/'.$data->url) }}">
                <img src="{{ asset('img/post/'.$data->thumbnail) }}" alt="{{ $data->thumbnail }}">
                <div class="content-card">
                  <p>{{ $data->title }}</p>
                  <div class="uploader">
                    <img src="{{ asset('img/profile/'. $data->user->photo) }}" alt="Photo error">
                    <p class="name">{{ $data->user->name }}</p>
                    <p class="date">{{ $data->created_at->format('M d, Y') }}</p>
                  </div>
                </div>
              </a>
            @endforeach
          </div>
        </div>
        <div class="list-item project">
          <p class="title">Project Terbaru</p>
          <p class="desc">Project disini merupakan aplikasi yang sudah siap digunakan oleh pengguna untuk menyelesaikan masalah.</p>
          <a href="{{ url('project') }}" class="more">Show More</a>
          <div class="list-card">
            @foreach ($project as $data)
              <a href="{{ url('project/'.$data->url) }}">
                <img src="{{ asset('img/post/'.$data->thumbnail) }}" alt="{{ $data->thumbnail }}">
                <div class="content-card">
                  <p>{{ $data->title }}</p>
                  <div class="uploader">
                    <img src="{{ asset('img/profile/'. $data->user->photo) }}" alt="Photo error">
                    <p class="name">{{ $data->user->name }}</p>
                    <p class="date">{{ $data->created_at->format('M d, Y') }}</p>
                  </div>
                </div>
              </a>
            @endforeach
          </div>
        </div>
        <div class="list-item template">
          <p class="title">Template Terbaru</p>
          <p class="desc">Template disini merupakan tampilan website yang sudah diatur sedemikian rupa dengan ukuran perangkat yang berbeda-beda atau responsive.</p>
          <a href="{{ url('template') }}" class="more">Show More</a>
          <div class="list-card">
            @foreach ($template as $data)
              <a href="{{ url('template/'.$data->url) }}">
                <img src="{{ asset('img/post/'.$data->thumbnail) }}" alt="{{ $data->thumbnail }}">
                <div class="content-card">
                  <p>{{ $data->title }}</p>
                  <div class="uploader">
                    <img src="{{ asset('img/profile/'. $data->user->photo) }}" alt="Photo error">
                    <p class="name">{{ $data->user->name }}</p>
                    <p class="date">{{ $data->created_at->format('M d, Y') }}</p>
                  </div>
                </div>
              </a>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </main>
  @endsection