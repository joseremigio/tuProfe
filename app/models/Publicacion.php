<?php

class Publicacion extends Eloquent {

    protected $table = 'tp_publicacion';

    protected $fillable= array(
                        'id',
                        'profesor_id',
                        'materia_id',
                        'ubigeo_id',
                        'cobro_hora',
                        'modalidad_id',
                        'nivel_ensenanza_id',
                        'tipo_moneda_id',
                        'estado',
                        'created_at',
                        'updated_at'
    );

    public function modalidad() 
    { 
        return $this->belongsTo('Modalidad'); 
    }

    public function materia() 
    { 
        return $this->belongsTo('Materia'); 
    }

    public function nivelEnsenanza() 
    { 
        return $this->belongsTo('NivelEnsenanza'); 
    }

    public function tipoMoneda() 
    { 
        return $this->belongsTo('TipoMoneda'); 
    }

    public function ubigeo() 
    { 
        return $this->belongsTo('Ubigeo'); 
    }

    public function profesor() 
    {
        return $this->belongsTo('Profesor'); 
    }

}

?>