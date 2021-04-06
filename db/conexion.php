<?php

$host = "localhost";
$db = "jetours1_bloqueos";
$user = "jetours1_disponibilidad";
$pass = "(!mEkkfrKuS9";

$conexion = $mysqli = new mysqli($host, $user, $pass, $db);

if (mysqli_connect_errno()) {
	echo 'Conexion Fallida : ', mysqli_connect_error();
	exit();
} 