@extends('layouts.public')
@section('title', 'Privacy Policy')
@section('content')
    <main class="static">
        {{ $model->privacypolicy }}
    </main>
@endsection