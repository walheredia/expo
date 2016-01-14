<?php
	class StockController extends BaseController {
		public function getEditStock($id_articulo){
			 $articulo = DB::table('articulos')
			 	->where('id_articulo', '=', $id_articulo)
	            //->join('stock', 'articulos.id_articulo', '=', 'stock.id_articulo')
	            //->select('articulos.id_articulo','articulos.nombre')
	            ->get();
			var_dump($articulo);

			//$sucursales = Sucursal::all();
			//return View::make('edit_stock')->with('sucursales',$sucursales);
		}
	}
?>