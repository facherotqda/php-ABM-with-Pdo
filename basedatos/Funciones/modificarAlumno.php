<?php
require_once "Clases/alumno.php";


/* 
$unCd =cd::TraerUnCd(4);
                                    $unCd->titulo="titulo cambiado";
                                    $unCd->año=date("his");
                                    $unCd->cantante="cantante cambiado";
                                    $cantidadDeAfectadas=$unCd->ModificarCdParametros();
                                    print("filas afectadas :$cantidadDeAfectadas<br>");
 */

//Funciona con "x-www-form-urlencoded"
parse_str(file_get_contents("php://input"),$parametros);
if(isset ($parametros["id"]) && isset($parametros["nombre"]) && isset($parametros["edad"]) && isset($parametros["dni"]) && isset($parametros["legajo"]))
{   
    $id=$parametros["id"];
	$nombre = $parametros["nombre"];
	$edad = $parametros["edad"];
	$dni = $parametros["dni"];
    $legajo = $parametros["legajo"];
    
  
    $alumnoModificar=alumno::TraerUnAlumnoPARAM($id);
   
    

if(isset(  $alumnoModificar))
{
    foreach ($alumnoModificar as $key) 
    {
        print_r($key->mostrarDatos());
        print("<br>");

    }

}
else
echo "asd";
    //$nuevoAlumno=alumno::ModificarAlumnoParametros();

   

}

else
{
	echo '<br/>Falta información:  requeridos.';
}







?>