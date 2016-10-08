@extends('template.app')
@section('title') Agendamentos @endsection
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-xs-offset-0 col-sm-6 col-sm-offset-3">
                <div class="table-responsive">
                    <div class="panel panel-default">
                        <div class="panel-heading"><strong>Atualizar Agendamento</strong></div>
                        <div class="panel-body">
                            @include('alerts._errors')

                            {!! Form::model($object, ['url'=>'agendamentos/update/'. $object->id,'method'=>'PUT','class'=>'form']) !!}
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label">Servidores</label>
                                        {!! Form::select('servidores[]', $servidores, $s, ['class'=>'form-control', 'multiple']) !!}
                                        <div class="small text-primary text-center">Segure Ctrl para selecionar mais de
                                            um
                                            Servidor
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label">Municípios</label>
                                        {!! Form::select('municipios[]', $municipios, $m, ['class'=>'form-control', 'multiple']) !!}
                                        <div class="small text-primary text-center">Segure Ctrl para selecionar mais de
                                            um
                                            Município
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Data Saída</label>
                                        {!! Form::text('data_saida', date('d/m/Y', strtotime($object->data_saida)), ['class'=>'form-control data']) !!}
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Data Retorno</label>
                                        {!! Form::text('data_retorno', date('d/m/Y', strtotime($object->data_retorno)), ['class'=>'form-control data']) !!}
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Hora Saída</label>
                                        {!! Form::text('hora_saida', null, ['class'=>'form-control hora']) !!}
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Código Siad</label>
                                        {!! Form::text('cod_siad', null, ['class'=>'form-control']) !!}
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Placa</label>
                                        {!! Form::select('veiculo_id', $veiculo, null, ['class'=>'form-control']) !!}
                                    </div>
                                </div>

                                @if(auth()->user()->level > 2)
                                    <div class="form-group col-md-4">
                                        <label class="control-label col-xs-12">Status</label>
                                        {!! Form::select('status', ['Pendente'=>'Pendente','Aprovado'=>'Aprovado','Recusado'=>'Recusado'], null, ['class'=>'form-control']) !!}
                                    </div>
                                @else
                                    <div class="form-group col-md-4">
                                        <label class="control-label col-xs-12">Status</label>
                                        {!! Form::select('status', ['Pendente'=>'Pendente','Aprovado'=>'Aprovado','Recusado'=>'Recusado'], null, ['class'=>'form-control', 'disabled']) !!}
                                    </div>
                                @endif

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Motorista</label>
                                        {!! Form::select('motorista', $motorista, null, ['class'=>'form-control']) !!}
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Observações</label>
                                        {!! Form::textarea('descricao', null, ['class'=>'form-control', 'rows'=>'2']) !!}
                                    </div>
                                </div>

                                <div class="form-group col-xs-12">
                                    <a href="{{ url('agendamentos') }}" class="btn btn-default">Cancelar</a>
                                    <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-save" aria-hidden="true"></i> Salvar </button>
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