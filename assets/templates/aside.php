    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo $url; ?>">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fab fa-avianex"></i>
        </div>
        <div class="sidebar-brand-text mx-3">BLOQUEO'<sup>s</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <!--a class="nav-link" href="index.html">
          <i class="fab fa-angellist"></i>
          <span>Últimos Cupos</span></a-->
        <a class="nav-link" href="<?php echo trim($url, $carpeta); ?>">
          <i class="fa fa-arrow-left"></i>
          <span>Volver</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <div class="text-center d-inline">
        <form action="<?php echo $level_file; ?>/pages/visualizacion/search_bar_result.php" method="GET">
          <div class="form-group">
            <label for="exampleInputEmail1">Buscar Programa <i class="fas fa-search-plus"></i> </label>
            <input type="text" class="form-control search-bar" name="programa" placeholder="AT 0000 P" minlength="4" oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('Ingrese el codigo del programa completo')">
          </div>
        </form>
      </div>

      <!-- Divider -->
      <hr class="sidebar-divider">
      <!-- Heading -->
      <div class="sidebar-heading">
        Menu
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-star-and-crescent"></i>
          <span>Salidas Cali</span>
        </a>
        <div id="collapseTwo" class="collapse <?php if ($_GET['desde'] == "CLO") echo 'show'; ?> " aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded ">



            <h6 class="collapse-header">2021</h6>
            <a class="collapse-item <?php if ($_GET['desde'] == "CLO" && $_GET['mes'] == 5) echo 'showMes'; ?>" href="<?php echo $level_file; ?>/pages/visualizacion/destinos.php?mes=5&ano=2021&desde=CLO">Mayo</a>
            <a class="collapse-item <?php if ($_GET['desde'] == "CLO" && $_GET['mes'] == 6) echo 'showMes'; ?>" href="<?php echo $level_file; ?>/pages/visualizacion/destinos.php?mes=6&ano=2021&desde=CLO">Junio</a>
            <a class="collapse-item <?php if ($_GET['desde'] == "CLO" && $_GET['mes'] == 7) echo 'showMes'; ?>" href="<?php echo $level_file; ?>/pages/visualizacion/destinos.php?mes=7&ano=2021&desde=CLO">Julio</a>
            <a class="collapse-item <?php if ($_GET['desde'] == "CLO" && $_GET['mes'] == 8) echo 'showMes'; ?>" href="<?php echo $level_file; ?>/pages/visualizacion/destinos.php?mes=8&ano=2021&desde=CLO">Agosto</a>
            <a class="collapse-item <?php if ($_GET['desde'] == "CLO" && $_GET['mes'] == 9) echo 'showMes'; ?>" href="<?php echo $level_file; ?>/pages/visualizacion/destinos.php?mes=9&ano=2021&desde=CLO">Septiembre</a>
            <a class="collapse-item <?php if ($_GET['desde'] == "CLO" && $_GET['mes'] == 10) echo 'showMes'; ?>" href="<?php echo $level_file; ?>/pages/visualizacion/destinos.php?mes=10&ano=2021&desde=CLO">Octubre</a>
            <a class="collapse-item <?php if ($_GET['desde'] == "CLO" && $_GET['mes'] == 11) echo 'showMes'; ?>" href="<?php echo $level_file; ?>/pages/visualizacion/destinos.php?mes=11&ano=2021&desde=CLO">Noviembre</a>
            <a class="collapse-item <?php if ($_GET['desde'] == "CLO" && $_GET['mes'] == 12) echo 'showMes'; ?>" href="<?php echo $level_file; ?>/pages/visualizacion/destinos.php?mes=12&ano=2021&desde=CLO">Diciembre</a>
            <h6 class="collapse-header">2022</h6>
            <a class="collapse-item <?php if ($_GET['desde'] == "CLO" && $_GET['mes'] == 1) echo 'showMes'; ?>" href="<?php echo $level_file; ?>/pages/visualizacion/destinos.php?mes=1&ano=2022&desde=CLO">Enero</a>

          </div>
        </div>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-star-and-crescent"></i>
          <span>Salidas Bogotá</span>
        </a>
        <div id="collapseUtilities" class="collapse <?php if ($_GET['desde'] == "BOG") echo 'show'; ?> " aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">


            <h6 class="collapse-header">2021</h6>
            <a class="collapse-item <?php if ($_GET['desde'] == "BOG" && $_GET['mes'] == 5) echo 'showMes'; ?>" href="<?php echo $level_file; ?>/pages/visualizacion/destinos.php?mes=5&ano=2021&desde=BOG">Mayo</a>
            <a class="collapse-item <?php if ($_GET['desde'] == "BOG" && $_GET['mes'] == 6) echo 'showMes'; ?>" href="<?php echo $level_file; ?>/pages/visualizacion/destinos.php?mes=6&ano=2021&desde=BOG">Junio</a>
            <a class="collapse-item <?php if ($_GET['desde'] == "BOG" && $_GET['mes'] == 7) echo 'showMes'; ?>" href="<?php echo $level_file; ?>/pages/visualizacion/destinos.php?mes=7&ano=2021&desde=BOG">Julio</a>
            <a class="collapse-item <?php if ($_GET['desde'] == "BOG" && $_GET['mes'] == 8) echo 'showMes'; ?>" href="<?php echo $level_file; ?>/pages/visualizacion/destinos.php?mes=8&ano=2021&desde=BOG">Agosto</a>
            <a class="collapse-item <?php if ($_GET['desde'] == "BOG" && $_GET['mes'] == 9) echo 'showMes'; ?>" href="<?php echo $level_file; ?>/pages/visualizacion/destinos.php?mes=9&ano=2021&desde=BOG">Septiembre</a>
            <a class="collapse-item <?php if ($_GET['desde'] == "BOG" && $_GET['mes'] == 10) echo 'showMes'; ?>" href="<?php echo $level_file; ?>/pages/visualizacion/destinos.php?mes=10&ano=2021&desde=BOG">Octubre</a>
            <a class="collapse-item <?php if ($_GET['desde'] == "BOG" && $_GET['mes'] == 11) echo 'showMes'; ?>" href="<?php echo $level_file; ?>/pages/visualizacion/destinos.php?mes=11&ano=2021&desde=BOG">Noviembre</a>
            <a class="collapse-item <?php if ($_GET['desde'] == "BOG" && $_GET['mes'] == 12) echo 'showMes'; ?>" href="<?php echo $level_file; ?>/pages/visualizacion/destinos.php?mes=12&ano=2021&desde=BOG">Diciembre</a>
            <h6 class="collapse-header">2022</h6>
            <a class="collapse-item <?php if ($_GET['desde'] == "BOG" && $_GET['mes'] == 1) echo 'showMes'; ?>" href="<?php echo $level_file; ?>/pages/visualizacion/destinos.php?mes=1&ano=2022&desde=BOG">Enero</a>

          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePereira" aria-expanded="true" aria-controls="collapsePereira">
          <i class="fas fa-star-and-crescent"></i>
          <span>Salidas Pereira</span>
        </a>
        <div id="collapsePereira" class="collapse <?php if ($_GET['desde'] == "PEI") echo 'show'; ?> " aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">

            <h6 class="collapse-header">2021</h6>
            <a class="collapse-item <?php if ($_GET['desde'] == "PEI" && $_GET['mes'] == 6) echo 'showMes'; ?>" href="<?php echo $level_file; ?>/pages/visualizacion/destinos.php?mes=6&ano=2021&desde=PEI">Junio</a>
            <a class="collapse-item <?php if ($_GET['desde'] == "PEI" && $_GET['mes'] == 7) echo 'showMes'; ?>" href="<?php echo $level_file; ?>/pages/visualizacion/destinos.php?mes=7&ano=2021&desde=PEI">Julio</a>
            <a class="collapse-item <?php if ($_GET['desde'] == "PEI" && $_GET['mes'] == 8) echo 'showMes'; ?>" href="<?php echo $level_file; ?>/pages/visualizacion/destinos.php?mes=8&ano=2021&desde=PEI">Agosto</a>
            <a class="collapse-item <?php if ($_GET['desde'] == "PEI" && $_GET['mes'] == 9) echo 'showMes'; ?>" href="<?php echo $level_file; ?>/pages/visualizacion/destinos.php?mes=9&ano=2021&desde=PEI">Septiembre</a>
            <a class="collapse-item <?php if ($_GET['desde'] == "PEI" && $_GET['mes'] == 10) echo 'showMes'; ?>" href="<?php echo $level_file; ?>/pages/visualizacion/destinos.php?mes=10&ano=2021&desde=PEI">Octubre</a>
            <a class="collapse-item <?php if ($_GET['desde'] == "PEI" && $_GET['mes'] == 11) echo 'showMes'; ?>" href="<?php echo $level_file; ?>/pages/visualizacion/destinos.php?mes=11&ano=2021&desde=PEI">Noviembre</a>
            <a class="collapse-item <?php if ($_GET['desde'] == "PEI" && $_GET['mes'] == 12) echo 'showMes'; ?>" href="<?php echo $level_file; ?>/pages/visualizacion/destinos.php?mes=12&ano=2021&desde=PEI">Diciembre</a>
            <h6 class="collapse-header">2022</h6>
            <a class="collapse-item <?php if ($_GET['desde'] == "PEI" && $_GET['mes'] == 1) echo 'showMes'; ?>" href="<?php echo $level_file; ?>/pages/visualizacion/destinos.php?mes=1&ano=2022&desde=PEI">Enero</a>

          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->