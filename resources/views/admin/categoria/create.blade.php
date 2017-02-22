@extends('admin.template')
@section('title','Agregar Categoria - Panel de administración')
@section('content')
	<div class="container" align="center">
		<div class="page-header">
			<h1><i class="fa fa-shopping-cart"></i>
				Categorias <small>[Crear Categorias]</small>
			</h1>
		</div>

		<div class="row">
			<div class="col-md-offset-3 col-md-6">
				<div class="page">
					@if(count($errors)>0)
						@include('admin.vistaparcial.errores')
					@endif

					{!!Form::open(['route'=>'categorias.store'])!!}
						<div class="form-group">
							{!!Form::label('nombre','Nombre: ')!!}
							{!!Form::text('nombre',null,['class'=>'form-control','placeholder' =>'Ingresa el nombre...','autofocus','required'])!!}
						</div>

						<div class="form-group">
							{!!Form::label('descripcion','Descripcion: ')!!}
							{!!Form::textarea('descripcion',null,['class'=>'form-control','placeholder'=>'Ingresa tu direccion','required'])!!}
						</div>

						<div class="form-group">
							{!!Form::label('color','Color: ')!!}
							<input type="color" name="color" class="form-control">
						</div>

						<div class="form-group">
							{!!Form::submit('Guardar',['class'=> 'btn btn-primary'])!!}
							<a href="{{ route('categorias.index') }}" class="btn btn-warning">Cancelar</a>
						</div>
						
					{!!Form::close()!!}
				</div>
			</div>
		</div>
	</div>
@stop