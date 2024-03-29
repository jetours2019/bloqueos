<?php
#conectar a base de datos 
$level_file = "../..";
session_start();
date_default_timezone_set('America/Bogota');

if (!$_SESSION['logged']) {
    header('location: ../login/login.php');
} else {
    if ($_SESSION['user'] != "admin" && $_SESSION['user'] != "productos") {
        header('location: ../');
    }
}

require_once("../../db/conexion.php");

$query = "SELECT GROUP_CONCAT(fecha1 SEPARATOR ', ') as fechas, programa
FROM productos 
WHERE programa != 'NO DISPO' AND programa != '-' AND programa != '0' AND programa != 'EXCURSIONES'
GROUP BY programa";

$consulta = mysqli_query($conexion, $query) or die(mysqli_error($conexion));
$programas = "";
while ($registro = mysqli_fetch_array($consulta)) {
    $programa = str_replace(" ", "-", trim($registro['programa']));
    $fechas = $registro['fechas'];
    $arrayFechas = explode(", ", $fechas);
    if (fechaValida($arrayFechas)) {
        $programas .= "<tr>";
        $programas .= "<td>" . $programa . "</td>";
        $programas .= "<td>" . $fechas . "</td>";

        $nombre_fichero = "../carga/files/$programa.pdf";
        $exists = (file_exists($nombre_fichero)) ? "SI" : "NO";

        $programas .= "<td>" . $exists . "</td>";
        $programas .= "<td>" . "<a href='../carga/tarifas.php?programa=$programa' class='btn btn-info'> <i class='fa fa-upload'></i></a>" . "</td>";
        $programas .= "</tr>";
    }
}

$archivos = "";
$files_in_folder = glob("../carga/files/*");

foreach ($files_in_folder as $file) {
    if (pathinfo($file, PATHINFO_EXTENSION) == "pdf") {
        $archivos .= "<tr>";

        $fileName = basename($file, ".pdf");
        $arrayName = explode("-", $fileName);
        $programa = "{$arrayName[0]} {$arrayName[1]}-{$arrayName[2]}";
        $asoc = "NO";

        $query = "SELECT * FROM productos WHERE programa LIKE '%$programa%'";
        $consulta = mysqli_query($conexion, $query) or die(mysqli_error($conexion));
        $row_cnt = mysqli_num_rows($consulta);
        $fecha =  date ("d-M-Y H:i",filemtime($file));
        if ($row_cnt > 0) {
            $asoc = "SI";
        }

        $archivos .= "<td>" . '<input data-url="'.$file.'" type="checkbox" aria-label="Seleccione para borrar archivo">' . " </td>";
        $archivos .= "<td>$fileName.pdf</td>";
        $archivos .= "<td>$asoc</td>";
        $archivos .= "<td>$fecha</td>";
        $archivos .= "<td> <a class='btn btn-info' target='_blank'  title='Ver archivo' href='$file'><i class='fas fa-search-plus'></i> </a> <button class='btn btn-danger' onclick='confirm_delete_one_file($(this))' title='Eliminar Archivo' data-name='$fileName.pdf' data-url='$file'><i class='fa fa-trash'></i></button> </td>";

        $archivos .= "</tr>";
    }
    
    if (pathinfo($file, PATHINFO_EXTENSION) == "jpg") {
        $archivos .= "<tr>";

        $fileName = basename($file, ".jpg");
        $arrayName = explode("-", $fileName);
        $programa = "{$arrayName[0]} {$arrayName[1]}-{$arrayName[2]}";
        $asoc = "NO";
        $fecha =  date ("d-M-Y H:i",filemtime($file));

        $query = "SELECT * FROM productos WHERE programa LIKE '%$programa%'";
        $consulta = mysqli_query($conexion, $query) or die(mysqli_error($conexion));
        $row_cnt = mysqli_num_rows($consulta);

        if ($row_cnt > 0) {
            $asoc = "SI";
        }

        $archivos .= "<td>" . '<input data-url="'.$file.'" type="checkbox" aria-label="Seleccione para borrar archivo">' . " </td>";
        $archivos .= "<td>$fileName.jpg</td>";
        $archivos .= "<td>$asoc</td>";
        $archivos .= "<td>$fecha</td>";
        $archivos .= "<td> <a class='btn btn-info' target='_blank'  title='Ver archivo' href='$file'><i class='fas fa-search-plus'></i> </a> <button class='btn btn-danger' onclick='confirm_delete_one_file($(this))' title='Eliminar Archivo' data-name='$fileName.pdf' data-url='$file'><i class='fa fa-trash'></i></button> </td>";

        $archivos .= "</tr>";
    }
}


function fechaValida($fechas)
{
    $year_now = intval(date("Y"));
    $month_now = intval(date("m"));

    foreach ($fechas as $fecha) {
        $arrayFecha = explode("/", $fecha);
        $month_compare = intval($arrayFecha[0]);
        $year_compare = intval($arrayFecha[2]);
        if (($year_compare < $year_now) || ($month_compare < $month_now && $year_compare <= $year_now)) {
            $valid = false;
        }else{
            $valid = true;
            break;
        }
    }

    return $valid;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>

    <?php include '../../assets/templates/header.php'; ?>
    <link href="<?php echo $url; ?>/assets/js/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include '../../assets/templates/aside.php'; ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">


                    <?php include '../../assets/templates/alertas.php' ?>


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">


                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <?php include '../../assets/templates/navbar.php' ?>


                    </ul>


                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid pl-5">



                    <!-- Page Heading -->

                    <!-- Content Row -->
                    <div class="row">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Programas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Archivos</a>
                            </li>
                        </ul>
                    </div>
                    <hr>
                    <div class="row pt-2">
                        <div class="tab-content justify-content-center" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <table class="table table-responsive" id="programas">
                                    <thead>
                                        <tr>
                                            <th>Programa</th>
                                            <th>Fechas</th>
                                            <th>Archivo Cargado</th>
                                            <th>Cargar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php echo $programas; ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="row">
                                    <div class="col-md-4">
                                        <button onclick='confirm_delete_all_files()' class="btn fz-12 btn-danger">Borrar Seleccionados</button>
                                    </div>
                                    <div class="col-md-4">
                                        <button onclick="select_all()" class="fz-12 btn btn-info" id="botonSel">Seleccionar Todos</button>
                                    </div>
                                </div>
                                <br>
                                <table class="table table-responsive" id="archivos">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Archivo Cargado</th>
                                            <th>Programa Asociado</th>
                                            <th>Fecha Modificacion</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php echo $archivos; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Aliados Travel 2019</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    <?php include '../../assets/templates/scripts.php'; ?>
    <script src="<?php echo $url; ?>/assets/js/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo $url; ?>/assets/js/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo $url; ?>/assets/js/datatables/dataTables.buttons.min.js"></script>
    <script src="<?php echo $url; ?>/assets/js/files.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</body>

</html>