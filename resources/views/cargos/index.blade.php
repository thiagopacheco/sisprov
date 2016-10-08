@extends('template.app')
@section('title') Cargos @endsection
@section('content')

    <div class="container">
        <div class="row">
            @include('alerts._success')
            <div class="col-xs-12 col-xs-offset-0 col-sm-4 col-sm-offset-4">
                <div class="table-responsive">
                    <div class="panel panel-default">
                        <div class="panel-heading"><strong>Cargos</strong></div>
                        <div class="panel-body">
                            <a href="{{ route('cargos.create')  }}" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-plus" aria-hidden="true"></i> Cadastrar Novo </a><br><br><br>
                            <table class="table table-condensed table-hover">
                                <thead>
                                <tr>
                                    <th>Cargo</th>
                                    <th class="text-center">Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($dados as $d)
                                        <tr>
                                            <td>{{ $d->nome }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('cargos.edit', $d->id) }}" class="text-warning"><i class="glyphicon glyphicon-edit" data-toggle="tooltip" data-placement="left" title="Editar veículo"></i></a>&nbsp;&nbsp;
                                                <a href="{{ route('cargos.delete', $d->id) }}" class="text-danger"><i class="glyphicon glyphicon-remove" data-toggle="tooltip" data-placement="left" title="Remover veículo"></i></a>
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