<?php
if(isset($_POST["op"])){
    $vistaparcial=$_POST["op"];

    switch($vistaparcial){
        case 2:
            include("../vistas/eventospublicados.php");
        break;
        case 1:
            include("../vistas/gestioneventos.php");
        break;
        case 3:
            include("../vistas/agregaractividad.php");
        break;
        case 4:
            include("../vistas/agregarevento.php");
        break;
        case 7:
            include("../vistas/agregareventosconjun.php");
        break;
        
        default:
        include("../vistas/gestioneventos.php");
        break;
        
        
    }
}
else{
    if(!isset($_POST["op"])){
        include("../vistas/gestioneventos.php");
    }
}
?>