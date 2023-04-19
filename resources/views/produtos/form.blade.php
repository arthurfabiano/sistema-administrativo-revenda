<div class="input-group {{ $errors->has('nome') ? 'has-error' : ''}}">
    <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-building"></i></span>
    </div>
    <input class="form-control" name="nome" type="text" id="nome" value="{{ isset($produto->nome) ? $produto->nome : ''}}" required>
    {!! $errors->first('nome', '<p class="help-block">:message</p>') !!}
</div>
<div class="input-group {{ $errors->has('descricao') ? 'has-error' : ''}}">
    <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-building"></i></span>
    </div>
    <textarea class="form-control" rows="5" name="descricao" type="textarea" id="descricao" >{{ isset($produto->descricao) ? $produto->descricao : ''}}</textarea>
    {!! $errors->first('descricao', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Atualizar' : 'Novo' }}">
</div>
