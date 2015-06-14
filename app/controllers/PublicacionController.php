<?php

class PublicacionController extends BaseController {

	public function  show($id){

		try
		{
		   		$profesor = Profesor::find($id);
    
		    	if (is_null($profesor)){

		    		return Redirect::to('profesor.formulario'); // MODIFICAR
		    	}

		    	//Si se va editar
				if(Input::get())
				{
					$publicacion = new Publicacion(array(
						"profesor_id"				=>	$id,
						"materia_id"				=>	Input::get("materia_id"),
						"ubigeo_id"					=>	Input::get("ubigeo"),
						"cobro_hora"				=>	Input::get("cobro_hora"),
						"modalidad_id"				=>	Input::get("modalidad_id"),
						"nivel_ensenanza_id"		=>	Input::get("nivel_ensenanza_id"),
						"tipo_moneda_id"			=>	Input::get("tipo_moneda_id")
					));

					if (empty(Input::get("ubigeo"))==false) {

						if($publicacion->save())
						{				
								 return Redirect::to('publicacion/show/'.$id)->with(array('confirm' => 'Se agregó publicación.'));
						}
					}
					
				}
				else {

					$materia 			= Utilitario::listSelect('Materia');
			    	$modalidad 			= Utilitario::listSelect('Modalidad');
			    	$nivelEnsenanza 	= Utilitario::listSelect('NivelEnsenanza');
					$tipoMoneda 		= Utilitario::listSelect('TipoMoneda');
					$listPublicacion	= $this->listPublicacion ($id);

			    	$selected = array();
			    	
			    	$listaSelect = array(
			    		'nivelEnsenanza'	=> $nivelEnsenanza, 
			    		'materia'			=> $materia, 
			    		'modalidad'			=> $modalidad,
			    		'tipoMoneda'		=> $tipoMoneda,
			    		'listPublicacion'	=> $listPublicacion,
			    		'profesor'			=> $profesor
			    	);

			    	$this->actualizarNivelesYMaterias($listPublicacion, $profesor);

					return  View::make("publicacion.update",  compact('listaSelect', 'selected'));
				}
		}
		catch(Exception $ex)
		{
		    /*$contact->softDelete = true;
		    $contact->delete();*/
		     return 'Sorry! Something is wrong with this account!';
		}
	}

	private function actualizarNivelesYMaterias($listPublicacion, $profesor){

		$niveles ='';
		$materias='';

		foreach ($listPublicacion as $publicacion) {
			
			$nivel =  $publicacion->nivelEnsenanza->nombre;

			if ($niveles===''){

				$niveles = $nivel;
			}
			else {
				
				if (strpos($niveles, $nivel)===false) {
					$niveles = $niveles.', '.$nivel;
				}
			}
			

			$materia =  $publicacion->materia->nombre;

			if ($materias===''){
				
				$materias = $materia;
			}
			else {
				
				if (strpos($materias, $materia)===false) {
					$materias = $materias.', '.$materia;
				}
			}
		}

		$niveles_materias = $niveles.';'.$materias;

		if (strcmp($niveles_materias,$profesor ->niveles_materias)!=0){
			$profesor->niveles_materias = $niveles_materias;
			$profesor->save();
		}
	}

	private function listPublicacion($profesor_id){

		$list = Publicacion::where('profesor_id', '=', $profesor_id)->get();
		return $list;
	}

/*	private function validarUbigeo($ubigeo_id, $profesor_id){

		$publicacion = Publicacion::where('ubigeo_id', '=', $ubigeo_id)->where('profesor_id', '=', $profesor_id)->first();
		return $publicacion;
	}*/

	public function delete($id){

		$publicacion = Publicacion::find($id);
		$publicacion->delete();

		return Redirect::to('publicacion/show/'.$publicacion->profesor_id)->withErrors("La Publicación se elimino satisfactoriamente.")->withInput();
	}

}	