@extends ('layout')

@section ('content')
<div class="container">
	<div class="row text-center">
	<h3>Rubros</h3>
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
			  		<th>ID Rubro</th>
			  		<th>Nombre</th>
			 		<th>Editar</th>
			  		<th>Eliminar</th>
				</tr>
			</thead>
	  		<tbody>
	  			@foreach($rubros as $rubro)
				<tr>
					<td>{{ $rubro->id_rubro }}</td>
					<td>{{ $rubro->rubro }}</td>
			 		<td><a href="{{ action('ClientesController@getEditCliente', $rubro->id_rubro) }}"><span class="glyphicon glyphicon-pencil"></a></span></td>
					<td><a href="{{ action('ClientesController@destroy', $rubro->rubro) }}" <span class="glyphicon glyphicon-remove"></span></a></td>
				</tr>
				@endforeach
	  		</tbody>	
		</table>
	</div>
</div>	
@stop
