@extends('layouts.admin')
@section('title', 'Contact')
@section('content')
    <main class="static">
        {{ $model->contact }}
    </main>
@endsection