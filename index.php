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

    span.e1 {
      width: auto;
      display: inline-block;
      min-width: 29px;
      margin-left: 32px;
      color: blueviolet;
      text-align: center;
    }

    aside.ultCupos {
      display: flex;
    }

    span.alerta {
      font-size: 10px;
      color: crimson;
      animation: .4s infinite alternate ultimos;
    }

    @keyframes ultimos {
      from {
        opacity: .5;
      }

      to {
        opacity: 1;
      }
    }

    span.libres {
      font-size: 12px;
      color: forestgreen;
    }

    span.cupo {
      width: 27px;
      display: inline-block;
    }

    .ok b {

      color: #008c19;

    }

    .alertas b {

      color: #e30000;

    }

    .alertas:after {
      content: "(i) Hace mas de 4 horas que no se actualiza las tablas.";
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
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Alia2.0</span>
                <img style="width: 142px;height: 50px;border-radius: initial !important;" class="img-profile rounded-circle" src="https://aliadostravel.com/wp-content/uploads/2020/12/Aliados.png">
              </a>
              <!-- Dropdown - User Information -->

              <div class="dropdown-menu" aria-labelledby="userDropdown">
                <?php
                if ($_SESSION['logged']) {
                ?>
                  <a class="dropdown-item" href="carga">Carga</a>
                  <a class="dropdown-item" onclick="alert('En desarrollo')" href="#perfil.php">Perfil</a>
                  <a class="dropdown-item" href="login/logout.php">Salir</a>
                <?php } else { ?>
                  <a class="dropdown-item" href="login/login.php">Iniciar sesión</a>
                <?php } ?>
                
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">


          <!-- Content Row -->
          <div class="row">




            <div class="col-lg-6 mb-4">
              <!-- Project Card Example -->
              <h1 class="h3 mb-0 text-gray-800">Hotel Brisa del Mar</h1>
              <div class="card shadow mb-4">
                <iframe style="height: 40vh;" width="100%" src="https://www.youtube.com/embed/8q4tGnV5i3U?autoplay=1&loop=1;&amp;mute=1&amp;enablejsapi=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
              </div>
            </div>


            <div class="col-lg-6 mb-4">
              <!-- Project Card Example -->
              <h1 class="h3 mb-0 text-gray-800">Hotel Isla Bonita</h1>
              <div class="card shadow mb-4">
                <iframe style="height: 40vh;" width="100%" src="https://www.youtube.com/embed/EEyjzlBxHxE?autoplay=1&loop=1;&amp;mute=1&amp;enablejsapi=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
              </div>
            </div>


          </div>

          <!--div id="videoInicio">
        <a href="#videoInicio"> X </a>
        <iframe width="560" height="315" src="https://www.youtube.com/embed/wqHq8qHzY2I" frameborder="0" allow="accelerometer; autoplay=1&amp;mute=1&amp;enablejsapi=1" allowfullscreen=""></iframe>
        </div-->

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Bienvenido Aliado</h1>
          </div>




          <!-- Content Row -->
          <div class="row" style="display:none;">

            <?php
            #conectar a base de datos 
            require '2205/conexion.php';

            date_default_timezone_set('UTC');

            $elA = date("Y");
            $elM = date("m");
            $elD = date("d");
            $elH = date("H:i:s", time() - 18000);

            $prox = $elM + 1;

            ?>





            <!-- Ultimos (CALI) ciclo -->
            <div class="col-xl-6 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">

                    </div>
                    <div class="col-auto">
                      <i class="fab fa-slideshare fa-2x text-gray-300"></i>

                    </div>
                  </div>
                </div>
              </div>
            </div>





            <!-- Ultimos (BOGOTA) ciclo -->
            <div class="col-xl-6 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">

                    </div>
                    <div class="col-auto">
                      <i class="fab fa-slideshare fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>




            <!-- Pending Requests Card Example -->

          </div>

          <hr>

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
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>