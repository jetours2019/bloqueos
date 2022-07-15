<?php
#conectar a base de datos 
$level_file = "../..";
require_once "$level_file/db/conexion.php";

if (isset($_GET['id'])) {
  $ID = $_GET['id'];
  $desde = $_GET['desde'];
}

$consulta = mysqli_query($conexion, "select * from productos  where referencia = '$ID' AND desde1 = '$desde' ORDER BY id DESC") or die(mysqli_error($conexion));
$registro = mysqli_fetch_array($consulta);

do {
  $fecha2 = $registro['fecha1'];
  $total2 = $registro['total'];
  $id2 = $registro['id'];

  if ($total2 == 0) {
    //echo "Esta cancelado |".$id2."--".$total2."<br>";
  } else {
    $id = $registro['id'];
    $referencia = $registro['referencia'];
    $desde = $registro['desde1'];
    $hacia = $registro['hasta1'];
    $fecha = $registro['fecha1'];
    $libre = $registro['libre'];
    $vuelo = $registro['vuelo1'];
    $aero = $registro['aerolineas1'];
    $tipo1 = $registro['tipo1'];
    $tipo2 = $registro['tipo2'];
    $salida = $registro['salida1'];
    $llegada = $registro['llegada1'];
    $ano = $registro['ano'];
    $mes = $registro['mes'];
    $dia = $registro['dia'];

    $desde2 = $registro['desde2'];
    $hacia2 = $registro['hasta2'];
    $fecha2 = $registro['fecha2'];
    $vuelo2 = $registro['vuelo2'];
    $aero2 = $registro['aerolineas2'];
    $salida2 = $registro['salida2'];
    $llegada2 = $registro['llegada2'];
    $ano2 = $registro['ano2'];
    $mes2 = $registro['mes2'];
    $dia2 = $registro['dia2'];
  };

  #Busquemos la pareja de regreso
  $consulta2 = mysqli_query($conexion, "select * from productos  where referencia = '$referencia' AND id != '$id'") or die(mysqli_error($conexion));
  $registro2 = mysqli_fetch_array($consulta2);

  do {
    //if($registro2['fecha'] == $fecha){    
    //if($registro2['fecha'] == $fecha){    
    //if($registro2['fecha'] == $fecha){    
    //echo "hay una inconsitencia | ";
    //}else{
    /* $id2=$registro2['id'];    
                      /* $id2=$registro2['id'];    
    /* $id2=$registro2['id'];    
                        $referencia2=$registro2['referencia'];
                        $desde2=$registro2['desde'];
                        $hacia2=$registro2['hasta'];
                        $fecha2=$registro2['fecha'];
                        $tipo2=$registro2['tipo'];
                        $salida2=$registro2['salida'];
                        $llegada2=$registro2['llegada'];
                        $ano2=$registro2['ano'];
                        $libre2=$registro2['libre']; 
                        $vuelo2=$registro2['vuelo'];  
                        $mes2=$registro2['mes'];
                        $dia2=$registro2['dia'];*/
    //}
  } while ($registro2 = mysqli_fetch_array($consulta2));
} while ($registro = mysqli_fetch_array($consulta));



#Detectamos el Dia y el mes 
$salida1 = explode("/", $fecha);
$ano1 = $salida1[2];
$ano1 = $salida1[2];
$ano1 = $salida1[2];
$mes1 = $salida1[0];
$mes1 = $salida1[0];
$mes1 = $salida1[0];
$dia1 = $salida1[1];
$dia1 = $salida1[1];
$dia1 = $salida1[1];
#---
$salid2 = explode("/", $fecha2);
$ano2 = $salid2[2];
$ano2 = $salid2[2];
$ano2 = $salid2[2];
$mes2 = $salid2[0];
$mes2 = $salid2[0];
$mes2 = $salid2[0];
$dia2 = $salid2[1];
$dia2 = $salid2[1];
$dia2 = $salid2[1];

#asignamos el nombre del mes de ida
switch ($mes1) {
  case 1:
    $mes1 = "Ene";
    break;
  case 2:
    $mes1 = "Feb";
    break;
  case 3:
    $mes1 = "Mar";
    break;
  case 4:
    $mes1 = "Abr";
    break;
    break;
    break;
  case 5:
    $mes1 = "May";
    break;
    break;
    break;
  case 6:
    $mes1 = "Jun";
    break;
    break;
    break;
  case 7:
    $mes1 = "Jul";
    break;
    break;
    break;
  case 8:
    $mes1 = "Ago";
    break;
    break;
    break;
  case 9:
    $mes1 = "Sep";
    break;
    break;
    break;
  case 10:
    $mes1 = "Oct";
    break;
    break;
    break;
  case 11:
    $mes1 = "Nov";
    break;
    break;
    break;
  case 12:
    $mes1 = "Dic";
    break;
    break;
    break;
}
#asignamos el nombre del mes de regreso
switch ($mes2) {
  case 1:
    $mes3 = "Ene";
    break;
  case 2:
    $mes3 = "Feb";
    break;
  case 3:
    $mes3 = "Mar";
    break;
  case 4:
    $mes3 = "Abr";
    break;
    break;
    break;
  case 5:
    $mes3 = "May";
    break;
    break;
    break;
  case 6:
    $mes3 = "Jun";
    break;
    break;
    break;
  case 7:
    $mes3 = "Jul";
    break;
    break;
    break;
  case 8:
    $mes3 = "Ago";
    break;
    break;
    break;
  case 9:
    $mes3 = "Sep";
    break;
    break;
    break;
  case 10:
    $mes3 = "Oct";
    break;
    break;
    break;
  case 11:
    $mes3 = "Nov";
    break;
    break;
    break;
  case 12:
    $mes3 = "Dic";
    break;
    break;
    break;
}

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
  case 'LA-CHLA-':
  case 'CHLA-LA-':
    $aero = "LACH-";
    break;
  case 'CHLA-AV-':
    $aero = "AV-CHLA-";
    break;
}

?>

<!DOCTYPE html>
<html lang="es">

<head>

  <?php include '../../assets/templates/header.php'; ?>
  <style>
    div#detalles section {
      width: 100%;
      display: inline-block;
      background: white;
      max-width: 47%;
      margin: 1px 10px;
      border-radius: 7px;
      overflow: hidden;
      box-shadow: 0px 4px 3px #3333332b;
      padding-bottom: 40px;
    }


    div#detalles div {
      min-height: 200px;
      padding: 0 10px;
    }

    div#detalles span {
      font-size: 51px;
      font-weight: 100;
      color: #bdbdbd;
      text-align: center;
      width: 100%;
      display: block;
      margin: 0;
      padding: 0;
      line-height: 56px;
    }

    div#detalles span:nth-child(2) {
      font-size: 11px;
      letter-spacing: 9px;
      text-transform: uppercase;
      color: #adadad;
      line-height: 9px;
      font-weight: 600;
    }

    div#detalles img {
      height: 25px;
    }

    div#detalles p {
      background: #fafafa;
      margin: 6px 0;
      text-align: center;
    }

    div#detalles b {
      display: block;
      font-size: 29px;
      text-align: center;
      width: 100%;
      max-width: 122px;
      margin: auto;
      margin-top: 13px;
    }

    div#detalles b i {
      font-style: normal;
      font-weight: 100;
    }



    div#detalles article {
      border-top: 1px solid #ececec;
      width: 100%;
      max-width: 45%;
      margin: 2%;
      display: inline-block;
      text-align: center;
      padding: 6px;
      position: relative;
    }

    div#detalles article i:nth-child(1) {
      position: absolute;
      left: 50%;
      top: -15px;
    }

    .input-group-append {
      margin-left: 12px;
    }

    span.ano {
      float: right;
      opacity: .4;
      font-size: 32px;
      font-weight: 100;
      padding: 12px 0 0 0;
    }

    a.back {
      width: 100%;
      background: white;
      padding: 1px 17px;
      margin: auto;
      display: block;
      max-width: 170px;
      line-height: 33px;
      margin-bottom: 21px;
      border-radius: 23px;
      text-align: center;
      font-size: 20px;
      text-decoration: none;
      opacity: .8;

    }

    a.back:hover {
      opacity: 1;
    }

    .ok b {

      color: #008c19;

    }

    .alertas b {

      color: #e30000;

    }

    .alertas:after {
      content: "(i)";
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

<body id="page-top" class="sidebar-toggled">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <?php include '../../assets/templates/aside.php'; ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <h4>Sillas Disponibles</h4>
              <div class="input-group-append">
                <i class="fas fa-street-view fa-2x text-gray-300"></i> <span class="disponible"><?php echo $libre ?></span>
              </div>
            </div>
          </form>


          <?php

          date_default_timezone_set('UTC');

          $elA = date("Y");
          $elM = date("m");
          $elD = date("d");
          $elH = date("H:i:s", time() - 18000);;

          $consulta = mysqli_query($conexion, "select * from datos ") or die(mysqli_error($conexion));
          $registro = mysqli_fetch_array($consulta);
          do {
            $fecha = $registro['fecha'];
            $hora = $registro['hora'];
          } while ($registro = mysqli_fetch_array($consulta));
          #Detectamos la fecha
          $fechas = explode("/", $fecha);
          $anos = $fechas[2];
          $meses = $fechas[1];
          $dias = $fechas[0];
          #Detectamos la hora guardada
          $horas = explode(":", $hora);
          $horax = $horas[0];
          #Detectamos la hora actual
          $horazz = explode(":", $elH);
          $h = $horazz[0];
          if ($elM == $meses && $elD == $dias && ($horax + 20) > $h) {
            $clase = "ok";
          } else {
            $clase = "alertas";
          }
          echo '<div class="' . $clase . '">Actualizado el .<b>' . $fecha . '</b>. a las .<b>' . $hora . '.</b></div>';
          ?>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <span class="ano"><?php echo $ano ?></span>

            <!-- Nav Item - Alerts -->


            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <?php include '../../assets/templates/navbar.php' ?>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <video class="videoFull" controls="false" autoplay="autoplay" loop>
          <source src="<?php echo $url; ?>/assets/images/videoAvionLoop.mp4" type="video/mp4">
          <source src="<?php echo $url; ?>/assets/images/videoAvionLoop.mp4" type="video/ogg">
          Your browser does not support the video tag.
        </video>



        <!-- Begin Page Content -->
        <div class="container-fluid">

          <a class="back je" href="javascript:history.back(-1);"> <i class="fas fa-arrow-circle-left"></i> Regresar</a>

          <!-- DataTales Example -->
          <div id="detalles">


            <section>
              <h2>SALIENDO</h2>
              <div>
                <span><?php echo $desde . '-' . $hacia; ?></span><span><?php echo $tipo1 ?></span>
                <p><img src='<?php echo $url; ?>/assets/images/<?php echo $aero; ?>.png'> Vuelo: <?php echo $vuelo ?></p>

                <b><?php echo $dia1 ?> <i><?php echo $mes1 ?></i></b>

                <article>
                  <i class="fas fa-plane-departure"></i>
                  Salida: <?php echo $salida ?> <i class="far fa-clock"></i>
                </article>
                <article>
                  <i class="fas fa-plane-arrival"></i>
                  Llegada: <?php echo $llegada ?> <i class="far fa-clock"></i>
                </article>
              </div>
            </section>

            <section>
              <h2>REGRESANDO</h2>
              <div>
                <span><?php echo $desde2 . '-' . $hacia2; ?></span><span><?php echo $tipo2 ?></span>
                <p><img src='<?php echo $url; ?>/assets/images/<?php echo $aero; ?>.png'> Vuelo: <?php echo $vuelo2 ?></p>

                <b><?php echo $dia2 ?> <i><?php echo $mes3 ?></i></b>

                <article>
                  <i class="fas fa-plane-departure"></i>
                  Salida: <?php echo $salida2 ?> <i class="far fa-clock"></i>
                </article>
                <article>
                  <i class="fas fa-plane-arrival"></i>
                  Llegada: <?php echo $llegada2 ?> <i class="far fa-clock"></i>
                </article>
              </div>
            </section>

            <!--a target="_blank" style="color: green;margin-top: 25px;" class="back" href="https://reservas.aliadostravel.com/es-ES/Package/<?php echo $desde ?>/<?php echo $hacia ?>/<?php echo $ano ?>-<?php echo $mes ?>-<?php echo $dia ?>/<?php echo $ano2 ?>-<?php echo $mes2 ?>-<?php echo $dia2 ?>/1/1/0/<?php echo $ano ?>-<?php echo $mes ?>-<?php echo $dia ?>/<?php echo $ano2 ?>-<?php echo $mes2 ?>-<?php echo $dia2 ?>/1/false/NA/NA/NA/aliados--AliadosB2B#air"> Reservar  <i class="fas fa-shopping-cart"></i></a-->

          </div>



        </div>
        <!-- /.container-fluid -->



      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Je Tours 2022</span>
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