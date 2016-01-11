@extends ('layout')

@section ('content')

<div class="container">

	<div class="row text-center">

		<h1>Datos del Proveedor</h1>

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
			<form action="{{ URL::asset('register_proveedor') }}" method="POST" class="form-vertical" role="form">

				<fieldset class="cool-fieldset">
					<div class="form-group">
						<div class="col-sm-6">
			  				<p class="help-block margin-bottom-cero"><small>Nombre o Razón Social: </small></p>
			  				<input type="text" class="form-control" placeholder="Nombre o Razón Social..." name="nom_raz" id="nom_raz" value="{{ Input::old('nom_raz') }}">
				  		</div>
				  		<div class="col-sm-6">
			  				<p class="help-block margin-bottom-cero"><small>Nombre de Contacto Directo:</small></p>
			  				<input type="text" class="form-control" placeholder="Nombre de Contacto Directo..." name="contacto" id="contacto" value="{{ Input::old('contacto') }}">
				  		</div>		  			
				  	</div>
				  	<div class="form-group">
				  		<div class="col-sm-3">
			  				<p class="help-block margin-bottom-cero"><small>Dirección:</small></p>
			  				<input type="text" class="form-control" placeholder="Dirección..." name="direccion" id="direccion" value="{{ Input::old('direccion') }}">
				  		</div>
				  		<div class="col-sm-3">
			  				<p class="help-block margin-bottom-cero"><small>Localidad:</small></p>
			  				<select class="form-control campo" name="localidad" id="localidad" data-val="localidad">
			  					@foreach ($localidades as $localidad)
		                          <option value="{{ $localidad->id_localidad }}">{{ $localidad->localidad }}</option>
		                        @endforeach
		                    </select>
				  		</div>
						<div class="col-sm-6">
			  				<p class="help-block margin-bottom-cero"><small>E-mail:</small></p>
			  				<input type="email" class="form-control" placeholder="E-mail..." name="email" id="email" value="{{ Input::old('email') }}">
				  		</div>	  			
				  	</div>
				  	<div class="form-group">
						<div class="col-sm-6">
			  				<p class="help-block margin-bottom-cero"><small>Teléfono:</small></p>
			  				<input type="text" class="form-control" placeholder="Teléfono..." name="tel" id="tel" value="{{ Input::old('tel') }}">
				  		</div>
				  		<div class="col-sm-6">
			  				<p class="help-block margin-bottom-cero"><small>Nextel:</small></p>
			  				<input type="text" class="form-control" placeholder="Nextel..." name="nextel" id="nextel" value="{{ Input::old('nextel') }}">
				  		</div>
				  	</div>
				  	<div class="form-group">
						<div class="col-sm-12">
			  				<p class="help-block margin-bottom-cero"><small>Dirección Pág. Web:</small></p>
			  				<input type="text" class="form-control" placeholder="Pág. Web..." name="web" id="web" value="{{ Input::old('web') }}">
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