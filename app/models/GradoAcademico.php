<?php

class GradoAcademico extends Eloquent {

    protected $table = 'tp_grado_academico';

    protected $fillable= array(
                        'id',
                        'nombre',
                        'estado',
                        'created_at',
                        'updated_at');


    public function profesor() 
    {
        return $this->hasMany('Profesor','grado_academico_id','id'); 
    }

}

?>