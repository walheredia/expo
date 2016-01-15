<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Expo del Mueble...</title>
	<link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('css/bootstrap-theme.min.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('css/vendor/jquery-ui-1.10.3.custom.min.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('css/escuela.css') }}">
	<style>
		table tr {
			text-align: left;
			margin: 10px;
		}
	</style>

</head>
<body>
	<nav class="navbar navbar-inverse" role="navigation">
		<div class="navbar-header">
	    	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	      		<span class="sr-only">Toggle navigation</span>
	      		<span class="icon-bar"></span>
	      		<span class="icon-bar"></span>
	      		<span class="icon-bar"></span>
	    	</button>
	    	<a class="navbar-brand" href="{{ URL::asset('') }}">Inicio</a>
	  	</div>
	  	@if (!Auth::check())
	  		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	  			<ul class="nav navbar-nav navbar-right">
		  		 	<li class="dropdown">
				        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><strong>Opciones</strong> <b class="caret"></b></a>
				        <ul class="dropdown-menu">
					        <li><a href="{{ URL::asset('login') }}">Ingresar</a></li>
				        </ul>
			      	</li>
			    </ul>
	  		</div>
	  	@else
		  	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		  		 <ul class="nav navbar-nav">
		  		 	<li class="dropdown">
				        <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Clientes <b class="caret"></b></a>
				        <ul class="dropdown-menu">
				  		 	<li><a href="{{ URL::asset('register_cliente') }}">Registrar un nuevo Cliente</a></li>
				  		 	<li><a href="{{ URL::asset('lista_clientes') }}">Listado de Clientes</a></li>
				        </ul>
			      	</li>
			      	<li class="dropdown">
				        <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Artículos <b class="caret"></b></a>
				        <ul class="dropdown-menu">
				  		 	<li><a href="{{ URL::asset('register_articulo') }}">Registrar un nuevo Artículo</a></li>
				  		 	<li><a href="{{ URL::asset('lista_articulos') }}">Listado de Artículos</a></li>
				        </ul>
			      	</li>
			      	<li class="dropdown">
				        <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Proveedores <b class="caret"></b></a>
				        <ul class="dropdown-menu">
				  		 	<li><a href="{{ URL::asset('register_proveedor') }}">Registrar un nuevo Proveedor</a></li>
				  		 	<li><a href="{{ URL::asset('lista_proveedores') }}">Listado de Proveedores</a></li>
				        </ul>
			      	</li>
			      	<li class="dropdown">
				        <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Rubros/Localidades <b class="caret"></b></a>
				        <ul class="dropdown-menu">
				  		 	<li><a href="{{ URL::asset('register_rubro') }}">Registrar un nuevo Rubro</a></li>
				  		 	<li><a href="{{ URL::asset('lista_rubros') }}">Listar Rubros</a></li>
				  		 	<li><a href="{{ URL::asset('register_localidad') }}">Registrar una nueva Localidad</a></li>
				  		 	<li><a href="{{ URL::asset('lista_localidades') }}">Listar Localidades</a></li>
				        </ul>
			      	</li>
		  		 </ul>
		  		 <ul class="nav navbar-nav navbar-right">
		  		 	<li class="dropdown">
				        <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Opciones del usuario <strong>{{ Auth::user()->username; }}</strong> <b class="caret"></b></a>
				        <ul class="dropdown-menu">
				  		 	<li><a href="{{ URL::asset('register') }}">Registrar un nuevo usuario</a></li>
				  		 	<li><a href="{{ URL::asset('lista_usuarios') }}">Listado de usuarios</a></li>
				        	<li><a href="{{ action('AuthController@logOut') }}">Cerrar Sesión</a></li>
				        </ul>
			      	</li>
			    </ul>
		  	</div>
	  	@endif
	  	
	</nav>

	@yield('content')
	
	<script src="{{ URL::asset('js/jquery-2.0.3.min.js') }}"></script>
	<script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
	<script src="{{ URL::asset('js/jquery-ui-1.10.3.custom.min.js') }}"></script>
	<script src="{{ URL::asset('js/main.js') }}"></script>
</body>
</html>