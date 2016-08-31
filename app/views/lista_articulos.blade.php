@extends ('layout')

@section ('content')
<div class="container">
	<div class="row text-center">
	<h3>Artículos</h3>
		@if(isset($error))
            <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
                {{ Session::get($error) }}
                {{$error}}
              </ul>
            </div>
        @endif
        <form action="{{ URL::asset('lista_articulos') }}" method="POST" class="navbar-form navbar-right" role="search">
	      <div class="form-group">
	        <input type="text" class="form-control" placeholder="Buscar" name="nombre" id="nombre">
	      </div>
	      <button type="submit" class="btn btn-success">Buscar</button>
	    </form>
        <form class="form-vertical" role="form">
        	<table class="table table-bordered table-hover" style="font-size: 12px;">
			<thead>
				<tr>
			  		<th>Cód. Art.</th>
			  		<th>Nombre</th>
			  		<th>Rubro</th>
			 		<th>Descripcion</th>
			 		<th>Proveedor</th>
			 		<th>Alto</th>
			 		<th>Largo</th>
			 		<th>Ancho/Prof.</th>
			 		<th>Prec. Vta.</th>
			 		<th>Sucursal</th>
			 		<th>Stock</th>
			 		<th>Editar Stock</th>
			 		<th>Editar Artículo</th>
			  		<th>Elim.</th>
				</tr>
			</thead>
	  		<tbody>
	  			@foreach($articulos as $articulo)
				<tr>
					<td>{{ $articulo->id_articulo }}</td>
					<td>{{ $articulo->nombre }}</td>
					<td>{{ $articulo->rubro }}</td>
					<td>{{ $articulo->descripcion }}</td>
					<td>{{ $articulo->nom_raz }}</td>
					<td>{{ $articulo->alto }}</td>
					<td>{{ $articulo->largo }}</td>
					<td>{{ $articulo->ancho_prof }}</td>
					<td>{{ $articulo->precio_compra }}</td>
					<td>{{ $articulo->sucursal }}</td>
					<td>{{ $articulo->cantidad }}</td>
			 		<td><a href="{{ action('StockController@getEditStock', $articulo->id_articulo) }}"><span class="glyphicon glyphicon-edit"></a></span></td>
			 		<td><a href="{{ action('ArticulosController@getEditArticulo', $articulo->id_articulo) }}"><span class="glyphicon glyphicon-pencil"></a></span></td>
					<td><a href="{{ action('ArticulosController@destroy', $articulo->id_articulo) }}" <span class="glyphicon glyphicon-remove"></span></a></td>
				</tr>
				@endforeach
	  		</tbody>	
		</table>
		<div class="row text-left">
		<?php echo $articulos->links(); ?>
		</div>
        </form> 
		
	</div>
	
</div>	
@stop
