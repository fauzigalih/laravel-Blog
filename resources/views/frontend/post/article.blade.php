@extends('layouts.public')
@section('title', $model->title)
@section('content')
<main>
    <div class="content">
      <div class="content-header">
        <div class="content-header-uploader">
          <div class="content-uploader">
            <img src="{{ asset('img/profile/'. $model->user->photo) }}" alt="">
            <a href="">{{ $model->user->name }}</a>
            <p class="content-update">{{ $model->created_at->format('M d, Y') }}</p>
            <div class="content-uploader-media">
              <a href="{{ $model->user->medsos['twitter'] ?? '#' }}"><i class="fa fa-twitter" aria-hidden="true"></i></a>
              <a href="{{ $model->user->medsos['facebook'] ?? '#' }}"><i class="fa fa-facebook" aria-hidden="true"></i></a>
              <a href="{{ $model->user->medsos['instagram'] ?? '#' }}"><i class="fa fa-instagram" aria-hidden="true"></i></a>
              <a href="{{ $model->user->medsos['linkedin'] ?? '#' }}"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
              <a href="{{ $model->user->medsos['github'] ?? '#' }}"><i class="fa fa-github" aria-hidden="true"></i></a>
            </div>
          </div>
        </div>
        <div class="content-header-title">{!! $model->title !!}</div>
      </div>
      <div class="content-body">
        <div class="content-body-generate">
          {!! html_entity_decode($model->article) !!}
        </div>
        <div class="content-tag">
          <ul>
            @php
                $tags = explode(',', ucwords(str_replace('.', '', strtolower($model->tag))));
            @endphp
            @foreach ($tags as $tag)
              @php
                $spt = str_split($tag);
                if($spt[0] == ' ') unset($spt[0]);
                $tag = implode('', $spt);
                $url = strtolower(str_replace(' ', '-', $tag));
              @endphp
              <li><a href="{{ url('tag/'.$url) }}">{{ $tag }}</a></li>
            @endforeach
          </ul>
        </div>
        <div class="side-advertisement size480x320">
          advertisement 480 x 320
        </div>
        <div class="side-advertisement size580x400">
          advertisement 580 x 400
        </div>
        <div class="content-uploader-detail">
          <img src="{{ asset('img/profile/'. $model->user->photo) }}" alt="">
          <p class="written-by">Written By</p>
          <a href="">{{ $model->user->name }}</a>
          <p class="quotes-uploader">{{ $model->user->description }}</p>
          <div class="content-uploader-media">
            <a href="{{ $model->user->medsos['twitter'] ?? '#' }}"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            <a href="{{ $model->user->medsos['facebook'] ?? '#' }}"><i class="fa fa-facebook" aria-hidden="true"></i></a>
            <a href="{{ $model->user->medsos['instagram'] ?? '#' }}"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            <a href="{{ $model->user->medsos['linkedin'] ?? '#' }}"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
            <a href="{{ $model->user->medsos['github'] ?? '#' }}"><i class="fa fa-github" aria-hidden="true"></i></a>
          </div>
        </div>
      </div>
      <div class="content-footer">
        <div class="content-comment">

        </div>
        <div class="other-article">

        </div>
      </div>
    </div>
    @include('layouts.sidebar')
  </main>
  @endsection