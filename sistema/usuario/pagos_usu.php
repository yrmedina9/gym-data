<?php
include("control/head.php");
include("control/barra_nav.php");
include("control/sidebar_usu.php");

?>
<main id="main" class="main">
    <div class="card">
        <div class="card-body">
            <?php 
            $tot = "SELECT SUM(cant_diner) AS total_p from pagos WHERE doc_usu_pagos = '$doc'"; 
            $resultados = mysqli_query($con, $tot);
            $rows = mysqli_fetch_assoc($resultados);?>
            <h5 class="card-title">Pagos | <span> Inversion total: $<?php echo $rows['total_p'] ?></span> </h5>
            <table class="table table-hover table-sm ">
                <thead>
                    <tr class="table-primary">
                        <th scope="col">Código</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Finaliza</th>
                        <th scope="col">Pagado</th>
                        <th scope="col">Observación</th>
                        <th scope="col">Recibos</th>
                    </tr>
                    <?php
                    //consultar los usuarios registrados
                    $pagos = "SELECT * from pagos inner join usuarios on doc_usu_pagos = ID_Usuario where ID_Usuario = '$doc' order by fec_fin_pago DESC ";
                    $resultado = mysqli_query($con, $pagos);
                    while($info = mysqli_fetch_array($resultado)){?>
                    <tr>
                        <td><font size="2"><?php echo $info['id_pagos']?></font></td>
                        <td><font size="2"><?php echo $info['Nom_usu']?></font></td>
                        <td><font size="2"><?php echo $info['fec_pago']?></font></td>
                        <td><font size="2"><?php echo $info['fec_fin_pago']?></font></td>
                        <td><font size="2"><?php echo "$ ".number_format($info['cant_diner'])?></font></td>
                        <td><font size="2"><?php echo $info['Observ_pago']?></font></td>
                        <td><a href="recibo_pago.php?cod=<?php echo $info['id_pagos']?>" class="btn btn-outline-danger" target="_blank"><i class="bi bi-file-pdf"></i></a></td>
                    </tr>
                    <?php } ?>
                </thead>
                <div class="card-footer">
                Si tienes inquietudes consulta con el administrador
            </div>
            </table>
        </div>
    </div>
</main>
<?php
include 'control/footer.php';
include 'control/scripts.php';
?>