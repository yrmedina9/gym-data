<!-- ESTADISTICAS DE TODO EL GIMNASIO (PAGOS / USUARIOS REGISTRADOS EN LA BASE DE DATOS) -->
<?php 
include("control/head.php");
include("control/barra_nav.php");
include("control/sidebar.php");
$mes = date('m');

// CONSULTA PARA TRAER SOLO A LOS USUSARIOS QUE ESTAN PORPORCIONADOS CON EL ROL 2
$sql="SELECT * FROM pagos";
$query=mysqli_query($con, $sql);
$clien = "SELECT * from usuarios WHERE Cod_rol_usu = '2' and Estado_usu = 'Activo'";
$querys=mysqli_query($con, $clien);
$num_act = mysqli_num_rows($querys);
$clien2 = "SELECT * from usuarios WHERE Cod_rol_usu = '2' and Estado_usu = 'Inactivo'";
$query_2=mysqli_query($con, $clien2);
$num_inc = mysqli_num_rows($query_2);

$total=0;
while($row=mysqli_fetch_array($query)){
    $total += $row['cant_diner'];
}
?>

<main id="main" class="main">
  <div class="pagetitle">
    <h1>Estadisticas</h1>
  </div><!-- Left side columns -->

  <div class="col-lg-12 text-center ">
    <div class="row"><!-- Sales Card -->
      
      <!-- USUARIOS REGISTRADOS EN TOTAL -->
      <div class="col-xxl-3 col-md-3">
        <div class="card info-card sales-card">
          <div class="card-body">
            <h5 class="card-title">Clientes <span>| Registrados</span></h5>
            <div class="d-flex align-items-center">
              <div class="card-icon rounded-circle d-block align-items-center ">
                <img src="../../assets/img/sisisi.avif" width="53%">
                <h5 class="text-center"><b> Total usuarios</b> <br>Activos:  <?php echo $num_act ?><br>Inactivos: <?php echo $num_inc?></h5>
              </div>
            </div>
          </div>
        </div>
      </div><!-- End Sales Card -->
      
      <!-- TOTAL DE INGRESOS QUE OBTIENE EL GIMNASIO -->
      <!-- Revenue Card -->
      <div class="col-xxl-3 col-md-3">
        <div class="card info-card revenue-card">
          <div class="card-body">
            <h5 class="card-title">Ingresos <span>| Totales</span></h5>
            <div class="card-icon rounded-circle d-block align-items-center">
              <img src="../../assets/img/money.jpg" width="53%">
              <?php

              // CONSULTA PARA REALIZAR LA SUMA DE TODOS LOS INGRESOS
              $consul_P = "SELECT SUM(cant_diner) as total_pagos from pagos";
              $respu = mysqli_query($con, $consul_P);
              while($rows = mysqli_fetch_array($respu)){
              ?>
              <h5 class="text-center">$<?php echo number_format($rows['total_pagos']); ?></h5>
            <?php } ?>
            </div>
          </div>
        </div>
      </div><!-- End Revenue Card -->

      <!-- FILTRAR LA CANTIDAD DE INGRESOS DE MES A MES -->
      <div class="col-xxl-3 col-md-3">
        <div class="card info-card revenue-card">
          <div class="card-body">
            <h5 class="card-title">Ingreso <span>| Periodo</span></h5>
            <form  method="POST">
              <div class="row mb-3">
                <label for="inputText">Desde</label>
                <div class="col-sm-12">
                  <input type="date" name="fec_ini" class="form-control">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputText">Hasta</label>
                <div class="col-sm-12">
                  <input type="date" name="fec_fin" class="form-control">
                </div>
              </div>
              <div class="row mb-2">
                <button type="submit" class="btn btn-outline-primary" name="fil">Calcular</button>
              </div>
            </form>
            <?php

            // CODIGO PARA REALIZAR DESDE QUE MAS HASTA CUAL MES (PRIORISANDO EL DIA)
            if (isset($_POST['fil']))
            {
              $desde = $_POST['fec_ini'];
              $hasta = $_POST['fec_fin'];
              if($desde < $hasta)
              {
                $consul = "SELECT SUM(cant_diner) AS total FROM pagos WHERE fec_pago BETWEEN '$desde' AND '$hasta'";
                $respu = mysqli_query($con, $consul);
                $rows = mysqli_fetch_array($respu);
                {
                  echo "<h5><b>Cantidad total: </b>$".number_format($rows['total'])."</h5>";
                }
              }
              else
              {
                echo "<h6>No ha ingresado ningún filtro</h6>";
              }
            }
            ?>
          </div>
        </div>
      </div>

      <!-- INGRESO QUE OBTUVO EN UN SOLO DIA -->
      <div class="col-xxl-3 col-md-3">
        <div class="card info-card revenue-card">
          <div class="card-body">
            <h5 class="card-title">Ingreso <span>| Dia</span></h5>
            <form  method="POST">
              <div class="row mb-3">
                <input type="date" name="cal" class="form-control">
              </div>
              <div class="row mb-2">
                <button type="submit" class="btn btn-outline-primary" name="filtrar">Calcular</button>
              </div>
            </form>
            <?php

            // CONSULTA PARA FILTRAR EL DIA 
            if (isset($_POST['filtrar'])){
              $mesSeleccionado = $_POST['cal'];
              if($mesSeleccionado > 0){
                $consul = "SELECT SUM(cant_diner) as total from pagos WHERE fec_pago = '$mesSeleccionado'";
                $respu = mysqli_query($con, $consul);
                $rows = mysqli_fetch_array($respu);{
                  $total_mes=0;
                  $total_mes += $rows['total'];
                  echo "<h5><b>Cantidad total: </b>$".$total_mes."</h5>";
                }
              }
              else
              {
                echo "<h6>No ha ingresado ningún filtro</h6>";
              }
            }
            ?>
          </div>
        </div>
      </div><!-- End Revenue Card -->
    </div>
  </div>
</main><!-- End #main -->
<?php
include 'control/footer.php';
include 'control/scripts.php';
?>