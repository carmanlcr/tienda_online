<li class="dropdown">
	@if(Auth::check())<!--Si hay un usuario conectado muestra las siguientes opciones-->
		<a href="route('home')" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-user"></i> {{ Auth::user()->name.' '.Auth::user()->last_name }}<span class="caret"></span></a>
        <ul class="dropdown-menu" role="menu">
			@if(Auth::user()->type !== "Invitado") <!--Si el usuario es SuperUsuario o Administrador tendrá permisos para ir al panel-->
				<li><a href="{{ route('admin.home') }}">Panel de Administración</a>
			@endif 
			<li><a href="#">Perfil</a><hr>
			<li><a href="{{route('logout')}}">Cerrar Sesión</a>
		</ul> 
	@else<!--Si no hay algun usuario logueado le muestra la opción para loguearse-->
		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-user"></i> <span class="caret"> </span></a>
        <ul class="dropdown-menu" role="menu">
			<li><a href="{{ route('login') }}">Iniciar Sesión</a></li>
			<li><a href="{{ route('register') }}">Registrate</a></li>		
		</ul> 
	@endif
        
</li>
