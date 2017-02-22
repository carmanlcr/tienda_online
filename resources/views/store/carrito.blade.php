@extends('store.template')

	@section('content')
		
		<div class="container text-center">
			<div class="page-header">
				<h1><i class="fa fa-shopping-cart"></i>Carrito de compras</h1>
			</div>
			
			<div class="table-cart">
				@if(count($carrito))
					<p>
						<a href="{{ route('vaciar_carrito') }}" class="btn btn-danger">
							<i class="fa fa-trash"> Vaciar carrito</i>
						</a>
					</p>
					<div class="table-responsive">
						<table class="table table-striped table-hover table-bordered">
							<thead>
								<tr>
									<th>Imagen</th>
									<th>Producto</th>
									<th>Precio</th>
									<th>Cantidad</th>
									<th>Subtotal</th>
									<th>Eliminar</th>
								</tr>
							</thead>
							<tbody>
								@foreach($carrito as $item)
									<tr>
										<td><img src="{{ $item->imagen }}" alt=""></td>
										<td>{{ $item->nombre }}</td>
										<td>{{ $item->precio }}</td>
										<td>
											<input type="number" 
													min="1" 
													max="20"
													value="{{ $item->cantidad }}"
													id="producto_{{ $item->id }}"
											>
											<a href="#" class="btn btn-warning btn-update-item" 
												data-href="{{ route('actualizar_carrito',$item->slug) }}" 
												data-id="{{ $item->id }}">
												<i class="fa fa-refresh"></i>
											</a>
										</td>
										<td>{{ $item->precio * $item->cantidad }} Bs.</td>
										<td>
											<a href="{{ route('eliminar_del_carrito',$item->slug) }}" class="btn btn-danger">
												<i class="fa fa-remove"></i>
											</a>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table><hr>
						<h3><span class="label label-success">Total: {{ $total }} Bs.</span></h3>
					</div><hr>
					<p>
						<a href="{{ route('home') }}" class="btn btn-primary">
							<i class="fa fa-chevron-circle-left"></i> 
							Seguir comprando
						</a>
						<a href="{{ route('detalle_compra') }}" class="btn btn-success">
							Continuar <i class="fa fa-chevron-circle-right"></i> 
						</a>
					</p>
				@else
					<h3><span class="label label-warning">No hay elementos en el carrito :(</span></h3>
				@endif
			</div>
		</div>
	@endsection
	@section('script')
		{!!Html::script('js/main.js')!!}
	@stop