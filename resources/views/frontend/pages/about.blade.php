@extends('layouts.public')
@section('title', 'About')
@section('content')
    <main class="main">
        {{ $model->about }}
    </main>
@endsection