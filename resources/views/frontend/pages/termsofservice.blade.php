@extends('layouts.public')
@section('title', 'Terms of Service')
@section('content')
    <main class="static">
        {{ $model->termsofservice }}
    </main>
@endsection