<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand main-title" href="#">LAMS</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <a href ="{{ route('admin.home') }}" class="navbar-text texto-menu"><i class="fa fa-dashboard"> Panel de Administración </i> | </a> 
      <a href="{{ route('home') }}" class="navbar-text texto-menu"> Inicio </a>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="{{ route('mostrar_carrito') }}"><i class="fa fa-shopping-cart"></i></a></li>
        <li><a href="{{ route('categorias.index') }}">Categorias</a></li>
        <li><a href="{{ route('productos.index') }}">Productos</a></li>
        <li><a href="{{ route('pedidos.index') }}">Pedidos</a></li>
        <li><a href="{{ route('users.index') }}">Usuarios</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-user"></i> {{ Auth::user()->name.' '.Auth::user()->last_name }}<span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
                <li><a href="#">Perfil</a><hr>
                <li><a href="{{route('logout')}}">Cerrar Sesión</a>
            </ul> 
          </li>
      </ul>
    </div>
  </div>
</nav>