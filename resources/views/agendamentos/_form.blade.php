<div class="col-xs-12">
    <div class="form-group">
        <label class="cotnrol-label">Servidores</label>
        {!! Form::select('servidores[]', $servidores, null, ['class'=>'form-control', 'multiple']) !!}
        <div class="small text-primary text-center">Segure Ctrl ao clicar para selecionar mais de um Servidor</div>
    </div>
</div>

<div class="col-xs-12">
    <div class="form-group">
        <label class="cotnrol-label">Municípios</label>
        {!! Form::select('municipios[]', $municipios, null, ['class'=>'form-control', 'multiple']) !!}
        <div class="small text-primary text-center">Segure Ctrl ao clicar para selecionar mais de um Município</div>
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label class="cotnrol-label">Data Saída</label>
        {!! Form::text('data_saida', null, ['class'=>'form-control data']) !!}
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label class="cotnrol-label">Data Retorno</label>
        {!! Form::text('data_retorno', null, ['class'=>'form-control data']) !!}
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label class="cotnrol-label">Hora Saída</label>
        {!! Form::text('hora_saida', null, ['class'=>'form-control hora']) !!}
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label class="cotnrol-label">Código Siad</label>
        {!! Form::text('cod_siad', null, ['class'=>'form-control']) !!}
    </div>
</div>

<div class="col-md-12">
    <div class="form-group">
        <label class="cotnrol-label">Observações</label>
        {!! Form::textarea('descricao', null, ['class'=>'form-control', 'rows'=>'2']) !!}
    </div>
</div>