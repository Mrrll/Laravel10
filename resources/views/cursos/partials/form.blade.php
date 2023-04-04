<div class="card" style="width: 18rem;">
    <div class="card-header text-center">
        <h5>
            {{ Route::currentRouteName() == 'cursos.edit' ? 'Editar curso' : 'Crear curso' }}
        </h5>
    </div>
    <div class="card-body">
        <div class="mb-0">
            <label class="form-label">Name:</label>
            <input type="text" class="form-control" placeholder="Html 5"
                value="{{ Route::currentRouteName() == 'cursos.edit' ? old('name', $curso->name) : old('name') }}" name="name">
            @error('name')
                <small class="text-danger">*{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-0">
            <label class="form-label">Descripción:</label>
            <textarea class="form-control" rows="3" name="description"> {{ Route::currentRouteName() == 'cursos.edit' ? old('description', $curso->description) : old('description') }}</textarea>
            @error('description')
                <small class="text-danger">*{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-0">
            <label class="form-label">Categoria:</label>
            <input type="text" class="form-control" placeholder="Desarrollo web"
                value="{{ Route::currentRouteName() == 'cursos.edit' ? old('categoria', $curso->categoria) : old('categoria') }}" name="categoria">
            @error('categoria')
                <small class="text-danger">*{{ $message }}</small>
            @enderror
        </div>
    </div>
    <div class="card-footer text-center">
        <button type="submit"
            class="btn btn-primary">{{ Route::currentRouteName() == 'cursos.edit' ? 'Editar Curso' : 'Crear Curso' }}</button>
            <a class="btn btn-danger" href="{{ url()->previous() }}">Cancelar</a>
    </div>
</div>
