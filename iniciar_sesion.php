<?php
session_start();
include 'head.php';
include 'header.php';
include 'assets/conexion.php';

if(isset($_POST['iniciar']))
{
    $doc = $_POST['doc'];
    $pass = $_POST['pass'];
    $new_pass = md5($pass);

    //consultar si el usuario exisite

    $consul_usuario = "SELECT * from usuarios where ID_Usuario = '$doc'";
    $resul_usuario = mysqli_query($con, $consul_usuario);
    $cant_usuario = mysqli_num_rows($resul_usuario);

    //Consultar si el usuario esta activo en la base de datos
    if($cant_usuario > 0)
    {
      $consul_est = "SELECT * from usuarios where ID_Usuario = '$doc' and Estado_usu = 'Activo'";
      $resul_est = mysqli_query($con, $consul_est);
      $cant_est = mysqli_num_rows($resul_est);
      
      //Validación del usuario en el sistema
      if($cant_est > 0)
      {
        $sql = ("SELECT * FROM usuarios WHERE ID_Usuario = '$doc' AND Pass_usu = '$new_pass'");
        $query = mysqli_query($con, $sql);
        $row = mysqli_num_rows($query);

        //Direccionar mediante rol de usuario o administrador
        if ($row > 0) 
        {
          $info_usu = mysqli_fetch_array($query);
          $rol_usu = $info_usu['Cod_rol_usu'];

          switch($rol_usu)
          {
            case 1:
              $_SESSION["admin"] = $doc;
              Header("Location: sistema/admin/admin.php");
            break;

            case 2:
              $_SESSION["usuario"] = $doc;
              Header("Location: sistema/usuario/usuario.php");
            break;
          }
        } 
        else 
        {
          echo("<script>alert('Contraseña de usuario incorrecta')</script>");
        }
      }
      else
      {
        echo("<script>alert('El usuario NO ESTÁ ACTIVO en el sistema, comuniquese con el Administrador')</script>");
      }
    }
    else 
    {
      echo("<script>alert('El usuario no se encuentra registrado en la base de datos')</script>");
    }
}

?>

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center justify-content-center">
    <div class="container position-relative">
        <div class="col-lg-4 col-md-6 " data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box iconbox-blue">
              <h4><a href="">Iniciar sesión</a></h4>
              <p></p>
              <form action="iniciar_sesion.php" method="POST">
                  <input type="text" name="doc" class="form-control" placeholder="Documento" required autofocus>
                  <br>
                  <input type="password" name="pass" class="form-control" placeholder="Contraseña" required>
                  <br>
                  <div align="left"><input type="submit" name="iniciar" id="iniciar" class="btn btn-outline-warning" value="Iniciar sesión"></div>
              </form>
            </div>
        </div>      
    </div>
  </section><!-- End Hero -->

<?php
include 'footer.php';
include 'scripts.php';
?>
</body>
</html>