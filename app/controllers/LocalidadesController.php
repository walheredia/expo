<?php
	class LocalidadesController extends BaseController {
		public function get_nuevo(){
				return View::make('register_localidad');
		}
		public function post_nuevo(){
			$inputs = Input::all();
			$reglas = array(
				'localidad' => 'required|max:50',
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
				$localidad = new Localidad;
				$localidad->localidad = Input::get('localidad');			
		        $localidad->save();
				return Redirect::to('lista_localidades')->with('error', 'La Localidad ha sido registrada con Éxito')->withInput();
			}
		}
		public function all_localidades() {
			$localidades = Localidad::all();
			return View::make('lista_localidades')->with('localidades', $localidades);
		}
	}
?>