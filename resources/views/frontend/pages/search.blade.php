@extends('layouts.public')
@section('title', 'Search: '.$search)
@section('content')
<main class="search">
    <div class="content">
        <div class="content-header">
            <p class="search"><span>Search For:</span>{{ $search }}</p>
        </div>
        <div class="content-body">
            <ul class="list-search">
                @if ($model->count() == 0)
                    Tidak ada pencarian yang ditemukan .
                @endif
                @foreach ($model as $data)
                    <li>
                        <a href="{{ url('blog/'.$data->url) }}">
                            <img src="{{ asset('img/post/'.$data->thumbnail) }}" alt="{{ $data->thumbnail }}">
                            <p class="title">{{ $data->title }}</p>
                            <div class="uploader">
                            <img src="img/garuda.jpg" alt="">
                            <p class="name">Fauzi Galih Aji Saputro</p>
                            <p class="date">{{ $data->created_at->format('M d, Y') }}</p>
                            </div>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="content-footer"></div>
    </div>
    @include('layouts.sidebar')
</main>
@endsection