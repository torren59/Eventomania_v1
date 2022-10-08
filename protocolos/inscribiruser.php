<?php
session_start();
if(isset($_POST["ip"])){
    include("../conexion/abrir_conexion.php");
    include("./referencedate.php");
    $select_event=$_POST["ip"];
    $select_user=$_POST["ipuser"];
    $pase=1;
    $asistenid;
    //Agregar registro en asistencia
    while($pase>0){
        $asistenid=rand(1000,9999);
        $VERIF_ASISTENCIAID=" SELECT asistenciaid FROM $asistencia WHERE asistenciaid = '$asistenid' ";
        $consulta=mysqli_query($conexion,$VERIF_ASISTENCIAID);
        $resultado=mysqli_num_rows($consulta);
        $pase=$resultado;
    }

    $asistenquery= " INSERT INTO $asistencia (asistenciaid,documento,eventoid) VALUES ('$asistenid','$select_user','$select_event') ";
    $asistenconsulta=mysqli_query($conexion,$asistenquery);

    $next_habil=retornalunes($referencedate);
    $habilquery= " UPDATE $fecha_habilitada SET fecha_habilitada = '$next_habil' WHERE documento = '$select_user' ";
    $habilconsulta= mysqli_query($conexion,$habilquery );

    $aforo_query=" SELECT asistenciaid FROM $asistencia WHERE eventoid = '$select_event' ";
    $aforo_consulta=mysqli_query($conexion,$aforo_query);
    $aforo_total=mysqli_num_rows($aforo_consulta);

    $update_aforo_query=" UPDATE $evento SET asistencia = '$aforo_total' WHERE eventoid = '$select_event' ";
    $update_aforo_consulta=mysqli_query($conexion, $update_aforo_query);
    header('Location:http://localhost/FinalPHP/vistas/indexuser.php');
    $_SESSION["route"]="./eventosuser.php";
    include("../conexion/cerrar_conexion.php");
}

if(isset($_POST["up"])){
    include("../conexion/abrir_conexion.php");
    include("./referencedate.php");
    $select_event=$_POST["up"];
    $select_user=$_POST["upuser"];
    
    $DELETE_ASIST=" DELETE FROM $asistencia WHERE eventoid='$select_event' AND documento= '$select_user' ";
    $DELETE_ASIST_QUERY=mysqli_query($conexion, $DELETE_ASIST);

    $aforo_query=" SELECT asistenciaid FROM $asistencia WHERE eventoid = '$select_event' ";
    $aforo_consulta=mysqli_query($conexion,$aforo_query);
    $aforo_total=mysqli_num_rows($aforo_consulta);
    $update_aforo_query=" UPDATE $evento SET asistencia = '$aforo_total' WHERE eventoid = '$select_event' ";
    $update_aforo_consulta=mysqli_query($conexion, $update_aforo_query);

    $UPDATE_HABIL=" UPDATE $fecha_habilitada SET fecha_habilitada = '$referencedate' WHERE documento= '$select_user' ";
    $UPDATE_HABIL_QUERY=mysqli_query($conexion, $UPDATE_HABIL);
    include("../conexion/cerrar_conexion.php");
    header('Location:http://localhost/FinalPHP/vistas/indexuser.php');
    $_SESSION["route"]="./miseventos.php";
}
?>