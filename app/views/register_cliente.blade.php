@extends ('layout')

@section ('content')

<div class="container">

	<div class="row text-center">

		<h1>Datos del Cliente</h1>

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
			<form action="{{ URL::asset('register_cliente') }}" method="POST" class="form-vertical" role="form">

				<fieldset class="cool-fieldset">
					<div class="form-group">
						<div class="col-sm-6">
			  				<p class="help-block margin-bottom-cero"><small>Nombres: </small></p>
			  				<input type="text" class="form-control" placeholder="Nombres..." name="nombres" id="nombres" value="{{ Input::old('nombres') }}">
				  		</div>

						<div class="col-sm-6">
			  				<p class="help-block margin-bottom-cero"><small>Apellido: </small></p>
			  				<input type="text" class="form-control" placeholder="Apellido..." name="apellido" id="apellido" value="{{ Input::old('apellido') }}">
				  		</div>		  			
				  	</div>

				  	<div class="form-group">
				  		<div class="col-sm-3">
			  				<p class="help-block margin-bottom-cero"><small>Tipo de Doc:</small></p>
			  				<select class="form-control campo" name="tipo_doc" id="tipo_doc" data-val="tipo_doc">
			  					<option value="1">DNI</option>
			  					<option value="2">LC</option>
			  					<option value="3">LE</option>
		                    </select>
				  		</div>
				  		<div class="col-sm-3">
			  				<p class="help-block margin-bottom-cero"><small>Documento:</small></p>
			  				<input type="text" class="form-control" placeholder="Documento" name="documento" id="documento" value="{{ Input::old('documento') }}">
				  		</div>
						<div class="col-sm-6">
			  				<p class="help-block margin-bottom-cero"><small>E-mail:</small></p>
			  				<input type="email" class="form-control" placeholder="E-mail..." name="email" id="email" value="{{ Input::old('email') }}">
				  		</div>	  			
				  	</div>

				  	<div class="form-group">
						<div class="col-sm-6">
			  				<p class="help-block margin-bottom-cero"><small>Dirección calle:</small></p>
			  				<input type="text" class="form-control" placeholder="Dirección calle..." name="calle" id="calle" value="{{ Input::old('calle') }}">
				  		</div>
				  		<div class="col-sm-3">
			  				<p class="help-block margin-bottom-cero"><small>Núm:</small></p>
			  				<input type="text" class="form-control" placeholder="Núm..." name="num" id="num" value="{{ Input::old('num') }}">
				  		</div>
				  		<div class="col-sm-3">
			  				<p class="help-block margin-bottom-cero"><small>Piso:</small></p>
			  				<input type="text" class="form-control" placeholder="Piso..." name="piso" id="piso" value="{{ Input::old('piso') }}">
				  		</div>
				  	</div>

				  	<div class="form-group">
						<div class="col-sm-4">
			  				<p class="help-block margin-bottom-cero"><small>Localidad:</small></p>
			  				<select class="form-control" name="localidad">
			  					<option value="1">San Nicolás</option>
			  					<option value="2">Ramallo</option>
			  					<option value="3">Rosario</option>
			  				</select>
				  		</div>
						<div class="col-sm-4">
			  				<p class="help-block margin-bottom-cero"><small>Teléfono:</small></p>
	  						<input type="text" class="form-control" placeholder="Teléfono..." name="telefono" id="telefono">
				  		</div>		  			
				  		<div class="col-sm-4">
			  				<p class="help-block margin-bottom-cero"><small>Celular:</small></p>
	  						<input type="text" class="form-control" placeholder="Celular..." name="celular" id="celular">
				  		</div>
				  	</div>
					<div class="form-group">					
							<div class="col-sm-12">
								<input type="submit" value="Registrar Cliente" class="btn btn-success form-control">
							</div>
					</div>							  	

				</fieldset>					

			</form>

		</div>

	</div>

</div>

@stop