<?php
$carpeta = "bloqueos"; 
$url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/$carpeta";

if (array_key_exists('url', $_GET)) {
    $url_img = $_GET['url'] . "?". time();
} else {
    http_response_code(404);
    echo "Error. No ha ingresado ninguna url";
    // include('my_404.php'); // provide your own HTML for the error page
    die();
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv='cache-control' content='no-cache'>
    <meta http-equiv='expires' content='0'>
    <meta http-equiv='pragma' content='no-cache'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo $url; ?>/assets/css/sb-admin-2.min.css" rel="stylesheet">

    <title>Flyer</title>
    <style>
        img {
            width: 612px;
            height: 800px;
        }

        body {
            background-color: #FFD;
        }
    </style>
</head>

<body>
    <div class="container pl-0 pl-md-1 pl-lg-4">
        <div class="row">
            <div class="col-md-6 offset-0 offset-md-1 offset-lg-3">
                <img src="<?php echo $url_img; ?>" alt="flyer">
            </div>
        </div>
    </div>
</body>

</html>