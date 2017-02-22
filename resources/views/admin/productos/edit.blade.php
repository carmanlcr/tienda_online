@extends('admin.template')
@section('title','Editar Categoria - Panel de administración')
@section('content')
	<div class="container" align="center">
		<div class="page-header">
			<h1><i class="fa fa-shopping-cart"></i>
				Productos <small>[Editar Productos]</small>
			</h1>
		</div>

		<div class="row">
			<div class="col-md-offset-3 col-md-6">
				<div class="page">
					@if(count($errors)>0)
						@include('admin.vistaparcial.errores')
					@endif
					{!!Form::model($producto,array('route' => array('productos.update',$producto->slug),'method' => 'PUT'))!!}
						<div class="form-group">
							{!!Form::label('nombre','Nombre: ')!!}
							{!!Form::text('nombre',null,['class'=>'form-control','placeholder' =>'Ingresa el nombre...','autofocus','required'])!!}
						</div>

						<div class="form-group">
							{!!Form::label('descripcion','Descripcion: ')!!}
							{!!Form::textarea('descripcion',null,['class'=>'form-control','placeholder'=>'Ingresa tu direccion','required'])!!}
						</div>

						<div class="form-group">
							{!!Form::label('precio','Precio: ')!!}
							{!!Form::text('precio',null,['class'=>'form-control','required'])!!}
						</div>

						<div class="form-group">
							{!!Form::label('imagen','Imagen(URL): ')!!}
							{!!Form::text('imagen',null,['class'=>'form-control','required'])!!}
						</div>

						<div class="form-group">
                           {!!Form::label('categorias','Categoria: ',['class'=>'control-label','for' => 'categorias_id'])!!}
                            {!! Form::select('categorias_id', $categorias, null, ['class' => 'form-control']) !!}
                        </div>

						<div class="form-group">
							{!!Form::label('visible','Visible: ')!!}
							<input type="checkbox" name="activo" {{ $producto->activo == 1 ? "checked='checked'" : '' }}>
						</div><!--Si el producto esta visible o no-->

						<div class="form-group">
							{!!Form::submit('Actualizar',['class'=> 'btn btn-primary'])!!}
							<a href="{{ route('productos.index') }}" class="btn btn-warning">Cancelar</a>
						</div>
						
					{!!Form::close()!!}
				</div>
			</div>
		</div>
	</div>
@stop