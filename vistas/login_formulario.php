<?php
include ("headlogin.php");
?>

<div class="cuadrologin">
    <p> <BR>  BIENVENIDO A <h6>EVENTOMANIA</h6> <hr> Ingresa tus credenciales</p>
    <div class="login-principal">
    <form action="../protocolos/login.php" method="post">
    <div class="formelement">
        <label for="documento">
            Documento
        </label>
        <br>
        <input type="number" for="documento" name="documento" />
    </div>
        <br>
    <div class="formelement">
        <label for="clave">
            Contraseña
        </label>
        <br>
        <input type="password" for="clave" name="clave" />
    </div>
        <sub>¿Aún no tienes una cuenta? <a href="http://localhost/FinalPHP/vistas/agregarusuario.php">Regístrate</a> </sub>
        <br><br>
        <div class="btn-envio"><button type="submit" class="btn btn-dark" name="sender">Enviar</button></div>
</form>
    </div>
</div>
<p class="estadoacceso"></p>



<?php
include ("footer.php");
?>

    