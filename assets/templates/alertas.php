<?php

#conectar a base de datos 
require "$level_file/db/conexion.php";
// print_r($url);
date_default_timezone_set('UTC');

$elA = date("Y");
$elM = date("m");
$elD = date("d");
$elH = date("H:i:s", time() - 18000);

$consulta = mysqli_query($conexion, "select * from datos ") or die(mysqli_error($conexion));
$registro = mysqli_fetch_array($consulta);

do {
    $fecha = $registro['fecha'];
    $hora = $registro['hora'];
} while ($registro = mysqli_fetch_array($consulta));
#Detectamos la fecha
$fechas = explode("/", $fecha);
$anos = $fechas[2];
$mess = $fechas[1];
$dias = $fechas[0];
#Detectamos la hora guardada
$horasx = explode(":", $hora);
$horax = $horasx[0];
#Detectamos la hora actual
$horaz = explode(":", $elH);
$horazz = $horaz[0];
if ($elM == $mess && $elD == $dias && ($horax + 20) > $horazz) {
    $clase = "ok";
} else {
    $clase = "alertas";
}

echo '<div class="' . $clase . '">Última actualización de datos el .<b>' . $fecha . '</b>. a las .<b>' . $hora . '.</b></div>';
