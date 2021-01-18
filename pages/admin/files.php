<?php
#conectar a base de datos 
$level_file = "../..";
session_start();

if (!$_SESSION['logged']) {
    header('location: ../login/login.php');
} else {
    if ($_SESSION['user'] != "admin" && $_SESSION['user'] != "productos") {
        header('location: ../');
    }
}

require_once("../../db/conexion.php");

$query = "SELECT DISTINCT programa
          FROM productos
          WHERE programa != 'NO DISPO' AND programa != ' - ' AND programa != '0'";

$consulta = mysqli_query($conexion, $query) or die(mysqli_error($conexion));
$programas = "";
while ($registro = mysqli_fetch_array($consulta)) {
    $programas .= "<tr>";
    $programas .= "<td>" . $registro['programa'] . "</td>";
    $programas .= "<td>" . "NO" . "</td>";
    $programas .= "<td>" . "<button class='btn btn-info'> <i class='fa fa-upload'></i></button>" . "</td>";
    $programas .= "</tr>";
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
                                <table class="table table-responsive" id="archivos">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Archivo Cargado</th>
                                            <th>Programa Asociado</th>
                                            <th>Borrar</th>
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
    <script>
        // Call the dataTables jQuery plugin
        $(document).ready(function() {
            $('#programas').DataTable({
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
                }
            });

            $('#archivos').DataTable({
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
                "order": [
                    [1, "asc"]
                ],
                "columnDefs": [{
                    "orderable": false,
                    "targets": 0
                }]
            });
        });
    </script>

</body>

</html>