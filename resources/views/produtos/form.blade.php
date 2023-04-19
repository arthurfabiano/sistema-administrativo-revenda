<div class="row mb-3">
    <div class="col-lg-12">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-building"></i></span>
            </div>
            <input type="text" name="nome" class="form-control @error('nome') is-invalid @enderror" value="{{ old('nome', @$produto->nome) }}" placeholder="Nome Empresa*" required maxlength="255">
            @error('nome')
            <span class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>

<div class="row mb-3">
    <div class="col-lg-12">
        <div class="form-group">
            <label>Descricao.:</label>
            <textarea rows="4" name="descricao" class="form-control @error('descricao') is-invalid @enderror" placeholder="Digite aqui seu texto...">{{ old('descricao', @$produto->descricao) }}</textarea>
            @error('descricao')
            <span class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <!-- /input-group -->
    </div>
</div>

<hr>

<div class="input-group">
    <button type="submit" class="btn btn-success"><i class="nav-icon fas fa-plus"></i> {{ $formMode === 'edit' ? 'Atualizar' : 'Novo' }}</button>
</div>

