@extends('layouts.admin')
@section('title', 'Tag')
@section('content')
<main>
    <h1>Tag</h1>
    <a class="btn btn-primary mb-3" href="{{ url('admin/tag/create') }}" role="button">Create</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tag</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($model->all() as $data)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->tag }}</td>
                <td>
                    <a href="{{ url('admin/tag/'.$data->id) }}">view</a>
                    <a href="{{ url('admin/tag/edit/'.$data->id) }}">edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</main>
@endsection    