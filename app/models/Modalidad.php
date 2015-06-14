<?php

class Modalidad extends Eloquent {

    protected $table = 'tp_modalidad';

    protected $fillable= array(
                        'id',
                        'nombre',
                        'estado',
                        'created_at',
                        'updated_at'
    );

    public function publicacion() 
    {
        return $this->hasMany('Publicacion','modalidad_id','id'); 
    }

}

?>