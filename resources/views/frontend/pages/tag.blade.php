@extends('layouts.public')
@section('title', 'Tag: '. $tag)
@section('content')
<main class="search">
    <div class="content">
        <div class="content-header">
            <p class="search"><span>Tag For:</span>{{ $tag }}</p>
        </div>
        <div class="content-body">
            <ul class="list-search">
                @if ($model->count() == 0)
                    Tidak ada tag yang ditemukan .
                @endif
                @foreach ($model as $data)
                    <li>
                        <a href="{{ url('blog/'.$data->url) }}">
                            <img src="{{ asset('img/post/'.$data->thumbnail) }}" alt="{{ $data->thumbnail }}">
                            <p class="title">{{ $data->title }}</p>
                            <div class="uploader">
                            <img src="{{ asset('img/profile/'. $data->user->photo) }}" alt="Photo error">
                            <p class="name">{{ $data->user->name }}</p>
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