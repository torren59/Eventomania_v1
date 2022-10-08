<?php
include("./referencedate.php");
session_start();


if(isset($_POST["op"])){
    

    $documento=$_POST["documento"];
    $nombre=$_POST["nombre"];
    $apellido=$_POST["apellido"];
    $contrasena=$_POST["clave"];

    

    include("../conexion/abrir_conexion.php");

    

 
    $sqluser1="SELECT *FROM $usuario where documento = '$documento'";
    $sqluser1c=mysqli_query($conexion,$sqluser1);
    $TotResult=mysqli_num_rows($sqluser1c);
        
    if($TotResult>0){
        
        
        header('Location:http://localhost/FinalPHP/vistas/agregarusuario.php');
        $_SESSION["UserState"]="Documento ya se encuentra registrado";
        return;
    
    }
    

    if($documento==null || $nombre==null||$apellido==null || $contrasena==null){
        
        header('Location:http://localhost/FinalPHP/vistas/agregarusuario.php');
        $_SESSION["UserState"]="Llena todos los campos";
    }

    else if(strlen($nombre)>15||strlen($apellido)>15||strlen($clave)>30){
        
        header('Location:http://localhost/FinalPHP/vistas/agregarusuario.php');
        $_SESSION["UserState"]="El nombre no debe tener más de 15 caracteres <br>El apellido no debe tener más de 15 caracteres
        <br> La clave no debe tener más de 10 caracteres";
    }

    else{ 

        //Generando PK para fecha_habilitada
        $fch_habid;
        $pase=2;
        while($pase>1){
            $fch_habid=rand(1000,9999);
            $VERIF_HABID=" SELECT *from $fecha_habilitada where fecha_habilitadaid = '$fch_habid' ";
            $consulta=mysqli_query($conexion,$VERIF_HABID);
            $resultado=mysqli_fetch_row($consulta);
            $pase=$resultado;
        }
        

    $CREATEUSR="INSERT INTO $usuario 
    (documento,rolid,nombre,apellido,clave)
    values 
    ('$documento','2','$nombre','$apellido','$contrasena')";
    mysqli_query($conexion,$CREATEUSR);

    

    $CREATEHABIL_DATE=" INSERT INTO $fecha_habilitada (fecha_habilitadaid,documento,fecha_habilitada) VALUES ('$fch_habid','$documento','$referencedate') ";
    $EXECUTEHABIL_DATE=mysqli_query($conexion,$CREATEHABIL_DATE);

    include("../conexion/cerrar_conexion.php");
    
    header('Location:http://localhost/FinalPHP/vistas/agregarusuario.php');
    
    $_SESSION["UserState"]='Tu usuario ya ha sido creado, dirígete al login y accede con el documento y clave que has registrado';

    }

    
    
}
    

?>