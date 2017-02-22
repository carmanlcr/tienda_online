@extends('store.template')
	@section('css')
		{!!Html::style('https://fonts.googleapis.com/css?family=Fredoka+One|Source+Serif+Pro')!!}
	@endsection

	@section('content')
		<div class="container text-center">
			<div class="page-header">
				<h1><i class="fa fa-shopping-cart"></i> Detalle del producto</h1>
			</div>

			<div class="page">
				<div class="table-responsive">
					<h3>Datos del usuario</h3>
					<table class="table table-striped table-hover table-bordered">
						<tr><td class="success text-col">Nombre: </td><td class="info text-carrito">{{ Auth::user()->name.' '.Auth::user()->last_name }}</td></tr>
						<tr><td class="success text-col">Usuario: </td><td class="info text-carrito">{{ Auth::user()->username }}</td></tr>
						<tr><td class="success text-col">Correo: </td><td class="info text-carrito">{{ Auth::user()->email }}</td></tr>
						<tr><td class="success text-col">Direccion: </td><td class="info text-carrito"> {{ Auth::user()->direccion }} </td></tr>
					</table>
				</div>
				<div class="table-responsive">
					<h3>Datos del pedido</h3>
					<table class="table table-striped table-hover table-bordered">
						<tr class= "text-col">
							<td>Producto</td>
							<td>Precio</td>
							<td>Cantidad</td>
							<td>Subtotal</td>
						</tr>
						@foreach($carrito as $item)
							<tr class="active text-carrito">
								<td >{{ $item->nombre }}</td>
								<td >{{ $item->precio }}</td>
								<td >{{ $item->cantidad }}</td>
								<td >{{ $item->precio * $item->cantidad }}</td>
							</tr>
						@endforeach
					</table><hr>
					<h3>
						<span class="label label-success">Total: {{$total}}</span>
					</h3><hr>
					<p>
						<a href="{{ route('mostrar_carrito') }}" class="btn btn-primary">
							<i class="fa fa-chevron-circle-left"></i> Regresar
						</a>
						<a href="{{ route('payment') }}" class="btn btn-warning">
							Pagar con <i class="fa fa-paypal"></i>  
						</a>
					</p>
				</div>
			</div>
		</div>

	@stop