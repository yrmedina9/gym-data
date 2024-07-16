<?php
include("control/head.php");
include("control/barra_nav.php");
include("control/sidebar.php");

//consulta para la paginacion
$consul = "SELECT * from usuarios where Cod_rol_usu = 2";
$resul = mysqli_query($con, $consul);
$tot_reg = mysqli_num_rows($resul);
$x_pag = 25;
$paginas = $tot_reg / $x_pag;
$tot_pag = ceil($paginas);
?>
 
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Usuarios</h1>
    </div><!-- End Page Title -->

    <!-- Alerta de suceso -->    
    <?php if(isset($_SESSION['msg'])){?>
    <div class="alert alert-<?php echo $_SESSION['color'];?> alert-dismissible fade show" role="alert">
        <?php echo $_SESSION['msg'];?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php unset($_SESSION['msg']); unset($_SESSION['color']);}?>

    <div class="card">
        <div class="card-header">
            <?php include 'modales_admin.php';?>
            <a class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#nuevo_usuario"><i class="bi bi-person-plus"></i></a>

        </div>
            <div class="card-body">
                <h5 class="card-title">Usuarios registrados</h5>
                <table class="table table-hover table-sm ">
                    <thead class="text-center">
                      <tr class="table-primary">
                        <th scope="col">Documento</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Email</th>
                        <th scope="col">Dirección</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Opción</th>
                      </tr>
                      <?php
                      //consultar los usuarios registrados
                      $inicio = ($_GET['pag']-1) * $x_pag;
                      $usuarios = "SELECT * from usuarios where Cod_rol_usu = 2 order by ID_Usuario limit $inicio, $x_pag";
                      $resultado = mysqli_query($con, $usuarios);
                      while($info = mysqli_fetch_array($resultado)){?>
                        <tr>
                            <td><font size="2"><?php echo $info['ID_Usuario']?></font></td>
                            <td><font size="2"><?php echo $info['Nom_usu']?></font></td>
                            <td><font size="2"><?php echo $info['Tel_usu']?></font></td>
                            <td><font size="2"><?php echo $info['Correo_usu']?></font></td>
                            <td><font size="2"><?php echo $info['Dir_usu']?></font></td>
                            <td><font size="2"><?php echo $info['Estado_usu']?></font></td>
                             <?php include 'modales_admin.php';?>
                            <td><a class="btn btn-outline-warning btn-sm" data-bs-toggle="modal" data-bs-target="#actualizar<?php echo $info['ID_Usuario']?>">Actualizar <i class="bi bi-pencil-square"></i></a></td>
                        </tr>
                      <?php }?>
                    </thead>
                </table>
            </div>
        <div class="card-footer">
            <nav aria-label="Page navigation example">
                <ul class="pagination pagination-sm">
                  <li class="page-item
                  <?php echo $_GET['pag']<=1 ? 'disabled' : '' ?>">
                      <a class="page-link" href="registro.php?pag=<?php echo $_GET['pag']-1 ?>">&laquo;</a>
                  </li>

                  <?php for($i=0;$i<$tot_pag;$i++) { ?>
                      <li class="page-item
                      <?php echo $_GET['pag']==$i+1 ? 'active' : '' ?> ">
                        <a class="page-link" href="registro.php?pag=<?php echo $i+1?>"><?php echo $i+1?></a>
                      </li>
                  <?php } ?>

                  <!-- cógigo equivalente al if anterior y trabaja como la condicional de excel -->
                  <li class="page-item
                  <?php echo $_GET['pag']>=$tot_pag ? 'disabled' : '' ?> ">
                    <a class="page-link" href="registro.php?pag=<?php echo $_GET['pag']+1 ?>">&raquo;</a>
                  </li>
                </ul>
            </nav><!-- End Pagination with icons -->
        </div>
    </div><!-- End Card with header and footer -->
</main><!-- End #main -->

<?php
include 'control/footer.php';
include 'control/scripts.php';
?>