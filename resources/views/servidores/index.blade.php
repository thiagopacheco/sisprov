@extends('template.app')
@section('title') Servidores @endsection
@section('content')

    <div class="container">
        <div class="row">
            @include('alerts._success')
            <div class="col-xs-12 col-xs-offset-0 col-sm-8 col-sm-offset-2">
                <div class="table-responsive">
                    <div class="panel panel-default">
                        <div class="panel-heading"><strong>Servidores</strong></div>
                        <div class="panel-body">
                            <a href="{{ route('servidores.create')  }}" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-plus" aria-hidden="true"></i> Cadastrar Novo Servidor</a><br><br><br>
                            <table class="table table-condensed table-hover">
                                <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>CPF</th>
                                    <th>Núcleo</th>
                                    <th>Telefone</th>
                                    <th>Cargo</th>
                                    <th class="text-center">#</th>
                                </tr>
                                </thead>
                                <tbody>
                                        @foreach($dados as $d)
                                        <tr>
                                            <td>{{ $d->nome }}</td>
                                            <td>{{ $d->cpf }}</td>
                                            <td>{{ $d->nucleo }}</td>
                                            <td>{{ $d->telefone}}</td>
                                            <td>{{ $d->cargo->nome }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('servidores.edit',$d->id) }}" class="text-warning"><i class="glyphicon glyphicon-edit" data-toggle="tooltip" data-placement="left" title="Editar usuário"></i></a>&nbsp;&nbsp;
                                                <a href="{{ route('servidores.delete',$d->id) }}" class="text-danger"><i class="glyphicon glyphicon-remove" data-toggle="tooltip" data-placement="left" title="Remover usuário"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection