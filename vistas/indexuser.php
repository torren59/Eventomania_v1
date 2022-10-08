<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="../root/estilosadmin.css" <?=date('Y-m-d H:i:s')?> > 
    <link rel="stylesheet" href="../root/estilouserindex.css">
    <title>Eventomania</title>
</head>
<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.js"></script>

<nav class="admin-nav">
    <div class="admin-nav-main">
        <ul class="admin-nav-ul" >

            <form action="./indexuser.php" method="post">

        <div class="admin-nav-item admin-nav-message">
            welcome <?php session_start(); echo($_SESSION["usuario"]["nombre"]); ?>
        </div>

            <div class="admin-nav-item">
                <li><button type="submit" class="admin-nav-btn btn" id="admin-nav-btn1" name="ip" value="1">Mis Eventos</button></li>
            </div>
            <div class="admin-nav-item">
                <li><button type="submit" class="admin-nav-btn btn" id="admin-nav-btn2" name="ip"  value="2" >Eventos publicados</button></li>
            </div>

            </form>

            <div class="admin-nav-item-logout">
                <li> <form action="../protocolos/logout.php" method="post"><button type="submit" name="logoutbtn" class="admin-nav-btn-logout btn btn-warning" >Cerrar sesión</button></form> </li>
            </div>
        </ul>
    </div>
</nav>

<div class="megacontainer">
<?php


if(isset($_POST["ip"])){
    $vistaparcial=$_POST["ip"];

    switch($vistaparcial){
        case 2:
            include("./eventosuser.php");
        break;
        case 1:
            include("./miseventos.php");
        break;
        
        default:
        include("./gestioneventos.php");
        break;
        
        
    }
}
else{

    if(isset($_SESSION["route"])){
        include($_SESSION["route"]);
    }
    else{
        include("./eventosuser.php");
    }
}

?>
</div>

<?php
include("./footer.php");
?>