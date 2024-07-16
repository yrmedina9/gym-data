<?php 

include '../../assets/conexion.php';

//consulta inicial para que se muestren todos los datos
$query = "SELECT * from pagos inner join usuarios on doc_usu_pagos = ID_Usuario order by fec_fin_pago ASC";

if(isset($_POST['consulta']))
{	
	//función que permite quitar los caracteres especiales que pueda el usuario incluir en la búsqueda
	$revisar = mysqli_real_escape_string($con,$_POST['consulta']);
	$query = "SELECT * from pagos inner join usuarios on doc_usu_pagos = ID_Usuario where doc_usu_pagos LIKE '%$revisar%' or Nom_usu LIKE '%$revisar%'";

}

$resultado = mysqli_query($con, $query);

if(mysqli_num_rows($resultado)>0)
{ ?>
	
	<table class="table table-hover table-sm text-center">
	    <thead>
	      <tr class="table-primary">
	        <th scope="col">Código</th>
	        <th scope="col">Documento</th>
	        <th scope="col">Nombre</th>
	        <th scope="col">Fecha</th>
	        <th scope="col">Finaliza</th>
	        <th scope="col">Pagado</th>
	        <th scope="col">Observación</th>
	        <th scope="col">Recibos</th>
	      </tr>
	    </thead>
	<?php
	while($mostrar = mysqli_fetch_assoc($resultado))
    { ?>
    	<tr>
            <td><font size="2"><?php echo $mostrar['id_pagos']?></font></td>
            <td><font size="2"><?php echo $mostrar['ID_Usuario']?></font></td>
            <td><font size="2"><?php echo $mostrar['Nom_usu']?></font></td>
            <td><font size="2"><?php echo $mostrar['fec_pago']?></font></td>
            <td><font size="2"><?php echo $mostrar['fec_fin_pago']?></font></td>
            <td><font size="2"><?php echo "$ ".number_format($mostrar['cant_diner'])?></font></td>
            <td><font size="2"><?php echo $mostrar['Observ_pago']?></font></td>
            <td><a href="recibo_pago.php?cod=<?php echo $mostrar['id_pagos']?>" class="btn btn-outline-danger" target="_blank"><i class="bi bi-file-pdf"></i></a></td>
        </tr>
    <?php } ?>
<?php }
else
{	
	echo "No existen datos";
}

?>