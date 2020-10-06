@extends('layouts.admin')
@section('title', 'About')
@section('content')
    <main class="static">
        {{ $model->about }}
    </main>
@endsection