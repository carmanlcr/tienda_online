@extends('admin.template')
@section('title','Panel de administración - Productos')
@section('content')

<div class="container" align="center">
	<div class="page-header">
		<h1>
			<i class="fa fa-shopping-cart"></i> PRODUCTOS <a href="{{ route('productos.create') }}" class="btn btn-warning"><i class="fa fa-plus-circle"></i> Agregar</a>
		</h1>

	</div>

	<div class="page">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover">
				<thead>
						<tr>
							<th>Acciones</th>
							<th>Imagen</th>
							<th>Nombre</th>
							<th>Categoria</th>
							<th>Extracto</th>
							<th>Precio</th>
							<th>Visible</th>
						</tr>
				</thead>
				<tbody>
					@foreach($productos as $producto)
						<tr>
							<td >							
								<!--Para eliminar hacemos lo siguiente-->
								{!!Form::open(['route' => ['productos.destroy', $producto->slug],'method' => 'DELETE'])!!}
									<a href="{{ route('productos.edit',$producto->slug) }}" class="btn btn-primary" title="Editar categoria"><i class="fa fa-pencil-square"></i></a>
									<button onClick="return confirm('¿Quiere eliminar este registro?')" class="btn btn-danger" title="Eliminar categoria">
										<i class="fa fa-trash"></i>
									</button>
								{!!Form::close()!!}	
							</td>
							<td><img src="{{ $producto->imagen }}" width="50"></td>
							<td>{{ $producto->nombre }}</td>
							<td>{{ $producto->categorias->nombre }}</td>
							<td>{{ $producto->descripcion_corta }}</td>
							<td>{{ $producto->precio }}</td>
							<td>{{ $producto->activo == 1 ? 'Si' : 'No' }}</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		<div align="center">
			{{ $productos->links() }}
		</div>
	</div>
</div>

@stop