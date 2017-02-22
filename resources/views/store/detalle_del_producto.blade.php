@extends('store.template')

	@section('content')
	<div class="container text-center">
		<div class="page-header">
			<h1><i class="fa fa-shopping-cart"></i>Detalle del producto</h1>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="bloque-del-producto">
					<img src="{{ $producto->imagen }}">
				</div>
			</div>
			<div class="col-md-6">
				<div class="bloque-del-producto">
					<h3>{{ $producto->nombre }}</h3><hr>
					<div class="informacion-del-producto panel">
						<p>{{ $producto->descripcion }}</p>
						<h3><span class="label label-success">Precio: {{ $producto->precio }} Bs.</span> </h3>
						<p>
						<a class="btn btn-warning btn-block" href="{{ route('agregar_carrito',$producto->slug) }}"> La quiero <i class="fa fa-cart-plus fa-2x"></i></a>
						</p>
					</div>
				</div>
			</div>
		</div><hr>
			
		<p>
			<a href="{{ route('home') }}" class="btn btn-primary">
				<i class="fa fa-chevron-circle-left"></i> 
				Volver
			</a>
		</p>
	</div>

	@stop