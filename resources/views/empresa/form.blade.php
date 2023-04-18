<div class="card-body">
    <div class="row mb-3">
        <div class="col-lg-6">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-building"></i></span>
                </div>
                <input type="text" name="nome" class="form-control @error('nome') is-invalid @enderror" value="{{ old('nome', @$empresa->nome) }}" placeholder="Nome Empresa*" required maxlength="255">
                @error('nome')
                    <span class="error invalid-feedback">{{ $message }}</span>
                @enderror

            </div>
            <!-- /input-group -->
        </div>
        <!-- /.col-lg-6 -->
        <div class="col-lg-6">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-building"></i></span>
                </div>
                <input type="text" name="razao_social" class="form-control" value="{{ old('razao_social', @$empresa->razao_social) }}" placeholder="Razão Social" maxlength="255">
            </div>
            <!-- /input-group -->
        </div>
        <!-- /.col-lg-6 -->
    </div>

    <div class="row mb-3">
        <div class="col-lg-6">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-file"></i></span>
                </div>
                <input type="text" name="documento" class="cpf_cnpj form-control @error('documento') is-invalid @enderror"
                       value="@if (strlen($empresa->documento) === 11) {{ old('documento', mascara($empresa->documento, '###.###.###-##')) }}
                       @else {{ old('documento', mascara($empresa->documento, '##.###.###/####-##')) }} @endif"
                       placeholder="CPF/CNPJ*" required maxlength="14">
                @error('documento')
                <span class="error invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <!-- /input-group -->
        </div>
        <!-- /.col-lg-6 -->
        <div class="col-lg-6">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                </div>
                <input type="text" name="ie_rg" class="form-control" value="{{ old('ie_rg', @$empresa->ie_rg) }}" placeholder="IE/RG" maxlength="25">
            </div>
            <!-- /input-group -->
        </div>
        <!-- /.col-lg-6 -->
    </div>

    <div class="row mb-3">
        <div class="col-lg-6">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                </div>
                <input type="text" name="nome_contato" class="form-control @error('nome_contato') is-invalid @enderror" value="{{ old('nome_contato', @$empresa->nome_contato) }}" placeholder="Nome para Contato*" required maxlength="100">
                @error('nome')
                <span class="error invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <!-- /input-group -->
        </div>
        <!-- /.col-lg-6 -->
        <div class="col-lg-6">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-at"></i></span>
                </div>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', @$empresa->email) }}" placeholder="Email*" required maxlength="100">
                @error('nome')
                <span class="error invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <!-- /input-group -->
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-lg-6">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                </div>
                <input type="text" name="telefone" class="phone form-control" value="{{ old('telefone', mascara(@$empresa->telefone, '(##)####-####')) }}" placeholder="Telefone" maxlength="10">
            </div>
            <!-- /input-group -->
        </div>
        <!-- /.col-lg-6 -->
        <div class="col-lg-6">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-mobile-alt"></i></span>
                </div>
                <input type="text" name="celular" class="celular form-control @error('celular') is-invalid @enderror" value="{{ old('celular', mascara(@$empresa->celular, '(##)#####-####')) }}" placeholder="Celular*" required maxlength="11">
                @error('nome')
                <span class="error invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <!-- /input-group -->
        </div>
        <!-- /.col-lg-6 -->
    </div>

    <div class="row mb-3">
        <div class="col-lg-6">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-map"></i></span>
                </div>
                <input type="text" name="logradouro" class="form-control @error('logradouro') is-invalid @enderror" value="{{ old('logradouro', @$empresa->logradouro) }}" placeholder="Logradouro*" required maxlength="100">
                @error('nome')
                <span class="error invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <!-- /input-group -->
        </div>
        <!-- /.col-lg-6 -->
        <div class="col-lg-6">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-location-arrow"></i></span>
                </div>
                <input type="text" name="cep" class="cep form-control @error('cep') is-invalid @enderror" value="{{ old('cep', mascara(@$empresa->cep, '#####-###')) }}" placeholder="CEP*" required maxlength="8">
                @error('nome')
                <span class="error invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <!-- /input-group -->
        </div>
        <!-- /.col-lg-6 -->
    </div>

    <div class="row mb-3">
        <div class="col-lg-4">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-map-pin"></i></span>
                </div>
                <input type="text" name="bairro" class="form-control @error('bairro') is-invalid @enderror" value="{{ old('bairro', @$empresa->bairro) }}" placeholder="Bairro*" required maxlength="50">
                @error('nome')
                <span class="error invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <!-- /input-group -->
        </div>
        <!-- /.col-lg-6 -->
        <div class="col-lg-4">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-city"></i></span>
                </div>
                <input type="text" name="cidade" class="form-control @error('cidade') is-invalid @enderror" value="{{ old('cidade', @$empresa->cidade) }}" placeholder="Cidade*" required maxlength="50">
                @error('nome')
                <span class="error invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <!-- /input-group -->
        </div>
        <!-- /.col-lg-6 -->
        <!-- /.col-lg-6 -->
        <div class="col-lg-4">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-map"></i></span>
                </div>
                <select name="estado" class="form-control @error('estado') is-invalid @enderror" value="{{ old('estado', @$empresa->estado) }}" required>
                    <option value="">Selecione</option>
                    @foreach(estados() as $sigla => $nome)
                        <option {{ @$empresa->estado == $sigla ? 'selected' : '' }} value="{{ $sigla }}">{{ $nome }}</option>"
                    @endforeach
                </select>
                @error('nome')
                    <span class="error invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <!-- /input-group -->
        </div>
        <!-- /.col-lg-6 -->
    </div>

    <div class="row mb-3">
        <div class="col-lg-12">
            <div class="form-group">
                <label>Observações.:</label>
                <textarea rows="4" name="observacao" class="form-control" placeholder="Digite aqui seu texto...">{{ old('observacao', @$empresa->observacao) }}</textarea>
            </div>
            <!-- /input-group -->
        </div>
    </div>

    <hr>

    <div class="input-group">
        <button type="submit" class="btn btn-success"><i class="nav-icon fas fa-plus"></i> Cadastrar</button>
    </div>
</div>
