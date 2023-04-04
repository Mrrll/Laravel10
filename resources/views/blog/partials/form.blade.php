<div class="card" style="width: 18rem;">
    <div class="card-header text-center">
        <h5>
            {{ Route::currentRouteName() == 'blog.edit' ? 'Editar post' : 'Crear post' }}
        </h5>
    </div>
    <div class="card-body">
        <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
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
            <textarea class="form-control" rows="3" name="body"> {{ Route::currentRouteName() == 'blog.edit' ? old('body', $post->body) : old('body') }}</textarea>
            @error('body')
                <small class="text-danger">*{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-0">
            <label class="form-label">Categoria:</label>
            <select class="form-select form-select-sm" aria-label="Ejemplo de .form-select-sm" name="category_id">
                <option selected>Elige una categoría</option>
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}} </option>
                @endforeach
            </select>
            @error('category_id')
                <small class="text-danger">*{{ $message }}</small>
            @enderror
        </div>
    </div>
    <div class="card-footer text-center">
        <button type="submit"
            class="btn btn-primary">{{ Route::currentRouteName() == 'blog.edit' ? 'Editar blog' : 'Crear blog' }}</button>
            <a class="btn btn-danger" href="{{ url()->previous() }}">Cancelar</a>
    </div>
</div>
