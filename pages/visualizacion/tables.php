<?php
session_start();
$level_file = "../..";

if (isset($_GET['mes'])) {
      $mes = $_GET['mes'];
      $ano = $_GET['ano'];
      $desde = $_GET['desde'];
      $destino = $_GET['destino'];
}


#asignamos el nombre del mes de regreso
$destino2 = asignarNombreCiudad($destino);

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
                                    <img src="<?php echo $url; ?>/assets/images/banner1.jpg" width="100%">
                                    <h1 class="subtitle">
                                          <?php echo $destino2 ?> <br>
                                          <?php echo $ano ?>
                                    </h1>
                                    <h4>Saliendo desde
                                          <?php echo $desde2 ?>
                                    </h4>
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

                                                <?php
                                                $consulta = mysqli_query($conexion, "select * from productos  where ano = '$ano' AND mes = '$mes' AND desde1='$desde'  AND hasta1='$destino' ORDER BY dia ASC") or die(mysqli_error($conexion));
                                                //$consulta=mysqli_query($conexion,"select * from productos vuelo1 = 0") or die(mysqli_error($conexion));
                                                $registro = mysqli_fetch_array($consulta);
                                                //IMPRIMIR TABLA DE TODOS LOS REGISTROS
                                                echo "<table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>
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
                                                            if (file_exists($nombre_fichero . ".jpg")) {
                                                                  $contentFlyer = "<a target='_blank' href='img.php?url=$nombre_fichero.jpg' title='$programa'>$programaFlyer <i class='fas fa-camera'></i></a>";
                                                                  if (file_exists($nombre_fichero . "-2.jpg")) {
                                                                        $contentFlyer .= "<br><a target='_blank' href='img.php?url=$nombre_fichero-2.jpg' title='$programa'>$programaFlyer-B&I <i class='fas fa-camera'></i></a>";
                                                                  }
                                                            } elseif (file_exists($nombre_fichero . ".jpeg")) {
                                                                  $contentFlyer = "<a target='_blank' href='img.php?url=$nombre_fichero.jpeg' title='$programa'>$programaFlyer <i class='fas fa-camera'></i></a>";
                                                                  if (file_exists($nombre_fichero . "-2.jpg")) {
                                                                        $contentFlyer .= "<br><a target='_blank' href='img.php?url=$nombre_fichero-2.jpg' title='$programa'>$programaFlyer-B&I <i class='fas fa-camera'></i></a>";
                                                                  }   
                                                            } elseif (file_exists($nombre_fichero . ".png")) {
                                                                  $contentFlyer = "<a target='_blank' href='img.php?url=$nombre_fichero.png' title='$programa'>$programaFlyer <i class='fas fa-camera'></i></a>";
                                                                  if (file_exists($nombre_fichero . "-2.jpg")) {
                                                                        $contentFlyer .= "<br><a target='_blank' href='img.php?url=$nombre_fichero-2.jpg' title='$programa'>$programaFlyer-B&I <i class='fas fa-camera'></i></a>";
                                                                  }   
                                                            } else {
                                                                  if (file_exists($nombre_fichero . "-2.jpg")) {
                                                                        $contentFlyer = "<a target='_blank' href='img.php?url=$nombre_fichero-2.jpg' title='$programa'>$programaFlyer-B&I <i class='fas fa-camera'></i></a>";
                                                                  }else{
                                                                        $contentFlyer = "$programaFlyer - Sin vista previa";
                                                                  }   
                                                            }
                                                      } else {
                                                            $contentPrograma = "Sin paquete";
                                                            $contentFlyer = "Sin paquete";
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
                        <td align='center'><img src='$url/assets/images/$aero.png'> $libre</td>
                        <td align='center'> <a href='detalles.php?id=$referencia&desde=$desde' title='$referencia'><i class='fas fa-plane-departure'> </i> <i class='fas fa-calendar-alt'></i></a></td>
                        <td align='center'> $contentPrograma</td>
                        <td align='center'> $contentFlyer</td>
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