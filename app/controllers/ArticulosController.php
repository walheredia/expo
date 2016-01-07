<?php
	class ArticulosController extends BaseController {
		public function get_nuevo(){
			$rubros = Rubro::all();
			$sucursales = Sucursal::all();

			return View::make('register_articulo')->with('rubros',$rubros)
												->with('sucursales',$sucursales);
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
				'sucursal' => 'required|integer',
				'stock' => 'required|integer',
				'prec_compra' => 'required',
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
					$articulo->save();
					$insertedId = $articulo->id;

					$stock = new Stock;
					$stock->id_articulo = $insertedId;
					$stock->id_sucursal = Input::get('sucursal');
					$stock->cantidad = Input::get('stock');
					$stock->save();
					DB::commit();
					return Redirect::to('lista_articulos')->with('error', 'El Artículo ha sido registrado con Éxito')->withInput();
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
            ->select('articulos.id_articulo', 'rubros.rubro', 'articulos.nombre', 'articulos.descripcion', 'articulos.alto', 'articulos.largo', 'articulos.ancho_prof', 'rubros.id_rubro')
            ->get();
			return View::make('lista_articulos')->with('articulos', $articulos);
		}
		public function destroy($id_articulo){
			$articulo = Articulo::find($id_articulo);	        
	        if (is_null ($articulo))
	        {
	            App::abort(404);
	        }
	        $articulo->delete();
	        $articulos = DB::table('articulos')
            ->join('rubros', 'articulos.id_rubro', '=', 'rubros.id_rubro')
            ->select('articulos.id_articulo', 'rubros.rubro', 'articulos.nombre', 'articulos.descripcion', 'articulos.alto', 'articulos.largo', 'articulos.ancho_prof', 'rubros.id_rubro')
            ->get();
			return View::make('lista_articulos')->with('articulos', $articulos);
		}
		public function getEditArticulo($id_articulo) {
			$articulo = Articulo::find($id_articulo);
			$rubros = Rubro::all();
			if (is_null ($articulo))
			{
			App::abort(404);
			}
			return View::make('edit_articulo')->with('articulo', $articulo)
											->with('rubros', $rubros);
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
				$articulo->id_rubro = Input::get('rubro');
		        $articulo->save();

		        $articulos = DB::table('articulos')
	            ->join('rubros', 'articulos.id_rubro', '=', 'rubros.id_rubro')
	            ->select('articulos.id_articulo', 'rubros.rubro', 'articulos.nombre', 'articulos.descripcion', 'articulos.alto', 'articulos.largo', 'articulos.ancho_prof', 'rubros.id_rubro')
	            ->get();
				return Redirect::to('lista_articulos')->with('articulos', $articulos)
													->with('error', 'El Artículo ha sido actualizado con Éxito')->withInput();
			}
		}

	}
?>

