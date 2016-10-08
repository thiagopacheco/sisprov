@extends('template.app')
@section('title') Usuários @endsection
@section('content')

    <div class="container">
        <div class="row">
            @include('alerts._success')
            <div class="col-xs-12 col-xs-offset-0 col-sm-8 col-sm-offset-2">
                <div class="table-responsive">
                    <div class="panel panel-default">
                        <div class="panel-heading"><strong>Usuários</strong></div>
                        <div class="panel-body">
                            <a href="{{ route('users.create')  }}" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-plus" aria-hidden="true"></i> Cadastrar Novo </a><br><br><br>
                            <table class="table table-condensed table-hover">
                                <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>E-mail</th>
                                    <th class="text-center">Level</th>
                                    <th class="text-center">#</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($dados as $d)
                                        @if($d->id != Auth::user()->id)
                                        <tr>
                                            <td>{{ $d->nome }}</td>
                                            <td>{{ $d->email }}</td>
                                            <td class="text-center">{{ $d->level }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('users.edit', $d->id) }}" class="text-warning"><i class="glyphicon glyphicon-edit" data-toggle="tooltip" data-placement="left" title="Editar usuário"></i></a>&nbsp;&nbsp;
                                                <a href="{{ route('users.delete', $d->id) }}" class="text-danger"><i class="glyphicon glyphicon-remove" data-toggle="tooltip" data-placement="left" title="Remover usuário"></i></a>
                                            </td>

                                        </tr>
                                        @endif
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