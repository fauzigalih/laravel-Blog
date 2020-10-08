@php
    $view = Route::currentRouteName() === 'image.show';
    $create = Route::currentRouteName() === 'image.create';
    $edit = Route::currentRouteName() === 'image.edit';

    $action = 'admin/image';
    if ($edit) $action = 'admin/image/' . $model->id ?? 0; 
@endphp

<form action="{{ url($action) }}" method="POST" enctype="multipart/form-data">
    @if ($edit)
        @method('PUT')
    @endif
    @csrf
    <input name="name" type="name" class="form-control" placeholder="Name Image" required
    @if ($view || $edit)
        value="{{ $model->name }}"
        @if ($view)
            readonly
        @endif
    @endif>
    <input name="image_url" type="file" class="form-control-file" required
    @if ($view)
        disabled
    @endif>
    <input name="reference" type="reference" class="form-control" placeholder="Reference URL"
    @if ($view || $edit)
        value="{{ $model->reference }}"
        @if ($view)
            disabled
        @endif
    @endif>
    <button class="btn btn-success">Save</button>
    <a href="{{ url()->previous() }}" class="btn btn-danger">Kembali</a>
</form>