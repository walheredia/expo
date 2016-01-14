<?php
	class StockController extends BaseController {
		public function getEditStock($id_articulo){
			$sucursales = Sucursal::all();
			$articulo_id = $id_articulo;
			$articulos = DB::table('articulos')
            ->join('stock', 'articulos.id_articulo', '=', 'stock.id_articulo')
            ->join('sucursales', 'stock.id_sucursal', '=', 'sucursales.id_sucursal')
            ->select('articulos.id_articulo', 'articulos.nombre', 'sucursales.nombre as sucursal', 'stock.cantidad')
            ->get();
			return View::make('edit_stock')->with('sucursales', $sucursales)
											->with('articulo_id', $articulo_id)
											->with('articulos', $articulos);
		}
		public function update() {
			$inputs = Input::all();
			$reglas = array(
				'sucursal' => 'required',
				'stock' => 'required|integer',
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
				$id_sucursal = Input::get('sucursal');
				$stock = Input::get('stock');

				$p = DB::table('stock')->where('id_articulo', $id_articulo)->where('id_sucursal', $id_sucursal)->first();
				
				if (empty($p)) {
					DB::table('stock')->insert(
					    array('id_articulo' => $id_articulo, 'id_sucursal' => $id_sucursal, 'cantidad' => $stock)
					);
				}
				else {
					DB::table('stock')
			            ->where('id_articulo', $id_articulo)
			            ->where('id_sucursal', $id_sucursal)
			            ->update(array('cantidad' => $stock));
				}

				$sucursales = Sucursal::all();
			$articulo_id = $id_articulo;
			$articulos = DB::table('articulos')
            ->join('stock', 'articulos.id_articulo', '=', 'stock.id_articulo')
            ->join('sucursales', 'stock.id_sucursal', '=', 'sucursales.id_sucursal')
            ->select('articulos.id_articulo', 'articulos.nombre', 'sucursales.nombre as sucursal', 'stock.cantidad')
            ->get();
			return View::make('edit_stock')->with('ok', 'El Stock ha sido actualizado con Éxito')
											->with('sucursales', $sucursales)
											->with('articulo_id', $articulo_id)
											->with('articulos', $articulos);
				/*$id_articulo = Input::get('id_articulo');
				$articulo = Articulo::find($id_articulo);
				$articulo->nombre = Input::get('nombre');			
				$articulo->descripcion = Input::get('descripcion');			
				$articulo->alto = Input::get('alto');			
				$articulo->largo = Input::get('largo');			
				$articulo->ancho_prof = Input::get('ancho_prof');			
				$articulo->id_rubro = Input::get('rubro');
				$articulo->id_proveedor = Input::get('proveedor');
		        $articulo->save();

		        $articulos = DB::table('articulos')
	            ->join('rubros', 'articulos.id_rubro', '=', 'rubros.id_rubro')
	            ->select('articulos.id_articulo', 'rubros.rubro', 'articulos.nombre', 'articulos.descripcion', 'articulos.alto', 'articulos.largo', 'articulos.ancho_prof', 'rubros.id_rubro')
	            ->get();
				return Redirect::to('lista_articulos')->with('articulos', $articulos)
													->with('error', 'El Artículo ha sido actualizado con Éxito')->withInput();
				*/
			}
		}
	}
?>