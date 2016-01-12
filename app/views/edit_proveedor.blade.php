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
			<form action="{{ URL::asset('edit_proveedor') }}" method="POST" class="form-vertical" role="form">

				<fieldset class="cool-fieldset">
					<div class="form-group">
						<div class="col-sm-6">
			  				<p class="help-block margin-bottom-cero"><small>Nombre o Razón Social: </small></p>
			  				<input type="text" class="form-control" placeholder="Nombre o Razón Social..." name="nom_raz" id="nom_raz" value=<?php echo $proveedor->nom_raz;?>>
				  		</div>
				  		<div class="col-sm-6">
			  				<p class="help-block margin-bottom-cero"><small>Nombre de Contacto Directo:</small></p>
			  				<input type="text" class="form-control" placeholder="Nombre de Contacto Directo..." name="contacto" id="contacto" value=<?php echo $proveedor->contacto;?>>
				  		</div>		  			
				  	</div>
				  	<div class="form-group">
				  		<div class="col-sm-3">
			  				<p class="help-block margin-bottom-cero"><small>Dirección:</small></p>
			  				<input type="text" class="form-control" placeholder="Dirección..." name="direccion" id="direccion" value=<?php echo $proveedor->direccion;?>>
				  		</div>
				  		<div class="col-sm-3">
			  				<p class="help-block margin-bottom-cero"><small>Localidad:</small></p>
			  				<select class="form-control campo" name="localidad" id="localidad" data-val="localidad">
			  					@foreach ($localidades as $l)
			  						@if ($proveedor->id_localidad==$l->id_localidad)
										<option value="{{ $l->id_localidad }}" selected>{{ $l->localidad }}</option>
									@else
										<option value="{{ $l->id_localidad }}">{{ $l->localidad }}</option>
									@endif
		                        @endforeach
		                    </select>
				  		</div>
						<div class="col-sm-6">
			  				<p class="help-block margin-bottom-cero"><small>E-mail:</small></p>
			  				<input type="email" class="form-control" placeholder="E-mail..." name="email" id="email" value=<?php echo $proveedor->email;?>>
				  		</div>	  			
				  	</div>
				  	<div class="form-group">
						<div class="col-sm-6">
			  				<p class="help-block margin-bottom-cero"><small>Teléfono:</small></p>
			  				<input type="text" class="form-control" placeholder="Teléfono..." name="tel" id="tel" value=<?php echo $proveedor->tel;?>>
				  		</div>
				  		<div class="col-sm-6">
			  				<p class="help-block margin-bottom-cero"><small>Nextel:</small></p>
			  				<input type="text" class="form-control" placeholder="Nextel..." name="nextel" id="nextel" value=<?php echo $proveedor->nextel;?>>
				  		</div>
				  	</div>
				  	<div class="form-group">
						<div class="col-sm-11">
			  				<p class="help-block margin-bottom-cero"><small>Dirección Pág. Web:</small></p>
			  				<input type="text" class="form-control" placeholder="Pág. Web..." name="web" id="web" value=<?php echo $proveedor->web;?>>
				  		</div>
				  		<div class="col-sm-1">
			  				<p class="help-block margin-bottom-cero"><small>ID:</small></p>
	  						<input type="text" class="form-control" name="id_proveedor" id="id_proveedor" value=<?php echo $proveedor->id_proveedor;?>>
				  		</div>
				  	</div>
					<div class="form-group">					
							<div class="col-sm-12">
								<input type="submit" value="Actualizar Proveedor" class="btn btn-success form-control">
							</div>
					</div>							  	

				</fieldset>					

			</form>

		</div>

	</div>

</div>

@stop