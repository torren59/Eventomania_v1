<?php
/*

//Inserta un nuevo evento con todos sus datos correspondientes
$sqlevento1= "INSERT INTO $evento 
(eventoid,actividadid,fecha_evento,hora,aforo,estado)
values 
('$eventid','$actividadid','$fecha_evento','$hora','$aforo','$estado')";

$sqlevento1c= mysqli_query($conexion,$sqlevento1);

*/

function queryevents(){
    include("../conexion/abrir_conexion.php");
    $script=" SELECT *FROM $evento WHERE estado=1";
    $Consulta=mysqli_query($conexion, $script);
    return $consulta;
    include("../conexion/cerrar_conexion.php");
}

function queryactivity($actividadid){
    include("../conexion/abrir_conexion.php");
    $query="SELECT *FROM $actividad WHERE actividadid='$actividadid'";
    $consulta = mysqli_query($conexion, $query);
    return $consulta;
    include("../conexion/cerrar_conexion.php");

}

function habil_date($id){
    include("../conexion/abrir_conexion.php");
    $query=" SELECT fecha_habilitada FROM $fecha_habilitada WHERE documento = '$id' ";
    $consulta=mysqli_query($conexion, $query);
    $resultado=mysqli_fetch_array($consulta);
    $retorno=$resultado[0];
    include("../conexion/cerrar_conexion.php");
    return $retorno;
}

function now_here($id,$eventoid){
    include("../conexion/abrir_conexion.php");
    $query=" SELECT asistenciaid FROM $asistencia WHERE eventoid='$eventoid' AND documento='$id' ";
    $consulta=mysqli_query($conexion, $query);
    $resultado=mysqli_fetch_row($consulta);
    $retorno=$resultado;
    include("../conexion/cerrar_conexion.php");
    return $retorno;
}

function con_cupo($eventoid){
    include("../conexion/abrir_conexion.php");
    $query=" SELECT asistencia FROM $evento WHERE eventoid='$eventoid' ";
    $consulta=mysqli_query($conexion, $query);
    $resultado=mysqli_fetch_array($consulta);
    $retorno=$resultado["asistencia"];
    include("../conexion/cerrar_conexion.php");
    return $retorno;
}

//Retorna consulta para los id de todos los eventos en los cuales un usuario está inscrito. Cuya fecha es mayor o igual a la fecha actual
function asistto($id,$reference){
    include("../conexion/abrir_conexion.php");
    $query=" SELECT a.eventoid,e.actividadid, e.fecha_evento, e.hora,e.aforo, e.asistencia FROM $asistencia a JOIN $evento e  on a.eventoid=e.eventoid WHERE a.documento='$id' AND e.fecha_evento >= '$reference' ";
    $consulta=mysqli_query($conexion,$query);
    include("../conexion/cerrar_conexion.php");
    return $consulta;   
}

?>