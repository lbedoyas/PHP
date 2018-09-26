<?php

	 if (isset($_GET['editar'])) 
    {
      $editar_id = $_GET['editar'];

      $consulta="select * from usuarios where id = $editar_id";
      $ejecutar=sqlsrv_query($conn_sis, $consulta);
      $fila = sqlsrv_fetch_array($ejecutar);

      $usuario = $fila['usuario'];
      $password = $fila['password'];
      $email = $fila['email'];
    }
?>

<br>

<div class="modulo_editar">
	<form method="POST" action="" style="width: 60%;">
      <div class="form-group">
        <label>Usuario</label>
        <input type="text" class="form-control" name="nombre" value="<?php echo $usuario; ?>">
       
      </div>
      <br>
      <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control" name="passw" value="<?php echo $password ?>">
      </div>
      <br>
       <label>Correo</label>
        <input type="email" class="form-control" id="exampleInputEmail1" name="email" value="<?php echo $email; ?>">
      <br>
      <br>
      <button type="submit" class="btn btn-primary" name="actualizar">Actualizar Datos</button>
      <br>
        </div>
</form>
</div>


<?php
	 if (isset($_POST['actualizar'])) 
    {
    	 $actualizar_nombre = $_POST['nombre'];
    	 $actualizar_password = $_POST['passw'];
    	 $actualizar_email = $_POST['email'];

      $consulta="UPDATE usuarios SET usuario = '$actualizar_nombre', password = '$actualizar_password', email= '$actualizar_email' WHERE id = $editar_id";
      $ejecutar=sqlsrv_query($conn_sis, $consulta);
     
     if ($ejecutar) {
     		echo "<script>alert('Datos actualizados') </script>";
     		echo "<script>window.open('formulario.php', '_self')</script>";
     	}	

    }


?>
