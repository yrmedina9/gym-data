<?php include "modales_admin.php";?>
<body>
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="admin.php" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">DATA GYM</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
        <li class="nav-item dropdown pe-3">
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $datos['Nom_usu']?></span>
          </a><!-- End Profile Iamge Icon -->
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo $datos['Nom_usu']?></h6>
              <span><?php echo $datos['Tipo_rol']?></span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>

              
              <a class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#actualizagym"><i class="bi bi-tools"></i><span>Config gimnasio</span></a>

                
              <a class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#cerrar_sesion">
                <i class="bi bi-box-arrow-right"></i>
                <span>Cerrar sesión</span>
              </a>
              
            </li>
          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->
      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

