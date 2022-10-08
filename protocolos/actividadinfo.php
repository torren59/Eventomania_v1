<?php
include("../conexion/abrir_conexion.php");

//Retorna todos los registros dentro de actividad- Para desplegar todos los resultados usar un while($variable = sqli_fetch_array)
$sqlactividad1=" SELECT * from $actividad ";
$sqlactividad1c=mysqli_query($conexion,$sqlactividad1);

include("../conexion/cerrar_conexion.php");
?>