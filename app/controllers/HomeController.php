<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{

		$materias 			= Utilitario::listSelect('Materia');
			    	/*$modalidad 			= Utilitario::listSelect('Modalidad');
			    	$nivelEnsenanza 	= Utilitario::listSelect('NivelEnsenanza');*/
					
		$selected = array();
			    	
		

		if(Input::get())
		{
			$materia_id		 	= Input::get("materia_id");
			$nivelEnsenanza 	= Utilitario::listSelect('NivelEnsenanza');

			$listPublicacion 	= $this->listPublicacion(Input::get("ubigeo"), $materia_id);
			
		/*	$materia 		 = Materia::find($materia_id);*/

			$listaSelect = array(
						'listPublicacion'	=> $listPublicacion, 
						'materias'			=> $materias,
						'materia_id'		=> $materia_id,
						'nivelEnsenanza'	=> $nivelEnsenanza
			);

			
			/*var_dump($listaSelect['listPublicacion']); exit();*/

			return  View::make("home.publicaciones",  compact('listaSelect', 'selected'));
		}
		else {

			$listaSelect = array(
			    		/*'nivelEnsenanza'	=> $nivelEnsenanza, */
			'materias'			=> $materias
			    	/*	'modalidad'			=> $modalidad,
			    		'tipoMoneda'		=> $tipoMoneda,
			    		'listPublicacion'	=> $listPublicacion,
			    		'profesor'			=> $profesor*/
			);

			return  View::make("home.index",  compact('listaSelect', 'selected'));	
		}
		
	}

	private function listPublicacion($ubigeo_id, $materia_id){

		if (empty($ubigeo_id))
		{
			$listPublicacion 	= Publicacion::where('ubigeo_id', 'LIKE', '%0114%')->where('materia_id', '=', $materia_id)->get();
		} else {
			$listPublicacion 	= Publicacion::where('ubigeo_id', '=', $ubigeo_id)->where('materia_id', '=', $materia_id)->get();
		}

		return $listPublicacion;
	}
}
