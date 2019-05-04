<?php
require_once "Clases/persona.php";
require_once "accesoDatos.php";


    class alumno extends persona
    {
        public $id;
        public $legajo;
        

        function __construct($nombre,$edad,$dni,$legajo)
        {
            parent::__construct($nombre,$edad,$dni,$legajo);
            $this->legajo=$legajo;
           
            
        }

        public static function LlenarAtributos()
        {
            $this->__construct;

        }


        public function RetornarJson()
        {
            return parent::RetornarJson($this);
        }

        //-------FUNCION MOSTRAR ALUMNOS---------------------------------------------------------------------------------------------------

        public function mostrarDatos()
        {

            return "Mostrar Informacion:".$this->id."  ".$this->nombre."  ".$this->edad."  ".$this->dni."  ".$this->legajo;
        }

        //-------FUNCION TRAER ALUMNOS------------------------------------------------------------------------------------------------------

        public static function TraerTodosLosAlumnos()
        {
            $objAccesoDatos=accesoDatos::dameUnObjetoAcceso();
            $consulta=$objAccesoDatos->RetornarConsulta("select id,nombre,edad,dni,legajo from alumnos");
            $consulta->execute();

            //fetchall debe usarse asi para llamar al metodo constructor y asi llamar a sus metodos(constructores) padres
            return $consulta->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'alumno',array('nombre', 'edad','dni','legajo','id'));	

        }

        //------FUNCION TRAER UN ALUMNO(ID)-------------------------------------------------------------------------------------------------
        public static function TraerUnAlumnoPARAM($id)
        {

        $objetoAccesoDatosId=accesoDatos::dameUnObjetoAcceso();
        $consultaId=$objetoAccesoDatosId->RetornarConsulta("select id,nombre,edad,dni,legajo from alumnos where id =:id");
        $consultaId->bindValue(':id',$id,PDO::PARAM_INT);
        $consultaId->execute();

        $alumnoBuscado=$consultaId->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'alumno',array('nombre', 'edad','dni','legajo','id'));
     
        return $alumnoBuscado ;

        }

        //-----FUNCION INSERTAR UN ALUMNO-------------------------------------------------------------------------------------------------

        public function InsertarElAlumnoParametros()
	 {
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("INSERT into alumnos (nombre,edad,dni,legajo)values(:nombre,:edad,:dni,:legajo)");
				$consulta->bindValue(':nombre',$this->nombre, PDO::PARAM_INT);
				$consulta->bindValue(':edad', $this->edad, PDO::PARAM_STR);
                $consulta->bindValue(':dni', $this->dni, PDO::PARAM_STR);
                $consulta->bindValue(':legajo', $this->legajo, PDO::PARAM_STR);
                $consulta->execute();
                //var_dump($consulta);	

				return $objetoAccesoDato->RetornarUltimoIdInsertado();
	 }


     //----------------------FUNCION MODIFICAR ALUMNO---------------------------------------------------------------------------

     public function ModificarAlumnoParametros()
     {
             $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
             $consulta =$objetoAccesoDato->RetornarConsulta("
             update alumnos 
             set nombre=:nombre,
             edad=:edad,
             dni=:dni,
             legajo=:legajo
             WHERE id=:id");
             $consulta->bindValue(':id',$this->id, PDO::PARAM_INT);
             $consulta->bindValue(':nombre',$this->nombre, PDO::PARAM_INT);
             $consulta->bindValue(':edad', $this->edad, PDO::PARAM_STR);
             $consulta->bindValue(':dni', $this->dni, PDO::PARAM_STR);
             $consulta->bindValue(':legajo', $this->legajo, PDO::PARAM_STR);
             $consulta->execute();
             //var_dump($consulta);	

             return $objetoAccesoDato->RetornarUltimoIdInsertado();
     }

     //----------------------BORRAR ALUMNO POR ID------------------------------------------------------------------------------------

     public function BorrarAlumno()
	 {

			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				delete 
				from alumnos 				
				WHERE id=:id");	
				$consulta->bindValue(':id',$this->id, PDO::PARAM_INT);		
                $consulta->execute();
               
				return $consulta->rowCount();

	 }





    }
?>