<?php
#conectar a base de datos 
require '2205/conexion.php';

if (isset($_GET['mes'])) {
      $mes = $_GET['mes'];
      $ano = $_GET['ano'];
      $desde = $_GET['desde'];
      $destino = $_GET['destino'];
}


#asignamos el nombre del mes de regreso
switch ($destino) {
      case "CLO":
            $destino2 = "Cali";
            break;
      case "BOG":
            $destino2 = "Bogotá";
            break;
      case "SMR":
            $destino2 = "Santa Marta";
            break;
      case "CTG":
            $destino2 = "Cartagena";
            break;
      case "ADZ":
            $destino2 = "San Andrés";
            break;
      case "BAQ":
            $destino2 = "Barranquilla";
            break;
      case "SDQ":
            $destino2 = "Santo Domingo";
            break;
      case "PTY":
            $destino2 = "Panamá";
            break;
      case "AUA":
            $destino2 = "Aruba";
            break;
      case "CUR":
            $destino2 = "Curazao";
            break;
      case "PUJ":
            $destino2 = "Punta Cana";
            break;
      case "CUN":
            $destino2 = "Cancún";
            break;
}


#asignamos el nombre del mes de origen
switch ($desde) {
      case "CLO":
            $desde2 = "Cali";
            break;
      case "BOG":
            $desde2 = "Bogotá";
            break;
      case "SMR":
            $desde2 = "Santa Marta";
            break;
      case "CTG":
            $desde2 = "Cartagena";
            break;
      case "ADZ":
            $desde2 = "San Andrés";
            break;
      case "BAQ":
            $desde2 = "Barranquilla";
            break;
      case "SDQ":
            $desde2 = "Santo Domingo";
            break;
      case "PTY":
            $desde2 = "Panamá";
            break;
      case "AUA":
            $desde2 = "Aruba";
            break;
      case "CUR":
            $desde2 = "Curazao";
            break;
      case "PUJ":
            $desde2 = "Punta Cana";
            break;
      case "CUN":
            $desde2 = "Cancún";
            break;
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

      <?php include 'header.php'; ?>


      <style type="text/css">
            .bg-gradient-primary {
                  background-color: #214482;
                  background-image: linear-gradient(180deg, #214582 10%, #224abe 100%);
                  background-size: cover;
            }

            span.vuelo {
                  font-size: 12px;
                  float: right;
                  opacity: .5;
                  line-height: 24px;
            }


            .tituloDest {
                  position: relative;
            }

            .tituloDest h1 {
                  position: absolute;
                  top: 50%;
                  left: 50%;
                  color: white;
                  transform: translate(-50%, -20%);
                  font-size: 4em;
                  text-align: center;
                  line-height: 55px;
            }

            .tituloDest h4 {
                  position: absolute;
                  top: 50%;
                  left: 50%;
                  color: white;
                  font-weight: 100;
                  transform: translate(-50%, -204%);
            }

            td.dia {
                  font-size: 19px;
                  font-weight: 900;
                  text-align: center;
                  color: #4e77e2;
            }

            .showMes {
                  background: #dddddd;
            }

            .ok b {

                  color: #008c19;

            }

            .alertas b {

                  color: #e30000;

            }

            .alertas:after {
                  content: "(i) Hace mas de 20 horas que no se actualiza las tablas.";
                  font-size: 12px;
                  background: red;
                  color: white;
                  padding: 0px 8px;
                  border-radius: 15px;
                  transform: translate(0px, -15px);
                  display: inline-block;
                  animation: alerta 1s infinite;
            }

            @keyframes alerta {
                  0% {
                        opacity: 1;
                  }

                  50% {
                        opacity: .5;
                  }

                  100% {
                        opacity: 1;
                  }
            }
      </style>

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
                                    
                                    <div class="topbar-divider d-none d-sm-block"></div>
                                    
                                    <!-- Nav Item - User Information -->
                                    <?php include 'navbar.php' ?>
                                    <!-- <li class="nav-item dropdown no-arrow"> -->
                                          <!-- <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> -->
                                                <!-- <span class="mr-2 d-none d-lg-inline text-gray-600 small">Control Bloqueos V1.0</span> -->
                                                <!-- <img class="img-profile rounded-circle" src="http://charter.aliadostravel.com/img/logo.png"> -->
                                          <!-- </a> -->
                                          <!-- Dropdown - User Information -->
<!--  -->
                                    <!-- </li> -->
<!--  -->
<!--  -->
                              </ul>

                        </nav>
                        <!-- End of Topbar -->

                        <!-- Begin Page Content -->
                        <div class="container-fluid">

                              <!-- Page Heading -->
                              <div class="mb-4 tituloDest">
                                    <img src="http://charter.aliadostravel.com/img/banner1.jpg" width="100%">
                                    <h1>
                                          <? echo $destino2 ?> <br>
                                          <? echo $ano ?>
                                    </h1>
                                    <h4>Saliendo desde
                                          <? echo $desde2 ?>
                                    </h4>
                              </div>

                              <!-- DataTales Example -->
                              <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                          <h6 class="m-0 font-weight-bold text-primary">Salidas en
                                                <? echo $mes2 ?>
                                          </h6>
                                    </div>

                                    <div class="card-body">
                                          <div class="table-responsive">

                                                <?php
                                                $consulta = mysqli_query($conexion, "select * from productos  where ano = '$ano' AND mes = '$mes' AND desde1='$desde'  AND hasta1='$destino' ORDER BY dia ASC") or die(mysqli_error($conexion));
                                                //$consulta=mysqli_query($conexion,"select * from productos vuelo1 = 0") or die(mysqli_error($conexion));
                                                $registro = mysqli_fetch_array($consulta);
                                                //IMPRIMIR TABLA DE TODOS LOS REGISTROS
                                                echo "<table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>
                <thead>
                <tr>
                <th>Ruta ida</th>
                <th>Ruta Regreso</th>
                <th>Mes</th> 
                <th>Tipo</th> 
                <th>Saliendo</th>
                <th>Regresando</th>
                <th>Sillas Libres</th>  
                <th>Ver Itinerario</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                <th>Ruta de Ida</th>
                <th>Ruta de Regreso</th>
                <th>Mes</th> 
                <th>Tipo</th> 
                <th>Saliendo</th>
                <th>Regresando</th>
                <th>Sillas Libres</th>
                <th>Ver Itinerario</th>
                </tr>
                </tfoot>
                <tbody>
                ";
                                                do {
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
                                                      $libre = $registro['libre'];
                                                      $tipo = $registro['tipo'];
                                                      $ano = $registro['ano'];
                                                      $mes = $registro['mes'];
                                                      $dia = $registro['dia'];
                                                      $ano2 = $registro['ano2'];
                                                      $mes22 = $registro['mes2'];
                                                      $dia2 = $registro['dia2'];

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






                                                      if ($libre <= 0) {
                                                      } else {
                                                            #asignamos el nombre de la aerolinea
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


                                                            echo "
                        <tr>
                        <td>$desde - $hacia </td>
                        <td>$desde2 - $hacia2 </td>
                        <td>$mes2</td>
                        <td><span class='_vuelo'>$tipo</span></td>
                        <td class='dia'>$dia <a title='$fecha'><i class='far fa-calendar-check dat'></i></td>
                        <td class='dia'>$dia2 <a title='$fecha2'><i class='far fa-calendar-check dat'></i></td>
                        <td align='center'><img src='img/$aero.png'> $libre</td>
                        <td align='center'> <a href='detalles.php?id=$referencia&desde=$desde' title='$referencia'>Ver itinerario <i class='fas fa-search-plus'></i></a></td>
                        </tr>     
                        ";
                                                      };
                                                } while ($registro = mysqli_fetch_array($consulta));

                                                echo "</tbody></table>";



                                                ?>


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

      <!-- Logout Modal-->
      <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                  <div class="modal-content">
                        <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                              </button>
                        </div>
                        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                        <div class="modal-footer">
                              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                              <a class="btn btn-primary" href="login.html">Logout</a>
                        </div>
                  </div>
            </div>
      </div>

      <!-- Bootstrap core JavaScript-->
      <script src="vendor/jquery/jquery.min.js"></script>
      <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

      <!-- Core plugin JavaScript-->
      <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

      <!-- Custom scripts for all pages-->
      <script src="js/sb-admin-2.min.js"></script>

      <!-- Page level plugins -->
      <script src="vendor/datatables/jquery.dataTables.min.js"></script>
      <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

      <!-- Page level custom scripts -->
      <script src="js/demo/datatables-demo.js"></script>

</body>

</html>