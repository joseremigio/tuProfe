<?php

class UsuarioController extends BaseController {

	public function  update($id){

    	$usuario  =Usuario::where('profesor_id', '=', $id)->firstOrFail();

    	if (is_null($usuario)){

    		return Redirect::to('usuario/update/'.$id);
    	}

		if(Input::get())
		{

			$validation = $this->validateForms(Input::all());

	    	if ($validation === true)
			{

				$usuario->password=Hash::make(Input::get("password"));

				if($usuario->save())
				{
				 	return Redirect::to('usuario/update/'.$id)->with(array('confirm' => 'Se Actualizo Contraseña.'));
				}

			}else{
				return Redirect::to('usuario/update/'.$id)->withErrors($validation)->withInput();
			}
		}
		else {

			$profesor= $usuario->profesor;

	/*		if ($profesor->nombres==='' && $profesor->apellidos==='')  {
				$profesor = '';
			}*/

	    	$listaSelect = array(
	    		'usuario'		=> $usuario, 
	    		'profesor'		=> $profesor
	    	);

			return  View::make("usuario.update" , compact('listaSelect'));
		}
		
	}

	private function validateForms($inputs = array()){
 
		$rules = array(
	        'password'  			=> 'required|min:5|max:100|confirmed',
	        'password_confirmation' => 'required|min:5|max:100'
	    );
	    
	    $messages = array(
	        'required'  => 'El campo :attribute es obligatorio.',
	        'min'       => 'El campo :attribute no puede tener menos de :min carácteres.',
	        'max'       => 'El campo :attribute no puede tener más de :min carácteres.',
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