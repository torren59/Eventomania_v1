<?php
include("../protocolos/validadorsesion.php");
?>

<div class="contenido-listado">


    <form action="../vistas/index.php" method="post" >

    <div class="add-event-item">
        <button type="submit" class="admin-nav-btn btn" name="op"  value="1"><-Atrás</button>
    </div>

</form>

<form action="../protocolos/addactivity.php" method="post">
    <div class="add-content-block col-6">
    <div class="add-event-item">
        <label class="form-label">Nombre</label>
        <input type="text" class="form-control" id="exampleInputEmail1" name="nombre" aria-describedby="emailHelp">
        </div>

        <div class="add-event-item">
        <label class="form-label">Descripción</label>
        <input type="text" class="form-control" name="descripcion" id="descripcion">
        </div>
        <br>
        <div class="add-event-item">
        <button type="submit" class="admin-nav-btn btn" name="op"  value="5">Crear actividad</button>
        </div>
        <br>
        <div class="add-event-item">
        <?php if(isset($_SESSION["ActivityState"])){ echo($_SESSION["ActivityState"]); $_SESSION["ActivityState"]="";}?>
        </div>
    </div>

    <div class="add-content-block col-5">
        <h1>Actividades</h1>
        <h6>Las actividades son fundamentales en nuestra empresa, ya que de cada actividad provienen los eventos
            que programarás mientras te desempeñas en tu puesto. <br>
            Por ejemplo puedes crear una actividad como "Rock al parque" y generar eventos para los días martes 
            y miércoles en diferentes horarios.
        </h6>
    </div>

    

    </form>
</div>
