<?php
include("../protocolos/validadorsesion.php");
include("../conexion/abrir_conexion.php");
include("../protocolos/eventoinfo.php");
include("../protocolos/referencedate.php");
?>

<div class="renderzone">
    <div class="listzone">
        <?php
        $consulta=asistto($_SESSION["usuario"]["documento"], $referencedate);
        while($eventos=mysqli_fetch_array($consulta)){
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
                <form action="../protocolos/inscribiruser.php" method="post">
                    <input type="checkbox" hidden name="upuser" value="<?php echo $_SESSION["usuario"]["documento"] ?>" checked>
                    <button type="submit" class="admin-nav-btn btn" id="admin-nav-btn2" name="up" value="<?php echo $eventos["eventoid"] ?>" >Anular</button>
                </form>
            </div>

        </div>

        <?php
        }
        ?>

    </div>
</div>