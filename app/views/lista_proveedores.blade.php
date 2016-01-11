@extends ('layout')

@section ('content')
<div class="container">
	<div class="row text-center">
	<h3>Proveedores</h3>
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
			  		<th>Nom. O Raz. Social</th>
			  		<th>Nom. Contacto Directo</th>
			  		<th>Dirección</th>
			  		<th>Localidad</th>
			  		<th>E-mail</th>
			  		<th>Teléfono</th>
			  		<th>Nextel</th>
			  		<th>Dirección Web</th>
			 		<th>Editar</th>
			  		<th>Eliminar</th>
				</tr>
			</thead>
	  		<tbody>
	  			@foreach($proveedores as $p)
				<tr>
					<td>{{ $p->nom_raz }}</td>
					<td>{{ $p->contacto }}</td>
					<td>{{ $p->direccion }}</td>
					<td>{{ $p->localidad }}</td>
					<td>{{ $p->email }}</td>
					<td>{{ $p->tel }}</td>
					<td>{{ $p->nextel }}</td>
					<td>{{ $p->web }}</td>
			 		<td><a href="{{ action('ClientesController@getEditCliente', $p->id_proveedor) }}"><span class="glyphicon glyphicon-pencil"></a></span></td>
					<td><a href="{{ action('ClientesController@destroy', $p->id_proveedor) }}" <span class="glyphicon glyphicon-remove"></span></a></td>
				</tr>
				@endforeach
	  		</tbody>	
		</table>
	</div>
</div>	
@stop
