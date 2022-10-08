<?php

$host="localhost";
$database="eventomania";
$user="root";
$clave="";
$actividad="actividad";
$asistencia="asistencia";
$evento="evento";
$fecha_habilitada="fecha_habilitada";
$rol="rol";
$usuario="usuario";
error_reporting(0);
$conexion=new mysqli($host,$user,$clave,$database);
if($conexion->connect_errno){
    echo("Sitio presenta fallas");
    exit();
}


?>