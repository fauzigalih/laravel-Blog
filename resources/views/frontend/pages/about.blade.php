@extends('layouts.public')
@section('title', 'About')
@section('content')
    <main class="static">
        {{ $model->about }}
    </main>
@endsection