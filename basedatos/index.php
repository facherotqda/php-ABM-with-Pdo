<?php

    $MetodoHttpp=$_SERVER["REQUEST_METHOD"];
    echo "METODO  : ".$MetodoHttpp;
    echo "<br/>";


    switch($MetodoHttpp)
    {
        //-----------------GET------------------------
        case 'GET':
        echo "Entro a MOSTRAR ";
                   include "Funciones/listarAlumno.php";
                   break;
        //------------------POST-----------------------   
        case 'POST':
        echo "Entro a CREAR ";  
                   include "Funciones/crearAlumno.php";
                   break;
        //------------------DELETE---------------------
        case 'DELETE':
        echo "Entro a BORRAR ";
                    include "Funciones/borrarAlumno.php"; 
                    break;
        //------------------PUT------------------------
        case 'PUT':
        echo "Entro a MODIFICAR ";             
                    include "Funciones/modificarAlumno.php";
                    break;
        //------------------DEFAULT--------------------
        default:
                    break;

    }    



?>