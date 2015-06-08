<?php

class Utilitario {



	static function listSelect($modelo){

		$lista = $modelo::all()->lists('nombre','id');
		$combobox = array(0 => "Seleccione...") + $lista;
    	return $combobox;
	}

	static function listUbigeo($query){


		$query = Ubigeo::where('distrito', 'LIKE', '%'.$query.'%')->orWhere('provincia', 'LIKE', '%'.$query.'%')->orWhere('departamento', 'LIKE', '%'.$query.'%')->get();
		$a_json = array();
		$a_json_row = array();
		
		foreach($query as $row){

		  $a_json_row = array();
		  /*$a_json_row[$row->codigo] = ($row->distrito).", ".($row->provincia).", ".($row->departamento);*/
		  $a_json_row['id'] = $row->codigo;
		  $a_json_row['value'] = ($row->distrito).", ".($row->provincia).", ".($row->departamento);
		  array_push($a_json, $a_json_row);

		}
		 
		$json = json_encode($a_json);

		return ($json);
	}

	static function lista() {

			$query = Ubigeo::all()->lists('provincia','codigo');
		
			return $query;

	}

}