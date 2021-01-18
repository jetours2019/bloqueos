<?php
#conectar a base de datos 
$level_file = "../..";
session_start();

if (!$_SESSION['logged']) {
    header('location: ../login/login.php');
} else {
    if ($_SESSION['user'] != "admin" && $_SESSION['user'] != "productos") {
        header('location: ../');
    }
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

                    <!-- Content Row -->
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Actualizar Tarifas</h3>
                                </div>
                                <div class="card-body">
                                    <form name="frmcargararchivo" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                                        <p>Subir PDF.</p>
                                        <div class="form-row align-items-center">
                                            <div class="col-sm-4 my-1">
                                                <label class="sr-only" for="inlineFormInputName">Agencia</label>
                                                <input type="text" class="form-control" id="inlineFormInputName" value="AT" readonly>
                                            </div>
                                            <div class="col-sm-4 my-1">
                                                <label class="sr-only" for="inlineFormInputGroupCodigo">Codigo</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="inlineFormInputGroupCodigo" placeholder="Codigo" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 my-1">
                                                <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Tipo</label>
                                                <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" required>
                                                    <option selected>Elegir...</option>
                                                    <option value="P">Promo</option>
                                                    <option value="SP">Super Promo</option>
                                                    <option value="R">Regular</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="excel" name="excel" required onchange="$('#upload-file-info').text($(this).val());">
                                            <label class="custom-file-label" for="excel" id="upload-file-info">Seleccione Archivo...</label>
                                            <div class="invalid-feedback">Debe seleccionar un archivo</div>
                                        </div>
                                        <hr>
                                        <button class="btn btn-primary" type="submit">Subir</button>
                                    </form>
                                </div>
                            </div>
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
    <script type="text/javascript">
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
</body>

</html>