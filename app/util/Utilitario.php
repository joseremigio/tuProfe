<?php

class Utilitario {

	static function listSelect($modelo){

		$lista = $modelo::all()->lists('nombre','id');
		$combobox = array(0 => "Seleccione...") + $lista;
    	return $combobox;
	}

	static function listUbigeo($where){

		
		/*$query = Ubigeo::all()->lists('distrito','id');*/
		
	/*	$query = Ubigeo::where('departamento_id','=','01')->distinct()->lists('departamento','id');*/
		$query = Ubigeo::where('distrito', 'LIKE', '%Barra%')->get()->lists('distrito','codigo');

/*		var_dump($query); exit();
*/		
		return $query;

		if (is_null($where)){

			/*$query->distinct()->get(array('departamento_id'));*/

			$query->where('departamento_id','=','01');

		/*	var_dump($query->toSql()); exit();
*/
			return $query;
		}

/*		$keys = ['key1','key2','key3'];
		
		 $query->where('search','LIKE','%'.$key.'%');

		foreach($keys as $key)
		{
		    $query->where('search','LIKE','%'.$key.'%');

		}
		
		$query->take(5);
		echo $query->toSql();*/


	}

}