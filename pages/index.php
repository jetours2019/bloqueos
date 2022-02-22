<?php
session_start();
$level_file = "..";
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
              <h1 class="h3 mb-0 text-gray-800">Koray Hotel</h1>
              <div class="card shadow mb-4">
                <iframe style="height: 40vh;" width="100%" src="https://www.youtube.com/embed/5ElcTpo4QQc?autoplay=1&loop=1;&amp;mute=1&amp;enablejsapi=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
              </div>
            </div>


            <div class="col-lg-6 mb-4">
              <!-- Project Card Example -->
              <h1 class="h3 mb-0 text-gray-800">Hotel Isla Bonita</h1>
              <div class="card shadow mb-4">
                <iframe style="height: 40vh;" width="100%" src="https://www.youtube.com/embed/egGcrBR-qLA?autoplay=1&loop=1;&amp;mute=1&amp;enablejsapi=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
              </div>
            </div>


          </div>

          <!--div id="videoInicio">
        <a href="#videoInicio"> X </a>
        <iframe width="560" height="315" src="https://www.youtube.com/embed/wqHq8qHzY2I" frameborder="0" allow="accelerometer; autoplay=1&amp;mute=1&amp;enablejsapi=1" allowfullscreen=""></iframe>
        </div-->

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Reserva con los Hoteles Aliados y gana boletas para participar por una <br> moto AKT DYNAMIC PRO 2022</h1>
          </div>




          <!-- Content Row -->
          <div class="row" >

            <!-- Campa単a Hoteles -->
            <div class="col-12 col-md-4 mb-4">
              <div class="card  shadow h-100 py-2">
                <div class="card-body">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                              <img src="../assets/images/hotel(1).jpg" class="w-100">
                            </button>
                            
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <img src="../assets/images/hotel(1).jpg" class="w-100">
                                  </div>
                                 
                                </div>
                              </div>
                            </div>
                </div>
              </div>
            </div>





            <div class="col-12 col-md-4 mb-4">
              <div class="card  shadow h-100 py-2">
                <div class="card-body">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal2">
                              <img src="../assets/images/hotel(2).jpg" class="w-100">
                            </button>
                            
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <img src="../assets/images/hotel(2).jpg" class="w-100">
                                  </div>
                                 
                                </div>
                              </div>
                            </div>
                </div>
              </div>
            </div>
            
            
            
            
            
            <div class="col-12 col-md-4 mb-4">
              <div class="card  shadow h-100 py-2">
                <div class="card-body">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal3">
                              <img src="../assets/images/hotel(3).jpg" class="w-100">
                            </button>
                            
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <img src="../assets/images/hotel(3).jpg" class="w-100">
                                  </div>
                                 
                                </div>
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