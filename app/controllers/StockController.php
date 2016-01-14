<?php
	class StockController extends BaseController {
		public function getEditStock($id_articulo){
			$articulo = DB::table('articulos')
		        ->join('stock', function($join)
		        {
		        	$art = $id_articulo;
		            $join->on('articulos.id_articulo', '=', 'stock.id_articulo')
		                 ->where('articulos.id_articulo', '=', $art);
		        })
		        ->get();
		        var_dump($articulo);
			//$sucursales = Sucursal::all();
			//return View::make('edit_stock')->with('sucursales',$sucursales);
		}
	}
?>