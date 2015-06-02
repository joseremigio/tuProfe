<?php

class Publicacion extends Eloquent {

    protected $table = 'tp_publicacion';

    protected $fillable= array(
                        'id',
                        'profesor_id',
                        'materia_id',
                        'ubigeo',
                        'estado',
                        'created_at',
                        'updated_at');

}

?>