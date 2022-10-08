<?php
include("../vistas/head.php");
include("../protocolos/actividadinfo.php");
include("../protocolos/referencedate.php")
?>

<div class="contenido-listado">


    <form action="./index.php" method="post" >

    <div class="add-event-item">
        <button type="submit" class="admin-nav-btn btn" name="op"  value="1"><-Atrás</button>
    </div>

</form>

<div class="add-event-item">
        <h1>Eventos conjuntos</h1>
        <h6>Los eventos conjuntos son una herramienta increíble cuando quieres crear varios eventos
            de la misma actividad que se repiten semanalmente durante un periodo determinado de tiempo.
            <br>Por ejemplo crea un evento para el martes 7 de junio y repítelo durante todos los martes 
            del mes.
        </h6>
    </div>

    <form action="../protocolos/addeventconjun.php" method="POST">
    <div class="add-content-block col-12">  
    <div class="add-content-block col-6">
    <div class="add-event-item">
        <label class="form-label">Actividad</label>
    <select class="form-select" aria-label="Default select example" name="actividadid">
        <?php while($sqlactividad1r=mysqli_fetch_array($sqlactividad1c)){  ?>
        <option name="actividadid" value='<?php echo($sqlactividad1r["actividadid"]); ?>'><?php echo($sqlactividad1r["nombre"]); }?></option>
    </select> 
    </div>
    <br>
        <div class="add-event-item">
        <label class="form-label">Fecha de realización inicial <br> <sub>Esta fecha definirá qué día de la semana 
            se repite el evento.
        </sub> </label>
        <input type="date" class="form-control" name="fecha_evento">
        </div>
        <br>
        <div class="add-event-item">
        <div class="event-item">
            Recuerda que este evento se repetirá durante durante todo el mes iniciando el día seleccionado y 
            repitiéndose cada semana al llegar el día correspondiente (Lunes, Martes ETC) hasta que haya finalizado el mes.
        </div>
        </div>

        <br>
        <div class="add-event-item">
        <button type="submit" class="admin-nav-btn btn" name="op"  value="7">Crear evento</button>
        </div>
        <br>
        <div class="add-event-item">
        <?php if(isset($_SESSION["EventCState"])){ echo($_SESSION["EventCState"]); $_SESSION["EventCState"]="";}?>
        </div>
    </div>

    <div class="add-content-block col-5">
        <div class="add-event-item">
        <label class="form-label">Hora <br> <sub>ingresar menos de ocho caracteres</sub></label>
        
        <input type="text" class="form-control" name="hora">
        </div>
        <br>
        <div class="add-event-item">
        <label class="form-label">Aforo</label>
        <input type="number" class="form-control" name="aforo">
        </div>
        <br>
        <div class="form-check add-event-item">
            <input class="form-check-input" type="checkbox" value="1" name="estado" >
            <label class="form-check-label" for="flexCheckDefault">
                Publicar eventos de forma inmediata
            </label>
        </div>

        

    </div>
    </div>
    

    

    </form>

</div>
