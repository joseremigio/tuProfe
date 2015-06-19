<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 						'HomeController@showWelcome');

Route::post('home/publicaciones/', 		'HomeController@showWelcome');

Route::get('home/perfil/{id}', 			'PublicacionController@showPublicacion');




/*Route::get('profe', 'ProfesorController@listarProfesores');
*/
/*Route::resource('publicidad', 'PublicidadController');*/

/*Route::get("datosPersonales", 'ProfesorController@nuevo');

Route::post("datosPersonales", 'ProfesorController@grabar'); */

/*Route::get("editarDatosPersonales", 'ProfesorController@editar'); 
*/

Route::get('usuario/update/{id}', 		'UsuarioController@update');

Route::post('usuario/update/{id}', 		'UsuarioController@update');

Route::get('profesor/update/{id}', 		'ProfesorController@update');

Route::post('profesor/update/{id}', 	'ProfesorController@update');

Route::get('publicacion/show/{id}', 	'PublicacionController@show'); // id = profesor_id

Route::post('publicacion/show/{id}', 	'PublicacionController@show'); // id = profesor_id

Route::get('publicacion/delete/{id}', 	'PublicacionController@delete'); // id = id

Route::post('publicacion/delete/{id}', 	'PublicacionController@delete'); // id = id


/*Route::post('utilitario/listUbigeo/{query}', function($id)
{
    return Utilitario::listUbigeo($id);
});
*/
Route::get('utilitario/listUbigeo/{query}', function($id)
{
    return Utilitario::listUbigeo($id);
});

// Display all SQL executed in Eloquent
Event::listen('illuminate.query', function($query)
{
    Log::info("Consulta: ".$query);
});

/*
App::missing(function($exception)
{
      return Response::view('errors.missing', array('http://localhost/laravel/public/error/index.html' => Request::url()), 404);
});*/