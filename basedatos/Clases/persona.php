<?php
require_once "Clases/humano.php";

    class persona extends humano
    {
        public $dni;

        function __construct($nombre,$edad,$dni)
        {
            parent::__construct($nombre,$edad);
            $this->dni=$dni;

        }

        public function RetornarJson()
        {
            return json_encode($this,JSON_UNESCAPED_UNICODE);

        }

    }//end class HUMANO

?>