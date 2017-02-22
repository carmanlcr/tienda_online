<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand main-title" href="{{ route('home') }}">LAMS</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <p class="navbar-text texto-menu">Mi primera tienda de prueba</p>
      <ul class="nav navbar-nav navbar-right">
        @if(Auth::guest())
        @else
          <li><a href="{{ route('mostrar_carrito') }}"><i class="fa fa-shopping-cart"></i></a></li>
        @endif      
        <li><a href="#">Conocenos</a></li>
        <li><a href="#">Contactanos</a></li>
        @include('store.condiciones.iconousuario')
      </ul>
    </div>
  </div>
</nav>