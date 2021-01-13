<html>
    
    <head>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
        
        <style>
        .error {
    max-width: 500px;
    margin: auto;
    font-size: 22px;
    text-align: center;
    border: solid 3px #c00;
    padding: 20px;
}
body{
    font-family: 'Open Sans', sans-serif;
    
}
.ok {
    max-width: 500px;
    margin: auto;
    border: solid 3px #579900;
    padding: 20px;
    text-align: center;
    font-size: 22px;
    font-weight: bold;
}
table tr:nth-child(1) {
    background: #031268;
    color: white;
}

.emparejado {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  display: block;
  background: #2b8c03;
  color: #fff;
  text-align: center;
  padding: 10px;
}
body {
  padding-top: 90px;
}
        </style>
        </head>
 <body>       

<?php
/**
 * Demostrar lectura de hoja de cálculo o archivo
 * de Excel con PHPSpreadSheet: leer todo el contenido
 * de un archivo de Excel
 *
 * @author parzibyte
 */




$elA = date("Y");
$elM = date("m");
$elD = date("d");
$elH = date("H:i:s",time()-18000);;
 
$prox = $elM+1;


    
	if (substr($_FILES['excel']['name'],-3))
	{
		$fecha		= date("Y-m-d");
		$carpeta 	= "../2205/base/";
		$excel  	= $_FILES['excel']['name'];
		move_uploaded_file($_FILES['excel']['tmp_name'], "$carpeta$excel");
		
		$row = 1;
		$fp = fopen ("$carpeta$excel","r");
		//fgetcsv. obtiene los valores que estan en el csv y los extrae.
		
		fclose ($fp);
		$xlsx = 1;
		
		//exit;
	}

if($excel == "ControlCharters.xlsx"){
    echo "<div class='ok'>El archivo se emparejo correctamente.</div>";
    $emparejado = 1;
}else{
    echo "<div class='error'>El archivo ('$excel'.) subido no cumple con el nombre o extención exigida. Recuerde conservar el nombre original del Excel y convertir el archivo a .xlsx</div>";
}

#conectar a base de datos 
require 'conexion.php';





# Cargar librerias y cosas necesarias
require_once "vendor/autoload.php";

# Indicar que usaremos el IOFactory
use PhpOffice\PhpSpreadsheet\IOFactory;

# Recomiendo poner la ruta absoluta si no está junto al script
# Nota: no necesariamente tiene que tener la extensión XLSX
$rutaArchivo = "base/ControlCharters.xlsx";

$documento = IOFactory::load($rutaArchivo);

# Recuerda que un documento puede tener múltiples hojas
# obtener conteo e iterar
$totalDeHojas = $documento->getSheetCount();



if ($xlsx == 1) {
    
# Iterar hoja por hoja
for ($indiceHoja = 0; $indiceHoja < $totalDeHojas; $indiceHoja++) {
    # Obtener hoja en el índice que vaya del ciclo
    $hojaActual = $documento->getSheet($indiceHoja);
    echo "<h3 style='text-align:center;'>CONTROL DE CHARTERS</h3>";

echo '<table border=0 style="margin: auto; width: 100%; border: solid #eee 1px;">';

    # Iterar filas
    foreach ($hojaActual->getRowIterator() as $fila) {
        echo '<tr>';

        foreach ($fila->getCellIterator() as $celda) {         
           
            # Formateado por ejemplo como dinero o con decimales
            $valorFormateado = $celda->getFormattedValue();           
            # Fila, que comienza en 1, luego 2 y así...
            $fila = $celda->getRow();
            #$fila = 2;
            # Columna, que es la A, B, C y así...
            $columna = $celda->getColumn();     
            
            $no = $hojaActual->getCellByColumnAndRow(1, $fila);
            $id = $hojaActual->getCellByColumnAndRow(2, $fila);     
            $vuelo1 = $hojaActual->getCellByColumnAndRow(3, $fila);
            $desde1 = $hojaActual->getCellByColumnAndRow(4, $fila);
            $hasta1 = $hojaActual->getCellByColumnAndRow(5, $fila);
            $aerolineas1 = $hojaActual->getCellByColumnAndRow(6, $fila);
            
            $fechaFormateado = $hojaActual->getCellByColumnAndRow(7, $fila);
            $fecha1 = $fechaFormateado->getFormattedValue(); 
            
            $salidaFormateado = $hojaActual->getCellByColumnAndRow(8, $fila);
            $salida1 = $salidaFormateado->getFormattedValue();
            
            $llegadaFormateado = $hojaActual->getCellByColumnAndRow(9, $fila);
            $llegada1 = $llegadaFormateado->getFormattedValue();
            
            
            $vuelo2 = $hojaActual->getCellByColumnAndRow(10, $fila);
            $desde2 = $hojaActual->getCellByColumnAndRow(11, $fila);
            $hasta2 = $hojaActual->getCellByColumnAndRow(12, $fila);
            $aerolineas2 = $hojaActual->getCellByColumnAndRow(13, $fila);
            
            $fechaFormateado2 = $hojaActual->getCellByColumnAndRow(14, $fila);
            $fecha2 = $fechaFormateado2->getFormattedValue(); 
            
            $salidaFormateado2 = $hojaActual->getCellByColumnAndRow(15, $fila);
            $salida2 = $salidaFormateado2->getFormattedValue();
            
            $llegadaFormateado2 = $hojaActual->getCellByColumnAndRow(16, $fila);
            $llegada2 = $llegadaFormateado2->getFormattedValue();
            
            
            
            $total = $hojaActual->getCellByColumnAndRow(17, $fila);
            $libre = $hojaActual->getCellByColumnAndRow(18, $fila);
            $referencia = $hojaActual->getCellByColumnAndRow(19, $fila);
            
            echo "<td>". $valorFormateado."</td>";  
            
#Detectamos el Año y el mes de la salida
$salidas = explode("/", $fecha1);
$ano = $salidas[2]; 
$mes = $salidas[0]; 
$dia = $salidas[1]; 


#Detectamos el Año y el mes del regreso
$salidas2 = explode("/", $fecha2);
$ano2 = $salidas2[2]; 
$mes2 = $salidas2[0]; 
$dia2 = $salidas2[1]; 



#Detectamos los vuelos con Escala
$tipovuelo = explode(".", $vuelo1);
$contVuelo = count($tipovuelo);
if($contVuelo == 2){
  $tipo= "Escala";  
}else{
  $tipo= "Directo";
};
            
$sql = "INSERT INTO productos (no,id,vuelo1,desde1,hasta1,aerolineas1,fecha1,salida1,llegada1,vuelo2,desde2,hasta2,aerolineas2,fecha2,salida2,llegada2,total,libre,referencia, ano, mes, dia, tipo, ano2, mes2, dia2) VALUE( '$no','$id','$vuelo1','$desde1','$hasta1','$aerolineas1','$fecha1','$salida1','$llegada1','$vuelo2','$desde2','$hasta2','$aerolineas2','$fecha2','$salida2','$llegada2','$total','$libre','$referencia','$ano','$mes','$dia','$tipo','$ano2','$mes2','$dia2')";
$result = $mysqli->query($sql);

	   
            
        }
        echo "</tr>";
        

    }

    echo '</table>';
    
    if($emparejado == 1){
    $fechaData = $elD.'/'.$elM.'/'.$elA;		    
    $sql = "INSERT INTO datos (fecha, hora, autor) VALUE( '$fechaData','$elH', 'Admin')";
    $result = $mysqli->query($sql);	
    echo '<div class="emparejado">El archivo se actualizo con fecha '.$fechaData.' a las '.$elH.'</div>';
    }
}


} else {    
    echo "No puedes acceder a esta pagina? Comunicate con la extención 185";
}


?>

</body>
</html>