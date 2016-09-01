<?php
	class ArticulosController extends BaseController {
		public function get_nuevo(){
			$rubros = Rubro::all();
			$sucursales = Sucursal::all();
			$proveedores = Proveedor::all();

			return View::make('register_articulo')->with('rubros',$rubros)
												->with('sucursales',$sucursales)
												->with('proveedores',$proveedores);
		}
		public function post_nuevo(){
			$inputs = Input::all();
			$reglas = array(
				'nombre' => 'required|max:50',
				'descripcion' => 'required|max:50',
				'alto' => 'required',
				'largo' => 'required',
				'ancho_prof' => 'required',
				'rubro' => 'required|integer',
				'sucursal' => 'required',
				'stock' => 'required|integer',
				'prec_compra' => 'required',
				'proveedor' => 'required',
			);
			$mensajes = array(
				'required' => 'Campo Obligatorio',
			);
			$validar = Validator::make($inputs, $reglas);
			if($validar->fails())
			{	
				Input::flash();
				return Redirect::back()->withInput()->withErrors($validar);
			}
			else
			{
				try {
					DB::beginTransaction();
					$articulo = new Articulo;
					$articulo->nombre = Input::get('nombre');			
					$articulo->descripcion = Input::get('descripcion');			
					$articulo->alto = Input::get('alto');			
					$articulo->largo = Input::get('largo');			
					$articulo->ancho_prof = Input::get('ancho_prof');			
					$articulo->id_rubro = Input::get('rubro');
					$articulo->precio_compra = Input::get('prec_compra');
					$articulo->id_proveedor = Input::get('proveedor');
					$articulo->save();
					$insertedId = $articulo->id_articulo;
					
					$stock = new Stock;
					$stock->id_articulo = $insertedId;
					$stock->id_sucursal = Input::get('sucursal');
					$stock->cantidad = Input::get('stock');
					$stock->save();
					DB::commit();

					$articulos = DB::table('articulos')
		            ->join('rubros', 'articulos.id_rubro', '=', 'rubros.id_rubro')
		            ->join('proveedores', 'articulos.id_proveedor', '=', 'proveedores.id_proveedor')
		            ->join('stock', 'articulos.id_articulo', '=', 'stock.id_articulo')
		            ->join('sucursales', 'stock.id_sucursal', '=', 'sucursales.id_sucursal')
		            ->select('articulos.id_articulo', 'rubros.rubro', 'articulos.nombre', 'articulos.descripcion', 'articulos.alto', 'articulos.largo', 'articulos.ancho_prof', 'articulos.precio_compra', 'rubros.id_rubro', 'proveedores.nom_raz', 'stock.cantidad', 'sucursales.nombre as sucursal')
		            ->orderby('articulos.nombre', 'asc')
		            ->paginate(100);
					return View::make('lista_articulos')->with('articulos', $articulos)
														->with('error', 'El Artículo ha sido cargado con Éxito');
				} catch (Exception $ex) {
					DB::rollBack();
					echo $ex->getMessage();
				}			        
			}			
		}
		//'image'=>'image|mimes:jpeg,jpg,bmp,png,gif'
		public function all_articles() {
			$articulos = DB::table('articulos')
            ->join('rubros', 'articulos.id_rubro', '=', 'rubros.id_rubro')
            ->join('proveedores', 'articulos.id_proveedor', '=', 'proveedores.id_proveedor')
            ->join('stock', 'articulos.id_articulo', '=', 'stock.id_articulo')
            ->join('sucursales', 'stock.id_sucursal', '=', 'sucursales.id_sucursal')
            ->select('articulos.id_articulo', 'rubros.rubro', 'articulos.nombre', 'articulos.descripcion', 'articulos.alto', 'articulos.largo', 'articulos.ancho_prof', 'articulos.precio_compra', 'rubros.id_rubro', 'proveedores.nom_raz', 'stock.cantidad', 'sucursales.nombre as sucursal')
            ->orderby('articulos.nombre', 'asc', 'proveedores.nom_raz', 'asc')
            ->paginate(100);
            
			return View::make('lista_articulos')->with('articulos', $articulos);
		}
		public function destroy($id_articulo){
			try {
				DB::beginTransaction();
				$articulo = Articulo::find($id_articulo);
				$articulo_stock = Stock::find($id_articulo);
		        if (is_null ($articulo))
		        {
		            App::abort(404);
		        }
		        $articulo_stock->delete();
		        $articulo->delete();
		        DB::commit();

		        $articulos = DB::table('articulos')
	            ->join('rubros', 'articulos.id_rubro', '=', 'rubros.id_rubro')
	            ->join('proveedores', 'articulos.id_proveedor', '=', 'proveedores.id_proveedor')
	            ->join('stock', 'articulos.id_articulo', '=', 'stock.id_articulo')
	            ->join('sucursales', 'stock.id_sucursal', '=', 'sucursales.id_sucursal')
	            ->select('articulos.id_articulo', 'rubros.rubro', 'articulos.nombre', 'articulos.descripcion', 'articulos.alto', 'articulos.largo', 'articulos.ancho_prof', 'articulos.precio_compra', 'rubros.id_rubro', 'proveedores.nom_raz', 'stock.cantidad', 'sucursales.nombre as sucursal')
	            ->orderby('articulos.nombre', 'asc')
	            ->paginate(100);

	            return View::make('lista_articulos')->with('articulos', $articulos);

			} catch (Exception $ex) {
				DB::rollBack();
				echo $ex->getMessage();
			}
			
		}
		public function getEditArticulo($id_articulo) {
			$articulo = Articulo::find($id_articulo);
			$rubros = Rubro::all();
			$proveedores = Proveedor::all();
			if (is_null ($articulo))
			{
			App::abort(404);
			}
			return View::make('edit_articulo')->with('articulo', $articulo)
											->with('rubros', $rubros)
											->with('proveedores',$proveedores);
		}
		public function update() {
			$inputs = Input::all();
			$reglas = array(
				'nombre' => 'required|max:50',
				'descripcion' => 'required|max:50',
				'alto' => 'required',
				'largo' => 'required',
				'ancho_prof' => 'required',
				'rubro' => 'required|integer',
			);
			$mensajes = array(
				'required' => 'Campo Obligatorio',
			);
			$validar = Validator::make($inputs, $reglas);
			if($validar->fails())
			{	
				Input::flash();
				return Redirect::back()->withInput()->withErrors($validar);
			}
			else
			{
				$id_articulo = Input::get('id_articulo');
				$articulo = Articulo::find($id_articulo);
				$articulo->nombre = Input::get('nombre');			
				$articulo->descripcion = Input::get('descripcion');			
				$articulo->alto = Input::get('alto');			
				$articulo->largo = Input::get('largo');			
				$articulo->ancho_prof = Input::get('ancho_prof');	
				$articulo->precio_compra = Input::get('prec_compra');		
				$articulo->id_rubro = Input::get('rubro');
				$articulo->id_proveedor = Input::get('proveedor');
		        $articulo->save();

		        $articulos = DB::table('articulos')
	            ->join('rubros', 'articulos.id_rubro', '=', 'rubros.id_rubro')
	            ->join('proveedores', 'articulos.id_proveedor', '=', 'proveedores.id_proveedor')
	            ->join('stock', 'articulos.id_articulo', '=', 'stock.id_articulo')
	            ->join('sucursales', 'stock.id_sucursal', '=', 'sucursales.id_sucursal')
	            ->select('articulos.id_articulo', 'rubros.rubro', 'articulos.nombre', 'articulos.descripcion', 'articulos.alto', 'articulos.largo', 'articulos.ancho_prof', 'articulos.precio_compra', 'rubros.id_rubro', 'proveedores.nom_raz', 'stock.cantidad', 'sucursales.nombre as sucursal')
	            ->orderby('articulos.nombre', 'asc')
	            ->paginate(100);
				return View::make('lista_articulos')->with('articulos', $articulos)
													->with('error', 'El Artículo ha sido actualizado con Éxito');
			}
		}
		public function search_article(){
			$nombre = Input::get('nombre');
			 $articulos = DB::table('articulos')
	            ->join('rubros', 'articulos.id_rubro', '=', 'rubros.id_rubro')
	            ->join('proveedores', 'articulos.id_proveedor', '=', 'proveedores.id_proveedor')
	            ->join('stock', 'articulos.id_articulo', '=', 'stock.id_articulo')
	            ->join('sucursales', 'stock.id_sucursal', '=', 'sucursales.id_sucursal')
	            ->select('articulos.id_articulo', 'rubros.rubro', 'articulos.nombre', 'articulos.descripcion', 'articulos.alto', 'articulos.largo', 'articulos.ancho_prof', 'articulos.precio_compra', 'rubros.id_rubro', 'proveedores.nom_raz', 'stock.cantidad', 'sucursales.nombre as sucursal')
	            ->where('articulos.nombre', 'LIKE', '%'.$nombre.'%')
	            ->orderby('articulos.nombre', 'asc')
	            ->paginate(9000);
				return View::make('lista_articulos')->with('articulos', $articulos);
			//$articulos = Articulo::where('nombre', 'LIKE', '%'.$nombre.'%')->get();
			
		}
		public function getactualizar_precios(){
			
			$proveedores = Proveedor::All();
			return View::make('actualizar_precio')->with('proveedores', $proveedores);
		}
		public function actualizar_precios(){
			try {
				DB::beginTransaction();
				$inputs = Input::all();
				$reglas = array(
					'proveedor' => 'required',
					'porcentaje' => 'required',
				);
				$mensajes = array(
					'required' => 'Campo Obligatorio',
				);
				$validar = Validator::make($inputs, $reglas);
				if($validar->fails())
				{	
					Input::flash();
					return Redirect::back()->withInput()->withErrors($validar);
				}
				else
				{
					$proveedor = Input::get('proveedor');
					$porcentaje = Input::get('porcentaje');
					$prov_nom = Proveedor::find($proveedor);

					$articulos = DB::table('articulos')
			            ->join('proveedores', 'articulos.id_proveedor', '=', 'proveedores.id_proveedor')
			            ->where('proveedores.id_proveedor', '=', $proveedor)
			            ->get();
		            $cant = count($articulos);

		            foreach ($articulos as $articulo) {
		            	$ar = Articulo::find($articulo->id_articulo);
		            	if ($ar->precio_compra == 0) {
		            		
		            	} else{
		            	$ar->precio_compra = $ar->precio_compra + ($porcentaje * $ar->precio_compra);
		            	$ar->save();
		            	}
		            }
		            DB::commit();
		            $proveedores = Proveedor::All();
	            	if ($cant==1) {
	            		return View::make('actualizar_precio')->with('proveedores', $proveedores)
														->with('ok', 'El precio de '.$cant.' artículo para el proveedor '.$prov_nom->nom_raz.', ha sido actualizado con éxito');
	            	} else{
	            		return View::make('actualizar_precio')->with('proveedores', $proveedores)
														->with('ok', 'Los precios de '.$cant.' artículos para el proveedor "'.$prov_nom->nom_raz.'", han sido actualizados con éxito');
	            	}
				}	
			} catch (Exception $e) {
				DB::rollBack();
				echo $e->getMessage();
			}
		}
	}
?>

