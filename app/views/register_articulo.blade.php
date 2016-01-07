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
			<form action="{{ URL::asset('register_articulo') }}" method="POST" class="form-vertical" role="form">

				<fieldset class="cool-fieldset">
					<div class="form-group">
						<div class="col-sm-6">
			  				<p class="help-block margin-bottom-cero"><small>Nombre: </small></p>
			  				<input type="text" class="form-control" placeholder="Nombre..." name="nombre" id="nombre" value="{{ Input::old('nombre') }}">
				  		</div>
						<div class="col-sm-6">
			  				<p class="help-block margin-bottom-cero"><small>Descripción: </small></p>
			  				<input type="text" class="form-control" placeholder="Descripción..." name="descripcion" id="descripcion" value="{{ Input::old('descripcion') }}">
				  		</div>
				  	</div>
				  	<div class="form-group">
						<div class="col-sm-3">
			  				<p class="help-block margin-bottom-cero"><small>Alto:</small></p>
			  				<input type="text" class="form-control" placeholder="Alto..." name="alto" id="alto" value="{{ Input::old('alto') }}">
				  		</div>
						<div class="col-sm-3">
			  				<p class="help-block margin-bottom-cero"><small>Largo: </small></p>
			  				<input type="text" class="form-control" placeholder="Largo..." name="largo" id="largo" value="{{ Input::old('largo') }}">
				  		</div>
				  		<div class="col-sm-3">
			  				<p class="help-block margin-bottom-cero"><small>Ancho o Profundidad: </small></p>
			  				<input type="text" class="form-control" placeholder="Ancho o Profundidad..." name="ancho_prof" id="ancho_prof" value="{{ Input::old('ancho_prof') }}">
				  		</div>	
				  		<div class="col-sm-3">
			  				<p class="help-block margin-bottom-cero"><small>Rubro:</small></p>
			  				<select class="form-control campo" name="rubro" id="rubro" data-val="rubro">
			  					<option value="" selected disabled>Por favor, seleccione</option>
			  					@foreach ($rubros as $rubro)
		                          <option value="{{ $rubro->id_rubro }}">{{ $rubro->rubro }}</option>
		                        @endforeach
		                    </select>
				  		</div>	  			
				  	</div>
				  	<div class="form-group">
				  		<div class="col-sm-3">
			  				<p class="help-block margin-bottom-cero"><small>Sucursal:</small></p>
			  				<select class="form-control campo" name="sucursal" id="sucursal" data-val="sucursal">
			  					@foreach ($sucursales as $sucursal)
		                          <option value="{{ $sucursal->id_sucursal }}">{{ $sucursal->nombre }}</option>
		                        @endforeach
		                    </select>
				  		</div>
				  		<div class="col-sm-6">
			  				<p class="help-block margin-bottom-cero"><small>Stock(Cantidad):</small></p>
			  				<input type="text" class="form-control" placeholder="Stock(Cantidad)" name="stock" id="stock" value="{{ Input::old('stock') }}">
				  		</div>
						<div class="col-sm-3">
			  				<p class="help-block margin-bottom-cero"><small>Precio de Compra:</small></p>
			  				<input type="text" class="form-control" placeholder="Precio de Compra..." name="prec_compra" id="prec_compra" value="{{ Input::old('prec_compra') }}">
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
								<input type="submit" value="Registrar Artículo" class="btn btn-success form-control">
							</div>
					</div>							  	

				</fieldset>					

			</form>

		</div>

	</div>

</div>

@stop