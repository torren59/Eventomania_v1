<?php
session_start();
if(isset($_POST["op"])){

    $activityid;
    $nombre=$_POST["nombre"];
    $descripcion=$_POST["descripcion"];
    if($nombre==null || $descripcion==null){
        header('Location:http://localhost/FinalPHP/vistas/index.php');
        $_SESSION["route"]="./agregaractividad.php";
        
        $_SESSION["ActivityState"]="Completa todos los campos para crear esta actividad";
    }
    else if(strlen($nombre)>30){
        header('Location:http://localhost/FinalPHP/vistas/index.php');
        $_SESSION["route"]="./agregaractividad.php";
        
        $_SESSION["ActivityState"]="El nombre debe tener menos de 15 caracteres";
    }
    else if(strlen($descripcion)>100){
        header('Location:http://localhost/FinalPHP/vistas/index.php');
        $_SESSION["route"]="./agregaractividad.php";
        
        $_SESSION["ActivityState"]="La descripción debe tener menos de 100 caracteres";
    }
    else{
        include("../conexion/abrir_conexion.php");
        $pase=0;
        while($pase==0){
            $activityid=rand(100,999);
            $VERIF_ACTIVIDADID=" SELECT actividadid from $actividad where actividadid = '$activityid' ";
            $consulta=mysqli_query($conexion,$VERIF_ACTIVIDADID);
            $resultado=mysqli_fetch_array($consulta);
            $dbreturned=$resultado["actividadid"];
            if($dbreturned!=$activityid){$pase=1;}
        }

    $CREATEACT="INSERT INTO $actividad 
    (actividadid,nombre,descripcion)
    values 
    ('$activityid','$nombre','$descripcion')";

    mysqli_query($conexion,$CREATEACT);
    header('Location:http://localhost/FinalPHP/vistas/index.php');
    $_SESSION["route"]="./agregaractividad.php";
    $_SESSION["ActivityState"]="Actividad guardada exitosamente";
        include("../conexion/cerrar_conexion.php");
    }

}
?>