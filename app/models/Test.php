<?php

class Test extends Eloquent {

    protected $table = 'test';

    public function set_nombre($string)
    {
		$this->set_nombre('nombre');
    }
}

?>