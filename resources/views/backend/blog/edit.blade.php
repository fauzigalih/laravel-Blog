@extends('layouts.admin')
@section('title', 'Edit Blog')
@section('content')
<main>
    <h2>Edit Blog</h2>
    @include('backend.blog._form')
</main>
@endsection