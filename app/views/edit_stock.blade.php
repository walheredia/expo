@extends ('layout')

@section ('content')

<div class="container">

	<div class="row text-center">

		<h1>Datos Actuales de Stock</h1>

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
			<form action="{{ URL::asset('edit_stock') }}" method="POST" class="form-vertical" role="form">

				<fieldset class="cool-fieldset">
					<div class="form-group">
						<div class="col-sm-12">
							<table class="table table-bordered table-hover" style="font-size: 12px;">
								<thead>
									<tr>
								  		<th>Código Articulo</th>
								  		<th>Nombre</th>
								 		<th>Sucursal</th>
								 		<th>Cantidad en Stock</th>
									</tr>
								</thead>
						  		<tbody>
						  			@foreach($articulos as $articulo)
									<tr>
										@if ($articulo->id_articulo == $articulo_id)
										<td>{{ $articulo->id_articulo }}</td>
										<td>{{ $articulo->nombre }}</td>
										<td>{{ $articulo->sucursal }}</td>
										<td>{{ $articulo->cantidad }}</td>
										@endif
									</tr>
									@endforeach
						  		</tbody>	
							</table>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-12">
							<div class="panel panel-default">
							  <div class="panel-body">
							    <p><small>*Nota: Si en el listado aquí arriba no se muestra el Stock de alguna Sucursal, es porque nunca se ha cargado Stock para dicha sucursal. Para administrar el Stock de cualquier Sucursal, complete los datos requeridos a continuación...</small></p>
							  </div>
							</div>
						</div>
					</div>
					<h2 class="row text-center">Datos a modificar</h2>
					<div class="form-group">
						<div class="col-sm-4">
			  				<p class="help-block margin-bottom-cero"><small>Código Artículo: </small></p>
			  				<input type="text" class="form-control" placeholder="Código..." name="id_articulo" id="id_articulo" value="<?php echo $articulo_id;?>">
				  		</div>
						<div class="col-sm-4">
			  				<p class="help-block margin-bottom-cero"><small>Sucursal:</small></p>
			  				<select class="form-control campo" name="sucursal" id="sucursal" data-val="sucursal">
			  					<option value="" selected disabled>Por favor, seleccione</option>
			  					@foreach ($sucursales as $sucursal)
		                          <option value="{{ $sucursal->id_sucursal }}">{{ $sucursal->nombre }}</option>
		                        @endforeach
		                    </select>
				  		</div>
				  		<div class="col-sm-4">
			  				<p class="help-block margin-bottom-cero"><small>Stock(Cantidad total):</small></p>
			  				<input type="text" class="form-control" placeholder="Stock(Cantidad)" name="stock" id="stock" value="{{ Input::old('stock') }}">
				  		</div>
				  	</div>

					<div class="form-group">					
						<div class="col-sm-12">
							<input type="submit" value="Actualizar Stock" class="btn btn-success form-control">
						</div>
					</div>
				</fieldset>					

			</form>

		</div>

	</div>

</div>

@stop