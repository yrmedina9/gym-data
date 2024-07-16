<!-- Vista a la cual es direccionado el administrador al momento de iniciar sesion -->
<?php
include("control/head.php");
include("control/barra_nav.php");
include("control/sidebar.php");
?>

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Comencemos!</h1>
    </div><!-- End Page Title -->

    <!-- Alertas -->
        <?php if(isset($_SESSION['msg'])){?>
    <div class="alert alert-<?php echo $_SESSION['color'];?> alert-dismissible fade show" role="alert">
        <?php echo $_SESSION['msg'];?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php unset($_SESSION['msg']); unset($_SESSION['color']);}?>

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">

                <div class="card-body">
                  <h5 class="card-title"><span></span></h5>
                  <img src="../../assets/img/img_hero.png" alt="No hay imagen" width="1300">
                </div>
        </div>
      </div>
    </section>

</main><!-- End #main -->

<?php
include 'control/footer.php';
include 'control/scripts.php';
?>