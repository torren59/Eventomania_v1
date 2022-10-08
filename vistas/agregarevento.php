<?php
include("../protocolos/validadorsesion.php");
include("../protocolos/actividadinfo.php");
include("../protocolos/referencedate.php")
?>

<div class="contenido-listado">


    <form action="../vistas/index.php" method="post" >

    <div class="add-event-item">
        <button type="submit" class="admin-nav-btn btn" name="op"  value="1"><-Atrás</button>
    </div>

</form>

<div class="add-event-item">
        <h1>Eventos</h1>
        <h6>Los eventos son la parte fundamental de nuestro negocio. Selecciona una actividad y asígnale
            la fecha y hora correspondientes además del aforo máximo.
        </h6>
    </div>

    <form action="../protocolos/addevent.php" method="POST">
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
        <label class="form-label">Fecha de realización</label>
        <input type="date" class="form-control" name="fecha_evento">
        </div>
        <br>
        <div class="add-event-item">
        <button type="submit" class="admin-nav-btn btn" name="op"  value="6">Crear evento</button>
        </div>
        <br>
        <div class="add-event-item">
        <?php if(isset($_SESSION["EventState"])){ echo($_SESSION["EventState"]); $_SESSION["EventState"]="";}?>
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
                Publicar evento de forma inmediata
            </label>
        </div>

    </div>
    </div>
    

    

    </form>

</div>
