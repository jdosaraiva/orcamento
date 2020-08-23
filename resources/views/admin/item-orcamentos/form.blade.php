<div class="form-group {{ $errors->has('nome') ? 'has-error' : ''}}">
    <label for="nome" class="control-label">{{ 'Nome' }}</label>
    <input class="form-control" name="nome" type="text" id="nome" value="{{ isset($itemorcamento->nome) ? $itemorcamento->nome : ''}}" required>
    {!! $errors->first('nome', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('conta_id') ? 'has-error' : ''}}">
    <label for="conta_id" class="control-label">{{ 'Conta Id' }}</label>
    <!-- <input class="form-control" name="conta_id" type="number" id="conta_id" value="{{ isset($itemorcamento->conta_id) ? $itemorcamento->conta_id : ''}}" > // -->

        <select class="form-control" name="conta_id" id="contas_id">
            @foreach($contas as $conta)
            <option value="{{ $conta->id }}" {{ $conta->id == (isset($itemorcamento->conta_id) ? $itemorcamento->conta_id : '')  ? 'selected' : '' }}>
                {{ $conta->conta }}
            </option>
            @endforeach
        </select>


    {!! $errors->first('conta_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('data_vencimento') ? 'has-error' : ''}}">
    <label for="data_vencimento" class="control-label">{{ 'Data Vencimento' }}</label>
    <input class="form-control" name="data_vencimento" type="date" id="data_vencimento" value="{{ isset($itemorcamento->data_vencimento) ? $itemorcamento->data_vencimento : ''}}" required>
    {!! $errors->first('data_vencimento', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('valor') ? 'has-error' : ''}}">
    <label for="valor" class="control-label">{{ 'Valor' }}</label>
    <input class="form-control" name="valor" type="number" id="valor" value="{{ isset($itemorcamento->valor) ? $itemorcamento->valor : ''}}" required>
    {!! $errors->first('valor', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('data_pagamento') ? 'has-error' : ''}}">
    <label for="data_pagamento" class="control-label">{{ 'Data Pagamento' }}</label>
    <input class="form-control" name="data_pagamento" type="date" id="data_pagamento" value="{{ isset($itemorcamento->data_pagamento) ? $itemorcamento->data_pagamento : ''}}" >
    {!! $errors->first('data_pagamento', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('descricao') ? 'has-error' : ''}}">
    <label for="descricao" class="control-label">{{ 'Descricao' }}</label>
    <input class="form-control" name="descricao" type="text" id="descricao" value="{{ isset($itemorcamento->descricao) ? $itemorcamento->descricao : ''}}" >
    {!! $errors->first('descricao', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
