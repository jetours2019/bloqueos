<?php

/** Archivo que permite eliminar los archivos */


ini_set('display_errors', 1);

$response = array();
$errors = "";

$urlsRm = $_POST['urls'];

foreach ($urlsRm as $url) {
    if (!unlink($url)) {
        $errors .= "'$url' ";
    }
}

$success = "success";
$msg = "Archivos borrados correctamente";
$title = "Éxito!";
if ($errors) {
    $success = "error";
    $msg = "Error al eliminar los archivos: $errors";
    $title = "Error";
}

$response = array(
    "success" => $success,
    "title" => $title,
    "msg" => $msg
);

print_r(json_encode($response));
