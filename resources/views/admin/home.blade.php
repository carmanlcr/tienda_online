@extends('admin.template')
@section('title','Panel de Administración')

@section('content')
	
	<div class="container" align="center">
		<div class="page-header">
			<h1><i class="fa fa-rocket"></i> Panel de administración - Dashboard</h1>
		</div>

		<h2> Bienvenido(a) {{ Auth::user()->username }} al panel de administración de LAMS</h2>

		<div class="row">
			<div class="col-md-6">
				<div class="panel">
					<i class="fa fa-list-alt icon-home"></i>
					<a href="{{ route('categorias.index') }}" class="btn btn-warning btn-block btn-home-admin">Categorias</a>
				</div>
			</div>
			<div class="col-md-6">
				<div class="panel">
					<i class="fa fa-shopping-cart icon-home"></i>
					<a href="{{ route('productos.index') }}" class="btn btn-warning btn-block btn-home-admin">Productos</a>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="panel">
					<i class="fa fa-cc-paypal icon-home"></i>
					<a href="{{ route('pedidos.index') }}" class="btn btn-warning btn-block btn-home-admin">Pedidos</a>
				</div>
			</div>
			<div class="col-md-6">
				<div class="panel">
					<i class="fa fa-users icon-home"></i>
					<a href="{{ route('users.index') }}" class="btn btn-warning btn-block btn-home-admin">Usuarios</a>
				</div>
			</div>
		</div>
	</div>

@stop