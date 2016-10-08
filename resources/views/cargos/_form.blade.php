<div class="form-group">
    <label class="cotnrol-label">Cargo</label>
    {!! Form::text('nome', null, ['class'=>'form-control']) !!}
    {{--<input type="text" name="placa" value="" class="form-control">--}}
</div>


<div class="form-group">
    <a href="{{ route('cargos.index') }}" class="btn btn-default">Cancelar</a>
    <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-save" aria-hidden="true"></i> Salvar</button>

</div>