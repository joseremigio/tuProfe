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

		$materia 			= Utilitario::listSelect('Materia');
			    	/*$modalidad 			= Utilitario::listSelect('Modalidad');
			    	$nivelEnsenanza 	= Utilitario::listSelect('NivelEnsenanza');*/
					
		$selected = array();
			    	
		

		if(Input::get())
		{

			$listPublicacion =  $this->listPublicacion(Input::get("ubigeo"));
			$materia_id		 = Input::get("materia_id");
/*			var_dump($materia[1])->getvalue; exit();	
			$materia_nombre	 = $materia[2]->nombre;*/

			$listaSelect = array(
						'listPublicacion'	=> $listPublicacion, 
						'materia'			=> $materia,
						'materia_id'		=> $materia_id
			);

			
			/*var_dump($listaSelect['listPublicacion']); exit();*/

			return  View::make("home.publicaciones",  compact('listaSelect', 'selected'));
		}
		else {

			$listaSelect = array(
			    		/*'nivelEnsenanza'	=> $nivelEnsenanza, */
			'materia'			=> $materia
			    	/*	'modalidad'			=> $modalidad,
			    		'tipoMoneda'		=> $tipoMoneda,
			    		'listPublicacion'	=> $listPublicacion,
			    		'profesor'			=> $profesor*/
			);

			return  View::make("home.index",  compact('listaSelect', 'selected'));	
		}
		
	}

	private function listPublicacion($ubigeo_id){

		/*$ubigeo_id 			= Input::get("ubigeo");
		$materia_id			= Input::get("materia_id");*/

		/*$listPublicacion 	= Publicacion::where(function ($query) {
		    $query->where('ubigeo_id', '=', Input::get("ubigeo"))
		          ->orWhere('materia_id', '=', Input::get("materia_id"));
		})->get();*/

		$listPublicacion 	= Publicacion::where('ubigeo_id', '=', $ubigeo_id)->get();

		return $listPublicacion;
	}


	private function showPublicaciones(){



		

	}

}
