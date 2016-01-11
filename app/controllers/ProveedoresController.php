<?php
	class ProveedoresController extends BaseController {
		public function get_nuevo(){
			$localidades = Localidad::all();
			return View::make('register_proveedor')->with('localidades',$localidades);
		}
		public function post_nuevo(){
			$inputs = Input::all();
			$reglas = array(
				'nom_raz' => 'required|max:50',
				'contacto' => 'max:50',
				'direccion' => 'required',
				'email' => 'email',
				'tel' => 'max:50',
				'nextel' => 'max:50',
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
				$proveedor = new Proveedor;
				$proveedor->nom_raz = Input::get('nom_raz');	
				$proveedor->contacto = Input::get('contacto');	
				$proveedor->direccion = Input::get('direccion');	
				$proveedor->id_localidad = Input::get('localidad');
				$proveedor->email = Input::get('email');	
				$proveedor->tel = Input::get('tel');	
				$proveedor->nextel = Input::get('nextel');
				$proveedor->web = Input::get('web');	

		        $proveedor->save();
				return Redirect::to('lista_proveedores')->with('error', 'El Proveedor ha sido registrado con Éxito')->withInput();
			}
		}
		public function all_proveedores() {
			$proveedores = DB::table('proveedores')
            ->join('localidades', 'proveedores.id_localidad', '=', 'localidades.id_localidad')
            ->select('proveedores.id_proveedor','proveedores.nom_raz', 'proveedores.contacto', 'proveedores.direccion', 'localidades.localidad', 'proveedores.email', 'proveedores.tel', 'proveedores.nextel', 'proveedores.web')
            ->get();
			return View::make('lista_proveedores')->with('proveedores', $proveedores);
		}
	}
?>