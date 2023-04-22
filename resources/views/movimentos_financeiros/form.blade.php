<div class="row mb-3">
    <div class="col-lg-4">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-edit"></i></span>
            </div>
            <input type="text" name="descricao" class="form-control @error('descricao') is-invalid @enderror" value="{{ old('descricao', @$movimentos_financeiro->descricao) }}" placeholder="Descricao*" required maxlength="255">
            @error('descricao')
            <span class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="col-lg-4">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-map"></i></span>
            </div>
            <select name="tipo" id="tipo" class="form-control @error('tipo') is-invalid @enderror" value="{{ old('tipo', @$movimentos_financeiro->tipo) }}" required>
                <option value="">Selecione</option>
                @foreach(tipo_movimentacao() as $sigla => $nome)
                    <option {{ @$movimentos_financeiro->tipo == $sigla ? 'selected' : '' }} value="{{ $sigla }}">{{ $nome }}</option>"
                @endforeach
            </select>
            @error('tipo')
            <span class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="col-lg-4">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-building"></i></span>
            </div>
            <select name="empresa_id" id="empresa-ajax" class="form-control" required></select>
            @error('empresa_id')
            <span class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>

<div class="row mb-3">
    <div class="col-lg-4">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
            </div>
            <input type="text" name="valor" class="money form-control @error('valor') is-invalid @enderror" value="{{ old('valor', @$movimentos_financeiro->valor) }}" placeholder="Valor*" required maxlength="255">
            @error('valor')
            <span class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="col-lg-4">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
            </div>
            <input type="text" name="data" class="data form-control @error('data') is-invalid @enderror" value="{{ old('data', @$movimentos_financeiro->data) }}" placeholder="data*" required maxlength="255">
            @error('data')
            <span class="error invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>

<hr>

<div class="input-group">
    <button type="submit" class="btn btn-success"><i class="nav-icon fas fa-plus"></i> {{ $formMode === 'edit' ? 'Atualizar' : 'Novo' }}</button>
</div>
