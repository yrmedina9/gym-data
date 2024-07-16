<?php
include("assets/conexion.php");
$sql="SELECT * FROM usuarios";
$query=mysqli_query($con, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/9e2a8e423b.js" crossorigin="anonymous"></script>
  <title>Document</title>
</head>
<style>
    body{

    }
    .cerrar{
        text-align: end;
        margin-top: 3%;
        margin-right: 5%;
        margin-left: 3%;
        margin-bottom: 2%;
    }
    .sisi{
        margin-left:30%;
        margin-right:5%;
    }
    .h11{
        margin-left:40%;
        margin-bottom: 3%;
    }
    .shim{
        background: #FFF700;
    }
    table{
        border:3px
    }

</style>
<body>
    <script>
        function eliminar(){
            var respuesta = confirm("¿Estas seguro que deseas eliminar?")
            return respuesta
        }
    </script>
    <div class="cerrar">
        <a href="closeSesion.php" class="btn btn-outline-danger">Cerrar Sesión</a>
    </div>
    <h1 class="h11" >Bienvenido a la consulta de miembros</h1>
    <div class="sisi">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-hover table-light mt-3" id="mitablita">
                    <thead class="table-warning table-striped">
                        <tr>
                            <th>Documento</th>
                            <th>Nombre</th>
                            <th>Años</th>
                            <th>peso</th>
                            <th>Lesiones</th>
                            <th>Tipo de lesion</th>
                            <th>Celular</th>
                            <th>Correo</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row=mysqli_fetch_array($query)){ ?>
                            <tr>
                                <th><?php echo $row['ID_Usuario'] ?> </th>
                                <th><?php echo $row['Nombre'] ?></th>
                                <th><?php echo $row['Edad'] ?></th>
                                <th><?php echo $row['Peso'] ?></th>
                                <th><?php echo $row['Lesiones'] ?></th>
                                <th><?php echo $row['Espec_Lesiones'] ?></th>
                                <th><?php echo $row['Número'] ?></th>
                                <th><?php echo $row['Correo'] ?></th>
                                <th><a href="actualizar.php?id=<?php echo $row['ID_Usuario'] ?>" class="btn btn-outline-primary btn-sm">Editar</a></th>
                                <th><a onclick="return eliminar()" href="delete.php?id=<?php echo $row['ID_Usuario'] ?>" class="btn btn-outline-danger btn-sm ">Eliminar</a></th>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="soso">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.js"></script>
    <script>
        var table = new DataTable('#mitablita', {
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json',
            },
        });
    </script>
    </div>
</body>
<?php

include("barra.php");
?>
</html>