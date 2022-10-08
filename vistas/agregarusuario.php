<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="../root/estilosnewuser.css">
    <title>Nuevo usuario</title>
</head>
<body>

<div class="add-user-flex">
    <div class="add-user-head"><H1>EVENTOMANIA</H1></div>
    <form action="../protocolos/adduser.php" method="POST">
    <div class="add-user-form">

        <div class="add-event-item">
        <a class="add-user-back" href="http://localhost/FinalPHP/vistas/login_formulario.php">
            <button type="button" class="btn btn-warning">
                <-Login
            </button>
        </a>
        </div>
<br>
        <label class="form-label">Documento</label>
        <input type="number" class="form-control" name="documento">

        <div class="row">

            <div class="col-6">
                <label class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre">
            </div>

            <div class="col-6">
                <label class="form-label">Apellidos</label>
                <input type="text" class="form-control" name="apellido">
            </div>

        </div>

        <div class="add-user-form-margined col-8">
            <label class="form-label">clave</label>
            <input type="text" class="form-control" name="clave">
            <br>
            <?php if(isset($_SESSION["UserState"])){ echo($_SESSION["UserState"]); $_SESSION["UserState"]="";}?>
        </div>
<br>
        <div class="add-user-form-btn">
            <button type="submit" class="btn btn-success" name="op" value="8">Vamos!</button>
        </div>
<br>

    </div>
    </form>
</div>

</body>
</html>