<div class="form-group col-md-8">
    <label class="cotnrol-label">Nome</label>
    {!! Form::text('nome', null, ['class'=>'form-control']) !!}
</div>

@if(Auth::user()->level == 1)
    <div class="row">
    <fieldset class="col-xs-12" disabled>
@endif


<div class="form-group col-md-4">
    <label class="cotnrol-label">Nível de acesso</label>
    {!! Form::select('level',[1=>'1',2=>'2',3=>'3'], null, ['class'=>'form-control']) !!}
</div>
@if(Auth::user()->level == 1)
    </fieldset>
    </div>

@endif

<div class="form-group col-md-12">
    <label class="cotnrol-label">E-mail</label>
    {!! Form::email('email', null, ['class'=>'form-control']) !!}
</div>
