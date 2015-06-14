<?php

class NivelEnsenanza extends Eloquent {

    protected $table = 'tp_nivel_ensenanza';

    protected $fillable= array(
                        'id',
                        'nombre',
                        'estado',
                        'created_at',
                        'updated_at');

    public function publicacion() 
    {
        return $this->hasMany('Publicacion','nivel_ensenanza_id','id'); 
    }

}

?>