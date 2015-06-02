<?php

class Profesor extends Eloquent {

    protected $table = 'tp_profesor';

    protected $fillable= array(
                        'id',
                        'nombres',
                        'apellidos',
                        'descripcion',
                        'grado_academico_id',
                        'profesion_id',
                        'universidad_id',
                        'dni',
                        'url_linkedin',
                        'url_twiiter',
                        'url_sitio_web',
                        'celular',
                        'sexo',
                        'fecha_nacimiento',
                        'foto',
                        'estado',
                        'created_at',
                        'updated_at');

 /*   public  $timestamps=false;*/

/*    public function set_nombres($string)
    {
		$this->set_nombres('nombres');
    }
*/
/*    public function set_apellidos($string)
    {
		$this->set_apellidos('apellidos');
    }


    public function set_materias($string)
    {
		$this->set_materias('materias');
    }

    public function set_descripcion($string)
    {
		$this->set_descripcion('adescripcion');
    }
*/


    public function universidad() 
    { 
        return $this->belongsTo('Universidad'); 
    }

    public function gradoAcademico() 
    { 
        return $this->belongsTo('GradoAcademico'); 
    }

     public function profesion() 
    { 
        return $this->belongsTo('Profesion'); 
    }
/*
    public function usuario() 
    {
        return $this->belongsTo('Usuario', 'id', 'profesor_id');
    }
*/
}

?>