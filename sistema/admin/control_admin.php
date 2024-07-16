<?php
session_start();
include '../../assets/conexion.php';

// R E G I S T R A R  U S U A R I O
if(isset($_POST['registrar']))
{
	$doc = $_POST['doc'];
	$nom = $_POST['nom'];
	$tel = $_POST['tel'];
	$cor = $_POST['cor'];
	$dir = $_POST['dir'];
	$pass = md5($doc);
	$ini = $_POST['ini'];

	// Consulta 
	$consultar = "SELECT * from usuarios where ID_Usuario = '$doc'";
	$resultado = mysqli_query($con, $consultar);
	$cantidad = mysqli_num_rows($resultado);

	// Verificación para saber si esta registrado en la base de datos
	if($cantidad > 0)
	{
		$_SESSION['msg'] = "El usuario ya se encuentra registrado en la base de datos";
		$_SESSION['color'] = "danger"; 
		header('Location:registro.php?pag=1');
	}
	// Insertar datos del usuario en la base de datos
	else
	{
		$insertar = "INSERT into usuarios (ID_Usuario, Nom_usu, Tel_usu, Dir_usu, Correo_usu, Pass_usu, Contra_usu, Cod_rol_usu, Fec_ini_usu) values ('$doc', '$nom', '$tel', '$dir', '$cor', '$pass', '$doc', '2', '$ini')";
		$registrar = mysqli_query($con, $insertar);

		// Condicional para saber el proceso fue exitoso o erroneo
		if(!$registrar)
		{
			$_SESSION['msg'] = "Error al registrar el nuevo usuario";
			$_SESSION['color'] = "danger"; 
			header('Location:registro.php?pag=1');
		}
		else
		{
			$_SESSION['msg'] = "Usuario registrado exitosamente";
			$_SESSION['color'] = "primary"; 
			header('Location:registro.php?pag=1');
		}
	}
}

// E D I T A R  U S U A R I O 
if(isset($_POST['actualizar']))
{
	$doc = $_POST['doc'];
	$nom = $_POST['nom'];
	$tel = $_POST['tel'];
	$cor = $_POST['cor'];
	$dir = $_POST['dir'];
	$estado = $_POST['estado'];


	// Actualizacion de datos personales
	$Actualizar = "UPDATE usuarios set Nom_usu = '$nom', Tel_usu = '$tel', Correo_usu = '$cor', Dir_usu = '$dir', Estado_usu = '$estado' where ID_Usuario = '$doc'";
	$Act = mysqli_query($con, $Actualizar);

	// Condicional para saber el proceso fue exitoso o erroneo
	if(!$Act)
	{
		$_SESSION['msg'] = "Error al actualizar el usuario";
		$_SESSION['color'] = "danger"; 
		header('Location:registro.php?pag=1');
	}
	else
	{
		$_SESSION['msg'] = "Usuario actualizado exitosamente";
		$_SESSION['color'] = "primary"; 
		header('Location:registro.php?pag=1');
	}
}

// N U E V O  P A G O
if(isset($_POST['pago']))
{
	$doc = $_POST['doc'];
	$fec = $_POST['fec'];
	$final = $_POST['fec_fin'];
	$obs = $_POST['obs'];
	$dinero = $_POST['dinero'];

	// Consulta 
	$consultar = "SELECT * from usuarios where ID_Usuario = '$doc'";
	$resultado = mysqli_query($con, $consultar);
	$cantidad = mysqli_num_rows($resultado);

	// Condición para verificar el documento del usuario y validar si esta registrado en la base de datos
	if($cantidad > 0)
	{

		$consul = "SELECT * FROM usuarios WHERE ID_Usuario = '$doc' AND Estado_usu = 'Activo'";
		$resultado = mysqli_query ($con, $consul);
		$cant_est = mysqli_num_rows($resultado);
		if($cant_est > 0)
		{

			// Registro del pago
			$insertar = "INSERT into pagos (doc_usu_pagos, fec_pago, fec_fin_pago, cant_diner, Observ_pago) values ('$doc', '$fec', '$final', '$dinero', '$obs')";
			$registrar = mysqli_query($con, $insertar);
			// Condicional para saber el proceso fue exitoso o erroneo
			if(!$registrar)
			{
				$_SESSION['msg'] = "Error al registrar el nuevo pago";
				$_SESSION['color'] = "danger"; 
				header('Location:pagos.php?pag=1');
			}
			else
			{
				$_SESSION['msg'] = "Pago registrado exitosamente";
				$_SESSION['color'] = "primary"; 
				header('Location:pagos.php?pag=1');
			}
		}
		else
		{
			$_SESSION['msg'] = "El usuario se encuentra inactivo en el sistema";
			$_SESSION['color'] = "danger"; 
			header('Location:pagos.php?pag=1');
		}
	// El usuario no existe en la base de datos
	}
	else
	{
		$_SESSION['msg'] = "El usuario no se encuentra registrado en la base de datos";
		$_SESSION['color'] = "danger"; 
		header('Location:pagos.php?pag=1');
	}
}

// I N S E R T A R  N U E V A  M A Q U I N A

if(isset($_POST["submit"]))
{

        $nombre = $_POST['nom'];
        $cantidad = $_POST['cant'];
        $imagen = addslashes(file_get_contents($_FILES['image']['tmp_name']));
        
        //Insertar imagen en la base de datos
        $consulta = "INSERT INTO inventario(nom_inv, cant_inv, img_inv) 
        VALUES 
        ('$nombre','$cantidad','$imagen')";
        $resultado = $con->query($consulta);

        // Condicional para verificar la subida del fichero
        if($resultado)
        {
            $_SESSION['msg'] = "Nuevo elemento registrado en el inventario";
            $_SESSION['color'] = "primary";
            header('Location:inventario.php');
            exit;
            
        }
        else
        {
            $_SESSION['msg'] = "Error al insertar el elemento";
            $_SESSION['color'] = "danger";
            header('Location:inventario.php');
        } 
        // Si el usuario no selecciona ninguna imagen
}

// E D I T A R  D A T O S  D E  L A  M A Q U I N A
if(isset($_POST['editar']))
{
	$doc = $_POST['docu'];
	$nom = $_POST['nomb'];
	$cant = $_POST['cant'];


	$editar = "UPDATE inventario SET nom_inv = '$nom', cant_inv = '$cant' WHERE id = '$doc'";
	$edit = mysqli_query($con, $editar);

	// Condicional para saber el proceso fue exitoso o erroneo
	if(!$edit)
	{
		$_SESSION['msg'] = "Error al editar el elemento";
		$_SESSION['color'] = "danger"; 
		header('Location:inventario.php');
	}
	else
	{
		$_SESSION['msg'] = "elemento editado exitosamente";
		$_SESSION['color'] = "primary"; 
		header('Location:inventario.php');
	}
}

// E L I M I N A R  M A Q U I N A
if(isset($_POST['eliminar']))
{
	$ids = $_POST['id'];

	$elim = "DELETE FROM inventario WHERE id = '$ids'";
	$respuesta = mysqli_query($con, $elim);

	// Condicional para saber el proceso fue exitoso o erroneo
	if(!$respuesta)
	{
		$_SESSION['msg'] = "Error al eliminar aparato";
		$_SESSION['color'] = "danger";
		header('Location:inventario.php');
	}
	else
	{
		$_SESSION['msg'] = "Eliminación exitosa!";
		$_SESSION['color'] = "primary"; 
		header('Location:inventario.php');
	}
}

// E D I T A R  D A T O S  D E L  G I M N A S I O

if(isset($_POST['edit']))
{
	$nom = $_POST['nom'];
	$telef = $_POST['tel'];
	$correo = $_POST['corr'];
	$direc = $_POST['dir'];
	$ig = $_POST['insta'];
	$face = $_POST['facebook'];

	// Consulta para la actualizacion de los  datos del gimnasio
	$act_gym = "UPDATE gimnasios set Nom_Gym = '$nom', Tel_Gym = '$telef', Corr_Gym = '$correo', Dir_Gym = '$direc', Ig_Gym = '$ig', Fcb_Gym = '$face' WHERE id_Gym = '1'";
	$act = mysqli_query($con, $act_gym);

	// Condicional para saber el proceso fue exitoso o erroneo
	if(!$act)
	{
		$_SESSION['msg'] = "Error al actualizar datos del gimnasio";
		$_SESSION['color'] = "danger";
		header('Location:'.getenv('HTTP_REFERER'));
	}
	else
	{
		$_SESSION['msg'] = "Actualizacion exitosa!";
		$_SESSION['color'] = "primary"; 
		header('Location:'.getenv('HTTP_REFERER'));
	}
}
?>