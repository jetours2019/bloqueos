<?php
ini_set('display_errors', 1);
date_default_timezone_set('America/Bogota');

require_once '../../db/conexion.php';
require_once "../../build/vendor/autoload.php";

use PhpOffice\PhpSpreadsheet\IOFactory;

$elA = date("Y");
$elM = date("m");
$elD = date("d");
$elH = date("H:i:s", time());

$prox = $elM + 1;

$fecha        = date("Y-m-d");
$carpetaCarga     = "./files/";
$excel      = $_FILES['excel']['name'];

$rutaArchivo = "$carpetaCarga$excel";
$xlsx = 0;
if (move_uploaded_file($_FILES['excel']['tmp_name'], $rutaArchivo)) {
    $xlsx = 1;
}

$emparejado = 0;
if ($excel == "ControlCharters.xlsx") {
    $html = "<div class='ok'>El archivo se emparejo correctamente.</div>";
    $emparejado = 1;
} else {
    $html = "<div class='error'>El archivo ('$excel'.) subido no cumple con el nombre o extención exigida. Recuerde conservar el nombre original del Excel y convertir el archivo a .xlsx</div>";
}

$querys = array();

if ($xlsx == 1 && $emparejado == 1) {
    $sql = "DELETE FROM productos WHERE id>=0";
    $borrado = $conexion->query($sql); 

    $documento = IOFactory::load($rutaArchivo);

    $hojaActual = $documento->getSheet(0);

    $html .= "<h3 style='text-align:center;'>CONTROL DE CHARTERS</h3>";
    $html .= "<h4 style='text-align:center;'><a class='btn btn-info' href='javascript:history.back(-1)'>Volver</a></h4>";

    $html .= '<table class="table table-responsive" id="dataTable" style="margin: auto; width: 100%; border: solid #eee 1px;">';
    $html .= "<thead>";
    $header = true;
    # Iterar filas
    foreach ($hojaActual->getRowIterator() as $fila) {
        $row = '<tr>';
        $dataRow = array();
        array_push($dataRow, 'value'); //Se inserta un valor en la primera posicion del arreglo para evitar cambiar los indices usados anteriormente
        foreach ($fila->getCellIterator() as $celda) {

            $valorFormateado = $celda->getFormattedValue();
            if ($header) {
                $row .= "<th>" . $valorFormateado . "</th>";
            } else {
                $row .= "<td>" . $valorFormateado . "</td>";
            }

            array_push($dataRow, $valorFormateado);
        }

        $no = $dataRow[1];
        $id = $dataRow[2];
        $vuelo1 = $dataRow[3];
        $desde1 = $dataRow[4];
        $hasta1 = $dataRow[5];
        $aerolineas1 = $dataRow[6];

        $fecha1 = $dataRow[7];

        $salida1 = $dataRow[8];

        $llegada1 = $dataRow[9];

        $vuelo2 = $dataRow[10];
        $desde2 = $dataRow[11];
        $hasta2 = $dataRow[12];
        $aerolineas2 = $dataRow[13];

        $fecha2 = $dataRow[14];

        $salida2 = $dataRow[15];

        $llegada2 = $dataRow[16];

        $total = $dataRow[17];
        $libre = $dataRow[18];
        $referencia = $dataRow[19];
        $programa = trim($dataRow[20]);


        #Detectamos el Año y el mes de la salida
        $salidas = explode("/", $fecha1);
        $ano = array_key_exists(2, $salidas) ? $salidas[2] : "";
        $mes = array_key_exists(0, $salidas) ? $salidas[0] : "";
        $dia = array_key_exists(1, $salidas) ? $salidas[1] : "";


        #Detectamos el Año y el mes del regreso
        $salidas2 = explode("/", $fecha2);
        $ano2 = array_key_exists(2, $salidas2) ? $salidas2[2] : "";
        $mes2 = array_key_exists(0, $salidas2) ? $salidas2[0] : "";
        $dia2 = array_key_exists(1, $salidas2) ? $salidas2[1] : "";



        #Detectamos los vuelos con Escala
        $tipo1 = (strpos($vuelo1, ".") || strpos($vuelo1, "-") || strpos($vuelo1, ",")) ? "Escala" : "Directo";
        $tipo2 = (strpos($vuelo2, ".") || strpos($vuelo2, "-") || strpos($vuelo2, ",")) ? "Escala" : "Directo";

        $sql = "INSERT INTO productos (no,id,vuelo1,desde1,hasta1,aerolineas1,fecha1,salida1,llegada1,vuelo2,desde2,hasta2,aerolineas2,fecha2,salida2,llegada2,total,libre,referencia, ano, mes, dia, tipo1, tipo2, ano2, mes2, dia2, programa) VALUE( '$no','$id','$vuelo1','$desde1','$hasta1','$aerolineas1','$fecha1','$salida1','$llegada1','$vuelo2','$desde2','$hasta2','$aerolineas2','$fecha2','$salida2','$llegada2','$total','$libre','$referencia','$ano','$mes','$dia','$tipo1','$tipo2','$ano2','$mes2','$dia2', '$programa')";
        $row .= "</tr>";
        if ($id != "" && $id != "ID") {
            $result = $mysqli->query($sql);
            $html .= $row;
            $querys[] = $sql;
        }
        if ($header) {
            $html .= $row . "</thead> <tbody>";
            $header = false;
        }
    }

    $html .= '</tbody></table>';

    $fechaData = $elD . '/' . $elM . '/' . $elA;
    $sql = "INSERT INTO datos (fecha, hora, autor) VALUE( '$fechaData','$elH', 'Admin')";
    $querys[] = $sql;

    $result = $mysqli->query($sql);
    $html .= '<div class="emparejado">El archivo se actualizo con fecha ' . $fechaData . ' a las ' . $elH . '</div>';
} else {
    $html .= "<div class='alert alert-info'><a href='javascript:history.back(-1)'> Volver a cargar </a></div>";
}

$carpeta = "bloqueos";
$url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/$carpeta";

?>


<!doctype html>
<html lang="es">

<head>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="<?php echo $url; ?>/assets/js/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="<?php echo $url; ?>/assets/images/iconlogo.png" />
    <title>Aliados Travel | Control Charter</title>

    <style>
        .error {
            max-width: 500px;
            margin: auto;
            font-size: 22px;
            text-align: center;
            border: solid 3px #c00;
            padding: 20px;
        }

        body {
            font-family: 'Open Sans', sans-serif;

        }

        .ok {
            max-width: 500px;
            margin: auto;
            border: solid 3px #579900;
            padding: 20px;
            text-align: center;
            font-size: 22px;
            font-weight: bold;
        }

        thead tr:nth-child(1) {
            background: #031268;
            color: white;
        }

        .emparejado {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            display: block;
            background: #2b8c03;
            color: #fff;
            text-align: center;
            padding: 10px;
        }

        body {
            padding-top: 90px;
        }
    </style>
</head>

<body>

    <div class="container">
        <?php echo $html; ?>
    </div>

</body>
<?php include '../../assets/templates/scripts.php'; ?>
<?php include '../../assets/templates/datatables.php'; ?>
<script>
    console.log("<?php echo implode("", $querys); ?>");
</script>

</html>