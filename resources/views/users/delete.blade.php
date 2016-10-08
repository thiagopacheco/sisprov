@extends('template.app')
@section('title') Usuários @endsection
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-xs-offset-0 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                <div class="table-responsive">
                    <div class="panel panel-default">
                        <div class="panel-heading"><strong>Removendo Usuário</strong></div>
                        <div class="panel-body">


                            {!! Form::open(['route'=>['users.destroy', $object->id],'method'=>'DELETE','class'=>'form']) !!}

                            <p><strong>Nome:</strong> {{ $object->nome }}</p>
                            <p><strong>E-mail:</strong> {{ $object->email }}</p>
                            <br>
                            <p>Deseja remover este cargo?</p>
                            <p>
                                <a href="{{ route('users.index') }}" class="btn btn-default">Cancelar</a>
                                <button type="submit" class="btn btn-danger">Excluir</button>
                            </p>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection