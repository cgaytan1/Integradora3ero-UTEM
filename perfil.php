<?php
include 'conexion.php';

include 'menu.php';

include 'carrito.php';
?>
<?php

$usuario = Mod($_SESSION['usuario']);

function Mod($usuario){
	include 'conexion.php';
	$sentencia = "SELECT * FROM usr WHERE usuario='".$usuario."'";
	$resultado = mysqli_query($conexion, $sentencia);
	$filas = mysqli_fetch_assoc($resultado);
	return[
		$filas['id'],
		$filas['nombre'],
		$filas['app'],
		$filas['apm'],
		$filas['usuario'],
		$filas['pass'],
		$filas['rol'],
		$filas['correo'],
		$filas['genero']
	];
}
?>
	<center><h1 style="font-size: 300%;">MI PERFIL</h1></center>
          <div class="row">

      <div class="col s12" style="background:rgba(0,0,0,0.5);">
        <center>
        	<form action="cambios.php" method="POST">
	      	ID: <input  type="text" name="id" value="<?php echo $usuario[0] ?>">

			Nombre: <input type="text" name="nombre" required value="<?php echo $usuario[1] ?>">

			Apellido Paterno: <input type="text" name="app" value="<?php echo $usuario[2] ?>">

			Apellido Materno: <input type="text" name="apm" value="<?php echo $usuario[3] ?>">

			Usuario: <input type="text" name="usr" value="<?php echo $usuario[4] ?>">

			Contraseña: <input type="text" name="pass" value="<?php echo $usuario[5] ?>">

			Rol: <input type="hidden" name="rol" value="<?php echo $usuario[6] ?>">

			Correo: <input type="text" name="correo" value="<?php echo $usuario[7] ?>">

			Género: <input type="text" name="genero" value="<?php echo $usuario[8] ?>">

			<input type="hidden" name="usuario" value="<?php echo $usuario; ?>">

			<input type="submit" value="Guardar"><br>

			<a href="carxousr.php"><input type="button" value="Volver"></a>
		</form>
      	</center>
      </div>

    </div>

<script type="text/javascript" src="js/materialize.min.js"></script>

</body>
</html>
