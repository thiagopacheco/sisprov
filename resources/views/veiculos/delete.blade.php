@extends('template.app')
@section('title') Veículos @endsection
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-xs-offset-0 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                @include('alerts._error')
                <div class="table-responsive">
                    <div class="panel panel-default">
                        <div class="panel-heading"><strong>Removendo Veículo</strong></div>
                        <div class="panel-body">


                            {!! Form::open(['route'=>['veiculos.destroy', $object->id],'method'=>'DELETE','class'=>'form']) !!}

                            <p><strong>Placa:</strong> {{ $object->placa }}</p>
                            <p><strong>Modelo:</strong> {{ $object->modelo }}</p>
                            <p><strong>Ano:</strong> {{ $object->ano }}</p>
                            <p><strong>Marca:</strong> {{ $object->marca }}</p>
                            <br>
                            <h3 class="h3">Deseja remover este veículo?</h3>
                            <p>
                                <a href="{{ route('veiculos.index') }}" class="btn btn-default">Cancelar</a>
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