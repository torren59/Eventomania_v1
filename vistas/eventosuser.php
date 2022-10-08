<?php
include("../protocolos/validadorsesion.php");
include("../conexion/abrir_conexion.php");
include("../protocolos/eventoinfo.php");
include("../protocolos/referencedate.php");
?>



<div class="renderzone">
    <div class="listzone">
        <?php
        $lunes=retornadomingo($referencedate);
            $queryevent=" SELECT *FROM $evento WHERE estado=1 AND fecha_evento >= '$referencedate' ";
            $Consultaevent=mysqli_query($conexion, $queryevent);

        while($eventos=mysqli_fetch_array($Consultaevent)){
            $activid=$eventos["actividadid"];

            $queryact="SELECT *FROM $actividad WHERE actividadid=' $activid '";
            $consultaact = mysqli_query($conexion, $queryact);
            $actividades=mysqli_fetch_array($consultaact);
        ?>

        <div class="listcard">
            <div class="cardtitle">
                <?php
                echo($actividades["nombre"]);
                ?>
            </div>
            <div class="carddescription">
                <?php
                echo($actividades["descripcion"]);
                ?>
            </div>
            <div class="cardinfo">
                Fch:
                <?php
                echo($eventos["fecha_evento"]);
                ?>
            </div>
            <div class="cardinfo">
                Hora:
                <?php
                echo($eventos["hora"]);
                ?>
            </div>
            <div class="cardinfo">
                Cupos:
                <?php
                echo($eventos["aforo"]);
                ?>
            </div>
            <div class="cardinfo">
                Restan:
                <?php
                echo($eventos["aforo"]-$eventos["asistencia"]);
                ?>
            </div>
            <div class="cardinfo">
                <?php
                $buttin="";
                //Valida si no se inscribió esta semana en un evento previo
                $habil_date=habil_date($_SESSION["usuario"]["documento"]);
                $habil_access;
                if($referencedate<$habil_date){
                    $habil_access=false;
                }
                else{
                    $habil_access=true;
                }
                //Valida si no está inscrito ya en ese evento
                $now_here=now_here($_SESSION["usuario"]["documento"],$eventos["eventoid"]);
                $now_access;
                if($now_here>0){
                    $now_access=false;
                }
                else{
                    $now_access=true;
                }
                //Valida si aún hay cupos en el evento
                $cupo_access;
                if($eventos["aforo"]<=$eventos["asistencia"]){
                    $cupo_access=false;
                }
                else{
                    $cupo_access=true;
                }
                if($cupo_access==true && $now_access==true && $habil_access==true){
                    $buttin="";
                }
                else{
                    $buttin="disabled";
                }
                ?>
                <form action="../protocolos/inscribiruser.php" method="post">
                    <input type="checkbox" hidden name="ipuser" value="<?php echo $_SESSION["usuario"]["documento"] ?>" checked>
                    <button type="submit" class="admin-nav-btn btn" id="admin-nav-btn2" name="ip" <?php echo($buttin)?> value="<?php echo $eventos["eventoid"] ?>" >Inscribirme</button>
                </form>
            </div>

        </div>

        <?php
        }
        ?>

    </div>
</div>