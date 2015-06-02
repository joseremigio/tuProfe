<?php

class Materia extends Eloquent {

    protected $table = 'tp_materia';

    protected $fillable= array(
                        'id',
                        'nombre',
                        'estado',
                        'created_at',
                        'updated_at');

}

?>