<div class="card" style="width: 18rem;">
    <div class="card-header text-center">
        <h5>
            {{ Route::currentRouteName() == 'profile.edit' ? 'Editar perfil' : 'Crear perfil' }}
        </h5>
    </div>
    <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
    <div class="card-body">
        <div class="mb-0">
            <label class="form-label">Titulo:</label>
            <input type="text" class="form-control" placeholder="Diseñador"
                value="{{ Route::currentRouteName() == 'profile.edit' ? old('title', $profile->title) : old('title') }}" name="title">
            @error('title')
                <small class="text-danger">*{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-0">
            <label class="form-label">Biografia:</label>
            <textarea class="form-control" rows="3" name="biography"> {{ Route::currentRouteName() == 'profile.edit' ? old('biography', $profile->biography) : old('biography') }}</textarea>
            @error('biography')
                <small class="text-danger">*{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-0">
            <label class="form-label">Sitio web:</label>
            <input type="text" class="form-control" placeholder="Desarrollo web"
                value="{{ Route::currentRouteName() == 'profile.edit' ? old('website', $profile->website) : old('website') }}" name="website">
            @error('website')
                <small class="text-danger">*{{ $message }}</small>
            @enderror
        </div>
    </div>
    <div class="card-footer text-center">
        <button type="submit"
            class="btn btn-primary">{{ Route::currentRouteName() == 'profile.edit' ? 'Editar Perfil' : 'Crear Perfil' }}</button>
    </div>
</div>
