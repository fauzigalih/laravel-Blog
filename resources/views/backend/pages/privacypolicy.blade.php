@extends('layouts.admin')
@section('title', 'Privacy Policy')
@section('content')
    <main class="static">
        {{ $model->privacypolicy }}
    </main>
@endsection