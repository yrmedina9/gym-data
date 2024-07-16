<?php
include("control/head.php");
include("control/barra_nav.php");
include("control/sidebar.php");
?>
<style type="text/css">
.barra
{
    height: 600px;
    line-height: 1em;
    overflow-x: hidden;
    overflow-y: scroll;
    width: 100%;
}
.busquedaa{
    display: flex;
}
.busquedaa .inp-pag{
    margin-left: 5%;
}
</style>
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Pagos</h1>
    </div><!-- End Page Title -->

    <!-- Alerta de suceso -->    
    <?php if(isset($_SESSION['msg'])){?>
    <div class="alert alert-<?php echo $_SESSION['color'];?> alert-dismissible fade show" role="alert">
        <?php echo $_SESSION['msg'];?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php unset($_SESSION['msg']); unset($_SESSION['color']);}?>

    <div class="card">
        <div class="card-header busquedaa">
            <?php include 'modales_admin.php';?>
            <a class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#nuevo_pago"><i class="bi bi-plus-circle-dotted"></i></a>
            <div class="form-group">
                <input  type="text" name="caja_pagos" id="caja_pagos" class="form-control inp-pag" placeholder="Buscar" autofocus>
            </div>
        </div>
            <div class="card-body">
                <h5 class="card-title">pagos registrados</h5>

                <div id="pagos" class="barra">
                </div>

            </div>
    </div><!-- End Card with header and footer -->
</main><!-- End #main -->

<script src="jquery.min.js"></script>
<script src="main_pagos.js"></script>

<?php
include 'control/footer.php';
include 'control/scripts.php';
?>