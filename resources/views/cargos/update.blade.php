@extends('template.app')
@section('title') Veículos @endsection
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-xs-offset-0 col-sm-4 col-sm-offset-4">
                <div class="table-responsive">
                    <div class="panel panel-default">
                        <div class="panel-heading"><strong>Atualizar Cargo</strong></div>
                        <div class="panel-body">
                            @include('alerts._errors')

                            {!! Form::model($object, ['route'=>['cargos.update', $object->id ],'method'=>'PUT','class'=>'form']) !!}

                            @include('cargos._form')

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection