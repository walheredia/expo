@extends ('layout')

@section ('content')

<div class="container">

	<div class="row text-center">

		<h1>Datos del nuevo usuario</h1>

		<div class="col-md-10 col-md-offset-1 text-left">
			@if ($errors->any())
			    <div class="alert alert-danger">
			      <button type="button" class="close" data-dismiss="alert">&times;</button>
			      <strong>Por favor corrige los siguentes errores:</strong>
			      <ul>
			      @foreach ($errors->all() as $error)
			        <li>{{ $error }}</li>
			      @endforeach
			      </ul>
			    </div>
			@endif
			<form action="{{ URL::asset('register') }}" method="POST" class="form-vertical" role="form">

				<fieldset class="cool-fieldset">
					<div class="form-group">
						<div class="col-sm-6">
			  				<p class="help-block margin-bottom-cero"><small>Nombre: </small></p>
			  				<input type="text" class="form-control" placeholder="Nombre..." name="first_name" id="first_name" value="{{ Input::old('first_name') }}">
				  		</div>

						<div class="col-sm-6">
			  				<p class="help-block margin-bottom-cero"><small>Apellido: </small></p>
			  				<input type="text" class="form-control" placeholder="Apellido..." name="last_name" id="last_name" value="{{ Input::old('last_name') }}">
				  		</div>		  			
				  	</div>

				  	<div class="form-group">
						<div class="col-sm-12">
			  				<p class="help-block margin-bottom-cero"><small>E-mail:</small></p>
			  				<input type="email" class="form-control" placeholder="E-mail..." name="email" id="email" value="{{ Input::old('email') }}">
				  		</div>	  			
				  	</div>

				  	<div class="form-group">
						<div class="col-sm-12">
			  				<p class="help-block margin-bottom-cero"><small>Nombre de usuario:</small></p>
			  				<input type="text" class="form-control" placeholder="Nombre de usuario..." name="username" id="username" value="{{ Input::old('username') }}">
				  		</div>	  			
				  	</div>

				  	<div class="form-group">
						<div class="col-sm-6">
			  				<p class="help-block margin-bottom-cero"><small>Contraseña:</small></p>
			  				<input type="password" class="form-control" placeholder="Contraseña..." name="password" id="password">
				  		</div>
						<div class="col-sm-6">
			  				<p class="help-block margin-bottom-cero"><small>Confirmar Contraseña:</small></p>
	  						<input type="password" class="form-control" placeholder="Confirmar Contraseña..." name="confirmar_clave" id="confirmar_clave">
				  		</div>		  			
				  	</div>

				  	<div class="form-group">
						<div class="col-sm-12">
			  				<p class="help-block margin-bottom-cero"><small>Tipo de Usuario:</small></p>
			  				<select class="form-control" name="tipo_usuario">
			  					<option value="1">Usuario</option>
			  					<option value="2">Moderador</option>
			  					<option value="3">Administrador</option>
			  				</select>
				  		</div>				  			
				  	</div>
					<div class="form-group">					
							<div class="col-sm-12">
								<input type="submit" value="Registrar Usuario" class="btn btn-success form-control">
							</div>
					</div>							  	

				</fieldset>					

			</form>

		</div>

	</div>

</div>

@stop