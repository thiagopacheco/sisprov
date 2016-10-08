@extends('template.app')
@section('title') Cargos @endsection
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-xs-offset-0 col-sm-4 col-sm-offset-4">
                <div class="table-responsive">
                    <div class="panel panel-default">
                        <div class="panel-heading"><strong>Cadastro de novo Cargo</strong></div>
                        <div class="panel-body">
                            @include('alerts._errors')

                            {!! Form::open(['route'=>'cargos.store', 'class'=>'form']) !!}

                            @include('cargos._form')

                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection