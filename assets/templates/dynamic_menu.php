<?php
require_once "$level_file/db/conexion.php";
require_once "$level_file/assets/templates/cities.php";

$query = "SELECT DISTINCT desde1, ano, mes
          FROM productos as p
          WHERE 
            ((mes >= EXTRACT(MONTH FROM NOW()) AND ano = EXTRACT(YEAR FROM NOW()))
                OR (ano > EXTRACT(YEAR FROM NOW()))) 
            AND 
            (SELECT SUM(libre)
             FROM productos as p2
             WHERE p2.desde1 = p.desde1 AND p.ano = p2.ano AND p.mes = p2.mes) > 0
          ORDER BY  desde1, CAST(ano as INTEGER), CAST(mes AS INTEGER)";

$consulta = mysqli_query($conexion, $query) or die(mysqli_error($conexion));

$months = array(
    1 => "Enero",
    2 => "Febrero",
    3 => "Marzo",
    4 => "Abril",
    5 => "Mayo",
    6 => "Junio",
    7 => "Julio",
    8 => "Agosto",
    9 => "Septiembre",
    10 => "Octubre",
    11 => "Noviembre",
    12 => "Diciembre",
);

$ciudades_menu = array();
while ($registro = mysqli_fetch_array($consulta)) {
    if (!array_key_exists($registro['desde1'], $ciudades_menu)) {
        $ciudades_menu[$registro['desde1']] = array(
            "ciudad" => asignarNombreCiudad($registro['desde1']),
            "anos" => array(
                $registro['ano'] => array(
                    $registro['mes'] => $months[$registro['mes']]
                )
            )
        );
    } else {
        if (!array_key_exists($registro['ano'], $ciudades_menu[$registro['desde1']]['anos'])) {
            $ciudades_menu[$registro['desde1']]['anos'][$registro['ano']] = array(
                $registro['mes'] => $months[$registro['mes']]
            );
        } else {
            $ciudades_menu[$registro['desde1']]['anos'][$registro['ano']][$registro['mes']] = $months[$registro['mes']];
        }
    }
}

foreach ($ciudades_menu as $cod_ciudad => $info_ciudad) {

?>


    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse<?php echo $cod_ciudad; ?>" aria-expanded="true" aria-controls="collapse<?php echo $cod_ciudad; ?>">
            <i class="fas fa-star-and-crescent"></i>
            <span>Salidas de <?php echo $info_ciudad['ciudad']; ?></span>
        </a>
        <div id="collapse<?php echo $cod_ciudad; ?>" class="collapse <?php if ($_GET['desde'] == $cod_ciudad) echo 'show'; ?> " aria-labelledby="heading<?php echo $cod_ciudad; ?>" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded ">

                <?php foreach ($info_ciudad['anos'] as $ano => $info_anos) { ?>
                    <h6 class="collapse-header"><?php echo $ano; ?></h6>
                    <?php foreach ($info_anos as $month_number => $month) { ?>
                        <a class="collapse-item <?php if ($_GET['desde'] == $cod_ciudad && $_GET['mes'] == $month_number) echo 'showMes'; ?>" href="<?php echo "$level_file/pages/visualizacion/destinos.php?mes=$month_number&ano=$ano&desde=$cod_ciudad"; ?>"><?php echo $month; ?></a>
                    <?php } ?>
                <?php } ?>

            </div>
        </div>
    </li>

<?php } ?>