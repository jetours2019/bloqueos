<?php

#conectar a base de datos 
require '../db/conexion.php';
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
$msg = "";
if ($elM == $mess && $elD == $dias && ($horax + 20) > $horazz) {
    $clase = "ok";
} else {
    $msg = "Hace mas de 20 horas que no se actualizan los registros.";
    $clase = "alertas";
}

echo '<div style="content: \'(i) Hace mas de 20 horas que no se actualiza la información.\' !important" class="' . $clase . '">Última actualización de datos el .<b>' . $fecha . '</b>. a las .<b>' . $hora . '.</b></div>';
