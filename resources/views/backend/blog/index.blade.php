@extends('layouts.admin')
@section('title', 'Blog')
@section('content')
@php

@endphp
<main>
    <h1>Blog</h1>
    <a class="btn btn-primary mb-3" href="{{ url('admin/blog/create') }}" role="button">Create</a>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Article</th>
            <th scope="col">Tag</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($model->all() as $data)
            @php
                $string = strip_tags($data->article);
                if (strlen($string) > 300) {

                    // truncate string
                    $stringCut = substr($string, 0, 300);
                    $endPoint = strrpos($stringCut, ' ');

                    //if the string doesn't contain any space then it will cut without word basis.
                    $string = $endPoint ? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                    $string .= ' ...';
                }
            @endphp
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->title }}</td>
                <td>{{ $string }}</td>
                <td>{{ $data->tag }}</td>
                <td>
                    <form action="{{ url('blog/'.$data->url) }}" method="POST" class="d-inline">
                        @method('GET')
                        <button class="btn btn-link p-0">view</button>
                    </form>
                    <form action="{{ url('admin/blog/edit/'.$data->id) }}" method="POST" class="d-inline">
                        @method('GET')
                        <button class="btn btn-link p-0">edit</button>
                    </form>
                    <form action="{{ url('admin/blog/'.$data->id) }}" method="POST" class="d-inline">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-link p-0">delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</main>
@endsection    