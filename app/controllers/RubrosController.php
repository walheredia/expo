<?php
	class RubrosController extends BaseController {
		public function get_nuevo(){
			return View::make('register_rubro');
		}
		public function post_nuevo(){
			$inputs = Input::all();
			$reglas = array(
				'nombre' => 'required|min:4',
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
				$rubro = new Rubro;
				$rubro->rubro = Input::get('nombre');			
		        $rubro->save();
				return Redirect::to('lista_rubros')->with('error', 'El Rubrop ha sido registrado con Éxito')->withInput();
			}
		}
		public function all_rubros() {
			$rubros = Rubro::all();
			return View::make('lista_rubros')->with('rubros', $rubros);
		}
}	
?>