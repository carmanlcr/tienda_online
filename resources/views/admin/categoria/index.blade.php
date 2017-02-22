@extends('admin.template')
@section('title','Panel de administración - Categorias')
@section('content')

<div class="container" align="center">
	<div class="page-header">
		<h1>
			<i class="fa fa-shopping-cart"></i> CATEGORIAS <a href="{{ route('categorias.create') }}" class="btn btn-warning"><i class="fa fa-plus-circle"></i> Agregar</a>
		</h1>

	</div>

	<div class="page">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover">
				<thead>
						<tr>
							<th>Acciones</th>
							<th>Nombre</th>
							<th>Descripcion</th>
							<th>Color</th>
						</tr>
				</thead>
				<tbody>
					@foreach($categorias as $categoria)
						<tr>
							<td >
								
								<!--Para eliminar hacemos lo siguiente-->
								{!!Form::open(['route' => ['categorias.destroy',$categoria],'method' => 'DELETE'])!!}
									<a href="{{ route('categorias.edit',$categoria) }}" class="btn btn-primary" title="Editar categoria"><i class="fa fa-pencil-square"></i></a>
									<button onClick="return confirm('Si elimina esta categoria eliminará los productos que pertenezcan a esta categoria, ¿Quiere eliminar este registro?')" class="btn btn-danger" title="Eliminar categoria">
										<i class="fa fa-trash"></i>
									</button>
								{!!Form::close()!!}	
							</td>
							<td>{{ $categoria->nombre }}</td>
							<td>{{ $categoria->descripcion }}</td>
							<td>{{ $categoria->color }}</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		<div align="center">
			{{ $categorias->links() }}
		</div>
	</div>
</div>

@stop