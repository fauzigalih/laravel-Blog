@php
    $arrRouteAction = explode('\\', Route::currentRouteAction());
    $arrRoute = explode('@', $arrRouteAction[3]);
    $controller = $arrRoute[0];
    $action = $arrRoute[1];

    $control = str_replace('controller', '', strtolower($controller));
    $view = $action == 'show';
    $edit = $action == 'edit';

    $url = 'admin/'.$control;
    if ($edit) $url = 'admin/'.$control.'/'.$model->id ?? 0; 
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
<form action="{{ url($url) }}" method="POST" enctype="multipart/form-data">
    @if ($edit)
        @method('PUT')
    @endif
    @csrf
    <input type="hidden" name="category" value="{{ $control }}">
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
    <div class="form-group">
        <label for="status">Status</label>
        <select name="status" class="custom-select" id="status" required>
            <option selected disabled value="{{ ($view || $edit) ? $model->status : old('status') }}">{{ old('status') ? ( old('status') == 1 ? 'Publish' : 'Draft') : 'Pilih' }}</option>
            <option value="1">Publish</option>
            <option value="0">Draft</option>
        </select>
    </div>
    <button class="btn btn-success">Save</button>
    <a href="{{ url()->previous() }}" class="btn btn-danger">Kembali</a>
</form>