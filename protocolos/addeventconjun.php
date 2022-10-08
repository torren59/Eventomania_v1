<?php
include("./referencedate.php");
include("./eventoinfo.php");
session_start();
if(isset($_POST["op"])){

    $eventid;
    $actividadid=$_POST["actividadid"];
    $fecha_evento=$_POST["fecha_evento"];
    $fecha_eventoint= fechaanumero($fecha_evento);
    $referencedateint= fechaanumero($referencedate);
    $hora=$_POST["hora"];
    $aforo=$_POST["aforo"];
    $estado=$_POST["estado"];

    if($actividadid==null || $fecha_evento==null||$hora==null || $aforo==null){
        header('Location:http://localhost/FinalPHP/vistas/index.php');
        $_SESSION["route"]="./agregareventosconjun.php";
        $_SESSION["EventCState"]="Completa los campos de fecha del evento, hora y aforo para crear este evento";
    }


    else if(strlen($hora)>8){
        header('Location:http://localhost/FinalPHP/vistas/index.php');
        $_SESSION["route"]="./agregareventosconjun.php";
        $_SESSION["EventCState"]="La hora debe tener menos de 8 caracteres";
    }
    
    else if($referencedateint>$fecha_eventoint){
        header('Location:http://localhost/FinalPHP/vistas/index.php');
        $_SESSION["route"]="./agregareventosconjun.php";
        $_SESSION["EventCState"]="La fecha debe ser mayor a la fecha actual";
    }

    else{

        $colaagregacion=fechasaagendar($fecha_evento);
    
        for($i=0; $i<count($colaagregacion);$i++){

            $fecha_evento=$colaagregacion[$i];
        
        include("../conexion/abrir_conexion.php");
        $pase=0;
        while($pase==0){
            $eventid=rand(1000,9999);
            $VERIF_EVENTID=" SELECT eventoid from $evento where eventoid = '$eventid' ";
            $consulta=mysqli_query($conexion,$VERIF_EVENTID);
            $resultado=mysqli_fetch_array($consulta);
            $dbreturned=$resultado["eventoid"];
            if($dbreturned!=$eventid){$pase=1;}
        }

       
        
    $CREATEEVT="INSERT INTO $evento 
    (eventoid,actividadid,fecha_evento,hora,aforo,estado)
    values 
    ('$eventid','$actividadid','$fecha_evento','$hora','$aforo','$estado')";
    mysqli_query($conexion,$CREATEEVT);

    include("../conexion/cerrar_conexion.php");
    
    }

    header('Location:http://localhost/FinalPHP/vistas/index.php');
    $_SESSION["route"]="./agregareventosconjun.php";
    $_SESSION["EventCState"]="Eventos guardados exitosamente";
    
}  
}    

?>