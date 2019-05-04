<?php

require_once "Clases/alumno.php";


//------------------------------------------------------------------------------------------------
echo "<br/>";
echo "MOSTRAR ALL ALUMNOS";
echo "<br/>";

$arraydeAlumnos= alumno::TraerTodosLosAlumnos();

foreach ($arraydeAlumnos as $alumno ) 
{
    print_r($alumno->mostrarDatos());
    print("<br>");
}

//------------------------------------------------------------------------------------------------
echo "<br/>";
echo "MOSTRAR UN ALUMNOS POR ID";
echo "<br/>";


if (isset($_GET["id"]))
{
$id=$_GET["id"];

$unAlumno=alumno::TraerUnAlumnoPARAM($id);


    
            foreach ($unAlumno as $key) 
            {
                print_r($key->mostrarDatos());
                print("<br>");
            }
                
}           
            //print_r($unAlumno->mostrarDatos());

//-------------------------------------------------------------------------------------------------        
       




?>