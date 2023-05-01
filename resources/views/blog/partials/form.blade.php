<div class="card" style="width: 100%;">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h2>
            {{ Route::currentRouteName() == 'blog.edit' ? 'Editar post' : 'Crear post' }}
        </h2>
        @if (Route::currentRouteName() == 'blog.edit')
            @canany(['isAdmin', 'isManager'])
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="published" name="published"
                        {{ $post->published ? 'checked' : '' }} value="true">
                    <label class="form-check-label" for="published">@lang('Publish this :model', ['model' => 'Post'])</label>
                </div>
            @endcanany
        @endif
    </div>
    <div class="form-group text-center">
        <img id="imgPreview" class="card-img-top d-none" style="height:250px">
    </div>
    {{-- <img src="..." class="card-img-top" alt="..."> --}}
    @if (isset($post->image->url))
        <img src="{{ asset($post->image->url) }}" class="card-img-top" style="height:250px">
    @else
        <div id="preview_image" class="d-flex justify-content-center">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="250"
                xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Capa de imagen"
                preserveAspectRatio="xMidYMid slice" focusable="false">
                <title>Placeholder</title>
                <rect width="100%" height="100%" fill="#868e96"></rect><text x="45%" y="50%"
                    fill="#dee2e6" dy=".3em">Falta imagen</text>
            </svg>
        </div>
    @endif

    <div class="card-body">
        <div class="form-group">
            <label for="formFileLg" class="form-label ms-1">Imagen :</label>
            <input class="form-control form-control-lg" id="formFileLg" type="file" accept="image/*"
                onchange="previewImage(event, '#imgPreview')" name="image">
        </div>
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
            <label class="form-label">Slug:</label>
            <input type="text" class="form-control" placeholder="Diseñador-siguiente"
                value="{{ Route::currentRouteName() == 'blog.edit' ? old('slug', $post->slug) : old('slug') }}"
                name="slug" readonly>
            @error('slug')
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
                        <option value="{{ $category->id }}" @selected(old('category_id', $post->category->id) == $category->id)>{{ $category->name }}
                        </option>
                    @else
                        <option value="{{ $category->id }}" @selected(old('category_id'))>{{ $category->name }}
                        </option>
                    @endif
                @endforeach
            </select>
            @error('category_id')
                <small class="text-danger">*{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-0">
             @if (isset($post) && is_object($post->tags) && $post->tags != '[]')
                @php
                    $tags = "";
                    foreach ($post->tags as $tag) {
                        $tags .= $tag->name.',';
                    }
                @endphp
            @endif
            <label class="form-label">Tags :</label>
            <input type="text" name="tags" id="tags" data-role="tagsinput" value="{{ Route::currentRouteName() == 'blog.edit' && isset($tags) ? old('tags', $tags) : old('tags') }}">
            @error('tags')
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
<script type="module">
    $(document).ready(function() {
        $("input[name='title']").on('blur keyup keydown change paste',function() {
            let inputslug = $(this).next().next();
            var str = $(this).val();
            str = str.replace(/\W+(?!$)/g, '-').toLowerCase();
            $(inputslug).val(str);
            $(inputslug).attr('placeholder', str);
        })
    })
</script>
