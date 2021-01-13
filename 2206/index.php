<!doctype html>
<html lang="es">
  <head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
    <!-- Required meta tags -->
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Actualizar Control de Bloqueos</title>
    
          
 <script type="text/javascript">
	function cargarHojaExcel()
	{
		if(document.frmcargararchivo.excel.value=="")
		{
			alert("Suba un archivo");
			document.frmcargararchivo.excel.focus();
			return false;
		}		
		document.frmcargararchivo.action = "../2205/index.php";
		document.frmcargararchivo.submit();
	}
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
    margin-top: 50%;
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



    
<? 

#conectar a base de datos 
require '../2205/conexion.php';

?>
<article>
	<section>
		<h1>Actualizar Disponibilidad</h1>
		<?
		if (isset($_POST["xlsx"]) AND $clave = $_POST["clave"] == "123456") {
            $user = $_POST["usuario"];
            $clave = $_POST["clave"];
            
            
// Check connection para borrar toda la BD
if ($conexion->connect_error) {
  die("Connection failed: " . $conexion->connect_error);
}
// sql to delete a record
$sql = "DELETE FROM productos WHERE id>=0";

if ($conexion->query($sql) === TRUE) {
  echo "Los datos se borraron automaticamente con exito! <br> SUBA EL ARCHIVO NUEVO";
} else {
  echo "Error deleting record: " . $conexion->error;
}
$conexion->close();


    
            
        ?>
		<form name="frmcargararchivo" method="post" enctype="multipart/form-data">
		  <p>Subir Excel(ControlCharters.xlsx).</p> 
		  <p><input type="file" name="excel" id="excel" /></p>
		  <p><input type="button" value="subir" onclick="cargarHojaExcel();" /></p>
		</form>
		<?
		} else {    
        ?>   
        
		<form name="session" method="post">
		  <p>Inicia sesión para subir archivos.</p> 
		  <p><input type="text" name="usuario" placeholder="Usuario" id="user" /></p>
		  <p><input type="password" name="clave" placeholder="Contraseña"></p>
		  <p><input type="submit" name="xlsx" value="Entrar"></p>
		</form>
		<?
		}
		?>
		
		
		
		
	</section>
</article>


    
    
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>