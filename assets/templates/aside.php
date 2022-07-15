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
      <!-- Heading -->
      <div class="sidebar-heading">
        Menu
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <?php include 'dynamic_menu.php' ?>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->