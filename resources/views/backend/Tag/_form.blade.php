@php
    $view = Route::currentRouteName() === 'tag.show';
    $create = Route::currentRouteName() === 'tag.create';
    $edit = Route::currentRouteName() === 'tag.edit';

    $action = 'admin/tag';
    if ($edit) $action = 'admin/tag/' . $model->id ?? 0; 
@endphp

<form action="{{ url($action) }}" method="POST">
    @if ($edit)
        @method('PUT')
    @endif
    @csrf
    <input name="tag" type="tag" class="form-control" placeholder="Tag" required
    @if ($view || $edit)
        value="{{ $model->tag }}"
        @if ($view)
            readonly
        @endif
    @endif>
    <button class="btn btn-success">Save</button>
</form>