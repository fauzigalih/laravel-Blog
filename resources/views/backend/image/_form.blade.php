@php
    $view = Route::currentRouteName() === 'image.show';
    $create = Route::currentRouteName() === 'image.create';
    $edit = Route::currentRouteName() === 'image.edit';

    $action = 'admin/image';
    if ($edit) $action = 'admin/image/' . $model->id ?? 0; 
@endphp
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ url($action) }}" method="POST" enctype="multipart/form-data">
    @if ($edit)
        @method('PUT')
    @endif
    @csrf
    <div class="form-group">
        <label for="name">Name Image</label>
        <input name="name" type="name" class="form-control" id="name" placeholder="Name Image" required
        @if ($view || $edit)
            value="{{ $model->name }}"
            @if ($view)
                readonly
            @endif
        @else
            value="{{ old('name') }}"
        @endif>
    </div>
    <div class="form-group">
        <label for="image_url">Image</label>
        <input name="image_url" type="file" class="form-control-file" id="image_url"
        @if ($create)
            required
        @endif>
      </div>
    <div class="form-group">
        <label for="reference">Reference URL</label>
        <input name="reference" type="reference" class="form-control" id="reference" placeholder="Reference URL" required
        @if ($view || $edit)
            value="{{ $model->reference }}"
            @if ($view)
                readonly
            @endif
        @else
            value="{{ old('reference') }}"
        @endif>
    </div>
    <button class="btn btn-success">Save</button>
    <a href="{{ url()->previous() }}" class="btn btn-danger">Kembali</a>
</form>