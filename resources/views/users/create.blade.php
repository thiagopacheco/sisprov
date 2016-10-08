@extends('template.app')
@section('title') Usuários @endsection
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-xs-offset-0 col-sm-8 col-sm-offset-2">
                <div class="table-responsive">
                    <div class="panel panel-default">
                        <div class="panel-heading"><strong>Cadastro de novo Usuário</strong></div>
                        <div class="panel-body">
                            @include('alerts._errors')

                            {!! Form::open(['route'=>'users.store', 'class'=>'form']) !!}

                            @include('users._form')

                            <div class="form-group col-md-6">
                                <label class="cotnrol-label">Senha</label>
                                {!! Form::password('password', ['class'=>'form-control']) !!}
                            </div>

                            <div class="form-group col-md-6">
                                <label class="cotnrol-label">Confirmar Senha</label>
                                {!! Form::password('password_confirmation', ['class'=>'form-control']) !!}
                            </div>

                            <div class="form-group col-md-12">
                                <a href="{{ route('users.index') }}" class="btn btn-default">Cancelar</a>
                                <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-save" aria-hidden="true"></i>Salvar</button>
                            </div>

                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection