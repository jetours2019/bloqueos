 <div class="text-xs font-weight-bold text-primary text-uppercase mb-1" style="">Cali <i class="fas fa-arrows-alt-h"></i> <? echo $hacia3; ?></div>
                      <aside class="ultCupos" style="color: black;">
                          <div class="col-xl-3"> Saliendo </div> <div class="col-xl-3"> Fechas </div> <div class="col-xl-4"> Sillas </div><div class="col-xl-2"> Accion </div>
                      </aside>     
                      
                      
<?php 


//Mostrar ultimas sillas del mes actual
$consulta=mysqli_query($conexion,"select * from productos  where ano = '$elA' AND mes = '$elM' AND desde='CLO' AND hasta='$hacia3' ") or die(mysqli_error($conexion));
$registro=mysqli_fetch_array($consulta);
do{  
    $id=$registro['id'];  
    $desde=$registro['desde'];  
    $hacia=$registro['hasta'];
    $libre=$registro['libre']; 
    $ano=$registro['ano'];
    $mes=$registro['mes'];
    $dia=$registro['dia'];
    $referencia=$registro['referencia'];
    
    include 'index.meses.php';//incluimos la conversion de 11 a Noviembre.

    if($libre > 0){
        
        
        
        #Busquemos la pareja de regreso
        $consulta2=mysqli_query($conexion,"select * from productos  where referencia = '$referencia'") or die(mysqli_error($conexion));
        $registro2=mysqli_fetch_array($consulta2);
        
        do{  
        $referencia2=$registro2['referencia'];
        $desde2=$registro2['desde'];
        $hacia2=$registro2['hasta'];
        $fecha2=$registro2['fecha'];
        $tipo2=$registro2['tipo'];
        $dia2=$registro2['dia'];
        }while($registro2=mysqli_fetch_array($consulta2));
                    
                    
                    
                    
                    
                    
                    
    ?>    
                      <aside class="ultCupos">
                          <div class="col-xl-3"> <? echo $mes2?> </div> <div class="col-xl-3"> <? echo $dia?> / <? echo $dia2?> </div> <div class="col-xl-4"><span class="cupo"> <? echo $libre?></span> <span class="alerta">Últimos cupos</span></div><div class="col-xl-2"><a href="detalles.php?id=<? echo $referencia ?>&desde=<? echo $desde ?>"> <i class="fas fa-search-plus"></i> </a></div>
                      </aside>    
    <?php  
    }
}while($registro=mysqli_fetch_array($consulta));


//Mostral Ultimas sillas del proximo mes
$consulta=mysqli_query($conexion,"select * from productos  where ano = '$elA' AND mes = '$prox' AND desde='CLO' AND hasta='$hacia3' ") or die(mysqli_error($conexion));
$registro=mysqli_fetch_array($consulta);
//IMPRIMIR TABLA DE TODOS LOS REGISTROS
do{  
    $desde=$registro['desde'];  
    $hacia=$registro['hasta'];
    $libre=$registro['libre']; 
    $ano=$registro['ano'];
    $mes=$registro['mes'];
    $dia=$registro['dia'];
    $referencia=$registro['referencia'];
    
    include 'index.meses.php';//incluimos la conversion de 11 a Noviembre.

    if($libre > 0){
        
        
        #Busquemos la pareja de regreso
        $consulta2=mysqli_query($conexion,"select * from productos  where referencia = '$referencia'") or die(mysqli_error($conexion));
        $registro2=mysqli_fetch_array($consulta2);
        
        do{  
        $referencia2=$registro2['referencia'];
        $desde2=$registro2['desde'];
        $hacia2=$registro2['hasta'];
        $fecha2=$registro2['fecha'];
        $tipo2=$registro2['tipo'];
        $dia2=$registro2['dia'];
        }while($registro2=mysqli_fetch_array($consulta2));
        
        if($dia2 < $elD){
            
        }else{
            
        
        
    ?>    
                      <aside class="ultCupos">
                          <div class="col-xl-3"> <? echo $mes2?> </div> <div class="col-xl-3"> <? echo $dia?> / <? echo $dia2?> </div> <div class="col-xl-4"> <span class="cupo"><? echo $libre?></span> <span class="libres">Libres</span></div><div class="col-xl-2"><a href="detalles.php?id=<? echo $referencia ?>&desde=<? echo $desde ?>"> <i class="fas fa-search-plus"></i></a> </div>
                      </aside>  
    <?php  
        }
    }
    
}while($registro=mysqli_fetch_array($consulta));
?>