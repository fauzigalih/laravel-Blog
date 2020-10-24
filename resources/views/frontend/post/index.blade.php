@php
    $arrRouteAction = explode('\\', Route::currentRouteAction());
    $arrRoute = explode('@', $arrRouteAction[3]);
    $controller = str_replace('Controller', '', $arrRoute[0]);

    $array = ["Coba", "Laravel", "Sekarang"];
    $arrayLast = end($array);
@endphp
@extends('layouts.public')
@section('title', $controller)
@section('content')
<main class="main article">
    <div class="main-header">
        <div class="container-main">
            <div class="list-item blog">
                <div class="list-card">
                @foreach ($model as $data)
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
        </div>
    </div>
</main>
@endsection