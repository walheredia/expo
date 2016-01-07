@extends ('layout')

@section ('content')

<div class="container">

	<div class="row text-center">

		<h1>Datos del Stock</h1>

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
			  				<p class="help-block margin-bottom-cero"><small>Código: </small></p>
			  				<input type="text" class="form-control" placeholder="Código..." name="id_articulo" id="id_articulo" value="{{ Input::old('id_articulo') }}">
				  		</div>
						<div class="col-sm-6">
			  				<p class="help-block margin-bottom-cero"><small>Descripción: </small></p>
			  				<input type="text" class="form-control" placeholder="Descripción..." name="descripcion" id="descripcion" value="{{ Input::old('descripcion') }}">
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
								<input type="submit" value="Registrar Artículo" class="btn btn-success form-control">
							</div>
					</div>							  	

				</fieldset>					

			</form>

		</div>

	</div>

</div>

@stop