@extends('template.app')
@section('title') Servidores @endsection
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-xs-offset-0 col-sm-8 col-sm-offset-2">
                <div class="table-responsive">
                    <div class="panel panel-default">
                        <div class="panel-heading"><strong>Atualizar Servidores</strong></div>
                        <div class="panel-body">
                            @include('alerts._errors')

                            {!! Form::model($object , ['route'=>['servidores.update', $object->id ],'method'=>'PUT','class'=>'form']) !!}

                            @include('servidores._form')

                            <input type="hidden" name="id" value="{{ $object->id }}">

                            <div class="form-group col-md-12">
                                <a href="{{ route('servidores.index') }}" class="btn btn-default">Cancelar</a>
                                <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-save" aria-hidden="true"></i>Salvar</button>
                            </div>

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection