<?php
	class StockController extends BaseController {
		public function get_nuevo(){
			$sucursales = Sucursal::all();
			return View::make('register_stock')->with('sucursales',$sucursales);
		}
	}
?>