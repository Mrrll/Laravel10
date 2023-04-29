<div class="card" style="width: 100%;">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h2>
            {{ Route::currentRouteName() == 'blog.edit' ? 'Editar post' : 'Crear post' }}
        </h2>
        @if (Route::currentRouteName() == 'blog.edit')
            @canany(['isAdmin', 'isManager'])
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="published" name="published" {{$post->published ? 'checked' : ''}} value="true">
                    <label class="form-check-label" for="published">@lang('Publish this :model', ['model' => 'Post'])</label>
                </div>
            @endcanany
        @endif
    </div>
    <div class="card-body">
        <input type="hidden" name="user_id"
            value="{{ Route::currentRouteName() == 'blog.edit' ? $post->user_id : auth()->user()->id }}">
        <div class="mb-0">
            <label class="form-label">Titulo:</label>
            <input type="text" class="form-control" placeholder="Diseñador"
                value="{{ Route::currentRouteName() == 'blog.edit' ? old('title', $post->title) : old('title') }}"
                name="title">
            @error('title')
                <small class="text-danger">*{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-0">
            <label class="form-label">Cuerpo:</label>
            <textarea id="editor" class="form-control" rows="3" name="body"> {{ Route::currentRouteName() == 'blog.edit' ? old('body', $post->body) : old('body') }}</textarea>
            @error('body')
                <small class="text-danger">*{{ $message }}</small>
            @enderror
            <div id="word-count" class="d-flex justify-content-end mt-1"></div>
        </div>
        <hr>
        <div class="mb-0">
            <label class="form-label">Categoria:</label>
            <select class="form-select form-select-sm" aria-label="Ejemplo de .form-select-sm" name="category_id">
                <option selected>Elige una categoría</option>
                @foreach ($categories as $category)
                    @if (Route::currentRouteName() == 'blog.edit')
                        <option value="{{ $category->id }}" @selected(old('category_id', $post->category->id ) == $category->id)>{{ $category->name }} </option>
                    @else
                        <option value="{{ $category->id }}" @selected(old('category_id'))>{{ $category->name }} </option>
                    @endif
                @endforeach
            </select>
            @error('category_id')
                <small class="text-danger">*{{ $message }}</small>
            @enderror
        </div>
    </div>
    <div class="card-footer d-flex justify-content-end">
        <button type="submit"
            class="btn btn-primary me-1">{{ Route::currentRouteName() == 'blog.edit' ? 'Editar blog' : 'Crear blog' }}</button>
        <a class="btn btn-danger" href="{{ url()->previous() }}">Cancelar</a>
    </div>
</div>
