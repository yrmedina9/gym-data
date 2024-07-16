<?php
session_start();
include 'head.php';
include 'header.php';
include 'assets/conexion.php';

?>

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center justify-content-center">
    <div class="container position-relative">
      <h1>Error de sesión</h1>
      <h2>Usted no ha iniciado sesión, por favor ingrese con sus credenciales</h2>    
    </div>
  </section><!-- End Hero -->

<?php
include 'footer.php';
include 'scripts.php';
?>
</body>
</html>