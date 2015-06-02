<?php

class Usuario extends Eloquent {

    protected $table = 'tp_usuario';

    protected $guarded = array('id', 'password');

    protected $fillable= array(
                        'profesor_id',
                        'nombre_completo',
                        'email',
                        'faceboook',
                        'estado',
                        'config',
                        'created_at',
                        'updated_at');


    public function set_password($string)
    {
        $this->set_attribute('password', Hash::make($string));
    }

    public function profesor() {
        return $this->hasOne('Profesor', 'id', 'profesor_id');
    }

}

?>