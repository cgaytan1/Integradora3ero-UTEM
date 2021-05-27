<?php
	$consulta = ConsultarCliente($_GET['id']);

function ConsultarCliente($id){
	include 'conexion.php';
	$sentencia = "SELECT * FROM usr WHERE id='".$id."'";
	$resultado = mysqli_query($conexion, $sentencia);
	$filas = mysqli_fetch_assoc($resultado);
	return[
		$filas['id'],
		$filas['nombre'],
		$filas['app'],
		$filas['apm'],
		$filas['genero'],
		$filas['usuario'],
		$filas['pass'],
		$filas['correo'],
		$filas['rol']
	];
}
?>
<!DOCTYPE html>
<html>
<head>
	  <meta charset="utf-8">
      <link href="css/Estilos2.css" rel="stylesheet" type="text/css">
	  <link rel="icon" type="image/.jpg" href="img/icon.png"/>
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
      <script src="js/jquery-3.4.1.min.js"></script>
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <script src="js/sweetalert2.all.min.js"></script>
	  <link rel="stylesheet" href="css/sweetalert.css">
	<title>Carxonline - Modificar</title>
</head>
<body>
	<form action="savevend.php" method="POST">
			<h2>MODIFICAR EMPLEADO</h2>
			<input type="hidden" name="id" placeholder="ID del usuario" value="<?php echo $consulta[0] ?>">
			Nombre: <input type="text" name="nombre" required placeholder="Nombre" value="<?php echo $consulta[1] ?>">
			Apellido Paterno: <input type="text" name="app" placeholder="Apellido Paterno" value="<?php echo $consulta[2] ?>">
			Apellido Materno: <input type="text" name="apm" placeholder="Apellido Materno" value="<?php echo $consulta[3] ?>">
			Género: <div class="input-field col s12">
                            <select id="genero" name="genero">
                            <option value="<?php echo $consulta[4] ?>" selected><?php echo $consulta[4] ?></option>
                            <option value="Femenino">Femenino</option>>
                            <option value="Masculino">Masculino</option>
                            </select>
                           </div>
	        <script>
	            $(document).ready(function(){
	            $('select').formSelect();
	            });
	        </script>
			Usuario: <input type="text" name="usuario" placeholder="Usuario" value="<?php echo $consulta[5] ?>">
			Contraseña: <input type="password" name="pass" placeholder="Contraseña" value="<?php echo $consulta[6] ?>">
			Correo: <input type="text" name="correo" placeholder="Correo" value="<?php echo $consulta[7] ?>">
			<input type="hidden" name="rol" placeholder="Rol" value="<?php echo $consulta[8] ?>">
			<input type="hidden" name="no_id" value="<?php echo $_GET['id'] ?>">
			<input type="submit" value="Guardar"><br>
			<a href="modvend.php"><input type="button" value="Volver"></a>
	</form>
	<script type="text/javascript" src="js/materialize.min.js"></script>
</body>
</html>


