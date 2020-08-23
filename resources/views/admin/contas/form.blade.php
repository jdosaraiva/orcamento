<div class="form-group {{ $errors->has('conta') ? 'has-error' : ''}}">
    <label for="conta" class="control-label">{{ 'Conta' }}</label>
    <input class="form-control" name="conta" type="text" id="conta" value="{{ isset($conta->conta) ? $conta->conta : ''}}" maxlength="15" required>
    {!! $errors->first('conta', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('codigo') ? 'has-error' : ''}}">
    <label for="codigo" class="control-label">{{ 'Codigo' }}</label>
    <input class="form-control" name="codigo" type="text" id="codigo" value="{{ isset($conta->codigo) ? $conta->codigo : ''}}" maxlength="2" required>
    {!! $errors->first('codigo', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('descricao') ? 'has-error' : ''}}">
    <label for="descricao" class="control-label">{{ 'Descricao' }}</label>
    <textarea class="form-control" name="descricao" type="text" id="descricao" value="{{ isset($conta->descricao) ? $conta->descricao : ''}}" maxlength="1000" rows="2"></textarea>
    {!! $errors->first('descricao', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
