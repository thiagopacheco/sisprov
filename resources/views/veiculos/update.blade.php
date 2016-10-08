@extends('template.app')
@section('title') Veículos @endsection
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-xs-offset-0 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                <div class="table-responsive">
                    <div class="panel panel-default">
                        <div class="panel-heading"><strong>Atualizar Veículo</strong></div>
                        <div class="panel-body">
                            @include('alerts._errors')

                            {!! Form::model($object, ['route'=>['veiculos.update', $object->id ],'method'=>'PUT','class'=>'form']) !!}

                            @include('veiculos._form')

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection