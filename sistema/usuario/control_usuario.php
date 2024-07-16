<?php
session_start();
include '../../assets/conexion.php';

if(isset($_POST['registrar']))
{
	$doc = $_POST['doc'];
	$historial = $_POST['historial'];
	$historial2 = $_POST['historial2'];
	$historial3 = $_POST['historial3'];
	$historial4 = $_POST['historial4'];
	$historial5 = $_POST['historial5'];
	$historial6 = $_POST['historial6'];
	$historial7 = $_POST['historial7'];
	$historial8 = $_POST['historial8'];
	$historial9 = $_POST['historial9'];
	$historial10 = $_POST['historial10'];


	$insertar = "INSERT INTO historial (doc_usu_histo, Lesion_usu, Embarazo_usu, probl_colum_usu, cardiovas_histo, Activ_fisi_usu, Proble_tir_usu, Diabetes_usu, Hipoglicem_usu, Operacion_usu, Cardiores_usu) VALUES ('$doc', '$historial','$historial2','$historial3','$historial4','$historial5','$historial6','$historial7','$historial8','$historial9','$historial10')";
	$registrar = mysqli_query($con, $insertar); 

	if(!$registrar)
	{
		$_SESSION['msg'] = "Error al registrar la historia médica";
		$_SESSION['color'] = "danger"; 
		header('Location:registro_usu.php');
	}
	else
	{
		$_SESSION['msg'] = "Historia médica registrada exitosamente";
		$_SESSION['color'] = "primary"; 
		header('Location:registro_usu.php');
	}
}
// E D I T A R  U S U A R I O 
if(isset($_POST['editar']))
{
	$doc = $_POST['doc'];
	$historial = $_POST['historial'];
	$historial2 = $_POST['historial2'];
	$historial3 = $_POST['historial3'];
	$historial4 = $_POST['historial4'];
	$historial5 = $_POST['historial5'];
	$historial6 = $_POST['historial6'];
	$historial7 = $_POST['historial7'];
	$historial8 = $_POST['historial8'];
	$historial9 = $_POST['historial9'];
	$historial10 = $_POST['historial10'];



	// Actualizacion de datos personales
	$edit = "UPDATE historial set doc_usu_histo = '$doc', Lesion_usu = '$historia2', Embarazo_usu = '$historial3', probl_colum_usu = '$historial4', cardiovas_histo = '$historial5', Activ_fisi_usu = '$historial6', Proble_tir_usu = '$historial7', Diabetes_usu = '$historial8', Hipoglicem_usu = '$historial9', Operacion_usu = '$historial10', Cardiores_usu = '$historial'";
	$editar = mysqli_query($con, $edit);

	// Condicional para saber el proceso fue exitoso o erroneo
	if(!$editar)
	{
		$_SESSION['msg'] = "Error al actualizar historia medica";
		$_SESSION['color'] = "danger"; 
		header('Location:registro_usu.php');
	}
	else
	{
		$_SESSION['msg'] = "Historia medica actualizada exitosamente";
		$_SESSION['color'] = "primary"; 
		header('Location:registro_usu.php');
	}
}
if(isset($_POST['medidas']))
{
	$doc = $_POST['doc'];
	$pagos = $_POST['pagos'];
	$estatura = $_POST['estatura'];
	$peso = $_POST['peso'];
	$mes = $_POST['fech'];
	$cuello = $_POST['cuello'];
	$hombro = $_POST['hombro'];
	$bicep = $_POST['bicep'];
	$antebrazo = $_POST['antebrazo'];
	$pecho = $_POST['pecho'];
	$espalda = $_POST['espalda'];
	$cintura = $_POST['cintura'];
	$cadera = $_POST['cadera'];
	$muslo = $_POST['muslo'];
	$pantorrilla = $_POST['pantorrilla'];
	$gluteo = $_POST['gluteo'];

	$ins_med = "INSERT INTO medidas (doc_usu_med, talla_med, peso_med, mes_med, pagos_med, cuello_med,  hmbro_med, bicep_med, antebrzo_med, pecho_med, espalda_med, cintur_med, cadera_med, muslo_med, pantorlla_med, gluteo_med) values ('$doc', '$estatura', '$peso', '$mes', '$pagos', '$cuello', '$hombro','$bicep','$antebrazo','$pecho','$espalda','$cintura','$cadera','$muslo','$pantorrilla','$gluteo')";
	$regis_med = mysqli_query($con, $ins_med);
	if(!$regis_med)
	{
		$_SESSION['msg'] = "Error al registrar medidas";
		$_SESSION['color'] = "danger"; 
		header('Location:registro_usu.php');
	}
	else
	{
		$_SESSION['msg'] = "medidas registradas exitosamente";
		$_SESSION['color'] = "primary"; 
		header('Location:registro_usu.php');
	}
}
?>