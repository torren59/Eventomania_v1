<?php
global $referencedate;

$referencedate=date('Y-m-d'); //Así lo devuelve date 2022-06-05
// SQL SOLICITUD select date_format(now(),'%Y-%m-%d'); devuelve 2022-06-15
//DATE_ADD('2018-01-01', INTERVAL 364 DAY); para agregar fechas
// Así lo devuelve el post de html 2022-06-09

//Solicitudes utiles sql
//select date_format('2022-06-04','%Y-%m-%W') Pasa la fecha pero con el día con nombre

//Convierte fechas recibidas en string a numeros enteros

function fechaanumero($datetoint){

    $infod1= substr($datetoint,0,4);
    $infod2= substr($datetoint,5,2);
    $infod3= substr($datetoint,8,2);

    $infods1= doubleval($infod1);
    $infods2= doubleval($infod2);
    $infods3= doubleval($infod3);

    $infodsdef=$infods1.$infods2.$infods3;
    $infodsult= $infodsdef+0;

    return $infodsult;
}

/*Con base en una fecha suministrada devueve el mes actual y todos los posteriores meses hasta diciembre, 
si es diciembre sólo devolverá ese mes*/
function imprimemes($date){

    $retorno=array();
    $mes= substr($date,5,2);

    $enero=[1,'enero'];
    $febrero=[2,'febrero'];
    $marzo=[3,'marzo'];
    $abril=[4,'abril'];
    $mayo=[5,'mayo'];
    $junio=[6,'junio'];
    $julio=[7,'julio'];
    $agosto=[8,'agosto'];
    $septiembre=[9,'septiembre'];
    $octubre=[10,'octubre'];
    $noviembre=[11,'noviembre'];
    $diciembre=[12,'diciembre'];

    $meses=[$enero,$febrero,$marzo,$abril
    ,$mayo,$junio,$julio,$agosto,$septiembre
    ,$octubre,$noviembre,$diciembre];

    for($i=11;$i>=$mes-1;$i--){
        array_push($retorno,$meses[$i]);
    }

    return $retorno;

}

/*Con base en una fecha suministrada devuelve la fecha correspondiente al día lunes más cercano, si es lunes
devuelve el lunes próximo
*/
function retornalunes($date){
    $retorno='';
    $adicion=['Monday'=>7,'Tuesday'=>6,'Wednesday'=>5,'Thursday'=>4,'Friday'=>3,'Saturday'=>2,'Sunday'=>1];

    include("../conexion/abrir_conexion.php");
    
    $sqlRetornalunes=" SELECT DATE_FORMAT('$date','%W') ";
    $sqlRetornalunesc=mysqli_query($conexion,$sqlRetornalunes);
    $sqlRetornalunesr=mysqli_fetch_array($sqlRetornalunesc);
    $intervalue=$adicion[$sqlRetornalunesr[0]];

    $sqlRetornalunes=" SELECT DATE_ADD('$date',INTERVAL $intervalue DAY) ";
    $sqlRetornalunesc=mysqli_query($conexion,$sqlRetornalunes);
    $sqlRetornalunesr=mysqli_fetch_array($sqlRetornalunesc);
    $retorno=$sqlRetornalunesr[0];
 
    include("../conexion/cerrar_conexion.php");

    return $retorno;

}

function retornadomingo($date){
    $retorno='';
    $adicion=['Sunday'=>7,'Monday'=>6,'Tuesday'=>5,'Wednesday'=>4,'Thursday'=>3,'Friday'=>2,'Saturday'=>1];

    include("../conexion/abrir_conexion.php");
    
    $sqlRetornalunes=" SELECT DATE_FORMAT('$date','%W') ";
    $sqlRetornalunesc=mysqli_query($conexion,$sqlRetornalunes);
    $sqlRetornalunesr=mysqli_fetch_array($sqlRetornalunesc);
    $intervalue=$adicion[$sqlRetornalunesr[0]];

    $sqlRetornalunes=" SELECT DATE_ADD('$date',INTERVAL $intervalue DAY) ";
    $sqlRetornalunesc=mysqli_query($conexion,$sqlRetornalunes);
    $sqlRetornalunesr=mysqli_fetch_array($sqlRetornalunesc);
    $retorno=$sqlRetornalunesr[0];
 
    include("../conexion/cerrar_conexion.php");

    return $retorno;

}


/*Ingresas una fecha y te retorna todas las fechas que correspondan con ese mismo dia (Lunes, Martes ETC)
dentro del mes que se ingresó en la fecha inicial. El arreglo incluye la fecha ingresada*/
function fechasaagendar($fechaevento){
    include("../conexion/abrir_conexion.php");
    $agendamientos = array();
    $newfecha=$fechaevento;
    $periodos=7;
    $inicialmonth=substr($fechaevento,5,2);


    while($newfecha!=null){
        array_push($agendamientos,$newfecha);
        $consulta=" SELECT DATE_ADD('$fechaevento', INTERVAL $periodos DAY) ";
        $resultado = mysqli_query($conexion,$consulta);
        $consultar=mysqli_fetch_array($resultado);
        $newfecha=$consultar[0];
        $finalmonth=substr($newfecha,5,2);
        if($inicialmonth!=$finalmonth){$newfecha=null;}
        $periodos+=7;
    }

    include("../conexion/cerrar_conexion.php");

    return $agendamientos;
}

//Devuelve el último día del mes en curso ingresado en $date
function finmesactual($date){
    include("../conexion/abrir_conexion.php");
    $fechaexistente=array();
    $actualday=substr($date,8,2);

    do{
        $actualday=28-$actualday;
        if($actualday>0){
            $fechaexistentec=" SELECT DATE_ADD('$date', INTERVAL $actualday DAY) ";
            $fechaexistenter=mysqli_query($conexion, $fechaexistentec);
            $fechaexistente=mysqli_fetch_array($fechaexistenter);
            $actualday=substr($fechaexistente[0],8,2);
        }
        else{
            $fechaexistentec=" SELECT DATE_ADD('$fechaexistente[0]', INTERVAL 1 DAY) ";
            $fechaexistenter=mysqli_query($conexion, $fechaexistentec);
            $fechaexistente=mysqli_fetch_array($fechaexistenter);
            $actualday=substr($fechaexistente[0],8,2);
        }
    }while(substr($fechaexistente[0],5,2)==substr($date,5,2));
    
    $fechaexistentec=" SELECT DATE_ADD('$fechaexistente[0]', INTERVAL -1 DAY) ";
    $fechaexistenter=mysqli_query($conexion, $fechaexistentec);
    $fechaexistente=mysqli_fetch_array($fechaexistenter);
    $lmd=$fechaexistente[0];
    return $lmd;

    include("../conexion/cerrar_conexion.php");   
}

?>