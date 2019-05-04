<?php

class accesoDatos
{

    private static $objetoAccesoDatos;
    private $objetoPDO;


    private function __construct()
    {
     try{    
            $this->objetoPDO = new PDO('mysql:host=localhost;dbname=alumnos;charset=utf8', 'root', '', array(PDO::ATTR_EMULATE_PREPARES => false,PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            $this->objetoPDO->exec("SET CHARACTER SET utf8");
           
        }
         catch(PDOExeption $e)
         {
            print "Error!: " . $e->getMessage();
            die();
         }

    }


    public static function dameUnObjetoAcceso()
    {
        if(!isset(self::$objetoAccesoDatos))
        {
            self::$objetoAccesoDatos=new AccesoDatos();
        }
        return self::$objetoAccesoDatos;
    }

    public function RetornarConsulta($sql)
    {
        return $this->objetoPDO->prepare($sql);
    }

    public function RetornarUltimoIdInsertado()
    { 
        return $this->objetoPDO->lastInsertId(); 
    }


    public function __clone()
    {
        trigger_error('La clonación de este objeto no está permitida', E_USER_ERROR);
    }
    

}//end class accesoDatos

?>