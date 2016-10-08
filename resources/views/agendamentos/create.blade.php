@extends('template.app')
@section('title') Agendamentos @endsection
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-xs-offset-0 col-sm-6 col-sm-offset-3">
                <div class="table-responsive">
                    <div class="panel panel-default">
                        <div class="panel-heading"><strong>Cadastro de Novo Agendamento</strong></div>
                        <div class="panel-body">
                            @include('alerts._errors')

                            {!! Form::open(['url'=>'agendamentos/store', 'class'=>'form']) !!}
                            <div class="row">
                                @include('agendamentos._form')
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <a href="{{ url('agendamentos') }}" class="btn btn-default">Cancelar</a>
                                        <button type="submit" class="btn btn-primary"><i
                                                    class="glyphicon glyphicon-floppy-save" aria-hidden="true"></i>
                                            Salvar
                                        </button>
                                    </div>
                                </div>
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