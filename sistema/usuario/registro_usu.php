<?php
include("control/head.php");
include("control/barra_nav.php");
include("control/sidebar_usu.php");

error_reporting(0);
$clien = $_SESSION["usuario"];
$doc = $clien;

$consul = "SELECT * from usuarios where ID_Usuario = '$doc'";
$resul = mysqli_query($con, $consul);
$info = mysqli_fetch_array($resul);
?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Consulta</h1>
    </div><!-- End Page Title -->
 
    <!-- Alerta de suceso -->    
    <?php if(isset($_SESSION['msg'])){?>
    <div class="alert alert-<?php echo $_SESSION['color'];?> alert-dismissible fade show" role="alert">
        <?php echo $_SESSION['msg'];?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php unset($_SESSION['msg']); unset($_SESSION['color']);}?>

<!-- Left side columns -->
<div class="col-lg-12 ">
    <div class="row">

        <!-- Sales Card -->
        <div class="col-xxl-4 col-md-4 text-center">
            <div class="card info-card sales-card">
                <div class="card-body">
                    <h5 class="card-title">Usuario <span>| <?php echo $info['Nom_usu']?></span></h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-block align-items-center ">
                            <img src="../../assets/img/sisisi.avif" width="100%">
                        </div>
                    </div>
                    <div class="card-header">
                        <?php
                        //consultar el estado de preguntas
                        $con_pre = "SELECT * from historial where doc_usu_histo = '$doc' ";
                        $res_pre = mysqli_query($con, $con_pre);
                        $cant_pre = mysqli_num_rows($res_pre);
                        $inform = mysqli_fetch_array($res_pre);
                        if($cant_pre > 0)
                        {
                            include 'modales_usuario.php';?>
                            <a class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#editar<?php echo $info['ID_Usuario']?>"><i class="bi bi-pencil-square"></i></a>
                        <?php
                        }
                        else
                        {
                            include 'modales_usuario.php';?>
                            <a class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#historial<?php echo $info['ID_Usuario']?>"><i class="bi bi-person-bounding-box"></i></a>
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-4 col-md-4.">
            <div class="card info-card revenue-card">
                <div class="card-body">
                    <h3 class="card-title">Datos <span>| Personales</span></h3>
                    <h6><b>Nombre: </b><?php echo $info['Nom_usu']?></h6>
                    <h6><b>Documento: </b><?php echo $info['ID_Usuario']?></h6>
                    <h6><b>Telefono: </b><?php echo $info['Tel_usu']?></h6>
                    <h6><b>Correo: </b><?php echo $info['Correo_usu']?></h6>
                    <h6><b>Direccion: </b><?php echo $info['Dir_usu']?></h6>
                </div>
            </div>
            <div class="col-xxl-12 col-md-12.">
                <div class="card info-card revenue-card">
                    <div class="card-body">
                        <?php
                        //consultar el historial
                        $con_his = "SELECT * from historial where doc_usu_histo = '$doc'";
                        $res_his = mysqli_query($con, $con_his);
                        $info_his = mysqli_fetch_array($res_his);
                        ?>
                        <h3 class="card-title">Historial <span>| Médico</span></h3>
                        <h6><b>Lesiones: </b><?php echo $info_his['Lesion_usu']?></h6>
                        <h6><b>Estado de embarazo: </b><?php echo $info_his['Embarazo_usu']?></h6>
                        <h6><b>Problemas de columna: </b><?php echo $info_his['probl_colum_usu']?></h6>
                        <h6><b>Problemas cardiovasculares: </b><?php echo $info_his['cardiovas_histo']?></h6>
                        <h6><b>Realiza actividad fisica: </b><?php echo $info_his['Activ_fisi_usu']?></h6>
                        <h6><b>Problemas de tiroides: </b><?php echo $info_his['Proble_tir_usu']?></h6>
                        <h6><b>Diabetes: </b><?php echo $info_his['Diabetes_usu']?></h6>
                        <h6><b>Hiplogucémia: </b><?php echo $info_his['Hipoglicem_usu']?></h6>
                        <h6><b>Operaciones: </b><?php echo $info_his['Operacion_usu']?></h6>
                        <h6><b>Problemas  cardiorespiratorios: </b><?php echo $info_his['Cardiores_usu']?></h6>
                    </div>
                </div>
            </div><!-- End Revenue Card -->
        </div><!-- End Revenue Card -->
    </div>
</div>
        <div class="col-xxl-12 col-md-12">
            <div class="card info-card revenue-card  text-center">
                <div class="card-body">
                    <h5 class="card-title">Medidas <span>| Fisicas</span> </h5>
                    <table class="table table-hover table-sm">
                        <thead>
                            <tr class="table-primary">
                                <th scope="col">MES</th>
                                <th scope="col">PAGOS</th>
                                <th scope="col">ESTATURA</th>
                                <th scope="col">PESO</th>
                                <th scope="col">CUELLO</th>
                                <th scope="col">HOMBRO</th>
                                <th scope="col">BICEPS</th>
                                <th scope="col">ANTEBRAZO</th>
                                <th scope="col">PECHO</th>
                                <th scope="col">ESPALDA</th>
                                <th scope="col">CINTURA / ABDOMEN</th>
                                <th scope="col">CADERA</th>
                                <th scope="col">MUSLO</th>
                                <th scope="col">PANTORRILA</th>
                                <th scope="col">GLUTEO</th>
                            </tr>
                            <?php
                            //consultar medidas del usuario
                            $con_med = "SELECT * from medidas where doc_usu_med = '$doc'";
                            $res_med = mysqli_query($con, $con_med);
                            while($info_med = mysqli_fetch_array($res_med)){?>
                                <tr>
                                    <td><font size="3"><?php echo $info_med['mes_med']?></font></td>
                                    <td><font size="3"><?php echo $info_med['pagos_med']?></font></td>
                                    <td><font size="3"><?php echo $info_med['talla_med']?></font></td>
                                    <td><font size="3"><?php echo $info_med['peso_med']?></font></td>
                                    <td><font size="3"><?php echo $info_med['cuello_med']?></font></td>
                                    <td><font size="3"><?php echo $info_med['hmbro_med']?></font></td>
                                    <td><font size="3"><?php echo $info_med['bicep_med']?></font></td>
                                    <td><font size="3"><?php echo $info_med['antebrzo_med']?></font></td>
                                    <td><font size="3"><?php echo $info_med['pecho_med']?></font></td>
                                    <td><font size="3"><?php echo $info_med['espalda_med']?></font></td>
                                    <td><font size="3"><?php echo $info_med['cintur_med']?></font></td>
                                    <td><font size="3"><?php echo $info_med['cadera_med']?></font></td>
                                    <td><font size="3"><?php echo $info_med['muslo_med']?></font></td>
                                    <td><font size="3"><?php echo $info_med['pantorlla_med']?></font></td>
                                    <td><font size="3"><?php echo $info_med['gluteo_med']?></font></td>
                                </tr>
                            <?php } ?>
                        </thead>
                    </table>
                    <?php include 'modales_usuario.php';?>
                    <a class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#medidas<?php echo $info['ID_Usuario']?>">Agregar nueva medida <i class="bi bi-pencil-square"></i></a>
                </div>
            </div>
        </div>

</main><!-- End #main -->

<?php
include 'control/footer.php';
include 'control/scripts.php';
?>