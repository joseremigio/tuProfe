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

Route::get('/', function()
{

/*	$test = new Test();
	$test->nombre="123j";
	$test->save();*/

	return "se grabo";
});



/*Route::get('profe', 'ProfesorController@listarProfesores');
*/
/*Route::resource('publicidad', 'PublicidadController');*/

/*Route::get("datosPersonales", 'ProfesorController@nuevo');

Route::post("datosPersonales", 'ProfesorController@grabar'); */

/*Route::get("editarDatosPersonales", 'ProfesorController@editar'); 
*/

Route::get('usuario/update/{id}', 'UsuarioController@update');

Route::post('usuario/update/{id}', 'UsuarioController@update');

Route::get('profesor/update/{id}', 'ProfesorController@update');

Route::post('profesor/update/{id}', 'ProfesorController@update');

Route::get('publicidad/show/{id}', 'PublicidadController@show');

Route::post('publicidad/show/{id}', 'PublicidadController@show');



/*Route::post('utilitario/listUbigeo/{query}', function($id)
{
    return Utilitario::listUbigeo($id);
});
*/
Route::get('utilitario/listUbigeo/{query}', function($id)
{
    return Utilitario::listUbigeo($id);
});