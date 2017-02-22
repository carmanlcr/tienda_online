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

					{!!Form::open(['route'=>'productos.store'])!!}
						<div class="form-group">
							{!!Form::label('categorias','Categoria: ',['class'=>'control-label','for' => 'categorias_id'])!!}
							{!!Form::select('categorias_id',$categorias, null,['class'=>'form-control','autofocus','required'])!!}
						</div>

						<div class="form-group">
							{!!Form::label('nombre','Nombre: ')!!}
							{!!Form::text('nombre',null,['class'=>'form-control','placeholder' =>'Ingresa el nombre...','required'])!!}
						</div>

						<div class="form-group">
							{!!Form::label('descripcion','Descripcion: ')!!}
							{!!Form::textarea('descripcion',null,['class'=>'form-control','placeholder'=>'Ingresa tu direccion','required'])!!}
						</div>

						<div class="form-group">
							{!!Form::label('precio','Precio: ',['for'=>'precio'])!!}
							{!!Form::text('precio',null,['class'=>'form-control','placeholder' =>'Ingresa el precio','required'])!!}
						</div>

						<div class="form-group">
							{!!Form::label('imagen','Imagen(URL): ')!!}
							{!!Form::text('imagen',null,['class'=>'form-control','placeholder' =>'Ingresa el url...','required'])!!}
						</div>
							
						<div class="form-group">
							{!!Form::submit('Guardar',['class'=> 'btn btn-primary'])!!}
							<a href="{{ route('productos.index') }}" class="btn btn-warning">Cancelar</a>
						</div>
						
					{!!Form::close()!!}
				</div>
			</div>
		</div>
	</div>
@stop