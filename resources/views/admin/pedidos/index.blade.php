@extends('admin.template')

@section('title','Panel de Administración - Pedidos')
@section('content')
	<div class="container" align="center">
		<div class="page-header">
			<h1>
				<i class="fa fa-shopping-cart"></i> PEDIDOS
			</h1>
		</div>

		<div class="page">
			<div class="table-responsive">
				<table class="table table-striped table-hover table-bordered">
					<thead>
						<tr>
							<th>Ver detalle</th>
							<th>Fecha</th>
							<th>Hora</th>
							<th>Nombre</th>
							<th>Usuario</th>
							<th>Subtotal</th>
							<th>Envio</th>
							<th>Total</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>
						@foreach($ordenes as $orden)
							<tr>
								<td><!--Implementado con ajax-->
									{!!Form::open(['route' => ['pedidos.destroy',$orden->id],'method' => 'PUT'])!!}
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
										<a 
											href="#" 
											title="Ver detalle de la orden"
											class="btn btn-primary btn-detalle-pedido" 
											data-id="{{ $orden->id }}"
											data-path="{{ route('pedidos.getItems') }}"
											data-toggle="modal"
											data-target="#myModal"
											data-token="{{ csrf_token() }}">
											<i class="fa fa-external-link"></i>
										</a>

										<button onClick="return confirm('¿Quiere anular este pedido?')" class="btn btn-danger" title="Anular orden">
											<i class="fa fa-trash-o"></i>
										</button>
										{!!Form::close()!!}
								</td>
								<td>{{Date::parse($orden->created_at)->format('l j \d\e\ F \d\e\ Y')}}</td>
								<td>{{Date::parse($orden->created_at)->format('H:i:s')}}</td>
								<td>{{ $orden->users->name.' '.$orden->users->last_name }}</td>
								<td>{{ $orden->users->username }}</td>
								<td>{{ $orden->subtotal }}</td>
								<td>{{ $orden->envio }}</td>
								<td>{{ $orden->subtotal + $orden->envio }}</td>
								<td>{{ $orden->estado }}</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<div align="center">
				{{ $ordenes->links() }}
			</div>
		</div>
	</div>

	@include('admin.vistaparcial.modal-detalle-pedido')
	@section('script')
		{!!Html::script('admin/js/main.js')!!}
	@endsection
@stop