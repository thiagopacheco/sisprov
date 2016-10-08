<div class="form-group">
    <label class="control-label">Placa</label>
    {!! Form::text('placa', null, ['class'=>'form-control placa']) !!}
    {{--<input type="text" name="placa" value="" class="form-control">--}}
</div>
<div class="form-group">
    <label class="control-label">Modelo</label>
    {!! Form::text('modelo', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    <label class="control-label">Ano</label>
    {!! Form::text('ano', null, ['class'=>'form-control ano']) !!}
</div>

<div class="form-group">
    <label class="control-label">Marca</label>
    {!! Form::text('marca', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    <a href="{{ route('veiculos.index') }}" class="btn btn-default">Cancelar</a>
    <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-save" aria-hidden="true"></i>
        Salvar
    </button>

</div>