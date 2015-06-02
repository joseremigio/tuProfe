<?php

class Universidad extends Eloquent {

    protected $table = 'tp_universidad';

    protected $fillable= array(
                        'id',
                        'nombre',
                        'estado',
                        'created_at',
                        'updated_at');

	
	public function profesor() 
    {
        return $this->hasMany('Profesor','universidad_id','id'); 
    }
}
?>