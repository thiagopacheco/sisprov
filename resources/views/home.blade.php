@extends('template.app')
@section('title') Home @endsection
@section('content')

	<div class="container-fluid">
		<div class="row">
			@include('alerts._success')
			@include('alerts._error')
			<div class="col-xs-12">
				<div class="table-responsive">
					<div class="panel panel-default">
						<div class="panel-heading"><strong>Próximas Viagens Aprovadas</strong></div>
						<div class="panel-body">
							<p class="hidden-print">
								<button type="button" class="btn btn-default" onclick="window.print()"><i aria-hidden="true" class="glyphicon glyphicon-print"></i>Imprimir</button>
							</p>
							<table class="table table-condensed table-hover">
								<thead>
								<tr>
									<th class="text-center">#</th>
									<th>Equipe</th>
									<th>Municipios</th>
									<th class="text-center">Data Saída</th>
									<th class="text-center">Data Retorno</th>
									<th class="text-center">Código Siad</th>
									<th class="text-center">Status</th>
								</tr>
								</thead>
								<tbody>
								@foreach($dados as $d)
									<tr>
										<td class="text-center">{{ $d->id }}</td>
										<td>{{ $d->servidores }}</td>
										<td>{{ $d->municipios }}</td>
										<td class="text-center">{{ date('d/m/Y', strtotime($d->data_saida)) }}</td>
										<td class="text-center">{{ date('d/m/Y', strtotime($d->data_retorno)) }}</td>
										<td class="text-center">{{ $d->cod_siad }}</td>
										<td class="text-center">
											@if($d->status == 'Pendente')
												<div class="text-warning bg-warning">{{ $d->status }}</div>
											@elseif($d->status == 'Aprovado')
												<div class="text-success bg-success">{{ $d->status }}</div>
											@elseif($d->status == 'Recusado')
												<div class="text-danger bg-danger">{{ $d->status }}</div>
											@endif
										</td>
									</tr>
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