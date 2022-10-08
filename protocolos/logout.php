<?php
if(isset($_POST["logoutbtn"])){
    session_start();
    session_destroy();
    header('Location:http://localhost/FinalPHP/vistas/login_formulario.php');
}
?>