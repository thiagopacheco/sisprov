@extends('template.app')
@section('title') Agendamentos @endsection
@section('content')

    <div class="container-fluid">
        <div class="row">
            @include('alerts._success')
            <div class="col-xs-12">
                <div class="table-responsive">
                    <div class="panel panel-default">
                        <div class="panel-heading"><strong>Agendamentos de Viagens</strong></div>
                        <div class="panel-body">

                            <div class="hidden-print">
                                <a href="{{ url('agendamentos/create')  }}" class="btn btn-default"><i
                                            class="glyphicon glyphicon-plus" aria-hidden="true"></i> Cadastrar Novo </a>
                                <button type="button" class="btn btn-default" onclick="window.print()"><i aria-hidden="true" class="glyphicon glyphicon-print"></i>Imprimir</button>

                                <span class="pull-right">
                                    {!! Form::open(['url' => 'agendamentos/search', 'class'=>'form form-inline']) !!}
                                            <div class="form-group form-group-sm">
                                                <select name="tipo" class="form-control">
                                                    <option value="saida">Data saída</option>
                                                    <option value="retorno">Data retorno</option>
                                                </select>
                                                <input type="text" name="data_inicial" class="form-control data" placeholder="Data inicial"/>
                                                <input type="text" name="data_final" class="form-control data" placeholder="Data final"/>
                                                <button type="submit" class="btn btn-default btn-sm"><i aria-hidden="true" class="glyphicon glyphicon-search"></i></button>

                                            </div>
                                    {!! Form::close() !!}
                                    @include('alerts._errors')
                                </span>
                            </div>
                            <div class="clearfix"></div>

                            <p class="text-center hidden-print">
                                <br><br>
                                <a href="{{ url('agendamentos') }}" class="btn btn-default btn-xs">Ver Todos</a>
                                <a href="{{ url('agendamentos/pendentes') }}"
                                   class="btn btn-warning btn-xs">Pendentes</a>
                                <a href="{{ url('agendamentos/aprovados') }}"
                                   class="btn btn-success btn-xs">Aprovado</a>
                                <a href="{{ url('agendamentos/recusados') }}" class="btn btn-danger btn-xs">Recusado</a>
                                <br>
                            </p>
                            <table class="table table-condensed table-hover">
                                <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Equipe</th>
                                    <th>Municipios</th>
                                    <th class="text-center">Data Saída</th>
                                    <th class="text-center">Data Retorno</th>
                                    <th class="text-center">Código Siad</th>
                                    <th class="text-center">Motorista</th>
                                    <th class="text-center">Veículo</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-left action hidden-print">Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($dados as $d)
                                    <tr>
                                        <td class="text-center">{{ $d->id }}</td>
                                        <td>{{ $d->servidores }}</td>
                                        <td>{{ $d->municipios }}</td>
                                        <td class="text-center">{{ date('d/m/Y', strtotime($d->data_saida)) }}</td>
                                        <td class="text-center">{{ date('d/m/Y', strtotime($d->data_retorno)) }}</td>
                                        <td class="text-center">{{ $d->cod_siad }}</td>
                                        <td class="text-center">{{ $d->motorista }}</td>
                                        <td class="text-center">
                                            @if(isset($d->veiculo->placa))
                                                {{ $d->veiculo->placa }}
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if($d->status == 'Pendente')
                                                <span class="text-warning bg-warning">{{ $d->status }}</span>
                                            @elseif($d->status == 'Aprovado')
                                                <span class="text-success bg-success">{{ $d->status }}</span>
                                            @elseif($d->status == 'Recusado')
                                                <span class="text-danger bg-danger">{{ $d->status }}</span>
                                            @endif
                                        </td>
                                        <td class="text-left hidden-print">
                                            <a href="{{ url('agendamentos/show/'. $d->id) }}" class="text-success"><i
                                                        class="glyphicon glyphicon-info-sign" data-toggle="tooltip"
                                                        data-placement="left" title="Ver detalhes "></i></a>&nbsp;
                                            <a href="{{ url('agendamentos/edit/'. $d->id) }}" class="text-warning"><i
                                                        class="glyphicon glyphicon-edit" data-toggle="tooltip"
                                                        data-placement="left" title="Editar agendamento"></i></a>
                                            @if($d->status == "Pendente")
                                                <a href="{{ url('agendamentos/delete/'. $d->id) }}" class="text-danger"><i
                                                            class="glyphicon glyphicon-remove" data-toggle="tooltip"
                                                            data-placement="left" title="Excluir agendamento"></i></a>
                                            @endif
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