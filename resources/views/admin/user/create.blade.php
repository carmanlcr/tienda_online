@extends('admin.template')
@section('title','Agregar Usuario - Panel de administración')
@section('content')
	<div class="container" align="center">
		<div class="page-header">
			<h1><i class="fa fa-shopping-cart"></i>
				Usuarios <small>[Crear Usuarios]</small>
			</h1>
		</div>

		<div class="row">
			<div class="col-md-offset-3 col-md-6">
				<div class="page">
					@if(count($errors)>0)
						@include('admin.vistaparcial.errores')
					@endif

					{!!Form::open(['route'=>'users.store'])!!}
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="form-group">
							{!!Form::label('nombre','Nombre: ')!!}
							{!!Form::text('name',null,['class'=>'form-control','placeholder' =>'Ingresa el nombre...','required','autofocus'])!!}
						</div>

						<div class="form-group">
							{!!Form::label('apellido','Apellido: ')!!}
							{!!Form::text('last_name',null,['class'=>'form-control','placeholder'=>'Ingresa tu apellido...','required'])!!}
						</div>
							
						<div class="form-group">
							{!!Form::label('email','Email: ')!!}
							{!!Form::email('email',null,['class' => 'form-control','placeholder' =>'Ingresa tu email','required'])!!}
						</div>

						<div class="form-group">
							{!!Form::label('usuario','Username: ')!!}
							{!!Form::text('username',null,['class'=>'form-control','placeholder' =>'Ingresa tu username...','required'])!!}
						</div>

						<div class="form-group">
							{!!Form::label('password','Password: ')!!}
							{!!Form::password('password',['class' => 'form-control','placeholder' => 'Ingresa tu contraseña','required'])!!}
						</div>

						<div class="form-group">
							{!!Form::label('password_confirmation','Confirmar Password: ')!!}
							{!!Form::password('password_confirmation',['class' => 'form-control','placeholder' => 'Repite la contraseña','required'])!!}
						</div>

						<div class="form-group">
							{!!Form::label('tipo','Tipo de Usuario: ')!!}
							{!!Form::select('type',['SuperUsuario' => 'SuperUsuario','Administrador' => 'Administrador','Invitado' => 'Invitado'],null,['class' => 'form-control','required'])!!}
						</div>
	
						<div class="form-group">
							{!!Form::label('direccion','Direccion: ')!!}
							{!!Form::textarea('direccion',null,['class'=>'form-control','placeholder'=>'Ingresa tu direccion...','required'])!!}
						</div>	
									
						<div class="form-group">
							{!!Form::submit('Guardar',['class'=> 'btn btn-primary'])!!}
							<a href="{{ route('users.index') }}" class="btn btn-warning">Cancelar</a>
						</div>
						
					{!!Form::close()!!}
				</div>
			</div>
		</div>
	</div>
@stop