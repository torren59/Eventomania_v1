<?php
include("../protocolos/validadorsesion.php");
include("../protocolos/eventoinfo.php");
include("../protocolos/referencedate.php");
?>

<form action="./index.php" method="post"><!--Form de botonera general-->
<div class="contenido-listado">
    <div class="add-content-block col-12">  
        <div class="add-content-block col-4">
    <div class="add-event-item" >
        <button class="gest-event-btn btn" name="op" id="gest-event-btn-add" value="3">Agregar nueva actividad</button>
    </div>
        </div>
        <div class="add-content-block col-3">
    <div class="add-event-item" >
        <button class="gest-event-btn btn" name="op" id="gest-event-btn-add" value="4">Agregar nuevo evento</button>
    </div>
        </div>
        <div class="add-content-block col-4">
    <div class="add-event-item" >
        <button class="gest-event-btn btn" name="op" id="gest-event-btn-add" value="7">Agregar eventos conjuntos</button>
    </div>
        </div>
        </form>

        <br><hr>

     
        <div class="add-content-block col-11">
        <form action="../protocolos/publicevents.php" method="POST">  
            <div class="add-content-block col-3">
            <label class="form-label">Publicar todos los eventos de:</label>
            </div>
            <div class="add-content-block col-4">
            <select class="form-select" aria-label="Default select example" name="publicacion">
                <option name="publicacion" value="1">Esta semana</option>
                <option name="publicacion" value="2">Este mes</option>
            </select> 
            </div>
            <div class="add-content-block col-1">
                <button type="submit" class="admin-pub-btn btn" name="op"  value="9">Publicar</button>
            </div>

            <div class="add-content-block col-3">
                <?php if(isset($_SESSION["PublicarState"])){ echo($_SESSION["PublicarState"]); $_SESSION["PublicarState"]=""; } ?>
            </div>


        </div>
        <br><br>
        <div class="add-content-block col-11">

            <?php
            include("../conexion/abrir_conexion.php");
            
            $sqleventcard=" SELECT *FROM $evento WHERE fecha_evento>='$referencedate' ";
            $sqleventcardc=mysqli_query($conexion,$sqleventcard);
            while($sqleventcardr=mysqli_fetch_array($sqleventcardc)){   
                
                $activid=$sqleventcardr["actividadid"];
                $sqlactcard=" SELECT *FROM $actividad WHERE actividadid='$activid' ";
                $sqlactcardc=mysqli_query($conexion,$sqlactcard);
                $sqlactcardr=mysqli_fetch_array($sqlactcardc);
                $aforo=$sqleventcardr["aforo"];
                $cupos=$sqleventcardr["asistencia"];
                $restante=$aforo-$cupos;
                $state;
                if($sqleventcardr["estado"]==0){
                   $state="No publicado"; 
                }
                else{
                    $state="Publicado"; 
                }

            echo('   

            <div class="list-card">

                <div class="add-event-item">
                    '.$sqlactcardr["nombre"].'
                </div>
                <div class="add-event-item">
                '.$state.'
                </div>

                <div class="desc-panel col-12">

                <div class="add-content-block col-11" >
                    '.$sqlactcardr["descripcion"].'
                </div>
                
                    
                </div>

                <div class="add-content-block col-7">
                    Fecha: '.$sqleventcardr["fecha_evento"].'
                </div>

                <div class="add-content-block col-4">
                    Hora: '.$sqleventcardr["hora"].'
                </div> 

                <div class="add-content-block col-6">
                    Aforo: '.$sqleventcardr["aforo"].'
                </div>

                <div class="add-content-block col-5">
                    Cupos: '.$restante.'
                </div>
                <hr>
                <br>
                <div class="add-content-block col-5">
                <button type="submit" class="admin-pub-btn btn" name="ops"  value="'.$sqleventcardr["eventoid"].'">Publicar</button>
                </div>

            </div>
            ');
        }
        ?>
        </div>
        </form>

        <?php
        include("../conexion/cerrar_conexion.php");
        ?>

        

    </div>
</div>

