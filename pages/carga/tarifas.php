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

$mensaje = "";
$carga = false;
$errorCarga = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $carpetaCarga     = "./files/";
    $programa = $_POST['agencia'] . '-' . $_POST['codigo'] . '-' . $_POST['tipo'];
    $programa = trim($programa, "-");
    if ($_FILES['filepdf']['size'] == 0 && $_FILES['filejpg']['size'] == 0 && $_FILES['filejpg2']['size'] == 0 && $_FILES['filejpg3']['size'] == 0) {
        $errorCarga = true;
        $error = "Debe subir al menos un archivo.";
    } else {
        if ($_FILES['filepdf']['size'] != 0) {
            $rutaArchivo = "$carpetaCarga$programa.pdf";

            $extension = pathinfo($_FILES['filepdf']['name'], PATHINFO_EXTENSION);

            if ($extension != "pdf" && $extension != "PDF") {
                $errorCarga = true;
                $error = "Debe cargar archivos con extensión PDF (.pdf, .PDF).";
            } else {
                if (move_uploaded_file($_FILES['filepdf']['tmp_name'], $rutaArchivo)) {
                    $carga = true;
                } else {
                    $errorCarga = true;
                    $error = "Error al subir archivo PDF al servidor.";
                }
            }
        }

        if ($_FILES['filejpg']['size'] != 0) {

            $rutaArchivo = "$carpetaCarga$programa.jpg";

            $extension = pathinfo($_FILES['filejpg']['name'], PATHINFO_EXTENSION);

            if ($extension != "jpg" && $extension != "jpeg" && $extension != "png" && $extension != "JPG" && $extension != "JPEG" && $extension != "PNG") {
                $errorCarga = true;
                $error = "Debe cargar archivos con extensión de imagen (.jpg, .jpeg, .png).";
            } else {
                if (move_uploaded_file($_FILES['filejpg']['tmp_name'], $rutaArchivo)) {
                    $carga = true;
                } else {
                    $errorCarga = true;
                    $error = "Error al subir archivo de imagen al servidor.";
                }
            }
        }

        if ($_FILES['filejpg2']['size'] != 0) {

            $rutaArchivo = "$carpetaCarga$programa-2.jpg";

            $extension = pathinfo($_FILES['filejpg2']['name'], PATHINFO_EXTENSION);

            if ($extension != "jpg" && $extension != "jpeg" && $extension != "png" && $extension != "JPG" && $extension != "JPEG" && $extension != "PNG") {
                $errorCarga = true;
                $error = "Debe cargar archivos con extensión de imagen (.jpg, .jpeg, .png).";
            } else {
                if (move_uploaded_file($_FILES['filejpg2']['tmp_name'], $rutaArchivo)) {
                    $carga = true;
                } else {
                    $errorCarga = true;
                    $error = "Error al subir archivo de imagen al servidor.";
                }
            }
        }

        if ($_FILES['filejpg3']['size'] != 0) {

            $rutaArchivo = "$carpetaCarga$programa-3.jpg";

            $extension = pathinfo($_FILES['filejpg3']['name'], PATHINFO_EXTENSION);

            if ($extension != "jpg" && $extension != "jpeg" && $extension != "png" && $extension != "JPG" && $extension != "JPEG" && $extension != "PNG") {
                $errorCarga = true;
                $error = "Debe cargar archivos con extensión de imagen (.jpg, .jpeg, .png).";
            } else {
                if (move_uploaded_file($_FILES['filejpg3']['tmp_name'], $rutaArchivo)) {
                    $carga = true;
                } else {
                    $errorCarga = true;
                    $error = "Error al subir archivo de imagen al servidor.";
                }
            }
        }
    }
}

$codigo = "";
$tipo = "";

if (array_key_exists('programa', $_GET)) {
    $programa = $_GET['programa'];
    $arrayPrograma = explode('-', $programa);
    $codigo = $arrayPrograma[1];
    $tipo = $arrayPrograma[2];
    if ($tipo != "P" && $tipo != "SP" && $tipo != "R") {
        $tipo = "";
    }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <?php include '../../assets/templates/header.php'; ?>
    <style>
        .label-carga {
            margin-bottom: 0px;
            margin-top: 10px;
        }
    </style>
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
                                <div class="card-header" id="card-header">
                                    <h3 class="text-center font-weight-light my-4">Actualizar Tarifas</h3>
                                    <?php if ($carga) { ?>
                                        <div class="alert alert-info fz-12">El archivo de tarifas con código
                                            <?php echo $programa; ?> ha sido cargado con éxito
                                        </div>
                                    <?php } elseif ($errorCarga) { ?>
                                        <div class="alert alert-warning fz-12">Error al cargar el archivo de tarifas con código:
                                            <?php echo $programa; ?>. <?php echo $error ?>
                                        </div>
                                    <?php } ?>

                                </div>
                                <div class="card-body">
                                    <form name="frmcargararchivo" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                                        <div class="form-row align-items-center">
                                            <div class="col-sm-2 my-1">
                                                <label class="sr-only" for="agencia">Agencia</label>
                                                <input type="text" class="form-control" id="agencia" value="AT" name="agencia" readonly>
                                            </div>
                                            <div class="col-sm-6 my-1">
                                                <label class="sr-only" for="codigo">Codigo</label>
                                                <div class="input-group">
                                                    <input type="number" minlength="4" class="form-control" id="codigo" name="codigo" placeholder="Codigo" value="<?php echo $codigo; ?>" required>
                                                    <div class="invalid-feedback">Debe ingresar un código de tarifa válido (Mín 4 caracteres)</div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 my-1">
                                                <label class="mr-sm-2 sr-only" for="tipo">Tipo</label>
                                                <select class="custom-select mr-sm-2" id="tipo" name="tipo" placeholder="Elegir...">
                                                    <option <?php if ($tipo == "") echo "selected"; ?> value="">Elegir...</option>
                                                    <option <?php if ($tipo == "P") echo "selected"; ?> value="P">Promo</option>
                                                    <option <?php if ($tipo == "SP") echo "selected"; ?> value="SP">Super Promo</option>
                                                    <option <?php if ($tipo == "R") echo "selected"; ?> value="R">Regular</option>
                                                </select>
                                                <div class="invalid-feedback">Debe seleccionar un tipo de tarifa</div>
                                            </div>
                                        </div>
                                        <p class="label-carga">Subir PDF.</p>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="filepdf" name="filepdf" onchange="validateExtension($(this), ['pdf', 'PDF'])">
                                            <label class="custom-file-label" for="filepdf" id="label-filepdf">Seleccione Archivo...</label>
                                            <div class="invalid-feedback">Debe seleccionar un archivo en formato pdf</div>
                                        </div>
                                        <p class="label-carga">Subir Flyer 1.</p>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="filejpg" name="filejpg" onchange="validateExtension($(this), ['jpg', 'jpeg', 'png', 'JPG', 'JPEG', 'PNG']);">
                                            <label class="custom-file-label" for="filejpg" id="label-filejpg">Seleccione Archivo...</label>
                                            <div class="invalid-feedback">Debe seleccionar un archivo de imagen</div>
                                        </div>
                                        <p class="label-carga">Subir Flyer Adicional 2.</p>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="filejpg2" name="filejpg2" onchange="validateExtension($(this), ['jpg', 'jpeg', 'png', 'JPG', 'JPEG', 'PNG']);">
                                            <label class="custom-file-label" for="filejpg2" id="label-filejpg2">Seleccione Archivo...</label>
                                            <div class="invalid-feedback">Debe seleccionar un archivo de imagen</div>
                                        </div>
                                        <p class="label-carga">Subir Flyer Adicional 3.</p>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="filejpg3" name="filejpg3" onchange="validateExtension($(this), ['jpg', 'jpeg', 'png', 'JPG', 'JPEG', 'PNG']);">
                                            <label class="custom-file-label" for="filejpg3" id="label-filejpg3">Seleccione Archivo...</label>
                                            <div class="invalid-feedback">Debe seleccionar un archivo de imagen</div>
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
    <script type="text/javascript">
        function validateExtension(input, fileExtension) {
            console.log(fileExtension);
            if ($.inArray(input.val().split('.').pop().toLowerCase(), fileExtension) == -1) {
                input.val('');
                $("#alerta").remove();
                $("#card-header").append("<div id='alerta' class='alert alert-warning fz-12'>Debe subir archivos de alguna de las siguientes extensiones: " + fileExtension.join(", ") + "</div>");
            } else {
                $('#label-' + input.attr('id')).text(input.val());
                $("#alerta").remove();
            }
        }
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