<?php 
//parametros que necesita la conexion

$servidor='localhost';
$usuario='root';
$clave='';
$basededatos='login';

$conexion=new mysqli ($servidor,$usuario,$clave,$basededatos);
// de aqui generamos la conexion
if ($conexion->connect_errno)
{
    echo "NUESTRA CONEXION PRESENTA FALLAS";
    exit();
    // exit es para cerrar la conexion
} 

?>