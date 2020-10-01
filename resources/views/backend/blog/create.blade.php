@extends('layouts.admin')
@section('title', 'Create Blog')
@section('content')
<main>
    <h2>Create New Post Blog</h2>
    <form action="">
        <input name="title" type="text" class="form-control" placeholder="Title">
        <textarea name="body" id="" cols="30" rows="10" class="form-control" placeholder="Body"></textarea>
        <input name="tag" type="text" class="form-control" placeholder="Tag">
        <button class="btn btn-success">Save</button>
    </form>
</main>
@endsection    