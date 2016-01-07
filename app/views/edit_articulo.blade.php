@extends ('layout')

@section ('content')

<div class="container">

	<div class="row text-center">

		<h1>Datos del Artículo</h1>

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
			<form action="{{ URL::asset('edit_articulo') }}" method="POST" class="form-vertical" role="form">

				<fieldset class="cool-fieldset">
					<div class="form-group">
						<div class="col-sm-6">
			  				<p class="help-block margin-bottom-cero"><small>Nombre: </small></p>
			  				<input type="text" class="form-control" placeholder="Nombre..." name="nombre" id="nombre" value=<?php echo $articulo->nombre;?>>
				  		</div>
						<div class="col-sm-6">
			  				<p class="help-block margin-bottom-cero"><small>Descripción: </small></p>
			  				<input type="text" class="form-control" placeholder="Descripción..." name="descripcion" id="descripcion" value=<?php echo $articulo->descripcion;?>>
				  		</div>
				  	</div>
				  	<div class="form-group">
						<div class="col-sm-3">
			  				<p class="help-block margin-bottom-cero"><small>Alto:</small></p>
			  				<input type="text" class="form-control" placeholder="Alto..." name="alto" id="alto" value=<?php echo $articulo->alto;?>>
				  		</div>
						<div class="col-sm-3">
			  				<p class="help-block margin-bottom-cero"><small>Largo: </small></p>
			  				<input type="text" class="form-control" placeholder="Largo..." name="largo" id="largo" value=<?php echo $articulo->largo;?>>
				  		</div>
				  		<div class="col-sm-3">
			  				<p class="help-block margin-bottom-cero"><small>Ancho o Profundidad: </small></p>
			  				<input type="text" class="form-control" placeholder="Ancho o Profundidad..." name="ancho_prof" id="ancho_prof" value=<?php echo $articulo->ancho_prof;?>>
				  		</div>	
				  		<div class="col-sm-2">
			  				<p class="help-block margin-bottom-cero"><small>Rubro:</small></p>
			  				<select class="form-control campo" name="rubro" id="rubro" data-val="rubro">
			  					@foreach ($rubros as $rubro)
			  						@if ($articulo->id_rubro==$rubro->id_rubro)
										<option value="{{ $rubro->id_rubro }}" selected>{{ $rubro->rubro }}</option>
									@else
										<option value="{{ $rubro->id_rubro }}">{{ $rubro->rubro }}</option>
									@endif
		                        @endforeach
		                    </select>
				  		</div>
				  		<div class="col-sm-1">
			  				<p class="help-block margin-bottom-cero"><small>ID:</small></p>
	  						<input type="text" class="form-control" name="id_articulo" id="id_articulo" value=<?php echo $articulo->id_articulo;?>>
				  		</div>	  			
				  	</div>
				  	<div class="form-group">
				  		<div class="col-sm-12">
							<label for="exampleInputFile">Inserte la fotografía</label>
							<input type="file" id="image">
							<!--<p class="help-block">Example block-level help text here.</p>-->
						</div>
				  	</div>
					<div class="form-group">					
							<div class="col-sm-12">
								<input type="submit" value="Actualizar Artículo" class="btn btn-success form-control">
							</div>
					</div>							  	

				</fieldset>					

			</form>

		</div>

	</div>

</div>

@stop