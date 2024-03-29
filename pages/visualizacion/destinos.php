<?php
#conectar a base de datos 
$level_file = "../..";
include_once "$level_file/assets/templates/cities.php"; 

session_start();

if (isset($_GET['mes'])) {
  $mes = $_GET['mes'];
  $ano = $_GET['ano'];
  $desde = $_GET['desde'];
}


#asignamos el nombre del mes de regreso
$desde2 = asignarNombreCiudad($desde);

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



          <!-- Content Column -->
          <div class="col-lg-12 mb-4">
            <div class="card shadow mb-4 tituloDest">
              <img src="<?php echo $url; ?>/assets/images/nov.jpg" width="100%">
              <h1>
                <?php echo $mes2 ?> /
                <?php echo $_GET['ano'] ?>
              </h1>
            </div>
          </div>

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4 ml-2">
            <h1 class="h3 mb-0 text-gray-800">Saliendo desde
              <?php echo $desde2 ?>
            </h1>

          </div>

          <!-- Content Row -->
          <div class="row ml-3">





            <?php
            $mes = $_GET['mes'];
            $ano = $_GET['ano'];
            $desde = $_GET['desde'];
            $consulta = mysqli_query($conexion, "select DISTINCT hasta1 from productos  where ano = '$ano' AND mes = '$mes' AND desde1='$desde' AND libre > 0") or die(mysqli_error($conexion));
            $registro = mysqli_fetch_array($consulta);

            do {
              $hacia = $registro['hasta1'];
              #asignamos el nombre del mes de Destino
              $hacia2 = asignarNombreCiudad($hacia);
              $url_destino = "https://reservas.aliadostravel.com";
              $extra_message = "RESERVA EN LÍNEA";
              if(($hacia != "ADZ" && $hacia != "CTG" && $hacia != "SMR") || $mes < 2 ){
                $url_destino = 'tables.php?mes=' . $mes . '&ano=' . $ano . '&destino=' . $hacia . '&desde=' . $desde;
                $extra_message = "";
              }
              if ($registro == 0) {
                echo "No hay Bloqueos registrados.";
              } else {;
            ?>



                <div class="col-xl-3 col-md-6 mb-4">
                  <a href="<?php echo $url_destino ?>" class="dest">
                    <div class="card border-left-primary shadow h-100 py-2">
                      <div class="card-body">
                        <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $hacia2 ?></div>
                            <div class="h6 mb-0 text-success font-weight-bold"><?php echo $extra_message ?></div>
                          </div>
                          <div class="col-auto">
                            <i class="fab fa-slideshare fa-2x text-gray-300"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </a>
                </div>


            <?php
              };
            } while ($registro = mysqli_fetch_array($consulta));

            ?>


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