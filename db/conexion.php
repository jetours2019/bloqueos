<?php

$host = "localhost";
$db = "gestion_bloqueos";
$user = "gestion_aliados_bloqueo";
$pass = "Pl1221141!!";

$conexion = $mysqli = new mysqli($host, $user, $pass, $db);

if (mysqli_connect_errno()) {
	echo 'Conexion Fallida : ', mysqli_connect_error();
	exit();
} 