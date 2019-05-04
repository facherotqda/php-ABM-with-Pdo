<?php

require_once "Clases/alumno.php";

//funciona con "x-www.form-urlencoded"

parse_str(file_get_contents("php://input"),$parametros);

    if(isset($parametros["id"]))
    {
        $id=$parametros["id"];

        
        $unAlumno=alumno::TraerUnAlumnoPARAM($id);
       
      
            //verifico si existe

            foreach ($unAlumno as $key) 
            {
                print_r($key->BorrarAlumno());
                print("<br>");
            }

        //     if(isset($unAlumno->id))
        //     {
        //    // $cantidadDeAfectadas=$unAlumno->BorrarAlumno();
        //    // print("filas afectadas :$cantidadDeAfectadas<br>");
        //     }
     

    }

    else
    {
    echo 'Falta información: "dni" es requerido.';
    }


    
                                  
    

?>