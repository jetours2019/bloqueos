<?php
session_start();
$level_file = "../..";

$faltaParam = false;
if (!array_key_exists('programa', $_GET)) {
    $faltaParam = true;
}


#asignamos el nombre del mes de regreso
$destino2 = asignarNombreCiudad($destino2);

#asignamos el nombre del mes de origen
$desde2 = asignarNombreCiudad($desde);

function asignarNombreCiudad($codigo)
{
    $ciudad = "";
    switch ($codigo) {
        case "CLO":
            $ciudad = "Cali";
            break;
        case "BOG":
            $ciudad = "Bogotá";
            break;
        case "SMR":
            $ciudad = "Santa Marta";
            break;
        case "CTG":
            $ciudad = "Cartagena";
            break;
        case "ADZ":
            $ciudad = "San Andrés";
            break;
        case "BAQ":
            $ciudad = "Barranquilla";
            break;
        case "SDQ":
            $ciudad = "Santo Domingo";
            break;
        case "PTY":
            $ciudad = "Panamá";
            break;
        case "AUA":
            $ciudad = "Aruba";
            break;
        case "CUR":
            $ciudad = "Curazao";
            break;
        case "PUJ":
            $ciudad = "Punta Cana";
            break;
        case "CUN":
            $ciudad = "Cancún";
            break;
        case "PSO":
            $ciudad = "Pasto";
            break;
        case "PEI":
            $ciudad = "Pereira";
            break;
    }

    return $ciudad;
}

#asignamos el nombre del mes
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
                    <div class="mb-4 tituloDest">
                        <?php
                        if ($faltaParam) {
                        ?>
                        
                        <?php
                        } else {
                        ?>
                            <img src="<?php echo $url; ?>/assets/images/banner1.jpg" width="100%">
                            <h1>
                                <?php echo $destino2 ?> <br>
                                <?php echo $ano ?>
                            </h1>
                            <h4>Saliendo desde
                                <?php echo $desde2 ?>
                            </h4>
                        <?php } ?>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Salidas en
                                <?php echo $mes2 ?>
                            </h6>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>
                                    <colgroup>
                                        <col span='1' style='width: 101px !important;'>
                                        <col span='1' style='width: 101px !important;'>
                                        <col span='1' style='width: 60px !important;'>
                                        <col span='1' style='width: 77px !important;'>
                                        <col span='1' style='width: 65px !important;'>
                                        <col span='1' style='width: 65px !important;'>
                                        <col span='1' style='width: 80px !important;'>
                                        <col span='1' style='width: 90px !important;'>
                                        <col span='1' style='width: 125px !important;'>
                                        <col span='1' style='width: 125px !important;'>
                                    </colgroup>
                                    <thead>
                                        <tr>
                                            <th>Ruta ida</th>
                                            <th>Ruta Regreso</th>
                                            <th>Mes</th>
                                            <th>Tipo</th>
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
                                            <th>Tipo</th>
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
                    </div>

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
                    "zeroRecords": "No se encuentran registros",
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