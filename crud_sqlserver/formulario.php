
<!doctype html>

<html lang="en">
  <head>

   
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="estilo.css">

    <title>Crud SQL SERVER!</title>
  </head>
  <body>

   <?php
include("conexion_sis.php");

?>
    <h1>Formulario!</h1>

    <div class="container">
    <form method="POST" action="formulario.php">
      <div class="form-group">
        <label>Usuario</label>
        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Ingresa tu usuario" name="nombre">
       
      </div>
      <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="passw">
      </div>
       <label>Correo</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingresa tu correo" name="email">
      <br>
      <button type="submit" class="btn btn-primary" name="insert">Insertar datos </button>
        </div>
</form>




    <br><br><br>

    <?php
    if(isset($_POST['insert']))
    {
        $usuario = $_POST['nombre'];
        $pass = $_POST['passw'];
        $email = $_POST['email'];

        $insertar = "INSERT INTO usuarios(usuario,password,email) VALUES ('$usuario','$pass','$email')";

        $ejecutar = sqlsrv_query($conn_sis, $insertar);

        if($ejecutar)
        {
          echo "<h3> Insertado Correctamente</h3>";
        }
    }

    ?>


  </div>
    <center>
    <div class="col-md-8 col-md-offset-2">
      <table class="table table-bordered table-responsive">
        <tr>
          <td>ID</td>
          <td>Usuario</td>
          <td>Password</td>
          <td>Email</td>
          <td>Accion</td>
          <td>Accion</td>
        </tr>

        <?php
          $consulta="select * from usuarios";
          $ejecutar=sqlsrv_query($conn_sis, $consulta);

          $i = 0;
          while ($fila = sqlsrv_fetch_array($ejecutar))
           {
              $id = $fila['id'];
              $usuario = $fila['usuario'];
              $password = $fila['password'];
              $email = $fila['email'];
              $i++;
           
        ?>

        <tr align="center">
          <td><?php echo $id; ?></td>
          <td><?php echo $usuario; ?></td>
          <td><?php echo $password  ?></td>
          <td><?php echo $email  ?></td>
          <td><a href="formulario.php?editar=<?php echo $id; ?>">Editar</a></td>
          <td><a href="formulario.php?borrar=<?php echo $id; ?>">Borrar</a></td>
        </tr>
        <?php
          }
        ?>
      </table>
    </div>
</center>


  <?php
    if (isset($_GET['editar']))
    {
      include("editar.php");
    }
   
  ?>


  <?php

   if (isset($_GET['borrar'])) 
    {
      $borrar_id = $_GET['borrar'];
      $borrar="DELETE FROM usuarios where id = $borrar_id";
      $ejecutar=sqlsrv_query($conn_sis, $borrar);
      if ($ejecutar) {
        echo "<script>alert('El usuario a sido borrado') </script>";
        echo "<script>window.open('formulario.php', '_self')</script>";
      } 
    }
?>
  


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>