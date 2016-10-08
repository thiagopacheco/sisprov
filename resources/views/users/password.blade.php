@extends('template.app')
@section('title') Usuários @endsection
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-xs-offset-0 col-sm-8 col-sm-offset-2">
                <div class="table-responsive">
                    <div class="panel panel-default">
                        <div class="panel-heading"><strong>Atualizar Usuários</strong></div>
                        <div class="panel-body">
                            @include('alerts._errors')
                            @include('alerts._error')

                            {!! Form::model($object, ['route'=>['users.password.update', $object->id ],'method'=>'PUT','class'=>'form']) !!}

                            <div class="form-group col-md-6">
                                <label class="cotnrol-label">Senha antiga</label>
                                {!! Form::password('password_atual', ['class'=>'form-control']) !!}
                                <div class="small text-success">
                                    <a href="{{ url('password/email') }}">Esqueceu sua senha?</div></a>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="cotnrol-label">Nova Senha</label>
                                {!! Form::password('password', ['class'=>'form-control']) !!}
                            </div>

                            <div class="form-group col-md-6">
                                <label class="cotnrol-label">Confirmar Nova Senha</label>
                                {!! Form::password('password_confirmation', ['class'=>'form-control']) !!}
                            </div>


                            <div class="form-group col-md-12">
                                <a href="{{ route('users.index') }}" class="btn btn-default">Cancelar</a>
                                <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-save" aria-hidden="true"></i>Salvar</button>
                            </div>

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection