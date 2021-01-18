<?php
#conectar a base de datos 
$level_file = "../..";

if (isset($_GET['mes'])) {
    $mes = $_GET['mes'];
    $ano = $_GET['ano'];
    $desde = $_GET['desde'];
}


#asignamos el nombre del mes de regreso
switch ($desde) {
    case "CLO":
        $desde2 = "Cali";
        break;
    case "BOG":
        $desde2 = "Bogotá";
        break;
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

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <?php include '../../assets/templates/header.php'; ?>

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
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Admin</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">



                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href="../admin/reporte.php" class="dest">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">Reporte</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fa fa-book fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href="../carga/info.php" class="dest">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">Carga información</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fa fa-file-excel fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href="../carga/tarifas.php" class="dest">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">Carga tarifas</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fa fa-file-pdf fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
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

</body>

</html>