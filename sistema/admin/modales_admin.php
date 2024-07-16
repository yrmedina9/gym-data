<?php
include '../../assets/conexion.php';
$hoy = date('Y-m-d');
?>

<!--  M O D A L  P A R A   C R E A R  U S U A R I O -->
<div class="modal fade" id="nuevo_usuario" tabindex="-1">
	<div class="modal-dialog">
	  <div class="modal-content">
	  	<form action="control_admin.php" method="POST">
		    <div class="modal-header">
		      <h5 class="modal-title">Nuevo usuario</h5>
		      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		    </div>
		    <div class="modal-body">
		      
		      	<input type="text" name="doc" class="form-control" placeholder="Documento" maxlength="11" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" required autofocus>
		      	<br>
		      	<input type="text" name="nom" class="form-control" placeholder="Nombre" required>
		      	<br>
		      	<input type="text" name="tel" class="form-control" placeholder="Teléfono" maxlength="10" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" required>
		      	<br>
		      	<input type="email" name="cor" class="form-control" placeholder="Email">
		      	<br>
		      	<input type="text" name="dir" class="form-control" placeholder="Dirección" required>
		      	<br>
		      	<label>Fecha Afiliación</label>
		      	<input type="date" name="ini" class="form-control" min="<?php echo $hoy?>" value="<?php echo $hoy?>" required>
		      	<br>

		    </div>
		    <div class="modal-footer">
		      <button type="submit" class="btn btn-outline-primary btn-sm" name="registrar" id="registrar">Registrar</a>
		      <button type="button" class="btn btn-outline-danger btn-sm" data-bs-dismiss="modal">Cancelar</button>          
		    </div>
	    </form>
	  </div>
	</div>
</div>

<!-- M O D A L  P A R A  A C T U A L I Z A R  U S U A R I O -->

<div class="modal fade" id="actualizar<?php echo $info['ID_Usuario']?>" tabindex="-1">
	<div class="modal-dialog">
	  <div class="modal-content">
	  	<form action="control_admin.php" method="POST">
		    <div class="modal-header">
		      <h5 class="modal-title">Actualizar usuario</h5>
		      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		    </div>
		    <div class="modal-body">
		      
		      	<input type="text" name="doc" class="form-control" value="<?php echo $info['ID_Usuario']?>" placeholder="Documento" maxlength="11" readonly required>
		      	<br>
		      	<input type="text" name="nom" class="form-control" value="<?php echo $info['Nom_usu']?>" placeholder="Nombre" required>
		      	<br>
		      	<input type="text" name="tel" class="form-control" value="<?php echo $info['Tel_usu']?>" placeholder="Teléfono" maxlength="10" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" required>
		      	<br>
		      	<input type="email" name="cor" class="form-control" value="<?php echo $info['Correo_usu']?>" placeholder="Email" required>
		      	<br>
		      	<input type="text" name="dir" class="form-control" value="<?php echo $info['Dir_usu']?>" placeholder="Dirección" required>
		      	<br>
		      	<label class="text-center">Estado actual: <?php echo $info['Estado_usu']?></label>
		      	<br><br>
		      	<select class="form-select" name="estado" required>
		      		<option>Seleccione el nuevo estado</option>
		      		<option value="Activo">Activo</option>
		      		<option value="Inactivo">Inactivo</option>		      		
		      	</select>

		    </div>
		    <div class="modal-footer">
		      <button type="submit" class="btn btn-outline-warning btn-sm" name="actualizar" id="actualizar">Actualizar</a>
		      <button type="button" class="btn btn-outline-danger btn-sm" data-bs-dismiss="modal">Cancelar</button>          
		    </div>
	    </form>
	  </div>
	</div>
</div>

<!-- M O D A L  P A R A  H A C E R  N U E V O  P A G O -->

<div class="modal fade" id="nuevo_pago" tabindex="-1">
	<div class="modal-dialog">
	  <div class="modal-content">
	  	<form action="control_admin.php" method="POST">
		    <div class="modal-header">
		      <h5 class="modal-title">Nuevo pago</h5>
		      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		    </div>
		    <div class="modal-body">
		      
		      	<input type="text" name="doc" class="form-control" placeholder="Documento" required maxlength="11" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" autofocus>
		      	<br>
		      	<div class="input-group mb-3">
                  <span class="input-group-text">$</span>
                  <input type="text" class="form-control" placeholder="Total pagado" name="dinero" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" required>
                  <span class="input-group-text">.00</span>
                </div>
		      	<br>
		      	<label>Fecha finalización</label>
		      	<input type="date" name="fec_fin" class="form-control" min="<?php echo $hoy?>" value="<?php echo $hoy?>">
		      	<br>
		      	<textarea name="obs" class="form-control" maxlength="3000" placeholder="Observaciones" required></textarea>
		      	<input type="hidden" name="fec" value="<?php echo $hoy?>">


		    </div>
		    <div class="modal-footer">
		      <button type="submit" class="btn btn-outline-primary btn-sm" name="pago" id="pago">Registrar</a>
		      <button type="button" class="btn btn-outline-danger btn-sm" data-bs-dismiss="modal">Cancelar</button>          
		    </div>
	    </form>
	  </div>
	</div>
</div>

<!-- M O D A L  D E  I N G R E S O  D E  M Á Q U I N A S  -->

<div class="modal fade" id="maquinas" tabindex="-1">
	<div class="modal-dialog">
	  <div class="modal-content">
			<form action="control_admin.php" method="POST" enctype="multipart/form-data">
				<div class="modal-header">
		      		<h5 class="modal-title">Nueva Máquina</h5><br>
		      		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		    	</div>
			    <div class="modal-body">
			    	<div class="form-group">
						<input type="text" name="nom" class="form-control" placeholder="Nombre de la máquina" required>
						<br>
						<input type="text" name="cant" class="form-control" placeholder="Cantidad" maxlength="2" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" required>
						<br>
						<input type="file" name="image" class="form-control" required>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-outline-primary btn-sm" name="submit" id="submit">Registrar</button>
					<button type="button" class="btn btn-outline-danger btn-sm" data-bs-dismiss="modal">Cancelar</button>
		  		</div>
		  	</form>
		</div>
	</div>
</div>

<!-- A C T U A L I Z A R   M A Q U I N A S -->

<div class="modal fade" id="editar<?php echo $fila['id']?>" tabindex="-1">
	<div class="modal-dialog">
	  <div class="modal-content">
	  	<form action="control_admin.php" method="POST">
		    <div class="modal-header">
		      <h5 class="modal-title">Editar Maquina</h5>
		      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		    </div>
		    <div class="modal-body">
		      
		      	<input type="text" name="docu" class="form-control" value="<?php echo $fila['id']?>" placeholder="Documento" hidden readonly>
		      	<br>
		      	<input type="text" name="nomb" class="form-control" value="<?php echo $fila['nom_inv']?>" placeholder="Nombre" >
		      	<br>
		      	<label>Cantidad de bicicletas</label>
		      	<input type="text" name="cant" class="form-control" value="<?php echo $fila['cant_inv']?>" placeholder="cantidad" maxlength="11" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" required>
		      	<br>

		    </div>
		    <div class="modal-footer">
		      <button type="submit" class="btn btn-outline-primary btn-sm" name="editar" id="editar">Actualizar</a>
		      <button type="button" class="btn btn-outline-danger btn-sm" data-bs-dismiss="modal">Cancelar</button>          
		    </div>
	    </form>
	  </div>
	</div>
</div>


<div class="modal fade" id="delet<?php echo $fila['id']?>" tabindex="-1">
	<div class="modal-dialog">
	  <div class="modal-content">
	  	<form action="control_admin.php" method="POST">
		    <div class="modal-header">
		      <h5 class="modal-title">Eliminar Maquina</h5>
		      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		    </div>
		    <div class="modal-body">
		      
		      	<input type="text" name="id" class="form-control" value="<?php echo $fila['id']?>" hidden readonly>
		      	¿Esta seguro de eliminar el artefacto?

		    </div>
		    <div class="modal-footer">
		      <button type="submit" class="btn btn-outline-primary btn-sm" name="eliminar" id="eliminar">Confirmar</a>
		      <button type="button" class="btn btn-outline-danger btn-sm" data-bs-dismiss="modal">Cancelar</button>          
		    </div>
	    </form>
	  </div>
	</div>
</div>

	  <!-- M O D A L   P A R A   C E R R A R   S E S I O N   -->

  <div class="modal fade" id="cerrar_sesion" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Cerrar sesión</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          ¿Esta seguro de cerrar la sesión?
        </div>
        <div class="modal-footer">
          <a href="cerrar_sesion.php" class="btn btn-outline-primary">Cerrar sesión</a>
          <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Cancelar</button>          
        </div>
      </div>
    </div>
  </div>

  <!-- M O D A L   P A R A  R E G I S T R A R   L O S  D A T O S  D E L  G I M N A S I O  -->

<div class="modal fade" id="datos_gim" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="control_admin.php" method="POST">
        <div class="modal-header">
          <h5 class="modal-title">Registrar Gimnasio</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
  
            <input type="text" name="nom" class="form-control" placeholder="Nombre" required>
            <br>
            <input type="text" name="tel" class="form-control" placeholder="Teléfono" maxlength="10" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" required>
            <br>
            <input type="email" name="corr" class="form-control" placeholder="Email">
            <br>
            <input type="text" name="dir" class="form-control" placeholder="Dirección" required>
            <br>
            <input type="text" name="insta" class="form-control" placeholder="Link Facebook" required>
            <br>
            <input type="text" name="facebook" class="form-control" placeholder="Link Instagram" required>
            <br>

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-outline-primary btn-sm" name="gim" id="gim">Registrar</a>
          <button type="button" class="btn btn-outline-danger btn-sm" data-bs-dismiss="modal">Cancelar</button>          
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="actualizagym" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="control_admin.php" method="POST">
        <div class="modal-header">
          <h5 class="modal-title">Datos del gimnasio</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        	<?php 
        	$consul = "SELECT * from gimnasios where id_Gym = '1'";
        	$resul = mysqli_query($con, $consul);
        	$datos_gym = mysqli_fetch_array($resul);
        	?>
  					<label>Nombre</label>
            <input type="text" name="nom" class="form-control" value="<?php echo $datos_gym['Nom_Gym'] ?>" placeholder="Nombre" required>
            <br>
            <label>Telefono</label>
            <input type="text" name="tel" class="form-control" value="<?php echo $datos_gym['Tel_Gym'] ?>" placeholder="Teléfono" maxlength="11" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" required>
            <br>
            <label>Correo</label>
            <input type="email" name="corr" class="form-control" value="<?php echo $datos_gym['Corr_Gym'] ?>" placeholder="Email">
            <br>
            <label>Dirección</label>
            <input type="text" name="dir" class="form-control" value="<?php echo $datos_gym['Dir_Gym'] ?>" placeholder="Dirección" required>
            <br>
            <label>Instagram</label>
            <input type="text" name="insta" class="form-control" value="<?php echo $datos_gym['Ig_Gym'] ?>" placeholder="Link Facebook" required>
            <br>
            <label>Facebook</label>
            <input type="text" name="facebook" class="form-control" value="<?php echo $datos_gym['Fcb_Gym'] ?>" placeholder="Link Instagram" required>
            <br>

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-outline-primary btn-sm" name="edit" id="edit">Actualizar</a>
          <button type="button" class="btn btn-outline-danger btn-sm" data-bs-dismiss="modal">Cancelar</button>          
        </div>
      </form>
    </div>
  </div>
</div>