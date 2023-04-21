<div class="row mb-3">
    <div class="col-lg-12">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-building"></i></span>
            </div>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', @$produto->name) }}" placeholder="Usuário*" required maxlength="255">
            @error('name')
            <span class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>
<div class="row mb-3">
    <div class="col-lg-12">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-building"></i></span>
            </div>
            <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', @$produto->email) }}" placeholder="Email*" required maxlength="255">
            @error('email')
            <span class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>
<div class="row mb-3">
    <div class="col-lg-12">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-building"></i></span>
            </div>
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" value="" placeholder="Password*" required maxlength="255">
            @error('password')
            <span class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>
<div class="row mb-3">
    <div class="col-lg-12">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-building"></i></span>
            </div>
            <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" value="" placeholder="Confirmar Senha*" required maxlength="255">
            @error('password_confirmation')
            <span class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>

<hr>

<div class="input-group">
    <button type="submit" class="btn btn-success"><i class="nav-icon fas fa-plus"></i> {{ $formMode === 'edit' ? 'Atualizar' : 'Novo' }}</button>
</div>
