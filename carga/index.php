<!doctype html>
<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=gb18030">
    <!-- Required meta tags -->

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Actualizar Control de Bloqueos</title>


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
    </style>

</head>

<body>

    <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header">
                            <h3 class="text-center font-weight-light my-4">Actualizar Disponibilidad</h3>
                        </div>
                        <div class="card-body">
                            <form action="process.php" name="frmcargararchivo" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                                <p>Subir Excel(ControlCharters.xlsx).</p>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="excel" name="excel" required>
                                    <label class="custom-file-label" for="excel">Seleccione Archivo...</label>
                                    <div class="invalid-feedback">Debe seleccionar un archivo</div>
                                </div>
                                <hr>
                                <button class="btn btn-primary" type="submit">Subir</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>