<?php

$carpeta = "bloqueos"; 
$url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/$carpeta"; 

?>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="">
<meta name="author" content="">
<link rel="shortcut icon" type="image/png" href="<?php echo $url; ?>/assets/images/favicon_je.ico" />
<title>Disponibilidad | Je Tours</title>

<!-- Custom fonts for this template-->
<link href="<?php echo $url; ?>/assets/css/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

<!-- Custom styles for this template-->
<link href="<?php echo $url; ?>/assets/css/sb-admin-2.min.css" rel="stylesheet">

<!-- Custom styles for this page -->
<link rel="stylesheet" href="<?php echo $url; ?>/assets/css/style.css">

