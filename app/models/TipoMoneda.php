<?php

class TipoMoneda extends Eloquent {

    protected $table = 'tp_tipo_moneda';

    protected $fillable= array(
                        'id',
                        'nombre',
                        'simbolo',
                        'estado',
                        'created_at',
                        'updated_at');

    public function publicacion() 
    {
        return $this->hasMany('Publicacion','tipo_moneda_id','id'); 
    }

}

?>