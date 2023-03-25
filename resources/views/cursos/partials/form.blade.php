<div class="card" style="width: 18rem;">
    <div class="card-header text-center">
        <h5>
            {{ Route::currentRouteName() == 'cursos.edit' ? 'Editar curso' : 'Crear curso' }}
        </h5>
    </div>
    <div class="card-body">
        @csrf
        <div class="mb-0">
            <label class="form-label">Name:</label>
            <input type="text" class="form-control" placeholder="Html 5"
                value="{{ Route::currentRouteName() == 'cursos.edit' ? old('name', $curso->name) : old('name') }}">
            @error('name')
                <small class="text-danger">*{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-0">
            <label class="form-label">Descripción:</label>
            <textarea class="form-control" rows="3">{{ Route::currentRouteName() == 'cursos.edit' ? old('description', $curso->description) : old('description') }}</textarea>
            @error('description')
                <small class="text-danger">*{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-0">
            <label class="form-label">Categoria:</label>
            <input type="text" class="form-control" placeholder="Desarrollo web"
                value="{{ Route::currentRouteName() == 'cursos.edit' ? old('categoria', $curso->categoria) : old('categoria') }}">
            @error('categoria')
                <small class="text-danger">*{{ $message }}</small>
            @enderror
        </div>
    </div>
    <div class="card-footer text-center">
        <button type="submit"
            class="btn btn-primary">{{ Route::currentRouteName() == 'cursos.edit' ? 'Editar Curso' : 'Crear Curso' }}</button>
    </div>
</div>
