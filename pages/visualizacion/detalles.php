<?php
#conectar a base de datos 
require '2205/conexion.php';

if(isset($_GET['id'])){
  $ID=$_GET['id'];
  $desde=$_GET['desde'];
}  

                $consulta=mysqli_query($conexion,"select * from productos  where referencia = '$ID' AND desde1 = '$desde' ORDER BY id DESC") or die(mysqli_error($conexion));
                $registro=mysqli_fetch_array($consulta);
                
                do{  
                    $fecha2 = $registro['fecha1'];
                    $total2 = $registro['total'];
                    $id2 = $registro['id'];
                
                    if($total2 == 0){    
                        //echo "Esta cancelado |".$id2."--".$total2."<br>";
                    }else{
                        $id=$registro['id'];
                        $referencia=$registro['referencia'];
                        $desde=$registro['desde1'];  
                        $hacia=$registro['hasta1'];  
                        $fecha=$registro['fecha1'];
                        $libre=$registro['libre'];  
                        $vuelo=$registro['vuelo1'];  
                        $aero=$registro['aerolineas1'];  
                        $tipo=$registro['tipo'];
                        $salida=$registro['salida1'];
                        $llegada=$registro['llegada1'];
                        $ano=$registro['ano'];
                        $mes=$registro['mes'];
                        $dia=$registro['dia'];
                        
                        $desde2=$registro['desde2'];  
                        $hacia2=$registro['hasta2'];  
                        $fecha2=$registro['fecha2'];
                        $vuelo2=$registro['vuelo2'];  
                        $aero2=$registro['aerolineas2']; 
                        $salida2=$registro['salida2'];
                        $llegada2=$registro['llegada2'];
                        $ano2=$registro['ano2'];
                        $mes2=$registro['mes2'];
                        $dia2=$registro['dia2'];
                        
                        
                    };
                    
                    #Busquemos la pareja de regreso
                    $consulta2=mysqli_query($conexion,"select * from productos  where referencia = '$referencia' AND id != '$id'") or die(mysqli_error($conexion));
                    $registro2=mysqli_fetch_array($consulta2);
                    
                    do{  
                    //if($registro2['fecha'] == $fecha){    
                        //echo "hay una inconsitencia | ";
                    //}else{
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
                    }while($registro2=mysqli_fetch_array($consulta2));
                    
                    
                   
                }while($registro=mysqli_fetch_array($consulta));

                
                
                #Detectamos el Dia y el mes 
                $salida1 = explode("/", $fecha);
                $ano1 = $salida1[2]; 
                $mes1 = $salida1[0]; 
                $dia1 = $salida1[1]; 
                #---
                $salid2 = explode("/", $fecha2);
                $ano2 = $salid2[2]; 
                $mes2 = $salid2[0]; 
                $dia2 = $salid2[1]; 
                
                #asignamos el nombre del mes de ida
                switch ($mes1) {
                   case 1:
                         $mes1="Ene";
                         break;
                   case 2:
                         $mes1="Feb";
                         break;
                   case 3:
                         $mes1="Mar";
                         break;
                   case 4:
                         $mes1="Abr";
                         break;      
                   case 5:
                         $mes1="May";
                         break; 
                   case 6:
                         $mes1="Jun";
                         break;       
                   case 7:
                         $mes1="Jul";
                         break;       
                    case 8:
                         $mes1="Ago";
                         break;      
                    case 9:
                         $mes1="Sep";
                         break;      
                    case 10:
                         $mes1="Oct";
                         break;      
                    case 11:
                         $mes1="Nov";
                         break; 
                    case 12:
                         $mes1="Dic";
                         break;  
                }
                #asignamos el nombre del mes de regreso
                switch ($mes2) {
                   case 1:
                         $mes3="Ene";
                         break;
                   case 2:
                         $mes3="Feb";
                         break;
                   case 3:
                         $mes3="Mar";
                         break;
                   case 4:
                         $mes3="Abr";
                         break;      
                   case 5:
                         $mes3="May";
                         break; 
                   case 6:
                         $mes3="Jun";
                         break;       
                   case 7:
                         $mes3="Jul";
                         break;       
                    case 8:
                         $mes3="Ago";
                         break;      
                    case 9:
                         $mes3="Sep";
                         break;      
                    case 10:
                         $mes3="Oct";
                         break;      
                    case 11:
                         $mes3="Nov";
                         break; 
                    case 12:
                         $mes3="Dic";
                         break;      
                }
                
                #asignamos el nombre de la aerolinea
                switch ($aero) {
                   case 'LA-':
                         $aero="LA";
                         break;
                   case 'AV-':
                         $aero="AV";
                         break;
                   case 'CO-':
                         $aero="CO";
                         break;
                   case '9A-':
                     $aero="cga";
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
    background-image: linear-gradient(180deg,#214582 10%,#224abe 100%);
    background-size: cover;
}
span.vuelo {
    font-size: 12px;
    float: right;
    opacity: .5;
    line-height: 24px;
}
.videoFull {
    position: absolute;
    top: 0;
    left: 0;
    z-index: -1;
    width: 100%;
}
#wrapper #content-wrapper {
    background-color: transparent;
    width: 100%;
    overflow-x: hidden;
}
div#detalles {
    height: 100vh;
}


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

div#detalles h2 {
    text-align: center;
    background: #22468d;
    color: white;
    font-size: 25px;
    padding: 5px;
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
    font-size: 9px;
    letter-spacing: 17px;
    text-transform: uppercase;
    color: #676767;
    line-height: 9px;
}

div#detalles img {
    height:25px;
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

div#detalles b i {font-style: normal;font-weight: 100;}



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
span.disponible {
    color: #4CAF50;
    font-size: 25px;
    padding: 0 7px;
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
    opacity:.8;
  
}

a.back:hover {
    opacity:1;
}
.ok b {

    color: #008c19;

}
.alertas b {

    color: #e30000;

}
.alertas:after {content: "(i)";
font-size: 12px;
background: red;
color: white;
padding: 0px 8px;
border-radius: 15px;
transform: translate(0px, -15px);
display: inline-block;
animation: alerta 1s infinite;
}

@keyframes alerta{
    0%{
        opacity:1;
    }
    50%{
        opacity:.5;
    }
    100%{
        opacity:1;
    }
}
  </style>

</head>

<body id="page-top" class="sidebar-toggled">

  <!-- Page Wrapper -->
  <div id="wrapper">

<?php include 'aside.php'; ?>

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
          
          
          <?
         #conectar a base de datos 
         require '2205/conexion.php';
         
         date_default_timezone_set('UTC');

        $elA = date("Y");
        $elM = date("m");
        $elD = date("d");
        $elH = date("H:i:s",time()-18000);;

         $consulta=mysqli_query($conexion,"select * from datos ") or die(mysqli_error($conexion));
         $registro=mysqli_fetch_array($consulta);
                 do{  
                    $fecha= $registro['fecha'];
                    $hora= $registro['hora'];    
                }while($registro=mysqli_fetch_array($consulta));
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
                if($elM == $meses && $elD == $dias && ($horax+4) > $h){
                        $clase = "ok";
                }else{
                    $clase = "alertas";
                }
                echo '<div class="'.$clase.'">Actualizado el .<b>'.$fecha.'</b>. a las .<b>'.$hora.'.</b></div>';
        ?>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <span class="ano"><?php echo $ano ?></span>  
            
            
            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Buscar..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <!-- Nav Item - Alerts -->
            

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Control Bloqueos V1.0</span>
                <img class="img-profile rounded-circle" src="<?php echo $url; ?>/assets/images/logo.png">
              </a>
              <!-- Dropdown - User Information -->
              
            </li>


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

        <a class="back" href="javascript:history.back(-1);"> <i class="fas fa-arrow-circle-left"></i> Regresar</a>
        
          <!-- DataTales Example -->
          <div id="detalles">
              
            
    
   <section>
       <h2>SALIENDO</h2>
       <div>
<span><?php echo $desde.'-'.$hacia; ?></span><span><?php echo $tipo ?></span>
<p><img src="img/<?php echo $aero ?>.png"> Vuelo: <?php echo $vuelo ?></p>

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
<span><?php echo $desde2.'-'.$hacia2; ?></span><span><?php echo $tipo ?></span>
<p><img src="img/<?php echo $aero ?>.png"> Vuelo: <?php echo $vuelo2 ?></p>

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
