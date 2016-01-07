@extends ('layout')

@section ('content')
<div class="container">
	<div class="row text-center">
	<h3>Localidades</h3>
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
			  		<th>ID Localidad</th>
			  		<th>Nombre</th>
			 		<th>Editar</th>
			  		<th>Eliminar</th>
				</tr>
			</thead>
	  		<tbody>
	  			@foreach($localidades as $localidad)
				<tr>
					<td>{{ $localidad->id_localidad }}</td>
					<td>{{ $localidad->localidad }}</td>
			 		<td><a href="{{ action('ClientesController@getEditCliente', $localidad->id_localidad) }}"><span class="glyphicon glyphicon-pencil"></a></span></td>
					<td><a href="{{ action('ClientesController@destroy', $localidad->localidad) }}" <span class="glyphicon glyphicon-remove"></span></a></td>
				</tr>
				@endforeach
	  		</tbody>	
		</table>
	</div>
</div>	
@stop
