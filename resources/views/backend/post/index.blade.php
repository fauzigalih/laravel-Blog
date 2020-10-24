@php
    $arrRouteAction = explode('\\', Route::currentRouteAction());
    $arrRoute = explode('@', $arrRouteAction[3]);
    $controller = $arrRoute[0];
    $action = $arrRoute[1];
    $control = str_replace('controller', '', strtolower($controller));
@endphp
@extends('layouts.admin')
@section('title', ucwords($control))
@section('content')
<main>
    @include('layouts.alert')
    <h1>{{ ucwords($control) }}</h1>
    <a class="btn btn-primary mb-3" href="{{ url('admin/'.$control.'/create') }}" role="button">Create</a>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Article</th>
            <th scope="col">Tag</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($model->all() as $data)
            @php
                $string = strip_tags($data->article);
                if (strlen($string) > 500) {

                    // truncate string
                    $stringCut = substr($string, 0, 500);
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
                <td>{{ ($data->status === 1) ? 'Publish' : 'Draft' }}</td>
                <td>
                    <form action="{{ url($control.'/'.$data->url) }}" method="POST" class="d-inline" target="_blank">
                        @method('GET')
                        <button class="btn btn-link p-0">demo</button>
                    </form>
                    <form action="{{ url('admin/'.$control.'/'.$data->id) }}" method="POST" class="d-inline">
                        @method('GET')
                        <button class="btn btn-link p-0">view</button>
                    </form>
                    <form action="{{ url('admin/'.$control.'/'.'edit/'.$data->id) }}" method="POST" class="d-inline">
                        @method('GET')
                        <button class="btn btn-link p-0">edit</button>
                    </form>
                    <button class="btn btn-link p-0" data-toggle="modal" data-target="#deletePost">delete</button>
                </td>
            </tr>

            <!-- Modal -->
            <div class="modal fade" id="deletePost" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Hapus Artikel {{ ucwords($control) }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Yakin ingin menghapus artikel {{ $control }} ini secara permanen?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                            <form action="{{ url('admin/'.$control.'/'.$data->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Modal -->
            @endforeach
        </tbody>
    </table>
</main>
@endsection