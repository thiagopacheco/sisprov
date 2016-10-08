@extends('template.app')
@section('title') Veículos @endsection
@section('content')

    <div class="container">
        <div class="row">
            @include('alerts._success')
            <div class="col-xs-12 col-xs-offset-0 col-sm-8 col-sm-offset-2">
                <div class="table-responsive">
                    <div class="panel panel-default">
                        <div class="panel-heading"><strong>Veículos</strong></div>
                        <div class="panel-body">
                            <a href="{{ route('veiculos.create')  }}" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-plus" aria-hidden="true"></i> Cadastrar Novo </a><br><br><br>
                            <table class="table table-condensed table-hover">
                                <thead>
                                <tr>
                                    <th class="text-center">Placa</th>
                                    <th class="text-center">Modelo</th>
                                    <th class="text-center">Ano</th>
                                    <th class="text-center">Marca</th>
                                    <th class="text-center">Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($dados as $d)
                                        <tr>
                                            <td class="text-center">{{ $d->placa }}</td>
                                            <td class="text-center">{{ $d->modelo }}</td>
                                            <td class="text-center">{{ $d->ano }}</td>
                                            <td class="text-center">{{ $d->marca }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('veiculos.edit', $d->id) }}" class="text-warning"><i class="glyphicon glyphicon-edit" data-toggle="tooltip" data-placement="left" title="Editar veículo"></i></a>&nbsp;&nbsp;
                                                <a href="{{ route('veiculos.delete', $d->id) }}" class="text-danger"><i class="glyphicon glyphicon-remove" data-toggle="tooltip" data-placement="left" title="Remover veículo"></i></a>
                                            </td>

                                        </tr>
                                        @endforeach
                                </tbody>
                            </table>
                            <div class="text-center">
                                {!! $dados->render() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection