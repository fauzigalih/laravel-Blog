@php
    $view = Route::currentRouteName() === 'blog.show';
    $create = Route::currentRouteName() === 'blog.create';
    $edit = Route::currentRouteName() === 'blog.edit';

    $action = 'admin/blog';
    if ($edit) $action = 'admin/blog/' . $model->id ?? 0; 
@endphp

<form action="{{ url($action) }}" method="POST" enctype="multipart/form-data">
    @if ($edit)
        @method('PUT')
    @endif
    @csrf
    <div class="form-group">
        <label for="title">Title Blog</label>
        <input name="title" type="title" class="form-control" id="title" placeholder="Title Blog" required
        @if ($view || $edit)
            value="{{ $model->title }}"
            @if ($view)
                readonly
            @endif
        @else
            value="{{ old('title') }}"
        @endif>
    </div>
    <div class="form-group">
        <label for="article">Article</label>
        <textarea name="article" class="form-control" id="article" rows="3" placeholder="Article" required>{{ old('article') }}</textarea>
    </div>
    <div class="form-group">
        <label for="tag">Tag</label>
        <input name="tag" type="tag" class="form-control" id="tag" placeholder="Tag" required
        @if ($view || $edit)
            value="{{ $model->tag }}"
            @if ($view)
                readonly
            @endif
        @else
            value="{{ old('tag') }}"
        @endif>
    </div>
    <button class="btn btn-success">Save</button>
    <a href="{{ url()->previous() }}" class="btn btn-danger">Kembali</a>
</form>