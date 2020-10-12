@php
    $view = Route::currentRouteName() === 'blog.show';
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
        <textarea name="article" class="form-control" rows="3" id="article" placeholder="Article" @if ($view) readonly @endif required>{{ ($view || $edit) ? $model->article : old('article') }}</textarea>
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
    <div class="form-group">
        <label for="thumbnail">Thumbnail</label>
        <input name="thumbnail" type="thumbnail" class="form-control" id="thumbnail" placeholder="URL Image Thumbnail" required
        @if ($view || $edit)
            value="{{ $model->thumbnail }}"
            @if ($view)
                readonly
            @endif
        @else
            value="{{ old('thumbnail') }}"
        @endif>
    </div>
    <button class="btn btn-success">Save</button>
    <a href="{{ url()->previous() }}" class="btn btn-danger">Kembali</a>
</form>