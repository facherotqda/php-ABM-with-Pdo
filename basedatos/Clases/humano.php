<?php

abstract class humano
{
    public $nombre;
    public $edad;

    function __construct($nombre,$edad)
    {
        $this->nombre=$nombre;
        $this->edad=$edad;

    }

    abstract function RetornarJson();

}//end class HUMANO


?>