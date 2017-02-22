@extends('admin.template')
@section('title','Editar Usuario - Panel de administración')
@section('content')
	<div class="container" align="center">
		<div class="page-header">
			<h1><i class="fa fa-shopping-cart"></i>
				Usuarios <small>[Editar Usuario]</small>
			</h1>
		</div>

		<div class="row">
			<div class="col-md-offset-3 col-md-6">
				<div class="page">
					@if(count($errors)>0)
						@include('admin.vistaparcial.errores')
					@endif

					{!!Form::model($username,array('route' => array('users.update',$username),'method' => 'PUT'))!!}
						{{ csrf_field() }}
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
							{!!Form::label('tipo','Tipo de Usuario: ')!!}
							{!!Form::select('type',['SuperUsuario' => 'SuperUsuario','Administrador' => 'Administrador','Invitado'=>'Invitado' ],$username->type,['class' => 'form-control','required'])!!}
						</div>
	
						<div class="form-group">
							{!!Form::label('direccion','Direccion: ')!!}
							{!!Form::textarea('direccion',null,['class'=>'form-control','placeholder'=>'Ingresa tu direccion...','required'])!!}
						</div>	

						<div class="form-group">
							{!!Form::label('visible','Visible: ')!!}
							<input type="checkbox" name="activo" {{ $username->activo == 1 ? "checked='checked'" : '' }}>
						</div><!--Si el producto esta visible o no-->
						<fieldset>
                            <legend>Cambiar password:</legend>
							<div class="form-group">
								{!!Form::label('password','Password: ')!!}
								{!!Form::password('password',['class' => 'form-control','placeholder' => 'Ingresa tu contraseña'])!!}
							</div>

							<div class="form-group">
								{!!Form::label('password_confirmation','Confirmar Password: ')!!}
								{!!Form::password('password_confirmation',['class' => 'form-control','placeholder' => 'Repite la contraseña'])!!}
							</div>
						</fieldset>

						<div class="form-group">
							{!!Form::submit('Actualizar',['class'=> 'btn btn-primary'])!!}
							<a href="{{ route('users.index') }}" class="btn btn-warning">Cancelar</a>
						</div>
						
					{!!Form::close()!!}
				</div>
			</div>
		</div>
	</div>
@stop