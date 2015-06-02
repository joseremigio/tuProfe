<?php

class ProfesorController extends BaseController {

	public function listarProfesores(){

		$profesores= Profesor::all();
		return View::make('profesor.index')-> with ('profesores',$profesores);
	}

	public function grabar(){


		$file = Input::file("foto");


		$validation = $this->validateForms(Input::all(),'NEW');

	    if ($validation === true)
	    {
	    	$profesor = new Profesor(array(
				"nombres"				=>	Input::get("nombres"),
				"apellidos"				=>	Input::get("apellidos"),
				"grado_academico_id"	=>	Input::get("grado_academico_id"),
				"profesion_id"			=>	Input::get("profesion_id"),
				"universidad_id"		=>	Input::get("universidad_id"),
				"dni"					=>	Input::get("dni"),
				"url_linkedin"			=>	Input::get("url_linkedin"),
				"url_twiiter"			=>	Input::get("url_twiiter"),
				"url_sitio_web"			=>	Input::get("url_sitio_web"),
				"celular"				=>	Input::get("celular"),
				"sexo"					=>	Input::get("sexo"),
				"foto"					=>	$file->getClientOriginalName(),
				"descripcion"			=>	Input::get("descripcion")
			));


	        if($profesor->save()){
	        	//guardamos la imagen en public/imgs con el nombre original
	        	$file->move("imgs",$file->getClientOriginalName());
				//redirigimos con un mensaje flash
				return Redirect::to('datosPersonales')->with(array('confirm' => 'Te has registrado correctamente.'));
	        }
	        
	    }else{
	        return Redirect::to('datosPersonales')->withErrors($validation)->withInput();
	    }
	}

	public function nuevo(){

		return "aca";
		
    	$gradoAcademico 	= Utilitario::listSelect('GradoAcademico');
    	$profesion 			= Utilitario::listSelect('Profesion');
    	$universidad 		= Utilitario::listSelect('Universidad');

    	$selected = array();
    	
    	$listaSelect = array(
    		'profesion'		=> $profesion, 
    		'gradoAcademico'=> $gradoAcademico, 
    		'universidad'	=> $universidad
    	);

    	return  View::make("datosPersonales",  compact('listaSelect', 'selected'));

	}

	public function update($id){


		$file = Input::file("foto");

		$profesor = Profesor::find($id);
    

    	if (is_null($profesor)){

    		return Redirect::to('profesor.formulario');
    	}

		if(Input::get())
		{
			$action;

			if ($profesor->foto!=''){
				$action='EDIT';
			}else{
				$action='NEW';
			}

			$validation = $this->validateForms(Input::all(),$action);

			
	    	if ($validation === true)
			{
				$nombreFoto;

				if (is_null($file))
				{
					$nombreFoto = $profesor->foto;
				} else {

					$nombreFoto = md5($profesor->id).'.jpg';
					
					File::delete("imgs/".$nombreFoto);

					$file->move("imgs", $nombreFoto);
					
					//resize image
					$image = Image::make("imgs/".$nombreFoto)->resize(200, 200)->save();

				}

				
				$profesor->nombres				=ucwords(Input::get("nombres"));
				$profesor->apellidos			=ucwords(Input::get("apellidos"));
				$profesor->grado_academico_id	=Input::get("grado_academico_id");
				$profesor->profesion_id			=Input::get("profesion_id");
				$profesor->universidad_id		=Input::get("universidad_id");
				$profesor->dni 					=Input::get("dni");
				$profesor->url_linkedin			=Input::get("url_linkedin");
				$profesor->url_twiiter			=Input::get("url_twiiter");
				$profesor->url_sitio_web		=Input::get("url_sitio_web");
				$profesor->celular				=Input::get("celular");
				$profesor->sexo 				=Input::get("sexo");
				$profesor->fecha_nacimiento 	=Input::get("fecha_nacimiento");
				$profesor->foto 				=$nombreFoto;
				$profesor->descripcion			=Input::get("descripcion");

				if($profesor->save())
				{				
				 	return Redirect::to('profesor/update/'.$id)->with(array('confirm' => 'Se actualizó tus datos correctamente.'));
				}

			}else{
				return Redirect::to('profesor/update/'.$id)->withErrors($validation)->withInput();
			}
		}
		else {

			$gradoAcademico 	= Utilitario::listSelect('GradoAcademico');
	    	$profesion 			= Utilitario::listSelect('Profesion');
	    	$universidad 		= Utilitario::listSelect('Universidad');

	    	$selected = array();
	    	
	    	$listaSelect = array(
	    		'profesion'		=> $profesion, 
	    		'gradoAcademico'=> $gradoAcademico, 
	    		'universidad'	=> $universidad,
	    		'profesor'		=> $profesor
	    	);

			return  View::make("profesor.update",  compact('listaSelect', 'selected'));
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
