@php
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
<form action="{{ url($url) }}" method="POST">
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
        <label for="article">Article</label><br>
        <div class="btn-group article" role="group" aria-label="Basic example">
            <button type="button" class="btn btn-info titleparagraf">Tittle & Paragraf</button>
            <button type="button" class="btn btn-info subtitleparagraf">Sub Tittle & Paragraf</button>
            <button type="button" class="btn btn-info paragraf">Paragraf</button>
            <button type="button" class="btn btn-info image">Image</button>
            <button type="button" class="btn btn-info list">List</button>
            <button type="button" class="btn btn-info delete">Delete All</button>
        </div>
        <textarea name="article" class="form-control" rows="8" id="article" placeholder="Article" @if ($view) readonly @endif required>{{ ($view || $edit) ? $model->article : old('article') }}</textarea>
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
        <select name="status" class="custom-select" id="status" @if ($view) disabled @endif required>
            <option selected value="{{ ($view || $edit) ? $model->status : old('status') }}">
                @php
                    $status = 'Pilih';
                    if ($view || $edit) {
                        $model->status === 1 ? $status = 'Publish' : $status = 'Draft';
                    }else{
                        if (old('status') === '1') $status = 'Publish';
                        if (old('status') === '0') $status = 'Draft';
                    }
                @endphp
                {{ $status }}
            </option>
            <option value="1">Publish</option>
            <option value="0">Draft</option>
        </select>
    </div>
    <button class="btn btn-success">Save</button>
    <a href="{{ url()->previous() }}" class="btn btn-danger">Kembali</a>
</form>