<div class="form-group col-md-8">
    <label class="control-label">Nome</label>
    {!! Form::text('nome', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group col-md-4">
    <label class="control-label">CPF</label>
    {!! Form::text('cpf', null, ['class'=>'form-control cpf', 'placeholder'=>'Somente números']) !!}
</div>

<div class="form-group col-md-4">
    <label class="control-label">Cargo</label>
    {!! Form::select('cargo_id', $cargos, null, ['class'=>'form-control']) !!}
</div>

<div class="form-group col-md-4">
    <label class="control-label">Núcleo</label>
    {!! Form::select('nucleo',['Nuvisa'=>'Nuvisa','TI'=>'TI','TRANSPORTE'=>'TRANSPORTE'], null, ['class'=>'form-control']) !!}
</div>

<div class="form-group col-md-4">
    <label class="control-label">Telefone</label>
    {!! Form::text('telefone', null, ['class'=>'form-control', 'placeholder'=>'(xx) x xxxx-xxxx']) !!}
</div>


