@extends ('layout')

@section ('content')
<div class="container">
	<div class="row text-center">
	<h3>Artículos</h3>
		@if(Session::has('error'))
            <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
                {{ Session::get('error') }}
              </ul>
            </div>
        @endif 
		<table class="table table-bordered table-hover" style="font-size: 12px;">
			<thead>
				<tr>
			  		<th>Código Articulo</th>
			  		<th>Nombre</th>
			  		<th>Rubro</th>
			 		<th>Descripcion</th>
			 		<th>Alto</th>
			 		<th>Largo</th>
			 		<th>Ancho o Prof.</th>
			 		<th>Editar</th>
			  		<th>Eliminar</th>
				</tr>
			</thead>
	  		<tbody>
	  			@foreach($articulos as $articulo)
				<tr>
					<td>{{ $articulo->id_articulo }}</td>
					<td>{{ $articulo->nombre }}</td>
					<td>{{ $articulo->rubro }}</td>
					<td>{{ $articulo->descripcion }}</td>
					<td>{{ $articulo->alto }}</td>
					<td>{{ $articulo->largo }}</td>
					<td>{{ $articulo->ancho_prof }}</td>
			 		<td><a href="{{ action('ArticulosController@getEditArticulo', $articulo->id_articulo) }}"><span class="glyphicon glyphicon-pencil"></a></span></td>
					<td><a href="{{ action('ArticulosController@destroy', $articulo->id_articulo) }}" <span class="glyphicon glyphicon-remove"></span></a></td>
				</tr>
				@endforeach
	  		</tbody>	
		</table>
	</div>
</div>	
@stop
