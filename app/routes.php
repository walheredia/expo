<?php

/*Llamadas al controlador Auth*/
Route::get('login', 'AuthController@showLogin'); // Mostrar login
Route::post('login', 'AuthController@postLogin'); // Verificar datos
Route::get('logout', 'AuthController@logOut'); // Finalizar sesión


/*Rutas privadas solo para usuarios autenticados*/
Route::group(['before' => 'auth'], function()
{
    Route::get('/', 'HomeController@showWelcome'); // Vista de inicio

    //Usuarios
    Route::get('register', 'UsuariosController@get_nuevo');
	Route::post('register', 'UsuariosController@post_nuevo');
	Route::get('edit_user{id}', 'UsuariosController@getEditUsuario')->where('id', '[0-9]+');
	Route::post('edit_user', 'UsuariosController@update');
	Route::get('lista_usuarios{id}', 'UsuariosController@destroy');
	Route::get('lista_usuarios', 'UsuariosController@all_users');

	//Clientes 
	Route::get('register_cliente', 'ClientesController@get_nuevo');
	Route::post('register_cliente', 'ClientesController@post_nuevo');
	Route::get('lista_clientes', 'ClientesController@all_clients');
	Route::get('lista_clientes{id}', 'ClientesController@destroy');
	Route::get('edit_cliente{id}', 'ClientesController@getEditCliente')->where('id', '[0-9]+');
	Route::post('edit_cliente', 'ClientesController@update');

	//Proveedores
	Route::get('register_proveedor', 'ProveedoresController@get_nuevo');
	Route::post('register_proveedor', 'ProveedoresController@post_nuevo');
	Route::get('lista_proveedores', 'ProveedoresController@all_proveedores');
	Route::get('lista_proveedores{id}', 'ProveedoresController@destroy');
	Route::get('edit_proveedor{id}', 'ProveedoresController@getEditProveedor')->where('id', '[0-9]+');
	Route::post('edit_proveedor', 'ProveedoresController@update');

	//Articulos
	Route::get('register_articulo', 'ArticulosController@get_nuevo');
	Route::post('register_articulo', 'ArticulosController@post_nuevo');

	//Route::match(array('get', 'post'), ('lista_articulos', 'ArticulosController@all_articles'));
	//Route::match(array('GET', 'POST'), 'lista_articulos', array('uses' => 'ArticulosController@all_articles'));
	Route::get('lista_articulos', 'ArticulosController@all_articles');
	Route::post('lista_articulos', 'ArticulosController@search_article');

	Route::get('lista_articulos{id_articulo}', 'ArticulosController@destroy');

	Route::get('edit_articulo{id}', 'ArticulosController@getEditArticulo')->where('id', '[0-9]+');
	Route::post('edit_articulo', 'ArticulosController@update');

	//Rubros
	Route::get('register_rubro', 'RubrosController@get_nuevo');
	Route::post('register_rubro', 'RubrosController@post_nuevo');
	Route::get('lista_rubros', 'RubrosController@all_rubros');

	//Localidades
	Route::get('register_localidad', 'LocalidadesController@get_nuevo');
	Route::post('register_localidad', 'LocalidadesController@post_nuevo');
	Route::get('lista_localidades', 'LocalidadesController@all_localidades');

	//Stock
	Route::get('edit_stock{id}', 'StockController@getEditStock')->where('id', '[0-9]+');
	Route::post('edit_stock', 'StockController@update');
});

App::missing(function($exception) {
    return "Exception";

});





/*Route::get('/', 'HomeController@showWelcome');

// Rutas de /usuario
Route::get('usuario', 'UserController@getIndex');

//Pestañas de inscripcion
Route::get('inscripcion','AlumnController@getIndex');
Route::get('inscripcion/alumno', 'AlumnController@getTabAlumno');
Route::get('inscripcion/familiares', 'AlumnController@getTabFamiliares');
Route::get('inscripcion/salud', 'AlumnController@getTabSalud');
Route::get('inscripcion/sae', 'AlumnController@getTabSae');

Route::get('inscripcion/alumno/{id}', 'AlumnController@getEditTabAlumno')->where('id', '[0-9]+');
Route::get('inscripcion/familiares/{id}', 'AlumnController@getEditTabFamiliares')->where('id', '[0-9]+');
Route::get('inscripcion/salud/{id}', 'AlumnController@getEditTabSalud')->where('id', '[0-9]+');
Route::get('inscripcion/sae/{id}', 'AlumnController@getEditTabSae')->where('id', '[0-9]+');

//Ruta de validaciones
Route::get('validaciones', 'AlumnController@validaciones');
Route::get('inscripcion/alumno/validaciones', 'AlumnController@validaciones');
Route::get('inscripcion/familiares/validaciones', 'AlumnController@validaciones');
Route::get('inscripcion/salud/validaciones', 'AlumnController@validaciones');

//Ruta de alta de alumno 
Route::post('inscripcion/alumno', 'AlumnController@alta_alumno');

//Ruta de alta Familiares/tutores
Route::post('inscripcion/familiares', 'AlumnController@alta_familiar');

//Ruta de alta salud
Route::post('inscripcion/salud', 'AlumnController@alta_salud');

//Ruta de inscripcion
Route::get('login' , 'UserController@getLogin');
Route::post('login' , 'UserController@postLogin');
Route::get('logout','UserController@logout');

*/