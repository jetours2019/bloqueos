<?php
session_start();
$level_file = "../..";
require_once "$level_file/db/conexion.php";

$faltaParam = false;
if (!array_key_exists('programa', $_GET)) {
    $faltaParam = true;
} else {
    $programa = $_GET['programa'];

    $existe = false;
    $query = "SELECT * 
              FROM productos  
              WHERE programa LIKE '%$programa%' ORDER BY dia ASC";
    $consulta = mysqli_query($conexion, $query) or die(mysqli_error($conexion));

    $row_cnt = mysqli_num_rows($consulta);
    if ($row_cnt > 0) {
        $existe = true;

        do {
            $libre = $registro['libre'];
            $programa = $registro['programa'];
            if ($libre > 0) {
                $id = $registro['id'];
                $referencia = $registro['referencia'];
                $desde = $registro['desde1'];
                $hacia = $registro['hasta1'];
                $fecha = $registro['fecha1'];
                $vuelo = $registro['vuelo1'];
                $aero = $registro['aerolineas1'];
                $desde2 = $registro['desde2'];
                $hacia2 = $registro['hasta2'];
                $fecha2 = $registro['fecha2'];
                $vuelo2 = $registro['vuelo2'];
                $aero2 = $registro['aerolineas2'];
                $tipo1 = $registro['tipo1'];
                $tipo2 = $registro['tipo2'];
                $ano = $registro['ano'];
                $mes = $registro['mes'];
                $dia = $registro['dia'];
                $ano2 = $registro['ano2'];
                $mes22 = $registro['mes2'];
                $dia2 = $registro['dia2'];
                $programa = $registro['programa'];
                $contentPrograma = $contentFlyer = "";
                if (isset($programa) && $programa != null && $programa != "" && $programa != "NO DISPO" && $programa != "0" && $programa != " - " && $programa != "EXCURSIONES") {
                    $programaLink = str_replace(" ", "-", trim($programa));
                    $nombre_fichero = "../carga/files/$programaLink";
                    if (file_exists($nombre_fichero . ".pdf")) {
                        $contentPrograma = "<a target='_blank' href='pdf.php?url=$nombre_fichero.pdf' title='$programa'>$programa <i class='fas fa-search-plus'></i></a>";
                    } elseif (file_exists($nombre_fichero . ".PDF")) {
                        $contentPrograma = "<a target='_blank' href='pdf.php?url=$nombre_fichero.PDF' title='$programa'>$programa <i class='fas fa-search-plus'></i></a>";
                    } else {
                        $contentPrograma = "$programa - Sin vista previa";
                    }

                    $programaFlyer = trim($programa, "AT ");

                    //Validar FLyer 1
                    $existe1 = false;
                    if (file_exists($nombre_fichero . ".jpg")) {
                        $existe1 = true;
                        $contentFlyer .= "<a target='_blank' href='img.php?url=$nombre_fichero.jpg' title='$programa'>$programaFlyer <i class='fas fa-camera'></i></a>";
                    } elseif (file_exists($nombre_fichero . ".jpeg")) {
                        $existe1 = true;
                        $contentFlyer .= "<a target='_blank' href='img.php?url=$nombre_fichero.jpeg' title='$programa'>$programaFlyer <i class='fas fa-camera'></i></a>";
                    } elseif (file_exists($nombre_fichero . ".png")) {
                        $existe1 = true;
                        $contentFlyer .= "<a target='_blank' href='img.php?url=$nombre_fichero.png' title='$programa'>$programaFlyer <i class='fas fa-camera'></i></a>";
                    }

                    //Validar FLyer 2
                    $existe2 = false;
                    $br = $existe1 ? "<br>" : "";
                    if (file_exists($nombre_fichero . "-2.jpg")) {
                        $existe2 = true;
                        $contentFlyer .= "$br<a target='_blank' href='img.php?url=$nombre_fichero-2.jpg' title='$programa'>$programaFlyer-2 <i class='fas fa-camera'></i></a>";
                    } elseif (file_exists($nombre_fichero . "-2.jpeg")) {
                        $existe2 = true;
                        $contentFlyer .= "$br<a target='_blank' href='img.php?url=$nombre_fichero-2.jpeg' title='$programa'>$programaFlyer-2 <i class='fas fa-camera'></i></a>";
                    } elseif (file_exists($nombre_fichero . "-2.png")) {
                        $existe2 = true;
                        $contentFlyer .= "$br<a target='_blank' href='img.php?url=$nombre_fichero-2.png' title='$programa'>$programaFlyer-2 <i class='fas fa-camera'></i></a>";
                    }

                    $br = ($existe2 || $existe1) ? "<br>" : "";

                    //Validar FLyer 3
                    $existe3 = false;
                    $br = $existe1 ? "<br>" : "";
                    if (file_exists($nombre_fichero . "-3.jpg")) {
                        $existe3 = true;
                        $contentFlyer .= "$br<a target='_blank' href='img.php?url=$nombre_fichero-3.jpg' title='$programa'>$programaFlyer-3 <i class='fas fa-camera'></i></a>";
                    } elseif (file_exists($nombre_fichero . "-3.jpeg")) {
                        $existe3 = true;
                        $contentFlyer .= "$br<a target='_blank' href='img.php?url=$nombre_fichero-3.jpeg' title='$programa'>$programaFlyer-3 <i class='fas fa-camera'></i></a>";
                    } elseif (file_exists($nombre_fichero . "-3.png")) {
                        $existe3 = true;
                        $contentFlyer .= "$br<a target='_blank' href='img.php?url=$nombre_fichero-3.png' title='$programa'>$programaFlyer-3 <i class='fas fa-camera'></i></a>";
                    }
                    
                    if(!$existe1 && !$existe2 && !$existe3){
                        $contentFlyer .= "$programaFlyer - Sin vista previa";
                    }

                } else {
                    $contentPrograma = "Sin paquete";
                    $contentFlyer .= "Sin paquete";
                }
                #asignamos el nombre del mes de regreso
                switch ($mes) {
                    case 1:
                        $mes2 = "Enero";
                        break;
                    case 2:
                        $mes2 = "Febrero";
                        break;
                    case 3:
                        $mes2 = "Marzo";
                        break;
                    case 4:
                        $mes2 = "Abril";
                        break;
                    case 5:
                        $mes2 = "Mayo";
                        break;
                    case 6:
                        $mes2 = "Junio";
                        break;
                    case 7:
                        $mes2 = "Julio";
                        break;
                    case 8:
                        $mes2 = "Agosto";
                        break;
                    case 9:
                        $mes2 = "Septiembre";
                        break;
                    case 10:
                        $mes2 = "Octubre";
                        break;
                    case 11:
                        $mes2 = "Noviembre";
                        break;
                    case 12:
                        $mes2 = "Diciembre";
                        break;
                }

                switch ($aero) {
                    case 'LA-':
                        $aero = "LA";
                        break;
                    case 'AV-':
                        $aero = "AV";
                        break;
                    case 'CO-':
                        $aero = "CO";
                        break;
                    case '9A-':
                        $aero = "cga";
                        break;
                }


                $contentTable .= "
                                <tr>
                                <td>$desde - $hacia </td>
                                <td>$desde2 - $hacia2 </td>
                                <td>$mes2</td>
                                <td class='dia'>$dia <a title='$fecha'><i class='far fa-calendar-check dat'></i> <br> <p class='lead'><small>$tipo1</small></p></td>
                                <td class='dia'>$dia2 <a title='$fecha2'><i class='far fa-calendar-check dat'></i> <br> <p class='lead'><small>$tipo2</small></p></td>
                                <td align='center'><img src='$level_file/assets/images/$aero.png'> $libre</td>
                                <td align='center'> <a href='detalles.php?id=$referencia&desde=$desde' title='$referencia'><i class='fas fa-plane-departure'> </i> <i class='fas fa-calendar-alt'></i></a></td>
                                <td align='center'> $contentPrograma</td>
                                <td> $contentFlyer</td>
                                </tr>     
                                ";
            }
        } while ($registro = mysqli_fetch_array($consulta));
    }
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
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <?php
                    if ($faltaParam) {
                    ?>
                        <div class="mb-4 tituloDest">

                            <img src="<?php echo $url; ?>/assets/images/banner1.jpg" width="100%">
                            <h1 class="subtitle" style="top: 50% !important;">
                                Error en parametro de busqueda. <br> No se encuentra programa.
                            </h1>
                        </div>
                    <?php
                    } else {
                    ?>
                        <div class="mb-4 tituloDest">

                            <img src="<?php echo $url; ?>/assets/images/banner1.jpg" width="100%">
                            <h1 class="subtitle" style="top: 50% !important;">Bloqueos del programa:
                                <?php echo $programa ?>
                            </h1>
                        </div>
                        <div class="card shadow mb-4">

                            <?php
                            if ($existe) {
                            ?>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>
                                            <colgroup>
                                            <col span='1' style='width: 120px !important;'>
                                                <col span='1' style='width: 120px !important;'>
                                                <col span='1' style='width: 65px !important;'>
                                                <col span='1' style='width: 70px !important;'>
                                                <col span='1' style='width: 65px !important;'>
                                                <col span='1' style='width: 90px !important;'>
                                                <col span='1' style='width: 90px !important;'>
                                                <col span='1' style='width: 140px !important;'>
                                                <col span='1' style='width: 150px !important;'>
                                            </colgroup>
                                            <thead>
                                                <tr>
                                                    <th>Ruta ida</th>
                                                    <th>Ruta Regreso</th>
                                                    <th>Mes</th>
                                                    <th>Salida</th>
                                                    <th>Regreso</th>
                                                    <th>Sillas Libres</th>
                                                    <th>Itinerario</th>
                                                    <th>Programa</th>
                                                    <th>Flyer</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Ruta de Ida</th>
                                                    <th>Ruta de Regreso</th>
                                                    <th>Mes</th>
                                                    <th>Salida</th>
                                                    <th>Regreso</th>
                                                    <th>Sillas Libres</th>
                                                    <th>Itinerario</th>
                                                    <th>Programa</th>
                                                    <th>Flyer</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                <?php echo $contentTable; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            <?php
                            } else {
                            ?>
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">
                                        No se encuentran resultados
                                    </h6>
                                </div>
                            <?php } ?>
                        </div>

                    <?php } ?>


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2019</span>
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

    <!-- Bootstrap core JavaScript-->
    <?php include '../../assets/templates/scripts.php'; ?>
    <script src="<?php echo $url; ?>/assets/js/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo $url; ?>/assets/js/datatables/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            var table = $('#dataTable').DataTable({
                "language": {
                    "lengthMenu": "Mostrando _MENU_ registros por página",
                    "zeroRecords": "No se encuentran registros con asientos disponibles",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
                    "infoEmpty": "No se encuentran registros",
                    "infoFiltered": "(Filtrado de _MAX_ registros totales)",
                    "lengthMenu": "Mostrar _MENU_ registros",
                    "search": "Buscar:",
                    "paginate": {
                        "first": "Primera",
                        "last": "Última",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    },
                },
                "autoWidth": false,
                bAutoWidth: false,
            });;
        });
    </script>
</body>

</html>