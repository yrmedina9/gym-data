<?php 
include("control/head.php");
include("control/barra_nav.php");
include("control/sidebar.php");
$consu = "SELECT * from inventario";
$query = mysqli_query($con, $consu);
$colum = mysqli_num_rows($query);

?>

<style>
	.card img{
		width: 100%;
		height: 210px;
	}
</style>
<main id="main" class="main">
	<div class="pagetitle">
      <h1>Inventario</h1>
      <!-- Alerta de suceso -->    
      <?php if(isset($_SESSION['msg'])){?>
      	<div class="alert alert-<?php echo $_SESSION['color'];?> alert-dismissible fade show" role="alert">
      		<?php echo $_SESSION['msg'];?>
      		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      	</div>
      	<?php unset($_SESSION['msg']); unset($_SESSION['color']);}?>
      	<?php include "modales_admin.php"; ?>
      	<a class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#maquinas"><i class="bi bi-cart-plus"></i></a>
      </div>

      <div class="row">
        	<?php while ($fila = mysqli_fetch_assoc($query)) { ?>
        		<div class="col-md-2 text-center">
        			<!-- Card with an image on top -->
        			<div class="card">
        				<div class="card-body">
		              		<h5 class="card-title"><?php echo $fila['nom_inv']?></h5>
		              		<p class="card-text"><b> Cantidad:</b> <?php echo $fila['cant_inv']?></p>
		            	</div>
		            	<img src="data:image/jpg;base64,<?php echo base64_encode($fila['img_inv'])?>" ><br>
		            	<?php include "modales_admin.php"; ?>
		            	<div>
		            		<a class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#editar<?php echo $fila['id']?>"><i class="bi bi-pencil-square"></i></a>
		            		<a class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#delet<?php echo $fila['id']?>"><i class="bi bi-trash"></i></a>
		            	</div><br>
		          	</div><!-- End Card with an image on bottom -->
		      	</div>

		  	<?php } ?>
		</div>
</main><!-- End #main -->
<?php
include 'control/footer.php';
include 'control/scripts.php';
?>