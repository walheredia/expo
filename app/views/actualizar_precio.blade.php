@extends ('layout')

@section ('content')

<div class="container">

	<div class="row text-center">

		<h1>Actualizar precios por proveedor</h1>
		<div class="col-md-10 col-md-offset-1 text-left">
			@if(isset($ok))
	            <div class="alert alert-success">
	              <button type="button" class="close" data-dismiss="alert">&times;</button>
	                {{ Session::get($ok) }}
	                {{$ok}}
	              </ul>
	            </div>
	        @endif
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
			<form action="{{ URL::asset('actualizar_precio') }}" method="POST" class="form-vertical" role="form">

				<fieldset class="cool-fieldset">
					<div class="form-group">
						<div class="col-sm-6">
			  				<p class="help-block margin-bottom-cero"><small>Proveedor:</small></p>
			  				<select class="form-control campo" name="proveedor" id="proveedor" data-val="proveedor">
			  					<option value="" selected disabled>Por favor, seleccione</option>
			  					@foreach ($proveedores as $p)
		                          <option value="{{ $p->id_proveedor }}">{{ $p->nom_raz }}</option>
		                        @endforeach
		                    </select>
				  		</div>	
						<div class="col-sm-6">
			  				<p class="help-block margin-bottom-cero"><small>Porcentaje a aumentar sobre el precio de venta:</small></p>
			  				<select class="form-control" name="porcentaje" id="porcentaje" data-val="porcentaje">
			  					<option value="" selected disabled>Por favor, seleccione</option>
			  					<option value="0.05">5%</option>
			  					<option value="0.10">10%</option>
			  					<option value="0.15">15%</option>
			  					<option value="0.20">20%</option>
			  					<option value="0.25">25%</option>
			  					<option value="0.30">30%</option>
			  					<option value="0.35">35%</option>
			  					<option value="0.40">40%</option>
			  					<option value="0.50">50%</option>
			  					<option value="0.60">60%</option>
			  				</select>
				  		</div>
				  		 </br></br></br>
				  	</div>

					<div class="form-group">					
						<div class="col-sm-12">
							<input type="submit" value="Actualizar Precios" class="btn btn-success form-control">
						</div>
					</div>
				</fieldset>					

			</form>

		</div>

	</div>

</div>

@stop