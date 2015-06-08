<?php

class PublicidadController extends BaseController {

	public function  show($id){

		$profesor = Profesor::find($id);
    

    	if (is_null($profesor)){

    		return Redirect::to('profesor.formulario');
    	}

		if(Input::get())
		{
			 var_dump(Input::all()); exit();

			
		}
		else {

			$materia 			= Utilitario::listSelect('Materia');
	    	$modalidad 			= Utilitario::listSelect('Modalidad');
	    	$nivelEnsenanza 	= Utilitario::listSelect('NivelEnsenanza');
			$tipoMoneda 		= Utilitario::listSelect('TipoMoneda');

	    	$selected = array();
	    	
	    	$listaSelect = array(
	    		'nivelEnsenanza'=> $nivelEnsenanza, 
	    		'materia'		=> $materia, 
	    		'modalidad'		=> $modalidad,
	    		'tipoMoneda'	=> $tipoMoneda,
	    		'profesor'		=> $profesor
	    	);

			return  View::make("publicacion.update",  compact('listaSelect', 'selected'));
		}
    	
	}

	private function validateForms($inputs = array(), $action){
 
		$rules = array(
	        'nombres'  				=> 'required|min:1|max:100',
	        'apellidos'  			=> 'required|min:1|max:100',
	        'grado_academico_id'  	=> 'required|min:1|max:5',
	        'profesion_id'  		=> 'required|min:1|max:5',
	        'universidad_id'  		=> 'required|min:1|max:100',
			'url_linkedin'  		=> 'required|min:1|max:200',
			'url_twiiter'  			=> 'required|min:1|max:200',
			'url_sitio_web'  		=> 'required|min:1|max:200',
			'celular'  				=> 'required|min:9|max:9',
			'sexo'     				=> 'required',
			'foto'     				=>  $action==='NEW'?'required':'',
			'descripcion'  			=> 'required|min:2|max:180'
	    );
	    
	    $messages = array(
	        'required'  => 'El campo :attribute es obligatorio.',
	        'min'       => 'El campo :attribute no puede tener menos de :min carácteres.',
	        'max'       => 'El campo :attribute no puede tener más de :min carácteres.',
	        'unique'    => 'El email ingresado ya está registrado en el blog',
	        'confirmed' => 'Los passwords no coinciden'
	    );
		
    
    	$validation = Validator::make($inputs, $rules, $messages);
 
    	if($validation->fails())
    	{
    		return $validation;
    	}else{
 
    		return true;
    	}
	}

}	