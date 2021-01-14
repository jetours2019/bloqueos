<!doctype html>
<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=gb18030">
    <!-- Required meta tags -->

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Actualizar Control de Bloqueos</title>


    <style>
        body {

            background: url(http://charter.aliadostravel.com/2206/bg_blur.jpg);
            background-size: cover;
            background-size: cover;
            padding: 0;
            margin: 0 !important;
        }

        article {
            display: block;
            width: 100%;
            max-width: 530px;
            box-sizing: border-box;
            margin: auto;
            padding: 0;
            height: 100vh;
            overflow: hidden;
            scroll-behavior: unset;
            text-align: center;
            margin-top: 30%;
            transform: translate(0, -50%);
        }

        iframe {
            width: 100%;
            height: calc(100vh + 112px);
            overflow: hidden;
            scroll-behavior: auto;
            transform: translate(0px, -112px);
        }

        section {
            color: white;
            padding: 20px;
        }

        .loginForm {
            width: 70%;
            padding-left: 15%;
            margin-left: 15%;
        }
    </style>

</head>

<body>




    <?php

    #conectar a base de datos 
    require '../2205/conexion.php';
    session_start();

    $logginFailed = false;
    if (!empty($_POST)) {

        $user = $_POST['user'];
        $pass = md5($_POST['pass']);
        $query = "SELECT *
                  FROM usuarios
                  WHERE username = '$key'
                  AND password = '$pass'";

        $consulta = mysqli_query($conexion, $query) or die(mysqli_error($conexion));
        $row_cnt = mysqli_num_rows($consulta);
        if ($row_cnt == 0) {
            $logginFailed = true;
            session_destroy();
        } else {
            $_SESSION['logged'] = true;

            header('location: ../carga');
        }
    }

    ?>
    <article>
        <section>
            <h1>Actualizar Disponibilidad</h1>

            <form name="session" method="post" class="needs-validation" novalidate>
                <p>Inicia sesión para subir archivos.</p>
                <div class="form-group">
                    <label for="username">Nombre de Usuario</label>
                    <input type="text" class="form-control loginForm" required id="user" name="usuario" aria-describedby="username" placeholder="Ingrese nombre de usuario">
                    <div class="invalid-feedback">
                        Debe ingresar un usuario.
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Contraseña</label>
                    <input type="password" class="form-control loginForm" required name="clave" id="exampleInputContraseña1" placeholder="Contraseña">
                    <div class="invalid-feedback">
                        Debe ingresar un usuario.
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Entrar</button>
                <?php if ($logginFailed) { ?>
                    <p class="alert alert-warning">Nombre de usuario o contraseña incorrectos</p>
                <?php } ?>

            </form>

        </section>
    </article>




    <script>
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


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>