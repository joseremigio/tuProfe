<?php

class ProfesorController extends BaseController {

	public function listarProfesores(){

		$profesores= Profesor::all();
		return View::make('profesor.index')-> with ('profesores',$profesores);
	}

	public function update($id){


		$file = Input::file("foto");

		$profesor = Profesor::find($id);
    

    	if (is_null($profesor)){

    		return Redirect::to('profesor.formulario'); // corregir
    	}

    	//Si se va editar
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

	public function show($profesor_id){

		$profesor 			= Profesor::find($profesor_id);

		return View::make("home.profile")->with('profesor',$profesor);
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
			'celular'  				=> 'required|min:9|max:12',
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
