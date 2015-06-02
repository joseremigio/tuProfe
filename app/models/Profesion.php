<?php

class Profesion extends Eloquent {

    protected $table = 'tp_profesion';

    protected $fillable= array(
                        'id',
                        'nombre',
                        'estado',
                        'created_at',
                        'updated_at');

 	public function profesor() 
    {
        return $this->hasMany('Profesor','profesion_id','id'); 
    }
}

?>