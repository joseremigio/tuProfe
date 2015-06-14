<?php

class Ubigeo extends Eloquent {

    protected $table = 'tp_ubigeo';

    protected $fillable= array(
                        'id',
                        'pais_id',
                        'departamento_id',
                        'provincia_id',
                        'distrito_id',
                        'pais',
                        'departamento',
                        'provincia',
                        'distrito',
                        'created_at',
                        'updated_at');

    public function publicacion() 
    {
        return $this->hasMany('Publicacion','ubigeo_id','id'); 
    }
}

?>