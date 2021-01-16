<?php
#conectar a base de datos 
require '../../db/conexion.php';

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

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Aliados Travel | Control Charter</title>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <?php include 'aside.php'; ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">


          <?php include 'alertas.php' ?>


          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">



            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Control Bloqueos V1.0</span>
                <img class="img-profile rounded-circle" src="http://charter.aliadostravel.com/img/logo.png">
              </a>
              <!-- Dropdown - User Information -->

            </li>


          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">



          <!-- Content Column -->
          <div class="col-lg-12 mb-4">
            <div class="card shadow mb-4 tituloDest">
              <img src="http://charter.aliadostravel.com/img/nov.jpg" width="100%">
              <h1>
                <? echo $mes2 ?> /
                <? echo $ano ?>
              </h1>
            </div>
          </div>

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Saliendo desde
              <? echo $desde2 ?>
            </h1>

          </div>

          <!-- Content Row -->
          <div class="row">





            <?php
            $consulta = mysqli_query($conexion, "select DISTINCT hasta1 from productos  where ano = '$ano' AND mes = '$mes' AND desde1='$desde' ") or die(mysqli_error($conexion));
            $registro = mysqli_fetch_array($consulta);

            do {
              $hacia = $registro['hasta1'];
              #asignamos el nombre del mes de Destino
              switch ($hacia) {
                case "CLO":
                  $hacia2 = "Cali";
                  break;
                case "BOG":
                  $hacia2 = "Bogotá";
                  break;
                case "SMR":
                  $hacia2 = "Santa Marta";
                  break;
                case "CTG":
                  $hacia2 = "Cartagena";
                  break;
                case "ADZ":
                  $hacia2 = "San Andrés";
                  break;
                case "BAQ":
                  $hacia2 = "Barranquilla";
                  break;
                case "SDQ":
                  $hacia2 = "Santo Domingo";
                  break;
                case "PTY":
                  $hacia2 = "Panamá";
                  break;
                case "AUA":
                  $hacia2 = "Aruba";
                  break;
                case "CUR":
                  $hacia2 = "Curazao";
                  break;
                case "PUJ":
                  $hacia2 = "Punta Cana";
                  break;
                case "CUN":
                  $hacia2 = "Cancún";
                  break;
              }

              if ($registro == 0) {
                echo "No hay Bloqueos.";
              } else if ($hacia == 'CLO') {
              } else {;
            ?>



                <div class="col-xl-3 col-md-6 mb-4">
                  <a href="<? echo 'tables.php?mes='.$mes.'&ano='.$ano.'&destino='.$hacia.'&desde='.$desde ?>" class="dest">
                    <div class="card border-left-primary shadow h-100 py-2">
                      <div class="card-body">
                        <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $hacia2 ?></div>
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


  <?php include '../assets/templates/scripts.php'; ?>

</body>

</html>