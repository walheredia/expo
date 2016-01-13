<?php
	class StockController extends BaseController {
		public function getEditStock(){
			$sucursales = Sucursal::all();
			return View::make('edit_stock')->with('sucursales',$sucursales);
		}
	}
?>