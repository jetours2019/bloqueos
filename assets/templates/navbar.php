<?php
session_start();
?>

<li class="nav-item dropdown no-arrow">
    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="mr-2 d-none d-lg-inline text-gray-600 small">Alia2.0</span>
        <img style="width: 142px;height: 50px;border-radius: initial !important;" class="img-profile rounded-circle" src="<?php echo $url; ?>/assets/images/Aliados.png">
    </a>
    <!-- Dropdown - User Information -->

    <div class="dropdown-menu" aria-labelledby="userDropdown">
        <?php
        if ($_SESSION['logged']) {
        ?>
            <?php
            if ($_SESSION['user'] == "admin") {
            ?>
                <a class="dropdown-item" href="<?php echo $level_file; ?>/pages/admin">Administración</a>
                <a class="dropdown-item" href="<?php echo $level_file; ?>/pages/carga/tarifas.php">Carga Tarifas</a>
                <a class="dropdown-item" href="<?php echo $level_file; ?>/pages/carga/info.php">Carga Información</a>
            <?php } elseif ($_SESSION['user'] == "productos") { ?>
                <a class="dropdown-item" href="<?php echo $level_file; ?>/pages/carga/tarifas.php">Carga</a>
                <a class="dropdown-item" href="<?php echo $level_file; ?>/pages/admin/files.php">Archivos Cargados</a>
            <?php } elseif ($_SESSION['user'] == "bloqueos") { ?>
                <a class="dropdown-item" href="<?php echo $level_file; ?>/pages/carga/info.php">Carga</a>
            <?php } elseif ($_SESSION['user'] == "reportes") { ?>
                <a class="dropdown-item" href="<?php echo $level_file; ?>/pages/admin/reporte.php">Reporte</a>
            <?php } ?>
            <a class="dropdown-item" href="<?php echo $level_file; ?>/pages/login/logout.php">Salir</a>
        <?php } else { ?>
            <a class="dropdown-item" href="<?php echo $level_file; ?>/pages/login/login.php">Iniciar sesión</a>
        <?php } ?>

    </div>
</li>