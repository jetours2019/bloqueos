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
            <a class="dropdown-item" href="carga">Carga</a>
            <a class="dropdown-item" href="login/logout.php">Salir</a>
        <?php } else { ?>
            <a class="dropdown-item" href="login/login.php">Iniciar sesión</a>
        <?php } ?>

    </div>
</li>