@extends('layouts.admin')
@section('title', 'View Blog')
@section('content')
<main>
    <h2>View Blog</h2>
    @include('backend.post._form')
</main>
@endsection