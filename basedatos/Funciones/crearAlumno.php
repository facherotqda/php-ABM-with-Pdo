<?php

require_once "Clases/alumno.php";

echo "CREAMOS UN ALUMNO CON PARAMETROS";
echo "<br/>";

if(isset($_POST["nombre"]) && isset($_POST["edad"]) && isset($_POST["dni"]) && isset($_POST["legajo"]))
{
    $nombre = $_POST["nombre"];
    $edad = $_POST["edad"];
    $dni = $_POST["dni"];
    $legajo = $_POST["legajo"];
    
    $miAlumno = new Alumno($nombre, $edad, $dni, $legajo);


    $UltimoId=$miAlumno->InsertarElAlumnoParametros();


    var_dump($UltimoId);

    print("Ultimo ID: $UltimoId <br> ");
    
   // var_dump($miAlumno);

}

else
{
    echo '<br/>Falta información: "nombre", "edad", "dni" y "legajo" son requeridos.';
}


                           




?>