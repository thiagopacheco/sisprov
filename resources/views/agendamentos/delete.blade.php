@extends('template.app')
@section('title') Agendamentos @endsection
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-xs-offset-0 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                <div class="table-responsive">
                    <div class="panel panel-default">
                        <div class="panel-heading"><strong>Remover Agendamento</strong></div>
                        <div class="panel-body">
                            @include('alerts._error')

                            {!! Form::open(['url'=>'agendamentos/destroy/'. $object->id,'method'=>'DELETE','class'=>'form']) !!}

                            <p><strong>Equipe:</strong> {{ $object->servidores }}</p>
                            <p><strong>Municípios:</strong> {{ $object->municipios }}</p>
                            <p><strong>Data Saída:</strong> {{ date('d/m/Y', strtotime($object->data_saida)) }}</p>
                            <p><strong>Data Retorno:</strong> {{ date('d/m/Y', strtotime($object->data_retorno)) }}</p>
                            <p><strong>Cód. SIAD:</strong> {{ $object->cod_siad }}</p>
                            <p><strong>Status:</strong> {{ $object->status }}</p>
                            <br>
                            <p>Deseja remover este agendamento?</p>
                            <p>
                                <a href="{{ url('agendamentos') }}" class="btn btn-default">Cancelar</a>
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