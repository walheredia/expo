@extends ('layout')

@section ('content')
<div class="container">
	<div class="row text-center">
	<h3>Clientes</h3>
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
			  		<th>ID Cliente</th>
			  		<th>Nombres</th>
			 		<th>Apellido</th>
			  		<th>Tipo Doc</th>
			  		<th>Documento</th>
			  		<th>E-mail</th>
			  		<th>Dirección (Calle)</th>
			  		<th>Dir. (Núm)</th>
			  		<th>Dir. (Piso)</th>
			  		<th>Localidad</th>
			  		<th>Teléfono</th>
			  		<th>Celular</th>
			  		<th>Editar</th>
			  		<th>Eliminar</th>
				</tr>
			</thead>
	  		<tbody>
	  			@foreach($clients as $client)
				<tr>
					<td>{{ $client->id }}</td>
					<td>{{ $client->nombres }}</td>
			 		<td>{{ $client->apellido }}</td>
			 		@if($client->tipo_doc === 1)
			 			<td>DNI</td>
			 		@elseif($client->tipo_doc === 2)
			 			<td>LC</td>
			 		@else
			 			<td>LE</td>
			 		@endif
			 		<td>{{ $client->documento }}</td>
			 		<td>{{ $client->email }}</td>
			 		<td>{{ $client->calle }}</td>
			 		<td>{{ $client->num }}</td>
			 		<td>{{ $client->piso }}</td>
			 		@if($client->localidad === 1)
			 			<td>San Nicolás</td>
			 		@elseif($client->localidad === 2)
			 			<td>Ramallo</td>
			 		@else
			 			<td>Rosario</td>
			 		@endif
			 		<td>{{ $client->telefono }}</td>
			 		<td>{{ $client->celular }}</td>
			 		<td><a href="{{ action('ClientesController@getEditCliente', $client->id) }}"><span class="glyphicon glyphicon-pencil"></a></span></td>
					<td><a href="{{ action('ClientesController@destroy', $client->id) }}" <span class="glyphicon glyphicon-remove"></span></a></td>
				</tr>
				@endforeach
	  		</tbody>	
		</table>
	</div>
</div>	
@stop
