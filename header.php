<?php include ('assets/conexion.php');

$gimnasios = "SELECT * from gimnasios";
$query = mysqli_query($con, $gimnasios);

$mostrar = mysqli_fetch_array($query);?>
<!-- ======= Header ======= -->
<header id="header" class="fixed-top header-transparent">
  <div class="container d-flex align-items-center justify-content-between">

    <h1 class="logo"><a href="index.php"><?php echo $mostrar['Nom_Gym']?></a></h1>
    <!-- Uncomment below if you prefer to use an image logo -->
    <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

    <nav id="navbar" class="navbar">
      <ul>
        <li><a class="nav-link scrollto" href="#nosotros">Nosotros</a></li>
        <li><a class="nav-link scrollto" href="iniciar_sesion.php">Iniciar sesión</a></li>
      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->
  </div>
</header><!-- End Header -->