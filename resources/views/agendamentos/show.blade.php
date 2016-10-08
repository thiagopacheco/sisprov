@extends('template.app')
@section('title') Agendamentos @endsection
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-xs-offset-0 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                <div class="table-responsive">
                    <div class="panel panel-default">
                        <div class="panel-heading"><strong>Agendamento</strong></div>
                        <div class="panel-body">
                            @include('alerts._error')

                            <p><strong>Equipe:</strong> {{ $object->servidores }}</p>
                            <p><strong>Municípios:</strong> {{ $object->municipios }}</p>
                            <p><strong>Data Saída:</strong> {{ date('d/m/Y', strtotime($object->data_saida)) }}</p>
                            <p><strong>Data Retorno:</strong> {{ date('d/m/Y', strtotime($object->data_retorno)) }}</p>
                            <p><strong>Hora Saída:</strong> {{ $object->hora_saida }}</p>
                            <p>
                                <strong>Placa:</strong>
                                @if(isset($object->veiculo->placa))
                                    {{ $object->veiculo->placa }} &nbsp;&nbsp;&nbsp;
                                @endif
                                <strong>Veículo:</strong>
                                @if(isset($object->veiculo->modelo))
                                    {{ $object->veiculo->modelo }}
                                @endif
                            </p>
                            <p><strong>Motorista:</strong> {{ $object->motorista }}</p>
                            <p><strong>Cód. SIAD:</strong> {{ $object->cod_siad }}</p>
                            <p><strong>Status:</strong> {{ $object->status }}</p>
                            <p><strong>Observações:</strong> {{ $object->descricao }}</p>

                            <br>
                            <p>
                            @if(auth()->user()->level > 2 && $object->status == 'Pendente')
                                <div class="col-xs-6 text-right">
                                {!! Form::open(['url'=>"agendamentos/aprovar/$object->id", 'method'=>'PUT','class'=>'form-inline']) !!}
                                <input type="hidden" name="status" value="Aprovado">
                                <button type="submit" class="btn btn-success">Aprovar</button>
                                {!! Form::close() !!}
                                </div>

                                <div class="col-xs-6 text-left">
                                {!! Form::open(['url'=>"agendamentos/recusar/$object->id", 'method'=>'PUT','class'=>'form-inline']) !!}
                                <input type="hidden" name="status" value="Recusado">
                                <button type="submit" class="btn btn-danger">Reprovar</button>
                                {!! Form::close() !!}
                                </div>
                            @endif
                            </p>
                            <p>
                                <a href="{{ url('agendamentos') }}" class="btn btn-default">Voltar</a>

                            </p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection