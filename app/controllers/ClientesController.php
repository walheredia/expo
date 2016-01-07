<?php 

	class ClientesController extends BaseController {
		public function get_nuevo(){
				return View::make('register_cliente');
		}
		public function all_clients() {
			$clients = Cliente::all();
			return View::make('lista_clientes')->with('clients', $clients);
		}
		public function post_nuevo()
		{
			$inputs = Input::all();
			$reglas = array(
				'nombres' => 'required|min:4', 
				'apellido' => 'required',
				'email' => 'email|unique:clients,email',
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
				$cliente = new Cliente;
				$cliente->nombres = Input::get('nombres');
				$cliente->apellido = Input::get('apellido');
				$cliente->tipo_doc = Input::get('tipo_doc');
				$cliente->documento = Input::get('documento');
				$cliente->email = Input::get('email');
				$cliente->calle = Input::get('calle');
				$cliente->num = Input::get('num');
				$cliente->piso = Input::get('piso');
				$cliente->localidad = Input::get('localidad');
				$cliente->telefono = Input::get('telefono');
				$cliente->celular = Input::get('celular');
		        $cliente->save();
				return Redirect::to('lista_clientes')->with('error', 'El Cliente ha sido registrado con Éxito')->withInput();
			}
		}
		public function destroy($id){
			$cliente = Cliente::find($id);	        
	        if (is_null ($cliente))
	        {
	            App::abort(404);
	        }
	        $cliente->delete();
	        $clients = Cliente::all();
	        return View::make('lista_clientes')->with('clients', $clients);
		}
		public function getEditCliente($id) {
			$cliente = cliente::find($id);
			if (is_null ($cliente))
			{
			App::abort(404);
			}
			return View::make('edit_cliente')->with('cliente', $cliente);		
		}
		public function update() {
			$inputs = Input::all();
			$reglas = array(
				'nombres' => 'required|min:4', 
				'apellido' => 'required',
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
				$id = Input::get('id');
				$cliente = Cliente::find($id);
				
				$cliente->nombres = Input::get('nombres');
				$cliente->apellido = Input::get('apellido');
				$cliente->tipo_doc = Input::get('tipo_doc');
				$cliente->documento = Input::get('documento');
				$cliente->email = Input::get('email');
				$cliente->calle = Input::get('calle');
				$cliente->num = Input::get('num');
				$cliente->piso = Input::get('piso');
				$cliente->localidad = Input::get('localidad');
				$cliente->telefono = Input::get('telefono');
				$cliente->celular = Input::get('celular');
		        $cliente->save();
				return Redirect::to('lista_clientes')->with('error', 'El Cliente ha sido actualizado con Éxito')->withInput();
			}
		}
	}
?>