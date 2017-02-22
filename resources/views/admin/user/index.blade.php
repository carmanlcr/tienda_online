@extends('admin.template')

@section('title','Panel de Administración - Usuarios')

@section('content')
	<div class="container" align="center">
		<div class="page-header">
			<h1><i class="fa fa-user"></i>
				USUARIOS
				<a href="{{ route('users.create') }}" class="btn btn-warning">
					<i class="fa fa-plus-circle"></i> Usuario
				</a>
			</h1>
		</div>

		<div class="page">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<th>Acciones</th>
							<th>Nombre</th>
							<th>Direccion</th>
							<th>Username</th>
							<th>Correo</th>
							<th>Tipo</th>
							<th>Activo</th>
						</tr>
					</thead>
					<tbody>
						@foreach($usuarios as $usuario)
						<tr>
							<td>
								{!!Form::open(['route' => ['users.destroy', $usuario],'method' => 'DELETE'])!!}
									<a href="{{ route('users.edit',$usuario) }}" class="btn btn-primary" title="Editar Usuario"><i class="fa fa-pencil-square"></i></a>
									<button onClick="return confirm('¿Quiere eliminar este usuario')" class="btn btn-danger" title="Eliminar usuario">
										<i class="fa fa-trash"></i>
									</button>
								{!!Form::close()!!}	
							</td>
							<td>{{ $usuario->name.' '.$usuario->last_name }}</td>
							<td>{{ $usuario->direccion }}</td>
							<td>{{ $usuario->username }}</td>
							<td>{{ $usuario->email }}</td>
							<td>{{ $usuario->type }}</td>
							<td>{{ $usuario->activo == 1 ? "Si" : "No"}}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<div align="center">
				{{ $usuarios->links() }}
			</div>
		</div>
	</div>
@stop