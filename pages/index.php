<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>

  <?php include '../assets/templates/header.php'; ?>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <?php include '../assets/templates/aside.php'; ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <?php include '../assets/templates/alertas.php' ?>



          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">




            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <?php include '../assets/templates/navbar.php' ?>


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

  <?php include '../assets/templates/scripts.php'; ?>

</body>

</html>