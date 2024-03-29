<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv='cache-control' content='no-cache'>
    <meta http-equiv='expires' content='0'>
    <meta http-equiv='pragma' content='no-cache'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="<?php echo $url; ?>/assets/images/iconlogo.png" />

    <title>Programa</title>
</head>

<body>
    <?php

    if (array_key_exists('url', $_GET)) {
        header("Content-type: application/pdf");
        header("Content-Disposition: inline; filename=Programa.pdf");
        @readfile($_GET['url']);
    } else {
        http_response_code(404);
        echo "Error. No ha ingresado ninguna url";
        // include('my_404.php'); // provide your own HTML for the error page
        die();
    }


    ?>
</body>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-130016375-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];

  function gtag() {
    dataLayer.push(arguments);
  }
  gtag('js', new Date());

  gtag('config', 'UA-130016375-2');
</script>
</html>