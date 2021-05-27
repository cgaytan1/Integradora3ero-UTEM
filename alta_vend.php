<?php

function ConsultarCliente($id){
	include 'conexion.php';
	$consulta = ConsultarCliente($_GET['id']);
	$sentencia = "SELECT * FROM usr WHERE id='".$id."'";
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
	<form action="savealta.php" method="POST">
			<h2>INGRESAR EMPLEADO</h2>
			<input type="hidden" name="id" placeholder="ID del usuario">
			Nombre: <input type="text" name="nombre" required placeholder="Nombre">
			Apellido Paterno: <input type="text" name="app" placeholder="Apellido Paterno">
			Apellido Materno: <input type="text" name="apm" placeholder="Apellido Materno">
			Usuario: <input type="text" name="usuario" placeholder="Usuario">
			Contraseña: <input type="password" id="password" name="pass" placeholder="Contraseña">
			Confirma contraseña: <input type="password" id="password2" name="pass" placeholder="Vuelve a escribir tu contraseña">
			<input type="hidden" name="rol" placeholder="Rol del usuario">
			Correo: <input type="text" name="correo" placeholder="Correo">
			Género: <div class="input-field col s12">
                            <select id="genero" name="genero">
                            <option value="" disabled selected>Selecciona un género</option>
                            <option value="Masculino">Masculino</option>
                            <option value="Femenino">Femenino</option>>
                            </select>
                           </div>
	        <script>
	            $(document).ready(function(){
	            $('select').formSelect();
	            });
	        </script>
			<input type="submit" value="Guardar"><br>
			<a href="modvend.php"><input type="button" value="Volver"></a>
	</form>
</body>
</html>
<script type="text/javascript" src="js/materialize.min.js"></script>
<script>
var password, password2;

password = document.getElementById('password');
password2 = document.getElementById('password2');

password.onchange = password2.onkeyup = passwordMatch;

function passwordMatch() {
    if(password.value !== password2.value)
        password2.setCustomValidity('Las contraseñas no coinciden.');
    else
        password2.setCustomValidity('');
}
</script>