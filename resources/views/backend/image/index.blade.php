@extends('layouts.admin')
@section('title', 'Image')
@section('content')
<main>
    @include('layouts.alert')
    <h1>Image</h1>
    <a class="btn btn-primary mb-3" href="{{ url('admin/image/create') }}" role="button">Create</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Image</th>
                <th scope="col">Reference</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($model->all() as $data)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->name }}</td>
                <td>
                    <img src="{{ asset('img/post/'.$data->image_url) }}" alt="{{ $data->image_url }}" style="width: 70px; height: 50px;">
                </td>
                <td>{{ $data->reference }}<input type="text" value="{{ asset('img/post/'.$data->image_url) }}" class="image_url copy"></td>
                <td>
                    <button class="btn btn-link p-0 copy">salin</button>
                    <form action="{{ url('admin/image/'.$data->id) }}" method="POST" class="d-inline">
                        @method('GET')
                        <button class="btn btn-link p-0">view</button>
                    </form>
                    <form action="{{ url('admin/image/edit/'.$data->id) }}" method="POST" class="d-inline">
                        @method('GET')
                        <button class="btn btn-link p-0">edit</button>
                    </form>
                    <form action="{{ url('admin/image/'.$data->id) }}" method="POST" class="d-inline">
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