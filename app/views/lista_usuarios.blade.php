@extends ('layout')

@section ('content')
<div class="container">
	<div class="row text-center">
	<h3>Usuarios</h3>
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
			  		<th>ID Usuario</th>
			  		<th>Nombre de Usuario</th>
			 		<th>Nombre</th>
			  		<th>Apellido</th>
			  		<th>E-Mail</th>
			  		<th>Tipo de Usuario</th>
			  		<th>Editar</th>
			  		<th>Eliminar</th>
				</tr>
			</thead>
	  		<tbody>
	  			@foreach($users as $user)
				<tr>
					<td>{{ $user->id }}</td>
					<td>{{ $user->username }}</td>
			 		<td>{{ $user->first_name }}</td>
			 		<td>{{ $user->last_name }}</td>
			 		<td>{{ $user->email }}</td>
			 		@if($user->tipo_usuario === 1)
			 			<td>Usuario</td>
			 		@elseif($user->tipo_usuario === 2)
			 			<td>Moderador</td>
			 		@else
			 			<td>Administrador</td>
			 		@endif
			 		<td><a href="{{ action('UsuariosController@getEditUsuario', $user->id) }}"><span class="glyphicon glyphicon-pencil"></a></span></td>
					<td><a href="{{ action('UsuariosController@destroy', $user->id) }}" <span class="glyphicon glyphicon-remove"></span></a></td>
				</tr>
				@endforeach
	  		</tbody>	
		</table>
	</div>
</div>	
@stop
