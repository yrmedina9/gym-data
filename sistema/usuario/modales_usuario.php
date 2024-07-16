<?php
include '../../assets/conexion.php';
$year = date('d - Y');
?>
<style>
	form option{
		width: 100px;
	}
</style>
<div class="modal fade" id="historial<?php echo $info['ID_Usuario']?>" tabindex="-1">
	<div class="modal-dialog modal-lg">
	  <div class="modal-content">
	  	<form action="control_usuario.php" method="POST">
		    <div class="modal-header">
		      <h5 class="modal-title">Historial</h5>
		      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		    </div>
		    <div style="margin: 5% 5% 5% 5%;">
		    	<input type="hidden" name="doc" class="form-control" placeholder="Documento" value="<?php echo $info['ID_Usuario']?>" readonly>	
		    </div>
			<div class="modal-body" style="display: flex; margin: auto; margin-left: 15%;">
		    	<div style="margin-right: 2% ;">
			    	<label>¿Sufre problemas en el corazón?</label>
			    	<select class="form-select" name="historial" required>
			      		<option>Seleccione una opcion</option>
			      		<option value="Si">Si</option>
			      		<option value="No">No</option>		      		
			      	</select><br>
					<label>¿Ha tenido alguna lesión?</label>
					<select class="form-select" name="historial2" required>
			      		<option>Seleccione una opción</option>
			      		<option value="Si">Si</option>
			      		<option value="No">No</option>		      		
			      	</select><br>
			      	<label>¿Usted está embarazada?</label>
					<select class="form-select" name="historial3" required>
			      		<option>Seleccione una opción</option>
			      		<option value="Si">Si</option>
			      		<option value="No">No</option>		      		
			      	</select><br>
			      	<label>¿Tiene Problemas de columna?</label>
			      	<select class="form-select" name="historial4" required>
			      		<option>Seleccione una opcion</option>
			      		<option value="Si">Si</option>
			      		<option value="No">No</option>		      		
			      	</select><br>
					<label>¿Tiene problemas cardiovasculares?</label>
					<select class="form-select" name="historial5" required>
			      		<option>Seleccione una opcion</option>
			      		<option value="Si">Si</option>
			      		<option value="No">No</option>		      		
			      	</select><br>
		    	</div>
				<div  style="margin-left: 2%; ">
					<label>¿Práctica alguna actividad física? ㅤㅤㅤ</label>
					<select class="form-select" name="historial6" required>
			      		<option>Seleccione una opcion</option>
			      		<option value="Si">Si</option>
			      		<option value="No">No</option>		      		
			      	</select><br>
					<label>¿Tiene problemas de tiroides?</label>
					<select class="form-select" name="historial7" required>
			      		<option>Seleccione una opcion</option>
			      		<option value="Si">Si</option>
			      		<option value="No">No</option>		      		
			      	</select><br>
					<label>¿Es usted diabético?</label>
					<select class="form-select" name="historial8" required>
			      		<option>Seleccione una opcion</option>
			      		<option value="Si">Si</option>
			      		<option value="No">No</option>		      		
			      	</select><br>
					<label>¿Es usted hipoglicémico?</label>
					<select class="form-select" name="historial9" required>
			      		<option>Seleccione una opcion</option>
			      		<option value="Si">Si</option>
			      		<option value="No">No</option>		      		
			      	</select><br>
					<label>¿Ha tenido alguna operación?</label>
					<select class="form-select" name="historial10" required>
			      		<option>Seleccione una opcion</option>
			      		<option value="Si">Si</option>
			      		<option value="No">No</option>		      		
			      	</select>
				</div>
		    </div>
		    <div class="modal-footer">
		      <button type="submit" class="btn btn-outline-primary btn-sm" name="registrar" id="registrar">Registrar</a>
		      <button type="button" class="btn btn-outline-danger btn-sm" data-bs-dismiss="modal">Cancelar</button>          
		    </div>
	    </form>
	  </div>
	</div>
</div>
<div class="modal fade" id="editar<?php echo $info['ID_Usuario']?>" tabindex="-1">
	<div class="modal-dialog modal-lg">
	  <div class="modal-content">
	  	<form action="control_usuario.php" method="POST">
		    <div class="modal-header">
		      <h5 class="modal-title">Historial</h5>
		      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		    </div>
		    <div style="margin: 5% 5% 5% 5%;">
		    	<input type="hidden" name="doc" class="form-control" placeholder="Documento" value="<?php echo $info['ID_Usuario']?>" readonly>	
		    </div>
			<div class="modal-body" style="display: flex; margin: auto; margin-left: 15%;">
		    	<div style="margin-right: 2% ;">
			    	<label>¿Sufre problemas en el corazón?</label>
			    	<select class="form-select" name="historial" required>
						<option value=""><?php echo $inform['Cardiores_usu']?></option>
			      		<option value="Si">Si</option>
			      		<option value="No">No</option>		      		
			      	</select><br>
					<label>¿Ha tenido alguna lesión?</label>
					<select class="form-select" name="historial2" required>
			      		<option value=""><?php echo $inform['Lesion_usu']?></option>
			      		<option value="Si">Si</option>
			      		<option value="No">No</option>		      		
			      	</select><br>
			      	<label>¿Usted está embarazada?</label>
					<select class="form-select" name="historial3" required>
			      		<option value=""><?php echo $inform['Embarazo_usu']?></option>
			      		<option value="Si">Si</option>
			      		<option value="No">No</option>		      		
			      	</select><br>
			      	<label>¿Tiene Problemas de columna?</label>
			      	<select class="form-select" name="historial4" required>
			      		<option value=""><?php echo $inform['probl_colum_usu']?></option>
			      		<option value="Si">Si</option>
			      		<option value="No">No</option>		      		
			      	</select><br>
					<label>¿Tiene problemas cardiovasculares?</label>
					<select class="form-select" name="historial5" required>
			      		<option value=""><?php echo $inform['cardiovas_histo']?></option>
			      		<option value="Si">Si</option>
			      		<option value="No">No</option>		      		
			      	</select><br>
		    	</div>
				<div  style="margin-left: 2%; ">
					<label>¿Práctica alguna actividad física? ㅤㅤㅤ</label>
					<select class="form-select" name="historial6" required>
			      		<option value=""><?php echo $inform['Activ_fisi_usu']?></option>
			      		<option value="Si">Si</option>
			      		<option value="No">No</option>		      		
			      	</select><br>
					<label>¿Tiene problemas de tiroides?</label>
					<select class="form-select" name="historial7" required>
			      		<option value=""><?php echo $inform['Proble_tir_usu']?></option>
			      		<option value="Si">Si</option>
			      		<option value="No">No</option>		      		
			      	</select><br>
					<label>¿Es usted diabético?</label>
					<select class="form-select" name="historial8" required>
			      		<option value=""><?php echo $inform['Diabetes_usu']?></option>
			      		<option value="Si">Si</option>
			      		<option value="No">No</option>		      		
			      	</select><br>
					<label>¿Es usted hipoglicémico?</label>
					<select class="form-select" name="historial9" required>
			      		<option value=""><?php echo $inform['Hipoglicem_usu']?></option>
			      		<option value="Si">Si</option>
			      		<option value="No">No</option>		      		
			      	</select><br>
					<label>¿Ha tenido alguna operación?</label>
					<select class="form-select" name="historial10" required>
			      		<option value=""><?php echo $inform['Operacion_usu']?></option>
			      		<option value="Si">Si</option>
			      		<option value="No">No</option>		      		
			      	</select>
				</div>
		    </div>
		    <div class="modal-footer">
		      <button type="submit" class="btn btn-outline-primary btn-sm" name="editar" id="editar">Registrar</a>
		      <button type="button" class="btn btn-outline-danger btn-sm" data-bs-dismiss="modal">Cancelar</button>          
		    </div>
	    </form>
	  </div>
	</div>
</div>
<!-- REGISTRAR MEDIDAS -->
<div class="modal fade" id="medidas<?php echo $info['ID_Usuario']?>" tabindex="-1">
	<div class="modal-dialog">
	  <div class="modal-content">
	  	<form action="control_usuario.php" method="POST">
		    <div class="modal-header">
		      <h5 class="modal-title">Diagrama de medidas</h5>
		      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		    </div>
		    <div class="modal-body">

		      	<input type="text" name="doc" class="form-control" value="<?php echo $info['ID_Usuario']?>" placeholder="Documento" hidden>
		      	<br>
		      	<label>Ingrese fecha en la que se pesó</label>
				<select class="form-select" name="fech" required>
			    	<option>Seleccione una opcion</option>
			      	<option value="<?php echo 'Enero -'.$year?>">Enero</option>
			      	<option value="<?php echo 'Febrero - '.$year?>">Febrero</option>
			      	<option value="<?php echo 'Marzo - '.$year?>">Marzo</option>
			      	<option value="<?php echo 'Abril - '.$year?>">Abril</option>		      		
			      	<option value="<?php echo 'Mayo - '.$year?>">Mayo</option>
			      	<option value="<?php echo 'Junio - '.$year?>">Junio</option>
			      	<option value="<?php echo 'Julio - '.$year?>">Julio</option>
			      	<option value="<?php echo 'Agosto - '.$year?>">Agosto</option>
			      	<option value="<?php echo 'Septiembre - '.$year?>">Septiembre</option>
			      	<option value="<?php echo 'Octubre - '.$year?>">Octubre</option>
			      	<option value="<?php echo 'Noviembre - '.$year?>">Noviembre</option>
			      	<option value="<?php echo 'Diciembre - '.$year?>">Diciembre</option>
			    </select><br>
		      	<div class="d-flex">
		      		<input type="text" name="estatura" class="form-control" placeholder="Estatura" maxlength="11" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" required>
		      	</div><br>
		      	<div class="d-flex">
		      		<input type="text" name="peso" class="form-control" placeholder="Peso" maxlength="11" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" required>
		      		<input type="text" name="cuello" class="form-control" placeholder="Cuello" maxlength="11" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" required>
		      	</div><br>
		      	<div class="d-flex">
			      	<input type="text" name="bicep" class="form-control" placeholder="Bicep" maxlength="11" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" >
			      	<input type="text" name="hombro" class="form-control" placeholder="Hombro" maxlength="11" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" >
		      	</div><br>
		      	<div class="d-flex">
		      		<input type="text" name="espalda" class="form-control" placeholder="Espalda" maxlength="11" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" >
		      		<input type="text" name="antebrazo" class="form-control" placeholder="Antebrazo" maxlength="11" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" >	
		      	</div><br>
		      	<div class="d-flex">
			      	<input type="text" name="pecho" class="form-control" placeholder="Pecho" maxlength="11" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" >
			      	<input type="text" name="cintura" class="form-control" placeholder="Cintura / Abdomen"maxlength="11" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" >
			      	
		      	</div><br>
		      	<div class="d-flex">
		      		<input type="text" name="muslo" class="form-control" placeholder="Muslo" maxlength="11" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" >
		      		<input type="text" name="cadera" class="form-control" placeholder="Cadera" maxlength="11" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" >
		      	</div><br>
		      	<div class="d-flex">
		      		<input type="text" name="gluteo" class="form-control" placeholder="Glueto" maxlength="11" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" >
		      		<input type="text" name="pantorrilla" class="form-control" placeholder="Pantorrilla" maxlength="11" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" >
		      	</div>
		    </div>
		    <div class="modal-footer">
		      <button type="submit" class="btn btn-outline-primary btn-sm" name="medidas" id="medidas">Registrar</a>
		      <button type="button" class="btn btn-outline-danger btn-sm" data-bs-dismiss="modal">Cancelar</button>          
		    </div>
	    </form>
	  </div>
	</div>
</div>