@extends('template.app')
@section('title') Usuários @endsection
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-xs-offset-0 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                <div class="table-responsive">
                    <div class="panel panel-default">
                        <div class="panel-heading"><strong>Dados do Usuário</strong></div>
                        <div class="panel-body">


                            <p><strong>Nome:</strong> {{ $object->nome }}</p>
                            <p><strong>CPF:</strong> {{ $object->cpf }}</p>
                            <p><strong>E-mail:</strong> {{ $object->email }}</p>
                            <p><strong>Cargo:</strong> {{ $object->cargo->nome }}</p>
                            <p><strong>Núcleo:</strong> {{ $object->nucleo }}</p>
                            <br>
                            <p>
                                <a href="{{ route('users.index') }}" class="btn btn-default">Voltar</a>

                            </p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection