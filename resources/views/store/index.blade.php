@extends('store.template')
	@section('content')	
	@include('store.vistaparcial.slider')
		<div class="container text-center">
			<div id="productos">
				@foreach ($productos as $producto) 
						<div class="producto white-panel">
							<h3>{{ $producto->nombre }}</h3><hr>
							<img src="{{ $producto->imagen }}" width='200'>
							<div class="producto-info panel">
								<p>{{ $producto->descripcion_corta }}</p>
								<h3><span class="label label-success">Precio: {{ $producto->precio }} Bs.</span> </h3>
								<p>
									<a class="btn btn-warning" href="{{ route('agregar_carrito',$producto->slug) }}"><i class="fa fa-cart-plus"></i> La quiero</a>
									<a class="btn btn-primary" href="{{route('detalle_del_producto', $producto->slug)}}"><i class="fa fa-chevron-circle-right"></i> Leer Mas</a>
								</p>
							</div>
						</div>
				@endforeach
			</div>
			<div align="center">
					{{ $productos->links() }}
			</div>
		</div>
	@endsection
	@section('script')
		{!!Html::script('js/main.js')!!}
	@stop
